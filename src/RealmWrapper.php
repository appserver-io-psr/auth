<?php

/**
 * AppserverIo\Psr\Auth\RealmWrapper
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
*
* PHP version 5
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2016 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io-psr/auth
 * @link      http://www.appserver.io
*/

namespace AppserverIo\Psr\Auth;

use AppserverIo\Lang\String;
use AppserverIo\Psr\Security\Auth\Callback\CallbackHandlerInterface;

/**
 * Wrapper implementation for a object manager implementation.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2016 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io-psr/auth
 * @link      http://www.appserver.io
 */
class RealmWrapper implements RealmInterface
{

    /**
     * The object manager instance to be wrapped.
     *
     * @var \AppserverIo\Psr\Auth\RealmInterface
     */
    protected $realm;

    /**
     * Injects the passed realm instance into this wrapper.
     *
     * @param \AppserverIo\Psr\Auth\RealmInterface $realm The realm instance used for initialization
     *
     * @return void
     */
    public function injectRealm(RealmInterface $realm)
    {
        $this->realm = $realm;
    }

    /**
     * Return's the realm instance.
     *
     * @return \AppserverIo\Psr\Auth\RealmInterface The realm instance
     */
    public function getRealm()
    {
        return $this->realm;
    }

    /**
     * Return's the name of the realm.
     *
     * @return string The realm's name
     */
    public function getName()
    {
        return $this->getRealm()->getName();
    }

    /**
     * Return's the realm's configuration.
     *
     * @return AppserverIo\Psr\Security\Auth\Login\SecurityDomainConfigurationInterface The realm's configuration
     */
    public function getConfiguration()
    {
        return $this->getRealm()->getConfiguration();
    }

    /**
     * Return's the exception stack.
     *
     * @return \AppserverIo\Collections\ArrayList The exception stack
     */
    public function getExceptionStack()
    {
        return $this->getRealm()->getExceptionStack();
    }

    /**
     * Tries to authenticate the user with the passed username and password.
     *
     * @param \AppserverIo\Lang\String $username The name of the user to authenticate
     * @param \AppserverIo\Lang\String $password The password used for authentication
     *
     * @return \AppserverIo\Security\PrincipalInterface|null The authenticated user principal
     */
    public function authenticate(String $username, String $password)
    {
        return $this->getRealm()->authenticate($username, $password);
    }

    /**
     * Tries to authenticate the user with the passed username and callback handler.
     *
     * @param \AppserverIo\Lang\String                                         $username        The name of the user to authenticate
     * @param \AppserverIo\Psr\Security\Auth\Callback\CallbackHandlerInterface $callbackHandler The callback handler used to load the credentials
     *
     * @return \AppserverIo\Security\PrincipalInterface|null The authenticated user principal
     */
    public function authenticateByUsernameAndCallbackHandler(String $username, CallbackHandlerInterface $callbackHandler)
    {
        return $this->getRealm()->authenticateByUsernameAndCallbackHandler($username, $callbackHandler);
    }
}
