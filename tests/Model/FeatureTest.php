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

use Settings\Model\Feature;
use Settings\Model\FeatureInterface;
use Settings\Model\Setting;
use Settings\Model\SettingGroup;

/**
 * Class FeatureTest
 * @package tests\Settings\Model
 */
class FeatureTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var FeatureInterface
     */
    protected $feature;

    /**
     * Set up this test case
     */
    public function setUp()
    {
        $this->feature = new Feature();
    }

    /**
     * Test that the feature is an instance of FeatureInterface
     */
    public function testIsInstanceOfFeatureInterface()
    {
        $this->assertTrue($this->feature instanceof FeatureInterface);
    }

    /**
     * Test that the properties of the feature object are mutable
     */
    public function testPropertiesAreMutable()
    {
        $this->feature->setName('User Subscriptions');
        $this->assertTrue('User Subscriptions' === $this->feature->getName());
    }

    /**
     * Test that the feature can contain settings
     */
    public function testCanContainSettings()
    {
        $firstSetting = new Setting();
        $secondSetting = new Setting();
        $this->feature->addSetting($firstSetting)->addSetting($secondSetting);
        $this->assertTrue(2 === count($this->feature->getSettings()));
    }

    /**
     * Test that the feature can contain setting groups
     */
    public function testCanContainSettingGroups()
    {
        $firstSettingGroup = new SettingGroup();
        $secondSettingGroup = new SettingGroup();
        $this->feature->addSettingGroup($firstSettingGroup);
        $this->feature->addSettingGroup($secondSettingGroup);
        $this->assertTrue(2 === count($this->feature->getSettingGroups()));
    }
}

