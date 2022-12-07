<?php
/*
Plugin Name: Filter predstava dodataka
Plugin URI: https://vsmti.hr
Description: Dodatak za dodavanje filtera predstava preko Shortcode-a
Version: 1.0
Author: Stipo Lovrenović
Author URI: https://vsmti.hr
Text Domain: vsmti
*/

function kreiraj_filter_shortcode($atts, $content = NULL)
{
$filterVrsta = $atts['filter-vrsta'];
$sHtml = '
<div id="filter">
 <h1>Filtriraj predstave</h1>
 <ul>
 	<li><a href="javascript:filter(\''.$filterVrsta.'\', \'sve\')">Sve</a></li>
 	<li><a href="javascript:filter(\''.$filterVrsta.'\', \'tragedija\')" role="button">Tragedije</a></li>
 	<li><a href="javascript:filter(\''.$filterVrsta.'\', \'komedija\')">Komedije</a></li>
 	<li><a href="javascript:filter(\''.$filterVrsta.'\', \'mjuzikl\')" role="button">Mjuzikli</a></li>
 </ul>
</div>
';
return $sHtml;
}
add_shortcode( 'filter', 'kreiraj_filter_shortcode' );
?>
