<?php

/**
 * AppserverIo\Psr\Auth\AuthenticatorWrapper
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

use AppserverIo\Psr\Servlet\Http\HttpServletRequestInterface;
use AppserverIo\Psr\Servlet\Http\HttpServletResponseInterface;

/**
 * Wrapper for a authentication type implementation.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2016 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io-psr/auth
 * @link      http://www.appserver.io
 */
class AuthenticatorWrapper implements AuthenticatorInterface
{

    /**
     * The authenticator instance to be wrapped.
     *
     * @var \AppserverIo\Psr\Auth\AuthenticatorInterface
     */
    protected $authenticator;

    /**
     * Injects the passed authenticator instance into this wrapper.
     *
     * @param \AppserverIo\Psr\Auth\AuthenticatorInterface $authenticator The authenticator instance used for initialization
     *
     * @return void
     */
    public function injectAuthenticator(AuthenticatorInterface $authenticator)
    {
        $this->authenticator = $authenticator;
    }

    /**
     * Return's the authenticator instance.
     *
     * @return \AppserverIo\Psr\Auth\AuthenticatorInterface The authenticator instance
     */
    public function getAuthenticator()
    {
        return $this->authenticator;
    }

    /**
     * Returns the configuration data given for authentication type.
     *
     * @return object The configuration data
     */
    public function getConfigData()
    {
        return $this->getAuthenticator()->getConfigData();
    }

    /**
     * Return's the authentication manager instance.
     *
     * @return \AppserverIo\Psr\Auth\AuthenticationManagerInterface The authentication manager instance
     */
    public function getAuthenticationManager()
    {
        return $this->getAuthenticator()->getAuthenticationManager();
    }

    /**
     * Returns the authentication type token.
     *
     * @return string The auth type
     */
    public function getAuthType()
    {
        return $this->getAuthenticator()->getType();
    }

    /**
     * Try to authenticate against the configured adapter.
     *
     * @param \AppserverIo\Psr\Servlet\Http\HttpServletRequestInterface  $servletRequest  The servlet request instance
     * @param \AppserverIo\Psr\Servlet\Http\HttpServletResponseInterface $servletResponse The servlet response instance
     *
     * @return boolean TRUE if authentication has already been processed on a request before, else FALSE
     * @throws \AppserverIo\Http\Authentication\AuthenticationException Is thrown if the request can't be authenticated
     */
    public function authenticate(HttpServletRequestInterface $servletRequest, HttpServletResponseInterface $servletResponse)
    {
        return $this->getAuthenticator()->authenticate($servletRequest, $servletResponse);
    }

    /**
     * Returns the password parsed from the request.
     *
     * @return string|null The password
     */
    public function getPassword()
    {
        return $this->getAuthenticator()->getPassword();
    }

    /**
     * Returns the username parsed from the request.
     *
     * @return string|null The username
     */
    public function getUsername()
    {
        return $this->getAuthenticator()->getUsername();
    }

    /**
     * Mark's the authenticator as the default one.
     *
     * @return void
     */
    public function setDefaultAuthenticator()
    {
        $this->getAuthenticator()->setDefaultAuthenticator();
    }

    /**
     * Query whether or not this is the default authenticator.
     *
     * @return boolean TRUE if this is the default authenticator, else FALSE
     */
    public function isDefaultAuthenticator()
    {
        return $this->getAuthenticator()->isDefaultAuthenticator();
    }
}
