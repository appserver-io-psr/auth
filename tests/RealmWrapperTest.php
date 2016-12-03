<?php

/**
 * AppserverIo\Psr\Auth\ProviderWrapperTest
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
 * Test for the realm wrapper implementation.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2016 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io-psr/auth
 * @link      http://www.appserver.io
 */
class RealmWrapperTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test if the getExceptionStack() method works as expected.
     *
     * @return void
     */
    public function testGeExceptionStack()
    {

        // create a stub for the Realm interface
        $stub = $this->getMock('\AppserverIo\Psr\Auth\RealmInterface');

        // configure the stub
        $stub->expects($this->once())
             ->method('getExceptionStack')
             ->will($this->returnValue(new ArrayList()));

        // create a new wrapper instance
        $wrapper = new RealmWrapper();
        $wrapper->injectRealm($stub);

        // check if the correct instance will be returned
        $this->assertInstanceOf('\AppserverIo\Collections\ArrayList', $wrapper->getExceptionStack());
    }
}
