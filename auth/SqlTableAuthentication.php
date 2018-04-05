<?php

namespace Pw\Auth\Providers;

use Pw\Auth\AuthenticatorInterface;


class SqlTableAuthentication implements AuthenticatorInterface
{

    private $db;
    private $table;
    private $idfield;
    private $cfield;
    private $rfield;
    private $uidfield;

    //todo: add arbitrary password decode function

    public function __construct(\PDO $db, array $args = [])
    {
        $this->db = $db;
        $this->table = $args['table'] ?? 'users';
        $this->idfield = $args['idfield'] ?? 'login';
        $this->cfield = $args['cfield'] ?? 'mdp'; // todo: change for password
        $this->rfield = $args['rfield'] ?? 'role';
        $this->uidfield = $args['uidfield'] ?? 'id';
    }

    public function existIdentity($identity)
    {
        $SQL = "SELECT * FROM $this->table WHERE $this->idfield=?";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt->execute([$identity])) return false;
        return $stmt->fetch();
    }

    public function authenticate($identity, $credential)
    {
        $SQL = "SELECT * FROM $this->table WHERE $this->idfield=?";
        $stmt = $this->db->prepare($SQL);
        if (!$stmt->execute([$identity])) return false;

        $row = $stmt->fetch();
        if (!$row) {
            return false;
        }

        $password = $row[$this->cfield];

        if (!password_verify($credential, $password)) {
            return false;
        }

        if (isset ($row[$this->rfield])){
            $res['roles'] = [$row[$this->rfield]];
        }

        if (isset ($row[$this->uidfield])){
            $res['uid'] = $row[$this->uidfield];
        }

        if(!isset($res)){
            return true;
        }

//      Return roles array or true if it does not exist.
        return $res;
    }


    /**
     * Logout

     *
     */
    public function clear()
    {
        // There is nothing to do for the logout.
    }
}