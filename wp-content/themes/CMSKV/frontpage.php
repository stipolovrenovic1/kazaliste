<?php
    get_header();

?>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url(<?php echo $sImageUrl; ?>)">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
            <h1><?php echo the_title(); ?></h1>
            <span class="subheading"></span>
            </div>
        </div>
        </div>
    </div>
    </header>

    <?php
    $sPostContent = "";
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
            $sPostContent = nl2br($post->post_content);        
        }
    }
?>
    <div id = "bodyContent" class="row">
        <div class="col-md-6" style="text-align:;">
            <?php echo $sPostContent; ?>
        </div>    
    </div>

<?php
    get_footer();
?>
