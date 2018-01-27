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

auth_reauthenticate();
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );
$f_UserSupport_excl_status			= gpc_get_string_array('excl_status');
$f_UserSupport_incl_severity		= gpc_get_string_array('incl_severity');
$f_UserSupport_excl_resolution		= gpc_get_string_array('excl_resolution');
plugin_config_set('usersupport_excl_status'			, implode(",",$f_UserSupport_excl_status)	  );
plugin_config_set('usersupport_incl_severity'			, implode(",",$f_UserSupport_incl_severity)  );
plugin_config_set('usersupport_excl_resolution'		, implode(",",$f_UserSupport_excl_resolution));
print_successful_redirect( plugin_page( 'config',TRUE ) );
