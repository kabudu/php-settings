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

namespace Settings\Model;

/**
 * Feature interface for a feature
 *
 * Interface FeatureInterface
 * @package Settings\Model
 */
interface FeatureInterface
{
    /**
     * Get the name
     *
     * @return mixed
     */
    public function getName();

    /**
     * Set the name
     *
     * @param string $name
     * @return mixed
     */
    public function setName($name);

    /**
     * Add a setting
     *
     * @param SettingInterface $setting
     * @return mixed
     */
    public function addSetting(SettingInterface $setting);

    /**
     * Add a setting group
     *
     * @param SettingGroupInterface $settingGroup
     * @return mixed
     */
    public function addSettingGroup(SettingGroupInterface $settingGroup);

    /**
     * Get settings
     *
     * @return SettingInterface[]
     */
    public function getSettings();

    /**
     * Get setting groups
     *
     * @return SettingGroupInterface[]
     */
    public function getSettingGroups();

    /**
     * Set settings for this feature
     *
     * @param SettingInterface[] $settings
     * @return mixed
     */
    public function setSettings(array $settings);

    /**
     * Set setting groups for this feature
     *
     * @param SettingGroupInterface[] $settingGroups
     * @return mixed
     */
    public function setSettingGroups(array $settingGroups);
}