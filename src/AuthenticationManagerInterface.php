<?php

/**
 * AppserverIo\Psr\Auth\AuthenticationManagerInterface
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

use AppserverIo\Psr\Application\ManagerInterface;
use AppserverIo\Psr\Servlet\Http\HttpServletRequestInterface;
use AppserverIo\Psr\Servlet\Http\HttpServletResponseInterface;

/**
 * The interface for all authentication manager to implement.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2016 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io-psr/auth
 * @link      http://www.appserver.io
 */
interface AuthenticationManagerInterface extends ManagerInterface
{

    /**
     * The unique identifier to be registered in the application context.
     *
     * @var string
     */
    const IDENTIFIER = 'AuthenticationManagerInterface';

    /**
     * Handles request in order to authenticate.
     *
     * @param \AppserverIo\Psr\Servlet\Http\HttpServletRequestInterface  $servletRequest  The request instance
     * @param \AppserverIo\Psr\Servlet\Http\HttpServletResponseInterface $servletResponse The response instance
     *
     * @return boolean TRUE if the authentication has been successful, else FALSE
     */
    public function handleRequest(HttpServletRequestInterface $servletRequest, HttpServletResponseInterface $servletResponse);

    /**
     * Add's the passed realm the the authentication manager.
     *
     * @param \AppserverIo\Appserver\ServletEngine\Security\RealmInterface $realm The realm to add
     *
     * @return void
     */
    public function addRealm(RealmInterface $realm);

    /**
     * Returns the map with the security domains.
     *
     * @return \AppserverIo\Collections\MapInterface The security domains
     */
    public function getRealms();

    /**
     * Register's the passed authenticator.
     *
     * @param \AppserverIo\Appserver\ServletEngine\Authenticator\AuthenticatorInterface $authenticator The authenticator to add
     *
     * @return void
     */
    public function addAuthenticator(AuthenticatorInterface $authenticator);

    /**
     * Returns the configured authenticator for the passed URL pattern authenticator mapping.
     *
     * @param \AppserverIo\Appserver\ServletEngine\Security\MappingInterface|null $mapping The URL pattern to authenticator mapping
     *
     * @return \AppserverIo\Storage\StorageInterface The storage with the authentication types
     * @throws \AppserverIo\Http\Authentication\AuthenticationException Is thrown if the authenticator with the passed key is not available
     */
    public function getAuthenticator(MappingInterface $mapping = null);

    /**
     * Returns the configured authentication types.
     *
     * @return \AppserverIo\Storage\StorageInterface The storage with the authentication types
     */
    public function getAuthenticators();

    /**
     * Register's a new URL pattern to authentication type mapping.
     *
     * @param \AppserverIo\Appserver\ServletEngine\Security\MappingInterface $mapping The URL pattern to authenticator mapping
     *
     * @return void
     */
    public function addMapping(MappingInterface $mapping);

    /**
     * Return's the storage for the URL pattern to authenticator mappings.
     *
     * @return \AppserverIo\Storage\StorageInterface The storage instance
     */
    public function getMappings();

    /**
     * Returns the realm with the passed name.
     *
     * @param string $realmName The name of the requested realm
     *
     * @return object The requested realm instance
     */
    public function getRealm($realmName);

    /**
     * Returns the value with the passed name from the context.
     *
     * @param string $key The key of the value to return from the context.
     *
     * @return mixed The requested attribute
     */
    public function getAttribute($key);
}
