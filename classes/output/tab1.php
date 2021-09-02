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

declare(strict_types=1);

namespace local_dynamictabsdemo\output;

use context_system;
use core\output\dynamic_tabs\base;
use core_reportbuilder\system_report_factory;
use renderer_base;
use report_configlog\local\systemreports\config_changes;
use stdClass;

defined('MOODLE_INTERNAL') || die();

/**
 * Example tab class
 *
 * @package     local_dynamictabsdemo
 * @copyright   2021 David Matamoros <davidmc@moodle.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class tab1 extends base {

    /**
     * Export this for use in a mustache template context.
     *
     * @param renderer_base $output
     * @return stdClass
     */
    public function export_for_template(renderer_base $output) {
        $content = (object)[];
        $report = system_report_factory::create(config_changes::class, context_system::instance());
        $content->content = $report->output();

        return $content;
    }

    /**
     * The label to be displayed on the tab
     *
     * @return string
     */
    public function get_tab_label(): string {
        return get_string('tab1', 'local_dynamictabsdemo');
    }

    /**
     * Check permission of the current user to access this tab
     *
     * @return bool
     */
    public function is_available(): bool {
        // Define the correct permissions here.
        return true;
    }

    /**
     * Template to use to display tab contents
     *
     * @return string
     */
    public function get_template(): string {
        return 'local_dynamictabsdemo/tabs/tab1';
    }
}
