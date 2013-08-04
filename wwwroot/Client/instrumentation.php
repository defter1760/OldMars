<?php
/**
* Author: Pete Blackmer
* Copyright (C) 2008-2009 SpiceCSM LLC. All rights reserved.
*
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 (AGPL v3) as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SPICECSM, SPICECSM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
  * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
  * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
  * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3 (AGPL v3).
 *
  * In accordance with Section 7(b) of the GNU Affero General Public License version 3 (AGPL v3),
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SpiceCSM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SpiceCSM".
 */

$instrument_database_time = 0.0;

$instrument_database_count = 0;

function instrument_database_count($time) {
	global $instrument_database_time, $instrument_database_count;
	$instrument_database_time += microtime(true) - $time;
	$instrument_database_count++;
}

function instrument_end_script($start) {
	global $instrument_database_time, $instrument_database_count;
	$duration = microtime(true) - $start;
	if ($duration >= 5.0) {
		$level = LOG_WARNING;
	} else {
		$level = LOG_INFO;
	}
	openlog("spice", LOG_PID, LOG_LOCAL2);
	if ($instrument_database_count > 0) {
		syslog($level, $_SERVER['PHP_SELF'].
			sprintf(": execution time was %.2f seconds of which $instrument_database_count queries consumed %.2f seconds", $duration, $instrument_database_time));
	} else {
		syslog($level, $_SERVER['PHP_SELF']. sprintf(": execution time was %.2f seconds", $duration));
	}
}

register_shutdown_function('instrument_end_script', microtime(true));
