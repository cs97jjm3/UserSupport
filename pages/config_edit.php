<?php
auth_reauthenticate();
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );
$f_UserSupport_excl_status			= gpc_get_string_array('excl_status');
$f_UserSupport_incl_severity		= gpc_get_string_array('incl_severity');
$f_UserSupport_excl_resolution		= gpc_get_string_array('excl_resolution');
plugin_config_set('usersupport_excl_status'			, implode(",",$f_UserSupport_excl_status)	  );
plugin_config_set('usersupport_incl_severity'			, implode(",",$f_UserSupport_incl_severity)  );
plugin_config_set('usersupport_excl_resolution'		, implode(",",$f_UserSupport_excl_resolution));
print_successful_redirect( plugin_page( 'config',TRUE ) );