<?php 
get_header();
$sImageUrl = get_template_directory_uri().'/img/home-bg.jpg';
?>  
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

    $sIstaknutaSlika = "";
    if( get_the_post_thumbnail_url($post->ID) )
    {
      $sIstaknutaSlika = get_the_post_thumbnail_url($post->ID);
    }
    if(get_post_meta($post->ID, 'vanjska_suradnja', true) == 'true')
    {
        echo '<div class="row memberInfo" style="text-align:center;">
            <div class="col-md-6"><img src="'.$sIstaknutaSlika.'"alt=""></div>
            <br>
            <br>
            <div class="col-md-6" style="text-align:left; margin-right: 5px; margin-left: 50px">
            <h4>Vanjski suradnik</h4>
                '.nl2br($post->post_content).'
            </div>
          </div>';
    }
    else
    {
        echo '<div class="row memberInfo" style="text-align:center;">
            <div class="col-md-6"><img src="'.$sIstaknutaSlika.'"alt=""></div>
            <br>
            <br>
            <div class="col-md-6" style="text-align:left; margin-right: 5px; margin-left: 50px">
                '.nl2br($post->post_content).'
            </div>
          </div>';
    }

    $args = array(
                    'posts_per_page' => -1,
                    'post_type' => 'predstava',
                    'post_status' => 'publish'
                 );
    $predstave = get_posts( $args );
    $sHtml = '<h2 style="margin: 50px">Predstave:</h2>
              <div class="row" style="margin: 50px">';                     
    foreach ($predstave as $predstava)
    {
        $sPredstavaNaziv = $predstava->post_title;
        $nPredstavaId = $predstava->ID;
        $sPredstavaUrl = $predstava->guid;
        $popisGlumaca = get_post_meta($nPredstavaId, 'uloga_glumci_predstave', true);
        $glumciArray = explode(', ', $popisGlumaca);
        $sIstaknutaSlika = get_the_post_thumbnail_url($nPredstavaId);
        if(in_array($post->post_title, $glumciArray))
        {
            $sHtml .= '<div style="margin-left: 15px">
                        <figure style ="height: 250px; width: 200px; ">
                            <a href="'. $sPredstavaUrl.'">
                                <img src="'.$sIstaknutaSlika.'" alt="" style="height: 80%; width:100%">
                                <figcaption style="">'.$sPredstavaNaziv.'</figcaption>
                            </a>
                        </figure>
                       </div>';
        }     
    }

    $sHtml .= '</div>';
    echo $sHtml;
    }
}

get_footer(); 
?>