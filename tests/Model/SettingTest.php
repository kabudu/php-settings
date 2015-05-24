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

namespace tests\Settings\Model;

use Settings\Model\Setting;
use Settings\Model\SettingInterface;

/**
 * Class SettingTest
 * @package tests\Settings\Model
 */
class SettingTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SettingInterface
     */
    protected $setting;

    /**
     * Set up this test case
     */
    public function setUp()
    {
        $this->setting = new Setting();
    }

    /**
     * Test that the setting is an instance of SettingInterface
     */
    public function testIsInstanceOfSettingInterface()
    {
        $this->assertTrue($this->setting instanceof SettingInterface);
    }

    /**
     * Test that the properties of the setting object are mutable
     */
    public function testPropertiesAreMutable()
    {
        $this->setting->setKey('MY_KEY');
        $this->assertTrue('MY_KEY' === $this->setting->getKey());
    }

    /**
     * Test that the properties of the setting object can be retrieved as an array
     */
    public function testCanGetAsArray()
    {
        $this->assertTrue(is_array($this->setting->getAsArray()));
    }
}

