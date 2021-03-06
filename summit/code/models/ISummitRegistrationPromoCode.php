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
interface ISummitRegistrationPromoCode extends IEntity
{
    /**
     * @return string
     */
    public function getCode();

    /**
     * @return Summit
     */
    public function getSummit();

    /**
     * @return array
     */
    static public function getTypes();

    /**
     * @return boolean
     */
    public function hasOwner();

    public function setCode($code);

    public function setSummit($summit_id);

    public function setEmailSent($email_sent);

    public function setRedeemed($redeemed);

    public function setSource($source);
}