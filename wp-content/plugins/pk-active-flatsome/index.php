<?php
/*
Plugin Name: PK Active Flatsome
Plugin URI: https://funkymedia.vn
Description: Active Flatsome Theme
Version: 1.2.1
Author: Pinker
Author URI: https://vuduchong.com
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
if(!function_exists('add_action')) {
	echo "Hi there!  I'm just a plugin, not much I can do when called directly.";
	exit;
}

define('PK_PLUGIN_URL', plugin_dir_url(__FILE__));

$theme = wp_get_theme();
if(!class_exists('PK_Flatsome') && 'flatsome' == $theme->template && is_admin()) {
	class PK_Flatsome {
		public $plugin_slug = 'pk_flatsome';
		public $option_name = 'pk_flatsome_option';

		public function __construct() {
			$this->pk_option = get_option($this->option_name);
			add_action('admin_menu', [$this, 'add_settings_page']);
			add_action('admin_init', [$this, 'setup_field']);
			add_filter('plugin_action_links_' . plugin_basename(__FILE__), [$this, 'add_setting_link'] );

			add_action('admin_enqueue_scripts', function(){
				wp_register_script('pk-js', PK_PLUGIN_URL . 'custom.js', array('jquery'));
				wp_localize_script('pk-js', 'pk', [
					'url' => admin_url('admin-ajax.php')
				]);
				wp_enqueue_script('pk-js');
			});

			add_action('wp_ajax_check_active_theme_fs', [$this, 'check_active_theme_fs']);
		}

		public function add_settings_page() {
			$parent_slug = 'options-general.php';
			$page_title = 'PK Active Flatsome';
			$menu_title = 'PK Active Flatsome';
			$capability = 'manage_options';
			$slug = $this->plugin_slug;
			$callback = [$this, 'plugin_settings_page_content'];
	
			add_submenu_page($parent_slug, $page_title, $menu_title, $capability, $slug, $callback);
		}

		/**
		 * Options page callback
		 */
		public function plugin_settings_page_content() {
			if(!current_user_can('manage_options')) return;
			?>
				<div class="wrap">
					<h2>PK Active Theme Flatsome</h2>

					<?php if(get_option("flatsome_wup_purchase_code")): ?>
						<div class='notice notice-success is-dismissible'>
					        <p>
					        	<b>Flatsome đã được kích hoạt bằng mã : <?php echo get_starred(get_option("flatsome_wup_purchase_code")) ?></b>
						    </p>
					    </div>
					<?php else: ?>
						<div class='notice notice-error is-dismissible'>
					        <p>
					        	<b>Flatsome chưa được kích hoạt!</b>
						    </p>
					    </div>
					<?php endif; ?>
					<form method="post" action="options.php">
						<?php
							settings_fields( $this->plugin_slug );
							do_settings_sections( $this->plugin_slug );
							submit_button();
						?>
					</form>

					<style>
						.swal2-title {
							font-size: 23px;
							line-height: 30px;
						}
					</style>
				</div>
			<?php
		}

		/**
		 * Register and add settings
		 */
		public function setup_field() {

			register_setting(
				$this->plugin_slug, // Option group
				$this->option_name, // Option name
				array( $this, 'sanitize' ) // Sanitize
			);

			// Section 01
			add_settings_section(
				'pinker_first_section', // ID
				'Thông tin', // Title
				false, // Callback
				$this->plugin_slug // Page
			);

			$fields_section_01 = [
				[
					'id'       => 'pk_flatsome_enable',
					'title'    => 'Kích hoạt',
					'callback' => 'pk_flatsome_enable_html'
				],
				[
					'id'       => 'pk_hidden_notice',
					'title'    => 'Tắt thông báo Flatsome issues',
					'callback' => 'pk_hidden_notice_html'
				],
			];

			foreach($fields_section_01 as $field){
				add_settings_field(
					$field['id'],
					$field['title'],
					[$this, $field['callback']],
					$this->plugin_slug,
					'pinker_first_section'
				);
			}
		}

		/**
		 * Sanitize POST data from custom settings form
		 *
		 * @param array $input Contains custom settings which are passed when saving the form
		 */
		public function sanitize($input) {
			$sanitized_input = [];

			foreach($input as $key => $item) {
				$sanitized_input[$key] = sanitize_text_field($item);
			}

			return $sanitized_input;
		}

		/** 
		 * HTML input
		 */
		public function pk_flatsome_enable_html() {
			echo '<a href="javascript:;" class="button btn_active_fs">Active</a>';
		}

		public function pk_hidden_notice_html() {
			echo '<input type="checkbox" id="pk_hidden_notice" name="'.$this->option_name.'[pk_hidden_notice]" value="1" '. checked(1, isset($this->pk_option['pk_hidden_notice']) ? 1 : 0, false ) .' />';
		}

		public function check_active_theme_fs(){
			if (!get_option("flatsome_wup_purchase_code")) {
		     	add_option("flatsome_wup_purchase_code", "8f93cd51-5246-4505-9228-9a4137e6ec00");
		     	add_option("flatsome_wup_sold_at", get_date_from_gmt('UTC'));
		     	add_option("flatsome_wup_supported_until", "Unlimited");
		     	add_option("flatsome_wup_buyer", "vuduchong.com");

		     	wp_send_json_success([
					'status' => true,
					'message' => 'Bạn vừa kích hoạt Theme Flatsome thành công!'
				]);
		    } else {
		    	update_option('flatsome_wup_purchase_code', '8f93cd51-5246-4505-9228-9a4137e6ec00');
		    	update_option("flatsome_wup_sold_at", get_date_from_gmt('UTC'));
		     	update_option("flatsome_wup_supported_until", "Unlimited");
		     	update_option("flatsome_wup_buyer", "vuduchong.com");

		     	wp_send_json_success([
					'status' => true,
					'message' => 'Kích hoạt Theme Flatsome thành công!'
				]);
		    }
		}

		public function add_setting_link($links) {
			array_unshift($links, '<a href="' . admin_url('options-general.php?page='.$this->plugin_slug) . '">' . __('Settings') . '</a>');
			return $links;
		}
	}

	new PK_Flatsome;

	function get_starred($str) {
	    $len = strlen($str);
	    return substr($str, 0, 5).str_repeat('*', $len - 5).substr($str, $len - 5, 5);
	}

	$option = get_option('pk_flatsome_option');
	if(isset($option['pk_hidden_notice']) && $option['pk_hidden_notice'] == 1) {
		function flatsome_notice() {
			?>
				<style>#flatsome-notice{display:none!important;}</style>
			<?php
		}
		add_action('admin_head', 'flatsome_notice', 2000);
	}
}