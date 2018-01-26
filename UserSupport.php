<?php
/*
	User Support - a MantisBT plugin allowing users to express their view on individual issues.
	Copyright (C) 2017  James Murrell

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

class UserSupportPlugin extends MantisPlugin {
	function register() {
		$this->name = 'User Issue Support';
		$this->description = 'This plugin gives users the option to vote for higher or lower development priority of an issue.';
		$this->page = 'config';
		$this->version = '1.01';
		$this->requires = array(
			'MantisCore' => '2.0.0',
			);

		$this->author = 'cs97jjm3 (based upon Renegade@RenegadeProjects.com)';
		$this->contact = 'murrell.james@gmail.com';
		$this->url = 'f1cs97jjm3.ddns.net';
	}

	/*** Default plugin configuration.	 */
	function config() {
		return array(
			'gaugesupport_excl_status'			=> '80,90' ,
			'gaugesupport_incl_severity'		=> '30,40',
			'gaugesupport_excl_resolution'		=> '20,40,50,60,70,90',
			);
	} 
	
	function init() {
		plugin_event_hook('EVENT_MENU_MAIN' , 'menuLinks');
		plugin_event_hook('EVENT_VIEW_BUG_EXTRA', 'renderBugSnippet');
	}

	function menuLinks($p_event) {
            return array(
                array( 
                    'title' => plugin_lang_get( 'menu_link' ),
                    'access_level' => '',
                    'url' => 'plugin.php?page=UserSupport/issue_ranking',
                    'icon' => 'fa-line-chart'
                ),
            ); 
	}

	function renderBugSnippet($p_event, $bugid) {
		include 'plugins/UserSupport/pages/user_form.php';
	}
	
	function schema() {
		return array(
			array(
				"CreateTableSQL",
				array(
					plugin_table( "support_data" ),
					"
						bugid	I	NOTNULL UNSIGNED PRIMARY,
						userid	I	NOTNULL UNSIGNED PRIMARY,
						rating	I	NOTNULL SIGNED DEFAULT 0
					",
					array( "mysql" => "DEFAULT CHARSET=utf8" )
				),
			)

		);
	}

}