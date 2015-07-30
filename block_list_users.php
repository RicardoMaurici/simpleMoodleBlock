<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
/**
 * list_users block caps.
 *
 * @package    block_list_users
 * @copyright  Ricardo Ferreira
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();
class block_list_users extends block_list {
    function init() {
        $this->title = get_string('list_users', 'block_list_users');
    }
    function get_content() {
        global $CFG, $OUTPUT;

        if ($this->content !== null) {
            return $this->content;
        }

        $this->content = new stdClass();
        $this->content->items = array();
        $this->content->icons = array();
        $this->content->footer = '';


        $currentcontext = $this->page->context->get_course_context(false);

        $icon = '<img src="'.$OUTPUT->pix_url('i/users') . '" class="icon" alt="" />';

        $this->content->items[] = '<a title="'.get_string('button_list', 'block_list_users').'" href="'.
            $CFG->wwwroot.'/user/index.php?contextid='.$currentcontext->id.'">'.$icon.get_string('button_list', 'block_list_users').'</a>';

        return $this->content;
    }


    public function applicable_formats() {
        return array('all' => true,  'my' => false, 'tag' => false);
    }
}