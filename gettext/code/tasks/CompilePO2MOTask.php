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
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

/**
 * Class CompilePO2MOTask
 */
final class CompilePO2MOTask extends BuildTask {

    /**
     * @return void
     */
    public function run($request)
    {
        try {
            $module = $request->requestVar('module');
            if(empty($module)) {
                $module = 'gettext';
            }

            $path =sprintf("%s/%s/_config/translations.yml", Director::baseFolder(), $module);
            echo "reading translation list from ".$path.' ...'.PHP_EOL;;
            $yaml = Yaml::parse(file_get_contents($path));
            if(!is_null($yaml) && count($yaml))
            {
                foreach($yaml as $project_id => $info){
                    $version_id = $info['version_id'];
                    $po_files = $info['po_files'];
                    foreach ($po_files as $po_file){
                        foreach ($po_file as $doc_id => $languages) {
                            foreach($languages as $language) {
                                $file_path = sprintf('%s/%s/Locale/%s/LC_MESSAGES/%s', Director::baseFolder(), $module, $language['lang_local'], $doc_id);
                                echo sprintf("compiling file %s.po", $file_path).PHP_EOL;
                                shell_exec(sprintf('msgfmt -c %s.po -o %s.mo', $file_path, $file_path));
                            }
                        }
                    }
                }
            }
            echo "Ending Translation compile process ...".PHP_EOL;
        }
        catch (ParseException $e) {
            echo printf("Unable to parse the YAML string: %s", $e->getMessage()).PHP_EOL;
        }
    }
}