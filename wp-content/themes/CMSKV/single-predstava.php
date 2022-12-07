<?php 
get_header();
$sImageUrl = get_template_directory_uri().'/img/home-bg.jpg';
$datum = get_post_meta($post->ID, 'informacija_datum_predstave', true);
$datumArray = explode('-', $datum);
$datumReversed = array_reverse($datumArray);
$newDatum = implode('.', $datumReversed);
$vrijeme = get_post_meta($post->ID, 'informacija_vrijeme_predstave', true);
$trajanje = get_post_meta($post->ID, 'informacija_trajanje_predstave', true);
$oVrstePredstava = wp_get_post_terms( $post->ID, 'vrsta_predstave' );
$oVrstaPredstave = $oVrstePredstava[0]->name;

?>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('.$sImageUrl.')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
           <h1><?php echo $post->post_title ?></h1>
            <span class="subheading"></span>
            </div>
        </div>
        </div>
    </div>
    </header>

<?php
if ( have_posts() )
{
    while ( have_posts() )
    {
       the_post();
       echo '<div class="row" style="text-align:center;">
              <div style = "margin-left: 500px;" class="col-md-6"><img src="'.get_the_post_thumbnail_url($post->ID).'"alt=""></div>
                <div class="col-md-6" style="text-align:left; margin-right: 5px; margin-left: 50px">
                  <br>Žanr: '.$oVrstaPredstave.'
                  <br>Datum prikazivanja predstave: '.$newDatum.'
                  <br>Vrijeme prikazivanja predstave: '.$vrijeme.'
                  <br>Trajanje predstave: '.$trajanje.' sati
                  <br>'.nl2br($post->post_content).'
                </div>
              </div>';
       $args = array(
          'posts_per_page' => -1,
          'post_type' => 'redatelj',
          'post_status' => 'publish'
          );
          $redatelji = get_posts( $args );
          $sHtml = '
          <h2 style="margin: 50px">Redatelj:</h2>
          <div class="row" style="margin: 50px">';
          $oRedatelj = get_post_meta($post->ID, 'uloga_redatelj_predstave', true);
          
          foreach ($redatelji as $redatelj)
          {
              $sRedateljIme = $redatelj->post_title;
              $nRedateljId = $redatelj->ID;
              $sRedateljUrl = $redatelj->guid;
              $sIstaknutaSlika = get_the_post_thumbnail_url($nRedateljId);
              if($oRedatelj == $sRedateljIme)
              {
                 $sHtml .= '
                  <div style="margin-left: 15px">
                    <figure style ="height: 250px; width: 200px; ">
                      <a href="'.$sRedateljUrl.'">
                        <img src="'.$sIstaknutaSlika.'" alt="" style="height: 80%; width:100%">
                        <figcaption style="">'.$sRedateljIme.'</figcaption>
                      </a>
                    </figure>
                  </div>
                  ';
              }     
          }

          $sHtml .= '</div>';
          echo $sHtml;
        
        $args = array(
          'posts_per_page' => -1,
          'post_type' => 'glumac',
          'post_status' => 'publish'
          );
          $glumci = get_posts( $args );
          $sHtml = '<br>
          <h2 style="margin: 50px">Glumci:</h2>
          <div class="row" style="margin: 50px">';
          $popisGlumaca = get_post_meta($post->ID, 'uloga_glumci_predstave', true);
          
          foreach ($glumci as $glumac)
          {
              $sGlumacIme = $glumac->post_title;
              $nGlumacId = $glumac->ID;
              $sGlumacUrl = $glumac->guid;
              $sIstaknutaSlika = get_the_post_thumbnail_url($nGlumacId);
              $glumciArray = explode(', ', $popisGlumaca);
              foreach ($glumciArray as $oGlumac) 
              {
                if ($oGlumac == $sGlumacIme)
                {
                  $sHtml .= '
                  <div style="margin-left: 15px">
                    <figure style ="height: 250px; width: 200px; ">
                      <a href="'.$sGlumacUrl.'">
                        <img src="'.$sIstaknutaSlika.'" alt="" style="height: 80%; width:100%">
                        <figcaption style="">'.$sGlumacIme.'</figcaption>
                      </a>
                    </figure>
                  </div>
                  ';
                }
              }
            }           
          }
          $sHtml .= '</div>';
          echo $sHtml;
}

get_footer(); 
?>