<?php
/**
 * Copyright 2017 OpenStack Foundation
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

/**
 * Class NullAbleInt
 */
class NullAbleInt extends Int
{
    function __construct($name, $defaultVal = 'NULL') {
        parent::__construct($name);
        $this->defaultVal = $defaultVal;
    }

    public function nullValue() {
        return NULL;
    }

    function requireField() {
        $parts  = Array
        (
            'datatype'   => 'int',
            'precision'  => 11,
            'null'       => 'null',
            'default'    => $this->defaultVal,
            'arrayValue' => $this->arrayValue
        );

        $values = Array('type'=>'int', 'parts'=>$parts);

        DB::requireField($this->tableName, $this->name, $values);
    }


    function prepValueForDB($value) {

        if($value === NULL || 'null' === strtolower($value)) {
            return 'NULL';
        }
        return parent::prepValueForDB($value);
    }

}