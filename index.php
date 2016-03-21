<?php
/*
Plugin Name: iP Core Plugin Bundle Activation
Plugin URI:  https://wordpress.org/plugins/plugin-bundle-activation/
Description: WordPress Plugin bundle installation and activation
Version:     1.0
Author:      Lopo lencastre de Almeida
Author URI:  http://profiles.wordpress.org/ipublicis
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: ipcorepba
*/

/*
  Copyright 2016 iPublicis!COM (ipublicis.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

	Full license is included in the package.
*/

defined( 'ABSPATH' ) OR exit;
/**
 * Include the TGM_Plugin_Activation class.
 */
	require_once dirname( __FILE__ ) . '/libs/class-tgm-plugin-activation.php';
	add_action( 'tgmpa_register', 'ipcore_register_required_plugins' );

	/**
	 * Include the JSON Minify class to clean JSON comments.
	 */
	require_once( dirname( __FILE__ ) . "/libs/minify.json.php" );

/**
 * Register the required plugins for this package.
 *
 * The variable passed to tgmpa_register_plugins() should is an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
	function ipcore_register_required_plugins() {
	/*
	 * Check if the config.json file exists.
	 * If not show an admin notice and exit.
	 */
		if ( !file_exists('./config.json') ) {
			// Add an admin notice:
			add_action( 'admin_notices', 'ipcorepba_on_activation_note' );
			return;
		}

	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
  	$plugins = json_decode( json_minify( file_get_contents( './config.json', FILE_USE_INCLUDE_PATH ) ), true );

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
		$config = array(
			'id'           => 'ipcorepba',               // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => dirname( __FILE__ ) . '/', // Default absolute path to bundled plugins.
			'menu'         => 'ipcorepba-install-plugins',  // Menu slug.
			'parent_slug'  => 'plugins.php',             // Parent menu slug.
			'capability'   => 'manage_options',          // Capability needed to view plugin install page, should be
																									 // a capability associated 	with the parent menu used.
			'has_notices'  => true,                      // Show admin notices or not.
			'dismissable'  => true,                      // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                        // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,                     // Automatically activate plugins after installation or not.
			'message'      => '',                        // Message to output right before the plugins table.
			'strings'      => array(
				'page_title'                      => __( 'Install Required Plugins', 'ipcorepba' ),
				'menu_title'                      => __( 'Install Plugins', 'ipcorepba' ),
				'installing'                      => __( 'Installing Plugin: %s', 'ipcorepba' ), // %s = plugin name.
				'oops'                            => __( 'Something went wrong with the plugin API.', 'ipcorepba' ),
				'notice_can_install_required'     => _n_noop(
					'This installation requires the following plugin: %1$s.',
					'This installation requires the following plugins: %1$s.',
					'ipcorepba'
				), // %1$s = plugin name(s).
				'notice_can_install_recommended'  => _n_noop(
					'This installation recommends the following plugin: %1$s.',
					'This installation recommends the following plugins: %1$s.',
					'ipcorepba'
				), // %1$s = plugin name(s).
				'notice_cannot_install'           => _n_noop(
					'Sorry, but you do not have the correct permissions to install the %1$s plugin.',
					'Sorry, but you do not have the correct permissions to install the %1$s plugins.',
					'ipcorepba'
				), // %1$s = plugin name(s).
				'notice_ask_to_update'            => _n_noop(
					'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this installation: %1$s.',
					'The following plugins need to be updated to their latest version to ensure maximum compatibility with this installation: %1$s.',
					'ipcorepba'
				), // %1$s = plugin name(s).
				'notice_ask_to_update_maybe'      => _n_noop(
					'There is an update available for: %1$s.',
					'There are updates available for the following plugins: %1$s.',
					'ipcorepba'
				), // %1$s = plugin name(s).
				'notice_cannot_update'            => _n_noop(
					'Sorry, but you do not have the correct permissions to update the %1$s plugin.',
					'Sorry, but you do not have the correct permissions to update the %1$s plugins.',
					'ipcorepba'
				), // %1$s = plugin name(s).
				'notice_can_activate_required'    => _n_noop(
					'The following required plugin is currently inactive: %1$s.',
					'The following required plugins are currently inactive: %1$s.',
					'ipcorepba'
				), // %1$s = plugin name(s).
				'notice_can_activate_recommended' => _n_noop(
					'The following recommended plugin is currently inactive: %1$s.',
					'The following recommended plugins are currently inactive: %1$s.',
					'ipcorepba'
				), // %1$s = plugin name(s).
				'notice_cannot_activate'          => _n_noop(
					'Sorry, but you do not have the correct permissions to activate the %1$s plugin.',
					'Sorry, but you do not have the correct permissions to activate the %1$s plugins.',
					'ipcorepba'
				), // %1$s = plugin name(s).
				'install_link'                    => _n_noop(
					'Begin installing plugin',
					'Begin installing plugins',
					'ipcorepba'
				),
				'update_link' 					  => _n_noop(
					'Begin updating plugin',
					'Begin updating plugins',
					'ipcorepba'
				),
				'activate_link'                   => _n_noop(
					'Begin activating plugin',
					'Begin activating plugins',
					'ipcorepba'
				),
				'return'                          => __( 'Return to Required Plugins Installer', 'ipcorepba' ),
				'plugin_activated'                => __( 'Plugin activated successfully.', 'ipcorepba' ),
				'activated_successfully'          => __( 'The following plugin was activated successfully:', 'ipcorepba' ),
				'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'ipcorepba' ),  // %1$s = 	plugin name(s).
				'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this installation. 	Please update the plugin.', 'ipcorepba' ),  // %1$s = plugin name(s).
				'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'ipcorepba' ), // %s = dashboard link.
				'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'ipcorepba' ),
				'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
			),
		);

		tgmpa( $plugins, $config );
	}

	function ipcorepba_on_activation_note() {
		global $pagenow;
		if ( $pagenow == 'plugins.php' ) {
	  	ob_start(); ?>
	    <div id="message" class="error"><strong><?php __('Warning!', 'ipcorepba'); ?></strong></br>
	    <?php __('Configuration file was not found. Must have one. Check documentation.', 'ipcorepba'); ?><br />
			<?php __('Plugins were not installed.', 'ipcorepba'); ?></div>
	    <?php
	    echo ob_get_clean();
	  }
	}
