<?php
require_once get_template_directory() . "/modules/class-tgm-plugin-activation.php";
add_action( 'tgmpa_register', 'grandblog_require_plugins' );
 
function grandblog_require_plugins() {
 
    $plugins = array(
	    array(
	        'name'               => 'Grand Blog Theme Gallery',
	        'slug'               => 'grandblog-custom-post',
	        'source'             => get_template_directory() . '/lib/plugins/grandblog-custom-post.zip',
	        'required'           => true, 
	        'version'            => '1.3',
	        'force_activation'   => true, 
	        'force_deactivation' => true,
	    ),
	    array(
	        'name'      => 'oAuth Twitter Feed for Developers',
	        'slug'      => 'oauth-twitter-feed-for-developers',
	        'required'  => true, 
	    ),
	    array(
	        'name'      => 'WP Review',
	        'slug'      => 'wp-review',
	        'required'  => true, 
	    ),
	    array(
	        'name'      => 'MailChimp for WordPress',
	        'slug'      => 'mailchimp-for-wp',
	        'required'  => true, 
	    ),
	    array(
	        'name'      => 'Facebook Widget',
	        'slug'      => 'facebook-pagelike-widget',
	        'required'  => true, 
	    ),
	);
	
	$config = array(
		'domain'	=> 'grandblog-translation',
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'install-required-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'is_automatic' => true,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'          => array(
	        'page_title'                      => esc_html__('Install Required Plugins', 'grandblog-translation' ),
	        'menu_title'                      => esc_html__('Install Plugins', 'grandblog-translation' ),
	        'installing'                      => esc_html__('Installing Plugin: %s', 'grandblog-translation' ),
	        'oops'                            => esc_html__('Something went wrong with the plugin API.', 'grandblog-translation' ),
	        'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'grandblog-translation' ),
	        'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'grandblog-translation' ),
	        'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'grandblog-translation' ),
	        'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'grandblog-translation' ),
	        'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'grandblog-translation' ),
	        'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'grandblog-translation' ),
	        'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'grandblog-translation' ),
	        'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'grandblog-translation' ),
	        'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'grandblog-translation' ),
	        'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'grandblog-translation' ),
	        'return'                          => esc_html__('Return to Required Plugins Installer', 'grandblog-translation', 'grandblog-translation' ),
	        'plugin_activated'                => esc_html__('Plugin activated successfully.', 'grandblog-translation', 'grandblog-translation' ),
	        'complete'                        => esc_html__('All plugins installed and activated successfully. %s', 'grandblog-translation' ),
	        'nag_type'                        => 'update-nag'
	    )
    );
 
    tgmpa( $plugins, $config );
 
}
?>