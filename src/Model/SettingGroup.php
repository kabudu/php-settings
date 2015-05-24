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

class SettingGroup implements SettingGroupInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var SettingInterface[]
     */
    protected $settings;

    /**
     * Get the name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the name
     *
     * @param string $name
     * @return SettingGroupInterface
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Add a setting
     *
     * @param SettingInterface $setting
     * @return SettingGroupInterface
     */
    public function addSetting(SettingInterface $setting)
    {
        $this->settings[] = $setting;

        return $this;
    }

    /**
     * Get settings
     *
     * @return SettingInterface[]
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * Set settings for this setting group
     *
     * @param array $settings
     * @return SettingGroupInterface
     */
    public function setSettings(array $settings)
    {
        $this->settings = $settings;

        return $this;
    }
}