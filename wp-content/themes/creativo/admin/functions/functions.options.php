<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Register sidebar options for blog/portfolio/woocommerce category/archive pages
        global $wp_registered_sidebars;
        $sidebar_options[] = 'None';
        for($i=0;$i<1;$i++){
            $sidebars = $wp_registered_sidebars;// sidebar_generator::get_sidebars();
            //var_dump($sidebars);
            if(is_array($sidebars) && !empty($sidebars)){
                foreach($sidebars as $sidebar){
                    $sidebar_options[] = $sidebar['name'];
                }
            }
            $sidebars = sidebar_generator::get_sidebars();
            if(is_array($sidebars) && !empty($sidebars)){
                foreach($sidebars as $key => $value){
                    $sidebar_options[] = $value;
                }
            }
        }
        // End
		
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Logo",
				"block_two"		=> "Menu",
				"block_three"	=> "Social Links",
				"block_four"	=> "Contact Info",
			), 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!				
				"block_five"	=> "Search Box",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();

		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/pattern/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/pattern/'; // change this to where you store your bg images
		$bg_images = array();

		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		            	natsort($bg_images); //Sorts the array into a natural order
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}

		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 
		
		$google_fonts = array(
						"Select Font" => "Select Font",
						"ABeeZee" => "ABeeZee",
						"Abel" => "Abel",
						"Abril Fatface" => "Abril Fatface",
						"Aclonica" => "Aclonica",
						"Acme" => "Acme",
						"Actor" => "Actor",
						"Adamina" => "Adamina",
						"Advent Pro" => "Advent Pro",
						"Aguafina Script" => "Aguafina Script",
						"Akronim" => "Akronim",
						"Aladin" => "Aladin",
						"Aldrich" => "Aldrich",
						"Alef" => "Alef",
						"Alegreya" => "Alegreya",
						"Alegreya SC" => "Alegreya SC",
						"Alegreya Sans" => "Alegreya Sans",
						"Alegreya Sans SC" => "Alegreya Sans SC",
						"Alex Brush" => "Alex Brush",
						"Alfa Slab One" => "Alfa Slab One",
						"Alice" => "Alice",
						"Alike" => "Alike",
						"Alike Angular" => "Alike Angular",
						"Allan" => "Allan",
						"Allerta" => "Allerta",
						"Allerta Stencil" => "Allerta Stencil",
						"Allura" => "Allura",
						"Almendra" => "Almendra",
						"Almendra Display" => "Almendra Display",
						"Almendra SC" => "Almendra SC",
						"Amarante" => "Amarante",
						"Amaranth" => "Amaranth",
						"Amatic SC" => "Amatic SC",
						"Amethysta" => "Amethysta",
						"Anaheim" => "Anaheim",
						"Andada" => "Andada",
						"Andika" => "Andika",
						"Angkor" => "Angkor",
						"Annie Use Your Telescope" => "Annie Use Your Telescope",
						"Anonymous Pro" => "Anonymous Pro",
						"Antic" => "Antic",
						"Antic Didone" => "Antic Didone",
						"Antic Slab" => "Antic Slab",
						"Anton" => "Anton",
						"Arapey" => "Arapey",
						"Arbutus" => "Arbutus",
						"Arbutus Slab" => "Arbutus Slab",
						"Architects Daughter" => "Architects Daughter",
						"Archivo Black" => "Archivo Black",
						"Archivo Narrow" => "Archivo Narrow",
						"Arimo" => "Arimo",
						"Arizonia" => "Arizonia",
						"Armata" => "Armata",
						"Artifika" => "Artifika",
						"Arvo" => "Arvo",
						"Asap" => "Asap",
						"Asset" => "Asset",
						"Astloch" => "Astloch",
						"Asul" => "Asul",
						"Atomic Age" => "Atomic Age",
						"Aubrey" => "Aubrey",
						"Audiowide" => "Audiowide",
						"Autour One" => "Autour One",
						"Average" => "Average",
						"Average Sans" => "Average Sans",
						"Averia Gruesa Libre" => "Averia Gruesa Libre",
						"Averia Libre" => "Averia Libre",
						"Averia Sans Libre" => "Averia Sans Libre",
						"Averia Serif Libre" => "Averia Serif Libre",
						"Bad Script" => "Bad Script",
						"Balthazar" => "Balthazar",
						"Bangers" => "Bangers",
						"Basic" => "Basic",
						"Battambang" => "Battambang",
						"Baumans" => "Baumans",
						"Bayon" => "Bayon",
						"Belgrano" => "Belgrano",
						"Belleza" => "Belleza",
						"BenchNine" => "BenchNine",
						"Bentham" => "Bentham",
						"Berkshire Swash" => "Berkshire Swash",
						"Bevan" => "Bevan",
						"Bigelow Rules" => "Bigelow Rules",
						"Bigshot One" => "Bigshot One",
						"Bilbo" => "Bilbo",
						"Bilbo Swash Caps" => "Bilbo Swash Caps",
						"Bitter" => "Bitter",
						"Black Ops One" => "Black Ops One",
						"Bokor" => "Bokor",
						"Bonbon" => "Bonbon",
						"Boogaloo" => "Boogaloo",
						"Bowlby One" => "Bowlby One",
						"Bowlby One SC" => "Bowlby One SC",
						"Brawler" => "Brawler",
						"Bree Serif" => "Bree Serif",
						"Bubblegum Sans" => "Bubblegum Sans",
						"Bubbler One" => "Bubbler One",
						"Buda" => "Buda",
						"Buenard" => "Buenard",
						"Butcherman" => "Butcherman",
						"Butterfly Kids" => "Butterfly Kids",
						"Cabin" => "Cabin",
						"Cabin Condensed" => "Cabin Condensed",
						"Cabin Sketch" => "Cabin Sketch",
						"Caesar Dressing" => "Caesar Dressing",
						"Cagliostro" => "Cagliostro",
						"Calligraffitti" => "Calligraffitti",
						"Cambo" => "Cambo",
						"Candal" => "Candal",
						"Cantarell" => "Cantarell",
						"Cantata One" => "Cantata One",
						"Cantora One" => "Cantora One",
						"Capriola" => "Capriola",
						"Cardo" => "Cardo",
						"Carme" => "Carme",
						"Carrois Gothic" => "Carrois Gothic",
						"Carrois Gothic SC" => "Carrois Gothic SC",
						"Carter One" => "Carter One",
						"Caudex" => "Caudex",
						"Cedarville Cursive" => "Cedarville Cursive",
						"Ceviche One" => "Ceviche One",
						"Changa One" => "Changa One",
						"Chango" => "Chango",
						"Chau Philomene One" => "Chau Philomene One",
						"Chela One" => "Chela One",
						"Chelsea Market" => "Chelsea Market",
						"Chenla" => "Chenla",
						"Cherry Cream Soda" => "Cherry Cream Soda",
						"Cherry Swash" => "Cherry Swash",
						"Chewy" => "Chewy",
						"Chicle" => "Chicle",
						"Chivo" => "Chivo",
						"Cinzel" => "Cinzel",
						"Cinzel Decorative" => "Cinzel Decorative",
						"Clicker Script" => "Clicker Script",
						"Coda" => "Coda",
						"Coda Caption" => "Coda Caption",
						"Codystar" => "Codystar",
						"Combo" => "Combo",
						"Comfortaa" => "Comfortaa",
						"Coming Soon" => "Coming Soon",
						"Concert One" => "Concert One",
						"Condiment" => "Condiment",
						"Content" => "Content",
						"Contrail One" => "Contrail One",
						"Convergence" => "Convergence",
						"Cookie" => "Cookie",
						"Copse" => "Copse",
						"Corben" => "Corben",
						"Courgette" => "Courgette",
						"Cousine" => "Cousine",
						"Coustard" => "Coustard",
						"Covered By Your Grace" => "Covered By Your Grace",
						"Crafty Girls" => "Crafty Girls",
						"Creepster" => "Creepster",
						"Crete Round" => "Crete Round",
						"Crimson Text" => "Crimson Text",
						"Croissant One" => "Croissant One",
						"Crushed" => "Crushed",
						"Cuprum" => "Cuprum",
						"Cutive" => "Cutive",
						"Cutive Mono" => "Cutive Mono",
						"Damion" => "Damion",
						"Dancing Script" => "Dancing Script",
						"Dangrek" => "Dangrek",
						"Dawning of a New Day" => "Dawning of a New Day",
						"Days One" => "Days One",
						"Delius" => "Delius",
						"Delius Swash Caps" => "Delius Swash Caps",
						"Delius Unicase" => "Delius Unicase",
						"Della Respira" => "Della Respira",
						"Denk One" => "Denk One",
						"Devonshire" => "Devonshire",
						"Didact Gothic" => "Didact Gothic",
						"Diplomata" => "Diplomata",
						"Diplomata SC" => "Diplomata SC",
						"Domine" => "Domine",
						"Donegal One" => "Donegal One",
						"Doppio One" => "Doppio One",
						"Dorsa" => "Dorsa",
						"Dosis" => "Dosis",
						"Dr Sugiyama" => "Dr Sugiyama",
						"Droid Sans" => "Droid Sans",
						"Droid Sans Mono" => "Droid Sans Mono",
						"Droid Serif" => "Droid Serif",
						"Duru Sans" => "Duru Sans",
						"Dynalight" => "Dynalight",
						"EB Garamond" => "EB Garamond",
						"Eagle Lake" => "Eagle Lake",
						"Eater" => "Eater",
						"Economica" => "Economica",
						"Electrolize" => "Electrolize",
						"Elsie" => "Elsie",
						"Elsie Swash Caps" => "Elsie Swash Caps",
						"Emblema One" => "Emblema One",
						"Emilys Candy" => "Emilys Candy",
						"Engagement" => "Engagement",
						"Englebert" => "Englebert",
						"Enriqueta" => "Enriqueta",
						"Erica One" => "Erica One",
						"Esteban" => "Esteban",
						"Euphoria Script" => "Euphoria Script",
						"Ewert" => "Ewert",
						"Exo" => "Exo",
						"Exo 2" => "Exo 2",
						"Expletus Sans" => "Expletus Sans",
						"Fanwood Text" => "Fanwood Text",
						"Fascinate" => "Fascinate",
						"Fascinate Inline" => "Fascinate Inline",
						"Faster One" => "Faster One",
						"Fasthand" => "Fasthand",
						"Fauna One" => "Fauna One",
						"Federant" => "Federant",
						"Federo" => "Federo",
						"Felipa" => "Felipa",
						"Fenix" => "Fenix",
						"Finger Paint" => "Finger Paint",
						"Fjalla One" => "Fjalla One",
						"Fjord One" => "Fjord One",
						"Flamenco" => "Flamenco",
						"Flavors" => "Flavors",
						"Fondamento" => "Fondamento",
						"Fontdiner Swanky" => "Fontdiner Swanky",
						"Forum" => "Forum",
						"Francois One" => "Francois One",
						"Freckle Face" => "Freckle Face",
						"Fredericka the Great" => "Fredericka the Great",
						"Fredoka One" => "Fredoka One",
						"Freehand" => "Freehand",
						"Fresca" => "Fresca",
						"Frijole" => "Frijole",
						"Fruktur" => "Fruktur",
						"Fugaz One" => "Fugaz One",
						"GFS Didot" => "GFS Didot",
						"GFS Neohellenic" => "GFS Neohellenic",
						"Gabriela" => "Gabriela",
						"Gafata" => "Gafata",
						"Galdeano" => "Galdeano",
						"Galindo" => "Galindo",
						"Gentium Basic" => "Gentium Basic",
						"Gentium Book Basic" => "Gentium Book Basic",
						"Geo" => "Geo",
						"Geostar" => "Geostar",
						"Geostar Fill" => "Geostar Fill",
						"Germania One" => "Germania One",
						"Gilda Display" => "Gilda Display",
						"Give You Glory" => "Give You Glory",
						"Glass Antiqua" => "Glass Antiqua",
						"Glegoo" => "Glegoo",
						"Gloria Hallelujah" => "Gloria Hallelujah",
						"Goblin One" => "Goblin One",
						"Gochi Hand" => "Gochi Hand",
						"Gorditas" => "Gorditas",
						"Goudy Bookletter 1911" => "Goudy Bookletter 1911",
						"Graduate" => "Graduate",
						"Grand Hotel" => "Grand Hotel",
						"Gravitas One" => "Gravitas One",
						"Great Vibes" => "Great Vibes",
						"Griffy" => "Griffy",
						"Gruppo" => "Gruppo",
						"Gudea" => "Gudea",
						"Habibi" => "Habibi",
						"Hammersmith One" => "Hammersmith One",
						"Hanalei" => "Hanalei",
						"Hanalei Fill" => "Hanalei Fill",
						"Handlee" => "Handlee",
						"Hanuman" => "Hanuman",
						"Happy Monkey" => "Happy Monkey",
						"Headland One" => "Headland One",
						"Henny Penny" => "Henny Penny",
						"Herr Von Muellerhoff" => "Herr Von Muellerhoff",
						"Holtwood One SC" => "Holtwood One SC",
						"Homemade Apple" => "Homemade Apple",
						"Homenaje" => "Homenaje",
						"IM Fell DW Pica" => "IM Fell DW Pica",
						"IM Fell DW Pica SC" => "IM Fell DW Pica SC",
						"IM Fell Double Pica" => "IM Fell Double Pica",
						"IM Fell Double Pica SC" => "IM Fell Double Pica SC",
						"IM Fell English" => "IM Fell English",
						"IM Fell English SC" => "IM Fell English SC",
						"IM Fell French Canon" => "IM Fell French Canon",
						"IM Fell French Canon SC" => "IM Fell French Canon SC",
						"IM Fell Great Primer" => "IM Fell Great Primer",
						"IM Fell Great Primer SC" => "IM Fell Great Primer SC",
						"Iceberg" => "Iceberg",
						"Iceland" => "Iceland",
						"Imprima" => "Imprima",
						"Inconsolata" => "Inconsolata",
						"Inder" => "Inder",
						"Indie Flower" => "Indie Flower",
						"Inika" => "Inika",
						"Irish Grover" => "Irish Grover",
						"Istok Web" => "Istok Web",
						"Italiana" => "Italiana",
						"Italianno" => "Italianno",
						"Jacques Francois" => "Jacques Francois",
						"Jacques Francois Shadow" => "Jacques Francois Shadow",
						"Jim Nightshade" => "Jim Nightshade",
						"Jockey One" => "Jockey One",
						"Jolly Lodger" => "Jolly Lodger",
						"Josefin Sans" => "Josefin Sans",
						"Josefin Slab" => "Josefin Slab",
						"Joti One" => "Joti One",
						"Judson" => "Judson",
						"Julee" => "Julee",
						"Julius Sans One" => "Julius Sans One",
						"Junge" => "Junge",
						"Jura" => "Jura",
						"Just Another Hand" => "Just Another Hand",
						"Just Me Again Down Here" => "Just Me Again Down Here",
						"Kameron" => "Kameron",
						"Kantumruy" => "Kantumruy",
						"Karla" => "Karla",
						"Kaushan Script" => "Kaushan Script",
						"Kavoon" => "Kavoon",
						"Kdam Thmor" => "Kdam Thmor",
						"Keania One" => "Keania One",
						"Kelly Slab" => "Kelly Slab",
						"Kenia" => "Kenia",
						"Khmer" => "Khmer",
						"Kite One" => "Kite One",
						"Knewave" => "Knewave",
						"Kotta One" => "Kotta One",
						"Koulen" => "Koulen",
						"Kranky" => "Kranky",
						"Kreon" => "Kreon",
						"Kristi" => "Kristi",
						"Krona One" => "Krona One",
						"La Belle Aurore" => "La Belle Aurore",
						"Lancelot" => "Lancelot",
						"Lato" => "Lato",
						"League Script" => "League Script",
						"Leckerli One" => "Leckerli One",
						"Ledger" => "Ledger",
						"Lekton" => "Lekton",
						"Lemon" => "Lemon",
						"Libre Baskerville" => "Libre Baskerville",
						"Life Savers" => "Life Savers",
						"Lilita One" => "Lilita One",
						"Lily Script One" => "Lily Script One",
						"Limelight" => "Limelight",
						"Linden Hill" => "Linden Hill",
						"Lobster" => "Lobster",
						"Lobster Two" => "Lobster Two",
						"Londrina Outline" => "Londrina Outline",
						"Londrina Shadow" => "Londrina Shadow",
						"Londrina Sketch" => "Londrina Sketch",
						"Londrina Solid" => "Londrina Solid",
						"Lora" => "Lora",
						"Love Ya Like A Sister" => "Love Ya Like A Sister",
						"Loved by the King" => "Loved by the King",
						"Lovers Quarrel" => "Lovers Quarrel",
						"Luckiest Guy" => "Luckiest Guy",
						"Lusitana" => "Lusitana",
						"Lustria" => "Lustria",
						"Macondo" => "Macondo",
						"Macondo Swash Caps" => "Macondo Swash Caps",
						"Magra" => "Magra",
						"Maiden Orange" => "Maiden Orange",
						"Mako" => "Mako",
						"Marcellus" => "Marcellus",
						"Marcellus SC" => "Marcellus SC",
						"Marck Script" => "Marck Script",
						"Margarine" => "Margarine",
						"Marko One" => "Marko One",
						"Marmelad" => "Marmelad",
						"Marvel" => "Marvel",
						"Mate" => "Mate",
						"Mate SC" => "Mate SC",
						"Maven Pro" => "Maven Pro",
						"McLaren" => "McLaren",
						"Meddon" => "Meddon",
						"MedievalSharp" => "MedievalSharp",
						"Medula One" => "Medula One",
						"Megrim" => "Megrim",
						"Meie Script" => "Meie Script",
						"Merienda" => "Merienda",
						"Merienda One" => "Merienda One",
						"Merriweather" => "Merriweather",
						"Merriweather Sans" => "Merriweather Sans",
						"Metal" => "Metal",
						"Metal Mania" => "Metal Mania",
						"Metamorphous" => "Metamorphous",
						"Metrophobic" => "Metrophobic",
						"Michroma" => "Michroma",
						"Milonga" => "Milonga",
						"Miltonian" => "Miltonian",
						"Miltonian Tattoo" => "Miltonian Tattoo",
						"Miniver" => "Miniver",
						"Miss Fajardose" => "Miss Fajardose",
						"Modern Antiqua" => "Modern Antiqua",
						"Molengo" => "Molengo",
						"Molle" => "Molle",
						"Monda" => "Monda",
						"Monofett" => "Monofett",
						"Monoton" => "Monoton",
						"Monsieur La Doulaise" => "Monsieur La Doulaise",
						"Montaga" => "Montaga",
						"Montez" => "Montez",
						"Montserrat" => "Montserrat",
						"Montserrat Alternates" => "Montserrat Alternates",
						"Montserrat Subrayada" => "Montserrat Subrayada",
						"Moul" => "Moul",
						"Moulpali" => "Moulpali",
						"Mountains of Christmas" => "Mountains of Christmas",
						"Mouse Memoirs" => "Mouse Memoirs",
						"Mr Bedfort" => "Mr Bedfort",
						"Mr Dafoe" => "Mr Dafoe",
						"Mr De Haviland" => "Mr De Haviland",
						"Mrs Saint Delafield" => "Mrs Saint Delafield",
						"Mrs Sheppards" => "Mrs Sheppards",
						"Muli" => "Muli",
						"Mystery Quest" => "Mystery Quest",
						"Neucha" => "Neucha",
						"Neuton" => "Neuton",
						"New Rocker" => "New Rocker",
						"News Cycle" => "News Cycle",
						"Niconne" => "Niconne",
						"Nixie One" => "Nixie One",
						"Nobile" => "Nobile",
						"Nokora" => "Nokora",
						"Norican" => "Norican",
						"Nosifer" => "Nosifer",
						"Nothing You Could Do" => "Nothing You Could Do",
						"Noticia Text" => "Noticia Text",
						"Noto Sans" => "Noto Sans",
						"Noto Serif" => "Noto Serif",
						"Nova Cut" => "Nova Cut",
						"Nova Flat" => "Nova Flat",
						"Nova Mono" => "Nova Mono",
						"Nova Oval" => "Nova Oval",
						"Nova Round" => "Nova Round",
						"Nova Script" => "Nova Script",
						"Nova Slim" => "Nova Slim",
						"Nova Square" => "Nova Square",
						"Numans" => "Numans",
						"Nunito" => "Nunito",
						"Odor Mean Chey" => "Odor Mean Chey",
						"Offside" => "Offside",
						"Old Standard TT" => "Old Standard TT",
						"Oldenburg" => "Oldenburg",
						"Oleo Script" => "Oleo Script",
						"Oleo Script Swash Caps" => "Oleo Script Swash Caps",
						"Open Sans" => "Open Sans",
						"Open Sans Condensed" => "Open Sans Condensed",
						"Oranienbaum" => "Oranienbaum",
						"Orbitron" => "Orbitron",
						"Oregano" => "Oregano",
						"Orienta" => "Orienta",
						"Original Surfer" => "Original Surfer",
						"Oswald" => "Oswald",
						"Over the Rainbow" => "Over the Rainbow",
						"Overlock" => "Overlock",
						"Overlock SC" => "Overlock SC",
						"Ovo" => "Ovo",
						"Oxygen" => "Oxygen",
						"Oxygen Mono" => "Oxygen Mono",
						"PT Mono" => "PT Mono",
						"PT Sans" => "PT Sans",
						"PT Sans Caption" => "PT Sans Caption",
						"PT Sans Narrow" => "PT Sans Narrow",
						"PT Serif" => "PT Serif",
						"PT Serif Caption" => "PT Serif Caption",
						"Pacifico" => "Pacifico",
						"Paprika" => "Paprika",
						"Parisienne" => "Parisienne",
						"Passero One" => "Passero One",
						"Passion One" => "Passion One",
						"Pathway Gothic One" => "Pathway Gothic One",
						"Patrick Hand" => "Patrick Hand",
						"Patrick Hand SC" => "Patrick Hand SC",
						"Patua One" => "Patua One",
						"Paytone One" => "Paytone One",
						"Peralta" => "Peralta",
						"Permanent Marker" => "Permanent Marker",
						"Petit Formal Script" => "Petit Formal Script",
						"Petrona" => "Petrona",
						"Philosopher" => "Philosopher",
						"Piedra" => "Piedra",
						"Pinyon Script" => "Pinyon Script",
						"Pirata One" => "Pirata One",
						"Plaster" => "Plaster",
						"Play" => "Play",
						"Playball" => "Playball",
						"Playfair Display" => "Playfair Display",
						"Playfair Display SC" => "Playfair Display SC",
						"Podkova" => "Podkova",
						"Poiret One" => "Poiret One",
						"Poller One" => "Poller One",
						"Poly" => "Poly",
						"Pompiere" => "Pompiere",
						"Pontano Sans" => "Pontano Sans",
						"Port Lligat Sans" => "Port Lligat Sans",
						"Port Lligat Slab" => "Port Lligat Slab",
						"Prata" => "Prata",
						"Preahvihear" => "Preahvihear",
						"Press Start 2P" => "Press Start 2P",
						"Princess Sofia" => "Princess Sofia",
						"Prociono" => "Prociono",
						"Prosto One" => "Prosto One",
						"Puritan" => "Puritan",
						"Purple Purse" => "Purple Purse",
						"Quando" => "Quando",
						"Quantico" => "Quantico",
						"Quattrocento" => "Quattrocento",
						"Quattrocento Sans" => "Quattrocento Sans",
						"Questrial" => "Questrial",
						"Quicksand" => "Quicksand",
						"Quintessential" => "Quintessential",
						"Qwigley" => "Qwigley",
						"Racing Sans One" => "Racing Sans One",
						"Radley" => "Radley",
						"Raleway" => "Raleway",
						"Raleway Dots" => "Raleway Dots",
						"Rambla" => "Rambla",
						"Rammetto One" => "Rammetto One",
						"Ranchers" => "Ranchers",
						"Rancho" => "Rancho",
						"Rationale" => "Rationale",
						"Redressed" => "Redressed",
						"Reenie Beanie" => "Reenie Beanie",
						"Revalia" => "Revalia",
						"Ribeye" => "Ribeye",
						"Ribeye Marrow" => "Ribeye Marrow",
						"Righteous" => "Righteous",
						"Risque" => "Risque",
						"Roboto" => "Roboto",
						"Roboto Condensed" => "Roboto Condensed",
						"Roboto Slab" => "Roboto Slab",
						"Rochester" => "Rochester",
						"Rock Salt" => "Rock Salt",
						"Rokkitt" => "Rokkitt",
						"Romanesco" => "Romanesco",
						"Ropa Sans" => "Ropa Sans",
						"Rosario" => "Rosario",
						"Rosarivo" => "Rosarivo",
						"Rouge Script" => "Rouge Script",
						"Rubik Mono One" => "Rubik Mono One",
						"Rubik One" => "Rubik One",
						"Ruda" => "Ruda",
						"Rufina" => "Rufina",
						"Ruge Boogie" => "Ruge Boogie",
						"Ruluko" => "Ruluko",
						"Rum Raisin" => "Rum Raisin",
						"Ruslan Display" => "Ruslan Display",
						"Russo One" => "Russo One",
						"Ruthie" => "Ruthie",
						"Rye" => "Rye",
						"Sacramento" => "Sacramento",
						"Sail" => "Sail",
						"Salsa" => "Salsa",
						"Sanchez" => "Sanchez",
						"Sancreek" => "Sancreek",
						"Sansita One" => "Sansita One",
						"Sarina" => "Sarina",
						"Satisfy" => "Satisfy",
						"Scada" => "Scada",
						"Schoolbell" => "Schoolbell",
						"Seaweed Script" => "Seaweed Script",
						"Sevillana" => "Sevillana",
						"Seymour One" => "Seymour One",
						"Shadows Into Light" => "Shadows Into Light",
						"Shadows Into Light Two" => "Shadows Into Light Two",
						"Shanti" => "Shanti",
						"Share" => "Share",
						"Share Tech" => "Share Tech",
						"Share Tech Mono" => "Share Tech Mono",
						"Shojumaru" => "Shojumaru",
						"Short Stack" => "Short Stack",
						"Siemreap" => "Siemreap",
						"Sigmar One" => "Sigmar One",
						"Signika" => "Signika",
						"Signika Negative" => "Signika Negative",
						"Simonetta" => "Simonetta",
						"Sintony" => "Sintony",
						"Sirin Stencil" => "Sirin Stencil",
						"Six Caps" => "Six Caps",
						"Skranji" => "Skranji",
						"Slackey" => "Slackey",
						"Smokum" => "Smokum",
						"Smythe" => "Smythe",
						"Sniglet" => "Sniglet",
						"Snippet" => "Snippet",
						"Snowburst One" => "Snowburst One",
						"Sofadi One" => "Sofadi One",
						"Sofia" => "Sofia",
						"Sonsie One" => "Sonsie One",
						"Sorts Mill Goudy" => "Sorts Mill Goudy",
						"Source Code Pro" => "Source Code Pro",
						"Source Sans Pro" => "Source Sans Pro",
						"Special Elite" => "Special Elite",
						"Spicy Rice" => "Spicy Rice",
						"Spinnaker" => "Spinnaker",
						"Spirax" => "Spirax",
						"Squada One" => "Squada One",
						"Stalemate" => "Stalemate",
						"Stalinist One" => "Stalinist One",
						"Stardos Stencil" => "Stardos Stencil",
						"Stint Ultra Condensed" => "Stint Ultra Condensed",
						"Stint Ultra Expanded" => "Stint Ultra Expanded",
						"Stoke" => "Stoke",
						"Strait" => "Strait",
						"Sue Ellen Francisco" => "Sue Ellen Francisco",
						"Sunshiney" => "Sunshiney",
						"Supermercado One" => "Supermercado One",
						"Suwannaphum" => "Suwannaphum",
						"Swanky and Moo Moo" => "Swanky and Moo Moo",
						"Syncopate" => "Syncopate",
						"Tangerine" => "Tangerine",
						"Taprom" => "Taprom",
						"Tauri" => "Tauri",
						"Telex" => "Telex",
						"Tenor Sans" => "Tenor Sans",
						"Text Me One" => "Text Me One",
						"The Girl Next Door" => "The Girl Next Door",
						"Tienne" => "Tienne",
						"Tinos" => "Tinos",
						"Titan One" => "Titan One",
						"Titillium Web" => "Titillium Web",
						"Trade Winds" => "Trade Winds",
						"Trocchi" => "Trocchi",
						"Trochut" => "Trochut",
						"Trykker" => "Trykker",
						"Tulpen One" => "Tulpen One",
						"Ubuntu" => "Ubuntu",
						"Ubuntu Condensed" => "Ubuntu Condensed",
						"Ubuntu Mono" => "Ubuntu Mono",
						"Ultra" => "Ultra",
						"Uncial Antiqua" => "Uncial Antiqua",
						"Underdog" => "Underdog",
						"Unica One" => "Unica One",
						"UnifrakturCook" => "UnifrakturCook",
						"UnifrakturMaguntia" => "UnifrakturMaguntia",
						"Unkempt" => "Unkempt",
						"Unlock" => "Unlock",
						"Unna" => "Unna",
						"VT323" => "VT323",
						"Vampiro One" => "Vampiro One",
						"Varela" => "Varela",
						"Varela Round" => "Varela Round",
						"Vast Shadow" => "Vast Shadow",
						"Vibur" => "Vibur",
						"Vidaloka" => "Vidaloka",
						"Viga" => "Viga",
						"Voces" => "Voces",
						"Volkhov" => "Volkhov",
						"Vollkorn" => "Vollkorn",
						"Voltaire" => "Voltaire",
						"Waiting for the Sunrise" => "Waiting for the Sunrise",
						"Wallpoet" => "Wallpoet",
						"Walter Turncoat" => "Walter Turncoat",
						"Warnes" => "Warnes",
						"Wellfleet" => "Wellfleet",
						"Wendy One" => "Wendy One",
						"Wire One" => "Wire One",
						"Yanone Kaffeesatz" => "Yanone Kaffeesatz",
						"Yellowtail" => "Yellowtail",
						"Yeseva One" => "Yeseva One",
						"Yesteryear" => "Yesteryear",
						"Zeyada" => "Zeyada",
					);


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

$of_options[] = array( 	"name" 		=> "Logo Favicon",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Logo",
						"desc" 		=> "",
						"id" 		=> "logo_fav",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Logo and Favicon Settings.</h3>
						In this section you can upload your own logo and custom favicon!",
						"icon" 		=> true,
						"type" 		=> "info"
				);				
$of_options[] = array( 	"name" 		=> "Logo ",
						"desc" 		=> "Upload your website logo.",
						"id" 		=> "logo",						
						"std" 		=> "",
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Retina Logo ",
						"desc" 		=> "Upload your website retina logo. Your Retina Logo should be twice the size of your normal logo. For example if your normal logo is: 175x35, your retina logo should be: 360x70 pixels. ",
						"id" 		=> "retina_logo",						
						"std" 		=> "",
						"type" 		=> "upload"
				);

$of_options[] = array( 	"name" 		=> "Mobile Logo Upload",
						"desc" 		=> "Optionally you can upload another logo to be used for mobile devices with resolution lower than 830px.",
						"id" 		=> "mobile_logo",						
						"std" 		=> "",
						"type" 		=> "upload"
				);				
				
$of_options[] = array(  "name" => "Enable Custom URL for Logo",
						"desc" => "Enable or Disable the use of custom url for your logo.",
						"id" => "en_custom_logo_url",
						"std" => 0,
						"folds" => 1,
						"type" => "switch");				
				
$of_options[] = array( 	"name" 		=> "Logo Custom URL",
						"desc" 		=> "Enter a custom url (including http://) that will be used when clicking the logo. Leave blank to not use this feature",
						"id" 		=> "custom_logo_url",
						"std" 		=> "",
						"fold"		=> "en_custom_logo_url",
						"type" 		=> "text"
				);				
				
$of_options[] = array(  "name" => "Logo Top Padding",
						"id" => "logo_padding_top",
						"std" 		=> "25",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "100",
						"type" 		=> "sliderui" 
				);	

$of_options[] = array(  "name" => "Logo Bottom Padding",
						"id" => "logo_padding_bottom",
						"std" 		=> "25",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "100",
						"type" 		=> "sliderui" 
				);		

$of_options[] = array(  "name" => "Logo Left Padding",
						"id" => "logo_padding_left",
						"std" 		=> "0",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "100",
						"type" 		=> "sliderui" 
				);
				
$of_options[] = array(  "name" => "Logo Right Padding",
						"id" => "logo_padding_right",
						"std" 		=> "0",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "100",
						"type" 		=> "sliderui" 
				);				
				
$of_options[] = array(  "name" => "Logo Resize",
						"desc" => "Force logo resize to a give value.",
						"id" => "logo_resize",
						"std" => 0,
						"type" => "switch");				

$of_options[] = array( 	"name" 		=> "Logo Resize width",
						"desc" 		=> "Enter the resize width of the logo in pixels. E.g: 200px",
						"id" 		=> "logo_resize_value",
						"std" 		=> "150px",
						"fold" => "logo_resize",
						"type" 		=> "text"
				);
			
				
$of_options[] = array( 	"name" 		=> "Favicon Upload",
						"desc" 		=> "Upload your custom favicon. To generate a favicon you can visit <a href=\"http://tools.dynamicdrive.com/favicon/\" target=\"_blank\">Dynamic Drive</a>",
						"id" 		=> "favicon",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "",
						"type" 		=> "upload"
				);
				
$of_options[] = array( 	"name" 		=> "Text Logo",
						"desc" 		=> "",
						"id" 		=> "text_logos",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Text Logo</h3>
						If no image logo is used, the text logo will be used. The text logo will automatically display your Site Name. To change your Site Name, please go to Settings -> General",
						"icon" 		=> true,
						"type" 		=> "info"
				);	

$of_options[] = array(  "name" => "Text Logo Html Tag",
						"id" => "text_logo_tag",
						"std" => "h1",
						"desc" => "Select the html tag to be used for the text logo.",
						"type" => "select",
						"options" => array("h1" => "H1", "h2" => "H2", "h3" => "H3", "h4" => "H4", "h5" => "H5"));	

$of_options[] = array( 	"name" 		=> "Text Logo Font Size (px)",
						"desc" => "Default is 13",
						"id" => "textlogo_font_size",
						"std" 		=> "24",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "80",
						"type" 		=> "sliderui" 
				);					
				
$of_options[] = array( 	"name" 		=> "Text Logo Color",
						"desc" => "",
						"id" => "text_logo_color",
						"std" => "#21252b",
						"type" => "color" 
				);	

$of_options[] = array( 	"name" 		=> "Text Logo Color on Hover",
						"desc" => "",
						"id" => "text_logo_color_hover",
						"std" => "#99d37c",
						"type" => "color" 
				);	
				
$of_options[] = array( 	"name" 		=> "Tagline",
						"desc" 		=> "",
						"id" 		=> "tagline_field",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Tagline</h3>
						Add or remove your site Tagline. To change your Site Tagline, please go to Settings -> General",
						"icon" 		=> true,
						"type" 		=> "info"
				);	
				
$of_options[] = array(  "name" => "Enable Tagline",
						"desc" => "Enable or Disable the Tagline.",
						"id" => "en_tagline",
						"std" => 0,
						"folds" => 1,
						"type" => "switch");
						
$of_options[] = array( 	"name" 		=> "Tagline Color",
						"desc" => "",
						"id" => "tagline_color",
						"std" => "#dddddd",
						"fold" => "en_tagline",
						"type" => "color" 
				);		
				
$of_options[] = array( 	"name" 		=> "Tagline Font Size (px)",
						"desc" => "Default is 13",
						"id" => "tagline_font_size",
						"std" 		=> "13",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "42",
						"fold"		=> "en_tagline",
						"type" 		=> "sliderui" 
				);																	
$of_options[] = array( 	"name" 		=> "General Settings",
						"type" 		=> "heading"
				);	

$of_options[] = array(  "name" => "Page Loading",
						"desc" 		=> "Enable/disable page loading effect.",
						"id" => "page_load_effect",
						"std" => "1",
						"type" => "switch");

$of_options[] = array(  "name" => "Smooth Scroll",
						"desc" 		=> "Enable/disable smooth scroll effect.",
						"id" => "page_smooth_scroll",
						"std" => "1",
						"type" => "switch");
				
$of_options[] = array( 	"name" 		=> "Header pos",
						"desc" 		=> "",
						"id" 		=> "header_p",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Header Position</h3>Select the position of the Header",
						"icon" 		=> true,
						"type" 		=> "info"
				);		

$of_options[] = array(  "name" => "",
						"id" => "header_position",
						"std" => "Top",
						"type" => "select",
						"options" => array("top" => "Top", "left" => "Left", "right" => "Right"));													

$of_options[] = array( 	"name" 		=> "Site Layout",
						"desc" 		=> "",
						"id" 		=> "layout",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Site Layout</h3>
						Choose the layout for your website.",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array(  "name" => "Site Layout",
						"id" => "site_width",
						"std" => "wide",
						"type" => "select",
						"options" => array("Wide", "Extra Wide", "Boxed"));	
						
$of_options[] = array(  "name" => "Boxed Layout width",
						"id" => "boxed_width",
						"desc" => "Select the width of the Boxed Layout: normal or wide",
						"std" => "normal",
						"type" => "select",
						"options" => array("960px", "1160px"));
						
$of_options[] = array(  "name" => "Featured Images",
						"name" => "How many Featured Images to use",
						"id" => "featured_images_count",
						"std" 		=> "5",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "20",
						"type" 		=> "sliderui" 
				);	
				
$of_options[] = array(  "name" => "Comments on Pages",
						"desc" 		=> "Enable/disable comments on Default Page Template.",
						"id" => "comments_pages",
						"std" => "1",
						"type" => "switch");
						
$of_options[] = array(  "name" => "Search in Posts",
						"desc" 		=> "Include Posts in search results.",
						"id" => "en_search_post",
						"std" => "1",
						"type" => "switch");

$of_options[] = array(  "name" => "Search in Pages",
						"desc" 		=> "Include Pages in search results.",
						"id" => "en_search_page",
						"std" => "1",
						"type" => "switch");
						
$of_options[] = array(  "name" => "Search in Portfolio items",
						"desc" 		=> "Include Portfolio items in search results.",
						"id" => "en_search_portfolio",
						"std" => "1",
						"type" => "switch");						
						
$of_options[] = array(  "name" => "Search in WooCommerce Products",
						"desc" 		=> "Include WooCommerce Products in search results - only if WooCommerce plugin is active.",
						"id" => "en_search_product",
						"std" => "1",
						"type" => "switch");	

$of_options[] = array( 	"name" 		=> "Tracking Code",
						"desc" 		=> "",
						"id" 		=> "track_code",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Tracking Code / Header Code / Body Code</h3>
						Choose the layout for your website.",
						"icon" 		=> true,
						"type" 		=> "info"
				);	

$of_options[] = array( 	"name" 		=> "Visitors Tracking Code",
						"desc" 		=> "Paste here your google analytics or any other visitors tracking code you want to use",
						"id" 		=> "footer_code",
						"std" 		=> "",
						"type" 		=> "textarea"
				);	

$of_options[] = array( 	"name" 		=> "Javascript Code before &lt;/head&gt;",
						"desc" 		=> "Paste here your javascript code that will be rendered before the closing &lt;/head&gt; tag",
						"id" 		=> "header_code",
						"std" 		=> "",
						"type" 		=> "textarea"
				);																																								

$of_options[] = array( 	"name" 		=> "Javascript Code before &lt;/body&gt;",
						"desc" 		=> "Paste here your javascript code that will be rendered before the closing &lt;/body&gt; tag",
						"id" 		=> "body_code",
						"std" 		=> "",
						"type" 		=> "textarea"
				);
						
$of_options[] = array( 	"name" 		=> "Responsiveness",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Site Responsiveness",
						"desc" 		=> "",
						"id" 		=> "resp",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Responsiveness</h3>Choose if you want to enable or disable the responsive layout for the theme.",
						"icon" 		=> true,
						"type" 		=> "info"
				);	
				
$of_options[] = array(  "name" => "",
						"desc" 		=> "Enable/disable site responsiveness.",
						"id" => "responsiveness",
						"std" => "1",
						"type" => "switch");																														

$of_options[] = array( 	"name" 		=> "Typography",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Fonts",
						"desc" 		=> "",
						"id" 		=> "fonts",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Google Fonts Settings</h3>
						Select google fonts for body and headings.",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array(  "name" => "Select Logo and Tagline Font Family",
						"desc" => "Select a font family for text logo and tagline text",
						"id" => "logo_tagline_font",
						"std" => "Open Sans",
						"type" => "select_google_font",
						"preview" => array(
									"text" => "This is a preview for the Logo and Tagline", 
									"size" => "13px"
						),
						"options" => $google_fonts);								
$of_options[] = array(  "name" => "Select Body Font Family",
						"desc" => "Select a font family for body text",
						"id" => "body_font",
						"std" => "Open Sans",
						"type" => "select_google_font",
						"preview" => array(
									"text" => "This is a preview for the Body Font Family", 
									"size" => "13px"
						),
						"options" => $google_fonts);
													
$of_options[] = array(  "name" => "Select Headings Font Family",
						"desc" => "Select a font family for headings",
						"id" => "heading_font",
						"std" => "Open Sans",
						"type" => "select_google_font",
						"preview" => array(
									"text" => "This is a preview for the Headings Font Family", 
									"size" => "13px"
						),
						"options" => $google_fonts);
						
$of_options[] = array(  "name" => "Sidebar Headings Font Family",
						"desc" => "Select a font family for the sidebar headings",
						"id" => "side_heading_font",
						"std" => "Open Sans",
						"type" => "select_google_font",
						"preview" => array(
									"text" => "This is a preview for the Sidebar Headings Font Family", 
									"size" => "13px"
						),
						"options" => $google_fonts);	
						

$of_options[] = array(  "name" => "Header Menu Font Family",
						"desc" => "Select a font family for the header menu",
						"id" => "menu_font_family",
						"std" => "Open Sans",
						"type" => "select_google_font",
						"preview" => array(
									"text" => "HOME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PAGES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SHORTCODES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; CONTACT",									
									"size" => "13px"
						),
						"options" => $google_fonts);
						
$of_options[] = array(  "name" => "Top Bar Menu Font Family",
						"desc" => "Select a font family for the top menu",
						"id" => "tm_font_family",
						"std" => "Open Sans",
						"type" => "select_google_font",
						"preview" => array(
									"text" => "This is a preview for the Top Menu", 
									"size" => "13px"
						),
						"options" => $google_fonts);						
						
$of_options[] = array( 	"name" 		=> "Google Character Sets",
						"desc" 		=> "Adjust the settings to load different character sets. More character sets equals to slower page load. Possible options are: latin, latin-ext, cyrillic, cyrillic-ext, greek, greek-ext, vietnamese",
						"id" 		=> "ggl_character_sets",
						"std" 		=> "latin",
						"type" 		=> "text"
				);	
				
$of_options[] = array( 	"name" 		=> "Google Fonts Weight",
						"desc" 		=> "Adjust the settings to load different font weight. More font weights equals to slower page load. Possible options are: 300,400,400italic,500,600,700,700italic,800,900",
						"id" 		=> "ggl_font_weight",
						"std" 		=> "400,400italic,700,700italic",
						"type" 		=> "text"
				);	
				
$of_options[] = array( 	"name" 		=> "Custom Font",
						"desc" 		=> "",
						"id" 		=> "c_fonts",
						"std" 		=> "<h3 style=\"margin: 0;\">Custom Font</h3>This will overide the google fonts.",
						"icon" 		=> true,
						"type" 		=> "info"
				);				

$of_options[] = array(  "name" => "Custom Font .woff",
						"desc" => "Upload here the .woff font file.",
						"id" => "custom_woff",
						"std" => "",
						"mod" => "yes",
						"type" => "upload");	
						
$of_options[] = array(  "name" => "Custom Font .ttf",
						"desc" => "Upload here the .ttf font file.",
						"id" => "custom_ttf",
						"std" => "",
						"mod" => "yes",
						"type" => "media");	
						
$of_options[] = array(  "name" => "Custom Font .svg",
						"desc" => "Upload here the .svg font file.",
						"id" => "custom_svg",
						"std" => "",
						"mod" => "yes",
						"type" => "media");	
						
$of_options[] = array(  "name" => "Custom Font .eot",
						"desc" => "Upload here the .eot font file.",
						"id" => "custom_eot",
						"std" => "",
						"mod" => "yes",
						"type" => "media");	
							
						
$of_options[] = array( 	"name" 		=> "Choose where to use your Custom Font",
						"desc" 		=> "Use for Body Font",
						"id" 		=> "custom_body",
						"std" 		=> 0,
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"desc" 		=> "Use for Text Logo and tagline",
						"id" 		=> "custom_logo_tagline",
						"std" 		=> 0,
						"type" 		=> "switch"
				);				
$of_options[] = array( 	"desc" 		=> "Use for Header Menu",
						"id" 		=> "custom_menu",
						"std" 		=> 0,
						"type" 		=> "switch"
				);	
				
$of_options[] = array( 	"desc" 		=> "Use for Top Bar Menu",
						"id" 		=> "custom_top_menu",
						"std" 		=> 0,
						"type" 		=> "switch"
				);				
				
$of_options[] = array( 	"desc" 		=> "Use for Headings",
						"id" 		=> "custom_heading",
						"std" 		=> 0,
						"type" 		=> "switch"
				);	
							

$of_options[] = array( 	"desc" 		=> "Use on Sidebar Headings",
						"id" 		=> "custom_sidebar",
						"std" 		=> 0,
						"type" 		=> "switch"
				);																						

$of_options[] = array( 	"name" 		=> "Fonts Sizes",
						"desc" 		=> "",
						"id" 		=> "fonts",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Fonts Sizes</h3>
						Select google fonts for body and headings.",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array( 	"name" 		=> "Body Font Line Height",
						"id" => "body_line_height",
						"std" => "22px",
						"type" => "text",
						"desc" => "Enter the line height for the Body font."
						);	
				
$of_options[] = array( 	"name" 		=> "Body Font Size (px)",
						"desc" => "Default is 13",
						"id" => "font_size",
						"std" 		=> "13",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "42",
						"type" 		=> "sliderui" 
				);	

$of_options[] = array(  "name" => "Body Font Weight",
						"id" => "body_font_weight",
						"desc" => "Select the font weight for the body. Make sure you also set the correct values under Google Fonts Weight option above.",
						"std" => "400",
						"type" => "select",
						"options" => array(300,400,500, 600,700,800,900));												
						
$of_options[] = array(  "name" => "Header Menu Font Size(px)",
						"id" => "menu_font_size",
						"std" 		=> "13",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "40",
						"type" 		=> "sliderui" 
				);

$of_options[] = array(  "name" => "Header SubMenu Font Size(px)",
						"id" => "submenu_font_size",
						"std" 		=> "13",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "40",
						"type" 		=> "sliderui" 
				);	

$of_options[] = array(  "name" => "Header SubMenu Line Height(px)",
						"id" => "submenu_line_height",
						"std" 		=> "35",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "80",
						"type" 		=> "sliderui" 
				);								

$of_options[] = array(  "name" => "Header Menu Font Weight - First Level only",
						"id" => "menu_font_weight",
						"std" => "400",
						"type" => "select",
						"options" => array(300,400,500, 600,700,800,900));
						
$of_options[] = array( 	"name" 		=> "Header Menu Letter Spacing",
						"id" => "menu_letter_spacing",
						"std" => "0",
						"type" => "text",
						"desc" => "Enter a value for letter spacing."
						);							

				
$of_options[] = array(  "name" => "Top Bar Menu Font Size(px)",
						"id" => "tm_font_size",
						"std" 		=> "12",
						"desc" => "Default is 12",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "40",
						"type" 		=> "sliderui" 
				);		

$of_options[] = array(  "name" => "Top Bar Contact Info Font Size(px)",
						"id" => "tb_contact_font_size",
						"std" 		=> "12",
						"desc" => "Default is 12",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "40",
						"type" 		=> "sliderui" 
				);	
				
$of_options[] = array(  "name" => "Page Title Font Size(px)",
						"id" => "page_title_font_size",
						"std" 		=> "18",
						"desc" => "Default is 18",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "60",
						"type" 		=> "sliderui" 
				);
				
$of_options[] = array(  "name" => "Page Title SubHeading Font Size(px)",
						"id" => "page_title_subheading_font_size",
						"std" 		=> "13",
						"desc" => "Default is 13",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "60",
						"type" 		=> "sliderui" 
				);														
				
$of_options[] = array( 	"name" 		=> "Sidebar Heading Font Size (px)",
						"desc" => "Default is 14",
						"id" => "side_font_size",
						"std" 		=> "14",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "40",
						"type" 		=> "sliderui" 
				);		

$of_options[] = array(  "name" => "Sidebar Heading Font Weight",
						"id" => "side_font_weight",
						"std" => "600",
						"type" => "select",
						"options" => array(300,400,500, 600,700,800,900));
				
$of_options[] = array( 	"name" 		=> "Footer Sidebar Heading Font Size (px)",
						"desc" => "Default is 14",
						"id" => "footer_side_font_size",
						"std" 		=> "14",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "40",
						"type" 		=> "sliderui" 
				);

$of_options[] = array( 	"name" 		=> "Footer Widgets Font Size (px)",
						"desc" => "Default is 14",
						"id" => "footer_widgets_font_size",
						"std" 		=> "14",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "40",
						"type" 		=> "sliderui" 
				);	

$of_options[] = array( 	"name" 		=> "Footer Copyright Font Size (px)",
						"desc" => "Default is 14",
						"id" => "footer_copyright_font_size",
						"std" 		=> "14",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "40",
						"type" 		=> "sliderui" 
				);											
				
$of_options[] = array( 	"name" 		=> "Heading Font Size H1 (px)",
						"desc" => "Default is 36",
						"id" => "h1_font_size",
						"std" 		=> "36",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "60",
						"type" 		=> "sliderui" 
				);
				
$of_options[] = array( 	"name" 		=> "Heading Font Size H2 (px)",
						"desc" => "Default is 30",
						"id" => "h2_font_size",
						"std" 		=> "30",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "60",
						"type" 		=> "sliderui" 
				);
				
$of_options[] = array( 	"name" 		=> "Heading Font Size H3 (px)",
						"desc" => "Default is 24",
						"id" => "h3_font_size",
						"std" 		=> "24",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "60",
						"type" 		=> "sliderui" 
				);
				
$of_options[] = array( 	"name" 		=> "Heading Font Size H4 (px)",
						"desc" => "Default is 18",
						"id" => "h4_font_size",
						"std" 		=> "18",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "60",
						"type" 		=> "sliderui" 
				);
				
$of_options[] = array( 	"name" 		=> "Heading Font Size H5 (px)",
						"desc" => "Default is 14",
						"id" => "h5_font_size",
						"std" 		=> "14",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "60",
						"type" 		=> "sliderui" 
				);
				
$of_options[] = array( 	"name" 		=> "Heading Font Size H6 (px)",
						"desc" => "Default is 12",
						"id" => "h6_font_size",
						"std" 		=> "12",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "60",
						"type" 		=> "sliderui" 
				);
				
$of_options[] = array(  "name" => "H1, H2, H3, H4, H5, H6 Font Weight",
						"id" => "headings_font_weight",
						"std" => "400",
						"type" => "select",
						"options" => array(300,400,500,600,700,800,900));
						
$of_options[] = array(  "name" => "H1, H2, H3, H4, H5, H6 Margin Bottom",
						"id" => "headings_margin_bottom",
						"std" 		=> "10",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "60",
						"type" 		=> "sliderui"
				);																																
					
$of_options[] = array(  "name" => "Paragraph tag: < p > Margin Bottom",
						"id" => "paragraph_margin_bottom",
						"std" 		=> "20",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "60",
						"type" 		=> "sliderui"
				);								
				
$of_options[] = array( 	"name" 		=> "Fonts Color",
						"desc" 		=> "",
						"id" 		=> "fonts",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Fonts Colors</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);								
				
$of_options[] = array( 	"name" 		=> "Body Font Color",
						"desc" => "Default is #666666",
						"id" => "font_color",
						"std" => "#666666",
						"type" => "color" 
				);													

$of_options[] = array( 	"name" 		=> "Basic Design",
						"type" 		=> "heading"
				);
					
																					

						
$of_options[] = array( 	"name" 		=> "Boxed Layout Styling",
						"desc" 		=> "",
						"id" 		=> "boxed_style",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Boxed Layout Styling</h3>
						The settings bellow will only affect the Boxed Layout style.",
						"icon" 		=> true,
						"type" 		=> "info"
				);	
				
$of_options[] = array(  "name" => "Outer Shadow",
						"desc" 		=> "Enable/disable outer shadow.",
						"id" => "outer_shadow",
						"std" => "0",
						"type" => "switch");	
						
$of_options[] = array( 	"name" 		=> "Margin Top / Bottom",
						"desc" => "Default is 20",
						"id" => "margin_all",
						"std" 		=> "20",
						"min" 		=> "0",
						"step"		=> "5",
						"max" 		=> "50",
						"type" 		=> "sliderui" 
				);	
				
$of_options[] = array( 	"name" 		=> "Outer Padding",
						"desc" => "Default is 0",
						"id" => "padding_out",
						"std" 		=> "0",
						"min" 		=> "0",
						"step"		=> "5",
						"max" 		=> "50",
						"type" 		=> "sliderui" 
				);																	
				
$of_options[] = array(  "name" => "Outer Border Style",
						"desc" => "Select the outer border style.",
						"id" => "outer_border_type",
						"std" => "solid",
						"type" => "select",
						"options" => array("dotted","dashed","solid","double","groove","inset","outset","ridge"));	
						
$of_options[] = array(  "name" => "Outer Border Width",
						"desc" => "Select the outer border width.",
						"id" => "outer_border",
						"std" 		=> "0",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "8",
						"type" 		=> "sliderui" 
				);						
						
$of_options[] = array( 	"name" 		=> "Outer Border Color",
						"desc" => "Default is #ECECEC",
						"id" => "outer_border_color",
						"std" => "#ECECEC",
						"type" => "color" 
				);	
				
$of_options[] = array( 	"name" 		=> "Outer Background",
						"desc" 		=> "Upload an image or new pattern for the background.",
						"id" 		=> "boxed_bg",						
						"std" 		=> "",
						"type" 		=> "upload"
				);	
				
$of_options[] = array(  "name" => "Outer Background Repeat",
						"id" => "bg_repeat",
						"std" => "no-repeat",
						"type" => "select",
						"options" => array("no-repeat","repeat-x","repeat-y","repeat"));
						
$of_options[] = array(  "name" => "Outer Background Attachment",
						"desc" 		=> "Select Fixed to keep the background fixed in place on user scroll.",
						"id" => "bg_attachment",
						"std" => "fixed",
						"type" => "select",
						"options" => array("scroll","fixed"));												
				
$of_options[] = array(  "name" => "Fullscreen Background",
						"desc" 		=> "Enable/disable fullscreen background.",
						"id" => "bg_fullscreen",
						"std" => "0",						
						"type" => "switch");
						
$of_options[] = array(  "name" => "Enable Parallax",
						"desc" 		=> "Enable/disable parallax background.",
						"id" => "en_parallax",
						"std" => "0",						
						"type" => "switch");							
						
$of_options[] = array(  "name" => "Use Patterns",
						"desc" 		=> "Enable/disable background patterns (if enabled, the patterns will overide the background image settings.",
						"id" => "enable_pattern",
						"std" => "0",
						"folds" => 1,
						"type" => "switch");
						
$of_options[] = array( 	"name" 		=> "Background Pattern",
						"desc" 		=> "Select a background pattern.",
						"id" 		=> "pattern",
						"std" 		=> $bg_images_url."pattern1.png",
						"type" 		=> "tiles",
						"fold" 		=> "enable_pattern",
						"options" 	=> array(
						"pattern1" => get_template_directory_uri()."/images/pattern/pattern1.png",
						"pattern2" => get_template_directory_uri()."/images/pattern/pattern2.png",
						"pattern3" => get_template_directory_uri()."/images/pattern/pattern3.png",
						"pattern4" => get_template_directory_uri()."/images/pattern/pattern4.png",
						"pattern5" => get_template_directory_uri()."/images/pattern/pattern5.png",
						"pattern6" => get_template_directory_uri()."/images/pattern/pattern6.png",
						"pattern7" => get_template_directory_uri()."/images/pattern/pattern7.png",
						"pattern8" => get_template_directory_uri()."/images/pattern/pattern8.png",
						"pattern9" => get_template_directory_uri()."/images/pattern/pattern9.png",
						"pattern10" => get_template_directory_uri()."/images/pattern/pattern10.png",
						"pattern11" => get_template_directory_uri()."/images/pattern/pattern11.png",
						"pattern12" => get_template_directory_uri()."/images/pattern/pattern12.png",
						"pattern13" => get_template_directory_uri()."/images/pattern/pattern13.png",
						"pattern14" => get_template_directory_uri()."/images/pattern/pattern14.png",
						"pattern15" => get_template_directory_uri()."/images/pattern/pattern15.png",
						"pattern16" => get_template_directory_uri()."/images/pattern/pattern16.png",
						"pattern17" => get_template_directory_uri()."/images/pattern/pattern17.png",
						"pattern18" => get_template_directory_uri()."/images/pattern/pattern18.png",
						"pattern19" => get_template_directory_uri()."/images/pattern/pattern19.png",
						"pattern20" => get_template_directory_uri()."/images/pattern/pattern20.png",
						"pattern21" => get_template_directory_uri()."/images/pattern/pattern21.png",
						"pattern22" => get_template_directory_uri()."/images/pattern/pattern22.png",
						"pattern23" => get_template_directory_uri()."/images/pattern/pattern23.png",
						"pattern24" => get_template_directory_uri()."/images/pattern/pattern24.png",
						"pattern25" => get_template_directory_uri()."/images/pattern/pattern25.png"
				));
				
$of_options[] = array(  "name" =>  "Outer Background Color",
						"desc" => "",
						"id" => "body_bg_color",
						"std" => "#ffffff",
						"type" => "color");		
						
$of_options[] = array(  "name" =>  "Inner Background Color",
						"desc" => "",
						"id" => "body_bg_color_inside",
						"std" => "#ffffff",
						"type" => "color");										
																									
				
$of_options[] = array( 	"name" 		=> "Colors",
						"type" 		=> "heading"
				);

$of_options[] = array(  "name" => "Predefined Color Scheme",
						"desc" => "",
						"id" => "color_scheme",
						"std" => "Light Red",
						"type" => "select",
						"options" => array( 'green' => 'Green',
											'blue' => 'Blue',  
											'red' => 'Red',  
											'yellow' => 'Yellow',
											'purple' => 'Purple',
											'grey' => 'Grey',
											'black' => 'Black'
									 ));
				
$of_options[] = array(  "name" =>  "Link Color",
						"desc" => "",
						"id" => "primary_color",
						"std" => "#333333",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Link Color on Hover",
						"desc" => "",
						"id" => "primary_color_hover",
						"std" => "#5bc98c",
						"type" => "color");	

/*						
$of_options[] = array(  "name" =>  "Second Link Color",
						"desc" => "",
						"id" => "second_link_color",
						"std" => "#E1F4C6",
						"type" => "color");	
*/						

$of_options[] = array(  "name" =>  "Image Hover Color - Potfolio &amp; Blog Items",
						"desc" => "",
						"id" => "pb_hover_color",
						"std" => "#5bc98c",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Shortcodes Default Color",
						"desc" => "",
						"id" => "shortcode_color",
						"std" => "#5bc98c",
						"type" => "color");	

$of_options[] = array( 	"name" 		=> "Custom Colors",
						"desc" 		=> "",
						"id" 		=> "layout",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Custom Colors</h3>
						If you modify the colors above and need to keep them saved after you select a new color system use the options bellow to save your values (each field above has a correspondent below).",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array( 	"name" 		=> "Custom Colors",
						"desc" 		=> "Enable custom colors pattern -  this will overide the color system selected above",
						"id" 		=> "use_custom",
						"std" 		=> 0,
						"folds" => 1,
						"type" 		=> "switch"
				);				
				
$of_options[] = array(  "name" =>  "Custom Primary Link Color",
						"desc" => "",
						"id" => "custom_primary_color",
						"fold" => "use_custom",
						"std" => "#58A623",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Custom Second Link Color",
						"desc" => "",
						"id" => "custom_second_link_color",
						"fold" => "use_custom",
						"std" => "#E1F4C6",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Custom Image Hover Color - Potfolio &amp; Blog Items",
						"desc" => "",
						"id" => "custom_pb_hover_color",
						"fold" => "use_custom",
						"std" => "#b4e56b",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Custom Shortcodes Default Color",
						"desc" => "",
						"id" => "custom_shortcode_color",
						"fold" => "use_custom",
						"std" => "#a0ce4e",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Custom Button Border Color",
						"desc" => "",
						"id" => "custom_button_border_color",
						"fold" => "use_custom",
						"std" => "#95b959",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Custom Button Gradient Color (Top)",
						"desc" => "",
						"id" => "custom_button_gradient_top_color",
						"fold" => "use_custom",
						"std" => "#cae387",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Custom Button Gradient Color (Bottom)",
						"desc" => "",
						"id" => "custom_button_gradient_bottom_color",
						"fold" => "use_custom",
						"std" => "#a5cb5e",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Custom Button Text Color",
						"desc" => "",
						"id" => "custom_button_text_color",
						"fold" => "use_custom",
						"std" => "#5A742D",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Custom Button Text Shadow Color",
						"desc" => "",
						"id" => "custom_button_text_shadow_color",
						"fold" => "use_custom",
						"std" => "#DFF4BC",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Custom Footer Widget Link Color",
						"desc" => "",
						"id" => "custom_footer_widget_link_color",
						"fold" => "use_custom",
						"std" => "#77b31d",
						"type" => "color");				

$of_options[] = array( 	"name" 		=> "Top Bar",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> " Top Bar",
						"desc" 		=> "",
						"id" 		=> "header_pos",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Header Top Bar</h3>Add a top bar, above the Header section.",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array(  "name" => "Enable Top Bar",
						"desc" 		=> "Enable/disable top bar.",
						"id" => "en_top_bar",
						"std" => "1",
						"folds" => 1,
						"type" => "switch");  
						
$of_options[] = array(  "name" => "Top Bar Left Content",
						"fold" => "en_top_bar",
						"desc" => "Select what to display in the left position of the Top Bar",
						"id" => "tb_left_content",
						"std" => "contactinfo",
						"type" => "select",
						"options" => array('contactinfo' => 'Contact Info', 'socialinks' => 'Social Links', 'nav' => 'Top Menu', 'empty' => 'Leave Empty'));	
						
$of_options[] = array(  "name" => "Top Bar Right Content",
						"desc" => "Select what to display in the right position of the Top Bar",
						"fold" => "en_top_bar",
						"id" => "tb_right_content",
						"std" => "socialinks",
						"type" => "select",
						"options" => array('contactinfo' => 'Contact Info', 'socialinks' => 'Social Links', 'nav' => 'Top Menu', 'empty' => 'Leave Empty'));														
						
$of_options[] = array(  "name" =>  "Top Bar Background Color",
						"desc" => "",
						"id" => "top_bar_bg",
						"std" => "#000",
						"fold" => "en_top_bar",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Top Bar Bottom Border Color",
						"desc" => "",
						"id" => "top_bar_border",
						"std" => "#444",
						"fold" => "en_top_bar",
						"type" => "color");							
						
$of_options[] = array(  "name" => "Top Bar Social Icons Color",
						"id" => "top_bar_social_color",
						"std" => "#eeeeee",
						"type" => "color",
						"fold" => "en_top_bar"
						);
						
						
$of_options[] = array( 	"name" 		=> "Top Bar Icons Opacity - in percents",
						"desc" => "Default opacity: 60%",
						"id" => "social_icons_opacity",
						"std" 		=> "60",
						"min" 		=> "10",
						"step"		=> "5",
						"max" 		=> "100",
						"fold" => "en_top_bar",
						"type" 		=> "sliderui" 
						);	
						
$of_options[] = array( 	"name" 		=> " Top Bar Menu",
						"desc" 		=> "",
						"id" 		=> "tb_mn",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Top Bar Menu</h3>Change the appearance of the Top Menu",
						"icon" 		=> true,
						"fold"		=> "en_top_bar",
						"type" 		=> "info"
				);		
				
$of_options[] = array(  "name" =>  "Top Menu Link Color",
						"desc" => "",
						"id" => "tm_link_color",
						"std" => "#999999",
						"fold" => "en_top_bar",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Top Menu Link Color on Hover",
						"desc" => "",
						"id" => "tm_link_color_hover",
						"std" => "#5bc98c",
						"fold" => "en_top_bar",
						"type" => "color");	
						
$of_options[] = array(  "name" => "Top Menu Separator",
						"desc" 		=> "Enable/disable top menu separator.",
						"id" => "tm_separator",
						"std" => "1",
						"fold" => "en_top_bar",
						"type" => "switch");							
						
$of_options[] = array(  "name" =>  "Top Menu Separator Color",
						"desc" => "",
						"id" => "tm_separator_color",
						"std" => "#f2f2f2",
						"fold" => "en_top_bar",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Sub Menu Link Color",
						"desc" => "",
						"id" => "tm_sub_menu_link",
						"std" => "#545454",
						"fold" => "en_top_bar",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Sub Menu Link Color on Hover",
						"desc" => "",
						"id" => "tm_sub_menu_link_hover",
						"std" => "#000000",
						"fold" => "en_top_bar",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Sub Menu Link Background Color",
						"desc" => "",
						"id" => "tm_sub_menu_bg",
						"std" => "#ffffff",
						"fold" => "en_top_bar",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Sub Menu Link Background Color on Hover",
						"desc" => "",
						"id" => "tm_sub_menu_bg_hover",
						"std" => "#ffffff",
						"fold" => "en_top_bar",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Sub Menu Bottom Separator Color",
						"desc" => "",
						"id" => "tm_sm_separator_color",
						"std" => "#eeeeee",
						"fold" => "en_top_bar",
						"type" => "color");

						/*
$of_options[] = array( 	"name" 		=> "Top Menu Separator Symbol",
						"desc" 		=> "Default is: |",
						"id" 		=> "tm_separator_symbol",
						"std" 		=> "|",
						"fold"		=> "en_top_bar",
						"type" 		=> "text"
				);																															
						*/
$of_options[] = array( 	"name" 		=> "Contact",
						"desc" 		=> "",
						"id" 		=> "header_pos",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Contact Info</h3>",
						"icon" 		=> true,
						//"fold"		=> "en_top_bar",
						"type" 		=> "info"
				);		
				
$of_options[] = array( 	"name" 		=> "Contact Email",
						"desc" 		=> "Enter your contact email.",
						"id" 		=> "contact_email",
						"std" 		=> "hello@yoursite.com",
						//"fold"		=> "en_top_bar",
						"type" 		=> "text"
				);	
				
$of_options[] = array( 	"name" 		=> "Phone Number",
						"desc" 		=> "Enter your phone number.",
						"id" 		=> "contact_phone",
						"std" 		=> "+1 650-253-0000",
						//"fold"		=> "en_top_bar",
						"type" 		=> "text"
				);	

$of_options[] = array( 	"name" 		=> "Contact Address",
						"desc" 		=> "Enter your address.",
						"id" 		=> "contact_address",
						"std" 		=> "",
						//"fold"		=> "en_top_bar",
						"type" 		=> "text"
				);	
				
$of_options[] = array(  "name" => "Enable Tap to Call Button",
						"desc" 		=> "Enable/disable a tap to call button, on mobile devices with a resolution lower than 767px.",
						"id" => "en_tap_call",
						"std" => "0",
						//"fold"		=> "en_top_bar",
						"folds" => 1,
						"type" => "switch");
						
$of_options[] = array( 	"name" 		=> "Tap to Call text on button",
						"desc" 		=> "Enter the text you want to appear on the button.",
						"id" 		=> "tap_call_text",
						"std" 		=> "Give us a Call Now!",
						"fold"		=> "en_tap_call",
						"type" 		=> "text"
				);																							

$of_options[] = array(  "name" =>  "Contact text Color",
						"desc" => "",
						"id" => "contact_text",
						"std" => "#999999",
						//"fold" => "en_top_bar",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Contact link Color",
						"desc" => "",
						"id" => "contact_link",
						"std" => "#999999",
						//"fold" => "en_top_bar",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Contact link Color on Hover",
						"desc" => "",
						"id" => "contact_link_hover",
						"std" => "#5bc98c",
						//"fold" => "en_top_bar",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Separator Color",
						"desc" => "",
						"id" => "top_bar_separator",
						"std" => "#999999",
						//"fold" => "en_top_bar",
						"type" => "color");	

$of_options[] = array(  "name" => "Separator Style",						
						"desc" => "Select the style of the separator",
						"id" => "top_bar_separator_style",
						"std" => "contactinfo",
						"type" => "select",
						"options" => array('dotted' => 'Dotted', 'solid' => 'Solid'));							

$of_options[] = array( 	"name" 		=> "Header Top",
						"type" 		=> "heading"
				);
				
$of_options[] = array(  "name" => "Sticky Header",
						"desc" 		=> "Enable/disable the Sticky Header.",
						"id" => "enable_sticky",
						"std" => "1",
						"type" => "switch");

$of_options[] = array(  "name" => "Header Resize on scroll",
						"desc" 		=> "Enable/disable Sticky Resize on user scroll.",
						"id" => "header_resize",
						"std" => "0",
						"folds" => 1,
						"type" => "switch");

$of_options[] = array(  "name" => "Resize Factor (%)",
						"id" => "resize_factor",
						"std" 		=> "30",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "90",
						"desc" 		=> "Select the resize factor in percent. Higher values will resize the header more.",
						"type" 		=> "sliderui",
						"fold" => "header_resize" 
				);	

$of_options[] = array(  "name" => "Sticky Menu - Modern Header",
						"desc" 		=> "Enable/disable Sticky Menu for Modern Header only. Disable the Sticky Header option above.",
						"id" => "enable_sticky_menu_modern",
						"std" => "0",
						"type" => "switch");
						
$of_options[] = array(  "name" => "Sticky Menu on Mobile",
						"desc" 		=> "Enable/disable the Sticky Menu on Mobile Devices.",
						"id" => "sticky_mobile_menu",
						"std" => "1",
						"type" => "switch");						
						
$of_options[] = array(  "name" => "Sticky Header Background Opacity (%)",
						"id" => "sticky_header_opacity",
						"std" 		=> "100",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "100",
						"desc" 		=> "Select the opacity of the Sticky Header Background in percent. A lower value will make the sticky header more transparent - select 0 to make the Sticky Header fully transparent.",
						"type" 		=> "sliderui" 
				);											
/*
$of_options[] = array( 	"name" 		=> "Header Section Position",
						"desc" 		=> "",
						"id" 		=> "header_pos2",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Header Section Position</h3>Select the position of the header: Top, Left or Right",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array(  "name" => "",
						"id" => "header_position",
						"std" => "Top",
						"type" => "select",
						"options" => array("top" => "Top", "left" => "Left", "right" => "Right"));				
*/
					
$of_options[] = array( 	"name" 		=> "Header Style",
						"desc" 		=> "",
						"id" 		=> "header_pos",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Header Style</h3>Select the style you want to use for the header",
						"icon" 		=> true,
						"type" 		=> "info"
				);	
				
$of_options[] = array(  "name" => "",
						"id" => "header_style",
						"std" => "Default",
						"type" => "select",
						"options" => array("style1" => "Normal","style2" => "Modern"));	
						
$of_options[] = array( 	"name" 		=> "Header W",
						"desc" 		=> "",
						"id" 		=> "header_w",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Header Width</h3>Select the width of your header",
						"icon" 		=> true,
						"type" 		=> "info"
				);	
				
$of_options[] = array(  "name" => "",
						"id" => "header_width",
						"std" => "Default",
						"type" => "select",
						"options" => array("normal" => "Normal","expanded" => "Expanded"));																											
				
$of_options[] = array( 	"name" 		=> "Header Pos",
						"desc" 		=> "",
						"id" 		=> "header_pos",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Header Elements Positioning</h3>Select how the header logo and menu will be displayed: normal or centered!",
						"icon" 		=> true,
						"type" 		=> "info"
				);	
				
$of_options[] = array(  "name" => "",
						"id" => "header_el_pos",
						"std" => "normal",
						"type" => "select",
						"options" => array("normal" => "Normal","center" => "Centered"));							
				
$of_options[] = array( 	"name" 		=> "Header Styling",
						"desc" 		=> "",
						"id" 		=> "header_styling",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Header Styling</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array(  "name" => "Header Search Icon",
						"desc" 		=> "Enable/disable header search icon.",
						"id" => "header_search_icon",
						"std" => "1",
						"type" => "switch");				
				
$of_options[] = array(  "name" => "Header Bottom Shadow",
						"desc" 		=> "Enable/disable header bottom shadow.",
						"id" => "header_bottom_shadow",
						"std" => "1",
						"type" => "switch");		

$of_options[] = array(  "name" => "Header Bottom Border",
						"id" => "header_bottom_border",
						"std" 		=> "0",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "10",
						"desc" 		=> "Select the width in pixels for the bottom border of the header area",
						"type" 		=> "sliderui" 
				);	

$of_options[] = array(  "name" =>  "Header Bottom Border Color",
						"desc" => "",
						"id" => "header_bottom_border_color",
						"std" => "#f2f2f2",
						"type" => "color");																		
				
$of_options[] = array(  "name" => "Use Patterns",
						"desc" 		=> "Enable/disable patterns.",
						"id" => "en_header_pattern",
						"std" => "0",
						"folds" => 1,
						"type" => "switch");
						
$of_options[] = array( 	"name" 		=> "Background Pattern",
						"desc" 		=> "Select a background pattern for the header.",
						"id" 		=> "header_patterns",
						"std" 		=> $bg_images_url."pattern10.png",
						"type" 		=> "tiles",
						"fold" 		=> "en_header_pattern",
						"options" 	=> array(
						"pattern1" => get_template_directory_uri()."/images/pattern/pattern1.png",
						"pattern2" => get_template_directory_uri()."/images/pattern/pattern2.png",
						"pattern3" => get_template_directory_uri()."/images/pattern/pattern3.png",
						"pattern4" => get_template_directory_uri()."/images/pattern/pattern4.png",
						"pattern5" => get_template_directory_uri()."/images/pattern/pattern5.png",
						"pattern6" => get_template_directory_uri()."/images/pattern/pattern6.png",
						"pattern7" => get_template_directory_uri()."/images/pattern/pattern7.png",
						"pattern8" => get_template_directory_uri()."/images/pattern/pattern8.png",
						"pattern9" => get_template_directory_uri()."/images/pattern/pattern9.png",
						"pattern10" => get_template_directory_uri()."/images/pattern/pattern10.png",
						"pattern11" => get_template_directory_uri()."/images/pattern/pattern11.png",
						"pattern12" => get_template_directory_uri()."/images/pattern/pattern12.png",
						"pattern13" => get_template_directory_uri()."/images/pattern/pattern13.png",
						"pattern14" => get_template_directory_uri()."/images/pattern/pattern14.png",
						"pattern15" => get_template_directory_uri()."/images/pattern/pattern15.png",
						"pattern16" => get_template_directory_uri()."/images/pattern/pattern16.png",
						"pattern17" => get_template_directory_uri()."/images/pattern/pattern17.png",
						"pattern18" => get_template_directory_uri()."/images/pattern/pattern18.png",
						"pattern19" => get_template_directory_uri()."/images/pattern/pattern19.png",
						"pattern20" => get_template_directory_uri()."/images/pattern/pattern20.png",
						"pattern21" => get_template_directory_uri()."/images/pattern/pattern21.png",
						"pattern22" => get_template_directory_uri()."/images/pattern/pattern22.png",
						"pattern23" => get_template_directory_uri()."/images/pattern/pattern23.png",
						"pattern24" => get_template_directory_uri()."/images/pattern/pattern24.png",
						"pattern25" => get_template_directory_uri()."/images/pattern/pattern25.png",
					));
					
$of_options[] = array( 	"name" 		=> "Header Custom Background",
						"desc" 		=> "Upload an image or new pattern for the background of the header.",
						"id" 		=> "header_bg_image",						
						"std" 		=> "",
						"type" 		=> "upload"
				);	
				
$of_options[] = array(  "name" => "Header Custom Background Repeat",
						"id" => "header_bg_repeat",
						"std" => "no-repeat",
						"type" => "select",
						"options" => array("no-repeat","repeat-x","repeat-y","repeat"));					
				
$of_options[] = array(  "name" =>  "Header Background Color",
						"desc" => "",
						"id" => "header_bg_color",
						"std" => "#ffffff",
						"type" => "color");	

$of_options[] = array( 	"name" 		=> "Header Menu",
						"desc" 		=> "",
						"id" 		=> "header_menu",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Header Menu</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);	
/*				
$of_options[] = array(  "name" => "Header Menu Style",
						"id" => "header_menu_style",
						"std" => "new-style",
						"type" => "select",
						"options" => array("old-style" => "Old Style","new-style" => "New Style"));				
*/

$of_options[] = array(  "name" => "Header SubMenu Width",
						"desc" 		=> "Enter the width of the submenu items in pixels. Default: 165px",
						"id" => "sub_menu_width",
						"std" => "165px",
						"type" => "text");						

$of_options[] = array(  "name" => "Header Menu Margin Top",
						"desc" 		=> "Use this option to add a top margin to the navigation. Useful if you want your logo to be vertically centered when using the Default Header.<br> E.g: 30px",
						"id" => "vertical_nav",
						"std" => "",
						"type" => "text");

$of_options[] = array(  "name" => "Header Menu Line Height",
						"id" => "main_menu_line_height",
						"desc" 		=> "Enter the line height in pixels for the Header Menu Main items",
						"std" 		=> "85",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "200",
						"type" 		=> "sliderui" 
				);
										
								
$of_options[] = array(  "name" => "Header Menu Uppercase",
						"desc" 		=> "Force uppercase text for the Header Menu.",
						"id" => "force_uppercase",
						"std" => "0",
						"folds" => 1,
						"type" => "switch");
						
$of_options[] = array(  "name" => "Header Menu - SubMenu Indicator",
						"desc" 		=> "Enable/disable the SubMenu Indicator (the + sign)",
						"id" => "submenu_indicator",
						"std" => "1",
						"folds" => 1,
						"type" => "switch");										
/*						
$of_options[] = array(  "name" => "Header Menu Position",
						"desc" 		=> "Select the position of the header menu.",
						"id" => "menu_float",
						"std" => "right",
						"type" => "select",
						"options" => array("left","right"));	
*/						
$of_options[] = array(  "name" => "Header Menu Text Color",
						"desc" 		=> "Select the color of the header text menu.",
						"id" => "menu_color",
						"std" => "#21252b",
						"type" => "color");	
						
$of_options[] = array(  "name" => "Header Menu Text Color on Hover",
						"desc" 		=> "Select the color of the header text menu on hover.",
						"id" => "menu_color_hover",
						"std" => "#ffffff",
						"type" => "color");					
					
$of_options[] = array(  "name" => "Header Menu Background Color on Hover",
						"desc" 		=> "Select the background color of the header text menu on hover.",
						"id" => "menu_color_bg_hover",
						"std" => "#5bc98c",
						"type" => "color");	
/*					
$of_options[] = array(  "name" => "Header Menu Background Color Force Transparency",
						"desc" 		=> "Enable this option to make the header menu background transparent.",
						"id" => "menu_color_bg_transparent",
						"std" => "0",
						"folds" => 0,
						"type" => "switch");												
*/

$of_options[] = array(  "name" => "Header SubMenu Top Border Color",
						"desc" 		=> "Select the top border color of the submenu.",
						"id" => "submenu_border_color",
						"std" => "#5bc98c",
						"type" => "color");		
						
$of_options[] = array(  "name" => "Header SubMenu Items Text Color",
						"desc" 		=> "Select the text color of the submenu items.",
						"id" => "submenu_color",
						"std" => "#666666",
						"type" => "color");	
						
$of_options[] = array(  "name" => "Header SubMenu Items Text Color on Hover",
						"desc" 		=> "Select the text color of the submenu items on hover.",
						"id" => "submenu_color_hover",
						"std" => "#ffffff",
						"type" => "color");
						
$of_options[] = array(  "name" => "Header SubMenu Items Background Color",
						"desc" 		=> "Select the background color of the submenu items text.",
						"id" => "submenu_bg_color",
						"std" => "#ffffff",
						"type" => "color");

						
$of_options[] = array(  "name" => "Header SubMenu Background Color on Hover",
						"desc" 		=> "Select the background color of the submenu items text, on hover.",
						"id" => "submenu_bg_color_hover",
						"std" => "#5bc98c",
						"type" => "color");						
																				
$of_options[] = array(  "name" => "Header SubMenu Items Separator Color",
						"desc" 		=> "Select the color of the submenu items separator.",
						"id" => "submenu_separator",
						"std" => "#f4f4f4",
						"type" => "color");	
				

				
$of_options[] = array(  "name" => "Header Menu Background Color - Modern Header Style",
						"desc" 		=> "If you selected the Modern Header style you can specify a color for the background of the menu bar. Note that the menu will be placed outside the header area.",
						"id" => "menu_bg_color_full",
						"std" => "#000000",
						"type" => "color");	
						
$of_options[] = array(  "name" => "Header Menu Border Color - Modern Header Style",
						"desc" 		=> "If you selected the Modern Header style you can specify a color for the border of the menu bar. ",
						"id" => "menu_border_color",
						"std" => "#444444",
						"type" => "color");	

$of_options[] = array( 	"name" 		=> "MegaMenu",
						"desc" 		=> "",
						"id" 		=> "mega_menu",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">MegaMenu Styling</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);	
				
$of_options[] = array(  "name" => "Column Title Text/Link Color",
						"desc" 		=> "Select the text color of the column title.",
						"id" => "mm_column_title",
						"std" => "#444444",
						"type" => "color");	
						
$of_options[] = array(  "name" => "Column Title Link Color on Hover",
						"desc" 		=> "Select the link color on hover of the column title.",
						"id" => "mm_column_title_hover",
						"std" => "#5bc98c",
						"type" => "color");	
						
$of_options[] = array(  "name" => "Column Title Font Size",
						"id" => "mm_column_title_font_size",
						"std" 		=> "14",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "40",
						"type" 		=> "sliderui" 
				);		
				
$of_options[] = array(  "name" => "Column Title Font Weight",
						"id" => "mm_column_title_font_weight",
						"std" => "normal",
						"type" => "select",
						"options" => array("normal","300","400","500","600","700"));	
						
				
$of_options[] = array(  "name" => "MegaMenu Links Color",
						"id" => "mm_links_color",
						"desc" 		=> "Select the link color of the MegaMenu sub-menu items.",
						"std" => "#ffffff",
						"type" => "color");	

$of_options[] = array(  "name" => "MegaMenu Links Color on Hover",
						"id" => "mm_links_color_hover",
						"desc" 		=> "Select the link color on hover of the MegaMenu sub-menu items.",
						"std" => "#5bc98c",
						"type" => "color");																													
						
$of_options[] = array( 	"name" 		=> "Header HTML Code - only works for Modern Header style",
						"desc" 		=> "Paste here your html code for the header area. You can add javascripts codes to output the banners you want or plain html.",
						"id" 		=> "header_banner",
						"std" 		=> "",
						"type" 		=> "textarea"
				);	
																																										

$of_options[] = array( 	"name" 		=> "Header Padding &amp; Margins",
						"desc" 		=> "",
						"id" 		=> "header_padd_mar",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Header Padding &amp; Margins</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
						
$of_options[] = array(  "name" => "Header Bottom Margin (px)",
						"id" => "header_bottom_margin",
						"std" 		=> "0",
						"min" 		=> "0",
						"step"		=> "5",
						"max" 		=> "50",
						"type" 		=> "sliderui" 
				);	
				
$of_options[] = array(  "name" => "Header Top Margin (px)",
						"id" => "header_top_margin",
						"std" 		=> "0",
						"min" 		=> "0",
						"step"		=> "5",
						"max" 		=> "50",
						"type" 		=> "sliderui" 
				);	
				
$of_options[] = array(  "name" => "Header Top Padding (px)",
						"id" => "header_top_padding",
						"std" 		=> "0",
						"min" 		=> "0",
						"step"		=> "5",
						"max" 		=> "50",
						"type" 		=> "sliderui" 
				);	
				
$of_options[] = array(  "name" => "Header Bottom Padding (px)",
						"id" => "header_bottom_padding",
						"std" 		=> "0",
						"min" 		=> "0",
						"step"		=> "5",
						"max" 		=> "50",
						"type" 		=> "sliderui" 
				);				
																									
$of_options[] = array( 	"name" 		=> "Header Left-Right",
						"type" 		=> "heading"
				);	
				
$of_options[] = array( 	"name" 		=> "Elements Positioning",
						"desc" 		=> "Drag and Drop elements to assign them in the correct order. Drag elements in the Disabled area to not show them.",
						"id" 		=> "side_blocks",
						"std" 		=> $of_options_homepage_blocks,
						"type" 		=> "sorter"
				);

$of_options[] = array(  "name" => "Center Elements",
						"desc" 		=> "Enable this option if you want to center all elements in the header",
						"id" => "hlr_centered",
						"std" => "0",						
						"type" => "switch");																																																									
				
$of_options[] = array( 	"name" 		=> "Header Area Width (px)",
						"desc" 		=> "Enter the header width in pixels. Default: 300px",
						"id" 		=> "hlr_width",
						"std" 		=> "300px",
						"type" 		=> "text"
				);	
				
$of_options[] = array(  "name" => "Header Area Background Color",
						"desc" 		=> "Select the background color for left/right header area.",
						"id" => "hlr_bg_color",
						"std" => "#ffffff",
						"type" => "color");	
						
$of_options[] = array( 	"name" 		=> "Header Area Background Image",
						"desc" 		=> "Upload an image for the background of the header left/right area.",
						"id" 		=> "hlr_bg_img",						
						"std" 		=> "",
						"type" 		=> "upload"
				);	
				
$of_options[] = array(  "name" => "Background Image Repeat",
						"id" => "hlr_bg_img_repeat",
						"std" => "no-repeat",
						"type" => "select",
						"options" => array("no-repeat","repeat-x","repeat-y","repeat"));	
						
$of_options[] = array( 	"name" 		=> "Background Image Position X",
						"desc" 		=> "You can custom position the background by entering pixel or percent values. E.g: -50px <br> Enter: 50% if you want your background to be centered horizontally.",
						"id" 		=> "hlr_bg_img_x",
						"std" 		=> "",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Background Image Position Y",
						"desc" 		=> "You can custom position the background horizontally, by entering pixel or percent values. E.g: -50px <br> Enter: 50% if you want your background to be centered vertically.",
						"id" 		=> "hlr_bg_img_y",
						"std" 		=> "",
						"type" 		=> "text"
				);																					
				
$of_options[] = array(  "name" => "Fullscreen Background",
						"desc" 		=> "Enable/disable fullscreen background for the header left/right area.",
						"id" => "hlr_bg_fullscreen",
						"std" => "0",						
						"type" => "switch");
						
$of_options[] = array(  "name" => "Header Shadow Effect",
						"desc" 		=> "Enable/disable shadow effect for the left/right header area.",
						"id" => "hlr_shadow_en",
						"std" => "1",						
						"type" => "switch");							
														
$of_options[] = array(  "name" => "Header Border Width ",
						"id" => "hlr_border_width",
						"std" 		=> "0",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "20",
						"desc" 		=> "Select the width of the border for the header left/right area.",
						"type" 		=> "sliderui" 
				);
				
$of_options[] = array(  "name" => "Header Area Border Color",
						"desc" 		=> "Select the border color for left/right header area. Will only work if the Header Border Width is greater than 0.",
						"id" => "hlr_border_color",
						"std" => "#eeeeee",
						"type" => "color");	
						
$of_options[] = array( 	"name" 		=> "Soc Links",
						"desc" 		=> "",
						"id" 		=> "hlr_sl",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Social Icons</h3> Use the settings here to customzie the Social Icons settings for the header left/right area.",
						"icon" 		=> true,
						"type" 		=> "info"
				);	
				
$of_options[] = array(  "name" => "Social Icons Background Color",
						"desc" 		=> "Select the background color for the Social Icon. Leave blank if you want the social links to use a transparent background.",
						"id" => "hlr_si_bg",
						"std" => "",
						"type" => "color");

$of_options[] = array(  "name" => "Social Icons Background Color on Hover",
						"desc" 		=> "Select the background color on hover for the Social Icon.",
						"id" => "hlr_si_bg_hover",
						"std" => "",
						"type" => "color");									
						
$of_options[] = array(  "name" => "Social Icons Color",
						"desc" 		=> "Select the color for the Social Icon. ",
						"id" => "hlr_si_color",
						"std" => "#5e5e5e",
						"type" => "color");														
						
$of_options[] = array( 	"name" 		=> "Menu Options",
						"desc" 		=> "",
						"id" 		=> "hlr_mm2",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Menu Typography</h3> Use the settings here to customzie the typographic settings for the Main Menu and Child Menus.",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array(  "name" => "Menu Font Family",
						"desc" => "Select a font family for menus.",
						"id" => "hlr_font_family",
						"std" => "Open Sans",
						"type" => "select_google_font",
						"preview" => array(
									"text" => "This is a preview for the Menu", 
									"size" => "13px"
						),
						"options" => $google_fonts);				
						
$of_options[] = array( 	"name" 		=> "Main Menu Font Size (px)",
						"desc" 		=> "Enter the font size for the Main Menu, in pixels. Default: 14px.",
						"id" 		=> "hlr_mm_font_size",
						"std" 		=> "14px",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> "Child Menu Font Size (px)",
						"desc" 		=> "Enter the font size for the Child Menu, in pixels. Default: 12px.",
						"id" 		=> "hlr_cm_font_size",
						"std" 		=> "12px",
						"type" 		=> "text"
				);	
				
$of_options[] = array(  "name" => "Header Menu Font Weight - First Level only",
						"id" => "hlr_menu_font_weight",
						"std" => "500",
						"type" => "select",
						"options" => array(300,400,500, 600,700,800,900));																
				
$of_options[] = array( 	"name" 		=> "Main Menu Options",
						"desc" 		=> "",
						"id" 		=> "hlr_mm",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Main Menu Options</h3> Use the settings here to customzie the Main Menu Items in the Left/Right Header",
						"icon" 		=> true,
						"type" 		=> "info"
				);	
				
$of_options[] = array(  "name" => "Main Menu Text Align",
						"id" => "hlr_mm_text_align",
						"std" => "Left",
						"type" => "select",
						"options" => array("left" => "Left", "Center" => "Center", "right" => "Right"));
										
				
$of_options[] = array(  "name" => "Main Menu Items left/right Border Width (px)",
						"id" => "hlr_menu_border_width",
						"std" 		=> "3",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "20",
						"desc" 		=> "Select the width of the left/right border for the menu items. Default 3px.",
						"type" 		=> "sliderui" 
				);		
				
$of_options[] = array(  "name" => "Main Menu Border Color",
						"desc" 		=> "Select the border color for the main menu items.",
						"id" => "hlr_menu_border_color",
						"std" => "#5bc98c",
						"type" => "color");								

$of_options[] = array( 	"name" 		=> "Header SubMenu Width (px)",
						"desc" 		=> "Enter the width of the submenu items in pixels. Default: 220px",
						"id" 		=> "hlr_sub_width",
						"std" 		=> "220px",
						"type" 		=> "text"
				);	
				
$of_options[] = array(  "name" => "Menus Item Separator Thickness",
						"desc" 		=> "Select the thickness for the line separtor of the menu items. Choose 0 if you want to disable it",
						"id" => "hlr_menu_separator_thickness",
						"std" 		=> "1",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "10",
						"type" 		=> "sliderui" 
				);				
				
$of_options[] = array(  "name" => "Menus Item Separator Color",
						"desc" 		=> "Select the color for the line separtor of the menu items.",
						"id" => "hlr_menu_separator_color",
						"std" => "#e8ebed",
						"type" => "color");							
						
$of_options[] = array(  "name" => "Main Menu Item Text Color",
						"desc" 		=> "Select the text color for the main menu items.",
						"id" => "hlr_menu_text_color",
						"std" => "#767676",
						"type" => "color");	

$of_options[] = array(  "name" => "Main Menu Item Background Color",
						"desc" 		=> "Select the background color for the main menu items. Leave blank to not use any background color.",
						"id" => "hlr_menu_bg_color",
						"std" => "#ffffff",
						"type" => "color");	

$of_options[] = array(  "name" => "Main Menu Item Text Color on Hover",
						"desc" 		=> "Select the text color on hover for the main menu items.",
						"id" => "hlr_menu_text_color_hover",
						"std" => "#5b5b5b",
						"type" => "color");
						
$of_options[] = array(  "name" => "Main Menu Item Background Color on Hover",
						"desc" 		=> "Select the background color on hover for the main menu items. Leave blank to not use any background color.",
						"id" => "hlr_menu_bg_color_hover",
						"std" => "#ffffff",
						"type" => "color");																																		

$of_options[] = array( 	"name" 		=> "Child Menu Options",
						"desc" 		=> "",
						"id" 		=> "hlr_cm",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Child Menu Options</h3>Use the settings here to customzie the Child Menu Items of the Main Menu in the Left/Right Header",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array(  "name" => "Child Menus Text Align",
						"id" => "hlr_cm_text_align",
						"std" => "Left",
						"type" => "select",
						"options" => array("left" => "Left", "Center" => "Center", "right" => "Right"));				
				
$of_options[] = array(  "name" => "Child Menu Items Indicator",
						"desc" 		=> "Enable/disable the sub menu indicator - this will add a small icon that will indicate the presence of child menus items.",
						"id" => "hlr_child_menu_indicator",
						"std" => "1",
						"type" => "switch"
					);					
						
$of_options[] = array(  "name" => "Child Menu Items Border Width (px)",
						"id" => "hlr_child_menu_border_width",
						"std" 		=> "3",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "20",
						"desc" 		=> "Select the width of the border for the Child Menu Items. Default 3px.",
						"type" 		=> "sliderui" 
				);		
				
$of_options[] = array(  "name" => "Child Menu Items Border Color",
						"desc" 		=> "Select the border color for the Child Menu Items.",
						"id" => "hlr_child_menu_border_color",
						"std" => "#5bc98c",
						"type" => "color");																			
				
$of_options[] = array(  "name" => "Child Menu Outside Shadow",
						"desc" 		=> "Add shadow effect on the outside of the Child Menu.",
						"id" => "hlr_child_menu_shadow",
						"std" => "1",
						"type" => "switch"
					);							
				
$of_options[] = array(  "name" => "Child Menu Outside Border Width(px)",
						"desc" 		=> "Select the outside border width of the Child Menu.",
						"id" => "hlr_child_menu_outer_border",
						"std" 		=> "0",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "20",						
						"type" 		=> "sliderui"
					);	
						
$of_options[] = array(  "name" => "Child Menu Outside Border Color",
						"desc" 		=> "Select the outside border color for the Child Menu.",
						"id" => "hlr_child_menu_outer_border_color",
						"std" => "#eeeeee",
						"type" => "color");		
						
$of_options[] = array(  "name" => "Child Menu Item Text Color",
						"desc" 		=> "Select the text color for the child menu items.",
						"id" => "hlr_child_menu_text_color",
						"std" => "#767676",
						"type" => "color");	

$of_options[] = array(  "name" => "Child Menu Item Background Color",
						"desc" 		=> "Select the background color for the child menu items. Leave blank to not use any background color.",
						"id" => "hlr_child_menu_bg_color",
						"std" => "#ffffff",
						"type" => "color");	

$of_options[] = array(  "name" => "Child Menu Item Text Color on Hover",
						"desc" 		=> "Select the text color on hover for the child menu items.",
						"id" => "hlr_child_menu_text_color_hover",
						"std" => "#5b5b5b",
						"type" => "color");
						
$of_options[] = array(  "name" => "Child Menu Item Background Color on Hover",
						"desc" 		=> "Select the background color on hover for the child menu items. Leave blank to not use any background color.",
						"id" => "hlr_child_menu_bg_color_hover",
						"std" => "#ffffff",
						"type" => "color");	
		
$of_options[] = array( 	"name" 		=> "Mobile Menu",
						"type" 		=> "heading"
				);

$of_options[] = array(  "name" => "Mobile Menu for iPad Landscape",
						"desc" 		=> "Force the mobile menu to appear for iPad devices using Landscape mode",
						"id" => "mobile_menu_landscape",
						"std" => "0",
						"type" => "switch");

$of_options[] = array(  "name" => "Mobile Menu Text",
						"desc" => "Change the text used for the Mobile Menu. Default: Menu",
						"id" => "mobile_menu_text",
						"std" => "Menu",
						"type" => "text");	

$of_options[] = array(  "name" =>  "Mobile Menu Bar - Background Color",
						"desc" => "",
						"id" => "mobile_menu_bar_bg",
						"std" => "#5bc98c",
						"type" => "color");	
/*

$of_options[] = array(  "name" =>  "Mobile Menu Bar - Background Color on Hover/Active state",
						"desc" => "",
						"id" => "mobile_menu_bar_bg_hover",
						"std" => "#479e85",
						"type" => "color");	
*/

$of_options[] = array(  "name" =>  "Mobile Menu Bar - Top Border Color",
						"desc" => "If no color is selected, no border will be added. Default: no color",
						"id" => "mobile_menu_bar_border_top",
						"std" => "",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Mobile Menu Bar - Bottom Border Color",
						"desc" => "If no color is selected, no border will be added. Default: no color",
						"id" => "mobile_menu_bar_border_bottom",
						"std" => "",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Mobile Menu Bar - Text Color",
						"desc" => "",
						"id" => "mobile_menu_bar_text",
						"std" => "#ffffff",
						"type" => "color");	
/*
$of_options[] = array(  "name" =>  "Mobile Menu Bar - Text Color on Hover/Active state",
						"desc" => "",
						"id" => "mobile_menu_bar_text_hover",
						"std" => "#ffffff",
						"type" => "color");
*/

$of_options[] = array(  "name" =>  "Mobile Menu Links Background Color",
						"desc" => "",
						"id" => "mobile_menu_link_bg",
						"std" => "#ffffff",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Mobile Menu Links Text Color",
						"desc" => "",
						"id" => "mobile_menu_link_color",
						"std" => "#444444",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Mobile Menu Sub-Indicator Color",
						"desc" => "",
						"id" => "mobile_menu_item_bg",
						"std" => "#444444",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Mobile Menu Separator Color",
						"desc" => "",
						"id" => "mobile_menu_item_separator",
						"std" => "#dddddd",
						"type" => "color");	

$of_options[] = array( 	"name" 		=> "Off-Canvas Sidebar",
						"type" 		=> "heading"
				);	

$of_options[] = array(  "name" => "Off Canvas Sidebar",
						"desc" 		=> "Enable/disable Off-Canvas Sidebar",
						"id" => "off_canvas_sidebar",
						"std" => "0",
						"type" => "switch");

$of_options[] = array(  "name" => "Sidebar Width",
						"desc" => "Enter the width of the Off Canvas Sidebar in pixels or percent: E.g: 300px or 30%. Default: 300px",
						"id" => "off_cnv_width",
						"std" => "300px",
						"type" => "text");							

$of_options[] = array(  "name" => "Icon Display",
						"desc" => "Enter here the fontawesome icon code. Default: fa fa-bars",
						"id" => "off_cnv_icon",
						"std" => "fa fa-bars",
						"type" => "text");

$of_options[] = array(  "name" => "Sidebar Heading Font Size",
						"desc" => "Enter the font size for the Sidebar Headings. Default: 13px",
						"id" => "off_cnv_heading",
						"std" => "16px",
						"type" => "text");		

$of_options[] = array(  "name" => "Sidebar Heading Split Line",
						"desc" => "Enable/disable the heading split line",
						"id" => "off_cnv_heading_split",
						"std" => "1",
						"folds" => "1",
						"type" => "switch");												

$of_options[] = array(  "name" =>  "Sidebar Heading Split Line Color",
						"desc" => "",
						"id" => "off_cnv_heading_split_color",
						"std" => "#dddddd",
						"fold" => "off_cnv_heading_split",
						"type" => "color");

$of_options[] = array(  "name" =>  "Sidebar Background Color",
						"desc" => "",
						"id" => "off_cnv_bg",
						"std" => "#f7f7f7",
						"type" => "color");

$of_options[] = array(  "name" =>  "Sidebar Text Color",
						"desc" => "",
						"id" => "off_cnv_text",
						"std" => "#444444",
						"type" => "color");

$of_options[] = array(  "name" =>  "Sidebar Link Color",
						"desc" => "",
						"id" => "off_cnv_link",
						"std" => "#444444",
						"type" => "color");

$of_options[] = array(  "name" =>  "Sidebar Link Color on Hover",
						"desc" => "",
						"id" => "off_cnv_link_hover",
						"std" => "#5c5c5c",
						"type" => "color");

$of_options[] = array( 	"name" 		=> "Page Title - Breadcrumb",
						"type" 		=> "heading"
				);								
						
$of_options[] = array( 	"name" 		=> "Title &amp; Breadcrumb",
						"desc" 		=> "",
						"id" 		=> "title_breadcrumbs",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Title &amp; Breadcrumb</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);	
				
$of_options[] = array(  "name" => "Title and Breadcrumb Global Disable",
						"desc" 		=> "Disable the entire Title and Breadcrumbs Area for the entire site",
						"id" => "global_title_bread",
						"std" => "0",
						"type" => "switch");	

$of_options[] = array(  "name" => "Elements Positioning",
						"desc" 		=> "Select the position of the Title, Breadcrumb and Search box",
						"id" => "page_title_align",
						"std" => "left",
						"type" => "select",
						"options" => array('left' => 'Left', 'center' => 'Center', 'right' => 'Right'));	

$of_options[] = array(  "name" => "Display Page Title ",
						"desc" 		=> "Enable/Disable Page Title for the entire site",
						"id" => "page_title_show",
						"std" => "yes",
						"type" => "select",
						"options" => array('yes' => 'Yes', 'no' => 'No'));	

$of_options[] = array(  "name" => "Display Breadcrumb ",
						"desc" 		=> "Enable/Disable breadcrumb for the entire site",
						"id" => "breadcrum_show",
						"std" => "yes",
						"type" => "select",
						"options" => array('yes' => 'Yes', 'no' => 'No'));	

$of_options[] = array(  "name" => "Page Title Tag",
						"desc" 		=> "Select the html tag used for the Page Title",
						"id" => "page_title_tag",
						"std" => "h2",
						"type" => "select",
						"options" => array('h1' => 'h1', 'h2' => 'h2', 'h3' => 'h3', 'h4' => 'h4', 'h5' => 'h5', 'h6' => 'h6', 'p' => 'p', 'div' => 'div'));							

$of_options[] = array(  "name" => "Show Page Title & Breadcrumb on Posts",
						"desc" 		=> "Enable/Disable the page title & breadcrumb on posts",
						"id" => "page_title_posts",
						"std" => "yes",
						"type" => "select",
						"options" => array('yes' => 'Yes', 'no' => 'No'));	

$of_options[] = array(  "name" => "Show Page Title & Breadcrumb on Pages",
						"desc" 		=> "Enable/Disable the page title & breadcrumb on pages",
						"id" => "page_title_pages",
						"std" => "yes",
						"type" => "select",
						"options" => array('yes' => 'Yes', 'no' => 'No'));	

$of_options[] = array(  "name" => "Show Page Title & Breadcrumb on Portfolio Items",
						"desc" 		=> "Enable/Disable the page title & breadcrumb on portfolio items",
						"id" => "page_title_portfolio",
						"std" => "yes",
						"type" => "select",
						"options" => array('yes' => 'Yes', 'no' => 'No'));

$of_options[] = array(  "name" => "Show Page Title & Breadcrumb on WooCommerce",
						"desc" 		=> "Enable/Disable the page title & breadcrumb on woocommerce pages and products pages",
						"id" => "page_title_woocommerce",
						"std" => "yes",
						"type" => "select",
						"options" => array('yes' => 'Yes', 'no' => 'No'));		

$of_options[] = array(  "name" => "Show Page Title & Breadcrumb on bbPress Forum",
						"desc" 		=> "Enable/Disable the page title & breadcrumb on bbPress Forums",
						"id" => "page_title_bbpress",
						"std" => "yes",
						"type" => "select",
						"options" => array('yes' => 'Yes', 'no' => 'No'));																																							
				
$of_options[] = array(  "name" =>  "Title and Breadcrumb Background Color",
						"desc" => "Select the background color for the title & breadcrumb section.",
						"id" => "tb_bg_color",
						"std" => "#f8f8f8",
						"type" => "color");						
						
$of_options[] = array(  "name" =>  "Title and Breadcrumb Font Color",
						"desc" => "Select the font color for the title & breadcrumb section.",
						"id" => "tb_title_color",
						"std" => "#4d4d4d",
						"type" => "color");
						
$of_options[] = array(  "name" => "Title and Breadcrumb Search Box",
						"desc" 		=> "Enable/disable a Search Box in the Title and Breadcrumb Area",
						"id" => "header_search_form",
						"std" => "1",
						"folds" => 1,
						"type" => "switch");																										
										
$of_options[] = array( 	"name" 		=> "Footer",
						"type" 		=> "heading"
				);	

$of_options[] = array(  "name" => "Sticky Footer",
						"desc" 		=> "Always position the Footer on the bottom of the page.",
						"id" => "en_sticky_footer",
						"std" => "0",
						"folds" => "1",
						"type" => "switch");						

$of_options[] = array( 	"name" 		=> "Footer Menu",
						"desc" 		=> "",
						"id" 		=> "footer_mn",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Footer Right Side</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);	

$of_options[] = array(  "name" => "Footer Menu Right side",						
						"desc" => "Select what to display in the right area of the Footer Menu",
						"id" => "footer_right_area",
						"std" => "socialinks_footer",
						"type" => "select",
						"options" => array('socialinks_footer' => 'Social Links', 'footer_menu' => 'Footer Menu', 'empty' => 'Leave Empty'));
						
$of_options[] = array(  "name" =>  "Footer Menu",
						"desc" => "Footer Menu Link Color.",
						"id" => "fm_link",
						"std" => "#cccccc",
						"type" => "color");
							
$of_options[] = array(  "name" =>  "Footer Menu",
						"desc" => "Footer Menu Link Color on Hover.",
						"id" => "fm_link_hover",
						"std" => "#ffffff",
						"type" => "color");																

$of_options[] = array( 	"name" 		=> "Back to Top",
						"desc" 		=> "",
						"id" 		=> "back_top",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Back to Top</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);				
				
$of_options[] = array(  "name" => "Back to Top button",
						"desc" 		=> "Enable/disable the Back to Top button.",
						"id" => "en_back_top",
						"std" => "1",
						"folds" => "1",
						"type" => "switch");						
						
$of_options[] = array(  "name" =>  "Back to Top Background color",
						"desc" => "Select the background color for the back to top button.",
						"id" => "back_top_bg",
						"std" => "#444",
						"fold" => "en_back_top",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Back to Top Background color on Hover",
						"desc" => "Select the background color on hover, for the back to top button.",
						"id" => "back_top_bg_hover",
						"std" => "#5bc98c",
						"fold" => "en_back_top",
						"type" => "color");								
						
$of_options[] = array( 	"name" 		=> "Footer Options",
						"desc" 		=> "",
						"id" 		=> "ftr",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Footer</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);	


$of_options[] = array(  "name" => "Footer Sidebar Columns",
						"desc" 		=> "Select how many columns to be used for the Footer Sidebar.",
						"id" => "footer_cols",						
						"type" => "select",
						"options" => array( "cols_4" => "4 Columns", "cols_3" => "3 Columns", "cols_2" => "2 Columns" ));


$of_options[] = array(  "name" => "Footer Width",						
						"desc" => "Select the width of the Footer Area",
						"id" => "footer_width",
						"std" => "normal",
						"type" => "select",
						"options" => array('normal' => 'Normal', 'expanded' => 'Expanded'));																	
				
$of_options[] = array(  "name" => "Center Footer Content",
						"desc" 		=> "Enable/disable the centering of the footer elements.",
						"id" => "en_footer_center",
						"std" => "0",
						"type" => "switch");
						
$of_options[] = array(  "name" =>  "Footer Social Icons Color",
						"desc" => "Select the color of the footer Social Icons.",
						"id" => "footer_social_icons",
						"std" => "#848484",
						"fold" => "en_back_top",
						"type" => "color");							
				
$of_options[] = array( 	"name" 		=> "Footer Copyright",
						"desc" 		=> "Paste here your footer copyright text or html!",
						"id" 		=> "footer_copyright",
						"std" 		=> "&copy; Copyright 2014. Powered by <a href=\"http://wordpress.org\">WordPress</a><br> <a href=\"http://rockythemes.com/creativo/\">Creativo 4.0</a> by RockyThemes.",
						"type" 		=> "textarea"
				);	

$of_options[] = array( 	"name" 		=> "Footer Widgets",
						"desc" 		=> "",
						"id" 		=> "ftr",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Footer Widgets</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);

$of_options[] = array(  "name" =>  "Footer Widget Link Color",
						"desc" => "",
						"id" => "footer_widget_link_color",
						"std" => "#5bc98c",
						"type" => "color");
				
$of_options[] = array(  "name" => "Footer Widgets Patterns",
						"desc" 		=> "Enable/disable patterns on footer widgets section.",
						"id" => "en_footer_pattern",
						"std" => "0",
						"folds" => 1,
						"type" => "switch");
						
$of_options[] = array( 	"name" 		=> "Footer Widgets Pattern",
						"desc" 		=> "Select a background pattern for the footer.",
						"id" 		=> "footer_patterns",
						"std" 		=> $bg_images_url."pattern10.png",
						"type" 		=> "tiles",
						"fold" 		=> "en_footer_pattern",
						"options" 	=> array(
						"pattern1" => get_template_directory_uri()."/images/pattern/pattern1.png",
						"pattern2" => get_template_directory_uri()."/images/pattern/pattern2.png",
						"pattern3" => get_template_directory_uri()."/images/pattern/pattern3.png",
						"pattern4" => get_template_directory_uri()."/images/pattern/pattern4.png",
						"pattern5" => get_template_directory_uri()."/images/pattern/pattern5.png",
						"pattern6" => get_template_directory_uri()."/images/pattern/pattern6.png",
						"pattern7" => get_template_directory_uri()."/images/pattern/pattern7.png",
						"pattern8" => get_template_directory_uri()."/images/pattern/pattern8.png",
						"pattern9" => get_template_directory_uri()."/images/pattern/pattern9.png",
						"pattern10" => get_template_directory_uri()."/images/pattern/pattern10.png",
						"pattern11" => get_template_directory_uri()."/images/pattern/pattern11.png",
						"pattern12" => get_template_directory_uri()."/images/pattern/pattern12.png",
						"pattern13" => get_template_directory_uri()."/images/pattern/pattern13.png",
						"pattern14" => get_template_directory_uri()."/images/pattern/pattern14.png",
						"pattern15" => get_template_directory_uri()."/images/pattern/pattern15.png",
						"pattern16" => get_template_directory_uri()."/images/pattern/pattern16.png",
						"pattern17" => get_template_directory_uri()."/images/pattern/pattern17.png",
						"pattern18" => get_template_directory_uri()."/images/pattern/pattern18.png",
						"pattern19" => get_template_directory_uri()."/images/pattern/pattern19.png",
						"pattern20" => get_template_directory_uri()."/images/pattern/pattern20.png",
						"pattern21" => get_template_directory_uri()."/images/pattern/pattern21.png",
						"pattern22" => get_template_directory_uri()."/images/pattern/pattern22.png",
						"pattern23" => get_template_directory_uri()."/images/pattern/pattern23.png",
						"pattern24" => get_template_directory_uri()."/images/pattern/pattern24.png",
						"pattern25" => get_template_directory_uri()."/images/pattern/pattern25.png",
					));
				
$of_options[] = array(  "name" =>  "Footer Widgets Background Color",
						"desc" => "Select the background color for the footer widgets section - if patterns are disabled the background color will be used.",
						"id" => "footer_bg_color",
						"std" => "#222326",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Footer Widgets Heading Color",
						"desc" => "Select the color for the footer widgets headings.",
						"id" => "footer_heading_color",
						"std" => "#ffffff",
						"type" => "color");	
/*
$of_options[] = array( 	"name" 		=> "Footer Widgets Heading Font Size",
						"desc" => "Default is 14",
						"id" => "footer_heading_font_size",
						"std" 		=> "14",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "60",
						"type" 		=> "sliderui" 
				);
*/
$of_options[] = array(  "name" => "Footer Widgets Heading Font Weight",
						"id" => "footer_heading_font_weight",
						"std" => "600",
						"type" => "select",
						"options" => array(300,400,500, 600,700,800,900));

$of_options[] = array( 	"name" 		=> "Footer Widgets Heading Letter Spacing",
						"desc" => "Default is 0",
						"id" => "footer_heading_let_sp",
						"std" 		=> "0",
						"min" 		=> "-5",
						"step"		=> "1",
						"max" 		=> "5",
						"type" 		=> "sliderui" 
				);					
						
$of_options[] = array(  "name" =>  "Footer Widgets Text Color",
						"desc" => "Select the color for the footer widgets text.",
						"id" => "footer_widget_text_color",
						"std" => "#858d91",
						"type" => "color");						
						
$of_options[] = array(  "name" =>  "Footer Widgets Border Top Color",						
						"id" => "footer_widgets_tb_color",
						"std" => "#eeeeee",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Footer Widgets Border Bottom Color",						
						"id" => "footer_widgets_bb_color",
						"std" => "#2e343a",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Footer Flickr Widget Border Color",						
						"id" => "footer_flickr_bcolor",
						"std" => "#454c54",
						"type" => "color");	

$of_options[] = array( 	"name" 		=> "Footer Copyright",
						"desc" 		=> "",
						"id" 		=> "ftr",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Footer Copyright</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);																											
						
$of_options[] = array(  "name" => "Footer Copyright Patterns",
						"desc" 		=> "Enable/disable patterns on footer copyright section.",
						"id" => "en_footer_copy_pattern",
						"std" => "0",
						"folds" => 1,
						"type" => "switch");
						
$of_options[] = array( 	"name" 		=> "Footer Copyright Pattern",
						"desc" 		=> "Select a background pattern for the footer copyright.",
						"id" 		=> "footer_copy_patterns",
						"std" 		=> $bg_images_url."pattern10.png",
						"type" 		=> "tiles",
						"fold" 		=> "en_footer_copy_pattern",
						"options" 	=> array(
						"pattern1" => get_template_directory_uri()."/images/pattern/pattern1.png",
						"pattern2" => get_template_directory_uri()."/images/pattern/pattern2.png",
						"pattern3" => get_template_directory_uri()."/images/pattern/pattern3.png",
						"pattern4" => get_template_directory_uri()."/images/pattern/pattern4.png",
						"pattern5" => get_template_directory_uri()."/images/pattern/pattern5.png",
						"pattern6" => get_template_directory_uri()."/images/pattern/pattern6.png",
						"pattern7" => get_template_directory_uri()."/images/pattern/pattern7.png",
						"pattern8" => get_template_directory_uri()."/images/pattern/pattern8.png",
						"pattern9" => get_template_directory_uri()."/images/pattern/pattern9.png",
						"pattern10" => get_template_directory_uri()."/images/pattern/pattern10.png",
						"pattern11" => get_template_directory_uri()."/images/pattern/pattern11.png",
						"pattern12" => get_template_directory_uri()."/images/pattern/pattern12.png",
						"pattern13" => get_template_directory_uri()."/images/pattern/pattern13.png",
						"pattern14" => get_template_directory_uri()."/images/pattern/pattern14.png",
						"pattern15" => get_template_directory_uri()."/images/pattern/pattern15.png",
						"pattern16" => get_template_directory_uri()."/images/pattern/pattern16.png",
						"pattern17" => get_template_directory_uri()."/images/pattern/pattern17.png",
						"pattern18" => get_template_directory_uri()."/images/pattern/pattern18.png",
						"pattern19" => get_template_directory_uri()."/images/pattern/pattern19.png",
						"pattern20" => get_template_directory_uri()."/images/pattern/pattern20.png",
						"pattern21" => get_template_directory_uri()."/images/pattern/pattern21.png",
						"pattern22" => get_template_directory_uri()."/images/pattern/pattern22.png",
						"pattern23" => get_template_directory_uri()."/images/pattern/pattern23.png",
						"pattern24" => get_template_directory_uri()."/images/pattern/pattern24.png",
						"pattern25" => get_template_directory_uri()."/images/pattern/pattern25.png",
					));

$of_options[] = array( 	"name" 		=> "Footer Copyright - Custom Background",
						"desc" 		=> "Upload an image or new pattern for the background of the footer copyright section.",
						"id" 		=> "footer_copyright_bg",						
						"std" 		=> "",
						"type" 		=> "upload"
				);	
				
$of_options[] = array(  "name" => "Footer Copyright - Custom Background Repeat",
						"id" => "footer_copyright_bg_repeat",
						"std" => "no-repeat",
						"type" => "select",
						"options" => array("no-repeat","repeat-x","repeat-y","repeat"));
				
$of_options[] = array(  "name" =>  "Footer Copyright Background Color",
						"desc" => "Select the background color for the footer copyright section - if patterns are disabled the background color will be used.",
						"id" => "footer_copy_bg_color",
						"std" => "#1E1D1D",
						"type" => "color");	
						
						
						
$of_options[] = array(  "name" =>  "Footer Copyright Text Color",
						"desc" => "Select the text color for the footer copyright section.",
						"id" => "footer_text_color",
						"std" => "#999999",
						"type" => "color");

$of_options[] = array(  "name" =>  "Footer Copyright Link Color",
						"desc" => "Select the link color for the footer copyright section.",
						"id" => "footer_link_color",
						"std" => "#727272",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Footer Copyright Link Color - Hover",
						"desc" => "Select the link color for the footer copyright section, on hover.",
						"id" => "footer_link_color_hover",
						"std" => "#525252",
						"type" => "color");	
	
$of_options[] = array( 	"name" 		=> "Call to Action",
						"type" 		=> "heading"
				);	
				
$of_options[] = array( 	"name" 		=> "cta_bar",
						"desc" 		=> "",
						"id" 		=> "cta_bar",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Call to Action Bar</h3>Call to Action bar will be present on all your pages, above the footer.",
						"icon" 		=> true,
						"type" 		=> "info"
				);				
				
$of_options[] = array(  "name" => "Call to Action Bar",
						"desc" 		=> "Enable/disable the call to action bar - section will be present on all your pages, above the footer area..",
						"id" => "en_cta",
						"std" => "0",
						"folds" => "1",
						"type" => "switch");
						
$of_options[] = array( 	"name" => "Call to Action text ",
						"id" 		=> "cta_text_real",
						"std" 		=> "This can be changed by going to Appearance -> Theme Options -> Call to Action!",
						"type" 		=> "textarea",
						"fold" => "en_cta"
				);							
						
$of_options[] = array(  "name" =>  "Call to Action Text Color",
						"desc" => "",
						"id" => "cta_text",
						"std" => "#ffffff",
						"fold" => "en_cta",
						"type" => "color");
						
$of_options[] = array(  "name" =>  "Call to Action Text Color on Hover",
						"desc" => "",
						"id" => "cta_text_hover",
						"std" => "#ffffff",
						"fold" => "en_cta",
						"type" => "color");													
						
$of_options[] = array(  "name" =>  "Call to Action Background Color",
						"desc" => "",
						"id" => "cta_bg",
						"std" => "#5bc98c",
						"fold" => "en_cta",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Call to Action Background Color on Hover",
						"desc" => "",
						"id" => "cta_bg_hover",
						"std" => "#479e85",
						"fold" => "en_cta",
						"type" => "color");	
						
$of_options[] = array( 	"name" 		=> "cta_bar_button",
						"desc" 		=> "",
						"id" 		=> "cta_bar",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Call to Action Button Style</h3>",
						"icon" 		=> true,
						"fold" => "en_cta",
						"type" 		=> "info"
				);		
				
$of_options[] = array( 	"name" 		=> "Call to Action Button Text",
						"desc" 		=> "Enter the text you want to display on your button.",
						"id" 		=> "cta_button_text",
						"std" 		=> "Your Text Here",
						"fold"		=> "en_cta",
						"type" 		=> "text"
				);		
				
$of_options[] = array( 	"name" 		=> "Call to Action Button Link",
						"desc" 		=> "Enter the link for the Call to Action button",
						"id" 		=> "cta_button_link",
						"std" 		=> "",
						"fold"		=> "en_cta",
						"type" 		=> "text"
				);		
				
$of_options[] = array( 	"name" 		=> "button info",
						"desc" 		=> "",
						"id" 		=> "button_inf",
						"std" 		=> "<h3 style=\margin: 0 0 10px;\">Call to Action Button style</h3>
						Here you can modify settings for the call to action Button element",
						"icon" 		=> true,
						"type" 		=> "info"
				);														
						
$of_options[] = array(  "name" =>  "Button Background Color",
						"desc" => "",
						"id" => "cta_button_background_color",
						"std" => "#5bc98c",
						"type" => "color");	
				
$of_options[] = array(  "name" =>  "Button Border Color",
						"desc" => "",
						"id" => "cta_button_border_color",
						"std" => "#ffffff",
						"type" => "color");						
						
$of_options[] = array(  "name" =>  "Button Text Color",
						"desc" => "",
						"id" => "cta_button_text_color",
						"std" => "#ffffff",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Button Background Color on Hover",
						"desc" => "",
						"id" => "cta_button_background_color_hover",
						"std" => "#479e85",
						"type" => "color");	
				
$of_options[] = array(  "name" =>  "Button Border Color on Hover",
						"desc" => "",
						"id" => "cta_button_border_color_hover",
						"std" => "#ffffff",
						"type" => "color");						
						
$of_options[] = array(  "name" =>  "Button Text Color on Hover",
						"desc" => "",
						"id" => "cta_button_text_color_hover",
						"std" => "#ffffff",
						"type" => "color");																																								
				
$of_options[] = array( 	"name" 		=> "VC Elements",
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> "tbutton info",
						"desc" 		=> "",
						"id" 		=> "button_inf",
						"std" 		=> "<h3 style=\margin: 0 0 10px;\">Button Default </h3>
						Here you can modify settings for the default Button style",
						"icon" 		=> true,
						"type" 		=> "info"
				);	

$of_options[] = array(  "name" =>  "Button Background Color",
						"desc" => "",
						"id" => "button_background_color",
						"std" => "#5bc98c",
						"type" => "color");	
				
$of_options[] = array(  "name" =>  "Button Border Color",
						"desc" => "",
						"id" => "button_border_color",
						"std" => "#5bc98c",
						"type" => "color");						
						
$of_options[] = array(  "name" =>  "Button Text Color",
						"desc" => "",
						"id" => "button_text_color",
						"std" => "#ffffff",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Button Background Color on Hover",
						"desc" => "",
						"id" => "button_background_color_hover",
						"std" => "#479e85",
						"type" => "color");	
				
$of_options[] = array(  "name" =>  "Button Border Color on Hover",
						"desc" => "",
						"id" => "button_border_color_hover",
						"std" => "#479e85",
						"type" => "color");						
						
$of_options[] = array(  "name" =>  "Button Text Color on Hover",
						"desc" => "",
						"id" => "button_text_color_hover",
						"std" => "#ffffff",
						"type" => "color");						
											
				
$of_options[] = array( 	"name" 		=> "tagline info",
						"desc" 		=> "",
						"id" 		=> "tagline_inf",
						"std" 		=> "<h3 style=\margin: 0 0 10px;\">Call to Action </h3>
						Here you can modify settings for the Call to Action",
						"icon" 		=> true,
						"type" 		=> "info"
				);					
				
$of_options[] = array(  "name" =>  "Call to Action Text Color (Default)",
						"id" => "action_text_color",
						"std" => "#ffffff",
						"type" => "color");
						
$of_options[] = array(  "name" =>  "Call to Action Text Color on Hover",
						"id" => "action_text_color_hover",
						"std" => "#ffffff",
						"type" => "color");						
/*				
$of_options[] = array(  "name" =>  "Call to Action Border Color (Default)",
						"id" => "action_border",
						"std" => "#d2e5ae",
						"type" => "color");
						
$of_options[] = array(  "name" =>  "Call to Action Border Color on Hover",
						"id" => "action_border_hover",
						"std" => "#A5CB5E",
						"type" => "color");	
*/						
$of_options[] = array(  "name" =>  "Call to Action Background Color",
						"id" => "action_bg",
						"std" => "#5bc98c",
						"type" => "color");

$of_options[] = array(  "name" =>  "Call to Action Background Color on Hover",
						"id" => "action_bg_hover",
						"std" => "#479e85",
						"type" => "color");
						
$of_options[] = array( 	"name" 		=> "featured services",
						"desc" 		=> "",
						"id" 		=> "featured_services",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Featured Services</h3>
						Here you can modify settings for the Featured Services",
						"icon" 		=> true,
						"type" 		=> "info"
				);		
				
$of_options[] = array(  "name" =>  "Featured Services Background Color (Default)",
						"id" => "featured_serv_bg",
						"std" => "#ffffff",
						"type" => "color");
						
$of_options[] = array(  "name" =>  "Featured Services Link Color (Default)",
						"id" => "featured_serv_link",
						"std" => "#5bc98c",
						"type" => "color");						
						
$of_options[] = array(  "name" =>  "Featured Services Background Color on Hover (Default)",
						"id" => "featured_serv_bg_hover",
						"std" => "#5bc98c",
						"type" => "color");	
						
$of_options[] = array(  "name" => "Enable White Circle",
						"desc" 		=> "Enable/disable the white circle inside the Featured Service box.",
						"id" => "white_circle",
						"std" => "1",
						"type" => "switch");																																												

$of_options[] = array( 	"name" 		=> "testimonial",
						"desc" 		=> "",
						"id" 		=> "testimonial",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Testimonials Slider</h3>
						Here you can modify settings for the Testimonials slider",
						"icon" 		=> true,
						"type" 		=> "info"
				);		
				
$of_options[] = array(  "name" => "Pause on Hover",
						"desc" 		=> "Enable/disable pause on hover event.",
						"id" => "pause_hover",
						"std" => "1",
						"type" => "switch");	
						
$of_options[] = array(  "name" => "Testimonial Pause Time - in seconds",
						"id" => "pause_time",
						"std" 		=> "3",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "15",
						"type" 		=> "sliderui" 
				);											
				
$of_options[] = array( 	"name" 		=> "Blog",
						"type" 		=> "heading"
				);


$of_options[] = array(  "name" => "Post Content Width",
						"desc" => "Select the width of the Post Container in percents.",
						"id" => "post_content_width",
						"std" 		=> "65",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"type" 		=> "sliderui" 
				);

$of_options[] = array(  "name" => "Sidebar Width",
						"name" => "Select the width of the Sidebar in percents.",
						"id" => "sidebar_width",
						"std" 		=> "32",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"type" 		=> "sliderui" 
				);	

$of_options[] = array(  "name" => "Post Content Inner Padding",
						"desc" => "Add an inner padding to the post content area. Leave 0 to not use any padding.",
						"id" => "post_content_padding",
						"std" 		=> "0",
						"min" 		=> "0",
						"step"		=> "5",
						"max" 		=> "100",
						"type" 		=> "sliderui" 
				);

$of_options[] = array(  "name" =>  "Post Content Inner Background Color",
						"id" => "post_content_bg",
						"std" => "",
						"type" => "color");	

$of_options[] = array(  "name" => "Post Content Force Full Width",
						"desc" 		=> "If set to yes the post area will become full width. This option will also affect pages. ",
						"id" => "post_content_full_width",
						"std" => "Post Excerpt",
						"type" => "select",
						"options" => array("no" => "No", "yes"=> "Yes"));	
				
$of_options[] = array(  "name" => "Posts Count",
						"id" => "posts_count",
						"std" 		=> "10",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "30",
						"type" 		=> "sliderui" 
				);
				
$of_options[] = array(  "name" => "Post Content",
						"desc" 		=> "Select what you want to display on archive pages: full content or post excerpt",
						"id" => "post_content",
						"std" => "Post Excerpt",
						"type" => "select",
						"options" => array("Post Excerpt", "Full Content"));

$of_options[] = array(  "name" => "Post Excerpt",
						"desc" 		=> "Enter the length of the Post Excerpt in words. E.g: 40 - means that the excerpt will show the first 40 words of each post.",
						"id" => "post_excerpt_length",
						"std" => "40",
						"type" => "text");										

$of_options[] = array(  "name" => "Enable Sidebar",
						"desc" 		=> "Enable/disable sidebar for blog area.",
						"id" => "en_sidebar",
						"std" => "yes",
						"type" => "select",
						"options" => array("yes"=>"Yes","no"=>"No"));
				
$of_options[] = array(  "name" => "Sidebar Position",
						"desc" 		=> "Select the default position of the sidebar.",
						"id" => "sidebar_pos",
						"std" => "right",
						"type" => "select",
						"options" => array("left","right"));

$of_options[] = array(  "name" => "Posts Paginiation Position",
						"desc" 		=> "Select the position of the Posts Pagination",
						"id" => "posts_pagination",
						"std" => "left",
						"type" => "select",
						"options" => array("left" => "Left","center" => "Center", "right" => "Right"));

$of_options[] = array(  "name" => "Show Featured Images and Videos on Posts",
						"desc" 		=> "Globally Hide/Show Featured Images and Videos at the top of the page",
						"id" => "show_featured",
						"std" => "yes",
						"type" => "select",
						"options" => array("yes" => "Yes","no" => "No"));

$of_options[] = array( 	"name" 		=> "page-templ",
						"desc" 		=> "",
						"id" 		=> "page-templ-id",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Footer Instagram Widget</h3>
						Here you can define and create a Footer Instagram Widget",
						"icon" 		=> true,
						"type" 		=> "info"
				);

$of_options[] = array(  "name" => "Instagram Footer Widget",
						"desc" 		=> "Enable this option to create a Instangram Widget above the footer Area.",
						"id" => "en_instagram_footer",
						"std" => "0",
						"folds" => "1",
						"type" => "switch");

$of_options[] = array(  "name" => "Instagram Username",
						"desc" 		=> "Enter here your instagram username. E.g: travelmagazine",
						"id" => "instagram_username",
						"fold" => "en_instagram_footer",
						"type" => "text");

$of_options[] = array(  "name" => "Instagram Heading Title",
						"desc" 		=> "Leave blank for no Heading Title.",
						"id" => "instagram_footer_title",
						"std" => "Follow on Instagram",
						"fold" => "en_instagram_footer",
						"type" => "text");

$of_options[] = array(  "name" => "Instagram Heading Title Link",
						"desc" 		=> "Enter a link to your Instagram Profile.",
						"id" => "instagram_footer_title_link",
						"std" => "",
						"fold" => "en_instagram_footer",
						"type" => "text");

$of_options[] = array(  "name" => "Heading Title Font Size",
						"id" => "instagram_footer_title_font_size",
						"std" 		=> "15",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "50",
						"fold" => "en_instagram_footer",
						"type" 		=> "sliderui" 
				);

$of_options[] = array(  "name" =>  "Heading Title Color",
						"id" => "instagram_footer_title_color",
						"std" => "#ffffff",
						"fold" => "en_instagram_footer",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Heading Title Background Color",
						"id" => "instagram_footer_title_bg_color",
						"std" => "",
						"fold" => "en_instagram_footer",
						"type" => "color");	

$of_options[] = array(  "name" => "Heading Title Padding Top",
						"id" => "instagram_footer_title_padding_top",
						"std" 		=> "10",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "100",
						"fold" => "en_instagram_footer",
						"type" 		=> "sliderui" 
				);

$of_options[] = array(  "name" => "Heading Title Padding Bottom",
						"id" => "instagram_footer_title_padding_bottom",
						"std" 		=> "10",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "100",
						"fold" => "en_instagram_footer",
						"type" 		=> "sliderui" 
				);

$of_options[] = array(  "name" => "Photo Sizes",
						"desc" 		=> "Select the size of the pictures used to populate the instagram widget",
						"id" => "instagram_size",
						"fold" => "en_instagram_footer",
						"std" => "small",
						"type" => "select",
						"options" => array("thumbnail"=>"Thumbnail", "small"=>"Small","large"=>"Large","original"=>"Original"));

$of_options[] = array(  "name" => "Open Images",
						//"desc" 		=> "Select the size of the pictures used to populate the instagram widget",
						"id" => "instagram_links",
						"fold" => "en_instagram_footer",
						"std" => "prettyphoto",
						"type" => "select",
						"options" => array("_self"=>"Same Window","_blank"=>"New Window", "prettyphoto"=>"Pretty Photo - same window"));

$of_options[] = array( 	"name" 		=> "page-templ",
						"desc" 		=> "",
						"id" 		=> "page-templ-id",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Design Options</h3>
						Here you can modify the design options for the blog area",
						"icon" 		=> true,
						"type" 		=> "info"
				);

$of_options[] = array(  "name" => "Post Title and Meta Positioning",
						"desc" => "Select the Post Title and Meta positioning - will affect archive pages, page templates and single post pages",
						"id" => "post_meta_style",
						"std" => "below",
						"type" => "select",
						"options" => array("below"=>"Below Featured Images","above"=>"Above Featured Images"));

$of_options[] = array(  "name" => "Post Title and Meta Align",
						"desc" 		=> "Select the Alignment of the Post Title and Meta on archive pages",
						"id" => "post_meta_align",
						"std" => "default",
						"type" => "select",
						"options" => array("left"=>"Left", "center"=>"Center "));

$of_options[] = array(  "name" => "Post Meta Category location",
						"desc" 		=> "Select the position of the Category text`",
						"id" => "post_meta_category_pos",
						"std" => "default",
						"type" => "select",
						"options" => array( "default"=>"Below Post Title", "above"=>"Above Post Title" ));

$of_options[] = array(  "name" => "Force Post Title Uppercase",
						"desc" 		=> "Enable/disable the post title uppercase .",
						"id" => "en_post_uppercase",
						"std" => "0",
						"type" => "switch");

$of_options[] = array(  "name" => "Single Post Title and Meta Align",
						"desc" 		=> "Select the Alignment of the Post Title and Meta on single post pages",
						"id" => "single_post_meta_align",
						"std" => "left",
						"type" => "select",
						"options" => array("left"=>"Left", "center"=>"Center "));

$of_options[] = array(  "name" => "Single Post Title Html Tag",
						"id" => "post_title_tag",
						"std" => "h2",
						"desc" => "Select the html tag to be used for the Post Title.",
						"type" => "select",
						"options" => array("h1" => "H1", "h2" => "H2", "h3" => "H3", "h4" => "H4", "h5" => "H5"));

$of_options[] = array(  "name" => "Single Post Title font size (px)",
						"desc" 		=> "Enter the font size for the Single Post Title. Default: 26",
						"id" => "post_title_font_size",
						"std" => "26",
						"type" => "text");

$of_options[] = array(  "name" => "Single Post Title line height ",
						"desc" 		=> "Enter the line height value for the Single Post Title.",
						"id" => "post_title_line_height",
						"std" => "",
						"type" => "text");

$of_options[] = array(  "name" => "Single Post Title font weight",
						"desc" 		=> "Enter the font weight for the Single Post Title. Default: 400. ",
						"id" => "post_title_font_weight",
						"std" => "400",
						"type" => "text");

$of_options[] = array(  "name" =>  "Single Post Title color",
						"desc" => "Set the color for the Single Post Title. Leave blank if you want to inherit the Body text color.",
						"id" => "post_title_color",						
						"std" => "#dddddd",
						"type" => "color");	

$of_options[] = array(  "name" => "Archives Post Title Html Tag",
						"id" => "archives_post_title_tag",
						"std" => "h2",
						"desc" => "Select the html tag to be used for the Post Title on Archives pages.",
						"type" => "select",
						"options" => array("h1" => "H1", "h2" => "H2", "h3" => "H3", "h4" => "H4", "h5" => "H5"));

$of_options[] = array(  "name" => "Archives Post Title font size (px)",
						"desc" 		=> "Enter the font size for the Post Title on Archive Pages. Default: 26",
						"id" => "archives_post_title_font_size",
						"std" => "26",
						"type" => "text");

$of_options[] = array(  "name" => "Archives Post Title line height ",
						"desc" 		=> "Enter the line height value for the Post Title on Archive Pages.",
						"id" => "archives_post_title_line_height",
						"std" => "",
						"type" => "text");

$of_options[] = array(  "name" => "Archives Post Title font weight",
						"desc" 		=> "Enter the font weight for the Post Title on Archive Pages. Default: 400. ",
						"id" => "archives_post_title_font_weight",
						"std" => "400",
						"type" => "text");

$of_options[] = array(  "name" =>  "Inside Post Separator color",
						"desc" => "This color option will affect all the separators inside the post content area - excluding the sidebar elements",
						"id" => "post_content_separator",						
						"std" => "",
						"type" => "color");	

$of_options[] = array(  "name" => "Post Meta Font Size (px)",
						"desc" 		=> "Enter the font size for the Post Meta",
						"id" => "post_meta_font_size",
						"std" => "11",
						"type" => "text");

$of_options[] = array(  "name" => "Post Meta Icons",
						"desc" 		=> "Enable/disable the post meta icons.",
						"id" => "en_post_icons",
						"std" => "1",
						"type" => "switch");

$of_options[] = array(  "name" => "Post Meta Text Uppercase",
						"desc" 		=> "Uppercase the Post Meta Text.",
						"id" => "post_meta_uppercase",
						"std" => "1",
						"type" => "switch");

$of_options[] = array(  "name" =>  "Post Meta Text Color",
						"desc" => "",
						"id" => "post_meta_color",						
						"std" => "#b5b8bf",
						"type" => "color");

$of_options[] = array(  "name" =>  "Post Meta Link Color",
						"desc" => "",
						"id" => "post_meta_link_color",						
						"std" => "#b5b8bf",
						"type" => "color");

$of_options[] = array(  "name" =>  "Post Meta Link Color on Hover",
						"desc" => "Leave blank if you want to inherit the Link Color set under Theme Options -> Link Color on Hover",
						"id" => "post_meta_link_color_hover",						
						"std" => "",
						"type" => "color");

$of_options[] = array(  "name" => "Post Tags Font Size (px)",
						"id" 		=> "post_tags_font_size",
						"desc" 		=> "Enter the font size for the Post Tags",
						"std" => "11",
						"type" => "text");

$of_options[] = array(  "name" =>  "Social Sharing Icons Color",
						"desc" => "Leave blank to use the default colors.",
						"id" => "post_social_icons",						
						"std" => "",
						"type" => "color");
/*
$of_options[] = array(  "name" => "Social Sharing Icons Size",
						"desc" 		=> "Select the Size of the Social Sharing icons",
						"id" => "social_sharing_icons_size",
						"std" => "default",
						"type" => "select",
						"options" => array("default"=>"Left", "right"=>"Right"));
/*
$of_options[] = array(  "name" => "Tags style",
						"desc" 		=> "Select the style used to display the Tags",
						"id" => "tags_style",
						"std" => "default",
						"type" => "select",
						"options" => array("default"=>"Button Style", "text"=>"Text Style"));
*/
$of_options[] = array(  "name" => "Related Posts - Item Title Font Size (px)",
						"id" 		=> "related_posts_font_size",
						"desc" 		=> "Enter the font size for the Related Posts. Default: 13",
						"std" => "13",
						"type" => "text");

$of_options[] = array(  "name" => "Related Posts - Force Item Title Uppercase",
						"desc" 		=> "Enable/disable title uppercase for related posts items titles.",
						"id" => "related_posts_up",
						"std" => "0",
						"type" => "switch");

$of_options[] = array(  "name" =>  "Form Elements Background Color",
						"desc" => "Leave blank if you want to use a transparent background",
						"id" => "post_comment_bg",						
						"std" => "",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Form Elements Border Color",
						"desc" => "This option will affect the input fields and textarea elements",
						"id" => "post_comment_border",						
						"std" => "#ccc",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Form Elements Font Color",
						"desc" => "",
						"id" => "post_comment_color",						
						"std" => "#b2b2b6",
						"type" => "color");		

$of_options[] = array( 	"name" 		=> "page-templ",
						"desc" 		=> "",
						"id" 		=> "page-templ-id",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Sidebar Design</h3>
						Here you can modify the design settings for the Sidebars",
						"icon" 		=> true,
						"type" 		=> "info"
				);

$of_options[] = array(  "name" => "Widgets Content Align",
						"desc" 		=> "Select the alignment of the content inside Widgets",
						"id" => "widget_content_align",
						"std" => "left",
						"type" => "select",
						"options" => array("left"=>"Left","center"=>"Center", "right" => "Right"));

$of_options[] = array(  "name" => "Widgets Bottom Margin (px)",
						"id" 		=> "widgets_bottom_margin",
						"desc" 		=> "Select the bottom margin for Widgets. Default: 45px",
						"std" => "45px",
						"type" => "text");

$of_options[] = array(  "name" => "Force Widget Title Uppercase",
						"desc" 		=> "Enable/disable the widget title uppercase.",
						"id" => "en_widget_uppercase",
						"std" => "1",
						"type" => "switch");

$of_options[] = array(  "name" =>  "Widget Title Font Color",
						"desc" => "",
						"id" => "widget_title_color",						
						"std" => "#21252b",
						"type" => "color");

$of_options[] = array(  "name" => "Widget Title Alignment",
						"desc" 		=> "Select the alignment of the Widget Titles",
						"id" => "widget_title_align",
						"std" => "left",
						"type" => "select",
						"options" => array("left"=>"Left","center"=>"Center", "right" => "Right"));

$of_options[] = array(  "name" =>  "Widget Title Bar Color",
						"desc" => "",
						"id" => "widget_title_bar_color",						
						"std" => "#ececec",
						"type" => "color");

$of_options[] = array(  "name" => "Widget Title Bar Thickness (px)",
						"id" 		=> "widget_title_bar_thick",
						"desc" 		=> "Select the Thickness for the Title Bar. Use 0 to not show any bar for the Widget Title",
						"std" 		=> "1",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "15",						
						"type" 		=> "sliderui" );

$of_options[] = array(  "name" => "Widget Title Bar Position",
						"desc" 		=> "Select the Title Bar Position",
						"id" => "widget_title_bar_pos",
						"std" => "right",
						"type" => "select",
						"options" => array("right"=>"Right of the Title","below"=>"Below Title"));

$of_options[] = array(  "name" => "Widget Title Bar Width",
						"desc" 		=> "Select the width of the Title Bar - only works if Below Title option is selected under Widget Title Bar Position",
						"id" => "widget_title_bar_width",
						"std" => "full",
						"type" => "select",
						"options" => array("full"=>"Full Width","title"=>"Title Text Width"));

$of_options[] = array(  "name" => "Widget Title Bottom Padding (px)",
						"id" 		=> "widget_title_bar_bottom_padding",
						"desc" 		=> "Select the spacing between the Widget Title and the Bar - only works if Below Title option is selected under Widget Title Bar Position",
						"std" => "5",
						"type" => "text");

$of_options[] = array(  "name" => "Widget Title Bottom Margin (px)",
						"id" 		=> "widget_title_bar_bottom_margin",
						"desc" 		=> "Select the spacing between the Widget Title and the Widget Content",
						"std" => "10",
						"type" => "text");

$of_options[] = array(  "name" => "Show Caret Icon for Links",
						"desc" 		=> "Show or hide the caret icon for links inside the sidebar. Select no to not show any caret icon to the left of the links.",
						"id" => "show_caret_links",
						"std" => "default",
						"type" => "select",
						"options" => array("default"=>"Yes", "no"=>"No"));

$of_options[] = array( 			
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Social Links Widget</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);

$of_options[] = array(  "name" =>  "Social Links Widget - icons color",
						"desc" => "Leave blank to use the default colors.",
						"id" => "side_social_links_color",						
						"std" => "",
						"type" => "color");

$of_options[] = array(  "name" =>  "Social Links Widget - icons background color",
						"desc" => "Leave blank to use the default colors.",
						"id" => "side_social_links_bg",						
						"std" => "",
						"type" => "color");

$of_options[] = array(  "name" => "Social Links Widget - icons shape",
						"desc" 		=> "Select the shape to use for the Social Links widget - only works if a background color is selected for the Icons Background Color above.",
						"id" => "side_social_links_shape",
						"std" => "full",
						"type" => "select",
						"options" => array("square"=>"Square","round"=>"Round", "circle"=>"Circle"));

$of_options[] = array(  "name" => "Social Links Widget - icons size",
						"desc" 		=> "Select the Size of the Social Links icons",
						"id" => "side_social_links_size",
						"std" => "normal",
						"type" => "select",
						"options" => array("normal"=>"Normal", "small"=>"Small", "large"=>"Large"));

$of_options[] = array(  "std" 		=> "<h3 style=\"margin: 0 0 10px;\">MailChimp for WordPress Widget</h3>These settings require the MailChimp for WordPress plugin to be installed",
						
						"icon" 		=> true,
						"type" 		=> "info" );

$of_options[] = array(  "name" =>  "Mailchimp Background Color",
						"desc" => "Select a custom color for the Mailchimp Widget.",
						"id" => "mc_bg_color",						
						"std" => "",
						"type" => "color");

$of_options[] = array(  "name" => "Mailchimp Padding Left/Right",
						"id" 		=> "mc_padding_lr",
						"desc" 		=> "Select the padding left/right for the Mailchimp widget.",
						"std" 		=> "20",
						"min" 		=> "0",
						"step"		=> "5",
						"max" 		=> "100",						
						"type" 		=> "sliderui" );

$of_options[] = array(  "name" => "Mailchimp Padding Top/Bottom",
						"id" 		=> "mc_padding_tb",
						"desc" 		=> "Select the padding top/bottom for the Mailchimp widget.",
						"std" 		=> "20",
						"min" 		=> "0",
						"step"		=> "5",
						"max" 		=> "100",						
						"type" 		=> "sliderui" );

$of_options[] = array(  "name" =>  "Mailchimp Label Color",
						"desc" => "Select a custom color for the labels inside Mailchimp Widget.",
						"id" => "mc_label_color",						
						"std" => "",
						"type" => "color");

$of_options[] = array(  "name" => "Mailchimp Label Font Size (px)",
						"id" 		=> "mc_label_font_size",
						"desc" 		=> "Enter the font size for the labels used inside the Mailchimp Widget. Default: 13",
						"std" 		=> "13",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "30",						
						"type" 		=> "sliderui" );

$of_options[] = array(  "name" => "Mailchimp Label Font Style",
						"desc" 		=> "Select the font style for the labels.",
						"id" => "mc_label_font_style",
						"std" => "normal",
						"type" => "select",
						"options" => array("normal"=>"Normal", "italic" => "Italic" ));	

$of_options[] = array(  "name" => "Mailchimp Label bottom margin (px)",
						"id" 		=> "mc_label_margin",
						"desc" 		=> "Select the bottom margin for labels.",
						"std" 		=> "5",
						"min" 		=> "0",
						"step"		=> "5",
						"max" 		=> "100",						
						"type" 		=> "sliderui" );

$of_options[] = array(  "name" =>  "Mailchimp Input Fields Border Color",
						"desc" => "Select the border color of the input fields inside the Mailchimp Widget.",
						"id" => "mc_input_border_color",						
						"std" => "",
						"type" => "color");

$of_options[] = array(  "name" =>  "Mailchimp Input Fields Background Color",
						"desc" => "Select the background color of the input fields inside the Mailchimp Widget.",
						"id" => "mc_input_bg_color",						
						"std" => "",
						"type" => "color");

$of_options[] = array(  "name" => "Mailchimp Input Fields Font Size (px)",
						"id" 		=> "mc_input_font_size",
						"desc" 		=> "Select the font size for the Input Fields.",
						"std" 		=> "13",
						"min" 		=> "10",
						"step"		=> "5",
						"max" 		=> "100",						
						"type" 		=> "sliderui" );

$of_options[] = array(  "name" =>  "Mailchimp Input Fields Font Color",
						"desc" => "Select the font color of the input fields inside the Mailchimp Widget.",
						"id" => "mc_input_font_color",						
						"std" => "",
						"type" => "color");

$of_options[] = array(  "name" =>  "Mailchimp Submit Button Background Color",
						"desc" => "Select the background color of the submit button",
						"id" => "mc_submit_bg",						
						"std" => "#222222",
						"type" => "color");

$of_options[] = array(  "name" =>  "Mailchimp Submit Button Background Color on Hover",
						"desc" => "Select the background color on hover of the submit button",
						"id" => "mc_submit_bg_hover",						
						"std" => "#4c4c4c",
						"type" => "color");

$of_options[] = array(  "name" =>  "Mailchimp Submit Button Text Color",
						"desc" => "Select the text color of the submit button",
						"id" => "mc_submit_color",						
						"std" => "#FFFFFF",
						"type" => "color");

$of_options[] = array(  "name" =>  "Mailchimp Submit Button Text Color on Hover",
						"desc" => "Select the text color on hover of the submit button",
						"id" => "mc_submit_color_hover",						
						"std" => "#FFFFFF",
						"type" => "color");

$of_options[] = array(  "name" => "Mailchimp Submit Button Size",
						"desc" 		=> "Select the size of the Submit Button",
						"id" => "mc_submit_size",
						"std" => "normal",
						"type" => "select",
						"options" => array("normal"=>"Normal", "full" => "Full Width" ));	

$of_options[] = array(  "std" 		=> "<h3 style=\"margin: 0 0 10px;\">About Me Widget</h3>",						
						"type" 		=> "info" );

$of_options[] = array(  "name" =>  "Heading Color",						
						"id" => "about_heading_color",						
						"std" => "",
						"type" => "color");

$of_options[] = array(  "name" => "Heading Font Size (px)",
						"id" 		=> "about_heading_font_size",
						"desc" 		=> "Select the font size for the About Me Heading.",
						"std" 		=> "14",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "50",						
						"type" 		=> "sliderui" );

$of_options[] = array(  "name" => "Heading Font Weight",
						"desc" 		=> "Enter the font weight for the About Me Heading text. E.g: 400,500,600,700",
						"id" => "about_heading_font_weight",
						"std" => "",
						"type" => "text");

$of_options[] = array(  "name" =>  "Description Color",						
						"id" => "about_description_color",						
						"std" => "",
						"type" => "color");

$of_options[] = array(  "name" => "Description Font Size (px)",
						"id" 		=> "about_description_font_size",
						"desc" 		=> "Select the font size for the About Me Heading.",
						"std" 		=> "13",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "50",						
						"type" 		=> "sliderui" );

$of_options[] = array(  "std" 		=> "<h3 style=\"margin: 0 0 10px;\">Twitter Feed Widget</h3>",
						"icon" 		=> true,
						"type" 		=> "info" );

$of_options[] = array(  "name" =>  "Twitter Feed Widget - icon color",
						"desc" => "Select a custom color for the Twitter Fedd Icon. Leave blank to use the default colors.",
						"id" => "side_twitter_color",						
						"std" => "",
						"type" => "color");

$of_options[] = array(  "std" 		=> "<h3 style=\"margin: 0 0 10px;\">Contact Us Widget</h3>",
						"icon" 		=> true,
						"type" 		=> "info" );

$of_options[] = array(  "name" =>  "Contact Us Widget - icons color",
						"desc" => "Select a custom color for the Contact Us icons. Leave blank to use the default colors.",
						"id" => "side_contact_color",						
						"std" => "",
						"type" => "color");

$of_options[] = array(  "std" 		=> "<h3 style=\"margin: 0 0 10px;\">Recent Portfolio Widget</h3>",
						"icon" 		=> true,
						"type" 		=> "info" );

$of_options[] = array(  "name" => "Recent Portfolio Widget - Thumnbnails Size",
						"desc" 		=> "Select the size of the thumbnails used for the Recent Portfolio Widget.",
						"id" => "recent_portfolio_widget_thumb",
						"std" => "small",
						"type" => "select",
						"options" => array("small"=>"Small", "large" => "Large" ));	

$of_options[] = array(  "std" 		=> "<h3 style=\"margin: 0 0 10px;\">Recent Posts Widget</h3>",
						"icon" 		=> true,
						"type" 		=> "info" );

$of_options[] = array(  "name" => "Recent Posts Widget - Thumnbnails Size",
						"desc" 		=> "Select the size of the thumbnails used for the Recent Posts Widget.",
						"id" => "recent_posts_widget_thumb",
						"std" => "small",
						"type" => "select",
						"options" => array("small"=>"Small", "large" => "Large" ));	

$of_options[] = array(  "name" => "Recent Posts Widget - Title Font Size (px)",
						"desc" 		=> "Enter the font size for the Title of the Recent Posts Widget. Default: 13",
						"id" => "recent_posts_widget_font_size",
						"std" => "13",
						"type" => "text");

$of_options[] = array(  "name" => "Recent Posts Widget - Date Font Size (px)",
						"desc" 		=> "Enter the font size for the Date of the Recent Posts Widget. Default: 11",
						"id" => "recent_posts_widget_date_size",
						"std" => "11",
						"type" => "text");

$of_options[] = array( 	"name" 		=> "page-templ",
						"desc" 		=> "",
						"id" 		=> "page-templ-id",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Templates and Archive Pages</h3>
						Here you can modify settings for the Blog page templates",
						"icon" 		=> true,
						"type" 		=> "info"
				);

$of_options[] = array(  "name" => "Images Hover Effect",
						"desc" 		=> "Enable/disable the hover effect for images.",
						"id" => "en_hover_effect",
						"std" => "1",
						"type" => "switch");
/*
$of_options[] = array(  "name" => "Sidebar on Archive Pages",
						"desc" 		=> "Enable/disable the sidebar for archive pages only - search result page, tags page, category pages, author pages.",
						"id" => "en_sidebar_archive",
						"std" => "1",
						"type" => "switch");
*/
$of_options[] = array(  "name" => "Blog Style Big Image - Thumnbnails",
						"desc" 		=> "Select the size of the thumbnails used for the Blog Style Big Image template.",
						"id" => "big_layout_thumb",
						"std" => "full",
						"type" => "select",
						"options" => array("full"=>"Full", "medium" => "Medium Thumbnails" ));						
						
$of_options[] = array(  "name" => "Archives Pages Style",
						"desc" 		=> "Select the blogposts style on search result pages, category pages, archives pages and tag pages.",
						"id" => "blog_images",
						"std" => "right",
						"type" => "select",
						"options" => array("big"=>"Big Images", "small" => "Small Images", "grid" => "Grid Images", "masonry" => "Masonry Images" ));	

$of_options[] = array(  "name" => "Grid Columns",
						"desc" 		=> "If Grid Images or Masonry Images is selected above, choose how many columns to use.",
						"id" => "grid_cols",
						"std" => "3",
						"type" => "select",
						"options" => array("2"=>"2 Columns", "3" => "3 Columns", "4" => "4 Columns", "5" => "5 Columns" ));	

$of_options[] = array(  "name" => "Force Full Width",
						"desc" 		=> "Force Full Width style for search result pages, category pages, archive pages and tag pages.",
						"id" => "index_full_width",
						"std" => "no",
						"type" => "select",
						"options" => array("no"=>"No","yes"=>"Yes"));

$of_options[] = array( 	"name" 		=> "page-templ",
						"desc" 		=> "",
						"id" 		=> "page-templ-id",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Small Images - Design Options</h3>
						Here you can modify settings for the Small Images",
						"icon" 		=> true,
						"type" 		=> "info"
				);

$of_options[] = array(  "name" => "Images Width - in percents (%)",
						"id" => "small_image_width",
						"desc" => "This option controls the actual width of the images, when using the Small Images option",
						"std" 		=> "30",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "100",						
						"type" 		=> "sliderui" 
				);	

$of_options[] = array(  "name" => "Description Width - in percents (%)",
						"id" => "small_image_desc_width",
						"desc" => "This option controls the actual width of the description, when using the Small Images option",
						"std" 		=> "67",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "100",						
						"type" 		=> "sliderui" 
				);

$of_options[] = array(  "name" => "Images Position",
						"desc" 		=> "Select the position of the Small Images.",
						"id" => "small_image_pos",
						"std" => "left",
						"type" => "select",
						"options" => array("default"=>"Left","right"=>"Right"));

$of_options[] = array(  "name" => "Make First Post Full Width",
						"desc" 		=> "Enable this option to force only the First Post to be displayed in Full Width layout. <br>This option will work for: Small Images and Grid Images page styles. ",
						"id" => "show_first_post_big_layout",
						"std" => "0",
						"type" => "switch");											

$of_options[] = array( 	"name" 		=> "page-templ",
						"desc" 		=> "",
						"id" 		=> "page-templ-id",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Single Post Page options</h3>
						Here you can modify settings for the Single Post Page",
						"icon" 		=> true,
						"type" 		=> "info"
				);
			
$of_options[] = array(  "name" => "Blog Posts Navigation",
						"desc" 		=> "Enable/disable blog posts navigation.",
						"id" => "show_post_navi",
						"std" => "1",
						"type" => "switch");	
						
$of_options[] = array(  "name" => "Related Posts",
						"desc" 		=> "Enable/disable related posts.",
						"id" => "related_posts",
						"std" => "1",
						"folds" => "1",
						"type" => "switch");
						
$of_options[] = array(  "name" => "Related Posts Count",
						"id" => "related_items",
						"std" 		=> "5",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "10",
						"fold" => "related_posts",
						"type" 		=> "sliderui" 
				);								
						
$of_options[] = array(  "name" => "Social Sharing Icons",
						"desc" 		=> "Enable/disable social sharing icons on single post pages.",
						"id" => "social_icons",
						"std" => "1",
						"type" => "switch");

$of_options[] = array(  "name" => "Social Sharing Icons - Archive Pages",
						"desc" 		=> "Enable/disable social sharing icons on archive pages.",
						"id" => "social_icons_archives",
						"std" => "0",
						"type" => "switch");
						
$of_options[] = array(  "name" => "Show Date",
						"desc" 		=> "Show date on archives pages and single post pages.",
						"id" => "show_date",
						"std" => "1",
						"type" => "switch");

$of_options[] = array(  "name" => "Show View More/Continue Reading",
						"desc" 		=> "Show view more/continue reading link on archives pages.",
						"id" => "show_view_more",
						"std" => "1",
						"folds" => "1",						
						"type" => "switch");												
						
$of_options[] = array(  "name" => "Show Author",
						"desc" 		=> "Show author meta on archives pages and single post pages.",
						"id" => "show_author",
						"std" => "1",
						"type" => "switch");
						
$of_options[] = array(  "name" => "Show Categories",
						"desc" 		=> "Show categories meta on archives pages and single post pages.",
						"id" => "show_categories",
						"std" => "1",
						"type" => "switch");	
						
$of_options[] = array(  "name" => "Show Tags",
						"desc" 		=> "Show post tags on archives pages and single post pages.",
						"id" => "show_tags",
						"std" => "1",
						"type" => "switch");	
						
$of_options[] = array(  "name" => "Show Comments",
						"desc" 		=> "Show comments meta on archives pages and single post pages.",
						"id" => "show_comments",
						"std" => "1",
						"type" => "switch");

$of_options[] = array( 	"name" 		=> "page-templ",
						"desc" 		=> "",
						"id" 		=> "page-templ-id",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Social Sharing Icons</h3>
						Use these options to change the Social Sharing Icons",
						"icon" 		=> true,
						"type" 		=> "info"
				);

$of_options[] = array(  "name" => "Share on Facebook",
						"id" => "share_facebook",
						"std" => "yes",
						"type" => "select",
						"options" => array("yes" => "Yes", "no"=> "No"));

$of_options[] = array(  "name" => "Share on Twitter",
						"id" => "share_twitter",
						"std" => "yes",
						"type" => "select",
						"options" => array("yes" => "Yes", "no"=> "No"));	

$of_options[] = array(  "name" => "Share on LinkedIn",
						"id" => "share_linkedin",
						"std" => "yes",
						"type" => "select",
						"options" => array("yes" => "Yes", "no"=> "No"));	

$of_options[] = array(  "name" => "Share on Pinterest",
						"id" => "share_pinterest",
						"std" => "yes",
						"type" => "select",
						"options" => array("yes" => "Yes", "no"=> "No"));																		

$of_options[] = array(  "name" => "Share on Reddit",
						"id" => "share_reddit",
						"std" => "yes",
						"type" => "select",
						"options" => array("yes" => "Yes", "no"=> "No"));

$of_options[] = array(  "name" => "Share on Tumblr",
						"id" => "share_tumblr",
						"std" => "yes",
						"type" => "select",
						"options" => array("yes" => "Yes", "no"=> "No"));

$of_options[] = array(  "name" => "Share on Google+",
						"id" => "share_gplus",
						"std" => "yes",
						"type" => "select",
						"options" => array("yes" => "Yes", "no"=> "No"));

$of_options[] = array( 	"name" 		=> "page-templ",
						"desc" 		=> "",
						"id" 		=> "page-templ-id",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">View More/Continue Reading link</h3>
						Alter the design options for the View More/Continue Reading link",
						"icon" 		=> true,
						"type" 		=> "info"
				);

$of_options[] = array(  "name" => "View More/Continue Reading style",
						"desc" 		=> "Select the style for the view more/continue reading text",
						"id" => "view_more_style",
						"std" => "button",
						"type" => "select",
						"options" => array("button"=>"Button Link","text"=>"Text Link"));

$of_options[] = array(  "name" => "View More/Continue Reading Position",
						"desc" 		=> "Select the position of the View More/Continue Reading link. This will also affect the position of the Social Sharing Icons for Archive pages.",
						"id" => "view_more_position",
						"std" => "default",
						"type" => "select",
						"options" => array("default"=>"Left","right"=>"Right", "center" => "Center"));

$of_options[] = array(  "name" =>  "View More/Continue Reading Text Color",
						"desc" => "Select the color of the text",
						"id" => "view_more_color",						
						"std" => "#ffffff",
						"type" => "color");	

$of_options[] = array(  "name" =>  "View More/Continue Reading Background Color",
						"desc" => "Select the background color. Only works if Button Link style is selected",
						"id" => "view_more_bg_color",						
						"std" => "#5bc98c",
						"type" => "color");

$of_options[] = array(  "name" =>  "View More/Continue Reading Border Color",
						"desc" => "Select the border color. Only works if Button Link style is selected",
						"id" => "view_more_border_color",						
						"std" => "#5bc98c",
						"type" => "color");

$of_options[] = array(  "name" =>  "View More/Continue Reading Text Color on Hover",
						"desc" => "Select the color of the text on hover",
						"id" => "view_more_color_hover",						
						"std" => "#ffffff",
						"type" => "color");	

$of_options[] = array(  "name" =>  "View More/Continue Reading Background Color on Hover",
						"desc" => "Select the background color on hover. Only works if Button Link style is selected",
						"id" => "view_more_bg_color_hover",						
						"std" => "#479e85",
						"type" => "color");		

$of_options[] = array(  "name" =>  "View More/Continue Reading Border Color on Hover",
						"desc" => "Select the border color on hover. Only works if Button Link style is selected",
						"id" => "view_more_border_color_hover",						
						"std" => "#479e85",
						"type" => "color");																																																																		
				
$of_options[] = array( 	"name" 		=> "Portfolio",
						"type" 		=> "heading"
				);
				
$of_options[] = array(  "name" => "Portfolio Details Custom Text",
						"desc" 		=> "Enable this option if you want to change the default texts used for Portfolio Details. Will only appear on the Front End.",
						"id" => "pd_custom",
						"std" => "0",
						"folds" =>"1",
						"type" => "switch");
						
$of_options[] = array( 	"name" 		=> "Client name",
						"desc" 		=> "Enter the text you want to use instead of Client name",
						"id" 		=> "client_name_custom",
						"std" 		=> "Client name",
						"fold" => "pd_custom",
						"type" 		=> "text"
				);	
				
$of_options[] = array( 	"name" 		=> "Skills",
						"desc" 		=> "Enter the text you want to use instead of Skills",
						"id" 		=> "skills_custom",
						"std" 		=> "Skills",
						"fold" => "pd_custom",
						"type" 		=> "text"
				);	
				
$of_options[] = array( 	"name" 		=> "Category",
						"desc" 		=> "Enter the text you want to use instead of Category",
						"id" 		=> "category_custom",
						"std" 		=> "Category",
						"fold" => "pd_custom",
						"type" 		=> "text"
				);	
				
$of_options[] = array( 	"name" 		=> "Website",
						"desc" 		=> "Enter the text you want to use instead of Website",
						"id" 		=> "website_custom",
						"std" 		=> "Website",
						"fold" => "pd_custom",
						"type" 		=> "text"
				);																				
				
$of_options[] = array(  "name" => "Portfolio Slug",
						"desc" => "Change/Rewrite the permalink when you use the permalink type as %postname%.<strong>Make sure to regenerate permalinks.</strong>",
						"id" => "portfolio_slug",
						"std" => "portfolio-items",
						"type" => "text");					
				
$of_options[] = array( 	"name" 		=> "Project Details Text",
						"desc" 		=> "Enter the text you want to use for Project Details. Default is: Project Details.<br />Leave empty if you don't want to show anything.",
						"id" 		=> "project_details_text",
						"std" 		=> "Project Details",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Project Description Text",
						"desc" 		=> "Enter the text you want to use for Project Description. Default is: Project Description.<br />Leave empty if you don't want to show anything.",
						"id" 		=> "project_description_text",
						"std" 		=> "Project Description",
						"type" 		=> "text"
				);										
				
$of_options[] = array(  "name" => "Portfolio Items Count",
						"id" => "portfolio_items",
						"std" 		=> "10",						
						"type" 		=> "text",
						"desc" 		=> "Enter how many portfolio items to show. Enter -1 to show all your posts on one page.", 
				);

$of_options[] = array(  "name" => "Portfolio Navigation",
						"desc" 		=> "Enable/disable portfolio navigation.",
						"id" => "show_port_navi",
						"std" => "1",
						"type" => "switch");
						
$of_options[] = array(  "name" => "Show Project Date",
						"desc" 		=> "Enable/Disable project date on single portfolio pages.",
						"id" => "project_date",
						"std" => "1",
						"type" => "switch");										
				
$of_options[] = array(  "name" => "Show Project Details",
						"desc" 		=> "Enable/Disable project details on single portfolio pages.",
						"id" => "project_details",
						"std" => "1",
						"type" => "switch");

$of_options[] = array(  "name" => "Show Social Sharing Icons",
						"desc" 		=> "Enable/Disable social sharing icons on single portfolio pages.",
						"id" => "port_social_icons",
						"std" => "1",
						"type" => "switch");							
						
$of_options[] = array(  "name" => "Show Related Projects",
						"desc" 		=> "Enable/Disable related projects on single portfolio pages.",
						"id" => "related_projects",
						"std" => "1",
						"type" => "switch");	
						
$of_options[] = array(  "name" => "Related Projects Count",
						"id" => "portfolio_related_items",
						"std" 		=> "5",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "10",
						"type" 		=> "sliderui" 
				);

$of_options[] = array( 	"name" 		=> "Events Calendar",
						"type" 		=> "heading"
				);

$of_options[] = array(  "name" =>  "Events Calendar Main Color",
						"desc" => "",
						"id" => "events_main_color",
						"std" => "#2f852e",
						"type" => "color");	

$of_options[] = array( 	"name" 		=> "bbPress Options",
						"type" 		=> "heading"
				);

$of_options[] = array(  "name" =>  "bbPress Main Color",
						"desc" => "",
						"id" => "bbpress_main_color",
						"std" => "#5bc98c",
						"type" => "color");	

$of_options[] = array(  "name" =>  "bbPress Heading Text Color",
						"desc" => "",
						"id" => "bbpress_heading_text_color",
						"std" => "#ffffff",
						"type" => "color");	

$of_options[] = array(  "name" => "bbPress Enable Sidebar",
						"desc" 		=> "Enable/Disable sidebar on bbPress pages.",
						"id" => "bbpress_sidebar",
						"std" => "1",
						"folds" => 1,
						"type" => "switch");

$of_options[] = array( "name" => "Woocommerce Sidebar Select",
						"desc" => "Select the sidebar that will be used on your bbPress forum page.",
						"id" => "bbpress_sidebar_select",
						"std" => "bbPress Sidebar",
						"type" => "select",
						"fold" => "bbpress_sidebar",
						"options" => $sidebar_options
					);	

				
$of_options[] = array( 	"name" 		=> "WooCommerce",
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> "woo-header-shop-top",
						"desc" 		=> "",
						"id" 		=> "woo-header-shop-top",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">WooCommerce General Settings</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);	


$of_options[] = array(  "name" => "WooCommerce Deactivate on Non-Shop Pages",
						"desc" 		=> "Enable this option if you don't want the woocommerce styles & javascript to be loaded on pages where WooCommerce is not used - recommended for speed optimization.",
						"id" => "disable_woocommerce",
						"std" => "0",						
						"type" => "switch");

$of_options[] = array( 	"name" 		=> "Products per Page",
						"desc" 		=> "Select how many products to display per page",
						"id" 		=> "products_per_page",
						"std" 		=> "10",
						"type" 		=> "text"
				);	

$of_options[] = array(  "name" => "WooCommerce Image Size on Shop & Archives",
						"id" => "woo_image_size",
						"std" => "right",
						"desc" => "Select the size of the images used on Shop and Archive pages. <br>If <strong>Catalog Image</strong> is selected, the image will be using the width and height defined under WooCommerce -> Settings -> Products -> Display -> Catalog Images.",
						"type" => "select",						
						"options" => array("full" => "Full Image","catalog" => "Catalog Image"));

$of_options[] = array(  "name" => "Show Secondary Image on Hover",
						"id" => "woo_second_image",
						"std" => "no",
						"desc" => "Select Yes to show the secondary featured image set for your Product.",
						"type" => "select",						
						"options" => array("no" => "No","yes" => "Yes"));

$of_options[] = array( 	"name" 		=> "woo-butt",
						"desc" 		=> "",
						"id" 		=> "woo-butt",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">WooCommerce Default Button</h3>Use these settings here to change the colors of the buttons used on WooCommerce pages: cart, checkout, account, etc. This settings will not affect the Add to Cart button on Single Product Page",
						"icon" 		=> true,
						"type" 		=> "info"
				);

$of_options[] = array(  "name" =>  "Button Text Color",
						"desc" => "Set the text color of the button",
						"id" => "woo_default_text",
						"std" => "#ffffff",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Button Background Color",
						"desc" => "Set the background color of the button",
						"id" => "woo_default_bg",
						"std" => "#333333",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Button Border Color",
						"desc" => "Set the border color of the button",
						"id" => "woo_default_border",
						"std" => "#333333",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Button Text Color on Hover",
						"desc" => "Set the text color of the button on hover",
						"id" => "woo_default_text_hover",
						"std" => "#ffffff",
						"type" => "color");

$of_options[] = array(  "name" =>  "Button Background Color on Hover",
						"desc" => "Set the background color of the button",
						"id" => "woo_default_bg_hover",
						"std" => "#555555",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Button Border Color on Hover",
						"desc" => "Set the border color of the button",
						"id" => "woo_default_border_hover",
						"std" => "#555555",
						"type" => "color");	

$of_options[] = array( 	"name" 		=> "woo-check",
						"desc" 		=> "",
						"id" 		=> "woo-check",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">WooCommerce Checkout Button</h3>Use these settings here to change the colors of the Checkout Button - on the checkout page.",
						"icon" 		=> true,
						"type" 		=> "info"
				);

$of_options[] = array(  "name" =>  "Checkout Button Text Color",
						"desc" => "Set the text color of the Checkout button",
						"id" => "woo_checkout_text",
						"std" => "#ffffff",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Checkout Button Background Color",
						"desc" => "Set the background color of the Checkout button",
						"id" => "woo_checkout_bg",
						"std" => "#333333",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Checkout Button Border Color",
						"desc" => "Set the border color of the Checkout button",
						"id" => "woo_checkout_border",
						"std" => "#333333",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Checkout Button Text Color on Hover",
						"desc" => "Set the text color of the Checkout button on hover",
						"id" => "woo_checkout_text_hover",
						"std" => "#ffffff",
						"type" => "color");

$of_options[] = array(  "name" =>  "Checkout Button Background Color on Hover",
						"desc" => "Set the background color of the Checkout button",
						"id" => "woo_checkout_bg_hover",
						"std" => "#555555",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Checkout Button Border Color on Hover",
						"desc" => "Set the border color of the Checkout button",
						"id" => "woo_checkout_border_hover",
						"std" => "#555555",
						"type" => "color");											

$of_options[] = array( 	"name" 		=> "woo-prod-page",
						"desc" 		=> "",
						"id" 		=> "woo-prod-page",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">WooCommerce Product Page Design & Functionality</h3>Use these settings here to change the design and functionality of the Product Page.",
						"icon" 		=> true,
						"type" 		=> "info"
				);

$of_options[] = array(  "name" => "Product Title Html Heading Tag",
						"id" => "woo_prod_title_tag",
						"std" => "h2",
						"desc" => "Select the Html Heading tag used for the Product Title",
						"type" => "select",						
						"options" => array("h1" => "H1", "h2" => "H2", "h3" => "H3", "h4" => "H4", "h5" => "H5"));

$of_options[] = array( 	"name" 		=> "Product Title Font Size (px)",
						"desc" => "Default is 20",
						"id" => "woo_single_prod_title_font_size",
						"std" 		=> "20",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "60",
						"type" 		=> "sliderui" 
				);

$of_options[] = array(  "name" =>  "Product Title Color",
						"desc" => "Set the color of the Product Title",
						"id" => "woo_single_prod_title_color",
						"std" => "#333333",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Product Review Stars Color",
						"desc" => "Set the color of the Product Review Stars",
						"id" => "woo_single_prod_stars_color",
						"std" => "#fdca00",
						"type" => "color");	

$of_options[] = array( 	"name" 		=> "Product Price Font Size (px)",
						"desc" => "Default is 16",
						"id" => "woo_single_prod_price_font_size",
						"std" 		=> "16",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "60",
						"type" 		=> "sliderui" 
				);

$of_options[] = array(  "name" =>  "Product Price Color",
						"desc" => "Set the color of the Product Price",
						"id" => "woo_single_prod_price_color",
						"std" => "#222222",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Product on Sale Regular Price Color",
						"desc" => "Set the color of the Product on Sale Regular Price",
						"id" => "woo_single_prod_sale_regular_price_color",
						"std" => "#ccc",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Add to Cart Button Text Color",
						"desc" => "Set the text color for the Add to Cart Button",
						"id" => "woo_single_prod_add_cart_color",
						"std" => "#ffffff",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Add to Cart Button Background Color",
						"desc" => "Set the background color for the Add to Cart Button",
						"id" => "woo_single_prod_add_cart_bg",
						"std" => "#111111",
						"type" => "color");

$of_options[] = array(  "name" =>  "Add to Cart Button Border Color",
						"desc" => "Set the border color for the Add to Cart Button",
						"id" => "woo_single_prod_add_cart_border",
						"std" => "#111111",
						"type" => "color");

$of_options[] = array(  "name" =>  "Add to Cart Button Text Color on Hover",
						"desc" => "Set the text color for the Add to Cart Button on Hover",
						"id" => "woo_single_prod_add_cart_color_hover",
						"std" => "#ffffff",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Add to Cart Button Background Color on Hover",
						"desc" => "Set the background color for the Add to Cart Button on Hover",
						"id" => "woo_single_prod_add_cart_bg_hover",
						"std" => "#333333",
						"type" => "color");

$of_options[] = array(  "name" =>  "Add to Cart Button Border Color on Hover",
						"desc" => "Set the border color for the Add to Cart Button on Hover",
						"id" => "woo_single_prod_add_cart_border_hover",
						"std" => "#333333",
						"type" => "color");

$of_options[] = array(  "name" =>  "Quantity Buttons Background Color on Hover",
						"desc" => "Set the background color for the Quantity Buttons on Hover",
						"id" => "woo_qty_button_bg_hover",
						"std" => "#333333",
						"type" => "color");

$of_options[] = array(  "name" => "Show Product Availability",
						"desc" 		=> "Enable/Disable product availability",
						"id" => "woo_single_prod_stock",
						"std" => "0",
						"folds" => 1,
						"type" => "switch");

$of_options[] = array(  "name" => "Show Product Stock Quantity",
						"desc" 		=> "Enable/Disable product stock quantity",
						"id" => "woo_single_prod_stock_qty",
						"std" => "0",
						"fold" => "woo_single_prod_stock",
						"type" => "switch");

$of_options[] = array(  "name" => "Product Sharing",
						"desc" 		=> "Enable/Disable product sharing",
						"id" => "woo_product_share",
						"std" => "0",						
						"type" => "switch");

$of_options[] = array(  "name" => "Product Tabs Style",
						"id" => "woocommerce_tabs_style",
						"std" => "right",
						"type" => "select",						
						"options" => array("style1" => "Style 1", "style2" => "Style 2", "style3" => "Style 3", "style4" => "Style 4"));

$of_options[] = array(  "name" =>  "Product Tabs - Active Tab Border",
						"desc" => "Set the border color of the Active Tab",
						"id" => "woocommerce_tabs_active",
						"std" => "#333333",
						"type" => "color");

$of_options[] = array( 	"name" 		=> "woo-header-shop-top",
						"desc" 		=> "",
						"id" 		=> "woo-header-shop-top",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">WooCommerce Categories</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);	
				
$of_options[] = array(  "name" => "Animate Categories on Hover",
						"desc" 		=> "Enable/Disable animation effect when hovering mouse over Product Categories .",
						"id" => "woo_categs_animation",
						"std" => "1",
						"folds" => 1,
						"type" => "switch");

$of_options[] = array( 	"name" 		=> "Categories Title Font Size (px)",
						"desc" => "Default is 15",
						"id" => "woo_categs_title_font_size",
						"std" 		=> "15",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "60",
						"type" 		=> "sliderui" 
				);

$of_options[] = array(  "name" =>  "Categories Title Color",
						"desc" => "Set the color of the Category Titles",
						"id" => "woo_categs_title",
						"std" => "#333333",
						"type" => "color");

$of_options[] = array(  "name" =>  "Categories Title Background Color",
						"desc" => "Set the background color of the Category Titles",
						"id" => "woo_categs_title_bg",
						"std" => "#ffffff",
						"type" => "color");

$of_options[] = array(  "name" => "Products Count",
						"desc" 		=> "Enable/Disable the product count next to category titles.",
						"id" => "woo_categs_pr_count",
						"std" => "1",
						"folds" => 1,
						"type" => "switch");

$of_options[] = array( 	"name" 		=> "woo-header-shop-top",
						"desc" 		=> "",
						"id" 		=> "woo-header-shop-top",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">WooCommerce Sidebar</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);	
				
$of_options[] = array(  "name" => "WooCommerce Enable Sidebar",
						"desc" 		=> "Enable/Disable sidebar on WooCommerce pages.",
						"id" => "woocommerce_sidebar_en",
						"std" => "1",
						"folds" => 1,
						"type" => "switch");
						
$of_options[] = array( "name" => "Woocommerce Sidebar Select",
						"desc" => "Select the sidebar that will be added to your shop.",
						"id" => "woocommerce_archive_sidebar",
						"std" => "None",
						"type" => "select",
						"fold" => "woocommerce_sidebar_en",
						"options" => $sidebar_options
					);		

$of_options[] = array(  "name" => "WooCommerce Sidebar on Product Page",
						"desc" 		=> "Disable this option if you don't want to have a sidebar on Product Pages",
						"id" => "woocommerce_sidebar_product_en",
						"std" => "1",
						"folds" => 1,
						"type" => "switch");	

$of_options[] = array( "name" => "Woocommerce Sidebar Select for Product Pages",
						"desc" => "Select the sidebar that will be used for Product Pages. This option is usefull if you want to have a different sidebar for your Product Pages",
						"id" => "woocommerce_product_sidebar",
						"std" => "WooCommerce Sidebar",
						"type" => "select",
						"fold" => "woocommerce_sidebar_product_en",
						"options" => $sidebar_options
					);																			
				
$of_options[] = array(  "name" => "WooCommerce Sidebar Position",
						"id" => "woocommerce_sidebar_pos",
						"std" => "right",
						"type" => "select",
						"fold" => "woocommerce_sidebar_en",
						"options" => array("left" => "Left","right" => "Right"));	

$of_options[] = array( 	"name" 		=> "woo-header-shop-top",
						"desc" 		=> "",
						"id" 		=> "woo-header-shop-top",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">WooCommerce Login in Header</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);	

$of_options[] = array(  "name" => "WooCommerce Login/Register in Top Menu",
						"desc" 		=> "Enable/Disable WooCommerce Login/Register Link in Top Menu <br>A menu must be assigned as Top Menu under Appearance -> Menus.",
						"id" => "woocommerce_login_top_menu",
						"std" => "0",
						"folds" => 1,
						"type" => "switch");

$of_options[] = array(  "name" => "WooCommerce Login/Register in Primary Menu",
						"desc" 		=> "Enable/Disable WooCommerce Login/Register Link in Primary Menu <br>A menu must be assigned as Primary Menu under Appearance -> Menus.",
						"id" => "woocommerce_login_primary_menu",
						"std" => "0",
						"folds" => 1,
						"type" => "switch");

$of_options[] = array(  "name" => "WooCommerce Login/Register Icon",
						"desc" 		=> "Enable/Disable WooCommerce Login/Register Icon",
						"id" => "woocommerce_login_icon",
						"std" => "1",
						"folds" => 1,
						"type" => "switch");

$of_options[] = array( 	"name" 		=> "Icon Code - Fontawesome",
						"desc" 		=> "Enter the icon code to be used. Default: fa fa-user",
						"id" 		=> "woocommerce_login_icon_render",
						"std" 		=> "fa fa-user",
						"fold" 		=> "woocommerce_login_icon",
						"type" 		=> "text"
				);	

$of_options[] = array(  "name" =>  "Login Form Background Color",
						"desc" => "Set the background color for the Login Form",
						"id" => "woo_head_login_bg",
						"std" => "#ffffff",
						"type" => "color");

$of_options[] = array(  "name" =>  "Login Form Text Color",
						"desc" => "Set the default text color for the Login Form",
						"id" => "woo_head_login_text",
						"std" => "#333333",
						"type" => "color");

$of_options[] = array(  "name" =>  "Login Form Input Field Border Color",
						"desc" => "Set the border color for the Input Fields",
						"id" => "woo_head_login_input_border",
						"std" => "#eeeeee",
						"type" => "color");

$of_options[] = array(  "name" =>  "Login Form Input Field Background Color",
						"desc" => "Set the background color for the Input Fields",
						"id" => "woo_head_login_input_background",
						"std" => "#ffffff",
						"type" => "color");

$of_options[] = array(  "name" =>  "Login Form Input Field Text Color",
						"desc" => "Set the text color for the Input Fields",
						"id" => "woo_head_login_input_text",
						"std" => "#333333",
						"type" => "color");
/* Login Form Button */
$of_options[] = array(  "name" =>  "Login Button Background Color",
						"desc" => "",
						"id" => "woo_head_login_button_bg",
						"std" => "#222222",
						"type" => "color");

$of_options[] = array(  "name" =>  "Login Button Border Color",
						"desc" => "",
						"id" => "woo_head_login_button_border",
						"std" => "#222222",
						"type" => "color");

$of_options[] = array(  "name" =>  "Login Button Text Color",
						"desc" => "",
						"id" => "woo_head_login_button_color",
						"std" => "#ffffff",
						"type" => "color");

$of_options[] = array(  "name" =>  "Login Button Background Color on Hover",
						"desc" => "",
						"id" => "woo_head_login_button_bg_hover",
						"std" => "#000000",
						"type" => "color");

$of_options[] = array(  "name" =>  "Login Button Border Color on Hover",
						"desc" => "",
						"id" => "woo_head_login_button_border_hover",
						"std" => "#000000",
						"type" => "color");

$of_options[] = array(  "name" =>  "Login Button Text Color on Hover",
						"desc" => "",
						"id" => "woo_head_login_button_color_hover",
						"std" => "#ffffff",
						"type" => "color");

/* Register Button */
$of_options[] = array(  "name" =>  "Register Button Background Color",
						"desc" => "",
						"id" => "woo_head_register_button_bg",
						"std" => "#ffffff",
						"type" => "color");

$of_options[] = array(  "name" =>  "Register Button Border Color",
						"desc" => "",
						"id" => "woo_head_register_button_border",
						"std" => "#222222",
						"type" => "color");

$of_options[] = array(  "name" =>  "Register Button Text Color",
						"desc" => "",
						"id" => "woo_head_register_button_color",
						"std" => "#222222",
						"type" => "color");

$of_options[] = array(  "name" =>  "Register Button Background Color on Hover",
						"desc" => "",
						"id" => "woo_head_register_button_bg_hover",
						"std" => "#222222",
						"type" => "color");

$of_options[] = array(  "name" =>  "Register Button Border Color on Hover",
						"desc" => "",
						"id" => "woo_head_register_button_border_hover",
						"std" => "#222222",
						"type" => "color");

$of_options[] = array(  "name" =>  "Register Button Text Color on Hover",
						"desc" => "",
						"id" => "woo_head_register_button_color_hover",
						"std" => "#ffffff",
						"type" => "color");

$of_options[] = array( 	"name" 		=> "woo-header-shop",
						"desc" 		=> "",
						"id" 		=> "woo-header-shop",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Header Shopping Cart</h3>
						Use these options to change the design of the Header Shopping Cart",
						"icon" 		=> true,
						"type" 		=> "info"
				);		

$of_options[] = array(  "name" => "Shopping Cart Icon in Header Menu",
						"desc" 		=> "Enable this option if you want to have a Shopping Cart Icon displayed in the Header Menu. When users will hover over the icon, the content of the Cart will be shown",
						"id" => "woo_cart",
						"std" => "0",						
						"type" => "switch");

$of_options[] = array(  "name" =>  "Shopping Cart Icon - Product in Cart Counter Background Color",
						"desc" => "Set the background color for the Product in Cart Counter",
						"id" => "woo_cart_prod_count_bg",
						"std" => "#c92e2e",
						"type" => "color");

$of_options[] = array(  "name" =>  "Shopping Cart Icon - Product in Cart Counter Text Color",
						"desc" => "Set the text color for the Product in Cart Counter",
						"id" => "woo_cart_prod_count_color",
						"std" => "#ffffff",
						"type" => "color");	
						
$of_options[] = array(  "name" =>  "Shopping Cart Product Title Color",
						"desc" => "Set the link color of the Product Title",
						"id" => "woo_header_product_title_color",
						"std" => "#777777",
						"type" => "color");		

$of_options[] = array(  "name" =>  "Shopping Cart Product Title Color on Hover",
						"desc" => "Set the link color on hover for the Product Title",
						"id" => "woo_header_product_title_color_hover",
						"std" => "#777777",
						"type" => "color");		

$of_options[] = array( 	"name" 		=> "Shopping Cart Product Title Font Size",
						"desc" => "Set the font size of the Product Title. Default is 11",
						"id" => "woo_header_product_title_font_size",
						"std" 		=> "11",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "40",
						"type" 		=> "sliderui" 
				);

$of_options[] = array(  "name" =>  "Shopping Cart Product Quantity and Price Color",
						"desc" => "Set the color of the Product Quantity and Price Color",
						"id" => "woo_header_product_quantity_price_color",
						"std" => "#21252b",
						"type" => "color");		

$of_options[] = array( 	"name" 		=> "Shopping Cart Product Quantity and Price Font Size",
						"desc" => "Default is 13",
						"id" => "woo_header_product_quantity_price_font_size",
						"std" 		=> "13",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "40",
						"type" 		=> "sliderui" 
				);

/* View Cart Button */

$of_options[] = array(  "name" =>  "View Cart Button - Background Color",
						"desc" => "Set the backgroud color of the View Cart button",
						"id" => "woo_header_view_cart_bg",
						"std" => "#222222",
						"type" => "color");

$of_options[] = array(  "name" =>  "View Cart Button - Border Color",
						"desc" => "Set the border color of the View Cart button",
						"id" => "woo_header_view_cart_border",
						"std" => "#222222",
						"type" => "color");	

$of_options[] = array(  "name" =>  "View Cart Button - Text Color",
						"desc" => "Set the text color of the View Cart button",
						"id" => "woo_header_view_cart_text",
						"std" => "#ffffff",
						"type" => "color");	

$of_options[] = array(  "name" =>  "View Cart Button - Background Color on Hover",
						"desc" => "Set the backgroud color on Hover of the View Cart button",
						"id" => "woo_header_view_cart_bg_hover",
						"std" => "#ffffff",
						"type" => "color");

$of_options[] = array(  "name" =>  "View Cart Button - Border Color on Hover",
						"desc" => "Set the border color on Hover of the View Cart button",
						"id" => "woo_header_view_cart_border_hover",
						"std" => "#222222",
						"type" => "color");	

$of_options[] = array(  "name" =>  "View Cart Button - Text Color on Hover",
						"desc" => "Set the text color on Hover of the View Cart button",
						"id" => "woo_header_view_cart_text_hover",
						"std" => "#222222",
						"type" => "color");

/* Checkout Button */

$of_options[] = array(  "name" =>  "Checkout Button - Background Color",
						"desc" => "Set the backgroud color of the Checkout button",
						"id" => "woo_header_checkout_bg",
						"std" => "#ffffff",
						"type" => "color");

$of_options[] = array(  "name" =>  "Checkout Button - Border Color",
						"desc" => "Set the border color of the Checkout button",
						"id" => "woo_header_checkout_border",
						"std" => "#222222",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Checkout Button - Text Color",
						"desc" => "Set the text color of the Checkout button",
						"id" => "woo_header_checkout_text",
						"std" => "#222222",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Checkout Button - Background Color on Hover",
						"desc" => "Set the backgroud color on Hover of the Checkout button",
						"id" => "woo_header_checkout_bg_hover",
						"std" => "#222222",
						"type" => "color");

$of_options[] = array(  "name" =>  "Checkout Button - Border Color on Hover",
						"desc" => "Set the border color on Hover of the Checkout button",
						"id" => "woo_header_checkout_border_hover",
						"std" => "#222222",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Checkout Button - Text Color on Hover",
						"desc" => "Set the text color on Hover of the Checkout button",
						"id" => "woo_header_checkout_text_hover",
						"std" => "#ffffff",
						"type" => "color");

/* Separator and other options */	

$of_options[] = array(  "name" =>  "Total Text Color",
						"desc" => "Set the color for the total text",
						"id" => "woo_header_total_text_color",
						"std" => "#333333",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Total Price Color",
						"desc" => "Set the color for the total price",
						"id" => "woo_header_total_price_color",
						"std" => "#333333",
						"type" => "color");											

$of_options[] = array(  "name" =>  "Shopping Cart Separator Color",
						"desc" => "Set the color of the Separator",
						"id" => "woo_header_shopping_cart_separator",
						"std" => "#f1f1f1",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Shopping Cart Backgrund Color",
						"desc" => "Set the background color of the Shopping Cart",
						"id" => "woo_header_shopping_cart_bg",
						"std" => "#ffffff",
						"type" => "color");		

$of_options[] = array( 	"name" 		=> "Shopping Cart Area Width",
						"desc" => "Set the width of the Shopping Cart Area Width.",
						"id" => "woo_header_width",
						"std" 		=> "220",
						"min" 		=> "100",
						"step"		=> "10",
						"max" 		=> "600",
						"type" 		=> "sliderui" 
				);																																						

$of_options[] = array( 	"name" 		=> "woo-archive",
						"desc" 		=> "",
						"id" 		=> "woo-archive-id",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Archive Products Design</h3>
						Use these options to change the product design on archive pages",
						"icon" 		=> true,
						"type" 		=> "info"
				);	

$of_options[] = array( 	"name" 		=> "Product Title Font Size",
						"desc" => "Default is 13",
						"id" => "woo_archive_title",
						"std" 		=> "13",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "60",
						"type" 		=> "sliderui" 
				);	

$of_options[] = array(  "name" =>  "Product Title Color",
						"desc" => "",
						"id" => "woo_archive_title_color",
						"std" => "#333333",
						"type" => "color");

$of_options[] = array(  "name" =>  "Product Title Color on Hover",
						"desc" => "",
						"id" => "woo_archive_title_color_hover",
						"std" => "#5bc98c",
						"type" => "color");

$of_options[] = array( 	"name" 		=> "Product Price Font Size",
						"desc" => "Default is 15",
						"id" => "woo_archive_price",
						"std" 		=> "15",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "60",
						"type" 		=> "sliderui" 
				);	

$of_options[] = array(  "name" =>  "Product Price Color",
						"desc" => "",
						"id" => "woo_archive_price_color",
						"std" => "#5bc98c",
						"type" => "color");

$of_options[] = array(  "name" =>  "Product on Sale Price Color",
						"desc" => "",
						"id" => "woo_archive_product_sale_color",
						"std" => "#5bc98c",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Product on Sale - Regular Price Color",
						"desc" => "",
						"id" => "woo_archive_product_sale_regular_color",
						"std" => "#cccccc",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Product on Sale Badge Text Color",
						"desc" => "",
						"id" => "woo_archive_product_sale_badge_text",
						"std" => "#ffffff",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Product on Sale Badge Background Color",
						"desc" => "",
						"id" => "woo_archive_product_sale_badge_bg",
						"std" => "#5bc98c",
						"type" => "color");

$of_options[] = array(  "name" => "Product Details Text Align",						
						"id" => "woo_archive_text_align",
						"std" => "left",
						"type" => "select",
						"options" => array("left"=> "Left", "center" => "Center", "right" => "Right"));

$of_options[] = array( 	"name" 		=> "Product Details Padding Top/Bottom",
						"desc" => "Default is 10",
						"id" => "woo_archive_padding_tb",
						"std" 		=> "10",
						"min" 		=> "0",
						"step"		=> "5",
						"max" 		=> "100",
						"type" 		=> "sliderui" 
				);

$of_options[] = array( 	"name" 		=> "Product Details Padding Left/Right",
						"desc" => "Default is 15",
						"id" => "woo_archive_padding_lr",
						"std" 		=> "15",
						"min" 		=> "0",
						"step"		=> "5",
						"max" 		=> "100",
						"type" 		=> "sliderui" 
				);

$of_options[] = array(  "name" =>  "Product Details Background Color",
						"desc" => "",
						"id" => "woo_archive_product_bg",
						"std" => "#ffffff",
						"type" => "color");

$of_options[] = array(  "name" => "Product Has Border",						
						"id" => "woo_archive_border",
						"std" => "Yes",
						"type" => "select",
						"options" => array("yes"=> "Yes", "no" => "No"));

$of_options[] = array(  "name" =>  "Product Border Color",
						"desc" => "Only works if Product Border is set to Yes",
						"id" => "woo_archive_product_border_color",
						"std" => "#e1e1e1",
						"type" => "color");	

$of_options[] = array(  "name" =>  "Product Stars Color",
						"desc" => "Set the color of the stars used for reviewed products",
						"id" => "woo_archive_product_star",
						"std" => "#444444",
						"type" => "color");

$of_options[] = array( 	"name" 		=> "woo-table",
						"desc" 		=> "",
						"id" 		=> "woo-table",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">WooCommerce Tables Headings</h3>
						Use these options to change the Price Filter Widget",
						"icon" 		=> true,
						"type" 		=> "info"
				);

$of_options[] = array(  "name" =>  "Table Headings Background Color",
						"desc" => "Set the background color of the Table Headings",
						"id" => "woo_table_head_bg",
						"std" => "#333333",
						"type" => "color");

$of_options[] = array(  "name" =>  "Table Headings Text Color",
						"desc" => "Set the text color of the Table Headings",
						"id" => "woo_table_head_text",
						"std" => "#ffffff",
						"type" => "color");

$of_options[] = array( 	"name" 		=> "woo-price",
						"desc" 		=> "",
						"id" 		=> "woo-price",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Price Filter Widget Design</h3>
						Use these options to change the Price Filter Widget",
						"icon" 		=> true,
						"type" 		=> "info"
				);

$of_options[] = array(  "name" =>  "Left/Right Handles Color",
						"desc" => "Set the color of handles in the Price Filter widget",
						"id" => "woo_price_filter_handle",
						"std" => "#f5f5f5",
						"type" => "color");

$of_options[] = array(  "name" =>  "Horizontal Range Bar Color",
						"desc" => "Set the color of the horizontal range bar ",
						"id" => "woo_price_filter_range_color",
						"std" => "#444444",
						"type" => "color");

$of_options[] = array(  "name" =>  "Price Text Color",
						"desc" => "Set the color of the price filtering",
						"id" => "woo_price_filter_color",
						"std" => "#333333",
						"type" => "color");

$of_options[] = array(  "name" =>  "Filter Button Text Color",
						"desc" => "Set the color of Filter Button Text on Hover",
						"id" => "woo_price_filter_button_text",
						"std" => "#ffffff",
						"type" => "color");

$of_options[] = array(  "name" =>  "Filter Button Text Color on Hover",
						"desc" => "Set the color of Filter Button Text on Hover",
						"id" => "woo_price_filter_button_text_hover",
						"std" => "#ffffff",
						"type" => "color");

$of_options[] = array(  "name" =>  "Filter Button Background Color",
						"desc" => "Set the background color of Filter Button",
						"id" => "woo_price_filter_button_bg",
						"std" => "#222222",
						"type" => "color");

$of_options[] = array(  "name" =>  "Filter Button Background Color on Hover",
						"desc" => "Set the background color of Filter Button on Hover",
						"id" => "woo_price_filter_button_bg_hover",
						"std" => "#444444",
						"type" => "color");

$of_options[] = array( 	"name" 		=> "woo-cart",
						"desc" 		=> "",
						"id" 		=> "woo-cart",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Cart Widget Design</h3>
						Use these options to change the Cart Widget",
						"icon" 		=> true,
						"type" 		=> "info"
				);

$of_options[] = array(  "name" => "Remove Product Icon",
						"desc" 		=> "Enable/Disable the Remove Product from Cart Icon for each product added in the Cart.",
						"id" => "woo_cw_remove",
						"std" => "1",
						"folds" => 1,
						"type" => "switch");

$of_options[] = array(  "name" => "Product Image in Cart",
						"desc" 		=> "Enable/Disable the product image for each product added in the Cart.",
						"id" => "woo_cw_image",
						"std" => "1",
						"folds" => 1,
						"type" => "switch");

$of_options[] = array(  "name" =>  "Product in Cart Title Color",
						"desc" => "Set the color of title for each product added in the Cart.",
						"id" => "woo_cw_title",
						"std" => "#333333",
						"type" => "color");

$of_options[] = array(  "name" =>  "Product in Cart Title Color on Hover",
						"desc" => "Set the color of title on hover for each product added in the Cart.",
						"id" => "woo_cw_title_hover",
						"std" => "#666666",
						"type" => "color");

$of_options[] = array(  "name" =>  "Products in Cart Separator Color",
						"desc" => "Set the color of the separator for each product added in the Cart.",
						"id" => "woo_cw_separator",
						"std" => "#eeeeee",
						"type" => "color");

$of_options[] = array(  "name" =>  "Products Quantity Text Color",
						"desc" => "Set the color of the quantity text for each product added in the Cart.",
						"id" => "woo_cw_quantity",
						"std" => "#333333",
						"type" => "color");

$of_options[] = array(  "name" =>  "Products Price Text Color",
						"desc" => "Set the color of the price text for each product added in the Cart.",
						"id" => "woo_cw_products_price",
						"std" => "#f96e5b",
						"type" => "color");

$of_options[] = array(  "name" =>  "Subtotal Text Color",
						"desc" => "Set the color of the Subtotal text.",
						"id" => "woo_cw_subtotal_text",
						"std" => "#333333",
						"type" => "color");

$of_options[] = array(  "name" =>  "Subtotal Price Text Color",
						"desc" => "Set the color of the Subtotal Price text.",
						"id" => "woo_cw_subtotal_price",
						"std" => "#f96e5b",
						"type" => "color");

/* View Cart Button style on Cart Widget  */

$of_options[] = array(  "name" =>  "View Cart Text Color",
						"desc" => "Set the text color of the View Cart button.",
						"id" => "woo_cw_vc_text",
						"std" => "#ffffff",
						"type" => "color");

$of_options[] = array(  "name" =>  "View Cart Border Color",
						"desc" => "Set the border color of the View Cart button.",
						"id" => "woo_cw_vc_border",
						"std" => "#333333",
						"type" => "color");

$of_options[] = array(  "name" =>  "View Cart Background Color",
						"desc" => "Set the background color of the View Cart button.",
						"id" => "woo_cw_vc_bg",
						"std" => "#333333",
						"type" => "color");

$of_options[] = array(  "name" =>  "View Cart Text Color on Hover",
						"desc" => "Set the text color on hover of the View Cart button.",
						"id" => "woo_cw_vc_text_hover",
						"std" => "#333333",
						"type" => "color");

$of_options[] = array(  "name" =>  "View Cart Border Color on hover",
						"desc" => "Set the border color on hover of the View Cart button.",
						"id" => "woo_cw_vc_border_hover",
						"std" => "#333333",
						"type" => "color");

$of_options[] = array(  "name" =>  "View Cart Background Color on Hover",
						"desc" => "Set the background color on hover of the View Cart button.",
						"id" => "woo_cw_vc_bg_hover",
						"std" => "#ffffff",
						"type" => "color");


/* Checkout Button style on Cart Widget */

$of_options[] = array(  "name" =>  "Checkout Text Color",
						"desc" => "Set the text color of the Checkout button.",
						"id" => "woo_cw_ck_text",
						"std" => "#333333",
						"type" => "color");

$of_options[] = array(  "name" =>  "Checkout Border Color",
						"desc" => "Set the border color of the Checkout button.",
						"id" => "woo_cw_ck_border",
						"std" => "#333333",
						"type" => "color");

$of_options[] = array(  "name" =>  "Checkout Background Color",
						"desc" => "Set the background color of the Checkout button.",
						"id" => "woo_cw_ck_bg",
						"std" => "#ffffff",
						"type" => "color");

$of_options[] = array(  "name" =>  "Checkout Text Color on Hover",
						"desc" => "Set the text color on hover of the Checkout button.",
						"id" => "woo_cw_ck_text_hover",
						"std" => "#ffffff",
						"type" => "color");

$of_options[] = array(  "name" =>  "Checkout Border Color on hover",
						"desc" => "Set the border color on hover of the Checkout button.",
						"id" => "woo_cw_ck_border_hover",
						"std" => "#333333",
						"type" => "color");

$of_options[] = array(  "name" =>  "Checkout Background Color on Hover",
						"desc" => "Set the background color on hover of the Checkout button.",
						"id" => "woo_cw_ck_bg_hover",
						"std" => "#333333",
						"type" => "color");

$of_options[] = array( 	"name" 		=> "woo-footer",
						"desc" 		=> "",
						"id" 		=> "woo-footer-id",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Footer Widgets Design</h3>
						Use these options to change the product design on the footer sidebar",
						"icon" 		=> true,
						"type" 		=> "info"
				);	

$of_options[] = array( 	"name" 		=> "Footer Widget Product Title Font Size",
						"desc" => "Default is 13",
						"id" => "footer_woo_prod_title",
						"std" 		=> "13",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "60",
						"type" 		=> "sliderui" 
				);

$of_options[] = array(  "name" => "Footer Widget Product Title Font Weight",
						"id" => "footer_woo_prod_title_weight",
						"std" => "400",
						"type" => "select",
						"options" => array(300,400,500, 600,700,800,900));	

$of_options[] = array(  "name" =>  "Footer Widget Product Title color",
						"desc" => "Set the color of the product title",
						"id" => "footer_woo_prod_title_color",
						"std" => "#ffffff",
						"type" => "color");											

$of_options[] = array( 	"name" 		=> "Footer Widget Product Price Font Size",
						"desc" => "Default is 14",
						"id" => "footer_woo_prod_price",
						"std" 		=> "14",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "60",
						"type" 		=> "sliderui" 
				);	

$of_options[] = array(  "name" => "Footer Widget Product Price Font Weight",
						"id" => "footer_woo_prod_price_weight",
						"std" => "600",
						"type" => "select",
						"options" => array(300,400,500, 600,700,800,900));

$of_options[] = array(  "name" =>  "Footer Widget Product Price color",
						"desc" => "Set the color of the price",
						"id" => "footer_woo_prod_price_color",
						"std" => "#ffffff",
						"type" => "color");							

$of_options[] = array( 	"name" 		=> "Footer Widget Product Old Price Font Size",
						"desc" => "Default is 12",
						"id" => "footer_woo_prod_old_price",
						"std" 		=> "12",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "60",
						"type" 		=> "sliderui" 
				);

$of_options[] = array(  "name" =>  "Footer Widget Product Old Price color",
						"desc" => "Set the color of the old price - only works for products with special/sale price",
						"id" => "footer_woo_prod_old_price_color",
						"std" => "#777777",
						"type" => "color");

$of_options[] = array(  "name" =>  "Footer Widget Product Review Stars Color",
						"desc" => "Set the color of the stars used for reviewed products",
						"id" => "footer_woo_prod_stars",
						"std" => "#eeeeee",
						"type" => "color");

$of_options[] = array(  "name" =>  "Footer Widget Product List separator",
						"desc" => "Set the color of the separator",
						"id" => "footer_woo_prod_separator",
						"std" => "#eeeeee",
						"type" => "color");
				
$of_options[] = array( 	"name" 		=> "Social Media",
						"type" 		=> "heading"
				);

$of_options[] = array(  "name" => "Social Icons Tooltip",
						"desc" 		=> "Enable/Disable social icons tooltip.",
						"id" => "social_icons_tooltip",
						"std" => "1",
						"type" => "switch");
				
$of_options[] = array(  "name" => "Show Social Icons ",
						"desc" 		=> "Enable/Disable social icons above header section.",
						"id" => "en_social_icons_header",
						"std" => "1",
						"type" => "switch");	
											
$of_options[] = array(  "name" => "",
						"desc" 		=> "Enable/Disable social icons on footer section.",
						"id" => "en_social_icons",
						"std" => "1",
						"type" => "switch");	
				
$of_options[] = array( 	"name" 		=> "Rss",
						"desc" 		=> "Enter your Rss feed link.",
						"id" 		=> "rss",
						"std" 		=> "My rss link",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> "Twitter",
						"desc" 		=> "Enter your Twitter profile link.",
						"id" 		=> "twitter",
						"std" 		=> "My twitter link",
						"type" 		=> "text"
				);	
				
$of_options[] = array( 	"name" 		=> "Facebook",
						"desc" 		=> "Enter your Facebook profile link.",
						"id" 		=> "facebook",
						"std" 		=> "My facebook link",
						"type" 		=> "text"
				);	
				
$of_options[] = array( 	"name" 		=> "Instagram",
						"desc" 		=> "Enter your Instagram profile link.",
						"id" 		=> "instagram",
						"std" 		=> "",
						"type" 		=> "text"
				);				
				
$of_options[] = array( 	"name" 		=> "Google+",
						"desc" 		=> "Enter your Google+ profile link.",
						"id" 		=> "google",
						"std" 		=> "My google+ link",
						"type" 		=> "text"
				);	
				
$of_options[] = array( 	"name" 		=> "LinkedIn",
						"desc" 		=> "Enter your LinkedIn profile link.",
						"id" 		=> "linkedin",
						"std" 		=> "",
						"type" 		=> "text"
				);	
/*				
$of_options[] = array( 	"name" 		=> "Reddit",
						"desc" 		=> "Enter your reddit profile link.",
						"id" 		=> "reddit",
						"std" 		=> "",
						"type" 		=> "text"
				);	
				
$of_options[] = array( 	"name" 		=> "Digg",
						"desc" 		=> "Enter your digg profile link.",
						"id" 		=> "digg",
						"std" 		=> "",
						"type" 		=> "text"
				);	
*/

$of_options[] = array( 	"name" 		=> "Pinterest",
						"desc" 		=> "Enter your Pinterest profile link.",
						"id" 		=> "pinterest",
						"std" 		=> "",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Tumblr",
						"desc" 		=> "Enter your Tumblr profile link.",
						"id" 		=> "tumblr",
						"std" 		=> "",
						"type" 		=> "text"
				);	
				
$of_options[] = array( 	"name" 		=> "Flickr",
						"desc" 		=> "Enter your Flickr profile link.",
						"id" 		=> "flickr",
						"std" 		=> "",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Youtube",
						"desc" 		=> "Enter your Youtube profile link.",
						"id" 		=> "youtube",
						"std" 		=> "",
						"type" 		=> "text"
				);	
				
$of_options[] = array( 	"name" 		=> "Behance",
						"desc" 		=> "Enter your Behance profile link.",
						"id" 		=> "behance",
						"std" 		=> "",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Dribbble",
						"desc" 		=> "Enter your Dribbble profile link.",
						"id" 		=> "dribbble",
						"std" 		=> "",
						"type" 		=> "text"
				);	
				
$of_options[] = array( 	"name" 		=> "Vimeo",
						"desc" 		=> "Enter your Vimeo profile link.",
						"id" 		=> "vimeo",
						"std" 		=> "",
						"type" 		=> "text"
				);	
				
$of_options[] = array( 	"name" 		=> "StumbleUpon",
						"desc" 		=> "Enter your StumbleUpon profile link.",
						"id" 		=> "stumbleupon",
						"std" 		=> "",
						"type" 		=> "text"
				);	
				
$of_options[] = array( 	"name" 		=> "Xing",
						"desc" 		=> "Enter your Xing profile link.",
						"id" 		=> "xing",
						"std" 		=> "",
						"type" 		=> "text"
				);							
				
$of_options[] = array( 	"name" 		=> "Soundcloud",
						"desc" 		=> "Enter your Soundcloud profile link.",
						"id" 		=> "soundcloud",
						"std" 		=> "",
						"type" 		=> "text"
				);	

$of_options[] = array( 	"name" 		=> "Yelp",
						"desc" 		=> "Enter your Yelp profile link.",
						"id" 		=> "yelp",
						"std" 		=> "",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> "Contact Options",
						"type" 		=> "heading"
				);

$of_options[] = array(  "name" => "Google Maps",
						"desc" => "Enable/disable the google maps on your site. If you disable this option, the Google Maps will not work at all.",
						"id" => "google_maps_add",
						"std" => 1,
						"type" => "switch");

$of_options[] = array(  "name" => "Google Map API Key",
						"desc" => "If you are experiencing issues with your Google Maps, please create your own unique API key and use it here.<br>To create an API key follow the steps below: <br>1. Go to the Google Developers Console <a href=\"https://console.developers.google.com/flows/enableapi?apiid=maps_backend,geocoding_backend,directions_backend,distance_matrix_backend,elevation_backend&keyType=CLIENT_SIDE&reusekey=true\" target=\"_blank\">here</a> and login with your google account.<br>
2. Create or select a project.<br>
3. Click Continue to enable the API and any related services.<br>
4. On the Credentials page, get a Browser key (and set the API Credentials). 
Note: If you have an existing Browser key, you may use that key.<br>

After creating the Api key, you will have a code similar to: AIzaSyBA0nEHL7AlN-lxEs7hCacsqwN4Y39Dnlg - paste that code in the field to the left.",
						"id" => "gmap_api",
						"std" => "",
						"type" => "text");

$of_options[] = array(  "name" => "Google Map Template",
						"desc" => "Select the template to use for the Contact Us page template. Use New to use the settings you enter below.",
						"id" => "gmap_template",
						"std" => "new",
						"options" => array('old' => 'Old Style', 'new' => 'New Style'),
						"type" => "select");
				
$of_options[] = array(  "name" => "Google Map Type",
						"desc" => "Select the type of map to show on google map",
						"id" => "gmap_type",
						"std" => "roadmap",
						"options" => array('ROADMAP' => 'ROADMAP', 'SATELLITE' => 'SATELLITE', 'HYBRID' => 'HYBRID', 'TERRAIN' => 'TERRAIN'),
						"type" => "select");

$of_options[] = array(  "name" => "Google Map Style",
						"desc" => "Select the style of the map.",
						"id" => "gmap_style",
						"std" => "default",
						"options" => array('map_default' => 'Default', 'map_1' => 'Light Dream', 'map_2' => 'Pale Dawn', 'map_3' => 'Apple Maps-esque', 'map_4' => 'Blue Essence', 'map_5' => 'Paper', 'map_6' => 'Light Monochrome', 'map_7' => 'Blue Essence', 'map_8' => 'MapBox', 'map_custom' => 'Custom'),
						"type" => "select");

$of_options[] = array(  "name" => "Custom Google Map Style Code",
						"desc" => "Paste here your custom google map style code, taken from: <a href=\"https://snazzymaps.com/\" target=\"_blank\">snazzymaps.com</a><br><br><span style=\"color:red;\">Only works if Custom is selected for Google Map Style option above.</span>",
						"id" => "custom_code",
						"std" => "",
						"type" => "textarea");	

$of_options[] = array(  "name" => "Google Map Width",
						"desc" => "(in pixels or percentage, e.g.:100% or 100px)",
						"id" => "gmap_width",
						"std" => "100%",
						"type" => "text");

$of_options[] = array(  "name" => "Google Map Height",
						"desc" => "(in pixels, e.g.: 100px)",
						"id" => "gmap_height",
						"std" => "400px",
						"type" => "text");
						
$of_options[] = array(  "name" => "Google Map PopUp Title",
						"desc" => "Example: We are RockyThemes",
						"id" => "gmap_title",
						"std" => "We are <span>RockyThemes</span>",
						"type" => "text");	
						
$of_options[] = array(  "name" => "Google Map PopUp Short Message",
						"desc" => "",
						"id" => "gmap_desc",
						"std" => "Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.",
						"type" => "textarea");											

$of_options[] = array(  "name" => "Google Map Address",
						"desc" => "Example: 775 New York Ave, Brooklyn, New York 11203. ",
						"id" => "gmap_address",
						"std" => "",
						"type" => "text");

$of_options[] = array(  "name" => "Google Map Email Address",
						"desc" => "Enter your contact email.",
						"id" => "gmap_email",
						"std" => "support@rockythemes.com",
						"type" => "text");
						

$of_options[] = array(  "name" => "Google Map Phone Number",
						"desc" => "Enter your contact phone number.",
						"id" => "gmap_phone",
						"std" => "1.555.800.800",
						"type" => "text");						

$of_options[] = array(  "name" => "Map Zoom Level",
						"desc" => "Higher number will be more zoomed in",
						"id" => "map_zoom_level",
						"std" => "16",
						"std" 		=> "16",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "21",
						"type" 		=> "sliderui");	

$of_options[] = array(  "name" => "Enable Map Scrollwheel",
						"desc" => "Enable/disable scrollwheel on google maps",
						"id" => "map_scrollwheel",
						"std" => 1,
						"type" => "switch");
/*
$of_options[] = array(  "name" => "Disable Map Scale",
						"desc" => "Check to disable scale on google maps",
						"id" => "map_scale",
						"std" => 0,
						"type" => "checkbox"); //asta am
*/
$of_options[] = array(  "name" => "Enable Map Zoom & Pan Control Icons",
						"desc" => "Enable/disable zoom control icon and pan control icon on google maps",
						"id" => "map_zoomcontrol",
						"std" => 1,
						"type" => "switch");
						
$of_options[] = array(  "name" => "Enable Map Type Control", //asta am
						"desc" => "Enable/disable map type control on google maps",
						"id" => "map_type_control",
						"std" => 1,
						"type" => "switch");
						
$of_options[] = array(  "name" => "Enable StreetView", //asta am
						"desc" => "Enable/disable street view on google maps",
						"id" => "map_street",
						"std" => 1,
						"type" => "switch");																																																						

$of_options[] = array( 	"name" 		=> "Demo Data",
						"type" 		=> "heading"
				);	
				
$of_options[] = array( 	"name" 		=> "Demo Data",
						"desc" 		=> "",
						"id" 		=> "demodata",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Demo Data</h3>						
						<p>From version 5.1 we have introduced the One Click Demo Data Import.</p>
						<p>We have created a nice Video Tutorial on how to properly import the demo data with just one click as well as installing the Creativo theme for the first time. You can see it bellow:</p>".do_shortcode('[youtube id="3jRuQfhxtAQ" width="550"]'),
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array( 	"name" 		=> "Documentation",
						"type" 		=> "heading"
				);			
				
$of_options[] = array( 	"name" 		=> "Documentation",
						"desc" 		=> "",
						"id" 		=> "docs",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Documentation</h3>
						Please go to the following link to get the latest updated documentation. 
						<p><strong><a href='http://rockythemes.com/creativo/doc/' target='_blank'>http://rockythemes.com/creativo/doc/</a></strong></p>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array( 	"name" 		=> "Video Training",
						"type" 		=> "heading"
				);	
				
$of_options[] = array( 	"name" 		=> "Video Training",
						"desc" 		=> "",
						"id" 		=> "vt",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Video Training</h3>
						Watch and learn how to use Creativo efficiently. <br />View all the video tutorials here: <a href=\"http://www.youtube.com/playlist?list=PLw5gDyOINzEwXxl8ivWRdqH3uxuQACsQg\" target=\"_blank\">RockyThemes YouTube Channel</a>",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array( 	"name" 		=> "Installing Creativo",
						"desc" 		=> "",
						"id" 		=> "ic",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Creativo Setup +One Click Demo Data Install</h3>".do_shortcode('[youtube id="3jRuQfhxtAQ" width="550"]'),
						"icon" 		=> true,
						"type" 		=> "info"
				);	
				
$of_options[] = array( 	"name" 		=> "Creating a One Page Navigation",
						"desc" 		=> "",
						"id" 		=> "idd",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Creativo One Page Navigation setup</h3>".do_shortcode('[youtube id="8PSaI35s_vU" width="550"]'),
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
$of_options[] = array( 	"name" 		=> "Creating a Post in Creativo",
						"desc" 		=> "",
						"id" 		=> "cp",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Creating a Post in Creativo</h3>".do_shortcode('[youtube id="Vh4PxsSdcr8" width="550"]'),
						"icon" 		=> true,
						"type" 		=> "info"
				);	
				
$of_options[] = array( 	"name" 		=> "Creating a New Portfolio Post",
						"desc" 		=> "",
						"id" 		=> "cpp",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Creating a New Portfolio Post</h3>".do_shortcode('[youtube id="owiB3HCI9XE" width="550"]'),
						"icon" 		=> true,
						"type" 		=> "info"
				);			
				
$of_options[] = array( 	"name" 		=> "Custom CSS",
						"type" 		=> "heading"
				);	
				
$of_options[] = array( 	"name" 		=> "Custom css text",
						"desc" 		=> "",
						"id" 		=> "ccss_text",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Custom CSS</h3>Add here your custom css rules to change the design of the theme.",
						"icon" 		=> true,
						"type" 		=> "info"
				);				
				
$of_options[] = array( 	"id" 		=> "creativo_custom_css",
						"std" 		=> "",
						"type" 		=> "textarea"
				);																																								
				
// Backup Options
$of_options[] = array( 	"name" 		=> "Backup Options",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-slider.png"
				);
				
$of_options[] = array( 	"name" 		=> "Backup and Restore Options",
						"id" 		=> "of_backup",
						"std" 		=> "",
						"type" 		=> "backup",
						"desc" 		=> 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
				);
				
$of_options[] = array( 	"name" 		=> "Transfer Theme Options Data",
						"id" 		=> "of_transfer",
						"std" 		=> "",
						"type" 		=> "transfer",
						"desc" 		=> 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
				);
				
	}//End function: of_options()
}//End chack if function exists: of_options()
?>
