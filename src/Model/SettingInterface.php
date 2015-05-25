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
 * Setting interface for a setting
 *
 * Interface SettingInterface
 * @package Settings\Model
 */
interface SettingInterface
{
    /**
     * @return mixed
     */
    public function getKey();

    /**
     * Set the key
     *
     * @param string $key
     * @return mixed
     */
    public function setKey($key);

    /**
     * Get the value
     *
     * @return mixed
     */
    public function getValue();

    /**
     * Set the value
     *
     * @param mixed $value
     * @return mixed
     */
    public function setValue($value);

    /**
     * Get the environment
     *
     * @return mixed
     */
    public function getEnvironment();

    /**
     * Set the environment
     *
     * @param mixed $environment
     * @return mixed
     */
    public function setEnvironment($environment);

    /**
     * Get the properties as an array
     *
     * @return mixed
     */
    public function getAsArray();

    /**
     * Hydrate the setting
     *
     * @param array $data
     * @return mixed
     */
    public function hydrate(array $data);
}