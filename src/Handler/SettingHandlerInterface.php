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

use Settings\Storage\StorageInterface;
use Stash\Interfaces\PoolInterface;
use Stash\Interfaces\DriverInterface;

/**
 * Setting handler interface for a setting handler
 *
 * Interface SettingHandlerInterface
 * @package Settings\Handler
 */
interface SettingHandlerInterface
{
    /**
     * Get a setting
     *
     * @param string $key
     * @return mixed
     */
    public function get($key);

    /**
     * Set a setting
     *
     * @param string $key
     * @param mixed $value
     * @param mixed $default
     * @return mixed
     */
    public function set($key, $value, $default = NULL);

    /**
     * Set a storage strategy for this handler
     *
     * @param StorageInterface $storage
     * @return mixed
     */
    public function setStorage(StorageInterface $storage);

    /**
     * Get the storage strategy for this handler
     *
     * @return StorageInterface
     */
    public function getStorage();

    /**
     * Set a cache handler
     *
     * @param PoolInterface|DriverInterface $handler
     * @return mixed
     */
    public function setCacheHandler($handler);
}