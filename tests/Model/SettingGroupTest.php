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

use Settings\Model\FeatureInterface;
use Settings\Model\Setting;
use Settings\Model\SettingGroup;
use Settings\Model\SettingGroupInterface;

/**
 * Class SettingGroupTest
 * @package tests\Settings\Model
 */
class SettingGroupTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SettingGroupInterface
     */
    protected $settingGroup;

    /**
     * Set up this test case
     */
    public function setUp()
    {
        $this->settingGroup = new SettingGroup();
    }

    /**
     * Test that the setting group is an instance of SettingGroupInterface
     */
    public function testIsInstanceOfSettingGroupInterface()
    {
        $this->assertTrue($this->settingGroup instanceof SettingGroupInterface);
    }

    /**
     * Test that the properties of the setting group object are mutable
     */
    public function testPropertiesAreMutable()
    {
        $this->settingGroup->setName('User Subscription User Settings');
        $this->assertTrue('User Subscription User Settings' === $this->settingGroup->getName());
    }

    /**
     * Test that the setting group can contain settings
     */
    public function testCanContainSettings()
    {
        $firstSetting = new Setting();
        $secondSetting = new Setting();
        $this->settingGroup->addSetting($firstSetting)->addSetting($secondSetting);
        $this->assertTrue(2 === count($this->settingGroup->getSettings()));
    }
}

