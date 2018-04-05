<?php

namespace Pw\Auth;

use Pw\Auth\Identity\IdentityManager;


// todo: password_hash

class Authenticate
{
    protected $authenticator;
    protected $identityManager;

    /**
     * Authenticate constructor.
     * @param AuthenticatorInterface $authenticator
     * @param IdentityManager $identityManager
     */
    public function __construct(AuthenticatorInterface $authenticator, IdentityManager $identityManager)
    {
        $this->authenticator = $authenticator;
        $this->identityManager = $identityManager;
    }



    public function clear()
    {
        $this->authenticator->clear();
    }


    public function authenticate($identity, $credential)
    {
        $role = $this->authenticator->authenticate($identity, $credential);

        if (!$role) {
            return false;
        }
        $this->identityManager->setIdentity($identity);
        if (isset($role['roles']) ){
            $this->identityManager->setRoles($role['roles']);
        }
        if (isset($role['uid']) ){
            $this->identityManager->setUid($role['uid']);
        }
        return true;
    }


    public function existIdentity($identity)
    {
        return $this->authenticator->existIdentity($identity);
    }


}

