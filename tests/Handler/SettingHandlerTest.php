<?php
/**
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace tests\Settings\Handler;

use Settings\Handler\SettingHandler;
use Settings\Handler\SettingHandlerInterface;
use Settings\Storage\NullStorage;
use Settings\Storage\StorageInterface;
use Stash\Driver\BlackHole;
use Stash\Interfaces\DriverInterface;

class SettingHandlerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Setting handler
     *
     * @var SettingHandlerInterface
     */
    protected $handler;

    /**
     * Set up this test case
     */
    public function setUp()
    {
        $this->handler = new SettingHandler();
    }

    /**
     * Test that the handler is an instance of SettingHandlerInterface
     */
    public function testIsInstanceOfSettingHandlerInterface()
    {
        $this->assertTrue($this->handler instanceof SettingHandlerInterface);
    }

    /**
     * Test that the handler can contain a cache handler
     */
    public function testCanContainCacheHandler()
    {
        $cacheHandler = new BlackHole();
        $this->handler->setCacheHandler($cacheHandler, 600);
        $this->assertTrue($this->handler->getCacheHandler() instanceof DriverInterface);
    }

    /**
     * Test that the handler can contain a storage strategy
     */
    public function testCanContainStorageStrategy()
    {
        $storage = new NullStorage();
        $this->handler->setStorage($storage);
        $this->assertTrue($this->handler->getStorage() instanceof StorageInterface);
    }
}