<?php
/**
 * Copyright 2015 OpenStack Foundation
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 **/

interface ISummitPackage extends IEntity {
    /**
     * @return bool
     */
    public function SoldOut();

    /**
     * @throws EntityValidationException
     * @return void
     */
    public function sell();

    /**
     * @param int $page_id
     * @return bool
     */
    public function isParentPage($page_id);

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getSummitName();

}