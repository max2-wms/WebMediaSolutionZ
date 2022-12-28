<?php
/**
 * Handles Maintenance Mode.
 *
 * @author     ThemeFusion
 * @copyright  (c) Copyright by ThemeFusion
 * @link       https://theme-fusion.com
 * @package    Avada
 * @subpackage Core
 * @since      7.9
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * Handles Maintenance Mode.
 */
class AWB_Maintenance_Mode {

	/**
	 * The one, true instance of this object.
	 *
	 * @static
	 * @since 7.9
	 * @access private
	 * @var object
	 */
	private static $instance;

	/**
	 * Default heading string.
	 *
	 * @since 7.9
	 * @access protected
	 * @var string
	 */
	protected $default_heading = '';

	/**
	 * The constructor.
	 *
	 * @since 7.9
	 * @access private
	 * @return void
	 */
	private function __construct() {

		if ( '' !== Avada()->settings->get( 'maintenance_mode' ) ) {
			add_action( ( is_admin() ? 'init' : 'template_redirect' ), [ $this, 'init' ] );

			// Make sure PO work correctly.
			add_action( 'wp', [ $this, 'change_post_id' ] );
		}
	}

	/**
	 * Creates or returns an instance of this class.
	 *
	 * @static
	 * @since 7.9
	 * @access public
	 * @return object AWB_Maintenance_Mode
	 */
	public static function get_instance() {

		// If an instance hasn't been created and set to $instance create an instance and set it to $instance.
		if ( null === self::$instance ) {
			self::$instance = new AWB_Maintenance_Mode();
		}
		return self::$instance;
	}

	/**
	 * Init maintenance mode.
	 *
	 * @since 7.9
	 * @access public
	 * @return void
	 */
	public function init() {

		if ( $this->should_redirect() ) {

			// URL redirect if set.
			if ( ! empty( Avada()->settings->get( 'maintenance_redirect_url' ) ) ) {
				$redirect_url = esc_url_raw( Avada()->settings->get( 'maintenance_redirect_url' ) );
				wp_redirect( $redirect_url ); // phpcs:ignore WordPress.Security.SafeRedirect.wp_redirect_wp_redirect
				exit;
			} elseif ( is_admin() && is_user_logged_in() ) {

				// Admin requests need to be redirected to front-end, if user doesn't have needed role.
				wp_redirect( home_url() );
				exit;
			}

			$this->default_heading = 'maintenance' === Avada()->settings->get( 'maintenance_mode' ) ? __( 'Maintenance Mode', 'Avada' ) : __( 'Coming Soon', 'Avada' );
			$charset               = get_bloginfo( 'charset' ) ? get_bloginfo( 'charset' ) : 'UTF-8';
			$protocol              = wp_get_server_protocol();
			$status_code           = apply_filters( 'awb_maintenance_status_code', 503 );
			$check_back            = apply_filters( 'awb_maintenance_check_back_time', 3600 );

			add_action( 'awb_maintenance_head', [ $this, 'add_head' ] );
			add_action( 'awb_maintenance_content', [ $this, 'add_content' ] );
			add_action( 'awb_maintenance_footer', [ $this, 'add_footer' ] );

			ob_start();
			header( 'Content-type: text/html; charset=' . $charset );
			header( 'Cache-Control: no-cache' );
			header( 'Pragma: no-cache' );

			if ( 'maintenance' === Avada()->settings->get( 'maintenance_mode' ) ) {
				header( $protocol . ' ' . $status_code . ' Service Unavailable', true, $status_code );
				header( 'Retry-After: ' . $check_back );
			}

			include_once Avada::$template_dir_path . '/maintenance.php';

			ob_flush();
			exit();
		}
	}

	/**
	 * Adds filter to alter post ID on regulare front-end.
	 *
	 * @since 7.9
	 * @access private
	 * @return void
	 */
	public function change_post_id() {
		if ( $this->should_redirect() ) {
			add_filter( 'fusion-page-id', [ $this, 'post_id' ] );
		}
	}

	/**
	 * Return template ID.
	 *
	 * @since 7.9
	 * @param string $post_id the default post ID.
	 * @access public
	 * @return string
	 */
	public function post_id( $post_id ) {
		return Avada()->settings->get( 'maintenance_template' );
	}

	/**
	 * Checks if redirect to maintenance mode / coming soon mode should occur.
	 *
	 * @since 7.9
	 * @access public
	 * @return bool
	 */
	public function should_redirect() {
		$should_redirect =
			! $this->can_user_access() &&
			! $this->is_excluded() &&
			! ( defined( 'WP_CLI' ) && WP_CLI ) &&
			! strpos( $_SERVER['PHP_SELF'], 'wp-login.php' ) &&
			! ( strpos( $_SERVER['PHP_SELF'], 'wp-admin/' ) && ! is_user_logged_in() ) &&
			! strpos( $_SERVER['PHP_SELF'], 'wp-admin/admin-ajax.php' ) &&
			! strpos( $_SERVER['PHP_SELF'], 'wp-cron.php' ) &&
			! strpos( $_SERVER['PHP_SELF'], 'async-upload.php' );

		return apply_filters( 'awb_maintenance_should_redirect', $should_redirect, $_SERVER['PHP_SELF'] );
	}

	/**
	 * Adds page title and meta.
	 *
	 * @since 7.9
	 * @access public
	 * @return void
	 */
	public function add_head() {

		$this->add_title_and_meta();

		wp_head();

		$this->add_css();

		/**
		 * The setting below is not sanitized.
		 * In order to be able to take advantage of this,
		 * a user would have to gain access to the database
		 * in which case this is the least of your worries.
		 */
		echo apply_filters( 'avada_space_head', Avada()->settings->get( 'space_head' ) ); // phpcs:ignore WordPress.Security.EscapeOutput
	}

	/**
	 * Adds page title and meta.
	 *
	 * @since 7.9
	 * @access public
	 * @return void
	 */
	public function add_title_and_meta() {
		$page_title = '' !== Avada()->settings->get( 'maintenance_page_title' ) ? Avada()->settings->get( 'maintenance_page_title' ) : $this->default_heading . ' - ' . get_bloginfo( 'name', 'display' );
		$robots     = 'index' === Avada()->settings->get( 'maintenance_robots_meta' ) ? 'index, follow' : 'noindex, nofollow';
		?>
		<title><?php echo esc_html( $page_title ); ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="robots" content="<?php echo esc_attr( $robots ); ?>" />
		<?php Avada()->head->the_viewport(); ?>
		<?php
	}

	/**
	 * Adds the page CSS.
	 *
	 * @since 7.9
	 * @access public
	 * @return void
	 */
	public function add_css() {
		$template = Avada()->settings->get( 'maintenance_template' );
		$css      = '.awb-maintenance-page #content { width: auto;float:none; }';

		if ( $template ) {
			$saved_custom_css = get_post_meta( $template, '_fusion_builder_custom_css', true );

			if ( isset( $saved_custom_css ) && $saved_custom_css ) {
				$css .= sanitize_textarea_field( $saved_custom_css );
			}
		} else {
			$css .= '.awb-maintenance-page #main { padding: 0; background: none;  }';
			$css .= '.awb-maintenance-page { display: flex; align-items: center; justify-content: center; overflow-y: hidden; margin: 0; height: 100vh; }';
			$css .= '.awb-maintenance-content .post-content { display: flex; flex-flow: column; align-items: center; margin-top: -15vh; margin-bottom: 0; }';
			$css .= '.awb-maintenance-site-name { font-size: 1.5em; }';
			$css .= '.awb-maintenance-heading { margin: 0.25em 0 0 0; font-size: 3em; }';
		}

		$css = apply_filters( 'awb_maintenance_css', $css );

		?>
		<style type="text/css">
			<?php echo esc_html( $css ); ?>
		</style>
		<?php
	}

	/**
	 * Adds the page CSS.
	 *
	 * @since 7.9
	 * @access public
	 * @return void
	 */
	public function add_content() {
		if ( Avada()->settings->get( 'maintenance_template' ) ) {
			$library_template = $this->get_library_template();
			echo do_shortcode( $library_template );
		} else {
			$site_name = get_bloginfo( 'name', 'display' ) . ' - ' . get_bloginfo( 'description', 'display' );
			$heading   = '' !== Avada()->settings->get( 'maintenance_page_title' ) ? Avada()->settings->get( 'maintenance_page_title' ) : $this->default_heading;
			?>
			<span class="awb-maintenance-site-name"><?php echo esc_html( $site_name ); ?></span>
			<h1 class="awb-maintenance-heading"><?php echo esc_html( $heading ); ?></h1>
			<?php
		}
	}

	/**
	 * Adds the page CSS.
	 *
	 * @since 7.9
	 * @access public
	 * @return void
	 */
	public function add_footer() {
		?>
		<div class="avada-footer-scripts">
			<?php wp_footer(); ?>
		</div>

		<?php
		get_template_part( 'templates/to-top' );
	}

	/**
	 * Checks if current user can access the site..
	 *
	 * @since 7.9
	 * @access public
	 * @return bool If current user can access the site.
	 */
	public function can_user_access() {

		// Admins can always access.
		if ( is_super_admin() ) {
			return apply_filters( 'awb_maintenance_user_access', true );
		}

		$user               = wp_get_current_user();
		$user_roles         = ! empty( $user->roles ) && is_array( $user->roles ) ? $user->roles : [];
		$enables_user_roles = (array) Avada()->settings->get( 'maintenance_user_roles' );

		if ( is_multisite() ) {
			array_push( $enables_user_roles, 'administrator' );
		}

		$allowed_users = ! empty( array_intersect( $user_roles, $enables_user_roles ) );

		return apply_filters( 'awb_maintenance_user_access', $allowed_users );
	}

	/**
	 * Returns an array of all available user roles.
	 *
	 * @since 7.9
	 * @access public
	 * @return array The available user roles.
	 */
	public function get_user_role_names() {
		global $wp_roles;

		if ( ! isset( $wp_roles ) ) {
			$wp_roles = new WP_Roles();
		}

		$wp_rules = $wp_roles->get_names();

		unset( $wp_rules['administrator'] );

		return $wp_rules;
	}

	/**
	 * Returns an array of all available library templates.
	 *
	 * @since 7.9
	 * @access public
	 * @return array The available library templates.
	 */
	public function get_library_templates() {
		$template_titles     = [
			'0' => 'Default Template',
		];
		$template_permalinks = [];
		$posts               = fusion_cached_query(
			[
				'post_status'    => 'publish',
				'post_type'      => 'fusion_template',
				'posts_per_page' => '-1',
			]
		);

		$posts = $posts->posts;

		foreach ( $posts as $post ) {
			$template_titles[ $post->ID ]     = $post->post_title;
			$template_permalinks[ $post->ID ] = $post->guid;
		}

		return [
			'titles'     => $template_titles,
			'permalinks' => $template_permalinks,
		];
	}

	/**
	 * Returns the content of the chosen library template.
	 *
	 * @since 7.9
	 * @access public
	 * @return string The chosen library templates.
	 */
	public function get_library_template() {
		$template = fusion_cached_query(
			[
				'post_type' => 'fusion_template',
				'p'         => Avada()->settings->get( 'maintenance_template' ),
			]
		);

		$template = $template->posts['0']->post_content;

		return $template;
	}

	/**
	 * Check if the current slug should be excluded.
	 *
	 * @since 7.9
	 * @access public
	 * @return bool Whether current slug should be excluded.
	 */
	public function is_excluded() {
		$excluded = explode( "\n", Avada()->settings->get( 'maintenance_exclude' ) );

		if ( ! empty( $excluded ) ) {
			$request_uri = isset( $_SERVER['REQUEST_URI'] ) ? esc_url_raw( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '';

			foreach ( $excluded as $slug ) {
				$slug = trim( $slug );
				if ( ! empty( $slug ) && false !== strpos( $request_uri, $slug ) ) {
					return true;
				}
			}
		}

		return false;
	}
}

/**
 * Instantiates the AWB_Maintenance_Mode class.
 * Make sure the class is properly set-up.
 *
 * @since 7.9
 * @return object AWB_Maintenance_Mode
 */
function AWB_Maintenance_Mode() { // phpcs:ignore WordPress.NamingConventions
	return AWB_Maintenance_Mode::get_instance();
}
AWB_Maintenance_Mode();
