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

namespace Settings\Handler\Collection;

use Settings\Handler\SettingHandlerInterface;

/**
 * Setting handler collection interface for a collection of setting handlers
 *
 * Interface SettingHandlerCollectionInterface
 * @package Settings\Handler\Collection
 */
interface SettingHandlerCollectionInterface extends \ArrayAccess, \IteratorAggregate
{
    /**
     * Add a handler to this collection
     *
     * @param SettingHandlerInterface $handler
     * @return mixed
     */
    public function addHandler(SettingHandlerInterface $handler);

    /**
     * Set handlers for this collection
     *
     * @param SettingHandlerInterface[] $handlers
     * @return mixed
     */
    public function setHandlers(array $handlers);

    /**
     * Get the handlers in this collection
     *
     * @return SettingHandlerInterface[]
     */
    public function getHandlers();
}