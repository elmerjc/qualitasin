<?php
/**
 * Importer Path
 */
if( ! function_exists( 'amz_importer_get_path_locate' ) ) {
	function amz_importer_get_path_locate() {
		$dirname        = wp_normalize_path( dirname( __FILE__ ) );
		$plugin_dir     = wp_normalize_path( WP_PLUGIN_DIR );
		$located_plugin = ( preg_match( '#'. $plugin_dir .'#', $dirname ) ) ? true : false;
		$directory      = ( $located_plugin ) ? $plugin_dir : get_template_directory();
		$directory_uri  = ( $located_plugin ) ? WP_PLUGIN_URL : get_template_directory_uri();
		$basename       = str_replace( wp_normalize_path( $directory ), '', $dirname );
		$dir            = $directory . $basename;
		$uri            = $directory_uri . $basename;
		return apply_filters( 'amz_importer_get_path_locate', array(
			'basename' => wp_normalize_path( $basename ),
			'dir'      => wp_normalize_path( $dir ),
			'uri'      => $uri
			) );
	}
}

/**
 * Importer constants
 */
$get_path = amz_importer_get_path_locate();

define( 'AMZ_IMPORTER_VER' , '1.0.0' );
define( 'AMZ_IMPORTER_DIR' , AMAZEE_PLUGIN_DIR . 'demo-importer' );
define( 'AMZ_IMPORTER_URI' , AMAZEE_PLUGIN_URL . '/demo-importer' );
define( 'AMZ_IMPORTER_CONTENT_DIR' , AMZ_IMPORTER_DIR . '/demos/' );
define( 'AMZ_IMPORTER_CONTENT_URI' , AMZ_IMPORTER_URI . '/demos/' );



/**
 * Scripts and styles for admin
 */
function amz_importer_enqueue_scripts() {

	wp_enqueue_script( 'amz-importer', AMZ_IMPORTER_URI . '/assets/js/amz-importer.js', array( 'jquery' ), AMZ_IMPORTER_VER, true);
	wp_enqueue_style( 'amz-importer-css', AMZ_IMPORTER_URI . '/assets/css/amz-importer.css', null, AMZ_IMPORTER_VER);
}

add_action( 'admin_enqueue_scripts', 'amz_importer_enqueue_scripts' );

/**
 *
 * Decode string for backup options (Source from codestar)
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_decode_string' ) ) {
	function cs_decode_string( $string ) {
		return unserialize( gzuncompress( stripslashes( call_user_func( 'base'. '64' .'_decode', rtrim( strtr( $string, '-_', '+/' ), '=' ) ) ) ) );
	}
}

/**
 * Load Importer
 */
require_once AMZ_IMPORTER_DIR . '/classes/abstract.class.php';
require_once AMZ_IMPORTER_DIR . '/classes/importer.class.php';

/**
 * large image size : 
 * small image size : 350 x 263
 * @var array
 */
$settings      = array(
    'menu_parent' => 'themes.php',
    'menu_title'  => __('Import Demos', 'amz-importer'),
    'menu_type'   => 'add_submenu_page',
    'menu_slug'   => 'amz_demo_importer',
    );
$options        = array(
    '_all' => array(
        'title'         => __('Import All Pages', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/',
        'front_page'    => 'Home',
        'blog_page'     => 'Blog',
        'menus'         => array(
            'primary'   => 'Primary', // Menu Location and Title
            ),
        'main_demo' => true // main sure image size is larger
        ),
    'niranjas' => array(
        'title'         => __('Naranjas', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/naranjas/',
        ),
    'sports-tennis' => array(
        'title'         => __('Sports Tennis', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/sports-tennis/',
        ),
    'top-invest' => array(
        'title'         => __('Top Invest', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/top-invest/',
        ),
    'business-10' => array(
        'title'         => __('Business 10', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/business-10/?pri_color=526dfa',
        ),
    'creative-studio' => array(
        'title'         => __('Creative Studio', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/creative-studio/?pri_color=0081ff',
        ),
    'simple-portfolio' => array(
        'title'         => __('Simple Portfolio', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/business-portfolio/simple-portfolio/',
        ),
    'architecture' => array(
        'title'         => __('Architecture', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/architecture/',
        ),
    'travel' => array(
        'title'         => __('Travel', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/travel/?pri_color=004564',
        ),
    'seafood' => array(
        'title'         => __('Sea Food', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/seafood/',
        ),
    'digital-agency-2' => array(
        'title'         => __('Digital Agency 2', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/digital-agency-2/?pri_color=7b38d1',
        ),
    'business-4' => array(
        'title'         => __('Business 4', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/business-4/',
        ),
    'business-5' => array(
        'title'         => __('Business 5', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/business-5/',
        ),
    'business-6' => array(
        'title'         => __('Business 6', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/business-6/',
        ),
    'business-7' => array(
        'title'         => __('Business 7', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/business-7/',
        ),
    'business-8' => array(
        'title'         => __('Business 8', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/business-8/',
        ),
    'business-9' => array(
        'title'         => __('Business 9', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/business-9/',
        ),
    'business-portfolio' => array(
        'title'         => __('Business Portfolio', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/business-portfolio/',
        ),
    'classic-portfolio' => array(
        'title'         => __('Classic Portfolio', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/classic-portfolio/',
        ),
    'composer-default' => array(
        'title'         => __('Composer Default', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/composer-default/',
        ),
    'creative-agency-4' => array(
        'title'         => __('Creative Agency 4', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/creative-agency-4/',
        ),
    'creative-agency-5' => array(
        'title'         => __('Creative Agency 5', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/creative-agency-5/',
        ),
    'creative-photography' => array(
        'title'         => __('Creative Photography', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/creative-photography/',
        ),
    'classic-agency' => array(
        'title'         => __('Classic Agency', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/classic-agency/?pri_color=f43a3a',
        ),
    'freelancer-2' => array(
        'title'         => __('Freelancer 2', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/freelancer-2/',
        ),
    'minimal-portfolio' => array(
        'title'         => __('Minimal Portfolio', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/minimal-portfolio/?pri_color=111111',
        ),
    'Photographer-2' => array(
        'title'         => __('Photographer 2', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/Photographer-2/',
        ),
    'product-landing' => array(
        'title'         => __('Product Landing', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/product-landing/',
        ),
    'startup-1and2' => array(
        'title'         => __('Startup 1 and 2', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/startup-1/',
        ),
    'tourism' => array(
        'title'         => __('Tourism', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/tourism/',
        ),
    'agency-portfolio' => array(
        'title'         => __('Agency Portfolio', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/agency-portfolio/',
        ),
    'app-landing-1' => array(
        'title'         => __('App Landing 1', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/app-landing-1/',
        ),
    'app-landing-2' => array(
        'title'         => __('App Landing 2', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/app-landing-2/',
        ),
    'app-landing-3' => array(
        'title'         => __('App Landing 3', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/app-landing-3/',
        ),
    'auto-mobile' => array(
        'title'         => __('Auto Mobile', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/auto-mobile/?pri_color=d11718',
        ),
    'baking' => array(
        'title'         => __('Baking', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/baking/',
        ),
    'barber' => array(
        'title'         => __('Barber', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/barber/?pri_color=2e221f',
        ),
    'business-1' => array(
        'title'         => __('Business 1', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/business-1/',
        ),
    'business-2' => array(
        'title'         => __('Business 2', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/business-2/',
        ),
    'business-3' => array(
        'title'         => __('Business 3', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/business-3/',
        ),
    'carpentry' => array(
        'title'         => __('Carpentry', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/carpentry/?pri_color=c29269',
        ),
    'charity' => array(
        'title'         => __('Charity', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/skin-charity/?pri_color=fec487',
        ),
    'coming-soon-1' => array(
        'title'         => __('Coming soon 1', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/coming-soon-1/',
        ),
    'coming-soon-2' => array(
        'title'         => __('Coming soon 2', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/coming-soon-2/',
        ),
    'coming-soon-3' => array(
        'title'         => __('Coming soon 3', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/coming-soon-3/',
        ),
    'coming-soon-4' => array(
        'title'         => __('Coming soon 4', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/coming-soon-new/',
        ),
    'construction-1' => array(
        'title'         => __('Construction 1', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/skin-construction/?pri_color=f9c722',
        ),
    'construction-2' => array(
        'title'         => __('Construction 2', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/construction-2/?pri_color=fddb00',
        ),
    'consulting' => array(
        'title'         => __('Consulting', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/consulting/?pri_color=006899',
        ),
    'crafter' => array(
        'title'         => __('Crafter', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/crafter/?pri_color=77d48d',
        ),
    'creative-agency-1' => array(
        'title'         => __('Creative Agency 1', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/creative-agency-1/',
        ),
    'creative-agency-2' => array(
        'title'         => __('Creative Agency 2', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/creative-agency-2/',
        ),
    'creative-agency-3' => array(
        'title'         => __('Creative Agency 3', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/creative-agency-3/',
        ),
    'creative-shop-landing' => array(
        'title'         => __('Creative Shop Landing', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/creative-shop-landing/',
        ),
    'default' => array(
        'title'         => __('Default', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/default/',
        ),
    'digital-agency' => array(
        'title'         => __('Digital Agency', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/digital-agency/?pri_color=256ac5',
        ),
    'event' => array(
        'title'         => __('Event', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/event',
        ),
    'fitness' => array(
        'title'         => __('Fitness', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/fitness-gym/?pri_color=f12626',
        ),
    'freelancer' => array(
        'title'         => __('Freelancer', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/freelancer/?pri_color=1a1a1a',
        ),
    'hosting' => array(
        'title'         => __('Hosting', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/hosting/?pri_color=78b0ce',
        ),
    'interior' => array(
        'title'         => __('Interior', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/interior/?pri_color=f0140c',
        ),
    'magazine' => array(
        'title'         => __('Magazine', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/magazine/',
        ),
    'medical' => array(
        'title'         => __('Medical', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/medical/',
        ),
    'modern-portfolio' => array(
        'title'         => __('Modern Portfolio', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/skin-modern-portfolio/',
        ),
    'modern-shop' => array(
        'title'         => __('Modern Shop', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/modern-shop/',
        ),
    'personal-portfolio' => array(
        'title'         => __('Personal Portfolio', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/personal-portfolio/',
        ),
    'petscare' => array(
        'title'         => __('Pets Care', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/petscare/?pri_color=f7a438',
        ),
    'photographer' => array(
        'title'         => __('Photographer', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/photographer/?pri_color=282f35',
        ),
    'photography-onepage' => array(
        'title'         => __('Photography Onepage', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/photography-onepage/',
        ),
    'portfolio-metro-1' => array(
        'title'         => __('Portfolio Metro 1', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/portfolio-metro/',
        ),
    'portfolio-metro-2' => array(
        'title'         => __('Portfolio Metro 2', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/portfolio-metro-2/',
        ),
    'product-showcase' => array(
        'title'         => __('Product Showcase', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/product-showcase/?pri_color=292829',
        ),
    'repair-devices' => array(
        'title'         => __('Repair Devices', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/repair-devices/',
        ),
    'restaurant-1' => array(
        'title'         => __('Restaurant 1', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/restaurant/?pri_color=222222',
        ),
    'restaurant-2' => array(
        'title'         => __('Restaurant 2', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/restaurant-2/?pri_color=ffb702',
        ),
    'resume-cv' => array(
        'title'         => __('Resume CV', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/resume-cv/?pri_color=f93535',
        ),
    'shop-classic' => array(
        'title'         => __('Shop Classic', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/shop-classic/?pri_color=e7518e',
        ),
    'single-portfolio' => array(
        'title'         => __('Single Portfolio', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/singleportfolio/',
        ),
    'site-maintenance' => array(
        'title'         => __('Site Maintenance', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/wordpress-maintenance/',
        ),
    'wedding' => array(
        'title'         => __('Wedding', 'amz-importer'),
        'preview_url'   => 'http://innwithemes.com/composer/wedding/?pri_color=c43f65',
        ),
    );
AMZ_Demo_Importer::instance( $settings, $options );
