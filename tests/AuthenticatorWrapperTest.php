<?php

/**
 * AppserverIo\Psr\Auth\AuthenticatorWrapperTest
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
 * Test for the authenticator wrapper implementation.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2016 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io-psr/auth
 * @link      http://www.appserver.io
 */
class AuthenticatorWrapperTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test if the getPassword() method works as expected.
     *
     * @return void
     */
    public function testGetPassword()
    {

        // create a stub for the Authenticator interface
        $stub = $this->getMock('\AppserverIo\Psr\Auth\AuthenticatorInterface');

        // configure the stub
        $stub->expects($this->once())
             ->method('getPassword')
             ->will($this->returnValue($return = 'test'));

        // create a new wrapper instance
        $wrapper = new AuthenticatorWrapper();
        $wrapper->injectAuthenticator($stub);

        // check if the correct password will be returned
        $this->assertSame($return, $wrapper->getPassword());
    }
}
