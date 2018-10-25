<?php 

function sortByOrder($a, $b) {
    return $a['order'] - $b['order'];
}

/**
 * SMOF Options Machine Class
 *
 * @package     WordPress
 * @subpackage  SMOF
 * @since       1.0.0
 * @author      Syamil MJ
 */
class Composer_Options_Machine {

	/**
	 * PHP5 contructor
	 *
	 * @since 1.0.0
	 */
	function __construct($options) {
		
		$return = $this->optionsframework_machine($options);
		
		$this->Inputs = $return[0];
		$this->Menu = $return[1];
		$this->Defaults = $return[2];

		add_action( 'wp_ajax_composer_change_gfont_weight', array($this,'composer_change_gfont_weight'));
		
	}

	/** 
	 * Sanitize option
	 *
	 * Sanitize & returns default values if don't exist
	 * 
	 * Notes:
	 	- For further uses, you can check for the $value['type'] and performs
	 	  more speficic sanitization on the option
	 	- The ultimate objective of this function is to prevent the "undefined index"
	 	  errors some authors are having due to malformed options array
	 */
	static function sanitize_option( $value ) {
		$defaults = array(
			"name" 		=> "",
			"desc" 		=> "",
			"id" 		=> "",
			"std" 		=> "",
			"mod"		=> "",
			"type" 		=> ""
		);

		$value = wp_parse_args( $value, $defaults );

		return $value;

	}


	/**
	 * Process options data and build option fields
	 *
	 * @uses get_theme_mod()
	 *
	 * @access public
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public static function optionsframework_machine($options) {
		global $smof_output, $smof_details, $smof_data;

		if (empty($options))
			return;
		if (empty($smof_data))
			$smof_data = of_get_options();
		$smof_data = $smof_data;

		$custom_fonts = isset( $smof_data['custom_fonts'] ) ? $smof_data['custom_fonts'] : array();

		if( $custom_fonts ) {
			usort( $custom_fonts, 'sortByOrder');
		}

		//Google Webfonts
		$fonts = '{"items":[{"family":"ABeeZee","variants":["regular","italic"],"subsets":["latin"]},{"family":"Abel","variants":["regular"],"subsets":["latin"]},{"family":"Abhaya Libre","variants":["regular","500","600","700","800"],"subsets":["sinhala","latin-ext","latin"]},{"family":"Abril Fatface","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Aclonica","variants":["regular"],"subsets":["latin"]},{"family":"Acme","variants":["regular"],"subsets":["latin"]},{"family":"Actor","variants":["regular"],"subsets":["latin"]},{"family":"Adamina","variants":["regular"],"subsets":["latin"]},{"family":"Advent Pro","variants":["100","200","300","regular","500","600","700"],"subsets":["greek","latin-ext","latin"]},{"family":"Aguafina Script","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Akronim","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Aladin","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Aldrich","variants":["regular"],"subsets":["latin"]},{"family":"Alef","variants":["regular","700"],"subsets":["hebrew","latin"]},{"family":"Alegreya","variants":["regular","italic","700","700italic","900","900italic"],"subsets":["latin-ext","latin"]},{"family":"Alegreya SC","variants":["regular","italic","700","700italic","900","900italic"],"subsets":["latin-ext","latin"]},{"family":"Alegreya Sans","variants":["100","100italic","300","300italic","regular","italic","500","500italic","700","700italic","800","800italic","900","900italic"],"subsets":["vietnamese","latin-ext","latin"]},{"family":"Alegreya Sans SC","variants":["100","100italic","300","300italic","regular","italic","500","500italic","700","700italic","800","800italic","900","900italic"],"subsets":["vietnamese","latin-ext","latin"]},{"family":"Alex Brush","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Alfa Slab One","variants":["regular"],"subsets":["latin"]},{"family":"Alice","variants":["regular"],"subsets":["latin"]},{"family":"Alike","variants":["regular"],"subsets":["latin"]},{"family":"Alike Angular","variants":["regular"],"subsets":["latin"]},{"family":"Allan","variants":["regular","700"],"subsets":["latin-ext","latin"]},{"family":"Allerta","variants":["regular"],"subsets":["latin"]},{"family":"Allerta Stencil","variants":["regular"],"subsets":["latin"]},{"family":"Allura","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Almendra","variants":["regular","italic","700","700italic"],"subsets":["latin-ext","latin"]},{"family":"Almendra Display","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Almendra SC","variants":["regular"],"subsets":["latin"]},{"family":"Amarante","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Amaranth","variants":["regular","italic","700","700italic"],"subsets":["latin"]},{"family":"Amatic SC","variants":["regular","700"],"subsets":["latin-ext","latin"]},{"family":"Amatica SC","variants":["regular","700"],"subsets":["hebrew","latin-ext","latin"]},{"family":"Amethysta","variants":["regular"],"subsets":["latin"]},{"family":"Amiko","variants":["regular","600","700"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Amiri","variants":["regular","italic","700","700italic"],"subsets":["latin","arabic"]},{"family":"Amita","variants":["regular","700"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Anaheim","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Andada","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Andika","variants":["regular"],"subsets":["vietnamese","cyrillic","latin-ext","latin","cyrillic-ext"]},{"family":"Angkor","variants":["regular"],"subsets":["khmer"]},{"family":"Annie Use Your Telescope","variants":["regular"],"subsets":["latin"]},{"family":"Anonymous Pro","variants":["regular","italic","700","700italic"],"subsets":["greek","cyrillic","latin-ext","latin"]},{"family":"Antic","variants":["regular"],"subsets":["latin"]},{"family":"Antic Didone","variants":["regular"],"subsets":["latin"]},{"family":"Antic Slab","variants":["regular"],"subsets":["latin"]},{"family":"Anton","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Arapey","variants":["regular","italic"],"subsets":["latin"]},{"family":"Arbutus","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Arbutus Slab","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Architects Daughter","variants":["regular"],"subsets":["latin"]},{"family":"Archivo Black","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Archivo Narrow","variants":["regular","italic","700","700italic"],"subsets":["latin-ext","latin"]},{"family":"Aref Ruqaa","variants":["regular","700"],"subsets":["latin","arabic"]},{"family":"Arima Madurai","variants":["100","200","300","regular","500","700","800","900"],"subsets":["vietnamese","latin-ext","latin","tamil"]},{"family":"Arimo","variants":["regular","italic","700","700italic"],"subsets":["hebrew","vietnamese","greek","cyrillic","latin-ext","latin","cyrillic-ext","greek-ext"]},{"family":"Arizonia","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Armata","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Artifika","variants":["regular"],"subsets":["latin"]},{"family":"Arvo","variants":["regular","italic","700","700italic"],"subsets":["latin"]},{"family":"Arya","variants":["regular","700"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Asap","variants":["regular","italic","700","700italic"],"subsets":["latin-ext","latin"]},{"family":"Asar","variants":["regular"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Asset","variants":["regular"],"subsets":["latin"]},{"family":"Assistant","variants":["200","300","regular","600","700","800"],"subsets":["hebrew","latin"]},{"family":"Astloch","variants":["regular","700"],"subsets":["latin"]},{"family":"Asul","variants":["regular","700"],"subsets":["latin"]},{"family":"Athiti","variants":["200","300","regular","500","600","700"],"subsets":["vietnamese","thai","latin-ext","latin"]},{"family":"Atma","variants":["300","regular","500","600","700"],"subsets":["bengali","latin-ext","latin"]},{"family":"Atomic Age","variants":["regular"],"subsets":["latin"]},{"family":"Aubrey","variants":["regular"],"subsets":["latin"]},{"family":"Audiowide","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Autour One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Average","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Average Sans","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Averia Gruesa Libre","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Averia Libre","variants":["300","300italic","regular","italic","700","700italic"],"subsets":["latin"]},{"family":"Averia Sans Libre","variants":["300","300italic","regular","italic","700","700italic"],"subsets":["latin"]},{"family":"Averia Serif Libre","variants":["300","300italic","regular","italic","700","700italic"],"subsets":["latin"]},{"family":"Bad Script","variants":["regular"],"subsets":["cyrillic","latin"]},{"family":"Baloo","variants":["regular"],"subsets":["vietnamese","devanagari","latin-ext","latin"]},{"family":"Baloo Bhai","variants":["regular"],"subsets":["gujarati","vietnamese","latin-ext","latin"]},{"family":"Baloo Bhaina","variants":["regular"],"subsets":["vietnamese","oriya","latin-ext","latin"]},{"family":"Baloo Chettan","variants":["regular"],"subsets":["vietnamese","latin-ext","latin","malayalam"]},{"family":"Baloo Da","variants":["regular"],"subsets":["bengali","vietnamese","latin-ext","latin"]},{"family":"Baloo Paaji","variants":["regular"],"subsets":["vietnamese","gurmukhi","latin-ext","latin"]},{"family":"Baloo Tamma","variants":["regular"],"subsets":["vietnamese","latin-ext","latin","kannada"]},{"family":"Baloo Thambi","variants":["regular"],"subsets":["vietnamese","latin-ext","latin","tamil"]},{"family":"Balthazar","variants":["regular"],"subsets":["latin"]},{"family":"Bangers","variants":["regular"],"subsets":["latin"]},{"family":"Basic","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Battambang","variants":["regular","700"],"subsets":["khmer"]},{"family":"Baumans","variants":["regular"],"subsets":["latin"]},{"family":"Bayon","variants":["regular"],"subsets":["khmer"]},{"family":"Belgrano","variants":["regular"],"subsets":["latin"]},{"family":"Belleza","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"BenchNine","variants":["300","regular","700"],"subsets":["latin-ext","latin"]},{"family":"Bentham","variants":["regular"],"subsets":["latin"]},{"family":"Berkshire Swash","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Bevan","variants":["regular"],"subsets":["latin"]},{"family":"Bigelow Rules","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Bigshot One","variants":["regular"],"subsets":["latin"]},{"family":"Bilbo","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Bilbo Swash Caps","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"BioRhyme","variants":["200","300","regular","700","800"],"subsets":["latin-ext","latin"]},{"family":"BioRhyme Expanded","variants":["200","300","regular","700","800"],"subsets":["latin-ext","latin"]},{"family":"Biryani","variants":["200","300","regular","600","700","800","900"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Bitter","variants":["regular","italic","700"],"subsets":["latin-ext","latin"]},{"family":"Black Ops One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Bokor","variants":["regular"],"subsets":["khmer"]},{"family":"Bonbon","variants":["regular"],"subsets":["latin"]},{"family":"Boogaloo","variants":["regular"],"subsets":["latin"]},{"family":"Bowlby One","variants":["regular"],"subsets":["latin"]},{"family":"Bowlby One SC","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Brawler","variants":["regular"],"subsets":["latin"]},{"family":"Bree Serif","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Bubblegum Sans","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Bubbler One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Buda","variants":["300"],"subsets":["latin"]},{"family":"Buenard","variants":["regular","700"],"subsets":["latin-ext","latin"]},{"family":"Bungee","variants":["regular"],"subsets":["vietnamese","latin-ext","latin"]},{"family":"Bungee Hairline","variants":["regular"],"subsets":["vietnamese","latin-ext","latin"]},{"family":"Bungee Inline","variants":["regular"],"subsets":["vietnamese","latin-ext","latin"]},{"family":"Bungee Outline","variants":["regular"],"subsets":["vietnamese","latin-ext","latin"]},{"family":"Bungee Shade","variants":["regular"],"subsets":["vietnamese","latin-ext","latin"]},{"family":"Butcherman","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Butterfly Kids","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Cabin","variants":["regular","italic","500","500italic","600","600italic","700","700italic"],"subsets":["latin"]},{"family":"Cabin Condensed","variants":["regular","500","600","700"],"subsets":["latin"]},{"family":"Cabin Sketch","variants":["regular","700"],"subsets":["latin"]},{"family":"Caesar Dressing","variants":["regular"],"subsets":["latin"]},{"family":"Cagliostro","variants":["regular"],"subsets":["latin"]},{"family":"Cairo","variants":["200","300","regular","600","700","900"],"subsets":["latin-ext","latin","arabic"]},{"family":"Calligraffitti","variants":["regular"],"subsets":["latin"]},{"family":"Cambay","variants":["regular","italic","700","700italic"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Cambo","variants":["regular"],"subsets":["latin"]},{"family":"Candal","variants":["regular"],"subsets":["latin"]},{"family":"Cantarell","variants":["regular","italic","700","700italic"],"subsets":["latin"]},{"family":"Cantata One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Cantora One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Capriola","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Cardo","variants":["regular","italic","700"],"subsets":["greek","latin-ext","latin","greek-ext"]},{"family":"Carme","variants":["regular"],"subsets":["latin"]},{"family":"Carrois Gothic","variants":["regular"],"subsets":["latin"]},{"family":"Carrois Gothic SC","variants":["regular"],"subsets":["latin"]},{"family":"Carter One","variants":["regular"],"subsets":["latin"]},{"family":"Catamaran","variants":["100","200","300","regular","500","600","700","800","900"],"subsets":["latin-ext","latin","tamil"]},{"family":"Caudex","variants":["regular","italic","700","700italic"],"subsets":["greek","latin-ext","latin","greek-ext"]},{"family":"Caveat","variants":["regular","700"],"subsets":["latin-ext","latin"]},{"family":"Caveat Brush","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Cedarville Cursive","variants":["regular"],"subsets":["latin"]},{"family":"Ceviche One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Changa","variants":["200","300","regular","500","600","700","800"],"subsets":["latin-ext","latin","arabic"]},{"family":"Changa One","variants":["regular","italic"],"subsets":["latin"]},{"family":"Chango","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Chathura","variants":["100","300","regular","700","800"],"subsets":["latin","telugu"]},{"family":"Chau Philomene One","variants":["regular","italic"],"subsets":["latin-ext","latin"]},{"family":"Chela One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Chelsea Market","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Chenla","variants":["regular"],"subsets":["khmer"]},{"family":"Cherry Cream Soda","variants":["regular"],"subsets":["latin"]},{"family":"Cherry Swash","variants":["regular","700"],"subsets":["latin-ext","latin"]},{"family":"Chewy","variants":["regular"],"subsets":["latin"]},{"family":"Chicle","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Chivo","variants":["regular","italic","900","900italic"],"subsets":["latin"]},{"family":"Chonburi","variants":["regular"],"subsets":["vietnamese","thai","latin-ext","latin"]},{"family":"Cinzel","variants":["regular","700","900"],"subsets":["latin"]},{"family":"Cinzel Decorative","variants":["regular","700","900"],"subsets":["latin"]},{"family":"Clicker Script","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Coda","variants":["regular","800"],"subsets":["latin-ext","latin"]},{"family":"Coda Caption","variants":["800"],"subsets":["latin-ext","latin"]},{"family":"Codystar","variants":["300","regular"],"subsets":["latin-ext","latin"]},{"family":"Coiny","variants":["regular"],"subsets":["vietnamese","latin-ext","latin","tamil"]},{"family":"Combo","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Comfortaa","variants":["300","regular","700"],"subsets":["greek","cyrillic","latin-ext","latin","cyrillic-ext"]},{"family":"Coming Soon","variants":["regular"],"subsets":["latin"]},{"family":"Concert One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Condiment","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Content","variants":["regular","700"],"subsets":["khmer"]},{"family":"Contrail One","variants":["regular"],"subsets":["latin"]},{"family":"Convergence","variants":["regular"],"subsets":["latin"]},{"family":"Cookie","variants":["regular"],"subsets":["latin"]},{"family":"Copse","variants":["regular"],"subsets":["latin"]},{"family":"Corben","variants":["regular","700"],"subsets":["latin-ext","latin"]},{"family":"Cormorant","variants":["300","300italic","regular","italic","500","500italic","600","600italic","700","700italic"],"subsets":["vietnamese","cyrillic","latin-ext","latin"]},{"family":"Cormorant Garamond","variants":["300","300italic","regular","italic","500","500italic","600","600italic","700","700italic"],"subsets":["vietnamese","cyrillic","latin-ext","latin"]},{"family":"Cormorant Infant","variants":["300","300italic","regular","italic","500","500italic","600","600italic","700","700italic"],"subsets":["vietnamese","cyrillic","latin-ext","latin"]},{"family":"Cormorant SC","variants":["300","regular","500","600","700"],"subsets":["vietnamese","cyrillic","latin-ext","latin"]},{"family":"Cormorant Unicase","variants":["300","regular","500","600","700"],"subsets":["vietnamese","cyrillic","latin-ext","latin"]},{"family":"Cormorant Upright","variants":["300","regular","500","600","700"],"subsets":["vietnamese","latin-ext","latin"]},{"family":"Courgette","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Cousine","variants":["regular","italic","700","700italic"],"subsets":["hebrew","vietnamese","greek","cyrillic","latin-ext","latin","cyrillic-ext","greek-ext"]},{"family":"Coustard","variants":["regular","900"],"subsets":["latin"]},{"family":"Covered By Your Grace","variants":["regular"],"subsets":["latin"]},{"family":"Crafty Girls","variants":["regular"],"subsets":["latin"]},{"family":"Creepster","variants":["regular"],"subsets":["latin"]},{"family":"Crete Round","variants":["regular","italic"],"subsets":["latin-ext","latin"]},{"family":"Crimson Text","variants":["regular","italic","600","600italic","700","700italic"],"subsets":["latin"]},{"family":"Croissant One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Crushed","variants":["regular"],"subsets":["latin"]},{"family":"Cuprum","variants":["regular","italic","700","700italic"],"subsets":["cyrillic","latin-ext","latin"]},{"family":"Cutive","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Cutive Mono","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Damion","variants":["regular"],"subsets":["latin"]},{"family":"Dancing Script","variants":["regular","700"],"subsets":["latin"]},{"family":"Dangrek","variants":["regular"],"subsets":["khmer"]},{"family":"David Libre","variants":["regular","500","700"],"subsets":["hebrew","vietnamese","latin-ext","latin"]},{"family":"Dawning of a New Day","variants":["regular"],"subsets":["latin"]},{"family":"Days One","variants":["regular"],"subsets":["latin"]},{"family":"Dekko","variants":["regular"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Delius","variants":["regular"],"subsets":["latin"]},{"family":"Delius Swash Caps","variants":["regular"],"subsets":["latin"]},{"family":"Delius Unicase","variants":["regular","700"],"subsets":["latin"]},{"family":"Della Respira","variants":["regular"],"subsets":["latin"]},{"family":"Denk One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Devonshire","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Dhurjati","variants":["regular"],"subsets":["latin","telugu"]},{"family":"Didact Gothic","variants":["regular"],"subsets":["greek","cyrillic","latin-ext","latin","cyrillic-ext","greek-ext"]},{"family":"Diplomata","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Diplomata SC","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Domine","variants":["regular","700"],"subsets":["latin-ext","latin"]},{"family":"Donegal One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Doppio One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Dorsa","variants":["regular"],"subsets":["latin"]},{"family":"Dosis","variants":["200","300","regular","500","600","700","800"],"subsets":["latin-ext","latin"]},{"family":"Dr Sugiyama","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Droid Sans","variants":["regular","700"],"subsets":["latin"]},{"family":"Droid Sans Mono","variants":["regular"],"subsets":["latin"]},{"family":"Droid Serif","variants":["regular","italic","700","700italic"],"subsets":["latin"]},{"family":"Duru Sans","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Dynalight","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"EB Garamond","variants":["regular"],"subsets":["vietnamese","cyrillic","latin-ext","latin","cyrillic-ext"]},{"family":"Eagle Lake","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Eater","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Economica","variants":["regular","italic","700","700italic"],"subsets":["latin-ext","latin"]},{"family":"Eczar","variants":["regular","500","600","700","800"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Ek Mukta","variants":["200","300","regular","500","600","700","800"],"subsets":["devanagari","latin-ext","latin"]},{"family":"El Messiri","variants":["regular","500","600","700"],"subsets":["cyrillic","latin","arabic"]},{"family":"Electrolize","variants":["regular"],"subsets":["latin"]},{"family":"Elsie","variants":["regular","900"],"subsets":["latin-ext","latin"]},{"family":"Elsie Swash Caps","variants":["regular","900"],"subsets":["latin-ext","latin"]},{"family":"Emblema One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Emilys Candy","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Engagement","variants":["regular"],"subsets":["latin"]},{"family":"Englebert","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Enriqueta","variants":["regular","700"],"subsets":["latin-ext","latin"]},{"family":"Erica One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Esteban","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Euphoria Script","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Ewert","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Exo","variants":["100","100italic","200","200italic","300","300italic","regular","italic","500","500italic","600","600italic","700","700italic","800","800italic","900","900italic"],"subsets":["latin-ext","latin"]},{"family":"Exo 2","variants":["100","100italic","200","200italic","300","300italic","regular","italic","500","500italic","600","600italic","700","700italic","800","800italic","900","900italic"],"subsets":["cyrillic","latin-ext","latin"]},{"family":"Expletus Sans","variants":["regular","italic","500","500italic","600","600italic","700","700italic"],"subsets":["latin"]},{"family":"Fanwood Text","variants":["regular","italic"],"subsets":["latin"]},{"family":"Farsan","variants":["regular"],"subsets":["gujarati","vietnamese","latin-ext","latin"]},{"family":"Fascinate","variants":["regular"],"subsets":["latin"]},{"family":"Fascinate Inline","variants":["regular"],"subsets":["latin"]},{"family":"Faster One","variants":["regular"],"subsets":["latin"]},{"family":"Fasthand","variants":["regular"],"subsets":["khmer"]},{"family":"Fauna One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Federant","variants":["regular"],"subsets":["latin"]},{"family":"Federo","variants":["regular"],"subsets":["latin"]},{"family":"Felipa","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Fenix","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Finger Paint","variants":["regular"],"subsets":["latin"]},{"family":"Fira Mono","variants":["regular","700"],"subsets":["greek","cyrillic","latin-ext","latin","cyrillic-ext"]},{"family":"Fira Sans","variants":["300","300italic","regular","italic","500","500italic","700","700italic"],"subsets":["greek","cyrillic","latin-ext","latin","cyrillic-ext"]},{"family":"Fjalla One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Fjord One","variants":["regular"],"subsets":["latin"]},{"family":"Flamenco","variants":["300","regular"],"subsets":["latin"]},{"family":"Flavors","variants":["regular"],"subsets":["latin"]},{"family":"Fondamento","variants":["regular","italic"],"subsets":["latin-ext","latin"]},{"family":"Fontdiner Swanky","variants":["regular"],"subsets":["latin"]},{"family":"Forum","variants":["regular"],"subsets":["cyrillic","latin-ext","latin","cyrillic-ext"]},{"family":"Francois One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Frank Ruhl Libre","variants":["300","regular","500","700","900"],"subsets":["hebrew","latin-ext","latin"]},{"family":"Freckle Face","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Fredericka the Great","variants":["regular"],"subsets":["latin"]},{"family":"Fredoka One","variants":["regular"],"subsets":["latin"]},{"family":"Freehand","variants":["regular"],"subsets":["khmer"]},{"family":"Fresca","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Frijole","variants":["regular"],"subsets":["latin"]},{"family":"Fruktur","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Fugaz One","variants":["regular"],"subsets":["latin"]},{"family":"GFS Didot","variants":["regular"],"subsets":["greek"]},{"family":"GFS Neohellenic","variants":["regular","italic","700","700italic"],"subsets":["greek"]},{"family":"Gabriela","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Gafata","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Galada","variants":["regular"],"subsets":["bengali","latin"]},{"family":"Galdeano","variants":["regular"],"subsets":["latin"]},{"family":"Galindo","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Gentium Basic","variants":["regular","italic","700","700italic"],"subsets":["latin-ext","latin"]},{"family":"Gentium Book Basic","variants":["regular","italic","700","700italic"],"subsets":["latin-ext","latin"]},{"family":"Geo","variants":["regular","italic"],"subsets":["latin"]},{"family":"Geostar","variants":["regular"],"subsets":["latin"]},{"family":"Geostar Fill","variants":["regular"],"subsets":["latin"]},{"family":"Germania One","variants":["regular"],"subsets":["latin"]},{"family":"Gidugu","variants":["regular"],"subsets":["latin","telugu"]},{"family":"Gilda Display","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Give You Glory","variants":["regular"],"subsets":["latin"]},{"family":"Glass Antiqua","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Glegoo","variants":["regular","700"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Gloria Hallelujah","variants":["regular"],"subsets":["latin"]},{"family":"Goblin One","variants":["regular"],"subsets":["latin"]},{"family":"Gochi Hand","variants":["regular"],"subsets":["latin"]},{"family":"Gorditas","variants":["regular","700"],"subsets":["latin"]},{"family":"Goudy Bookletter 1911","variants":["regular"],"subsets":["latin"]},{"family":"Graduate","variants":["regular"],"subsets":["latin"]},{"family":"Grand Hotel","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Gravitas One","variants":["regular"],"subsets":["latin"]},{"family":"Great Vibes","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Griffy","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Gruppo","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Gudea","variants":["regular","italic","700"],"subsets":["latin-ext","latin"]},{"family":"Gurajada","variants":["regular"],"subsets":["latin","telugu"]},{"family":"Habibi","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Halant","variants":["300","regular","500","600","700"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Hammersmith One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Hanalei","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Hanalei Fill","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Handlee","variants":["regular"],"subsets":["latin"]},{"family":"Hanuman","variants":["regular","700"],"subsets":["khmer"]},{"family":"Happy Monkey","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Harmattan","variants":["regular"],"subsets":["latin","arabic"]},{"family":"Headland One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Heebo","variants":["100","300","regular","500","700","800","900"],"subsets":["hebrew","latin"]},{"family":"Henny Penny","variants":["regular"],"subsets":["latin"]},{"family":"Herr Von Muellerhoff","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Hind","variants":["300","regular","500","600","700"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Hind Guntur","variants":["300","regular","500","600","700"],"subsets":["latin-ext","latin","telugu"]},{"family":"Hind Madurai","variants":["300","regular","500","600","700"],"subsets":["latin-ext","latin","tamil"]},{"family":"Hind Siliguri","variants":["300","regular","500","600","700"],"subsets":["bengali","latin-ext","latin"]},{"family":"Hind Vadodara","variants":["300","regular","500","600","700"],"subsets":["gujarati","latin-ext","latin"]},{"family":"Holtwood One SC","variants":["regular"],"subsets":["latin"]},{"family":"Homemade Apple","variants":["regular"],"subsets":["latin"]},{"family":"Homenaje","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"IM Fell DW Pica","variants":["regular","italic"],"subsets":["latin"]},{"family":"IM Fell DW Pica SC","variants":["regular"],"subsets":["latin"]},{"family":"IM Fell Double Pica","variants":["regular","italic"],"subsets":["latin"]},{"family":"IM Fell Double Pica SC","variants":["regular"],"subsets":["latin"]},{"family":"IM Fell English","variants":["regular","italic"],"subsets":["latin"]},{"family":"IM Fell English SC","variants":["regular"],"subsets":["latin"]},{"family":"IM Fell French Canon","variants":["regular","italic"],"subsets":["latin"]},{"family":"IM Fell French Canon SC","variants":["regular"],"subsets":["latin"]},{"family":"IM Fell Great Primer","variants":["regular","italic"],"subsets":["latin"]},{"family":"IM Fell Great Primer SC","variants":["regular"],"subsets":["latin"]},{"family":"Iceberg","variants":["regular"],"subsets":["latin"]},{"family":"Iceland","variants":["regular"],"subsets":["latin"]},{"family":"Imprima","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Inconsolata","variants":["regular","700"],"subsets":["latin-ext","latin"]},{"family":"Inder","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Indie Flower","variants":["regular"],"subsets":["latin"]},{"family":"Inika","variants":["regular","700"],"subsets":["latin-ext","latin"]},{"family":"Inknut Antiqua","variants":["300","regular","500","600","700","800","900"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Irish Grover","variants":["regular"],"subsets":["latin"]},{"family":"Istok Web","variants":["regular","italic","700","700italic"],"subsets":["cyrillic","latin-ext","latin","cyrillic-ext"]},{"family":"Italiana","variants":["regular"],"subsets":["latin"]},{"family":"Italianno","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Itim","variants":["regular"],"subsets":["vietnamese","thai","latin-ext","latin"]},{"family":"Jacques Francois","variants":["regular"],"subsets":["latin"]},{"family":"Jacques Francois Shadow","variants":["regular"],"subsets":["latin"]},{"family":"Jaldi","variants":["regular","700"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Jim Nightshade","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Jockey One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Jolly Lodger","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Jomhuria","variants":["regular"],"subsets":["latin-ext","latin","arabic"]},{"family":"Josefin Sans","variants":["100","100italic","300","300italic","regular","italic","600","600italic","700","700italic"],"subsets":["latin-ext","latin"]},{"family":"Josefin Slab","variants":["100","100italic","300","300italic","regular","italic","600","600italic","700","700italic"],"subsets":["latin"]},{"family":"Joti One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Judson","variants":["regular","italic","700"],"subsets":["vietnamese","latin-ext","latin"]},{"family":"Julee","variants":["regular"],"subsets":["latin"]},{"family":"Julius Sans One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Junge","variants":["regular"],"subsets":["latin"]},{"family":"Jura","variants":["300","regular","500","600"],"subsets":["greek","cyrillic","latin-ext","latin","cyrillic-ext"]},{"family":"Just Another Hand","variants":["regular"],"subsets":["latin"]},{"family":"Just Me Again Down Here","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Kadwa","variants":["regular","700"],"subsets":["devanagari","latin"]},{"family":"Kalam","variants":["300","regular","700"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Kameron","variants":["regular","700"],"subsets":["latin"]},{"family":"Kanit","variants":["100","100italic","200","200italic","300","300italic","regular","italic","500","500italic","600","600italic","700","700italic","800","800italic","900","900italic"],"subsets":["vietnamese","thai","latin-ext","latin"]},{"family":"Kantumruy","variants":["300","regular","700"],"subsets":["khmer"]},{"family":"Karla","variants":["regular","italic","700","700italic"],"subsets":["latin-ext","latin"]},{"family":"Karma","variants":["300","regular","500","600","700"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Katibeh","variants":["regular"],"subsets":["latin-ext","latin","arabic"]},{"family":"Kaushan Script","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Kavivanar","variants":["regular"],"subsets":["latin-ext","latin","tamil"]},{"family":"Kavoon","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Kdam Thmor","variants":["regular"],"subsets":["khmer"]},{"family":"Keania One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Kelly Slab","variants":["regular"],"subsets":["cyrillic","latin-ext","latin"]},{"family":"Kenia","variants":["regular"],"subsets":["latin"]},{"family":"Khand","variants":["300","regular","500","600","700"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Khmer","variants":["regular"],"subsets":["khmer"]},{"family":"Khula","variants":["300","regular","600","700","800"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Kite One","variants":["regular"],"subsets":["latin"]},{"family":"Knewave","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Kotta One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Koulen","variants":["regular"],"subsets":["khmer"]},{"family":"Kranky","variants":["regular"],"subsets":["latin"]},{"family":"Kreon","variants":["300","regular","700"],"subsets":["latin"]},{"family":"Kristi","variants":["regular"],"subsets":["latin"]},{"family":"Krona One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Kumar One","variants":["regular"],"subsets":["gujarati","latin-ext","latin"]},{"family":"Kumar One Outline","variants":["regular"],"subsets":["gujarati","latin-ext","latin"]},{"family":"Kurale","variants":["regular"],"subsets":["cyrillic","devanagari","latin-ext","latin"]},{"family":"La Belle Aurore","variants":["regular"],"subsets":["latin"]},{"family":"Laila","variants":["300","regular","500","600","700"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Lakki Reddy","variants":["regular"],"subsets":["latin","telugu"]},{"family":"Lalezar","variants":["regular"],"subsets":["vietnamese","latin-ext","latin","arabic"]},{"family":"Lancelot","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Lateef","variants":["regular"],"subsets":["latin","arabic"]},{"family":"Lato","variants":["100","100italic","300","300italic","regular","italic","700","700italic","900","900italic"],"subsets":["latin-ext","latin"]},{"family":"League Script","variants":["regular"],"subsets":["latin"]},{"family":"Leckerli One","variants":["regular"],"subsets":["latin"]},{"family":"Ledger","variants":["regular"],"subsets":["cyrillic","latin-ext","latin"]},{"family":"Lekton","variants":["regular","italic","700"],"subsets":["latin-ext","latin"]},{"family":"Lemon","variants":["regular"],"subsets":["latin"]},{"family":"Lemonada","variants":["300","regular","600","700"],"subsets":["vietnamese","latin-ext","latin","arabic"]},{"family":"Libre Baskerville","variants":["regular","italic","700"],"subsets":["latin-ext","latin"]},{"family":"Libre Franklin","variants":["100","100italic","200","200italic","300","300italic","regular","italic","500","500italic","600","600italic","700","700italic","800","800italic","900","900italic"],"subsets":["latin-ext","latin"]},{"family":"Life Savers","variants":["regular","700"],"subsets":["latin-ext","latin"]},{"family":"Lilita One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Lily Script One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Limelight","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Linden Hill","variants":["regular","italic"],"subsets":["latin"]},{"family":"Lobster","variants":["regular"],"subsets":["vietnamese","cyrillic","latin-ext","latin"]},{"family":"Lobster Two","variants":["regular","italic","700","700italic"],"subsets":["latin"]},{"family":"Londrina Outline","variants":["regular"],"subsets":["latin"]},{"family":"Londrina Shadow","variants":["regular"],"subsets":["latin"]},{"family":"Londrina Sketch","variants":["regular"],"subsets":["latin"]},{"family":"Londrina Solid","variants":["regular"],"subsets":["latin"]},{"family":"Lora","variants":["regular","italic","700","700italic"],"subsets":["cyrillic","latin-ext","latin"]},{"family":"Love Ya Like A Sister","variants":["regular"],"subsets":["latin"]},{"family":"Loved by the King","variants":["regular"],"subsets":["latin"]},{"family":"Lovers Quarrel","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Luckiest Guy","variants":["regular"],"subsets":["latin"]},{"family":"Lusitana","variants":["regular","700"],"subsets":["latin"]},{"family":"Lustria","variants":["regular"],"subsets":["latin"]},{"family":"Macondo","variants":["regular"],"subsets":["latin"]},{"family":"Macondo Swash Caps","variants":["regular"],"subsets":["latin"]},{"family":"Mada","variants":["300","regular","500","900"],"subsets":["latin","arabic"]},{"family":"Magra","variants":["regular","700"],"subsets":["latin-ext","latin"]},{"family":"Maiden Orange","variants":["regular"],"subsets":["latin"]},{"family":"Maitree","variants":["200","300","regular","500","600","700"],"subsets":["vietnamese","thai","latin-ext","latin"]},{"family":"Mako","variants":["regular"],"subsets":["latin"]},{"family":"Mallanna","variants":["regular"],"subsets":["latin","telugu"]},{"family":"Mandali","variants":["regular"],"subsets":["latin","telugu"]},{"family":"Marcellus","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Marcellus SC","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Marck Script","variants":["regular"],"subsets":["cyrillic","latin-ext","latin"]},{"family":"Margarine","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Marko One","variants":["regular"],"subsets":["latin"]},{"family":"Marmelad","variants":["regular"],"subsets":["cyrillic","latin-ext","latin"]},{"family":"Martel","variants":["200","300","regular","600","700","800","900"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Martel Sans","variants":["200","300","regular","600","700","800","900"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Marvel","variants":["regular","italic","700","700italic"],"subsets":["latin"]},{"family":"Mate","variants":["regular","italic"],"subsets":["latin"]},{"family":"Mate SC","variants":["regular"],"subsets":["latin"]},{"family":"Maven Pro","variants":["regular","500","700","900"],"subsets":["latin"]},{"family":"McLaren","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Meddon","variants":["regular"],"subsets":["latin"]},{"family":"MedievalSharp","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Medula One","variants":["regular"],"subsets":["latin"]},{"family":"Meera Inimai","variants":["regular"],"subsets":["latin","tamil"]},{"family":"Megrim","variants":["regular"],"subsets":["latin"]},{"family":"Meie Script","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Merienda","variants":["regular","700"],"subsets":["latin-ext","latin"]},{"family":"Merienda One","variants":["regular"],"subsets":["latin"]},{"family":"Merriweather","variants":["300","300italic","regular","italic","700","700italic","900","900italic"],"subsets":["cyrillic","latin-ext","latin","cyrillic-ext"]},{"family":"Merriweather Sans","variants":["300","300italic","regular","italic","700","700italic","800","800italic"],"subsets":["latin-ext","latin"]},{"family":"Metal","variants":["regular"],"subsets":["khmer"]},{"family":"Metal Mania","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Metamorphous","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Metrophobic","variants":["regular"],"subsets":["latin"]},{"family":"Michroma","variants":["regular"],"subsets":["latin"]},{"family":"Milonga","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Miltonian","variants":["regular"],"subsets":["latin"]},{"family":"Miltonian Tattoo","variants":["regular"],"subsets":["latin"]},{"family":"Miniver","variants":["regular"],"subsets":["latin"]},{"family":"Miriam Libre","variants":["regular","700"],"subsets":["hebrew","latin-ext","latin"]},{"family":"Mirza","variants":["regular","500","600","700"],"subsets":["latin-ext","latin","arabic"]},{"family":"Miss Fajardose","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Mitr","variants":["200","300","regular","500","600","700"],"subsets":["vietnamese","thai","latin-ext","latin"]},{"family":"Modak","variants":["regular"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Modern Antiqua","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Mogra","variants":["regular"],"subsets":["gujarati","latin-ext","latin"]},{"family":"Molengo","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Molle","variants":["italic"],"subsets":["latin-ext","latin"]},{"family":"Monda","variants":["regular","700"],"subsets":["latin-ext","latin"]},{"family":"Monofett","variants":["regular"],"subsets":["latin"]},{"family":"Monoton","variants":["regular"],"subsets":["latin"]},{"family":"Monsieur La Doulaise","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Montaga","variants":["regular"],"subsets":["latin"]},{"family":"Montez","variants":["regular"],"subsets":["latin"]},{"family":"Montserrat","variants":["regular","700"],"subsets":["latin"]},{"family":"Montserrat Alternates","variants":["regular","700"],"subsets":["latin"]},{"family":"Montserrat Subrayada","variants":["regular","700"],"subsets":["latin"]},{"family":"Moul","variants":["regular"],"subsets":["khmer"]},{"family":"Moulpali","variants":["regular"],"subsets":["khmer"]},{"family":"Mountains of Christmas","variants":["regular","700"],"subsets":["latin"]},{"family":"Mouse Memoirs","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Mr Bedfort","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Mr Dafoe","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Mr De Haviland","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Mrs Saint Delafield","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Mrs Sheppards","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Mukta Vaani","variants":["200","300","regular","500","600","700","800"],"subsets":["gujarati","latin-ext","latin"]},{"family":"Muli","variants":["300","300italic","regular","italic"],"subsets":["latin"]},{"family":"Mystery Quest","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"NTR","variants":["regular"],"subsets":["latin","telugu"]},{"family":"Neucha","variants":["regular"],"subsets":["cyrillic","latin"]},{"family":"Neuton","variants":["200","300","regular","italic","700","800"],"subsets":["latin-ext","latin"]},{"family":"New Rocker","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"News Cycle","variants":["regular","700"],"subsets":["latin-ext","latin"]},{"family":"Niconne","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Nixie One","variants":["regular"],"subsets":["latin"]},{"family":"Nobile","variants":["regular","italic","700","700italic"],"subsets":["latin"]},{"family":"Nokora","variants":["regular","700"],"subsets":["khmer"]},{"family":"Norican","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Nosifer","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Nothing You Could Do","variants":["regular"],"subsets":["latin"]},{"family":"Noticia Text","variants":["regular","italic","700","700italic"],"subsets":["vietnamese","latin-ext","latin"]},{"family":"Noto Sans","variants":["regular","italic","700","700italic"],"subsets":["vietnamese","greek","cyrillic","devanagari","latin-ext","latin","cyrillic-ext","greek-ext"]},{"family":"Noto Serif","variants":["regular","italic","700","700italic"],"subsets":["vietnamese","greek","cyrillic","latin-ext","latin","cyrillic-ext","greek-ext"]},{"family":"Nova Cut","variants":["regular"],"subsets":["latin"]},{"family":"Nova Flat","variants":["regular"],"subsets":["latin"]},{"family":"Nova Mono","variants":["regular"],"subsets":["greek","latin"]},{"family":"Nova Oval","variants":["regular"],"subsets":["latin"]},{"family":"Nova Round","variants":["regular"],"subsets":["latin"]},{"family":"Nova Script","variants":["regular"],"subsets":["latin"]},{"family":"Nova Slim","variants":["regular"],"subsets":["latin"]},{"family":"Nova Square","variants":["regular"],"subsets":["latin"]},{"family":"Numans","variants":["regular"],"subsets":["latin"]},{"family":"Nunito","variants":["300","regular","700"],"subsets":["latin"]},{"family":"Odor Mean Chey","variants":["regular"],"subsets":["khmer"]},{"family":"Offside","variants":["regular"],"subsets":["latin"]},{"family":"Old Standard TT","variants":["regular","italic","700"],"subsets":["latin"]},{"family":"Oldenburg","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Oleo Script","variants":["regular","700"],"subsets":["latin-ext","latin"]},{"family":"Oleo Script Swash Caps","variants":["regular","700"],"subsets":["latin-ext","latin"]},{"family":"Open Sans","variants":["300","300italic","regular","italic","600","600italic","700","700italic","800","800italic"],"subsets":["vietnamese","greek","cyrillic","latin-ext","latin","cyrillic-ext","greek-ext"]},{"family":"Open Sans Condensed","variants":["300","300italic","700"],"subsets":["vietnamese","greek","cyrillic","latin-ext","latin","cyrillic-ext","greek-ext"]},{"family":"Oranienbaum","variants":["regular"],"subsets":["cyrillic","latin-ext","latin","cyrillic-ext"]},{"family":"Orbitron","variants":["regular","500","700","900"],"subsets":["latin"]},{"family":"Oregano","variants":["regular","italic"],"subsets":["latin-ext","latin"]},{"family":"Orienta","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Original Surfer","variants":["regular"],"subsets":["latin"]},{"family":"Oswald","variants":["300","regular","700"],"subsets":["latin-ext","latin"]},{"family":"Over the Rainbow","variants":["regular"],"subsets":["latin"]},{"family":"Overlock","variants":["regular","italic","700","700italic","900","900italic"],"subsets":["latin-ext","latin"]},{"family":"Overlock SC","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Ovo","variants":["regular"],"subsets":["latin"]},{"family":"Oxygen","variants":["300","regular","700"],"subsets":["latin-ext","latin"]},{"family":"Oxygen Mono","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"PT Mono","variants":["regular"],"subsets":["cyrillic","latin-ext","latin","cyrillic-ext"]},{"family":"PT Sans","variants":["regular","italic","700","700italic"],"subsets":["cyrillic","latin-ext","latin","cyrillic-ext"]},{"family":"PT Sans Caption","variants":["regular","700"],"subsets":["cyrillic","latin-ext","latin","cyrillic-ext"]},{"family":"PT Sans Narrow","variants":["regular","700"],"subsets":["cyrillic","latin-ext","latin","cyrillic-ext"]},{"family":"PT Serif","variants":["regular","italic","700","700italic"],"subsets":["cyrillic","latin-ext","latin","cyrillic-ext"]},{"family":"PT Serif Caption","variants":["regular","italic"],"subsets":["cyrillic","latin-ext","latin","cyrillic-ext"]},{"family":"Pacifico","variants":["regular"],"subsets":["latin"]},{"family":"Palanquin","variants":["100","200","300","regular","500","600","700"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Palanquin Dark","variants":["regular","500","600","700"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Paprika","variants":["regular"],"subsets":["latin"]},{"family":"Parisienne","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Passero One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Passion One","variants":["regular","700","900"],"subsets":["latin-ext","latin"]},{"family":"Pathway Gothic One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Patrick Hand","variants":["regular"],"subsets":["vietnamese","latin-ext","latin"]},{"family":"Patrick Hand SC","variants":["regular"],"subsets":["vietnamese","latin-ext","latin"]},{"family":"Pattaya","variants":["regular"],"subsets":["vietnamese","thai","cyrillic","latin-ext","latin"]},{"family":"Patua One","variants":["regular"],"subsets":["latin"]},{"family":"Pavanam","variants":["regular"],"subsets":["latin-ext","latin","tamil"]},{"family":"Paytone One","variants":["regular"],"subsets":["latin"]},{"family":"Peddana","variants":["regular"],"subsets":["latin","telugu"]},{"family":"Peralta","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Permanent Marker","variants":["regular"],"subsets":["latin"]},{"family":"Petit Formal Script","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Petrona","variants":["regular"],"subsets":["latin"]},{"family":"Philosopher","variants":["regular","italic","700","700italic"],"subsets":["cyrillic","latin"]},{"family":"Piedra","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Pinyon Script","variants":["regular"],"subsets":["latin"]},{"family":"Pirata One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Plaster","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Play","variants":["regular","700"],"subsets":["greek","cyrillic","latin-ext","latin","cyrillic-ext"]},{"family":"Playball","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Playfair Display","variants":["regular","italic","700","700italic","900","900italic"],"subsets":["cyrillic","latin-ext","latin"]},{"family":"Playfair Display SC","variants":["regular","italic","700","700italic","900","900italic"],"subsets":["cyrillic","latin-ext","latin"]},{"family":"Podkova","variants":["regular","700"],"subsets":["latin"]},{"family":"Poiret One","variants":["regular"],"subsets":["cyrillic","latin-ext","latin"]},{"family":"Poller One","variants":["regular"],"subsets":["latin"]},{"family":"Poly","variants":["regular","italic"],"subsets":["latin"]},{"family":"Pompiere","variants":["regular"],"subsets":["latin"]},{"family":"Pontano Sans","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Poppins","variants":["300","regular","500","600","700"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Port Lligat Sans","variants":["regular"],"subsets":["latin"]},{"family":"Port Lligat Slab","variants":["regular"],"subsets":["latin"]},{"family":"Pragati Narrow","variants":["regular","700"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Prata","variants":["regular"],"subsets":["latin"]},{"family":"Preahvihear","variants":["regular"],"subsets":["khmer"]},{"family":"Press Start 2P","variants":["regular"],"subsets":["greek","cyrillic","latin-ext","latin"]},{"family":"Pridi","variants":["200","300","regular","500","600","700"],"subsets":["vietnamese","thai","latin-ext","latin"]},{"family":"Princess Sofia","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Prociono","variants":["regular"],"subsets":["latin"]},{"family":"Prompt","variants":["100","100italic","200","200italic","300","300italic","regular","italic","500","500italic","600","600italic","700","700italic","800","800italic","900","900italic"],"subsets":["vietnamese","thai","latin-ext","latin"]},{"family":"Prosto One","variants":["regular"],"subsets":["cyrillic","latin-ext","latin"]},{"family":"Proza Libre","variants":["regular","italic","500","500italic","600","600italic","700","700italic","800","800italic"],"subsets":["latin-ext","latin"]},{"family":"Puritan","variants":["regular","italic","700","700italic"],"subsets":["latin"]},{"family":"Purple Purse","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Quando","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Quantico","variants":["regular","italic","700","700italic"],"subsets":["latin"]},{"family":"Quattrocento","variants":["regular","700"],"subsets":["latin-ext","latin"]},{"family":"Quattrocento Sans","variants":["regular","italic","700","700italic"],"subsets":["latin-ext","latin"]},{"family":"Questrial","variants":["regular"],"subsets":["latin"]},{"family":"Quicksand","variants":["300","regular","700"],"subsets":["latin"]},{"family":"Quintessential","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Qwigley","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Racing Sans One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Radley","variants":["regular","italic"],"subsets":["latin-ext","latin"]},{"family":"Rajdhani","variants":["300","regular","500","600","700"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Rakkas","variants":["regular"],"subsets":["latin-ext","latin","arabic"]},{"family":"Raleway","variants":["100","100italic","200","200italic","300","300italic","regular","italic","500","500italic","600","600italic","700","700italic","800","800italic","900","900italic"],"subsets":["latin-ext","latin"]},{"family":"Raleway Dots","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Ramabhadra","variants":["regular"],"subsets":["latin","telugu"]},{"family":"Ramaraja","variants":["regular"],"subsets":["latin","telugu"]},{"family":"Rambla","variants":["regular","italic","700","700italic"],"subsets":["latin-ext","latin"]},{"family":"Rammetto One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Ranchers","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Rancho","variants":["regular"],"subsets":["latin"]},{"family":"Ranga","variants":["regular","700"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Rasa","variants":["300","regular","500","600","700"],"subsets":["gujarati","latin-ext","latin"]},{"family":"Rationale","variants":["regular"],"subsets":["latin"]},{"family":"Ravi Prakash","variants":["regular"],"subsets":["latin","telugu"]},{"family":"Redressed","variants":["regular"],"subsets":["latin"]},{"family":"Reem Kufi","variants":["regular"],"subsets":["latin","arabic"]},{"family":"Reenie Beanie","variants":["regular"],"subsets":["latin"]},{"family":"Revalia","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Rhodium Libre","variants":["regular"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Ribeye","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Ribeye Marrow","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Righteous","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Risque","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Roboto","variants":["100","100italic","300","300italic","regular","italic","500","500italic","700","700italic","900","900italic"],"subsets":["vietnamese","greek","cyrillic","latin-ext","latin","cyrillic-ext","greek-ext"]},{"family":"Roboto Condensed","variants":["300","300italic","regular","italic","700","700italic"],"subsets":["vietnamese","greek","cyrillic","latin-ext","latin","cyrillic-ext","greek-ext"]},{"family":"Roboto Mono","variants":["100","100italic","300","300italic","regular","italic","500","500italic","700","700italic"],"subsets":["vietnamese","greek","cyrillic","latin-ext","latin","cyrillic-ext","greek-ext"]},{"family":"Roboto Slab","variants":["100","300","regular","700"],"subsets":["vietnamese","greek","cyrillic","latin-ext","latin","cyrillic-ext","greek-ext"]},{"family":"Rochester","variants":["regular"],"subsets":["latin"]},{"family":"Rock Salt","variants":["regular"],"subsets":["latin"]},{"family":"Rokkitt","variants":["regular","700"],"subsets":["latin"]},{"family":"Romanesco","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Ropa Sans","variants":["regular","italic"],"subsets":["latin-ext","latin"]},{"family":"Rosario","variants":["regular","italic","700","700italic"],"subsets":["latin"]},{"family":"Rosarivo","variants":["regular","italic"],"subsets":["latin-ext","latin"]},{"family":"Rouge Script","variants":["regular"],"subsets":["latin"]},{"family":"Rozha One","variants":["regular"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Rubik","variants":["300","300italic","regular","italic","500","500italic","700","700italic","900","900italic"],"subsets":["hebrew","cyrillic","latin-ext","latin"]},{"family":"Rubik Mono One","variants":["regular"],"subsets":["cyrillic","latin-ext","latin"]},{"family":"Rubik One","variants":["regular"],"subsets":["cyrillic","latin-ext","latin"]},{"family":"Ruda","variants":["regular","700","900"],"subsets":["latin-ext","latin"]},{"family":"Rufina","variants":["regular","700"],"subsets":["latin-ext","latin"]},{"family":"Ruge Boogie","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Ruluko","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Rum Raisin","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Ruslan Display","variants":["regular"],"subsets":["cyrillic","latin-ext","latin"]},{"family":"Russo One","variants":["regular"],"subsets":["cyrillic","latin-ext","latin"]},{"family":"Ruthie","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Rye","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Sacramento","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Sahitya","variants":["regular","700"],"subsets":["devanagari","latin"]},{"family":"Sail","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Salsa","variants":["regular"],"subsets":["latin"]},{"family":"Sanchez","variants":["regular","italic"],"subsets":["latin-ext","latin"]},{"family":"Sancreek","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Sansita One","variants":["regular"],"subsets":["latin"]},{"family":"Sarala","variants":["regular","700"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Sarina","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Sarpanch","variants":["regular","500","600","700","800","900"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Satisfy","variants":["regular"],"subsets":["latin"]},{"family":"Scada","variants":["regular","italic","700","700italic"],"subsets":["cyrillic","latin-ext","latin"]},{"family":"Scheherazade","variants":["regular","700"],"subsets":["latin","arabic"]},{"family":"Schoolbell","variants":["regular"],"subsets":["latin"]},{"family":"Scope One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Seaweed Script","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Secular One","variants":["regular"],"subsets":["hebrew","latin-ext","latin"]},{"family":"Sevillana","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Seymour One","variants":["regular"],"subsets":["cyrillic","latin-ext","latin"]},{"family":"Shadows Into Light","variants":["regular"],"subsets":["latin"]},{"family":"Shadows Into Light Two","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Shanti","variants":["regular"],"subsets":["latin"]},{"family":"Share","variants":["regular","italic","700","700italic"],"subsets":["latin-ext","latin"]},{"family":"Share Tech","variants":["regular"],"subsets":["latin"]},{"family":"Share Tech Mono","variants":["regular"],"subsets":["latin"]},{"family":"Shojumaru","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Short Stack","variants":["regular"],"subsets":["latin"]},{"family":"Shrikhand","variants":["regular"],"subsets":["gujarati","latin-ext","latin"]},{"family":"Siemreap","variants":["regular"],"subsets":["khmer"]},{"family":"Sigmar One","variants":["regular"],"subsets":["latin"]},{"family":"Signika","variants":["300","regular","600","700"],"subsets":["latin-ext","latin"]},{"family":"Signika Negative","variants":["300","regular","600","700"],"subsets":["latin-ext","latin"]},{"family":"Simonetta","variants":["regular","italic","900","900italic"],"subsets":["latin-ext","latin"]},{"family":"Sintony","variants":["regular","700"],"subsets":["latin-ext","latin"]},{"family":"Sirin Stencil","variants":["regular"],"subsets":["latin"]},{"family":"Six Caps","variants":["regular"],"subsets":["latin"]},{"family":"Skranji","variants":["regular","700"],"subsets":["latin-ext","latin"]},{"family":"Slabo 13px","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Slabo 27px","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Slackey","variants":["regular"],"subsets":["latin"]},{"family":"Smokum","variants":["regular"],"subsets":["latin"]},{"family":"Smythe","variants":["regular"],"subsets":["latin"]},{"family":"Sniglet","variants":["regular","800"],"subsets":["latin-ext","latin"]},{"family":"Snippet","variants":["regular"],"subsets":["latin"]},{"family":"Snowburst One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Sofadi One","variants":["regular"],"subsets":["latin"]},{"family":"Sofia","variants":["regular"],"subsets":["latin"]},{"family":"Sonsie One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Sorts Mill Goudy","variants":["regular","italic"],"subsets":["latin-ext","latin"]},{"family":"Source Code Pro","variants":["200","300","regular","500","600","700","900"],"subsets":["latin-ext","latin"]},{"family":"Source Sans Pro","variants":["200","200italic","300","300italic","regular","italic","600","600italic","700","700italic","900","900italic"],"subsets":["vietnamese","latin-ext","latin"]},{"family":"Source Serif Pro","variants":["regular","600","700"],"subsets":["latin-ext","latin"]},{"family":"Space Mono","variants":["regular","italic","700","700italic"],"subsets":["vietnamese","latin-ext","latin"]},{"family":"Special Elite","variants":["regular"],"subsets":["latin"]},{"family":"Spicy Rice","variants":["regular"],"subsets":["latin"]},{"family":"Spinnaker","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Spirax","variants":["regular"],"subsets":["latin"]},{"family":"Squada One","variants":["regular"],"subsets":["latin"]},{"family":"Sree Krushnadevaraya","variants":["regular"],"subsets":["latin","telugu"]},{"family":"Sriracha","variants":["regular"],"subsets":["vietnamese","thai","latin-ext","latin"]},{"family":"Stalemate","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Stalinist One","variants":["regular"],"subsets":["cyrillic","latin-ext","latin"]},{"family":"Stardos Stencil","variants":["regular","700"],"subsets":["latin"]},{"family":"Stint Ultra Condensed","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Stint Ultra Expanded","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Stoke","variants":["300","regular"],"subsets":["latin-ext","latin"]},{"family":"Strait","variants":["regular"],"subsets":["latin"]},{"family":"Sue Ellen Francisco","variants":["regular"],"subsets":["latin"]},{"family":"Suez One","variants":["regular"],"subsets":["hebrew","latin-ext","latin"]},{"family":"Sumana","variants":["regular","700"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Sunshiney","variants":["regular"],"subsets":["latin"]},{"family":"Supermercado One","variants":["regular"],"subsets":["latin"]},{"family":"Sura","variants":["regular","700"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Suranna","variants":["regular"],"subsets":["latin","telugu"]},{"family":"Suravaram","variants":["regular"],"subsets":["latin","telugu"]},{"family":"Suwannaphum","variants":["regular"],"subsets":["khmer"]},{"family":"Swanky and Moo Moo","variants":["regular"],"subsets":["latin"]},{"family":"Syncopate","variants":["regular","700"],"subsets":["latin"]},{"family":"Tangerine","variants":["regular","700"],"subsets":["latin"]},{"family":"Taprom","variants":["regular"],"subsets":["khmer"]},{"family":"Tauri","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Taviraj","variants":["100","100italic","200","200italic","300","300italic","regular","italic","500","500italic","600","600italic","700","700italic","800","800italic","900","900italic"],"subsets":["vietnamese","thai","latin-ext","latin"]},{"family":"Teko","variants":["300","regular","500","600","700"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Telex","variants":["regular"],"subsets":["latin"]},{"family":"Tenali Ramakrishna","variants":["regular"],"subsets":["latin","telugu"]},{"family":"Tenor Sans","variants":["regular"],"subsets":["cyrillic","latin-ext","latin"]},{"family":"Text Me One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"The Girl Next Door","variants":["regular"],"subsets":["latin"]},{"family":"Tienne","variants":["regular","700","900"],"subsets":["latin"]},{"family":"Tillana","variants":["regular","500","600","700","800"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Timmana","variants":["regular"],"subsets":["latin","telugu"]},{"family":"Tinos","variants":["regular","italic","700","700italic"],"subsets":["hebrew","vietnamese","greek","cyrillic","latin-ext","latin","cyrillic-ext","greek-ext"]},{"family":"Titan One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Titillium Web","variants":["200","200italic","300","300italic","regular","italic","600","600italic","700","700italic","900"],"subsets":["latin-ext","latin"]},{"family":"Trade Winds","variants":["regular"],"subsets":["latin"]},{"family":"Trirong","variants":["100","100italic","200","200italic","300","300italic","regular","italic","500","500italic","600","600italic","700","700italic","800","800italic","900","900italic"],"subsets":["vietnamese","thai","latin-ext","latin"]},{"family":"Trocchi","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Trochut","variants":["regular","italic","700"],"subsets":["latin"]},{"family":"Trykker","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Tulpen One","variants":["regular"],"subsets":["latin"]},{"family":"Ubuntu","variants":["300","300italic","regular","italic","500","500italic","700","700italic"],"subsets":["greek","cyrillic","latin-ext","latin","cyrillic-ext","greek-ext"]},{"family":"Ubuntu Condensed","variants":["regular"],"subsets":["greek","cyrillic","latin-ext","latin","cyrillic-ext","greek-ext"]},{"family":"Ubuntu Mono","variants":["regular","italic","700","700italic"],"subsets":["greek","cyrillic","latin-ext","latin","cyrillic-ext","greek-ext"]},{"family":"Ultra","variants":["regular"],"subsets":["latin"]},{"family":"Uncial Antiqua","variants":["regular"],"subsets":["latin"]},{"family":"Underdog","variants":["regular"],"subsets":["cyrillic","latin-ext","latin"]},{"family":"Unica One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"UnifrakturCook","variants":["700"],"subsets":["latin"]},{"family":"UnifrakturMaguntia","variants":["regular"],"subsets":["latin"]},{"family":"Unkempt","variants":["regular","700"],"subsets":["latin"]},{"family":"Unlock","variants":["regular"],"subsets":["latin"]},{"family":"Unna","variants":["regular"],"subsets":["latin"]},{"family":"VT323","variants":["regular"],"subsets":["latin"]},{"family":"Vampiro One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Varela","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Varela Round","variants":["regular"],"subsets":["hebrew","latin"]},{"family":"Vast Shadow","variants":["regular"],"subsets":["latin"]},{"family":"Vesper Libre","variants":["regular","500","700","900"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Vibur","variants":["regular"],"subsets":["latin"]},{"family":"Vidaloka","variants":["regular"],"subsets":["latin"]},{"family":"Viga","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Voces","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Volkhov","variants":["regular","italic","700","700italic"],"subsets":["latin"]},{"family":"Vollkorn","variants":["regular","italic","700","700italic"],"subsets":["latin"]},{"family":"Voltaire","variants":["regular"],"subsets":["latin"]},{"family":"Waiting for the Sunrise","variants":["regular"],"subsets":["latin"]},{"family":"Wallpoet","variants":["regular"],"subsets":["latin"]},{"family":"Walter Turncoat","variants":["regular"],"subsets":["latin"]},{"family":"Warnes","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Wellfleet","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Wendy One","variants":["regular"],"subsets":["latin-ext","latin"]},{"family":"Wire One","variants":["regular"],"subsets":["latin"]},{"family":"Work Sans","variants":["100","200","300","regular","500","600","700","800","900"],"subsets":["latin-ext","latin"]},{"family":"Yanone Kaffeesatz","variants":["200","300","regular","700"],"subsets":["latin-ext","latin"]},{"family":"Yantramanav","variants":["100","300","regular","500","700","900"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Yatra One","variants":["regular"],"subsets":["devanagari","latin-ext","latin"]},{"family":"Yellowtail","variants":["regular"],"subsets":["latin"]},{"family":"Yeseva One","variants":["regular"],"subsets":["cyrillic","latin-ext","latin"]},{"family":"Yesteryear","variants":["regular"],"subsets":["latin"]},{"family":"Yrsa","variants":["300","regular","500","600","700"],"subsets":["latin-ext","latin"]},{"family":"Zeyada","variants":["regular"],"subsets":["latin"]}]}';

		$fonts = json_decode($fonts,true);

		//$googlefonts = wp_list_pluck( $fonts['items'], 'family' );
		$font_family_arr = $font_variants = $font_subsets = array();
		$font_name = '';
		foreach ($fonts['items'] as $font) {
			$font_family_arr[$font['family']] = $font['family'];
			$font_variants[$font['family']] = $font['variants'];
			//$font_subsets[$font['family']] = $font['subsets'];			
		}

		$GLOBALS['font_variants'] = $font_variants;
		//$GLOBALS['font_subsets'] = $font_subsets;		

		$defaults = array();   
	    $counter = 0;
		$menu = '';
		$output = '';
		$update_data = false;

		do_action('optionsframework_machine_before', array(
				'options'	=> $options,
				'smof_data'	=> $smof_data,
			));
		if ($smof_output != "") {
			$output .= $smof_output;
			$smof_output = "";
		}
		
		

		foreach ($options as $value) {
			
			// sanitize option
			if ($value['type'] != "heading")
				$value = self::sanitize_option($value);

			$counter++;
			$val = '';
			
			//create array of defaults		
			if ($value['type'] == 'multicheck'){
				if (is_array($value['std'])){
					foreach($value['std'] as $i=>$key){
						$defaults[$value['id']][$key] = true;
					}
				} else {
						$defaults[$value['id']][$value['std']] = true;
				}
			} else {
				if (isset($value['id'])) $defaults[$value['id']] = $value['std'];
			}
			
			/* condition start */
			if(!empty($smof_data) || !empty($smof_data)){
			
				if (array_key_exists('id', $value) && !isset($smof_data[$value['id']])) {
					$smof_data[$value['id']] = $value['std'];
					if ($value['type'] == "checkbox" && $value['std'] == 0) {
						$smof_data[$value['id']] = 0;
					} else {
						$update_data = true;
					}
				}
				if (array_key_exists('id', $value) && !isset($smof_details[$value['id']])) {
					$smof_details[$value['id']] = $smof_data[$value['id']];
				}

			//Start Heading
			 if ( $value['type'] != "heading" )
			 {
			 	$class = ''; if(isset( $value['class'] )) { $class = $value['class']; }

				$fold = '';
				if ( array_key_exists( "fold", $value) ) {

					foreach ( $value['fold'] as $fid => $f_val ) {

						$fold = "f_fold_true f_".$fid." ";
						$fold .= implode(" ", $f_val);
						$fold .= " ";
						
						if ( isset( $smof_data[$fid] ) && ! in_array( $smof_data[$fid], $f_val ) ) {
							$fold .= " temphide ";
						}
						
					}

				}
	
				$output .= '<div id="section-'.$value['id'].'" class="'.$fold.'section section-'.$value['type'].' '. $class .'">'."\n";
				
				//only show header if 'name' value exists
				$output .= '<div class="header-wrap">';
				if($value['name']) {
					$output .= '<h3 class="heading">'. $value['name'] .'</h3>'."\n";
				}
				if(!isset($value['desc'])){ $explain_value = ''; } else{ 
					$explain_value = '<div class="explain">'. $value['desc'] .'</div>'."\n"; 
				} 
				$output .= $explain_value."\n";
				$output .= '</div>';

				$output .= '<div class="option">'."\n";
				$output .= '<div class="controls">'."\n";
	
			 } 
			 //End Heading

			//if (!isset($smof_data[$value['id']]) && $value['type'] != "heading")
			//	continue;
			
			//switch statement to handle various options type                              
			switch ( $value['type'] ) {
			
				//text input
				case 'text':
					$t_value = '';
					$t_value = stripslashes($smof_data[$value['id']]);
					
					$mini ='';
					if(!isset($value['mod'])) $value['mod'] = '';
					if($value['mod'] == 'mini') { $mini = 'mini';}
					
					$output .= '<input class="of-input '.$mini.'" name="'.$value['id'].'" id="'. $value['id'] .'" type="'. $value['type'] .'" value="'. $t_value .'" />';
				break;
				
				//select option
				case 'select':
					$mini ='';
					if(!isset($value['mod'])) $value['mod'] = '';
					if($value['mod'] == 'mini') { $mini = 'mini';}
					$output .= '<div class="select_wrapper ' . $mini . '">';
					$output .= '<select class="select of-input" name="'.$value['id'].'" id="'. $value['id'] .'">';

					foreach ($value['options'] as $select_ID => $option) {
						$theValue = $option;
						if (!is_numeric($select_ID))
							$theValue = $select_ID;
						$output .= '<option id="' . $select_ID . '" value="'.$select_ID.'" ' . selected($smof_data[$value['id']], $select_ID, false) . ' />'.$option.'</option>';	 
					 } 
					$output .= '</select></div>';
				break;

				//select option
				case 'select_sidebar':
					global $wp_registered_sidebars;
					$mini ='';
					if(!isset($value['mod'])) $value['mod'] = '';
					if($value['mod'] == 'mini') { $mini = 'mini';}
					$output .= '<div class="select_wrapper ' . $mini . '">';
					$output .= '<select class="select of-input" name="'.$value['id'].'" id="'. $value['id'] .'">';

					$sidebars = $wp_registered_sidebars;
        			$hide_sidebars = (isset($value['hide']) && is_array($value['hide'])) ? $value['hide'] : array();

        			$output .= '<option id="0" value="0" ' . selected($smof_data[$value['id']], '0', false) . '>Default</option>';

					//foreach ($value['options'] as $select_ID => $option) {
					foreach ($sidebars as $sidebar) {
						$sidebar_name = $sidebar['name'];
						$sidebar_id = $sidebar['id'];

						if (!in_array($sidebar_id, $hide_sidebars)) {
							$output .= '<option id="' . $sidebar_id . '" value="'.$sidebar_id.'" ' . selected($smof_data[$value['id']], $sidebar_id, false) . ' />'.$sidebar_name.'</option>';
						}
						
					}
					$output .= '</select></div>';
				break;
				
				//textarea option
				case 'textarea':	
					$cols = '8';
					$ta_value = '';
					
					if(isset($value['options'])){
							$ta_options = $value['options'];
							if(isset($ta_options['cols'])){
							$cols = $ta_options['cols'];
							} 
						}
						
						$ta_value = stripslashes($smof_data[$value['id']]);			
						$output .= '<textarea class="of-input" name="'.$value['id'].'" id="'. $value['id'] .'" cols="'. $cols .'" rows="8">'.$ta_value.'</textarea>';		
				break;
				
				//radiobox option
				case "radio":
					$checked = (isset($smof_data[$value['id']])) ? checked($smof_data[$value['id']], $option, false) : '';
					 foreach($value['options'] as $option=>$name) {
						$output .= '<input class="of-input of-radio" name="'.$value['id'].'" type="radio" value="'.$option.'" ' . checked($smof_data[$value['id']], $option, false) . ' /><label class="radio">'.$name.'</label><br/>';				
					}
				break;
				
				//checkbox option
				case 'checkbox':
					if (!isset($smof_data[$value['id']])) {
						$smof_data[$value['id']] = 0;
					}
					
					$fold = '';
					if (array_key_exists("folds",$value)) $fold="fld ";
		
					$output .= '<input type="hidden" class="'.$fold.'checkbox of-input" name="'.$value['id'].'" id="'. $value['id'] .'" value="0"/>';
					$output .= '<input type="checkbox" class="'.$fold.'checkbox pix-check of-input" name="'.$value['id'].'" id="'. $value['id'] .'" value="1" '. checked($smof_data[$value['id']], 1, false) .' />';
				break;
				
				//multiple checkbox option
				case 'multicheck': 			
					(isset($smof_data[$value['id']]))? $multi_stored = $smof_data[$value['id']] : $multi_stored="";
								
					foreach ($value['options'] as $key => $option) {
						if (!isset($multi_stored[$key])) {$multi_stored[$key] = '';}
						$of_key_string = $value['id'] . '_' . $key;
						$output .= '<input type="checkbox" class="checkbox of-input" name="'.$value['id'].'['.$key.']'.'" id="'. $of_key_string .'" value="1" '. checked($multi_stored[$key], 1, false) .' /><label class="multicheck" for="'. $of_key_string .'">'. $option .'</label><br />';								
					}			 
				break;
				
				// Color picker
				case "color":
					$default_color = '';
					if ( isset($value['std']) ) {
						$default_color = ' data-default-color="' .$value['std'] . '" ';
					}
					$output .= '<input name="' . $value['id'] . '" id="' . $value['id'] . '" class="of-color"  type="text" value="' . $smof_data[$value['id']] . '"' . $default_color .' />';
		 	
				break;

				//typography option	
				case 'typography':
				
					$typography_stored = isset($smof_data[$value['id']]) ? $smof_data[$value['id']] : $value['std'];
					
					/* Font Size */
					
					if(isset($typography_stored['size'])) {
						$output .= '<div class="select_wrapper typography-size" original-title="Font size">';
						$output .= '<select class="of-typography of-typography-size select" name="'.$value['id'].'[size]" id="'. $value['id'].'_size">';
							for ($i = 9; $i < 50; $i++){ 
								$test = $i.'px';
								$output .= '<option value="'. $i .'px" ' . selected($typography_stored['size'], $test, false) . '>'. $i .'px</option>'; 
								}
				
						$output .= '</select></div>';
					
					}
					
					/* Line Height */
					if(isset($typography_stored['height'])) {
					
						$output .= '<div class="select_wrapper typography-height" original-title="Line height">';
						$output .= '<select class="of-typography of-typography-height select" name="'.$value['id'].'[height]" id="'. $value['id'].'_height">';
							for ($i = 20; $i < 38; $i++){ 
								$test = $i.'px';
								$output .= '<option value="'. $i .'px" ' . selected($typography_stored['height'], $test, false) . '>'. $i .'px</option>'; 
								}
				
						$output .= '</select></div>';
					
					}
						
					/* Font Face */
					if(isset($typography_stored['face'])) {
					
						$output .= '<div class="select_wrapper typography-face" original-title="Font family">';
						$output .= '<select class="of-typography of-typography-face select" name="'.$value['id'].'[face]" id="'. $value['id'].'_face">';
						
						$faces = array('Arial, sans-serif'=>'Arial',
										'Verdana, Geneva, sans-serif'=>'Verdana, Geneva',
										'"Trebuchet MS", sans-serif'=>'Trebuchet',
										'Georgia, serif' =>'Georgia',
										'"Times New Roman", serif'=>'Times New Roman',
										'Tahoma, sans-serif'=>'Tahoma, Geneva',
										'Palatino, sans-serif'=>'Palatino',
										'Helvetica, sans-serif'=>'Helvetica' );			
						foreach ($faces as $i=>$face) {
							$output .= '<option value="'. $i .'" ' . selected($typography_stored['face'], $i, false) . '>'. $face .'</option>';
						}			
										
						$output .= '</select></div>';
					
					}
					
					/* Font Weight */
					if(isset($typography_stored['style'])) {
					
						$output .= '<div class="select_wrapper typography-style" original-title="Font style">';
						$output .= '<select class="of-typography of-typography-style select" name="'.$value['id'].'[style]" id="'. $value['id'].'_style">';
						$styles = array('normal'=>'Normal',
										'italic'=>'Italic',
										'bold'=>'Bold',
										'bold italic'=>'Bold Italic');
										
						foreach ($styles as $i=>$style){
						
							$output .= '<option value="'. $i .'" ' . selected($typography_stored['style'], $i, false) . '>'. $style .'</option>';		
						}
						$output .= '</select></div>';
					
					}
					
					/* Font Color */
					if(isset($typography_stored['color'])) {
					
						$output .= '<div id="' . $value['id'] . '_color_picker" class="colorSelector typography-color"><div style="background-color: '.$typography_stored['color'].'"></div></div>';
						$output .= '<input class="of-color of-typography of-typography-color" original-title="Font color" name="'.$value['id'].'[color]" id="'. $value['id'] .'_color" type="text" value="'. $typography_stored['color'] .'" />';
					
					}
					
				break;
				
				//border option
				case 'border':
						
					/* Border Width */
					$border_stored = $smof_data[$value['id']];
					
					$output .= '<div class="select_wrapper border-width">';
					$output .= '<select class="of-border of-border-width select" name="'.$value['id'].'[width]" id="'. $value['id'].'_width">';
						for ($i = 0; $i < 21; $i++){ 
						$output .= '<option value="'. $i .'" ' . selected($border_stored['width'], $i, false) . '>'. $i .'</option>';				 }
					$output .= '</select></div>';
					
					/* Border Style */
					$output .= '<div class="select_wrapper border-style">';
					$output .= '<select class="of-border of-border-style select" name="'.$value['id'].'[style]" id="'. $value['id'].'_style">';
					
					$styles = array('none'=>'None',
									'solid'=>'Solid',
									'dashed'=>'Dashed',
									'dotted'=>'Dotted');
									
					foreach ($styles as $i=>$style){
						$output .= '<option value="'. $i .'" ' . selected($border_stored['style'], $i, false) . '>'. $style .'</option>';		
					}
					
					$output .= '</select></div>';
					
					/* Border Color */		
					$output .= '<div id="' . $value['id'] . '_color_picker" class="colorSelector"><div style="background-color: '.$border_stored['color'].'"></div></div>';
					$output .= '<input class="of-color of-border of-border-color" name="'.$value['id'].'[color]" id="'. $value['id'] .'_color" type="text" value="'. $border_stored['color'] .'" />';
					
				break;
				
				//images checkbox - use image as checkboxes
				case 'images':
				
					$i = 0;

					$val_size = isset($value['size']) ? $value['size'] : '';
					$select_value = (isset($smof_data[$value['id']])) ? $smof_data[$value['id']] : '';
					
					if($val_size != ''){						
						$type_class = '';
					}else{
						$type_class = ' class="pull-left"';
					}
					
					foreach ($value['options'] as $key => $option) 
					{ 
					$i++;
			
						$checked = '';
						$selected = '';
						$img_selected = '';
						if(NULL!=checked($select_value, $key, false)) {
							$checked = checked($select_value, $key, false);
							$selected = 'of-radio-img-selected'; 
							$img_selected = 'pix-of-radio-img-selected';
						}
						$output .= '<span'.$type_class.'>';
						$output .= '<input type="radio" id="of-radio-img-' . $value['id'] . $i . '" class="checkbox of-radio-img-radio" value="'.$key.'" name="'.$value['id'].'" '.$checked.' />';
						$output .= '<div class="of-radio-img-label">'. $key .'</div>';
						$output .= '<div class="select-image-wrap '. $img_selected .'"><img src="'.$option.'" alt="" class="of-radio-img-img '. $selected .'" onClick="document.getElementById(\'of-radio-img-'. $value['id'] . $i.'\').checked = true;" /></div>';
						$output .= '</span>';				
					}
					
				break;


				//images checkbox - use color selector as checkboxes
				case 'colorchooser':
				
					$i = 0;
					
					$select_value = (isset($smof_data[$value['id']])) ? $smof_data[$value['id']] : '';
					
					foreach ($value['options'] as $key => $option) 
					{ 
					$i++;
				
						$checked = '';
						$selected = '';
						$img_selected = '';
						if(NULL!=checked($select_value, $key, false)) {
							$checked = checked($select_value, $key, false);
							$selected = 'of-radio-img-selected'; 
							$img_selected = 'pix-of-radio-img-selected';
						}
						$output .= '<span class="pull-left">';
						$output .= '<input type="radio" id="of-radio-img-' . $value['id'] . $i . '" class="checkbox of-radio-img-radio" value="'.$key.'" name="'.$value['id'].'" '.$checked.' />';
						$output .= '<div class="of-radio-img-label">'. $key .'</div>';
						$output .= '<div class="select-image-wrap select-color '. $img_selected .'"><span class="of-radio-img-img '. $selected .'" onClick="document.getElementById(\'of-radio-img-'. $value['id'] . $i.'\').checked = true;"><span style="background: '. $option.'"></span></span></div>';
						$output .= '</span>';				
					}
					
				break;
				
				//info (for small intro box etc)
				case "info":
					$info_text = $value['std'];
					$output .= '<div class="of-info">'.$info_text.'</div>';
				break;

				case "demodata":
					$demos = $value['demos'];
					$pix_import_nonce = wp_create_nonce("pix_import_nonce");
					$import_link = admin_url('admin-ajax.php?action=pix_import_demo&nonce='.$pix_import_nonce);

					foreach ( $demos as $key => $demo ) {
						$title = str_replace( '.xml', '', $key );
						$title = str_replace( '-', ' ', $title );

						$output .= '<h3 class="demodata-heading">'. $title .'</h3>';
						$output .= '<img src="'.$demo.'">';

						$output .= '<div class="pix-demo-button">
									    <a href="'. esc_url($import_link) .'" data-nonce="'. $pix_import_nonce .'" data-file="'. $key .'" class="demo_import pix-import-btn"><i class="icon-cloud-download"></i><span>INSTALL DEMO</span></a>
									    
									</div><span class="spinner hidden"></span>
								  <p class="import-messages">
								  	<span class="info msg"><i class="icon-pix-fonts"></i>'.  esc_html__("Please wait, Don't reload this page. It will take some time to complete depends on your internet connection! Once done, You will be notified.", "composer") .'</span>
									<span class="success msg"><i class="icon-check-mark"></i>'.  esc_html__("Demo Data Successfully imported!", "composer") .'</span>
									<span class="import-error"><i class="icon-remove"></i>'.  esc_html__("Data not Imported, Please reload the page and try again. <br><br> <strong>Note:</strong>If you continously receive error message then please try to set file permission to cmod 777 (for both demo and demo.xml in \"demo_data/demo.xml\"). If it still doesn't work, please upload demo xml using wordpress importer. Demo xml file should be available in theme package", "composer") .'</span>
								  </p>';
					}

				break;
				
				//display a single image
				case "image":
					$src = $value['std'];
					$output .= '<img src="'.$src.'">';
				break;
				
				//tab heading
				case 'heading':
					if($counter >= 2){
					   $output .= '</div>'."\n";
					}
					//custom icon
					$icon = '';
					if(isset($value['icon'])){
						$icon = ' style="background-image: url('. $value['icon'] .');"';
					}
					
					//custom class
					$custom_class = '';
					if(isset($value['custom_class'])){
						$custom_class = $value['custom_class'];
					}
					$header_class = str_replace(' ','',strtolower($value['name']));
					$jquery_click_hook = str_replace(' ', '', strtolower($value['name']) );
					$jquery_click_hook = "of-option-" . trim(preg_replace('/ +/', '', preg_replace('/[^A-Za-z0-9 ]/', '', urldecode(html_entity_decode(strip_tags($jquery_click_hook))))));
					
					$menu .= '<li class="'.$custom_class .' '. $header_class .'"><a title="'.  $value['name'] .'" href="#'.  $jquery_click_hook  .'"'. $icon .'>'.  $value['name'] .'</a></li>';
					$output .= '<div class="group" id="'. $jquery_click_hook  .'"><div class="switch-con '. $header_class .'"><h2 class="switch">'.$value['name'].'</h2></div>'."\n";
				break;
				
				//drag & drop slide manager
				case 'slider':
					$output .= '<div class="slider"><ul id="'.$value['id'].'">';
					$slides = $smof_data[$value['id']];
					$count = count($slides);
					if ($count < 2) {
						$oldorder = 1;
						$order = 1;
						$output .= Composer_Options_Machine::optionsframework_slider_function($value['id'],$value['std'],$oldorder,$order);
					} else {
						$i = 0;
						foreach ($slides as $slide) {
							$oldorder = $slide['order'];
							$i++;
							$order = $i;
							$output .= Composer_Options_Machine::optionsframework_slider_function($value['id'],$value['std'],$oldorder,$order);
						}
					}			
					$output .= '</ul>';
					$output .= '<a href="#" class="button slide_add_button">Add New Slide</a></div>';
					
				break;

				//drag & drop slide manager
				case 'custom_fonts':
					$output .= '<div class="slider"><ul id="'.$value['id'].'">';
					$fonts = $smof_data[$value['id']];
					$count = count($fonts);

					if ( $fonts ) {
						$i = 0;
						foreach ($fonts as $font) {
							$oldorder = $font['order'];
							$i++;
							$order = $i;
							$output .= Composer_Options_Machine::optionsframework_fonts_function($value['id'],$value['std'],$oldorder,$order);
						}
					}			
					$output .= '</ul>';
					$output .= '<a href="#" class="button font_add_button">Add New Font</a></div>';
					
				break;
				
				//drag & drop block manager
				case 'sorter':

				    // Make sure to get list of all the default blocks first
				    $all_blocks = $value['std'];

				    $temp = array(); // holds default blocks
				    $temp2 = array(); // holds saved blocks

					foreach($all_blocks as $blocks) {
					    $temp = array_merge($temp, $blocks);
					}

				    $sortlists = isset($smof_data[$value['id']]) && !empty($smof_data[$value['id']]) ? $smof_data[$value['id']] : $value['std'];

				    foreach( $sortlists as $sortlist ) {
					$temp2 = array_merge($temp2, $sortlist);
				    }

				    // now let's compare if we have anything missing
				    foreach($temp as $k => $v) {
					if(!array_key_exists($k, $temp2)) {
					    $sortlists['disabled'][$k] = $v;
					}
				    }

				    // now check if saved blocks has blocks not registered under default blocks
				    foreach( $sortlists as $key => $sortlist ) {
					foreach($sortlist as $k => $v) {
					    if(!array_key_exists($k, $temp)) {
						unset($sortlist[$k]);
					    }
					}
					$sortlists[$key] = $sortlist;
				    }

				    // assuming all sync'ed, now get the correct naming for each block
				    foreach( $sortlists as $key => $sortlist ) {
					foreach($sortlist as $k => $v) {
					    $sortlist[$k] = $temp[$k];
					}
					$sortlists[$key] = $sortlist;
				    }

				    $output .= '<div id="'.$value['id'].'" class="sorter">';


				    if ($sortlists) {

					foreach ($sortlists as $group=>$sortlist) {

					    $output .= '<ul id="'.$value['id'].'_'.$group.'" class="sortlist_'.$value['id'].'">';
					    $output .= '<h3>'.$group.'</h3>';

					    foreach ($sortlist as $key => $list) {

						$output .= '<input class="sorter-placebo" type="hidden" name="'.$value['id'].'['.$group.'][placebo]" value="placebo">';

						if ($key != "placebo") {

						    $output .= '<li id="'.$key.'" class="sortee">';
						    $output .= '<input class="position" type="hidden" name="'.$value['id'].'['.$group.']['.$key.']" value="'.$list.'">';
						    $output .= $list;
						    $output .= '</li>';

						}

					    }

					    $output .= '</ul>';
					}
				    }

				    $output .= '</div>';
				break;
				
				//background images option
				case 'tiles':
					
					$i = 0;
					$select_value = isset($smof_data[$value['id']]) && !empty($smof_data[$value['id']]) ? $smof_data[$value['id']] : '';
					if (is_array($value['options'])) {
						foreach ($value['options'] as $key => $option) { 
						$i++;
				
							$checked = '';
							$selected = '';
							if(NULL!=checked($select_value, $option, false)) {
								$checked = checked($select_value, $option, false);
								$selected = 'of-radio-tile-selected';  
							}
							$output .= '<span>';
							$output .= '<input type="radio" id="of-radio-tile-' . $value['id'] . $i . '" class="checkbox of-radio-tile-radio" value="'.$option.'" name="'.$value['id'].'" '.$checked.' />';
							$output .= '<div class="of-radio-tile-img '. $selected .'" style="background: url('.$option.')" onClick="document.getElementById(\'of-radio-tile-'. $value['id'] . $i.'\').checked = true;"></div>';
							$output .= '</span>';				
						}
					}
					
				break;
				
				//backup and restore options data
				case 'backup':
				
					$instructions = $value['desc'];
					$backup = of_get_options(BACKUPS);
					$init = of_get_options('smof_init');


					if(!isset($backup['backup_log'])) {
						$log = 'No backups yet';
					} else {
						$log = $backup['backup_log'];
					}
					
					$output .= '<div class="backup-box">';
					$output .= '<div class="instructions">'.$instructions."\n";
					$output .= '<p><strong>'. esc_html__('Last Backup : ', 'composer' ).'<span class="backup-log">'.$log.'</span></strong></p></div>'."\n";
					$output .= '<a href="#" id="of_backup_button" class="button" title="Backup Options">Backup Options</a>';
					$output .= '<a href="#" id="of_restore_button" class="button" title="Restore Options">Restore Options</a>';
					$output .= '</div>';
				
				break;
				
				//export or import data between different installs
				case 'transfer':
				
					$instructions = $value['desc'];
					$output .= '<textarea id="export_data" rows="8">'.json_encode($smof_data) /* 100% safe - ignore theme check nag */ .'</textarea>'."\n";
					$output .= '<a href="#" id="of_import_button" class="button" title="Restore Options">Import Options</a>';
				
				break;
				
				// google font field
				case 'select_google_font':

					$g_typography_stored = isset($smof_data[$value['id']]) ? $smof_data[$value['id']] : $value['std'];
					
					$g_typography_stored['g_face'] = isset($g_typography_stored['g_face']) ? $g_typography_stored['g_face'] : 'Lato';
					
					/* google Font Face */
					if(isset($g_typography_stored['g_face'])) {
						$output .= '<div class="select_wrapper typography-face" original-title="Google webfonts">';
						$output .= '<select class="select of-input google_font_select" name="'.$value['id'].'[g_face]" id="'. $value['id'] .'">';

						if( $custom_fonts ) {
							$output .= '<optgroup class="user-fonts" label="'. __('My Fonts', 'composer') .'">';
								foreach ($custom_fonts as $select_key => $font) {
									if( $font['font_title'] && ( $font['woff'] || $font['ttf'] || $font['eot'] || $font['svg'] ) ) {
										$output .= '<option value="'.$font['font_title'].'" ' . selected($g_typography_stored['g_face'], $font['font_title'], false) . ' />'.$font['font_title'].'</option>';
									}
								}
							$output .= '</optgroup>';
							$output .= '<optgroup class="google-webfonts" label="'. __('Google Web Fonts', 'composer') .'">';
						}

							foreach ($font_family_arr as $select_key => $option) {
								$output .= '<option value="'.$select_key.'" ' . selected($g_typography_stored['g_face'], $option, false) . ' />'.$option.'</option>';
							}

						if( $custom_fonts ) {
							$output .= '</optgroup>';
						}
						$output .= '</select></div>';
					}

					/* Font Size */
					
					if(isset($g_typography_stored['size'])) {
						$output .= '<div class="select_wrapper typography-size" original-title="Font size">';
						$output .= '<select class="of-typography of-typography-size select" name="'.$value['id'].'[size]" id="'. $value['id'].'_size">';
							for ($i = 9; $i < 101; $i++){ 
								$test = $i.'px';
								$output .= '<option value="'. $i .'px" ' . selected($g_typography_stored['size'], $test, false) . '>'. $i .'px</option>'; 
								}
				
						$output .= '</select></div>';
					
					}
					
					/* Font Weight */
					if(isset($g_typography_stored['style'])) {
					
						$output .= '<div class="select_wrapper typography-style" original-title="Font style">';
						$output .= '<select class="of-typography of-typography-style select" name="'.$value['id'].'[style]" id="'. $value['id'].'_style">';
						$styles = isset( $font_variants[$g_typography_stored['g_face']] ) ? $font_variants[$g_typography_stored['g_face']] : array('regular');
										
						foreach ($styles as $style){
						
							$output .= '<option value="'. $style .'" ' . selected($g_typography_stored['style'], $style, false) . '>'. ucwords($style) .'</option>';		
						}
						$output .= '</select></div>';
					}					

					/* Font Face */
					if(isset($g_typography_stored['face'])) {
						$output .= '<div class="select_wrapper typography-face" original-title="Fallback Font family">';
						$output .= '<select class="of-typography of-typography-face select" name="'.$value['id'].'[face]" id="'. $value['id'].'_face">';
						
						$faces = array('Arial, sans-serif'=>'Arial',
										'Verdana, Geneva, sans-serif'=>'Verdana, Geneva',
										'"Trebuchet MS", sans-serif'=>'Trebuchet',
										'Georgia, serif' =>'Georgia',
										'"Times New Roman", serif'=>'Times New Roman',
										'Tahoma, sans-serif'=>'Tahoma, Geneva',
										'Palatino, sans-serif'=>'Palatino',
										'Helvetica, sans-serif'=>'Helvetica' );
						foreach ($faces as $i=>$face) {
							$output .= '<option value="'. $i .'" ' . selected($g_typography_stored['face'], $i, false) . '>'. $face .'</option>';
						}			
										
						$output .= '</select></div>';
					
					}
					
					if(isset($value['preview']['text'])){
						$g_text = $value['preview']['text'];
					} else {
						$g_text = '0123456789 ABCDEFGHIJKLMNOPQRSTUVWXYZ abcdefghijklmnopqrstuvwxyz';
					}
					if(isset($value['preview']['size'])) {
						$g_size = 'style="font-size: '. $value['preview']['size'] .';"';
					} else { 
						$g_size = '';
					}
					$hide = " hide";
					if ($smof_data[$value['id']] != "none" && $smof_data[$value['id']] != "")
						$hide = "";
					
					$output .= '<p class="'.$value['id'].'_ggf_previewer google_font_preview'.$hide.'" '. $g_size .'>'. $g_text .'</p>';	
					//{"family":"Zeyada","variants":["regular"],"subsets":["latin"]}
					/* Font Color */
					if(isset($g_typography_stored['color'])) {					
						$output .= '<div id="' . $value['id'] . '_color_picker" class="colorSelector typography-color"><div style="background-color: '.$g_typography_stored['color'].'"></div></div>';
						$output .= '<input class="of-color of-typography of-typography-color" original-title="Font color" name="'.$value['id'].'[color]" id="'. $value['id'] .'_color" type="text" value="'. $g_typography_stored['color'] .'" />';					
					}

				break;
				
				//JQuery UI Slider
				case 'sliderui':
					$s_val = $s_min = $s_max = $s_step = $s_edit = '';//no errors, please
					
					$s_val  = stripslashes($smof_data[$value['id']]);
					
					if(!isset($value['min'])){ $s_min  = '0'; }else{ $s_min = $value['min']; }
					if(!isset($value['max'])){ $s_max  = $s_min + 1; }else{ $s_max = $value['max']; }
					if(!isset($value['step'])){ $s_step  = '1'; }else{ $s_step = $value['step']; }
					
					if(!isset($value['edit'])){ 
						$s_edit  = ' readonly="readonly"'; 
					}
					else
					{
						$s_edit  = '';
					}
					
					if ($s_val == '') $s_val = $s_min;
					
					//values
					$s_data = 'data-id="'.$value['id'].'" data-val="'.$s_val.'" data-min="'.$s_min.'" data-max="'.$s_max.'" data-step="'.$s_step.'"';
					
					//html output
					$output .= '<input type="text" name="'.$value['id'].'" id="'.$value['id'].'" value="'. $s_val .'" class="mini" '. $s_edit .' />';
					$output .= '<div id="'.$value['id'].'-slider" class="smof_sliderui" style="margin-left: 7px;" '. $s_data .'></div>';
					
				break;
				
				
				//Switch option
				case 'switch':

					$switch_val = '';
					if($smof_data[$value['id']]){
						$switch_val = stripslashes($smof_data[$value['id']]);
					}

					$output .= '<p class="switch-options">';
						foreach ( $value['options'] as $key => $option ) {
							if($switch_val == $key){
								$class = 'selected';
							}
							else{
								$class = '';
							}
							$output .= '<label class="'.$fold.'cb-enable '. $class . '" data-id="'.$key.'"><span>'.$option.'</span></label>';
						}

						$fold = '';
						if (array_key_exists("folds",$value)) $fold="fld-switch ";

						$output .= '<input type="hidden" class="pix-switch-value '.$fold.'checkbox of-input" name="'.$value['id'].'" data-id="'. $value['id'] .'" id="'. $value['id'] .'" value="'.$switch_val.'"/>';
					$output .= '</p>';
					
				break;

				// Uploader 3.5
				case "upload":
				case "media":

					if(!isset($value['mod'])) $value['mod'] = '';
					
					$u_val = '';
					if($smof_data[$value['id']]){
						$u_val = stripslashes($smof_data[$value['id']]);
					}

					$output .= Composer_Options_Machine::optionsframework_media_uploader_function($value['id'],$u_val, $value['mod']);
					
				break;
				
			}

			do_action('optionsframework_machine_loop', array(
					'options'	=> $options,
					'smof_data'	=> $smof_data,
					'defaults'	=> $defaults,
					'counter'	=> $counter,
					'menu'		=> $menu,
					'output'	=> $output,
					'value'		=> $value
				));
			if ($smof_output != "") {
				$output .= $smof_output;
				$smof_output = "";
			}
			
			//description of each option
			if ( $value['type'] != 'heading') { 
				
				$output .= '</div>';
				$output .= '<div class="clear"> </div></div></div>'."\n";
				}
			
			} /* condition empty end */
		   
		}

		if ($update_data == true) {
			of_save_options($smof_data);
		}
		
	    $output .= '</div>';

	    do_action('optionsframework_machine_after', array(
					'options'		=> $options,
					'smof_data'		=> $smof_data,
					'defaults'		=> $defaults,
					'counter'		=> $counter,
					'menu'			=> $menu,
					'output'		=> $output,
					'value'			=> $value
				));
		if ($smof_output != "") {
			$output .= $smof_output;
			$smof_output = "";
		}
	    
	    return array($output,$menu,$defaults);
	    
	}


	/**
	 * Native media library uploader
	 *
	 * @uses get_theme_mod()
	 *
	 * @access public
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function optionsframework_media_uploader_function($id,$std,$mod){

	    $smof_data = of_get_options();
	    $smof_data = of_get_options();
		
		$uploader = '';
		$upload = "";
		if (isset($smof_data[$id]))
	    	$upload = $smof_data[$id];
		$hide = '';
		
		if ($mod == "min") {$hide ='hide';}
		
	    if ( $upload != "") { $val = $upload; } else {$val = $std;}
	    
		$uploader .= '<input class="'.$hide.' upload of-input" name="'. $id .'" id="'. $id .'_upload" value="'. $val .'" />';	
		
		//Upload controls DIV
		$uploader .= '<div class="upload_button_div">';
		//If the user has WP3.5+ show upload/remove button
		if ( function_exists( 'wp_enqueue_media' ) ) {
			$uploader .= '<span class="upload-btn button media_upload_button" id="'.$id.'"><i class="icon-folder-open"></i> Browse</span>';
			
			if(!empty($upload)) {$hide = '';} else { $hide = 'hide';}
			$uploader .= '<span class="remove-btn button remove-image '. $hide.'" id="reset_'. $id .'" title="' . $id . '"><i class="icon-remove"></i> Remove</span>';
		}
		else 
		{
			$output .= '<p class="upload-notice"><i>Upgrade your version of WordPress for full media support.</i></p>';
		}

		$uploader .='</div>' . "\n";

		//Preview
		$uploader .= '<div class="screenshot">';
		if(!empty($upload)){	
	    	$uploader .= '<a class="of-uploaded-image" href="'. esc_url($upload) . '">';
	    	$uploader .= '<img class="of-option-image" id="image_'.$id.'" src="'.$upload.'" alt="" />';
	    	$uploader .= '</a>';			
			}
		$uploader .= '</div>';
		$uploader .= '<div class="clear"></div>' . "\n"; 
	
		return $uploader;
		
	}

	/**
	 * Google font weight & Substring change on the font change
	 *
	 * @return String
	 */
	
	public function composer_change_gfont_weight(){
		global $font_variants;
		if($_POST['font']){
			echo json_encode($font_variants[$_POST['font']]);
		}else{
			echo 'regular';
		}
		die();
	}

	/**
	 * Drag and drop slides manager
	 *
	 * @uses get_theme_mod()
	 *
	 * @access public
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function optionsframework_slider_function($id,$std,$oldorder,$order){
		
	    $smof_data = of_get_options();
		
		$slider = '';
		$slide = array();
		if (isset($smof_data[$id]))
	    	$slide = $smof_data[$id];
		
	    if (isset($slide[$oldorder])) { $val = $slide[$oldorder]; } else {$val = $std;}
		
		//initialize all vars
		$slidevars = array('title','url','link','description');
		
		foreach ($slidevars as $slidevar) {
			if (!isset($val[$slidevar])) {
				$val[$slidevar] = '';
			}
		}
		
		//begin slider interface	
		if (!empty($val['title'])) {
			$slider .= '<li><div class="slide_header"><strong>'.stripslashes($val['title']).'</strong>';
		} else {
			$slider .= '<li><div class="slide_header"><strong>Slide '.$order.'</strong>';
		}
		
		$slider .= '<input type="hidden" class="slide of-input order" name="'. $id .'['.$order.'][order]" id="'. $id.'_'.$order .'_slide_order" value="'.$order.'" />';
	
		$slider .= '<a class="slide_edit_button" href="#">Edit</a></div>';
		
		$slider .= '<div class="slide_body">';
		
		$slider .= '<label>Title</label>';
		$slider .= '<input class="slide of-input of-slider-title" name="'. $id .'['.$order.'][title]" id="'. $id .'_'.$order .'_slide_title" value="'. stripslashes($val['title']) .'" />';
		
		$slider .= '<label>Image URL</label>';
		
		$slider .= '<div class="upload_button_div media-wrap"><span class="button media_upload_button" id="'.$id.'_'.$order .'">Upload</span>';
		$slider .= '<input class="upload slide of-input" name="'. $id .'['.$order.'][url]" id="'. $id .'_'.$order .'_slide_url" value="'. $val['url'] .'" />';
		
		if(!empty($val['url'])) {$hide = '';} else { $hide = 'hide';}
		$slider .= '<span class="button remove-image '. $hide.'" id="reset_'. $id .'_'.$order .'" title="' . $id . '_'.$order .'">Remove</span>';
		$slider .='</div>' . "\n";
		$slider .= '<div class="screenshot">';
		if(!empty($val['url'])){
			
	    	$slider .= '<a class="of-uploaded-image" href="'. esc_url($val['url']) . '">';
	    	$slider .= '<img class="of-option-image" id="image_'.$id.'_'.$order .'" src="'.$val['url'].'" alt="" />';
	    	$slider .= '</a>';
			
			}
		$slider .= '</div>';	
		$slider .= '<label>Link URL (optional)</label>';
		$slider .= '<input class="slide of-input" name="'. $id .'['.$order.'][link]" id="'. $id .'_'.$order .'_slide_link" value="'. $val['link'] .'" />';
		
		$slider .= '<label>Description (optional)</label>';
		$slider .= '<textarea class="slide of-input" name="'. $id .'['.$order.'][description]" id="'. $id .'_'.$order .'_slide_description" cols="8" rows="8">'.stripslashes($val['description']).'</textarea>';
	
		$slider .= '<a class="slide_delete_button" href="#">Delete</a>';
	    $slider .= '<div class="clear"></div>' . "\n";
	
		$slider .= '</div>';
		$slider .= '</li>';
	
		return $slider;
		
	}

	/**
	 * Drag and drop slides manager
	 *
	 * @uses get_theme_mod()
	 *
	 * @access public
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function optionsframework_fonts_function($id,$std,$oldorder,$order){
		
	    $smof_data = of_get_options();
		
		$output = '';
		$font = array();
		if (isset($smof_data[$id]))
	    	$font = $smof_data[$id];
		
	    if (isset($font[$oldorder])) { $val = $font[$oldorder]; } else {$val = $std;}
		
		//initialize all vars
		$font_vars = array('font_title','font_weight','eot','woff','ttf','svg');
		
		foreach ($font_vars as $font_var) {
			if (!isset($val[$font_var])) {
				$val[$font_var] = '';
			}
		}
		
		//begin slider interface	
		if (!empty($val['font_title'])) {
			$output .= '<li><div class="slide_header"><strong>'.stripslashes($val['font_title']).'</strong>';
		} else {
			$output .= '<li><div class="slide_header"><strong>Slide '.$order.'</strong>';
		}
		
		$output .= '<input type="hidden" class="slide of-input order" name="'. $id .'['.$order.'][order]" id="'. $id.'_'.$order .'_slide_order" value="'.$order.'" />';
	
		$output .= '<a class="slide_edit_button" href="#">Edit</a></div>';
		
		$output .= '<div class="slide_body">';
		
		$output .= '<label>Font Title</label>';
		$output .= '<input class="slide of-input of-slider-title" name="'. $id .'['.$order.'][font_title]" id="'. $id .'_'.$order .'_slide_title" value="'. stripslashes($val['font_title']) .'" />';

		$output .= '<h4>Font Formats</h4>';
		$output .= '<label>WOFF</label>';		
		$output .= '<div class="upload_button_div media-wrap">';
		$output .= '<input class="upload slide of-input" name="'. $id .'['.$order.'][woff]" id="'. $id .'_'.$order .'_slide_woff" value="'. $val['woff'] .'" />';
		$output .= '<span class="button media_upload_button" id="'.$id.'_'.$order .'">Upload</span>';
		
		if(!empty($val['woff'])) {$hide = '';} else { $hide = 'hide';}
		$output .= '<span class="button remove-image '. $hide.'" id="reset_'. $id .'_'.$order .'" title="' . $id . '_'.$order .'">Remove</span>';
		$output .='</div>' . "\n";
		$output .= '<div class="desc">Recommended, works in all modern browsers</div>';

		$output .= '<label>TTF</label>';
		
		$output .= '<div class="upload_button_div media-wrap">';
		$output .= '<input class="upload slide of-input" name="'. $id .'['.$order.'][ttf]" id="'. $id .'_'.$order .'_slide_ttf" value="'. $val['ttf'] .'" />';

		$output .= '<span class="button media_upload_button" id="'.$id.'_'.$order .'">Upload</span>';
		
		if(!empty($val['ttf'])) {$hide = '';} else { $hide = 'hide';}
		$output .= '<span class="button remove-image '. $hide.'" id="reset_'. $id .'_'.$order .'" title="' . $id . '_'.$order .'">Remove</span>';
		$output .='</div>' . "\n";
		$output .= '<div class="desc">Not Recommended, but required by older of works webkit browsers (like chrome)</div>';

		$output .= '<label>EOT</label>';		
		$output .= '<div class="upload_button_div media-wrap">';
		$output .= '<input class="upload slide of-input" name="'. $id .'['.$order.'][eot]" id="'. $id .'_'.$order .'_slide_eot" value="'. $val['eot'] .'" />';

		$output .= '<span class="button media_upload_button" id="'.$id.'_'.$order .'">Upload</span>';
		
		if(!empty($val['eot'])) {$hide = '';} else { $hide = 'hide';}
		$output .= '<span class="button remove-image '. $hide.'" id="reset_'. $id .'_'.$order .'" title="' . $id . '_'.$order .'">Remove</span>';
		$output .='</div>' . "\n";
		$output .= '<div class="desc">Only necessary for IE older than IE9</div>';

		$output .= '<label>SVG</label>';
		
		$output .= '<div class="upload_button_div media-wrap">';
		$output .= '<input class="upload slide of-input" name="'. $id .'['.$order.'][svg]" id="'. $id .'_'.$order .'_slide_svg" value="'. $val['svg'] .'" />';
		$output .= '<span class="button media_upload_button" id="'.$id.'_'.$order .'">Upload</span>';
		
		if(!empty($val['svg'])) {$hide = '';} else { $hide = 'hide';}
		$output .= '<span class="button remove-image '. $hide.'" id="reset_'. $id .'_'.$order .'" title="' . $id . '_'.$order .'">Remove</span>';
		$output .='</div>' . "\n";
		$output .= '<div class="desc">No longer supported or required for any browser. But required for Legacy iOS</div>';
	
		$output .= '<a class="slide_delete_button" href="#">Delete</a>';
	    $output .= '<div class="clear"></div>' . "\n";
	
		$output .= '</div>';
		$output .= '</li>';
	
		return $output;
		
	}

	
}//end Options Machine class



?>
