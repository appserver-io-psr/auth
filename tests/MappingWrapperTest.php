<?php

/**
 * AppserverIo\Psr\Auth\MappingWrapperTest
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

use AppserverIo\Collections\ArrayList;

/**
 * Test for the mapping wrapper implementation.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2016 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io-psr/auth
 * @link      http://www.appserver.io
 */
class MappingWrapperTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test if the getRoleNames() method works as expected.
     *
     * @return void
     */
    public function testGeRoleNames()
    {

        // create a stub for the Mapping interface
        $stub = $this->getMock('\AppserverIo\Psr\Auth\MappingInterface');

        // configure the stub
        $stub->expects($this->once())
             ->method('getRoleNames')
             ->will($this->returnValue($return = array()));

        // create a new wrapper instance
        $wrapper = new MappingWrapper();
        $wrapper->injectMapping($stub);

        // check if the correct instance will be returned
        $this->assertSame($return, $wrapper->getRoleNames());
    }
}
