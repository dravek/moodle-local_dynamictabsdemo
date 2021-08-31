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
 * Dynamic tabs demo
 *
 * @package   local_dynamictabsdemo
 * @copyright 2021 David Matamoros <davidmc@moodle.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

declare(strict_types=1);

use local_dynamictabsdemo\output\tab1;
use local_dynamictabsdemo\output\tab2;

require_once('../../config.php');

require_login();

$PAGE->set_url(new moodle_url('/local/dynamictabsdemo/index.php'));
$PAGE->set_context(context_system::instance());
$PAGE->set_title(get_string('pluginname', 'local_dynamictabsdemo'));

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('pluginname', 'local_dynamictabsdemo'));

// Add dynamic tabs to our page.
$attributestab = ['id' => 'dynamictabsdemo'];
$tabsoutput = new core\output\dynamic_tabs($attributestab);
$tabsoutput->add_tab(new tab1([]));
$tabsoutput->add_tab(new tab2([]));
$tabs = $tabsoutput->export_for_template($OUTPUT);

echo $OUTPUT->render_from_template('core/dynamic_tabs', $tabs);
echo $OUTPUT->footer();
