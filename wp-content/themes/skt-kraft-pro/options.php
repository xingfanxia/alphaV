<?php 

/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */ 

function optionsframework_option_name() {
	// Change this to use your theme slug
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );
	return $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'skt-kraft'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {
	//array of all custom font types.
	$font_types = array( '' => '', 'Arial' => 'Arial',
		'Comic Sans MS' => 'Comic Sans MS',
		'FreeSans' => 'FreeSans',
		'Georgia' => 'Georgia',
		'Lucida Sans Unicode' => 'Lucida Sans Unicode',
		'Palatino Linotype' => 'Palatino Linotype',
		'Symbol' => 'Symbol',
		'Tahoma' => 'Tahoma',
		'Trebuchet MS' => 'Trebuchet MS',
		'Verdana' => 'Verdana',
		'ABeeZee' => 'ABeeZee',
		'Abel' => 'Abel',
		'Abril Fatface' => 'Abril Fatface',
		'Aclonica' => 'Aclonica',
		'Acme' => 'Acme',
		'Actor' => 'Actor',
		'Adamina' => 'Adamina',
		'Advent Pro' => 'Advent Pro',
		'Aguafina Script' => 'Aguafina Script',
		'Akronim' => 'Akronim',
		'Aladin' => 'Aladin',
		'Aldrich' => 'Aldrich',
		'Alegreya' => 'Alegreya',
		'Alegreya SC' => 'Alegreya SC',
		'Alex Brush' => 'Alex Brush',
		'Alfa Slab One' => 'Alfa Slab One',
		'Alice' => 'Alice',
		'Alike' => 'Alike',
		'Alike Angular' => 'Alike Angular',
		'Allan' => 'Allan',
		'Allerta' => 'Allerta',
		'Allerta Stencil' => 'Allerta Stencil',
		'Allura' => 'Allura',
		'Almendra' => 'Almendra',
		'Almendra Display' => 'Almendra Display',
		'Almendra SC' => 'Almendra SC',
		'Amarante' => 'Amarante',
		'Amaranth' => 'Amaranth',
		'Amatic SC' => 'Amatic SC',
		'Amethysta' => 'Amethysta',
		'Anaheim' => 'Anaheim',
		'Andada' => 'Andada',
		'Andika' => 'Andika',
		'Annie Use Your Telescope' => 'Annie Use Your Telescope',
		'Anonymous Pro' => 'Anonymous Pro',
		'Antic' => 'Antic',
		'Antic Didone' => 'Antic Didone',
		'Antic Slab' => 'Antic Slab',
		'Anton' => 'Anton',
		'Arapey' => 'Arapey',
		'Arbutus' => 'Arbutus',
		'Arbutus Slab' => 'Arbutus Slab',
		'Architects Daughter' => 'Architects Daughter',
		'Archivo White' => 'Archivo White',
		'Archivo Narrow' => 'Archivo Narrow',
		'Arimo' => 'Arimo',
		'Arizonia' => 'Arizonia',
		'Armata' => 'Armata',
		'Artifika' => 'Artifika',
		'Arvo' => 'Arvo',
		'Asap' => 'Asap',
		'Asset' => 'Asset',
		'Astloch' => 'Astloch',
		'Asul' => 'Asul',
		'Atomic Age' => 'Atomic Age',
		'Aubrey' => 'Aubrey',
		'Audiowide' => 'Audiowide',
		'Autour One' => 'Autour One',
		'Average' => 'Average',
		'Average Sans' => 'Average Sans',
		'Averia Gruesa Libre' => 'Averia Gruesa Libre',
		'Averia Libre' => 'Averia Libre',
		'Averia Sans Libre' => 'Averia Sans Libre',
		'Averia Serif Libre' => 'Averia Serif Libre',
		'Bad Script' => 'Bad Script',
		'Balthazar' => 'Balthazar',
		'Bangers' => 'Bangers',
		'Basic' => 'Basic',
		'Baumans' => 'Baumans',
		'Belgrano' => 'Belgrano',
		'Belleza' => 'Belleza',
		'BenchNine' => 'BenchNine',
		'Bentham' => 'Bentham',
		'Berkshire Swash' => 'Berkshire Swash',
		'Bevan' => 'Bevan',
		'Bigelow Rules' => 'Bigelow Rules',
		'Bigshot One' => 'Bigshot One',
		'Bilbo' => 'Bilbo',
		'Bilbo Swash Caps' => 'Bilbo Swash Caps',
		'Bitter' => 'Bitter',
		'White Ops One' => 'White Ops One',
		'Bonbon' => 'Bonbon',
		'Boogaloo' => 'Boogaloo',
		'Bowlby One' => 'Bowlby One',
		'Bowlby One SC' => 'Bowlby One SC',
		'Brawler' => 'Brawler',
		'Bree Serif' => 'Bree Serif',
		'Bubblegum Sans' => 'Bubblegum Sans',
		'Bubbler One' => 'Bubbler One',
		'Buda' => 'Buda',
		'Buenard' => 'Buenard',
		'Butcherman' => 'Butcherman',
		'Butcherman Caps' => 'Butcherman Caps',
		'Butterfly Kids' => 'Butterfly Kids',
		'Cabin' => 'Cabin',
		'Cabin Condensed' => 'Cabin Condensed',
		'Cabin Sketch' => 'Cabin Sketch',
		'Cabin' => 'Cabin',
		'Caesar Dressing' => 'Caesar Dressing',
		'Cagliostro' => 'Cagliostro',
		'Calligraffitti' => 'Calligraffitti',
		'Cambo' => 'Cambo',
		'Candal' => 'Candal',
		'Cantarell' => 'Cantarell',
		'Cantata One' => 'Cantata One',
		'Cantora One' => 'Cantora One',
		'Capriola' => 'Capriola',
		'Cardo' => 'Cardo',
		'Carme' => 'Carme',
		'Carrois Gothic' => 'Carrois Gothic',
		'Carrois Gothic SC' => 'Carrois Gothic SC',
		'Carter One' => 'Carter One',
		'Caudex' => 'Caudex',
		'Cedarville Cursive' => 'Cedarville Cursive',
		'Ceviche One' => 'Ceviche One',
		'Changa One' => 'Changa One',
		'Chango' => 'Chango',
		'Chau Philomene One' => 'Chau Philomene One',
		'Chela One' => 'Chela One',
		'Chelsea Market' => 'Chelsea Market',
		'Cherry Cream Soda' => 'Cherry Cream Soda',
		'Cherry Swash' => 'Cherry Swash',
		'Chewy' => 'Chewy',
		'Chicle' => 'Chicle',
		'Chivo' => 'Chivo',
		'Cinzel' => 'Cinzel',
		'Cinzel Decorative' => 'Cinzel Decorative',
		'Clicker Script' => 'Clicker Script',
		'Coda' => 'Coda',
		'Codystar' => 'Codystar',
		'Combo' => 'Combo',
		'Comfortaa' => 'Comfortaa',
		'Coming Soon' => 'Coming Soon',
		'Condiment' => 'Condiment',
		'Contrail One' => 'Contrail One',
		'Convergence' => 'Convergence',
		'Cookie' => 'Cookie',
		'Copse' => 'Copse',
		'Corben' => 'Corben',
		'Courgette' => 'Courgette',
		'Cousine' => 'Cousine',
		'Coustard' => 'Coustard',
		'Covered By Your Grace' => 'Covered By Your Grace',
		'Crafty Girls' => 'Crafty Girls',
		'Creepster' => 'Creepster',
		'Creepster Caps' => 'Creepster Caps',
		'Crete Round' => 'Crete Round',
		'Crimson' => 'Crimson',
		'Croissant One' => 'Croissant One',
		'Crushed' => 'Crushed',
		'Cuprum' => 'Cuprum',
		'Cutive' => 'Cutive',
		'Cutive Mono' => 'Cutive Mono',
		'Damion' => 'Damion',
		'Dancing Script' => 'Dancing Script',
		'Dawning of a New Day' => 'Dawning of a New Day',
		'Days One' => 'Days One',
		'Delius' => 'Delius',
		'Delius Swash Caps' => 'Delius Swash Caps',
		'Delius Unicase' => 'Delius Unicase',
		'Della Respira' => 'Della Respira',
		'Denk One' => 'Denk One',
		'Devonshire' => 'Devonshire',
		'Didact Gothic' => 'Didact Gothic',
		'Diplomata' => 'Diplomata',
		'Diplomata SC' => 'Diplomata SC',
		'Domine' => 'Domine',
		'Donegal One' => 'Donegal One',
		'Doppio One' => 'Doppio One',
		'Dorsa' => 'Dorsa',
		'Dosis' => 'Dosis',
		'Dr Sugiyama' => 'Dr Sugiyama',
		'Droid Sans' => 'Droid Sans',
		'Droid Sans Mono' => 'Droid Sans Mono',
		'Droid Serif' => 'Droid Serif',
		'Duru Sans' => 'Duru Sans',
		'Dynalight' => 'Dynalight',
		'EB Garamond' => 'EB Garamond',
		'Eagle Lake' => 'Eagle Lake',
		'Eater' => 'Eater',
		'Eater Caps' => 'Eater Caps',
		'Economica' => 'Economica',
		'Electrolize' => 'Electrolize',
		'Elsie' => 'Elsie',
		'Elsie Swash Caps' => 'Elsie Swash Caps',
		'Emblema One' => 'Emblema One',
		'Emilys Candy' => 'Emilys Candy',
		'Engagement' => 'Engagement',
		'Englebert' => 'Englebert',
		'Enriqueta' => 'Enriqueta',
		'Erica One' => 'Erica One',
		'Esteban' => 'Esteban',
		'Euphoria Script' => 'Euphoria Script',
		'Ewert' => 'Ewert',
		'Exo' => 'Exo',
		'Expletus Sans' => 'Expletus Sans',
		'Fanwood Text' => 'Fanwood Text',
		'Fascinate' => 'Fascinate',
		'Fascinate Inline' => 'Fascinate Inline',
		'Faster One' => 'Faster One',
		'Federant' => 'Federant',
		'Federo' => 'Federo',
		'Felipa' => 'Felipa',
		'Fenix' => 'Fenix',
		'Finger Paint' => 'Finger Paint',
		'Fjalla One' => 'Fjalla One',
		'Fjord One' => 'Fjord One',
		'Flamenco' => 'Flamenco',
		'Flavors' => 'Flavors',
		'Fondamento' => 'Fondamento',
		'Fontdiner Swanky' => 'Fontdiner Swanky',
		'Forum' => 'Forum',
		'Francois One' => 'Francois One',
		'Freckle Face' => 'Freckle Face',
		'Fredericka the Great' => 'Fredericka the Great',
		'Fredoka One' => 'Fredoka One',
		'Fresca' => 'Fresca',
		'Frijole' => 'Frijole',
		'Fruktur' => 'Fruktur',
		'Fugaz One' => 'Fugaz One',
		'Gafata' => 'Gafata',
		'Galdeano' => 'Galdeano',
		'Galindo' => 'Galindo',
		'Gentium Basic' => 'Gentium Basic',
		'Gentium Book Basic' => 'Gentium Book Basic',
		'Geo' => 'Geo',
		'Geostar' => 'Geostar',
		'Geostar Fill' => 'Geostar Fill',
		'Germania One' => 'Germania One',
		'Gilda Display' => 'Gilda Display',
		'Give You Glory' => 'Give You Glory',
		'Glass Antiqua' => 'Glass Antiqua',
		'Glegoo' => 'Glegoo',
		'Gloria Hallelujah' => 'Gloria Hallelujah',
		'Goblin One' => 'Goblin One',
		'Gochi Hand' => 'Gochi Hand',
		'Gorditas' => 'Gorditas',
		'Goudy Bookletter 1911' => 'Goudy Bookletter 1911',
		'Graduate' => 'Graduate',
		'Grand Hotel' => 'Grand Hotel',
		'Gravitas One' => 'Gravitas One',
		'Great Vibes' => 'Great Vibes',
		'Griffy' => 'Griffy',
		'Gruppo' => 'Gruppo',
		'Gudea' => 'Gudea',
		'Habibi' => 'Habibi',
		'Hammersmith One' => 'Hammersmith One',
		'Hanalei' => 'Hanalei',
		'Hanalei Fill' => 'Hanalei Fill',
		'Handlee' => 'Handlee',
		'Happy Monkey' => 'Happy Monkey',
		'Headland One' => 'Headland One',
		'Henny Penny' => 'Henny Penny',
		'Herr Von Muellerhoff' => 'Herr Von Muellerhoff',
		'Holtwood One SC' => 'Holtwood One SC',
		'Homemade Apple' => 'Homemade Apple',
		'Homenaje' => 'Homenaje',
		'IM Fell' => 'IM Fell',
		'Iceberg' => 'Iceberg',
		'Iceland' => 'Iceland',
		'Imprima' => 'Imprima',
		'Inconsolata' => 'Inconsolata',
		'Inder' => 'Inder',
		'Indie Flower' => 'Indie Flower',
		'Inika' => 'Inika',
		'Irish Growler' => 'Irish Growler',
		'Istok Web' => 'Istok Web',
		'Italiana' => 'Italiana',
		'Italianno' => 'Italianno',
		'Jacques Francois' => 'Jacques Francois',
		'Jacques Francois Shadow' => 'Jacques Francois Shadow',
		'Jim Nightshade' => 'Jim Nightshade',
		'Jockey One' => 'Jockey One',
		'Jolly Lodger' => 'Jolly Lodger',
		'Josefin Sans' => 'Josefin Sans',
		'Josefin Sans' => 'Josefin Sans',
		'Josefin Slab' => 'Josefin Slab',
		'Joti One' => 'Joti One',
		'Judson' => 'Judson',
		'Julee' => 'Julee',
		'Julius Sans One' => 'Julius Sans One',
		'Junge' => 'Junge',
		'Jura' => 'Jura',
		'Just Another Hand' => 'Just Another Hand',
		'Just Me Again Down Here' => 'Just Me Again Down Here',
		'Kameron' => 'Kameron',
		'Karla' => 'Karla',
		'Kaushan Script' => 'Kaushan Script',
		'Kavoon' => 'Kavoon',
		'Keania One' => 'Keania One',
		'Kelly Slab' => 'Kelly Slab',
		'Kenia' => 'Kenia',
		'Kite One' => 'Kite One',
		'Knewave' => 'Knewave',
		'Kotta One' => 'Kotta One',
		'Kranky' => 'Kranky',
		'Kreon' => 'Kreon',
		'Kristi' => 'Kristi',
		'Krona One' => 'Krona One',
		'La Belle Aurore' => 'La Belle Aurore',
		'Lancelot' => 'Lancelot',
		'Lato' => 'Lato',
		'League Script' => 'League Script',
		'Leckerli One' => 'Leckerli One',
		'Ledger' => 'Ledger',
		'Lekton' => 'Lekton',
		'Lemon' => 'Lemon',
		'Libre Baskerville' => 'Libre Baskerville',
		'Life Savers' => 'Life Savers',
		'Lilita One' => 'Lilita One',
		'Limelight' => 'Limelight',
		'Linden Hill' => 'Linden Hill',
		'Lobster' => 'Lobster',
		'Lobster Two' => 'Lobster Two',
		'Londrina Outline' => 'Londrina Outline',
		'Londrina Shadow' => 'Londrina Shadow',
		'Londrina Sketch' => 'Londrina Sketch',
		'Londrina Solid' => 'Londrina Solid',
		'Lora' => 'Lora',
		'Love Ya Like A Sister' => 'Love Ya Like A Sister',
		'Loved by the King' => 'Loved by the King',
		'Lovers Quarrel' => 'Lovers Quarrel',
		'Luckiest Guy' => 'Luckiest Guy',
		'Lusitana' => 'Lusitana',
		'Lustria' => 'Lustria',
		'Macondo' => 'Macondo',
		'Macondo Swash Caps' => 'Macondo Swash Caps',
		'Magra' => 'Magra',
		'Maiden Orange' => 'Maiden Orange',
		'Mako' => 'Mako',
		'Marcellus' => 'Marcellus',
		'Marcellus SC' => 'Marcellus SC',
		'Marck Script' => 'Marck Script',
		'Margarine' => 'Margarine',
		'Marko One' => 'Marko One',
		'Marmelad' => 'Marmelad',
		'Marvel' => 'Marvel',
		'Mate' => 'Mate',
		'Mate SC' => 'Mate SC',
		'Maven Pro' => 'Maven Pro',
		'McLaren' => 'McLaren',
		'Meddon' => 'Meddon',
		'MedievalSharp' => 'MedievalSharp',
		'Medula One' => 'Medula One',
		'Megrim' => 'Megrim',
		'Meie Script' => 'Meie Script',
		'Merienda' => 'Merienda',
		'Merienda One' => 'Merienda One',
		'Merriweather' => 'Merriweather',
		'Metal Mania' => 'Metal Mania',
		'Metamorphous' => 'Metamorphous',
		'Metrophobic' => 'Metrophobic',
		'Michroma' => 'Michroma',
		'Milonga' => 'Milonga',
		'Miltonian' => 'Miltonian',
		'Miltonian Tattoo' => 'Miltonian Tattoo',
		'Miniver' => 'Miniver',
		'Miss Fajardose' => 'Miss Fajardose',
		'Miss Saint Delafield' => 'Miss Saint Delafield',
		'Modern Antiqua' => 'Modern Antiqua',
		'Molengo' => 'Molengo',
		'Molle' => 'Molle',
		'Monda' => 'Monda',
		'Monofett' => 'Monofett',
		'Monoton' => 'Monoton',
		'Monsieur La Doulaise' => 'Monsieur La Doulaise',
		'Montaga' => 'Montaga',
		'Montez' => 'Montez',
		'Montserrat' => 'Montserrat',
		'Montserrat Alternates' => 'Montserrat Alternates',
		'Montserrat Subrayada' => 'Montserrat Subrayada',
		'Mountains of Christmas' => 'Mountains of Christmas',
		'Mouse Memoirs' => 'Mouse Memoirs',
		'Mr Bedford' => 'Mr Bedford',
		'Mr Bedfort' => 'Mr Bedfort',
		'Mr Dafoe' => 'Mr Dafoe',
		'Mr De Haviland' => 'Mr De Haviland',
		'Mrs Saint Delafield' => 'Mrs Saint Delafield',
		'Mrs Sheppards' => 'Mrs Sheppards',
		'Muli' => 'Muli',
		'Mystery Quest' => 'Mystery Quest',
		'Neucha' => 'Neucha',
		'Neuton' => 'Neuton',
		'New Rocker' => 'New Rocker',
		'News Cycle' => 'News Cycle',
		'Niconne' => 'Niconne',
		'Nixie One' => 'Nixie One',
		'Nobile' => 'Nobile',
		'Norican' => 'Norican',
		'Nosifer' => 'Nosifer',
		'Nosifer Caps' => 'Nosifer Caps',
		'Noticia Text' => 'Noticia Text',
		'Nova Round' => 'Nova Round',
		'Numans' => 'Numans',
		'Nunito' => 'Nunito',
		'Offside' => 'Offside',
		'Oldenburg' => 'Oldenburg',
		'Oleo Script' => 'Oleo Script',
		'Oleo Script Swash Caps' => 'Oleo Script Swash Caps',
		'Open Sans' => 'Open Sans',
		'Open Sans Condensed' => 'Open Sans Condensed',
		'Oranienbaum' => 'Oranienbaum',
		'Orbitron' => 'Orbitron',
		'Oregano' => 'Oregano',
		'Orienta' => 'Orienta',
		'Original Surfer' => 'Original Surfer',
		'Oswald' => 'Oswald',
		'Over the Rainbow' => 'Over the Rainbow',
		'Overlock' => 'Overlock',
		'Overlock SC' => 'Overlock SC',
		'Ovo' => 'Ovo',
		'Oxygen' => 'Oxygen',
		'Oxygen Mono' => 'Oxygen Mono',
		'PT Mono' => 'PT Mono',
		'PT Sans' => 'PT Sans',
		'PT Sans Narrow' => 'PT Sans Narrow',
		'PT Serif' => 'PT Serif',
		'PT Serif Caption' => 'PT Serif Caption',
		'Pacifico' => 'Pacifico',
		'Paprika' => 'Paprika',
		'Parisienne' => 'Parisienne',
		'Passero One' => 'Passero One',
		'Passion One' => 'Passion One',
		'Patrick Hand' => 'Patrick Hand',
		'Patua One' => 'Patua One',
		'Paytone One' => 'Paytone One',
		'Peralta' => 'Peralta',
		'Permanent Marker' => 'Permanent Marker',
		'Petit Formal Script' => 'Petit Formal Script',
		'Petrona' => 'Petrona',
		'Philosopher' => 'Philosopher',
		'Piedra' => 'Piedra',
		'Pinyon Script' => 'Pinyon Script',
		'Pirata One' => 'Pirata One',
		'Plaster' => 'Plaster',
		'Play' => 'Play',
		'Playball' => 'Playball',
		'Playfair Display' => 'Playfair Display',
		'Playfair Display SC' => 'Playfair Display SC',
		'Podkova' => 'Podkova',
		'Poiret One' => 'Poiret One',
		'Poller One' => 'Poller One',
		'Poly' => 'Poly',
		'Pompiere' => 'Pompiere',
		'Pontano Sans' => 'Pontano Sans',
		'Port Lligat Sans' => 'Port Lligat Sans',
		'Port Lligat Slab' => 'Port Lligat Slab',
		'Prata' => 'Prata',
		'Press Start 2P' => 'Press Start 2P',
		'Princess Sofia' => 'Princess Sofia',
		'Prociono' => 'Prociono',
		'Prosto One' => 'Prosto One',
		'Puritan' => 'Puritan',
		'Purple Purse' => 'Purple Purse',
		'Quando' => 'Quando',
		'Quantico' => 'Quantico',
		'Quattrocento' => 'Quattrocento',
		'Quattrocento Sans' => 'Quattrocento Sans',
		'Questrial' => 'Questrial',
		'Quicksand' => 'Quicksand',
		'Quintessential' => 'Quintessential',
		'Qwigley' => 'Qwigley',
		'Racing Sans One' => 'Racing Sans One',
		'Radley' => 'Radley',
		'Raleway Dots' => 'Raleway Dots',
		'Raleway' => 'Raleway',
		'Rambla' => 'Rambla',
		'Rammetto One' => 'Rammetto One',
		'Ranchers' => 'Ranchers',
		'Rancho' => 'Rancho',
		'Rationale' => 'Rationale',
		'Redressed' => 'Redressed',
		'Reenie Beanie' => 'Reenie Beanie',
		'Revalia' => 'Revalia',
		'Ribeye' => 'Ribeye',
		'Ribeye Marrow' => 'Ribeye Marrow',
		'Righteous' => 'Righteous',
		'Risque' => 'Risque',
		'Roboto' => 'Roboto',
		'Roboto Condensed' => 'Roboto Condensed',
		'Roboto Condensed Light' => 'Roboto Condensed Light',
		'Rochester' => 'Rochester',
		'Rock Salt' => 'Rock Salt',
		'Rokkitt' => 'Rokkitt',
		'Romanesco' => 'Romanesco',
		'Ropa Sans' => 'Ropa Sans',
		'Rosario' => 'Rosario',
		'Rosarivo' => 'Rosarivo',
		'Rouge Script' => 'Rouge Script',
		'Ruda' => 'Ruda',
		'Rufina' => 'Rufina',
		'Ruge Boogie' => 'Ruge Boogie',
		'Ruluko' => 'Ruluko',
		'Rum Raisin' => 'Rum Raisin',
		'Ruslan Display' => 'Ruslan Display',
		'Russo One' => 'Russo One',
		'Ruthie' => 'Ruthie',
		'Rye' => 'Rye',
		'Sacramento' => 'Sacramento',
		'Sail' => 'Sail',
		'Salsa' => 'Salsa',
		'Sanchez' => 'Sanchez',
		'Sancreek' => 'Sancreek',
		'Sansita One' => 'Sansita One',
		'Sarina' => 'Sarina',
		'Satisfy' => 'Satisfy',
		'Scada' => 'Scada',
		'Schoolbell' => 'Schoolbell',
		'Seaweed Script' => 'Seaweed Script',
		'Sevillana' => 'Sevillana',
		'Seymour One' => 'Seymour One',
		'Shadows Into Light' => 'Shadows Into Light',
		'Shadows Into Light Two' => 'Shadows Into Light Two',
		'Shanti' => 'Shanti',
		'Share' => 'Share',
		'Share Tech' => 'Share Tech',
		'Share Tech Mono' => 'Share Tech Mono',
		'Shojumaru' => 'Shojumaru',
		'Short Stack' => 'Short Stack',
		'Sigmar One' => 'Sigmar One',
		'Signika' => 'Signika',
		'Signika Negative' => 'Signika Negative',
		'Simonetta' => 'Simonetta',
		'Sirin Stencil' => 'Sirin Stencil',
		'Six Caps' => 'Six Caps',
		'Skranji' => 'Skranji',
		'Slackey' => 'Slackey',
		'Smokum' => 'Smokum',
		'Smythe' => 'Smythe',
		'Sniglet' => 'Sniglet',
		'Snippet' => 'Snippet',
		'Snowburst One' => 'Snowburst One',
		'Sofadi One' => 'Sofadi One',
		'Sofia' => 'Sofia',
		'Sonsie One' => 'Sonsie One',
		'Sorts Mill Goudy' => 'Sorts Mill Goudy',
		'Sorts Mill Goudy' => 'Sorts Mill Goudy',
		'Source Code Pro' => 'Source Code Pro',
		'Source Sans Pro' => 'Source Sans Pro',
		'Special I am one' => 'Special I am one',
		'Spicy Rice' => 'Spicy Rice',
		'Spinnaker' => 'Spinnaker',
		'Spirax' => 'Spirax',
		'Squada One' => 'Squada One',
		'Stalemate' => 'Stalemate',
		'Stalinist One' => 'Stalinist One',
		'Stardos Stencil' => 'Stardos Stencil',
		'Stint Ultra Condensed' => 'Stint Ultra Condensed',
		'Stint Ultra Expanded' => 'Stint Ultra Expanded',
		'Stoke' => 'Stoke',
		'Stoke' => 'Stoke',
		'Strait' => 'Strait',
		'Sue Ellen Francisco' => 'Sue Ellen Francisco',
		'Sunshiney' => 'Sunshiney',
		'Supermercado One' => 'Supermercado One',
		'Swanky and Moo Moo' => 'Swanky and Moo Moo',
		'Syncopate' => 'Syncopate',
		'Tangerine' => 'Tangerine',
		'Telex' => 'Telex',
		'Tenor Sans' => 'Tenor Sans',
		'Terminal Dosis' => 'Terminal Dosis',
		'Terminal Dosis Light' => 'Terminal Dosis Light',
		'Text Me One' => 'Text Me One',
		'The Girl Next Door' => 'The Girl Next Door',
		'Tienne' => 'Tienne',
		'Tinos' => 'Tinos',
		'Titan One' => 'Titan One',
		'Titillium Web' => 'Titillium Web',
		'Trade Winds' => 'Trade Winds',
		'Trocchi' => 'Trocchi',
		'Trochut' => 'Trochut',
		'Trykker' => 'Trykker',
		'Tulpen One' => 'Tulpen One',
		'Ubuntu' => 'Ubuntu',
		'Ubuntu Condensed' => 'Ubuntu Condensed',
		'Ubuntu Mono' => 'Ubuntu Mono',
		'Ultra' => 'Ultra',
		'Uncial Antiqua' => 'Uncial Antiqua',
		'Underdog' => 'Underdog',
		'Unica One' => 'Unica One',
		'UnifrakturCook' => 'UnifrakturCook',
		'UnifrakturMaguntia' => 'UnifrakturMaguntia',
		'Unkempt' => 'Unkempt',
		'Unlock' => 'Unlock',
		'Unna' => 'Unna',
		'VT323' => 'VT323',
		'Vampiro One' => 'Vampiro One',
		'Varela' => 'Varela',
		'Varela Round' => 'Varela Round',
		'Vast Shadow' => 'Vast Shadow',
		'Vibur' => 'Vibur',
		'Vidaloka' => 'Vidaloka',
		'Viga' => 'Viga',
		'Voces' => 'Voces',
		'Volkhov' => 'Volkhov',
		'Vollkorn' => 'Vollkorn',
		'Voltaire' => 'Voltaire',
		'Waiting for the Sunrise' => 'Waiting for the Sunrise',
		'Wallpoet' => 'Wallpoet',
		'Walter Turncoat' => 'Walter Turncoat',
		'Warnes' => 'Warnes',
		'Wellfleet' => 'Wellfleet',
		'Wendy One' => 'Wendy One',
		'Wire One' => 'Wire One',
		'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
		'Yellowtail' => 'Yellowtail',
		'Yeseva One' => 'Yeseva One',
		'Yesteryear' => 'Yesteryear',
		'Zeyada' => 'Zeyada'
	);

	//array of all font sizes.
	$font_sizes = array( 
		'10px' => '10px',
		'11px' => '11px',
	);
	for($n=12;$n<=100;$n+=1){
		$font_sizes[$n.'px'] = $n.'px';
	}

	// array of section content.
	$section_text = array(
		1 => array(
			'section_title'		=> '',
			'menutitle'			=> 'wrapone',
			'bgcolor' 			=> '#f5f5f5',
			'bgimage'			=> '',
			'class'				=> 'wrap_one',
			'content'			=> '<i class="fa fa-pencil"></i> <h2>Hey people! We are SKT and let us introduce our new Theme - "Kraft"</h2> Nunc sed lorem pretium, volutpat tortor id, adipiscing sem. Sed bibendum quis augue nec porta. Ut molestie tortor pulvinar, faucibus justo vitae',
		),
		
		2 => array(
			'section_title'	=> '',
			'menutitle'		=> 'wrapsecond',
			'bgcolor' 		=> '#f8f8f8',
			'bgimage'		=> '',
			'class'			=> 'services-wrap',
			'content'		=> '[column_content type="one_third"]<a href="#"><i class="fa fa-desktop"></i>
			<h4>Cool Animated Columns <span>Animated Columns</span></h4></a>Lorem ipsum dolor sit amet, consectetur adipiscinr sed gravida tortor, sed ullamcorper tellus. Cras id magna tempor, porta nunc quis.<a class="rdmore" href="#">Read More ></a>[/column_content]

[column_content type="one_third"]<a href="#"><i class="fa fa-gears"></i>
			<h4>Rich Customization Abilities <span>Color Change</span></h4></a> Lorem ipsum dolor sit amet, consectetur adipiscinr sed gravida tortor, sed ullamcorper tellus. Cras id magna tempor, porta nunc quis.<a class="rdmore" href="#">Read More ></a>[/column_content]

[column_content type="one_third_last"]<a href="#"><i class="fa fa-cloud-download"></i>
			<h4>Gallery Plugin Compatibility <span>Nextgen Gallery</span></h4></a> Lorem ipsum dolor sit amet, consectetur adipiscinr sed gravida tortor, sed ullamcorper tellus. Cras id magna tempor, porta nunc quis.<a class="rdmore" href="#">Read More ></a>[/column_content]',
		),

		3 => array(
			'section_title'	=> 'Recent Projects',
			'menutitle'		=> 'ourgallery',
			'bgcolor' 		=> '#ffffff',
			'bgimage'		=> '',
			'class'			=> 'our-projects',
			'content'		=> '[photogallery filter="true"]'
		),	
		
		4 => array(
			'section_title'	=> 'Our Team',
			'menutitle'		=> 'ourteam',
			'bgcolor' 		=> '#ffffff',
			'bgimage'		=> get_template_directory_uri()."/images/teambg.jpg",
			'class'			=> 'team-wrap',
			'content'		=> '[ourteam show="3"]'
		),
				
		5 => array(
			'section_title'	=> 'Our Clients',
			'menutitle'		=> 'ourclient',
			'bgcolor' 		=> '#f5f5f5',
			'bgimage'		=> '',
			'class'			=> 'client-wrap',
			'content'		=> 'Mauris quis lacus est. Sed ultricies sapien auctor, lacinia nisi blandit, suscipit nulla. Maecenas lobortis tempus augue sit amet lacinia. In ultricies justo eget volutpat ornare. Suspendisse ut interdum urna. Maecenas a nunc non sem condimentum tempor. Duis id enim faucibus augue feugiat convallis. In convallis molestie mauris, id tempus nisi commodo eu.  Donec id ante est. Aenean in ultrices neque, fermentum tincidunt mi. Cras convallis eleifend justo id lobortis. Etiam at massa quis lectus porttitor aliquet eu vel massa. Sed ut augue turpis. Nunc in mollis massa, eu fringilla libero. Aliquam ornare scelerisque velit, non consectetur leo consequat ac. In vel quam ultricies, semper mauris vitae, hendrerit erat. Sed ac mi ac purus eleifend tincidunt.[blankspace height="35"][client_lists][client image="'.get_template_directory_uri().'/images/client-logo1.jpg" link="#"][client image="'.get_template_directory_uri().'/images/client-logo2.jpg" link="#"][client image="'.get_template_directory_uri().'/images/client-logo3.jpg" link="#"][client image="'.get_template_directory_uri().'/images/client-logo4.jpg" link="#"][client image="'.get_template_directory_uri().'/images/client-logo5.jpg" link="#"][client image="'.get_template_directory_uri().'/images/client-logo6.jpg" link="#"][client image="'.get_template_directory_uri().'/images/client-logo7.jpg" link="#"][client image="'.get_template_directory_uri().'/images/client-logo8.jpg" link="#"][/client_lists]'
		),
		
		6 => array(
			'section_title'	=> 'Testimonials',
			'menutitle'		=> 'testimonialsarea',
			'bgcolor' 		=> '',
			'bgimage'		=> '',
			'class'			=> 'testimonials-wrap',
			'content'		=> '[testimonials]',
		
		),			

	);

	$options = array();

	//Basic Settings
	$options[] = array(
		'name' => __('Basic Settings', 'skt-kraft'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Logo', 'skt-kraft'),
		'desc' => __('Upload your main logo here', 'skt-kraft'),
		'id' => 'logo',
		'class' => '',
		'std'	=> get_template_directory_uri()."/images/logo.png",
		'type' => 'upload');

	$options[] = array(
		'name' => __('Favicon', 'skt-kraft'),
		'desc' => __('Upload favicon for website', 'skt-kraft'),
		'id' => 'favicon',
		'class' => '',
		'std'	=> get_template_directory_uri()."/images/favicon.ico",
		'type' => 'upload');

	$options[] = array(
		'name' => __('Custom CSS', 'skt-kraft'),
		'desc' => __('Some Custom Styling for your site. Place any css codes here instead of the style.css file.', 'skt-kraft'),
		'id' => 'style2',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'name' => __('Header Top Info', 'skt-kraft'),
		'desc' => __('Edit header info from here. NOTE: Icon name should be in lowercase without space.(exa.phone) More social icons can be found at: http://fortawesome.github.io/Font-Awesome/icons/', 'skt-kraft'),
		'id' => 'headerinfo',
		'std' => '<i class="fa fa-phone"></i> <span class="phno">+11 123 456 7890</span> Mon. - Fri. 10:00 - 21:00 ',
		'type' => 'textarea');	
		
	$options[] = array(
		'name' => __('Header Top Social Icons', 'skt-kraft'),
		'desc' => __('Edit select social icons for header top', 'skt-kraft'),
		'id' => 'headersocial',
		'std' => ' [social_area]<span>Follow us:</span> [social icon="facebook" link="#"] [social icon="twitter" link="#"] [social icon="google-plus" link="#"] [social icon="linkedin" link="#"][/social_area]',
		'type' => 'textarea');	
		
	$options[] = array(
		'name' => __('Sticky Header', 'skt-kraft'),
		'desc' => __('Uncheck this to enable sticky header on scroll', 'skt-kraft'),
		'id' => 'headstick',
		'std' => 'checked',
		'type' => 'checkbox');
		
	// font family start 
		
	$options[] = array(
		'name' => __('Font Faces', 'skt-kraft'),
		'desc' => __('Select font for the body text', 'skt-kraft'),
		'id' => 'bodyfontface',
		'type' => 'select',
		'std' => 'PT Sans',
		'options' => $font_types );
		
	$options[] = array(
		'desc' => __('Select font for the textual logo', 'skt-kraft'),
		'id' => 'logofontface',
		'type' => 'select',
		'std' => 'Raleway',
		'options' => $font_types );
		
	$options[] = array(
		'desc' => __('Select font for the navigation text', 'skt-kraft'),
		'id' => 'navfontface',
		'type' => 'select',
		'std' => 'Raleway',
		'options' => $font_types );
		
	$options[] = array(
		'desc' => __('Select font for heading text. eg: H1, H2, H3, H4, H5, H6', 'skt-kraft'),
		'id' => 'headfontface',
		'type' => 'select',
		'std' => 'Raleway',
		'options' => $font_types );
		
	$options[] = array(
		'desc' => __('Select font family for header top bar', 'skt-kraft'),
		'id' => 'hdrtopfontface',
		'type' => 'select',
		'std' => 'PT Sans',
		'options' => $font_types );	
		
	// font sizes start	
	$options[] = array(
		'name' => __('Font Sizes', 'skt-kraft'),
		'desc' => __('Select font size for body text', 'skt-kraft'),
		'id' => 'bodyfontsize',
		'type' => 'select',
		'std' => '13px',
		'options' => $font_sizes );
		
	$options[] = array(
		'desc' => __('Select font size for textual logo', 'skt-kraft'),
		'id' => 'logofontsize',
		'type' => 'select',
		'std' => '36px',
		'options' => $font_sizes );
		
	$options[] = array(
		'desc' => __('Select font size for navigation', 'skt-kraft'),
		'id' => 'navfontsize',
		'type' => 'select',
		'std' => '15px',
		'options' => $font_sizes );	
		
	$options[] = array(
		'desc' => __('Select font size for section title', 'skt-kraft'),
		'id' => 'sectitlesize',
		'type' => 'select',
		'std' => '17px',
		'options' => $font_sizes );
	
		
	$options[] = array(
		'desc' => __('Select font size for footer title', 'skt-kraft'),
		'id' => 'ftfontsize',
		'type' => 'select',
		'std' => '18px',
		'options' => $font_sizes );	
		
	$options[] = array(
		'desc' => __('Select font size for header top bar', 'skt-kraft'),
		'id' => 'hdrtopfontsize',
		'type' => 'select',
		'std' => '13px',
		'options' => $font_sizes );	
		
		
	$options[] = array(	
		'name' => __('Header Menu Italic Text', 'skt-restaurant'),	
		'desc' => __('Select font style for header menu italic text', 'skt-restaurant'),
		'id' => 'menufontstyle',
		'std' => 'italic',
		'type' => 'select',		
		'options' => array('italic' => 'italic','normal' => 'normal'));
			

	// font colors start

	$options[] = array(
		'name' => __('Font Colors', 'skt-kraft'),
		'desc' => __('Select font color for the body text', 'skt-kraft'),
		'id' => 'bodyfontcolor',
		'std' => '#78797c',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select font color for textual logo', 'skt-kraft'),
		'id' => 'logofontcolor',
		'std' => '#000000',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select font color for section title', 'skt-kraft'),
		'id' => 'sectitlecolor',
		'std' => '#484f5e',
		'type' => 'color');			
	

	$options[] = array(
		'desc' => __('Select font color for navigation', 'skt-kraft'),
		'id' => 'navfontcolor',
		'std' => '#909090',
		'type' => 'color');

	$options[] = array(
		'desc' => __('Select font color for navigation hover', 'skt-kraft'),
		'id' => 'navhovercolor',
		'std' => '#34c6f6',
		'type' => 'color');
	
		
	$options[] = array(
		'desc' => __('Select font color for widget title', 'skt-kraft'),
		'id' => 'wdgttitleccolor',
		'std' => '#ffffff',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select font color for footer title', 'skt-kraft'),
		'id' => 'foottitlecolor',
		'std' => '#ffffff',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select font color for footer', 'skt-kraft'),
		'id' => 'footdesccolor',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for footer menu ', 'skt-kraft'),
		'id' => 'footermenucolor',
		'std' => '#ffffff',
		'type' => 'color');		
		
	$options[] = array(
		'desc' => __('Select hover/active font color for footer menu ', 'skt-kraft'),
		'id' => 'footermenucurrent',
		'std' => '#34c6f6',
		'type' => 'color');			
		
	$options[] = array(
		'desc' => __('Select font color for footer left text (copyright)', 'skt-kraft'),
		'id' => 'copycolor',
		'std' => '#ffffff',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select font color for footer right text (design by)', 'skt-kraft'),
		'id' => 'designcolor',
		'std' => '#ffffff',
		'type' => 'color');

	$options[] = array(
		'desc' => __('Select font color for links / anchor tags', 'skt-kraft'),
		'id' => 'linkcolor',
		'std' => '#34c6f6',
		'type' => 'color');

	$options[] = array(
		'desc' => __('Select font color for links / anchor tags on hover', 'skt-kraft'),
		'id' => 'linkhovercolor',
		'std' => '#ff6565',
		'type' => 'color');			
		
	$options[] = array(
		'desc' => __('Select font color for sidebar li a', 'skt-kraft'),
		'id' => 'sidebarfontcolor',
		'std' => '#3b3b3b',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font hover color for sidebar li a', 'skt-kraft'),
		'id' => 'sidebarfonthvcolor',
		'std' => '#34c6f6',
		'type' => 'color');			
			
	$options[] = array(
		'desc' => __('Select font color for Testimonials title', 'skt-kraft'),
		'id' => 'tmn_titlefontcolor',
		'std' => '#3c3b3b',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for footer links', 'skt-kraft'),
		'id' => 'copylinks',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font hover color for footer links', 'skt-kraft'),
		'id' => 'copylinkshover',
		'std' => '#34c6f6',
		'type' => 'color');		
		
	$options[] = array(
		'desc' => __('Select font color for social icons', 'skt-kraft'),
		'id' => 'socialfontcolor',
		'std' => '#a9a8a8',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select border hover color for social icons', 'skt-kraft'),
		'id' => 'socialfonthvcolor',
		'std' => '#34c6f6',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select title color for footer posts', 'skt-kraft'),
		'id' => 'footerpoststitle',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select title hover color for footer posts', 'skt-kraft'),
		'id' => 'footerpoststitlehv',
		'std' => '#34c6f6',
		'type' => 'color');			
		
	$options[] = array(
		'desc' => __('Select font color for our team title', 'skt-kraft'),
		'id' => 'teamtitlecolor',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font hover color for our team title', 'skt-kraft'),
		'id' => 'teamtitlehovercolor',
		'std' => '#34c6f6',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select color for our team social icon', 'skt-kraft'),
		'id' => 'teamsicolor',
		'std' => '#cccccc',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select hover color for our team social icon', 'skt-kraft'),
		'id' => 'teamsicolorhv',
		'std' => '#34c6f6',
		'type' => 'color');	
		
	$options[] = array(		
		'desc' => __('Select font color for header top bar', 'skt-kraft'),
		'id' => 'hdrtopfontcolor',
		'std' => '#7f7f7f',
		'type' => 'color');	
		
	$options[] = array(		
		'desc' => __('Select phone icon color for header top', 'skt-kraft'),
		'id' => 'phoneiconcolor',
		'std' => '#34c6f6',
		'type' => 'color');	
		
	$options[] = array(		
		'desc' => __('Select font color for first section below the slider', 'skt-kraft'),
		'id' => 'fsh2color',
		'std' => '#000000',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for three column services icon', 'skt-kraft'),
		'id' => 'srvciconfc',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font hover color for three column services icon', 'skt-kraft'),
		'id' => 'srvciconfchv',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select read more link color for three column services box', 'skt-kraft'),
		'id' => 'srvclinkcolor',
		'std' => '#78797c',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select link hover color for three column services box', 'skt-kraft'),
		'id' => 'srvclinkcolorhv',
		'std' => '#34c6f6',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select title hover color for three column services box', 'skt-kraft'),
		'id' => 'titlecolorhv',
		'std' => '#34c6f6',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for our team paragraph', 'skt-kraft'),
		'id' => 'teamparacolor',
		'std' => '#ffffff',
		'type' => 'color');															
	
	// Background start		
	$options[] = array(	
		'name' => __('Background Colors', 'skt-kraft'),	
		'desc' => __('Select background color for header', 'skt-kraft'),
		'id' => 'headerbg',
		'std' => '#ffffff',
		'type' => 'color');	
	
		
	$options[] = array(
		'desc' => __('Select background color for footer', 'skt-kraft'),
		'id' => 'footerbgcolor',
		'std' => '#464d51',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select background color for copyright section', 'skt-kraft'),
		'id' => 'copybgcolor',
		'std' => '#32373a',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select background color for gallery hover', 'skt-kraft'),
		'id' => 'galhvcolor',
		'std' => '#34c6f6',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select background color for sidebar widget', 'skt-kraft'),
		'id' => 'sidebarbgcolor',
		'std' => '#f9f9f9',
		'type' => 'color');	
		
	$options[] = array(	
		'desc' => __('Select background color for header top bar', 'skt-kraft'),
		'id' => 'hdrtopbgcolor',
		'std' => '#f5f5f5',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select background color for toggle menu', 'skt-kraft'),
		'id' => 'togglemenu',
		'std' => '#34c6f6',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select background color for top search form', 'skt-kraft'),
		'id' => 'searchbgcolor',
		'std' => '#34c6f6',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select background color for three column services icon', 'skt-kraft'),
		'id' => 'srvciconbg',
		'std' => '#8893a8',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select background hover color for three column services icon', 'skt-kraft'),
		'id' => 'srvciconbghv',
		'std' => '#34c6f6',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select background color for testimonials description', 'skt-kraft'),
		'id' => 'tmndescbgcolor',
		'std' => '#f8f8f8',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select background color for testimonials pagination', 'skt-kraft'),
		'id' => 'tmnpagerbg',
		'std' => '#464d51',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select background hover color for testimonials pagination', 'skt-kraft'),
		'id' => 'tmnpagerbghv',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select background color for sidebat widget title', 'skt-kraft'),
		'id' => 'widgettitlebgcolor',
		'std' => '#34c6f6',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select background color for toggle menu on responsive view', 'skt-kraft'),
		'id' => 'tgmenuresponsivebg',
		'std' => '#ffffff',
		'type' => 'color');																		
		
		
		
	// Border colors
	$options[] = array(	
		'name' => __('Border Colors', 'skt-kraft'),		
		'desc' => __('Select border color for footer posts', 'skt-kraft'),
		'id' => 'footerpostborder',
		'std' => '#5e6162',
		'type' => 'color');	
		
	$options[] = array(			
		'desc' => __('Select top border color for our team social icon', 'skt-kraft'),
		'id' => 'teamsiconborder',
		'std' => '#43443c',
		'type' => 'color');	
		
	$options[] = array(			
		'desc' => __('Select border color for iframe', 'skt-kraft'),
		'id' => 'iframeborder',
		'std' => '#e5e5e4',
		'type' => 'color');	
		
	$options[] = array(			
		'desc' => __('Select border color for sidebar li a', 'skt-kraft'),
		'id' => 'sidebarliaborder',
		'std' => '#d0cfcf',
		'type' => 'color');	
		
	$options[] = array(			
		'desc' => __('Select border color for read more button', 'skt-kraft'),
		'id' => 'readmorebutton',
		'std' => '#454545',
		'type' => 'color');	
	
	$options[] = array(			
		'desc' => __('Select border hover color for read more button', 'skt-kraft'),
		'id' => 'readmorebuttonhv',
		'std' => '#34c6f6',
		'type' => 'color');	
		
	$options[] = array(			
		'desc' => __('Select border bottom color for section', 'skt-kraft'),
		'id' => 'secborderbottom',
		'std' => '#eaeaea',
		'type' => 'color');	
		
	// Default Buttons		
	$options[] = array(
		'name' => __('Button Colors', 'skt-kraft'),		
		'desc' => __('Select background color for button', 'skt-kraft'),
		'id' => 'btnbgcolor',
		'std' => '#ff6565',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select hover background color for button', 'skt-kraft'),
		'id' => 'btnbghvcolor',
		'std' => '#34c6f6',
		'type' => 'color');		

	$options[] = array(
		'desc' => __('Select font color button', 'skt-kraft'),
		'id' => 'btntxtcolor',
		'std' => '#ffffff',
		'type' => 'color');

	$options[] = array(
		'desc' => __('Select font color button on hover', 'skt-kraft'),
		'id' => 'btntxthvcolor',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select border color button', 'skt-kraft'),
		'id' => 'btnbordercolor',
		'std' => '#e44545',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select button border color on hover', 'skt-kraft'),
		'id' => 'btnborderhvcolor',
		'std' => '#1898c2',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select transparent button border color', 'skt-kraft'),
		'id' => 'tbbtnborder',
		'std' => '#ffffff',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select transparent button border color on hover', 'skt-kraft'),
		'id' => 'tbbtnhvborder',
		'std' => '#ff6565',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select transparent button font color', 'skt-kraft'),
		'id' => 'tbfontcolor',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select transparent button font color on hover', 'skt-kraft'),
		'id' => 'tbfonthvcolor',
		'std' => '#ff6565',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select active border bottom color for filter gallery', 'skt-kraft'),
		'id' => 'galleryactivebc',
		'std' => '#34c6f6',
		'type' => 'color');			
					
		
	// Slider Caption colors	
	$options[] = array(	
		'name' => __('Slider Caption Colors', 'skt-kraft'),			
		'desc' => __('Select font color for slider title', 'skt-kraft'),
		'id' => 'slidetitlecolor',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(		
		'desc' => __('Select font color for slider description', 'skt-kraft'),
		'id' => 'slidedesccolor',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(		
		'desc' => __('Select font orange color for slider title', 'skt-kraft'),
		'id' => 'slideorngcolor',
		'std' => '#ff6565',
		'type' => 'color');		
		
	$options[] = array(
		'desc' => __('Select font size for slider title', 'skt-kraft'),
		'id' => 'slidetitlefontsize',
		'type' => 'select',
		'std' => '36px',
		'options' => $font_sizes );
		
	$options[] = array(
		'desc' => __('Select font size for slider description', 'skt-kraft'),
		'id' => 'slidedescfontsize',
		'type' => 'select',
		'std' => '13px',
		'options' => $font_sizes );
		
		
	// Slider controls colors		
	$options[] = array(
		'name' => __('Slider controls Colors', 'skt-kraft'),
		'desc' => __('Select background color for slider pager', 'skt-kraft'),
		'id' => 'sldpagebg',
		'std' => '#ffffff',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select background color for slider pager active', 'skt-kraft'),
		'id' => 'sldpagehvbg',
		'std' => '#ff6565',
		'type' => 'color');	
		
	$options[] = array(
		'name' => __('Blog Single Layout', 'skt-kraft'),
		'desc' => __('Select layout. eg:Boxed, Wide', 'skt-kraft'),
		'id' => 'singlelayout',
		'type' => 'select',
		'std' => 'singleright',
		'options' => array('singleright'=>'Blog Single Right Sidebar', 'singleleft'=>'Blog Single Left Sidebar', 'sitefull'=>'Blog Single Full Width', 'nosidebar'=>'Blog Single No Sidebar') );		

	//Layout Settings
	$options[] = array(
		'name' => __('Sections', 'skt-kraft'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Number of Sections', 'skt-kraft'),
		'desc' => __('Select number of sections', 'skt-kraft'),
		'id' => 'numsection',
		'type' => 'select',
		'std' => '6',
		'options' => array_combine(range(1,30), range(1,30)) );

	$numsecs = of_get_option( 'numsection', 6 );

	for( $n=1; $n<=$numsecs; $n++){
		$options[] = array(
			'desc' => __("<h3>Section ".$n."</h3>", 'skt-kraft'),
			'class' => 'toggle_title',
			'type' => 'info');	
	
		$options[] = array(
			'name' => __('Section Title', 'skt-kraft'),
			'id' => 'sectiontitle'.$n,
			'std' => ( ( isset($section_text[$n]['section_title']) ) ? $section_text[$n]['section_title'] : '' ),
			'type' => 'text');

		$options[] = array(
			'name' => __('Section ID', 'skt-kraft'),
			'desc'	=> __('Enter your section ID here. SECTION ID MUST BE IN SMALL LETTERS ONLY AND DO NOT ADD SPACE OR SYMBOL.'),
			'id' => 'menutitle'.$n,
			'std' => ( ( isset($section_text[$n]['menutitle']) ) ? $section_text[$n]['menutitle'] : '' ),
			'type' => 'text');

		$options[] = array(
			'name' => __('Section Background Color', 'skt-kraft'),
			'desc' => __('Select background color for section', 'skt-kraft'),
			'id' => 'sectionbgcolor'.$n,
			'std' => ( ( isset($section_text[$n]['bgcolor']) ) ? $section_text[$n]['bgcolor'] : '' ),
			'type' => 'color');
			
		$options[] = array(
			'name' => __('Background Image', 'skt-kraft'),
			'id' => 'sectionbgimage'.$n,
			'class' => '',
			'std' => ( ( isset($section_text[$n]['bgimage']) ) ? $section_text[$n]['bgimage'] : '' ),
			'type' => 'upload');

		$options[] = array(
			'name' => __('Section CSS Class', 'skt-kraft'),
			'desc' => __('Set class for this section.', 'skt-kraft'),
			'id' => 'sectionclass'.$n,
			'std' => ( ( isset($section_text[$n]['class']) ) ? $section_text[$n]['class'] : '' ),
			'type' => 'text');
			
		$options[] = array(
			'name'	=> __('Hide Section', 'skt-kraft'),
			'desc'	=> __('Check to hide this section', 'skt-kraft'),
			'id'	=> 'hidesec'.$n,
			'type'	=> 'checkbox',
			'std'	=> '');

		$options[] = array(
			'name' => __('Section Content', 'skt-kraft'),
			'id' => 'sectioncontent'.$n,
			'std' => ( ( isset($section_text[$n]['content']) ) ? $section_text[$n]['content'] : '' ),
			'type' => 'editor');
	}


	//SLIDER SETTINGS
	$options[] = array(
		'name' => __('Homepage Slider', 'skt-kraft'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Slider Effects and Timing', 'skt-kraft'),
		'desc' => __('Select slider effect.','skt-kraft'),
		'id' => 'slideefect',
		'std' => 'fade',
		'type' => 'select',
		'options' => array('random'=>'Random', 'fade'=>'Fade', 'fold'=>'Fold', 'sliceDown'=>'Slide Down', 'sliceDownLeft'=>'Slide Down Left', 'sliceUp'=>'Slice Up', 'sliceUpLeft'=>'Slice Up Left', 'sliceUpDown'=>'Slice Up Down', 'sliceUpDownLeft'=>'Slice Up Down Left', 'slideInRight'=>'SlideIn Right', 'slideInLeft'=>'SlideIn Left', 'boxRandom'=>'Box Random', 'boxRain'=>'Box Rain', 'boxRainReverse'=>'Box Rain Reverse', 'boxRainGrow'=>'Box Rain Grow', 'boxRainGrowReverse'=>'Box Rain Grow Reverse' ));
		
	$options[] = array(
		'desc' => __('Animation speed should be multiple of 100.', 'skt-kraft'),
		'id' => 'slideanim',
		'std' => 500,
		'type' => 'text');
		
	$options[] = array(
		'desc' => __('Add slide pause time.', 'skt-kraft'),
		'id' => 'slidepause',
		'std' => 4000,
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slide Controllers', 'skt-kraft'),
		'desc' => __('Hide/Show Direction Naviagtion of slider.','skt-kraft'),
		'id' => 'slidenav',
		'std' => 'true',
		'type' => 'select',
		'options' => array('true'=>'Show', 'false'=>'Hide'));
		
	$options[] = array(
		'desc' => __('Hide/Show pager of slider.','skt-kraft'),
		'id' => 'slidepage',
		'std' => 'false',
		'type' => 'select',
		'options' => array('true'=>'Show', 'false'=>'Hide'));
		
	$options[] = array(
		'desc' => __('Pause Slide on Hover.','skt-kraft'),
		'id' => 'slidepausehover',
		'std' => 'false',
		'type' => 'select',
		'options' => array('true'=>'Yes', 'false'=>'No'));
		
	$options[] = array(
		'name' => __('Slider Image 1', 'skt-kraft'),
		'desc' => __('First Slide', 'skt-kraft'),
		'id' => 'slide1',
		'class' => '',
		'std' => get_template_directory_uri()."/images/slides/slider1.jpg",
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 1', 'skt-kraft'),
		'id' => 'slidetitle1',
		'std' => '"Kraft" is <strong>100% responsive</strong> on <span>any</span> device and resolutions',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'skt-kraft'),
		'id' => 'slidedesc1',
		'std' => 'Nunc sed lorem pretium, volutpat tortor id, adipiscing sem. Sed bibendum quis augue nec porta. Ut molestie tortor pulvinar, faucibus justo vitae, interdum nunc. Vestibulum imperdiet nisl vel condimentum faucibus. Vivamus rutrum ipsum vel luctus. ',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Slider Buttons', 'skt-kraft'),
		'id' => 'slidebutton1',
		'std' => '<a class="btnfeatures" href="#">Read in features</a>',
		'type' => 'textarea');			
		
	$options[] = array(
		'desc' => __('Slide Url', 'skt-kraft'),
		'id' => 'slideurl1',
		'std' => '#',
		'type' => 'text');		
		
	
	$options[] = array(
		'name' => __('Slider Image 2', 'skt-kraft'),
		'desc' => __('Second Slide', 'skt-kraft'),
		'class' => '',
		'id' => 'slide2',
		'std' => get_template_directory_uri()."/images/slides/slider2.jpg",
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 2', 'skt-kraft'),
		'id' => 'slidetitle2',
		'std' => '"Kraft" includes <strong>Solid Animated Divs </strong> <span>Unlimited</span> possibilities',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'skt-kraft'),
		'id' => 'slidedesc2',
		'std' => 'Nunc sed lorem pretium, volutpat tortor id, adipiscing sem. Sed bibendum quis augue nec porta. Ut molestie tortor pulvinar, faucibus justo vitae, interdum nunc. Vestibulum imperdiet nisl vel condimentum faucibus. Vivamus rutrum ipsum vel luctus. ',
		'type' => 'textarea');		
		
	$options[] = array(
		'desc' => __('Slider Buttons', 'skt-kraft'),
		'id' => 'slidebutton2',
		'std' => '<a class="btnfeatures" href="#">Read in features</a>',
		'type' => 'textarea');	
		
			
	$options[] = array(
		'desc' => __('Slide Url', 'skt-kraft'),
		'id' => 'slideurl2',
		'std' => '#',
		'type' => 'text');	
	
		
	$options[] = array(
		'name' => __('Slider Image 3', 'skt-kraft'),
		'desc' => __('Third Slide', 'skt-kraft'),
		'id' => 'slide3',
		'class' => '',
		'std' => get_template_directory_uri()."/images/slides/slider3.jpg",
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 3', 'skt-kraft'),
		'id' => 'slidetitle3',
		'std' => '"Kraft" is <strong>WooCommerce Compatible</strong> Open <span>Shop</span> anytime',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'skt-kraft'),
		'id' => 'slidedesc3',
		'std' => 'Nunc sed lorem pretium, volutpat tortor id, adipiscing sem. Sed bibendum quis augue nec porta. Ut molestie tortor pulvinar, faucibus justo vitae, interdum nunc. Vestibulum imperdiet nisl vel condimentum faucibus. Vivamus rutrum ipsum vel luctus.',
		'type' => 'textarea');	
		
	$options[] = array(
		'desc' => __('Slider Buttons', 'skt-kraft'),
		'id' => 'slidebutton3',
		'std' => '<a class="btnfeatures" href="#">Read in features</a>',
		'type' => 'textarea');				
	
	$options[] = array(
		'desc' => __('Slide Url', 'skt-kraft'),
		'id' => 'slideurl3',
		'std' => '#',
		'type' => 'text');	
			
	
	$options[] = array(
		'name' => __('Slider Image 4', 'skt-kraft'),
		'desc' => __('Fourth Slide', 'skt-kraft'),
		'id' => 'slide4',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 4', 'skt-kraft'),
		'id' => 'slidetitle4',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'skt-kraft'),
		'id' => 'slidedesc4',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Slider Buttons', 'skt-kraft'),
		'id' => 'slidebutton4',
		'std' => '',
		'type' => 'textarea');				
		
	$options[] = array(
		'desc' => __('Slide Url', 'skt-kraft'),
		'id' => 'slideurl4',
		'std' => '',
		'type' => 'text');				
	
	$options[] = array(
		'name' => __('Slider Image 5', 'skt-kraft'),
		'desc' => __('Fifth Slide', 'skt-kraft'),
		'id' => 'slide5',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 5', 'skt-kraft'),
		'id' => 'slidetitle5',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'skt-kraft'),
		'id' => 'slidedesc5',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Slider Buttons', 'skt-kraft'),
		'id' => 'slidebutton5',
		'std' => '',
		'type' => 'textarea');			
		
	$options[] = array(
		'desc' => __('Slide Url', 'skt-kraft'),
		'id' => 'slideurl5',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slider Image 6', 'skt-kraft'),
		'desc' => __('Sixth Slide', 'skt-kraft'),
		'id' => 'slide6',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
		
	$options[] = array(
		'desc' => __('Title 6', 'skt-kraft'),
		'id' => 'slidetitle6',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'skt-kraft'),
		'id' => 'slidedesc6',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Slider Buttons', 'skt-kraft'),
		'id' => 'slidebutton6',
		'std' => '',
		'type' => 'textarea');			
		
	$options[] = array(
		'desc' => __('Slide Url', 'skt-kraft'),
		'id' => 'slideurl6',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slider Image 7', 'skt-kraft'),
		'desc' => __('Seventh Slide', 'skt-kraft'),
		'id' => 'slide7',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 7', 'skt-kraft'),
		'id' => 'slidetitle7',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'skt-kraft'),
		'id' => 'slidedesc7',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Slider Buttons', 'skt-kraft'),
		'id' => 'slidebutton7',
		'std' => '',
		'type' => 'textarea');			
		
	$options[] = array(
		'desc' => __('Slide Url', 'skt-kraft'),
		'id' => 'slideurl7',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slider Image 8', 'skt-kraft'),
		'desc' => __('Eighth Slide', 'skt-kraft'),
		'id' => 'slide8',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 8', 'skt-kraft'),
		'id' => 'slidetitle8',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'skt-kraft'),
		'id' => 'slidedesc8',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Slider Buttons', 'skt-kraft'),
		'id' => 'slidebutton8',
		'std' => '',
		'type' => 'textarea');			
		
	$options[] = array(
		'desc' => __('Slide Url', 'skt-kraft'),
		'id' => 'slideurl8',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slider Image 9', 'skt-kraft'),
		'desc' => __('Ninth Slide', 'skt-kraft'),
		'id' => 'slide9',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 9', 'skt-kraft'),
		'id' => 'slidetitle9',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'skt-kraft'),
		'id' => 'slidedesc9',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Slider Buttons', 'skt-kraft'),
		'id' => 'slidebutton9',
		'std' => '',
		'type' => 'textarea');			
		
	$options[] = array(
		'desc' => __('Slide Url', 'skt-kraft'),
		'id' => 'slideurl9',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slider Image 10', 'skt-kraft'),
		'desc' => __('Tenth Slide', 'skt-kraft'),
		'id' => 'slide10',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 10', 'skt-kraft'),
		'id' => 'slidetitle10',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'skt-kraft'),
		'id' => 'slidedesc10',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Slider Buttons', 'skt-kraft'),
		'id' => 'slidebutton10',
		'std' => '',
		'type' => 'textarea');			
	
	$options[] = array(
		'desc' => __('Slide Url', 'skt-kraft'),
		'id' => 'slideurl10',
		'std' => '',
		'type' => 'text');

	//Footer SETTINGS
	$options[] = array(
		'name' => __('Footer', 'skt-kraft'),
		'type' => 'heading');
				
	$options[] = array(
		'name' => __('Footer About Kraft', 'skt-bakery'),
		'desc' => __('about kraft text title for footer', 'skt-bakery'),
		'id' => 'aboutustitle',
		'std' => 'About Kraft',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('About kraft Description', 'skt-bakery'),
		'desc' => __('about kraft text description for footer', 'skt-bakery'),
		'id' => 'aboutdescription',
		'std' => '<p>Nam aliquet aliquam ipsum eget volutpat. Duis nec porta purus. Integer adipiscing augue sit amet libero vulputate, et fermentum nibh rutrum. In bibendum nisi sed consequat hendrerit. Aliquam.</p>
<p>Quisque elementum, dolor nec tempus eleifend, nibh mauris aliquet ante, eu tempus sapien nisi non nunc. Nulla facilisi. Suspendisse lobortis laoreet risus, a posuere mauris facilisis at. In viverra euismod velit non cursus. </p> ',
		'type' => 'textarea');
		
	$options[] = array(
		'name' => __('Useful Links', 'skt-kraft'),
		'desc' => __('Footer useful links title.', 'skt-kraft'),
		'id' => 'usefullinktitle',
		'std' => 'Useful Links',
		'type' => 'text');	
		
	$options[] = array(
		'desc' => __('add social icon name and link in the shortcodes.', 'skt-kraft'),
		'id' => 'footersocialicons',
		'std' => '[social_area]
    [social icon="facebook" link="#"]
    [social icon="twitter" link="#"]
    [social icon="linkedin" link="#"]
    [social icon="pinterest" link="#"]
    [social icon="google-plus" link="#"]
	[social icon="skype" link="#"] 
	[social icon="behance" link="#"]  
	[social icon="youtube" link="#"]	
	[social icon="instagram" link="#"]
[/social_area]',
		'type' => 'textarea');		
		
	$options[] = array(
		'name' => __(' Recent Posts Title', 'skt-kraft'),
		'desc' => __('recent posts title for footer.', 'skt-kraft'),
		'id' => 'frptitle',
		'std' => 'Recent Posts',
		'type' => 'text');	
		
		
	$options[] = array(
		'name' => __('Footer Address Title', 'skt-kraft'),
		'desc' => __('Add contact title here', 'skt-kraft'),
		'id' => 'contacttitle',
		'std' => 'Contact Info',
		'type' => 'text');	
		
	$options[] = array(	
		'desc' => __('Add company address1 here.', 'skt-kraft'),
		'id' => 'address',
		'std' => '100 King St, Melbourne PIC 4000,',
		'type' => 'text');
		
	$options[] = array(	
		'desc' => __('Add company address2 here.', 'skt-kraft'),
		'id' => 'address2',
		'std' => 'Australia',
		'type' => 'text');	
		
	$options[] = array(		
		'desc' => __('Add phone number here.', 'skt-kraft'),
		'id' => 'phone',
		'std' => '+1 800 234 5678',
		'type' => 'text');
		
	$options[] = array(
		'desc' => __('Add email address here.', 'skt-kraft'),
		'id' => 'email',
		'std' => 'info@sitename.com',
		'type' => 'text');
		
	$options[] = array(
		'desc' => __('Add company url here with http://.', 'skt-kraft'),
		'id' => 'weblink',
		'std' => 'http://demo.com',
		'type' => 'text');
		
		$options[] = array(
		'name' => __('Google Map', 'skt-kraft'),
		'desc' => __('Use iframe code url here. DO NOT APPLY IFRAME TAG', 'skt-exceptiona'),
		'id' => 'googlemap',
		'std' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d336003.6066860609!2d2.349634820486094!3d48.8576730786213!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x040b82c3688c9460!2sParis%2C+France!5e0!3m2!1sen!2sin!4v1433482358672',
		'type' => 'textarea');
			
	
		
	$options[] = array(
		'name' => __('Footer Copyright', 'skt-kraft'),
		'desc' => __('Copyright Text for your site.', 'skt-kraft'),
		'id' => 'copytext',
		'std' => '&copy; 2015 <a href="#">SKT Kraft. </a> All Rights Reserved',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Footre Text Link', 'skt-kraft'),
		'id' => 'ftlink',
		'std' => 'Design by <a href="'.esc_url('http://www.sktthemes.net/').'" target="_blank">SKT Themes</a>',
		'type' => 'textarea',);

	//Short codes
	$options[] = array(
		'name' => __('Short Codes', 'skt-kraft'),
		'type' => 'heading');	
		
	
	$options[] = array(
		'name' => __('Photo Gallery', 'skt-kraft'),
		'desc' => __('[photogallery filter="true"]', 'skt-kraft'),
		'type' => 'info');			
			
		
	$options[] = array(
		'name' => __('Testimonials', 'skt-kraft'),
		'desc' => __('[testimonials]', 'skt-kraft'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Contact Form', 'skt-kraft'),
		'desc' => __('[contactform to_email="test@example.com" title="Contact Form"] 
', 'skt-kraft'),
		'type' => 'info');		
		
	$options[] = array(
		'name' => __('Footer posts', 'skt-kraft'),
		'desc' => __('[footer-posts show="2"]', 'skt-kraft'),
		'type' => 'info');	
		
	$options[] = array(
		'name' => __('Team Member', 'skt-kraft'),
		'desc' => __('[ourteam show="4"]', 'skt-kraft'),
		'type' => 'info');					
	
				
	$options[] = array(
		'name' => __('Search Form', 'skt-kraft'),
		'desc' => __('[searchform] 
', 'skt-kraft'),
		'type' => 'info');
			
		
	$options[] = array(
		'name' => __('Headings', 'skt-kraft'),
		'desc' => __('[heading underline="yes" align="left"]Our Team[/heading]', 'skt-kraft'),
		'type' => 'info');					

	$options[] = array(
		'name' => __('View More Button', 'skt-kraft'),
		'desc' => __('[readmore-link align="left" button="Read More" links="#"]', 'skt-kraft'),
		'type' => 'info');	

		
	$options[] = array(
		'name' => __('Social Icons ( Note: More social icons can be found at: http://fortawesome.github.io/Font-Awesome/icons/)', 'skt-kraft'),
		'desc' => __('[social_area]
    [social icon="facebook" link="#"]
    [social icon="twitter" link="#"]
    [social icon="linkedin" link="#"]
    [social icon="pinterest" link="#"]
    [social icon="google-plus" link="#"]
	[social icon="youtube" link="#"]
	[social icon="wordpress" link="#"]
	[social icon="flickr" link="#"]
	[social icon="skype" link="#"]
[/social_area]', 'skt-kraft'),
		'type' => 'info');	
		
	$options[] = array(
		'name' => __('Our Client Logos', 'skt-kraft'),
		'desc' => __('[client_lists][client image="http://localhost/www/sktthemes/Kraft/wp-content/themes/skt-kraft-pro/images/client-logo1.jpg" link="#"][client image="http://localhost/www/sktthemes/Kraft/wp-content/themes/skt-kraft-pro/images/client-logo2.jpg" link="#"][client image="http://localhost/www/sktthemes/Kraft/wp-content/themes/skt-kraft-pro/images/client-logo3.jpg" link="#"][client image="http://localhost/www/sktthemes/Kraft/wp-content/themes/skt-kraft-pro/images/client-logo4.jpg" link="#"][client image="http://localhost/www/sktthemes/Kraft/wp-content/themes/skt-kraft-pro/images/client-logo5.jpg" link="#"][client image="http://localhost/www/sktthemes/Kraft/wp-content/themes/skt-kraft-pro/images/client-logo6.jpg" link="#"][client image="http://localhost/www/sktthemes/Kraft/wp-content/themes/skt-kraft-pro/images/client-logo7.jpg" link="#"][client image="http://localhost/www/sktthemes/Kraft/wp-content/themes/skt-kraft-pro/images/client-logo8.jpg" link="#"][/client_lists]', 'skt-kraft'),
		'type' => 'info');	
		
	$options[] = array(
		'name' => __('Animation Name list', 'skt-kraft'),
		'desc' => __('bounce, flash, pulse, shake, swing, tada, wobble, bounceIn, bounceInDown, bounceInLeft, bounceInRight, bounceInUp, bounceOut, bounceOutDown, bounceOutLeft, bounceOutRight, bounceOutUp, fadeIn, fadeInDown, fadeInDownBig, fadeInLeft, fadeInLeftBig, fadeInRight, fadeInRightBig, fadeInUp, fadeInUpBig, fadeOut, fadeOutDown, fadeOutDownBig, fadeOutLeft, fadeOutLeftBig, fadeOutRight, fadeOutRightBig, fadeOutUp, fadeOutUpBig, flip, flipInX, flipInY, flipOutX, flipOutY, lightSpeedIn, lightSpeedOut, rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight, rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight, slideInDown, slideInLeft, slideInRight, slideOutLeft, slideOutRight, slideOutUp, rollIn, rollOut, zoomIn, zoomInDown, zoomInLeft, zoomInRight, zoomInUp', 'skt-kraft'),
		'type' => 'info');	

	$options[] = array(
		'name' => __('2 Column Content', 'skt-kraft'),
		'desc' => __('<pre>
[column_content type="one_half" animation="name of animation"]
	Column 1 Content goes here...
[/column_content]

[column_content type="one_half_last" animation="name of animation"]
	Column 2 Content goes here...
[/column_content]
</pre>', 'skt-kraft'),
		'type' => 'info');	

	$options[] = array(
		'name' => __('3 Column Content', 'skt-kraft'),
		'desc' => __('<pre>
[column_content type="one_third" animation="name of animation"]
	Column 1 Content goes here...
[/column_content]

[column_content type="one_third" animation="name of animation"]
	Column 2 Content goes here...
[/column_content]

[column_content type="one_third_last" animation="name of animation"]
	Column 3 Content goes here...
[/column_content]
</pre>', 'skt-kraft'),
		'type' => 'info');	

	$options[] = array(
		'name' => __('4 Column Content', 'skt-kraft'),
		'desc' => __('<pre>
[column_content type="one_fourth" animation="name of animation"]
	Column 1 Content goes here...
[/column_content]

[column_content type="one_fourth" animation="name of animation"]
	Column 2 Content goes here...
[/column_content]

[column_content type="one_fourth" animation="name of animation"]
	Column 3 Content goes here...
[/column_content]

[column_content type="one_fourth_last" animation="name of animation"]
	Column 4 Content goes here...
[/column_content]
</pre>', 'skt-kraft'),
		'type' => 'info');	

	$options[] = array(
		'name' => __('5 Column Content', 'skt-kraft'),
		'desc' => __('<pre>
[column_content type="one_fifth" animation="name of animation"]
	Column 1 Content goes here...
[/column_content]

[column_content type="one_fifth" animation="name of animation"]
	Column 2 Content goes here...
[/column_content]

[column_content type="one_fifth" animation="name of animation"]
	Column 3 Content goes here...
[/column_content]

[column_content type="one_fifth" animation="name of animation"]
	Column 4 Content goes here...
[/column_content]

[column_content type="one_fifth_last" animation="name of animation"]
	Column 5 Content goes here...
[/column_content]
</pre>', 'skt-kraft'),
		'type' => 'info');	

	$options[] = array(
		'name' => __('Clear', 'skt-kraft'),
		'desc' => __('<pre>
[clear]
</pre>', 'skt-kraft'),
		'type' => 'info');	

	$options[] = array(
		'name' => __('HR / Horizontal separation line', 'skt-kraft'),
		'desc' => __('<pre>
[hr] or &lt;hr&gt;
</pre>', 'skt-kraft'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Separator / blank space', 'skt-kraft'),
		'desc' => __('<pre>
[separator height="20"]
</pre>', 'skt-kraft'),
		'type' => 'info');	
		
	$options[] = array(
		'name' => __('Blank space without image', 'skt-kraft'),
		'desc' => __('<pre>
[blankspace height="20"]
</pre>', 'skt-kraft'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Tabs', 'skt-kraft'),
		'desc' => __('<pre>
[tabs]
	[tab title="TAB TITLE 1"]
		TAB CONTENT 1
	[/tab]
	[tab title="TAB TITLE 2"]
		TAB CONTENT 2
	[/tab]
	[tab title="TAB TITLE 3"]
		TAB CONTENT 3
	[/tab]
[/tabs]
</pre>', 'skt-kraft'),
		'type' => 'info');


	$options[] = array(
		'name' => __('Toggle Content', 'skt-kraft'),
		'desc' => __('<pre>
[toggle_content title="Toggle Title 1"]
	Toggle content 1...
[/toggle_content]
[toggle_content title="Toggle Title 2"]
	Toggle content 2...
[/toggle_content]
[toggle_content title="Toggle Title 3"]
	Toggle content 3...
[/toggle_content]
</pre>', 'skt-kraft'),
		'type' => 'info');


	$options[] = array(
		'name' => __('Accordion Content', 'skt-kraft'),
		'desc' => __('<pre>
[accordion]
	[accordion_content title="ACCORDION TITLE 1"]
		ACCORDION CONTENT 1
	[/accordion_content]
	[accordion_content title="ACCORDION TITLE 2"]
		ACCORDION CONTENT 2
	[/accordion_content]
	[accordion_content title="ACCORDION TITLE 3"]
		ACCORDION CONTENT 3
	[/accordion_content]
[/accordion]
</pre>', 'skt-kraft'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Gradient Button - Small', 'skt-kraft'),
		'desc' => __('<pre>
[gradient_button size="small" bg_color="#e00" color="#fff" text="Medium Gradient Button" title="Medium Gradient Button" url="" position="left"]
</pre>', 'skt-kraft'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Gradient Button - Medium', 'skt-kraft'),
		'desc' => __('<pre>
[gradient_button size="medium" bg_color="#060" color="#fff" text="Medium Gradient Button" title="Medium Gradient Button" url="" position="left"]
</pre>', 'skt-kraft'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Gradient Button - Large', 'skt-kraft'),
		'desc' => __('<pre>
[gradient_button size="large" bg_color="#026" color="#fff" text="Large Gradient Button" title="Large Gradient Button" url="" position="left"]
</pre>', 'skt-kraft'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Gradient Button - Xtra Large', 'skt-kraft'),
		'desc' => __('<pre>
[gradient_button size="x-large" bg_color="#00ccff" color="#fff" text="Extra Large Simple Button" title="Extra Large Simple Button" url="" position="left"]
</pre>', 'skt-kraft'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Simple Button - Small', 'skt-kraft'),
		'desc' => __('<pre>
[simple_button size="small" bg_color="#c00" color="#fff" text="Small Simple Button" title="Small Simple Button" url="#" position="left"]
</pre>', 'skt-kraft'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Simple Button - Medium', 'skt-kraft'),
		'desc' => __('<pre>
[simple_button size="medium" bg_color="#060" color="#fff" text="Medium Simple Button" title="Medium Simple Button" url="" position="left"]
</pre>', 'skt-kraft'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Simple Button - Large', 'skt-kraft'),
		'desc' => __('<pre>
[simple_button size="large" bg_color="#026" color="#fff" text="Large Simple Button" title="Large Simple Button" url="" position="left"]
</pre>', 'skt-kraft'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Simple Button - Xtra Large', 'skt-kraft'),
		'desc' => __('<pre>
[simple_button size="x-large" bg_color="#00ccff" color="#fff" text="Extra Large Simple Button" title="Extra Large Simple Button" url="" position="left"]
</pre>', 'skt-kraft'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Round Button - Light', 'skt-kraft'),
		'desc' => __('<pre>
[round_button style="light" text="Round Button" title="Round Button" url="" position="left"]
</pre>', 'skt-kraft'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Round Button - Dark', 'skt-kraft'),
		'desc' => __('<pre>
[round_button style="dark" text="Round Button" title="Round Button" url="" position="left"]
</pre>', 'skt-kraft'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Message Box - Success', 'skt-kraft'),
		'desc' => __('<pre>
[message type="success"]This is a sample of the \'success\' style message box shortcode. To use this style use the following shortcode[/message]
</pre>', 'skt-kraft'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Message Box - Error', 'skt-kraft'),
		'desc' => __('<pre>
[message type="error"]This is a sample of the \'error\' style message box shortcode. To use this style use the following shortcode.[/message]
</pre>', 'skt-kraft'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Message Box - Warning', 'skt-kraft'),
		'desc' => __('<pre>
[message type="warning"]This is a sample of the \'warning\' style message box shortcode. To use this style use the following shortcode.[/message]
</pre>', 'skt-kraft'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Message Box - Info', 'skt-kraft'),
		'desc' => __('<pre>
[message type="info"]This is a sample of the \'info\' style message box shortcode. To use this style use the following shortcode.[/message]
</pre>', 'skt-kraft'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Message Box - About', 'skt-kraft'),
		'desc' => __('<pre>
[message type="about"]This is a sample of the \'about\' style message box shortcode. To use this style use the following shortcode.[/message]
</pre>', 'skt-kraft'),
		'type' => 'info');

	$options[] = array(
		'name' => __('List Styles', 'skt-kraft'),
		'desc' => __('<pre>
[unordered_list style="list-1"]&lt;li&gt;List style 1&lt;/li&gt;[/unordered_list]
</pre>
<br />You can use above shortcode OR simply add class to ul. You can choose from list-1 to list-10 styles.<br />
<pre>
&lt;ul class="list-1"&gt;&lt;li&gt;List style 1&lt;/li&gt;&lt;/ul&gt;
</pre>
', 'skt-kraft'),
		'type' => 'info');
		
	
	$options[] = array(
		'name' => __('Horizontal Separator', 'skt-kraft'),
		'desc' => __('[hr_top] 
', 'skt-kraft'),
		'type' => 'info');
	
		
	$options[] = array(
		'name' => __('Pricing', 'skt-kraft'),
		'desc' => __('<pre>
[pricing_table columns="4"]
	[price_column highlight="no" bgcolor="#003366"]
		[price_header]Basic[/price_header]
		[price_row]&lt;strong&gt;$49.99 &lt;br /&gt;Per month&lt;/strong&gt;[/price_row]
		[price_row]5GB Bandwidth[/price_row]
		[price_row]1GB Storage[/price_row]
		[price_row]1 Domain[/price_row]
		[price_row]10 Email Accounts[/price_row]
		[price_footer link="#1"]Buy Basic[/price_footer]
	[/price_column][price_column highlight="yes" bgcolor="#990000"]
		[price_header]Premium[/price_header]
		[price_row]&lt;strong&gt;$99.99 &lt;br /&gt;Per month&lt;/strong&gt;[/price_row]
		[price_row]20GB Bandwidth[/price_row]
		[price_row]5GB Storage[/price_row]
		[price_row]5 Domains[/price_row]
		[price_row]25 Email Accounts[/price_row]
		[price_footer link="#2"]Buy Premium[/price_footer]
	[/price_column][price_column highlight="no" bgcolor="#83672b"]
		[price_header]Professional[/price_header]
		[price_row]&lt;strong&gt;$149.99 &lt;br /&gt;Per month&lt;/strong&gt;[/price_row]
		[price_row]50GB Bandwidth[/price_row]
		[price_row]10GB Storage[/price_row]
		[price_row]20 Domains[/price_row]
		[price_row]50 Email Accounts[/price_row]
		[price_footer link="#3"]Buy Professional[/price_footer]
	[/price_column][price_column highlight="no"]
		[price_header]Ultimate[/price_header]
		[price_row]&lt;strong&gt;$199.99 &lt;br /&gt;Per month&lt;/strong&gt;[/price_row]
		[price_row]Unlimited Bandwidth[/price_row]
		[price_row]Unlimited Storage[/price_row]
		[price_row]50 Domains[/price_row]
		[price_row]100 Email Accounts[/price_row]
		[price_footer link="#4"]Buy Ultimate[/price_footer]
	[/price_column]
[/pricing_table]
</pre>
', 'skt-kraft'),
		'type' => 'info');

	// Support					
	$options[] = array(
		'name' => __('Our Themes', 'skt-kraft'),
		'type' => 'heading');

	$options[] = array(
		'desc' => __('SKT Kraft WordPress theme has been Designed and Created by <a href="'.esc_url('http://sktthemes.net/').'" target="_blank">SKT Themes</a>', 'skt-kraft'),
		'type' => 'info');	

	 $options[] = array(
		'desc' => __('<a href="'.esc_url('http://sktthemes.net/').'" target="_blank"><img src="'.get_template_directory_uri().'/images/sktskill.jpg"></a>', 'skt-kraft'),
		'type' => 'info');	

	return $options;
}