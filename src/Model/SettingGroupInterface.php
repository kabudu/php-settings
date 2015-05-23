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
 * Setting group interface for a setting group
 *
 * Interface SettingGroupInterface
 * @package Settings\Model
 */
interface SettingGroupInterface
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
     * Get the key
     *
     * @return mixed
     */
    public function getKey();

    /**
     * Set the key
     *
     * @param $key
     * @return mixed
     */
    public function setKey($key);

    /**
     * Add a setting
     *
     * @param SettingInterface $setting
     * @return mixed
     */
    public function addSetting(SettingInterface $setting);

    /**
     * Get settings
     *
     * @return SettingInterface[]
     */
    public function getSettings();
}