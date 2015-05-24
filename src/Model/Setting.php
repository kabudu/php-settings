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
 * Class Setting
 * @package Settings\Model
 */
class Setting implements SettingInterface
{
    /**
     * @var string
     */
    protected $key;

    /**
     * @var mixed
     */
    protected $value;

    /**
     * @var mixed
     */
    protected $environment;
    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set the key
     *
     * @param string $key
     * @return SettingInterface
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get the value
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the value
     *
     * @param mixed $value
     * @return SettingInterface
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get the environment
     *
     * @return mixed
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * Set the environment
     *
     * @param mixed $environment
     * @return SettingInterface
     */
    public function setEnvironment($environment)
    {
        $this->environment = $environment;

        return $this;
    }

    /**
     * Get the properties of this setting as an array
     *
     * @return mixed
     */
    public function getAsArray()
    {
        return [
            'key'   =>  $this->getKey(),
            'value' =>  $this->getValue(),
            'environment'   =>  $this->getEnvironment()
        ];
    }
}