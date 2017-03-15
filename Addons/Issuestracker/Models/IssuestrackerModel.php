<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace System\Addons\Issuestracker\Models;

use Kazist\KazistFactory;

class IssuestrackerModel {

    public $block_id = '';

    public function getInfo() {
        return 'Hello World!';
    }

    public function getScript() {

        $factory = new KazistFactory();

        $project_tag = $factory->getSetting('system.block.issuestracker.project_tag', $this->flexview_id);
        $issues_tracker_website = $factory->getSetting('system.block.issuestracker.website', $this->flexview_id);

        if ($project_tag == '' || $issues_tracker_website == '') {
            $script = "alert('Issue Tracker Has Failed. Project tag or Issue Tracker Website is Empty')";
        } else {
            // $document->addScriptDeclaration("alert('Hello World');");
            $script = " \n"
                    . "var issue_tracker_project; \n"
                    . "var issue_tracker_website; \n"
                    . "window.onload = function(){ \n"
                    . "issue_tracker_project = \"" . $project_tag . "\"; \n"
                    . "issue_tracker_website =\"" . $issues_tracker_website . "\"; \n"
                    . "var tracker_script = document.createElement('script'); \n "
                    . "tracker_script.setAttribute('src', issue_tracker_website + 'assets/js/issues_tracker.js'); \n"
                    . "document.body.appendChild(tracker_script);  \n"
                    . "};\n\n";
        }
        return $script;
    }

}
