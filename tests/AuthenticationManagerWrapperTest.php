<?php

/**
 * AppserverIo\Psr\Auth\AuthenticationManagerWrapperTest
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
 * Test for the authentication manager wrapper implementation.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2016 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io-psr/auth
 * @link      http://www.appserver.io
 */
class AuthenticationManagerWrapperTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test if the handleRequest() method works as expected.
     *
     * @return void
     */
    public function testHandleRequest()
    {

        // mock servlet request/response
        $mockServletRequest = $this->getMock('AppserverIo\Psr\Servlet\Http\HttpServletRequestInterface');
        $mockServletResponse = $this->getMock('AppserverIo\Psr\Servlet\Http\HttpServletResponseInterface');

        // create a stub for the AuthenticationManager interface
        $stub = $this->getMock('\AppserverIo\Psr\Auth\AuthenticationManagerInterface');

        // configure the stub
        $stub->expects($this->once())
             ->method('handleRequest')
             ->with($mockServletRequest, $mockServletResponse)
             ->will($this->returnValue($return = true));

        // create a new wrapper instance
        $wrapper = new AuthenticationManagerWrapper();
        $wrapper->injectAuthenticationManager($stub);

        // check if the correct password will be returned
        $this->assertSame($return, $wrapper->handleRequest($mockServletRequest, $mockServletResponse));
    }
}
