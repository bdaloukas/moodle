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
 * Tool cohortroles upgrades.
 *
 * @package    tool
 * @subpackage cohortroles
 * @copyright  2017 Vasilis Daloukas <bdaloukas@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Upgrade the plugin.
 *
 * @param int $oldversion
 * @return bool always true
 */
function xmldb_tool_cohortroles_upgrade($oldversion) {
    global $CFG, $DB;

    // Moodle v3.1.0 release upgrade line.
    // Put any upgrade step following this.

    // Automatically generated Moodle v3.2.0 release upgrade line.
    // Put any upgrade step following this.

    if ($oldversion < 2017101502) {

        // Delete "orphaned" cohortroles.
        $sql = "SELECT DISTINCT c.userid
                  FROM {tool_cohortroles} c
                  JOIN {user} u ON u.id = c.userid
                 WHERE u.deleted=1";echo "$sql<br>";
        $deletedusers = $DB->get_field_sql($sql);
        if ($deletedusers) {
            list($sql, $params) = $DB->get_in_or_equal($deletedusers);
            $DB->execute("DELETE FROM {tool_cohortroles} WHERE userid " . $sql, $params);
        }

        // Cohortroles savepoint reached.
        upgrade_plugin_savepoint(true, 2017101502, 'tool', 'cohortroles');
    }

    // Automatically generated Moodle v3.3.0 release upgrade line.
    // Put any upgrade step following this.

    return true;
}
