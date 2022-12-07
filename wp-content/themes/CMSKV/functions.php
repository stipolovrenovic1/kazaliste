<?php
if ( ! function_exists( 'inicijaliziraj_temu' ) )
{
	function inicijaliziraj_temu()
	{
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		register_nav_menus( array(
			'glavni-menu' => "Glavni navigacijski izbornik",
			'sporedni-menu' => "Izbornik u podnožju",
		) );
		add_theme_support( 'custom-background', apply_filters
			(
				'test_custom_background_args', array
				(
					'default-color' => 'ffffff',
					'default-image' => '',
				) 	
			) 
		);
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_post_type_support( 'predstava', 'thumbnail' );
		add_post_type_support( 'zaposlenik', 'thumbnail' );
		add_post_type_support( 'glumac', 'thumbnail' );
		add_post_type_support( 'redatelj', 'thumbnail' );
	}
}
add_action( 'after_setup_theme', 'inicijaliziraj_temu' );

// regsitracija sidebar-a
function aktiviraj_sidebar()
{
	register_sidebar(
		array (
			'name' => "Glavni sidebar",
			'id' => 'glavni-sidebar',
			'description' => "Glavni sidebar",
			'before_widget' => '<div class="widget-content">',
			'after_widget' => "</div>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);

	register_sidebar(
			array (
				'name' => "Footer sidebar 1",
				'id' => 'footer-sidebar1',
				'description' => "Footer sidebar 1",
				'before_widget' => '<div class="footer-sidebar">',
				'after_widget' => "</div>",
				'before_title' => '<h4 class="footer-sidebar-title">',
				'after_title' => '</h4>',
			)
		);
	register_sidebar(
			array (
				'name' => "Footer sidebar 2",
				'id' => 'footer-sidebar2',
				'description' => "Footer sidebar 2",
				'before_widget' => '<div class="footer-sidebar">',
				'after_widget' => "</div>",
				'before_title' => '<h4 class="footer-sidebar-title">',
				'after_title' => '</h4>',
			)
		);

	register_sidebar(
			array (
				'name' => "Footer sidebar 3",
				'id' => 'footer-sidebar3',
				'description' => "Footer sidebar 3",
				'before_widget' => '<div class="footer-sidebar">',
				'after_widget' => "</div>",
				'before_title' => '<h4 class="footer-sidebar-title">',
				'after_title' => '</h4>',
			)
		);

	register_sidebar(
			array (
				'name' => "Footer sidebar 4",
				'id' => 'footer-sidebar4',
				'description' => "Footer sidebar 4",
				'before_widget' => '<div class="footer-sidebar">',
				'after_widget' => "</div>",
				'before_title' => '<h4 class="footer-sidebar-title">',
				'after_title' => '</h4>',
			)
		);

}
add_action( 'widgets_init', 'aktiviraj_sidebar' );
//učitavanje CSS datoteke



// Register Custom Post Type
function register_predstava_cpt() {

	$labels = array(
		'name'                  => _x( 'Predstave', 'Post Type General Name', 'kazaliste' ),
		'singular_name'         => _x( 'Predstava', 'Post Type Singular Name', 'kazaliste' ),
		'menu_name'             => __( 'Predstave', 'kazaliste' ),
		'name_admin_bar'        => __( 'Predstave', 'kazaliste' ),
		'archives'              => __( 'Predstave arhiva', 'kazaliste' ),
		'attributes'            => __( 'Atributi', 'kazaliste' ),
		'parent_item_colon'     => __( 'Roditeljski element', 'kazaliste' ),
		'all_items'             => __( 'Sve predstave', 'kazaliste' ),
		'add_new_item'          => __( 'Dodaj novu predstavu', 'kazaliste' ),
		'add_new'               => __( 'Dodaj novi', 'kazaliste' ),
		'new_item'              => __( 'Nova predstava', 'kazaliste' ),
		'edit_item'             => __( 'Uredi predstavu', 'kazaliste' ),
		'update_item'           => __( 'Ažuriraj predstavu', 'kazaliste' ),
		'view_item'             => __( 'Vidi predstavu', 'kazaliste' ),
		'view_items'            => __( 'Vidi predstave', 'kazaliste' ),
		'search_items'          => __( 'Traži predstavu', 'kazaliste' ),
		'not_found'             => __( 'Nije pronađeno', 'kazaliste' ),
		'not_found_in_trash'    => __( 'Nije pronađeno u smeću', 'kazaliste' ),
		'featured_image'        => __( 'Glavna slika', 'kazaliste' ),
		'set_featured_image'    => __( 'Postavi glavnu sliku', 'kazaliste' ),
		'remove_featured_image' => __( 'Ukloni glavnu sliku', 'kazaliste' ),
		'use_featured_image'    => __( 'Postavi za glavnu sliku', 'kazaliste' ),
		'insert_into_item'      => __( 'Umetni', 'kazaliste' ),
		'uploaded_to_this_item' => __( 'Preneseno', 'kazaliste' ),
		'items_list'            => __( 'Lista', 'kazaliste' ),
		'items_list_navigation' => __( 'Navigacija među predstavama', 'kazaliste' ),
		'filter_items_list'     => __( 'Filtriranje predstava', 'kazaliste' ),
	);
	$args = array(
		'label'                 => __( 'Predstava', 'kazaliste' ),
		'description'           => __( 'predstava post type', 'kazaliste' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions'),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'menu_icon' 			=> 'dashicons-video-alt2'
	);
	register_post_type( 'predstava', $args );

}
add_action( 'init', 'register_predstava_cpt', 0 );


function registriraj_taksonomiju_vrsta_predstave() {
$labels = array(
'name' => _x( 'Vrste predstava', 'Taxonomy General Name', 'kazaliste' ),
'singular_name' => _x( 'Vrsta predstave', 'Taxonomy Singular Name', 'kazaliste' ),
'menu_name' => __( 'Vrste predstava', 'kazaliste' ),
'all_items' => __( 'Sve vrste predstava', 'kazaliste' ),
'parent_item' => __( 'Roditeljska vrsta', 'kazaliste' ),
'parent_item_colon' => __( 'Roditeljska vrsta', 'kazaliste' ),
'new_item_name' => __( 'Nova vrsta predstave', 'kazaliste' ),
'add_new_item' => __( 'Dodaj novu vrstu predstave', 'kazaliste' ),
'edit_item' => __( 'Uredi vrstu predstave', 'kazaliste' ),
'update_item' => __( 'Ažuiriraj vrstu predstave', 'kazaliste' ),
'view_item' => __( 'Pogledaj vrstu predstave', 'kazaliste' ),
'separate_items_with_commas' => __( 'Odvojite vrste sa zarezima', 'kazaliste' ),
'add_or_remove_items' => __( 'Dodaj ili ukloni vrstu predstave', 'kazaliste' ),
'choose_from_most_used' => __( 'Odaberi među najčešće korištenima', 'kazaliste' ),
'popular_items' => __( 'Popularne vrste predstava', 'kazaliste' ),
'search_items' => __( 'Pretraga', 'kazaliste' ),
'not_found' => __( 'Nema rezultata', 'kazaliste' ),
'no_terms' => __( 'Nema vrsti predstava', 'kazaliste' ),
'items_list' => __( 'Lista vrsti predstava', 'kazaliste' ),
'items_list_navigation' => __( 'Navigacija', 'kazaliste' ),
);
$args = array(
'labels' => $labels,
'hierarchical' => true,
'public' => true,
'show_ui' => true,
'show_admin_column' => true,
'show_in_nav_menus' => true,
'show_tagcloud' => true,
);
register_taxonomy( 'vrsta_predstave', array( 'predstava' ), $args );
}
add_action( 'init', 'registriraj_taksonomiju_vrsta_predstave', 0 );

function daj_predstave()
{
$args = array(
'posts_per_page' => -1,
'post_type' => 'predstava',
'post_status' => 'publish'
);
$predstave = get_posts( $args );

$sHtml = "<h3 style='margin-left: 25px;'>Sve predstave</h3>
		  <ul style='list-style-type:none;'>";
foreach ($predstave as $predstava)
{
$sPredstavaUrl = $predstava->guid;
$sPredstavaNaziv = $predstava->post_title;
$nPredstavaId = $predstava->ID;
$sIstaknutaSlika = get_the_post_thumbnail_url($nPredstavaId);
$sHtml .= '<li class= "listItem" style= "display:inline-block;">
		   	<div style="margin-left: 15px">
                <figure style ="height: 250px; width: 200px; ">
                	<a href="'.$sPredstavaUrl.'">
                        <img src="'.$sIstaknutaSlika.'" alt="" style="height: 80%; width:100%">
                        <figcaption style="">'.$sPredstavaNaziv.'</figcaption>
                    </a>
                </figure>
            </div>
           </li>';
}
$sHtml .= "</ul>";
return $sHtml;
}

function daj_predstave_vrste($slug)
{
	$args = array(
	'posts_per_page' => -1,
	'post_type' => 'predstava',
	'post_status' => 'publish',
	 'tax_query' => array(
	array(
	'taxonomy' => 'vrsta_predstave',
	'field' => 'slug',
	'terms' => $slug
	)
	));
	$predstave = get_posts( $args );

	$title = '';

	switch($slug)
	{
		case 'komedija':
			$title = "Komedije";
		break;

		case 'tragedija':
			$title = "Tragedije";
		break;

		case 'mjuzikl':
			$title = "Mjuzikli";
		break;
	}


	$sHtml = "<h3 style='margin-left: 25px;'>".$title."</h3>
	          <ul style='list-style-type:none;'>";
	foreach ($predstave as $predstava)
	{
	$sPredstavaUrl = $predstava->guid;
	$sPredstavaNaziv = $predstava->post_title;
	$nPredstavaId = $predstava->ID;
	$sIstaknutaSlika = get_the_post_thumbnail_url($nPredstavaId);
	$sHtml .= '<li class= "listItem" style= "display:inline-block;">
			   	<div style="margin-left: 15px">
	                <figure style ="height: 250px; width: 200px; ">
	                	<a href="'.$sPredstavaUrl.'">
	                        <img src="'.$sIstaknutaSlika.'" alt="" style="height: 80%; width:100%">
	                        <figcaption style="">'.$sPredstavaNaziv.'</figcaption>
	                    </a>
	                </figure>
	            </div>
	           </li>';
	}
	$sHtml .= "</ul>";
	return $sHtml;
}

function daj_dostupne_predstave_vrste($slug)
{
	$args = array(
	'posts_per_page' => -1,
	'post_type' => 'predstava',
	'post_status' => 'publish',
	 'tax_query' => array(
	array(
	'taxonomy' => 'vrsta_predstave',
	'field' => 'slug',
	'terms' => $slug
	)
	));
	$predstave = get_posts( $args );

	$title = '';

	switch($slug)
	{
		case 'komedija':
			$title = "Komedije";
		break;

		case 'tragedija':
			$title = "Tragedije";
		break;

		case 'mjuzikl':
			$title = "Mjuzikli";
		break;
	}

	$sHtml = "<h3 style='margin-left: 25px;'>".$title."</h3>
			  <ul style='list-style-type:none;'>";
	foreach ($predstave as $predstava)
	{
		$sPredstavaUrl = $predstava->guid;
		$sPredstavaNaziv = $predstava->post_title;
		$nPredstavaId = $predstava->ID;
		$sIstaknutaSlika = get_the_post_thumbnail_url($nPredstavaId);
		$nBrojSjedala = get_post_meta($nPredstavaId, 'sjedala_predstave', true);
		$date = get_post_meta($nPredstavaId, 'informacija_datum_predstave', true);
		$dateArray = explode('-', $date);
		$dateReversed = array_reverse($dateArray);
		$newDate = implode('.', $dateReversed);
		$time = get_post_meta($nPredstavaId, 'informacija_vrijeme_predstave', true);
		if($nBrojSjedala >= 1)
		{
			$sHtml .= '<li class= "listItem" style= "display:inline-block;">
				   	<div style="margin-left: 15px">
		                <figure style ="height: 250px; width: 200px; ">
		                	<a href = "javascript:seatsAmount(\''.$nPredstavaId.'\', \''.$nBrojSjedala.'\', \''.$newDate.'\', \''.$time.'\')">
		                        <img src="'.$sIstaknutaSlika.'" alt="" style="height: 80%; width:100%">
		                        <figcaption style=""><span style= "font-weight:bold;">'.$sPredstavaNaziv.'</span><br>Broj slobodnih sjedala: '.$nBrojSjedala.'</figcaption>
		                    </a>
		                </figure>
		            </div>
		           </li>';
		}
	}
	$sHtml .= "</ul>";
	return $sHtml;
}

function daj_dostupne_predstave()
{
	$args = array(
	'posts_per_page' => -1,
	'post_type' => 'predstava',
	'post_status' => 'publish'
	);
	$predstave = get_posts( $args );

	$sHtml = "<h3 style='margin-left: 25px;'>Sve dostupne predstave</h3>
			  <ul style='list-style-type:none;'>";
	foreach ($predstave as $predstava)
	{
		$sPredstavaNaziv = $predstava->post_title;
		$nPredstavaId = $predstava->ID;
		$sIstaknutaSlika = get_the_post_thumbnail_url($nPredstavaId);
		$nBrojSjedala = get_post_meta($nPredstavaId, 'sjedala_predstave', true);
		if($nBrojSjedala >= 1)
		{
			$sHtml .= '<li class= "listItem" style= "display:inline-block;">
				   	<div style="margin-left: 15px">
		                <figure style ="height: 250px; width: 200px; ">
		                	<a href = "javascript:seatsAmount(\''.$nPredstavaId.'\', \''.$nBrojSjedala.'\', \''.$newDate.'\', \''.$time.'\')">
		                        <img src="'.$sIstaknutaSlika.'" alt="" style="height: 80%; width:100%">
		                        <figcaption style=""><span style= "font-weight:bold;">'.$sPredstavaNaziv.'</span><br>Broj slobodnih sjedala: '.$nBrojSjedala.'</figcaption>
		                    </a>
		                </figure>
		            </div>
		           </li>';
		}
	}
	$sHtml .= "</ul>";
	return $sHtml;
}

function add_meta_box_informacije_predstave()
{
	add_meta_box( 'kazaliste_predstava_informacije', 'Osnovne informacije', 'html_meta_box_predstava', 'predstava');
}
function html_meta_box_predstava($post)
{
	wp_nonce_field('spremi_informaciju_predstave', 'informacija_datum_nonce');
	wp_nonce_field('spremi_informaciju_predstave', 'informacija_vrijeme_nonce');
	wp_nonce_field('spremi_informaciju_predstave', 'informacija_trajanje_nonce');

	$informacija_datum = get_post_meta($post->ID, 'informacija_datum_predstave', true);
	$informacija_vrijeme = get_post_meta($post->ID, 'informacija_vrijeme_predstave', true);
	$informacija_trajanje = get_post_meta($post->ID, 'informacija_trajanje_predstave', true);
	echo '
	<div>
	<div>
		<label for="informacija_datum_predstave">Datum prikazivanja predstave: </label>
		<input type="date" id="informacija_datum_predstave"
		name="informacija_datum_predstave" value="'.$informacija_datum.'" />
	</div><br/>
	<div>
		<label for="informacija_vrijeme_predstave">Vrijeme prikazivanja predstave: </label>
		<input type="time" id="informacija_vrijeme_predstave"
		name="informacija_vrijeme_predstave" value="'.$informacija_vrijeme.'" />
	</div><br/>
	<div>
		<label for="informacija_trajanje_predstave">Trajanje predstave (sati): </label>
		<input type="number" id="informacija_trajanje_predstave"
		name="informacija_trajanje_predstave" value="'.$informacija_trajanje.'" />
	</div>
	</div>';
}
function spremi_informaciju_predstave($post_id)
{
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce_informacija_datum = ( isset( $_POST[ 'informacija_datum_nonce' ] ) && wp_verify_nonce($_POST[ 'informacija_datum_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
	$is_valid_nonce_informacija_vrijeme = ( isset( $_POST[ 'informacija_vrijeme_nonce' ] ) && wp_verify_nonce($_POST[ 'informacija_vrijeme_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
	$is_valid_nonce_informacija_trajanje = ( isset( $_POST[ 'informacija_trajanje_nonce' ] ) && wp_verify_nonce($_POST[ 'informacija_trajanje_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
	if ( $is_autosave || $is_revision || !$is_valid_nonce_informacija_datum || !$is_valid_nonce_informacija_vrijeme || !$is_valid_nonce_informacija_trajanje)
	{
	 return;
 	}
	if(!empty($_POST['informacija_datum_predstave']))
	{
		update_post_meta($post_id, 'informacija_datum_predstave',
		$_POST['informacija_datum_predstave']);
	}
	else
	{
	delete_post_meta($post_id, 'informacija_datum_predstave');
	}
	if(!empty($_POST['informacija_vrijeme_predstave']))
	{
		update_post_meta($post_id, 'informacija_vrijeme_predstave',
		$_POST['informacija_vrijeme_predstave']);
	}
	else
	{
	delete_post_meta($post_id, 'informacija_vrijeme_predstave');
	}
	if(!empty($_POST['informacija_trajanje_predstave']))
	{
		update_post_meta($post_id, 'informacija_trajanje_predstave',
		$_POST['informacija_trajanje_predstave']);
	}
	else
	{
	delete_post_meta($post_id, 'informacija_trajanje_predstave');
	}
}
add_action( 'add_meta_boxes', 'add_meta_box_informacije_predstave' );
add_action( 'save_post', 'spremi_informaciju_predstave' );

function add_meta_box_uloge_predstave()
{
	add_meta_box( 'kazaliste_predstava_uloge', 'Uloge', 'html_meta_box_predstava2', 'predstava');
}
function html_meta_box_predstava2($post)
{
	wp_nonce_field('spremi_ulogu_predstave', 'uloga_glumci_nonce');
	wp_nonce_field('spremi_ulogu_predstave', 'uloga_redatelj_nonce');

	$uloga_glumci = get_post_meta($post->ID, 'uloga_glumci_predstave', true);
	$uloga_redatelj = get_post_meta($post->ID, 'uloga_redatelj_predstave', true);
	echo '
	<div>
	<div>
		<label for="uloga_glumci_predstave">Glumci: </label>
			<select id="js-example-basic-multiple" name="uloga_glumci_predstave[]" multiple="multiple">
				  '.
				  $args = array(
					'posts_per_page' => -1,
					'post_type' => 'glumac',
					'post_status' => 'publish'
					);
					$glumci = get_posts( $args );
					$sHtml = "";
		
					foreach ($glumci as $glumac)
						{
							$sGlumacNaziv = $glumac->post_title;
							$glumciArray = explode(', ', $uloga_glumci);
							$selected = "";
							foreach ($glumciArray as $oGlumac) 
							{
								
								if ($oGlumac == $sGlumacNaziv)
								{
									$selected = "selected";
								}
							}

							
							$sHtml .= '<option value="'.$sGlumacNaziv.'" '. $selected .'>'.$sGlumacNaziv.'</option>';
						}
					echo $sHtml
				  .'
			</select>
	</div><br/>
	<div>
		<label for="uloga_redatelj_predstave">Redatelj: </label>
			<select id="selectRedatelji" name="uloga_redatelj_predstave">
				  '.
				  $args = array(
					'posts_per_page' => -1,
					'post_type' => 'redatelj',
					'post_status' => 'publish'
					);
					$redatelji = get_posts( $args );
					$sHtml = "";
		
					foreach ($redatelji as $redatelj)
						{
							$sRedateljNaziv = $redatelj->post_title;
							$selected = "";
							if($sRedateljNaziv == $uloga_redatelj)
							{
								$selected = "selected";
							}
							
							$sHtml .= '<option value="'.$sRedateljNaziv.'" '. $selected .'>'.$sRedateljNaziv.'</option>';
						}
					echo $sHtml
				  .'
			</select>
	</div>
	</div>';
}
function spremi_ulogu_predstave($post_id)
{
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce_uloga_glumci = ( isset( $_POST[ 'uloga_glumci_nonce' ] ) && wp_verify_nonce($_POST[ 'uloga_glumci_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
	$is_valid_nonce_uloga_redatelj = ( isset( $_POST[ 'uloga_redatelj_nonce' ] ) && wp_verify_nonce($_POST[ 'uloga_redatelj_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
	if ( $is_autosave || $is_revision || !$is_valid_nonce_uloga_glumci || !$is_valid_nonce_uloga_redatelj)
	{
	 return;
 	}
	if(!empty($_POST['uloga_glumci_predstave']))
	{
		if (is_array($_POST[ 'uloga_glumci_predstave' ]))
		{
			$glumci = implode(", ", $_POST[ 'uloga_glumci_predstave' ]);
		}
		else
		{
			$glumci = $_POST[ 'uloga_glumci_predstave' ];
		}
		update_post_meta($post_id, 'uloga_glumci_predstave',
		$glumci);
	}
	else
	{
	delete_post_meta($post_id, 'uloga_glumci_predstave');
	}
	if(!empty($_POST['uloga_redatelj_predstave']))
	{
		update_post_meta($post_id, 'uloga_redatelj_predstave',
		$_POST['uloga_redatelj_predstave']);
	}
	else
	{
	delete_post_meta($post_id, 'uloga_redatelj_predstave');
	}
}
add_action( 'add_meta_boxes', 'add_meta_box_uloge_predstave' );
add_action( 'save_post', 'spremi_ulogu_predstave' );

function add_meta_box_sjedala_predstave()
{
	add_meta_box( 'kazaliste_predstava_sjedala', 'Broj slobodnih sjedala', 'html_meta_box_predstava3', 'predstava');
}
function html_meta_box_predstava3($post)
{
	wp_nonce_field('spremi_sjedala_predstave', 'informacija_datum_nonce');

	$slobodna_sjedala = get_post_meta($post->ID, 'sjedala_predstave', true);
	echo '
	<div>
		<label for="sjedala_predstave">Broj slobodnih sjedala: </label>
		<input type="number" id="sjedala_predstave" maxlength = "2"
		name="sjedala_predstave" value= "'.$slobodna_sjedala.'"/>
	</div>';
}
function spremi_sjedala_predstave($post_id)
{
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce_sjedala = ( isset( $_POST[ 'sjedala_nonce' ] ) && wp_verify_nonce($_POST[ 'sjedala_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
	if ( $is_autosave || $is_revision || !$is_valid_nonce_sjedala)
	{
	 return;
 	}
	if(!empty($_POST['sjedala_predstave']))
	{
		update_post_meta($post_id, 'sjedala_predstave',
		$_POST['sjedala_predstave']);
	}
	else
	{
	delete_post_meta($post_id, 'sjedala_predstave');
	}
}
add_action( 'add_meta_boxes', 'add_meta_box_sjedala_predstave' );
add_action( 'save_post', 'spremi_sjedala_predstave' );

add_action('wp_ajax_update_Seats', 'update_Seats_callback');

function update_Seats_callback() {
    $brojSjedala = get_post_meta($_POST['playID'], 'sjedala_predstave', true);
	$noviBrojSjedala = $brojSjedala - $_POST['seatNumber'];

	update_post_meta($_POST['playID'], 'sjedala_predstave', $noviBrojSjedala);

	echo 1;

    die(); 
}

add_action('wp_ajax_filter_Plays', 'filter_Plays_callback');

function filter_Plays_callback(){
	$sResponse="";

	switch($_GET['filter_id'])
	{
		case 'prikaz':
			if($_GET['play_type'] == 'sve')
			{
				$sResponse = daj_predstave();
			}
			else
			{
				$sResponse = daj_predstave_vrste($_GET['play_type']);
			}
		break;

		case 'rezervacija':
			if($_GET['play_type'] == 'sve')
			{
				$sResponse = daj_dostupne_predstave();
			}
			else
			{
				$sResponse = daj_dostupne_predstave_vrste($_GET['play_type']);
			}
		break;
	}

	echo $sResponse;

	die();
}

function register_zaposlenik_cpt() {

	$labels = array(
		'name'                  => _x( 'Zaposlenici', 'Post Type General Name', 'kazaliste' ),
		'singular_name'         => _x( 'Zaposlenik', 'Post Type Singular Name', 'kazaliste' ),
		'menu_name'             => __( 'Zaposlenici', 'kazaliste' ),
		'name_admin_bar'        => __( 'Zaposlenici', 'kazaliste' ),
		'archives'              => __( 'Zaposlenici arhiva', 'kazaliste' ),
		'attributes'            => __( 'Atributi', 'kazaliste' ),
		'parent_item_colon'     => __( 'Roditeljski element', 'kazaliste' ),
		'all_items'             => __( 'Svi zaposlenici', 'kazaliste' ),
		'add_new_item'          => __( 'Dodaj novog zaposlenika', 'kazaliste' ),
		'add_new'               => __( 'Dodaj novi', 'kazaliste' ),
		'new_item'              => __( 'Novi zaposlenik', 'kazaliste' ),
		'edit_item'             => __( 'Uredi zaposlenika', 'kazaliste' ),
		'update_item'           => __( 'Ažuriraj zaposlenika', 'kazaliste' ),
		'view_item'             => __( 'Vidi zaposlenika', 'kazaliste' ),
		'view_items'            => __( 'Vidi zaposlenike', 'kazaliste' ),
		'search_items'          => __( 'Traži zaposlenika', 'kazaliste' ),
		'not_found'             => __( 'Nije pronađeno', 'kazaliste' ),
		'not_found_in_trash'    => __( 'Nije pronađeno u smeću', 'kazaliste' ),
		'featured_image'        => __( 'Glavna slika', 'kazaliste' ),
		'set_featured_image'    => __( 'Postavi glavnu sliku', 'kazaliste' ),
		'remove_featured_image' => __( 'Ukloni glavnu sliku', 'kazaliste' ),
		'use_featured_image'    => __( 'Postavi za glavnu sliku', 'kazaliste' ),
		'insert_into_item'      => __( 'Umetni', 'kazaliste' ),
		'uploaded_to_this_item' => __( 'Preneseno', 'kazaliste' ),
		'items_list'            => __( 'Lista', 'kazaliste' ),
		'items_list_navigation' => __( 'Navigacija među zaposlenicima', 'kazaliste' ),
		'filter_items_list'     => __( 'Filtriraj listu zaposlenika', 'kazaliste' ),
	);
	$args = array(
		'label'                 => __( 'Zaposlenik', 'kazaliste' ),
		'description'           => __( 'zaposlenik post type', 'kazaliste' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'menu_icon'   => 'dashicons-businessman'
	);
	register_post_type( 'zaposlenik', $args );

}
add_action( 'init', 'register_zaposlenik_cpt', 0 );

function daj_zaposlenike( $slug )
{
$args = array(
'posts_per_page' => -1,
'post_type' => 'zaposlenik',
'post_status' => 'publish',
'tax_query' => array(
array(
'taxonomy' => 'naslovno_zvanje',
'field' => 'slug',
'terms' => $slug
)
));
$zaposlenici = get_posts( $args );
$sHtml = "<ul class= 'zaposleniciList' style='list-style-type:none;'>";
	foreach ($zaposlenici as $zaposlenik)
	{
	$sZaposlenikUrl = $zaposlenik->guid;
	$sZaposlenikIme = $zaposlenik->post_title;
	$nZaposlenikId = $zaposlenik->ID;
	$sIstaknutaSlika = get_the_post_thumbnail_url($nZaposlenikId);
	$sHtml .= '<li class= "listItem" style= "display:inline-block;">
			   	<div style="margin-left: 15px">
	                <figure style ="height: 250px; width: 200px; ">
	                	<a href="'.$sZaposlenikUrl.'">
	                        <img src="'.$sIstaknutaSlika.'" alt="" style="height: 80%; width:100%">
	                        <figcaption style="">'.$sZaposlenikIme.'</figcaption>
	                    </a>
	                </figure>
	            </div>
	           </li>';
	}
	$sHtml .= "</ul>";
	return $sHtml;
}

function registriraj_taksonomiju_naslovno_zvanje() {

	$labels = array(
		'name'                       => _x( 'Naslovno zvanje', 'Taxonomy General Name', 'kazaliste' ),
		'singular_name'              => _x( 'Naslovno_zvanje', 'Taxonomy Singular Name', 'kazaliste' ),
		'menu_name'                  => __( 'Naslovna zvanja', 'kazaliste' ),
		'all_items'                  => __( 'Sva zvanja', 'kazaliste' ),
		'parent_item'                => __( 'Roditeljsko zvanje', 'kazaliste' ),
		'parent_item_colon'          => __( 'Roditeljsko zvanje', 'kazaliste' ),
		'new_item_name'              => __( 'Novo naslovno zvanje', 'kazaliste' ),
		'add_new_item'               => __( 'Dodaj novo naslovno zvanje', 'kazaliste' ),
		'edit_item'                  => __( 'Uredi naslovno zvanje', 'kazaliste' ),
		'update_item'                => __( 'Ažuriraj naslovno zvanje', 'kazaliste' ),
		'view_item'                  => __( 'Pogledaj naslovno zvanje', 'kazaliste' ),
		'separate_items_with_commas' => __( 'Odvojite zvanja sa zarezima', 'kazaliste' ),
		'add_or_remove_items'        => __( 'Dodaj ili ukloni zvanje', 'kazaliste' ),
		'choose_from_most_used'      => __( 'Odaberi među najčešće korištenima', 'kazaliste' ),
		'popular_items'              => __( 'Popularna naslovna zvanja', 'kazaliste' ),
		'search_items'               => __( 'Traži naslovno zvanje', 'kazaliste' ),
		'not_found'                  => __( 'Nije pronađeno', 'kazaliste' ),
		'no_terms'                   => __( 'Nema zvanja', 'kazaliste' ),
		'items_list'                 => __( 'Lista naslovnih zvanja', 'kazaliste' ),
		'items_list_navigation'      => __( 'Navigacija', 'kazaliste' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'naslovno_zvanje', array( 'zaposlenik' ), $args );

}
add_action( 'init', 'registriraj_taksonomiju_naslovno_zvanje', 0 );

function register_glumac_cpt() {

	$labels = array(
		'name'                  => _x( 'Glumci', 'Post Type General Name', 'kazaliste' ),
		'singular_name'         => _x( 'Glumac', 'Post Type Singular Name', 'kazaliste' ),
		'menu_name'             => __( 'Glumci', 'kazaliste' ),
		'name_admin_bar'        => __( 'Glumci', 'kazaliste' ),
		'archives'              => __( 'Glumci arhiva', 'kazaliste' ),
		'attributes'            => __( 'Atributi', 'kazaliste' ),
		'parent_item_colon'     => __( 'Roditeljski element', 'kazaliste' ),
		'all_items'             => __( 'Svi glumci', 'kazaliste' ),
		'add_new_item'          => __( 'Dodaj novog glumca', 'kazaliste' ),
		'add_new'               => __( 'Dodaj novi', 'kazaliste' ),
		'new_item'              => __( 'Novi glumac', 'kazaliste' ),
		'edit_item'             => __( 'Uredi glumca', 'kazaliste' ),
		'update_item'           => __( 'Ažuriraj glumca', 'kazaliste' ),
		'view_item'             => __( 'Vidi glumca', 'kazaliste' ),
		'view_items'            => __( 'Vidi glumce', 'kazaliste' ),
		'search_items'          => __( 'Traži glumca', 'kazaliste' ),
		'not_found'             => __( 'Nije pronađeno', 'kazaliste' ),
		'not_found_in_trash'    => __( 'Nije pronađeno u smeću', 'kazaliste' ),
		'featured_image'        => __( 'Glavna slika', 'kazaliste' ),
		'set_featured_image'    => __( 'Postavi glavnu sliku', 'kazaliste' ),
		'remove_featured_image' => __( 'Ukloni glavnu sliku', 'kazaliste' ),
		'use_featured_image'    => __( 'Postavi za glavnu sliku', 'kazaliste' ),
		'insert_into_item'      => __( 'Umetni', 'kazaliste' ),
		'uploaded_to_this_item' => __( 'Preneseno', 'kazaliste' ),
		'items_list'            => __( 'Lista', 'kazaliste' ),
		'items_list_navigation' => __( 'Navigacija među glumcima', 'kazaliste' ),
		'filter_items_list'     => __( 'Filtriraj listu glumaca', 'kazaliste' ),
	);
	$args = array(
		'label'                 => __( 'Glumac', 'kazaliste' ),
		'description'           => __( 'glumac post type', 'kazaliste' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'menu_icon'   => 'dashicons-art'
	);
	register_post_type( 'glumac', $args );

}
add_action( 'init', 'register_glumac_cpt', 0 );

function add_meta_box_vanjska_suradnja()
{
	add_meta_box( 'kazaliste_glumac_vanjski', 'Vanjska suradnja?', 'html_meta_box_glumac', 'glumac');
}
function html_meta_box_glumac($post)
{
	wp_nonce_field('spremi_vanjsku_suradnju', 'vanjska_suradnja_nonce');

	$vanjska_suradnja = get_post_meta($post->ID, 'vanjska_suradnja', true);
	if($vanjska_suradnja == 'true')
    {
		echo '
		<div>
		<div>
			<label for="vanjska_suradnja">Vanjski suradnik: </label>
				<select id="selectVanjskaSuradnja" name="vanjska_suradnja">
					<option value="true" selected>Da</option>
					<option value="false">Ne</option>	
				</select>
		</div>
		</div>';
    }
    else
    {
		echo '
		<div>
		<div>
			<label for="vanjska_suradnja">Vanjski suradnik: </label>
				<select id="selectVanjskaSuradnja" name="vanjska_suradnja">				  
					<option value="true">Da</option>
				    <option value="false" selected>Ne</option>				  
				</select>
		</div>
		</div>';
    }
}
function spremi_vanjsku_suradnju($post_id)
{
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce_vanjska_suradnja = ( isset( $_POST[ 'vanjska_suradnja_nonce' ] ) && wp_verify_nonce($_POST[ 'vanjska_suradnja_nonce' ], basename( __FILE__ )) ) ? 'true' : 'false';
	if ( $is_autosave || $is_revision || !$is_valid_nonce_vanjska_suradnja)
	{
	 return;
 	}
	if(!empty($_POST['vanjska_suradnja']))
	{
		update_post_meta($post_id, 'vanjska_suradnja',
		$_POST['vanjska_suradnja']);
	}
	else
	{
	delete_post_meta($post_id, 'vanjska_suradnja');
	}
}
add_action( 'add_meta_boxes', 'add_meta_box_vanjska_suradnja' );
add_action( 'save_post', 'spremi_vanjsku_suradnju' );

function daj_glumce()
{
	$args = array(
	'posts_per_page' => -1,
	'post_type' => 'glumac',
	'post_status' => 'publish'
	);
	$glumci = get_posts( $args );

	$sHtml = "<ul style='list-style-type:none;'>";
	foreach ($glumci as $glumac)
	{
	$sGlumacUrl = $glumac->guid;
	$sGlumacIme = $glumac->post_title;
	$nGlumacId = $glumac->ID;
	$sIstaknutaSlika = get_the_post_thumbnail_url($nGlumacId);
	$sHtml .= '<li class= "listItem" style= "display:inline-block;">
			   	<div style="margin-left: 15px">
	                <figure style ="height: 250px; width: 200px; ">
	                	<a href="'.$sGlumacUrl.'">
	                        <img src="'.$sIstaknutaSlika.'" alt="" style="height: 80%; width:100%">
	                        <figcaption style="">'.$sGlumacIme.'</figcaption>
	                    </a>
	                </figure>
	            </div>
	           </li>';
	}
	$sHtml .= "</ul>";
	return $sHtml;
}

function register_redatelj_cpt() {

	$labels = array(
		'name'                  => _x( 'Redatelji', 'Post Type General Name', 'kazaliste' ),
		'singular_name'         => _x( 'Redatelj', 'Post Type Singular Name', 'kazaliste' ),
		'menu_name'             => __( 'Redatelji', 'kazaliste' ),
		'name_admin_bar'        => __( 'Redatelji', 'kazaliste' ),
		'archives'              => __( 'Redatelji arhiva', 'kazaliste' ),
		'attributes'            => __( 'Atributi', 'kazaliste' ),
		'parent_item_colon'     => __( 'Roditeljski element', 'kazaliste' ),
		'all_items'             => __( 'Svi redatelji', 'kazaliste' ),
		'add_new_item'          => __( 'Dodaj novog redatelja', 'kazaliste' ),
		'add_new'               => __( 'Dodaj novi', 'kazaliste' ),
		'new_item'              => __( 'Novi redatelj', 'kazaliste' ),
		'edit_item'             => __( 'Uredi redatelja', 'kazaliste' ),
		'update_item'           => __( 'Ažuriraj redatelja', 'kazaliste' ),
		'view_item'             => __( 'Vidi redatelje', 'kazaliste' ),
		'view_items'            => __( 'Vidi redatelje', 'kazaliste' ),
		'search_items'          => __( 'Traži redatelja', 'kazaliste' ),
		'not_found'             => __( 'Nije pronađeno', 'kazaliste' ),
		'not_found_in_trash'    => __( 'Nije pronađeno u smeću', 'kazaliste' ),
		'featured_image'        => __( 'Glavna slika', 'kazaliste' ),
		'set_featured_image'    => __( 'Postavi glavnu sliku', 'kazaliste' ),
		'remove_featured_image' => __( 'Ukloni glavnu sliku', 'kazaliste' ),
		'use_featured_image'    => __( 'Postavi za glavnu sliku', 'kazaliste' ),
		'insert_into_item'      => __( 'Umetni', 'kazaliste' ),
		'uploaded_to_this_item' => __( 'Preneseno', 'kazaliste' ),
		'items_list'            => __( 'Lista', 'kazaliste' ),
		'items_list_navigation' => __( 'Navigacija među redateljima', 'kazaliste' ),
		'filter_items_list'     => __( 'Filtriraj listu redatelja', 'kazaliste' ),
	);
	$args = array(
		'label'                 => __( 'Redatelj', 'kazaliste' ),
		'description'           => __( 'redatelj post type', 'kazaliste' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'menu_icon'   => 'dashicons-megaphone'
	);
	register_post_type( 'redatelj', $args );

}
add_action( 'init', 'register_redatelj_cpt', 0 );

function daj_redatelje()
{
	$args = array(
	'posts_per_page' => -1,
	'post_type' => 'redatelj',
	'post_status' => 'publish'
	);
	$redatelji = get_posts( $args );

	$sHtml = "<ul style='list-style-type:none;'>";
	foreach ($redatelji as $redatelj)
	{
	$sRedateljUrl = $redatelj->guid;
	$sRedateljIme = $redatelj->post_title;
	$nRedateljId = $redatelj->ID;
	$sIstaknutaSlika = get_the_post_thumbnail_url($nRedateljId);
	$sHtml .= '<li class= "listItem" style= "display:inline-block;">
			   	<div style="margin-left: 15px">
	                <figure style ="height: 250px; width: 200px; ">
	                	<a href="'.$sRedateljUrl.'">
	                        <img src="'.$sIstaknutaSlika.'" alt="" style="height: 80%; width:100%">
	                        <figcaption style="">'.$sRedateljIme.'</figcaption>
	                    </a>
	                </figure>
	            </div>
	           </li>';
	}
	$sHtml .= "</ul>";
	return $sHtml;
}


function UcitajCssTeme()
{	
	wp_enqueue_style( 'glavni-css', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'clean-blog-css', get_template_directory_uri() . '/css/clean-blog.min.css' );
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_style( 'fontawesome-css', get_template_directory_uri() . '/vendor/fontawesome-free/css/all.min.css' );
	wp_enqueue_style( 'select2-css', get_template_directory_uri() . '/vendor/select2/select2.min.css' );
	
}
add_action( 'wp_enqueue_scripts', 'UcitajCssTeme' );
//učitavanje javascript datoteke
function UcitajJsTeme()
{		
	wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/vendor/bootstrap/js/bootstrap.min.js', array('jquery'), true);
	wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/vendor/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), true);
	wp_enqueue_script('fontawesome-js', get_template_directory_uri().'/vendor/fontawesome-free/js/all.min.js', array('jquery'), true);
	wp_enqueue_script('jquery-js', get_template_directory_uri().'/vendor/jquery/jquery.min.js', array('jquery'), true);	
	wp_enqueue_style( 'clean-blog-js', get_template_directory_uri() . '/js/clean-blog.min.js' );
	wp_enqueue_style( 'select2-js', get_template_directory_uri() . '/vendor/select2/select2.js', array('jquery'), true);
	wp_enqueue_script('glavni-js', get_template_directory_uri().'/js/skripta.js', array('jquery'), true);
}
add_action( 'wp_enqueue_scripts', 'UcitajJsTeme' );


function UcitajAdminSkripte()
{
	wp_enqueue_style( 'select2-css', get_template_directory_uri() . '/vendor/select2/select2.min.css' );
	wp_enqueue_style( 'select2-js', get_template_directory_uri() . '/vendor/select2/select2.js', array('jquery'), true);
	wp_enqueue_script('glavni-js', get_template_directory_uri() . '/js/skripta.js', array('jquery'), true);
}
add_action('admin_enqueue_scripts', 'UcitajAdminSkripte'); 

function my_enqueue() {

    wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/js/skripta.js', array('jquery') );

    wp_localize_script( 'ajax-script', 'my_ajax_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'my_enqueue' );
?>