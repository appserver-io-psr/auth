<?php

/**
 * AppserverIo\Psr\Auth\MappingWrapper
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

/**
 * A wrapper implementatio for a URL pattern to an authenticator mapping.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2016 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io-psr/auth
 * @link      http://www.appserver.io
 */
class MappingWrapper implements MappingInterface
{

    /**
     * The mapping instance to be wrapped.
     *
     * @var \AppserverIo\Psr\Auth\MappingInterface
     */
    protected $mapping;

    /**
     * Injects the passed mapping instance into this wrapper.
     *
     * @param \AppserverIo\Psr\Auth\MappingInterface $mapping The mapping instance used for initialization
     *
     * @return void
     */
    public function injectMapping(MappingInterface $mapping)
    {
        $this->mapping = $mapping;
    }

    /**
     * Return's the mapping instance.
     *
     * @return \AppserverIo\Psr\Auth\MappingInterface The mapping instance
     */
    public function getMapping()
    {
        return $this->mapping;
    }

    /**
     * Return's the URL pattern.
     *
     * @return string The URL pattern
     */
    public function getUrlPattern()
    {
        return $this->getMapping()->getUrlPattern();
    }

    /**
     * Return's the authenticator serial.
     *
     * @return string The authenticator serial
     */
    public function getAuthenticatorSerial()
    {
        return $this->getMapping()->getAuthenticatorSerial();
    }

    /**
     * Return's the role names.
     *
     * @return array The role names
     */
    public function getRoleNames()
    {
        return $this->getMapping()->getRoleNames();
    }

    /**
     * Return's the HTTP methods that has to be authenticated.
     *
     * @return array The HTTP methods
     */
    public function getHttpMethods()
    {
        return $this->getMapping()->getHttpMethods();
    }

    /**
     * Return's the HTTP methods that has to b omissed from authentication
     *
     * @return array The HTTP methods
     */
    public function getHttpMethodOmissions()
    {
        return $this->getMapping()->getHttpMethodOmissions();
    }

    /**
     * Return's TRUE if the passed request matches the mappings URL patter.
     *
     * @param \AppserverIo\Psr\Servlet\Http\HttpServletRequestInterface $servletRequest The request to match
     *
     * @return boolean TRUE if the request matches, else FALSE
     */
    public function match(HttpServletRequestInterface $servletRequest)
    {
        return $this->getMapping()->match($servletRequest);
    }
}
