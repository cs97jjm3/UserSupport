<?php
/*
	User Support - a MantisBT plugin allowing users to express their view on individual issues.
	Copyright (C) 2018  James Murrell

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

$bugId = gpc_get_int('bugid');
$stance = gpc_get_int('stance');
$dbtable = plugin_table("support_data","UserSupport");
$dbquery = "INSERT INTO {$dbtable} (bugid, userid, rating) VALUES (".db_param().",".db_param().",".db_param().") ON DUPLICATE KEY UPDATE rating = ".db_param();
$dboutput = db_query_bound($dbquery, array($bugId, current_user_get_field("id"), $stance, $stance));
print_successful_redirect( 'view.php?id=' . $bugId );
