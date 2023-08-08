<?php
/**
 * iSonic Dashboard plugin
 *
 * Custom dashboard that replaces the default WordPress dashboard and provides easy access to
 * iSonic products and services.
 *
 * @package             iSonic
 * @subpackage          Component
 * @author              Shaun Moss
 * @copyright           2023 Shaun Moss
 * @since               6.2.2
 * @license             GPL-3.0+
 *
 * @wordpress-plugin
 * Plugin Name:         iSonic Dashboard
 * Plugin URI:          https://animate.isonic.io
 * Description:         Custom dashboard that replaces the default WordPress dashboard and provides easy access to iSonic products and services.
 * Version:             1.0
 * Requires at least:   6.2
 * Author:              Shaun Moss
 * Author URI:          https://shaunmoss.com
 * License:             GPL v3 or later
 * License URI:         https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:         isonic-dashboard
 * Domain Path:         /languages
 */

// Style dashboard widget columns
add_action(
	'admin_head',
	function() {
		echo "<style type='text/css'>
            #dashboard-widgets .postbox-container {width: 33.333333%;}
            #dashboard-widgets #postbox-container-1 {width: 100%;}
        </style>";
	}
);


// Dashboard widget reordering
add_action(
	'wp_dashboard_setup',
	function() {

		global $wp_meta_boxes;

		// Move all dashboard wigets from 1st to 2nd column
		if ( ! empty( $wp_meta_boxes['dashboard']['normal'] ) ) {
			if ( isset( $wp_meta_boxes['dashboard']['side'] ) ) {
				$wp_meta_boxes['dashboard']['side'] = array_merge_recursive(
					$wp_meta_boxes['dashboard']['side'],
					$wp_meta_boxes['dashboard']['normal']
				);
			} else {
				$wp_meta_boxes['dashboard']['side'] = $wp_meta_boxes['dashboard']['normal'];
			}
			unset( $wp_meta_boxes['dashboard']['normal'] );
		}

		// Add custom dashbboard widget.
		add_meta_box(
			'dashboard_widget_example',
			__( 'iSonic Dashboard', 'isonic-dashboard' ),
			'render_example_widget',
			'dashboard',
			'normal',
			'default'
		);
	}
);



	// Get total number of posts
function wpb_total_posts() {
	$total = wp_count_posts()->publish;
	echo 'Total Posts: ' . $total;
}

	// Get total number of pages
function wpb_total_pages() {
	$count_pages = wp_count_posts( 'page' );
	$total_pages = $count_pages->publish;
	echo 'Total Pages: ' . $total_pages;
}



function render_example_widget() {

	?>
	<p>Welcome to the iSonic Dashboard! Need help? Contact us at <a href="mailto:support@isonic.com.au">support@isonic.com.au</a>.</p>

	<?php
}


	add_action( 'wp_dashboard_setup', 'my_custom_dashboard_widgets' );

function my_custom_dashboard_widgets() {
	global $wp_meta_boxes;

	wp_add_dashboard_widget( 'custom_help_widget', 'Website Deep Dive', 'custom_dashboard_help' );
}

function custom_dashboard_help() {
	?>
		<p class="tip">Way to go! Posting content to your website on a regular basis can help your business get more visibility. </p> 
			<div class="web-stat"><div class="wp-menu-image dashicons-before dashicons-admin-post" aria-hidden="true"><span><?php wpb_total_posts(); ?></span></div></div>
			<div class="web-stat"><div class="wp-menu-image dashicons-before dashicons-admin-page" aria-hidden="true"><span><?php wpb_total_pages(); ?></span></div></div>
			<p>Need help editing content? Get in touch with iSonic at <a href="mailto:support@isonic.com.au">support@isonic.com.au</a>.</p>
	<?php
}








function wps_recent_posts_dw() {
	global $wp_meta_boxes;

	?>
	<p style="font-weight:bold;">Recent Pages</p>
		<ul>
		<?php
			global $post;
			$args = array(
				'number'      => '4',
				'sort_order'  => 'DESC',
				'sort_column' => 'post_date',
			);

			$myposts = get_pages( $args );
			foreach ( $myposts as $post ) :
				setup_postdata( $post );
				?>
			<div class="post-li">  
				<li> <a style="font-weight: 500;" href="<?php the_permalink(); ?>"><?php the_title(); ?></a> - <span style="font-style:italic;">Published on <?php phpthe_date( 'd/n/Y' ); ?></span> <?php edit_post_link( __( 'Edit me!', 'textdomain' ), '<span>', '</span>', null, 'edit-link' ); ?> </li>
			</div>
			<?php endforeach; ?>
		</ol>

	<p style="font-weight:bold;">Recent Blog Posts</p>
		<ul>
		<?php
			global $post;
			$args = array(
				'number'      => '4',
				'sort_order'  => 'DESC',
				'sort_column' => 'post_date',
			);

			$myposts = get_posts( $args );
			foreach ( $myposts as $post ) :
				setup_postdata( $post );
				?>
				<div class="post-li">  
					<li> <a style="font-weight: 500;" href="<?php the_permalink(); ?>" target="_blank;"><?php the_title(); ?></a> - <span style="font-style:italic;">Published on <?php phpthe_date( 'd/n/Y' ); ?></span> <?php edit_post_link( __( 'Edit me!', 'textdomain' ), '<span>', '</span>', null, 'edit-link' ); ?></li>
				</div>
				
			<?php endforeach; ?>
		</ol>
	   
	   
  
			<style>
				.post-li {
				box-shadow: 0 2px 6px #00000014;
				padding: 8px 13px 4px 11px;
				margin-bottom: 9px;
				border-radius: 12px;
				line-height: 1em;
				max-width: max-content;
			}
			.edit-link {
				color: #3858e9;
				margin-left: 13px;
				font-style: italic;
				background: #EDEDFE;
				padding: 3px 9px;
				line-height: 1em;
				border-radius: 15px;
				transition: 0.2s;
			}
			.edit-link:hover {
					opacity: 0.5;
			}

			#custom_help_widget div.wp-menu-image:before {
				color: #3858e9 !important;
			}

			.web-stat {
				background: #ededfe;
				max-width: 140px;
				margin-bottom: 10px;
				border-radius: 30px;
				padding-left: 10px;
				font-weight: 500;
				display: -webkit-inline-box;
				margin-right: 8px;
				padding-right: 19px;
				line-height: 2.5em;
				color: #3858e9;
			}

			.web-stat .wp-menu-image::before {
				margin-right: 5px;
			}

			.postbox {
				position: relative;
				min-width: 255px;
				border: none;
				box-shadow: 0 1px 1pxrgba(0,0,0,.04);
				background: #fff;
				border-radius: 10px;
				box-shadow: 0 5px 10px #0000001a;
			}

			.postbox .hndle {
				font-size: 15px !important;
			}

			div#wpbody-content {
				background-image: url(/wp-content/plugins/projectplugin/images/Proposal-Background.png);
				background-size: cover;
				background-position: center;
			}

			#wpcontent, #wpfooter {
				margin-left: 140px;
			}

			#wpbody-content .wrap {
				padding-left: 22px !important;
			}

			p#footer-left {
				padding-left: 22px;
			}

			</style>


	<?php
}

function add_wps_recent_posts_dw() {
		wp_add_dashboard_widget( 'wps_recent_posts_dw', __( 'Your Activity' ), 'wps_recent_posts_dw' );
}
	add_action( 'wp_dashboard_setup', 'add_wps_recent_posts_dw' );




	add_action( 'wp_dashboard_setup', 'bt_remove_dashboard_widgets' );
/**
 *  Remove WordPress Dashboard Widgets
 */
function bt_remove_dashboard_widgets() {
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' ); // WordPress.com Blog
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' ); // Plugins
	remove_meta_box( 'dashboard_right_now', 'dashboard', 'side' ); // Right Now
	remove_action( 'welcome_panel', 'wp_welcome_panel' ); // Welcome Panel
	remove_action( 'try_gutenberg_panel', 'wp_try_gutenberg_panel' ); // Try Gutenberg
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' ); // Quick Press widget
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' ); // Recent Drafts
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' ); // Other WordPress News
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' ); // Incoming Links
	// remove_meta_box('rg_forms_dashboard','dashboard','normal'); // Gravity Forms
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' ); // Recent Comments
	remove_meta_box( 'icl_dashboard_widget', 'dashboard', 'normal' ); // Multi Language Plugin
	remove_meta_box( 'dashboard_activity', 'dashboard', 'side' ); // Acivity
}
