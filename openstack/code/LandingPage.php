<?php
/**
 * Copyright 2014 Openstack Foundation
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
class LandingPage  extends Page {
    function getCMSFields() {
        $fields = parent::getCMSFields();
        // remove unneeded fields
        $fields->removeFieldFromTab("Root.Main","Content");
        return $fields;
    }

    // LandingPage can't contain children
    static $allowed_children = "none";

    static $defaults = array(
		'ShowInMenus' => false
	);

}

class LandingPage_Controller extends Page_Controller {
    public function init() {
        parent::init();
        Requirements::customScript("Shadowbox.init();");
    }
}