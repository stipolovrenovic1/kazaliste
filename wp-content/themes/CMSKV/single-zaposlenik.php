<?php 
get_header();
$sImageUrl = get_template_directory_uri().'/img/home-bg.jpg';
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

    $sIstaknutaSlika = "";
    if( get_the_post_thumbnail_url($post->ID) )
    {
      $sIstaknutaSlika = get_the_post_thumbnail_url($post->ID);
    }
    $oNaslovnaZvanja = wp_get_post_terms( $post->ID, 'naslovno_zvanje' );
        $sNaslovnoZvanje = "-";
            if(sizeof($oNaslovnaZvanja)>0)
                {
                    $sNaslovnoZvanje = $oNaslovnaZvanja[0]->name;
                    echo '
                    <div class="row memberInfo" style="text-align:center;">
                        <div class="col-md-6"><img src="'.$sIstaknutaSlika.'" alt=""></div>
                        <br>
                        <div class="col-md-6" style="text-align:left; margin-right: 5px; margin-left: 50px">
                        <h4>Zvanje: '.$sNaslovnoZvanje.'</h4>
                        '.nl2br($post->post_content).'
                        </div>
                      </div>';
                }
    }
}

get_footer(); 
?>