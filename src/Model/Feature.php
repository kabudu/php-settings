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
 * Class Feature
 * @package Settings\Model
 */
class Feature implements FeatureInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var SettingInterface[]
     */
    protected $settings = array();

    /**
     * @var SettingGroupInterface[]
     */
    protected $settingGroups = array();

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
     * @return FeatureInterface
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
     * @return FeatureInterface
     */
    public function addSetting(SettingInterface $setting)
    {
        $this->settings[] = $setting;

        return $this;
    }

    /**
     * Add a setting group
     *
     * @param SettingGroupInterface $settingGroup
     * @return FeatureInterface
     */
    public function addSettingGroup(SettingGroupInterface $settingGroup)
    {
        $this->settingGroups[] = $settingGroup;

        return $this;
    }

    /**
     * Get settings
     *
     * @return SettingInterface[]
     */
    public function getSettings()
    {
        if(!empty($this->settingGroups)) {
            foreach($this->settingGroups as $settingGroup) {
                foreach($settingGroup->getSettings() as $setting) {
                    $this->addSetting($setting);
                }
            }
        }

        return $this->settings;
    }

    /**
     * Get setting groups
     *
     * @return SettingGroupInterface[]
     */
    public function getSettingGroups()
    {
        return $this->settingGroups;
    }

    /**
     * Set settings for this feature
     *
     * @param SettingInterface[] $settings
     * @return FeatureInterface
     */
    public function setSettings(array $settings)
    {
        $this->settings = $settings;

        return $this;
    }

    /**
     * Set setting groups for this feature
     *
     * @param SettingGroupInterface[] $settingGroups
     * @return FeatureInterface
     */
    public function setSettingGroups(array $settingGroups)
    {
        $this->settingGroups = $settingGroups;

        return $this;
    }
}