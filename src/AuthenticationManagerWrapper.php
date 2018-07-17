<?php

/**
 * AppserverIo\Psr\Auth\AuthenticationManagerWrapper
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

use AppserverIo\Psr\Application\ApplicationInterface;
use AppserverIo\Psr\Servlet\Http\HttpServletRequestInterface;
use AppserverIo\Psr\Servlet\Http\HttpServletResponseInterface;

/**
 * The wrapper implementation of a authentication manager.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2016 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io-psr/auth
 * @link      http://www.appserver.io
 */
class AuthenticationManagerWrapper implements AuthenticationManagerInterface
{

    /**
     * The authentication manager instance to be wrapped.
     *
     * @var \AppserverIo\Psr\Auth\AuthenticationManagerInterface
     */
    protected $authenticationManager;

    /**
     * Injects the passed authentication manager instance into this wrapper.
     *
     * @param \AppserverIo\Psr\Auth\AuthenticationManagerInterface $authenticationManager The authentication manager instance used for initialization
     *
     * @return void
     */
    public function injectAuthenticationManager(AuthenticationManagerInterface $authenticationManager)
    {
        $this->authenticationManager = $authenticationManager;
    }

    /**
     * Return's the authentication manager instance.
     *
     * @return \AppserverIo\Psr\Auth\AuthenticationManagerInterface The authentication manager instance
     */
    public function getAuthenticationManager()
    {
        return $this->authenticationManager;
    }

    /**
     * Handles request in order to authenticate.
     *
     * @param \AppserverIo\Psr\Servlet\Http\HttpServletRequestInterface  $servletRequest  The request instance
     * @param \AppserverIo\Psr\Servlet\Http\HttpServletResponseInterface $servletResponse The response instance
     *
     * @return boolean TRUE if the authentication has been successful, else FALSE
     */
    public function handleRequest(HttpServletRequestInterface $servletRequest, HttpServletResponseInterface $servletResponse)
    {
        return $this->getAuthenticationManager()->handleRequest($servletRequest, $servletResponse);
    }

    /**
     * Add's the passed realm the the authentication manager.
     *
     * @param \AppserverIo\Appserver\ServletEngine\Security\RealmInterface $realm The realm to add
     *
     * @return void
     */
    public function addRealm(RealmInterface $realm)
    {
        $this->getAuthenticationManager()->addRealm($realm);
    }

    /**
     * Returns the map with the security domains.
     *
     * @return \AppserverIo\Collections\MapInterface The security domains
     */
    public function getRealms()
    {
        return $this->getAuthenticationManager()->getRealms();
    }

    /**
     * Register's the passed authenticator.
     *
     * @param \AppserverIo\Appserver\ServletEngine\Authenticator\AuthenticatorInterface $authenticator The authenticator to add
     *
     * @return void
     */
    public function addAuthenticator(AuthenticatorInterface $authenticator)
    {
        $this->getAuthenticationManager()->addAuthenticator($authenticator);
    }

    /**
     * Returns the configured authenticator for the passed URL pattern authenticator mapping.
     *
     * @param \AppserverIo\Appserver\ServletEngine\Security\MappingInterface|null $mapping The URL pattern to authenticator mapping
     *
     * @return \AppserverIo\Storage\StorageInterface The storage with the authentication types
     * @throws \AppserverIo\Http\Authentication\AuthenticationException Is thrown if the authenticator with the passed key is not available
     */
    public function getAuthenticator(MappingInterface $mapping = null)
    {
        return $this->getAuthenticationManager()->getAuthenticator($mapping);
    }

    /**
     * Returns the configured authentication types.
     *
     * @return \AppserverIo\Storage\StorageInterface The storage with the authentication types
     */
    public function getAuthenticators()
    {
        return $this->getAuthenticationManager()->getAuthenticators();
    }

    /**
     * Register's a new URL pattern to authentication type mapping.
     *
     * @param \AppserverIo\Appserver\ServletEngine\Security\MappingInterface $mapping The URL pattern to authenticator mapping
     *
     * @return void
     */
    public function addMapping(MappingInterface $mapping)
    {
        $this->getAuthenticationManager()->addMapping($mapping);
    }

    /**
     * Return's the storage for the URL pattern to authenticator mappings.
     *
     * @return \AppserverIo\Storage\StorageInterface The storage instance
     */
    public function getMappings()
    {
        return $this->getAuthenticationManager()->getMappings();
    }

    /**
     * Returns the realm with the passed name.
     *
     * @param string $realmName The name of the requested realm
     *
     * @return object The requested realm instance
     */
    public function getRealm($realmName)
    {
        return $this->getAuthenticationManager()->getRealm($realmName);
    }

    /**
     * The managers unique identifier.
     *
     * @return string The unique identifier
     */
    public function getIdentifier()
    {
        return $this->getAuthenticationManager()->getIdentifier();
    }

    /**
     * Has been automatically invoked by the container after the application
     * instance has been created.
     *
     * @param \AppserverIo\Psr\Application\ApplicationInterface $application The application instance
     *
     * @return void
     */
    public function initialize(ApplicationInterface $application)
    {
        return $this->getAuthenticationManager()->initialize($application);
    }

    /**
     * Returns the value with the passed name from the context.
     *
     * @param string $key The key of the value to return from the context.
     *
     * @return mixed The requested attribute
     */
    public function getAttribute($key)
    {
        return $this->getAuthenticationManager()->getAttribute($key);
    }

    /**
     * Stops the manager instance.
     *
     * @return void
     */
    public function stop()
    {
        $this->getAuthenticationManager()->stop();
    }

    /**
     * Lifecycle callback that'll be invoked after the application has been started.
     *
     * @param \AppserverIo\Psr\Application\ApplicationInterface $application The application instance
     *
     * @return void
     */
    public function postStartup(ApplicationInterface $application)
    {
        $this->getAuthenticationManager()->postStartup($application);
    }
}
