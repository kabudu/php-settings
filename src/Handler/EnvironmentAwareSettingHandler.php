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

namespace Settings\Handler;

use Settings\Model\Setting;
use Settings\Model\SettingInterface;

/**
 * Environment aware setting handler
 *
 * Class EnvironmentAwareSettingHandler
 * @package Settings\Handler
 */
class EnvironmentAwareSettingHandler extends SettingHandler
{
    /**
     * The environment
     *
     * @var string
     */
    protected $environment;

    /**
     * Get a setting
     *
     * @param string $key
     * @return SettingInterface
     */
    public function get($key)
    {
        if(isset($this->cacheHandler)) {
            $settingData = $this->cacheHandler->getData(sprintf("%s-$key",$this->environment));
            if($settingData) {
                $setting = new Setting();
                $setting->hydrate($settingData['data']);
            } else {
                /** @var SettingInterface $setting */
                $setting = $this->storage->fetch(array('key' => $key, 'environment' =>  $this->environment));
                $this->cacheHandler->storeData($key,$setting->getAsArray(),$this->cacheExpiry);
            }
            return $setting;
        }

        return $this->storage->fetch(array('key' => $key, 'environment' =>  $this->environment));
    }

    /**
     * Set a setting
     *
     * @param string $key
     * @param mixed $value
     * @return SettingInterface
     */
    public function set($key, $value)
    {
        if(isset($this->cacheHandler)) {
            $this->cacheHandler->storeData(sprintf("%s-$key",$this->environment), array(
                'key'   =>  $key,
                'value' =>  $value,
                'environment'   =>  $this->environment
            ), $this->cacheExpiry);
        }

        return $this->storage->save(array(
            'key'   =>  $key,
            'value' =>  $value,
            'environment'   =>  $this->environment
        ));
    }

    /**
     * Set the environment
     *
     * @param $environment
     * @return SettingHandlerInterface
     */
    public function setEnvironment($environment)
    {
        $this->environment = $environment;

        return $this;
    }

    /**
     * Get the environment
     *
     * @return string
     */
    public function getEnvironment()
    {
        return $this->environment;
    }
}