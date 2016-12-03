<?php

/**
 * \AppserverIo\Appserver\Core\Api\Node\FormLoginConfigNodeInterface
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

/**
 * Interface for a login form configuration DTO implementation.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2016 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io-psr/auth
 * @link      http://www.appserver.io
 */
interface FormLoginConfigurationInterface
{

    /**
     * Return's the form login page information.
     *
     * @return \AppserverIo\Configuration\Interfaces\NodeValueInterface The form login page information
     */
    public function getFormLoginPage();

    /**
     * Return's the form error page information.
     *
     * @return \AppserverIo\Configuration\Interfaces\NodeValueInterface The form error page information
     */
    public function getFormErrorPage();
}
