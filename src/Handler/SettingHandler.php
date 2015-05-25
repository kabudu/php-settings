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
use Settings\Storage\StorageInterface;
use Stash\Interfaces\DriverInterface;
use Stash\Interfaces\PoolInterface;
use Settings\Model\SettingInterface;

/**
 * A basic setting handler implementation
 *
 * Class SettingHandler
 * @package Settings\Handler
 */
class SettingHandler implements SettingHandlerInterface
{
    /**
     * Cache expiry time
     *
     * @var int
     */
    protected $cacheExpiry;

    /**
     * Storage strategy
     *
     * @var StorageInterface
     */
    protected $storage;

    /**
     * Cache handler
     *
     * @var DriverInterface|PoolInterface
     */
    protected $cacheHandler;

    /**
     * Get a setting
     *
     * @param string $key
     * @return SettingInterface
     */
    public function get($key)
    {
        if(isset($this->cacheHandler)) {
            $settingData = $this->cacheHandler->getData($key);
            if($settingData) {
                $setting = new Setting();
                $setting->hydrate($settingData['data']);
            } else {
                /** @var SettingInterface $setting */
                $setting = $this->storage->fetch(array('key' => $key));
                $this->cacheHandler->storeData($key,$setting->getAsArray(),$this->cacheExpiry);
            }
            return $setting;
        }

        return $this->storage->fetch(array('key' => $key));
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
            $this->cacheHandler->storeData($key, array(
                'key'   =>  $key,
                'value' =>  $value
            ), $this->cacheExpiry);
        }

        return $this->storage->save(array(
            'key'   =>  $key,
            'value' =>  $value
        ));
    }

    /**
     * Set a storage strategy for this handler
     *
     * @param StorageInterface $storage
     * @return SettingHandlerInterface
     */
    public function setStorage(StorageInterface $storage)
    {
        $this->storage = $storage;

        return $this;
    }

    /**
     * Get the storage strategy for this handler
     *
     * @return StorageInterface
     */
    public function getStorage()
    {
        return $this->storage;
    }

    /**
     * Set a cache handler
     *
     * @param PoolInterface|DriverInterface $handler
     * @param integer $expiry
     * @return SettingHandlerInterface
     */
    public function setCacheHandler($handler, $expiry)
    {
        $this->cacheHandler = $handler;
        $this->cacheExpiry = $expiry;

        return $this;
    }

    /**
     * Get the cache handler
     *
     * @return PoolInterface|DriverInterface
     */
    public function getCacheHandler()
    {
        return $this->cacheHandler;
    }
}