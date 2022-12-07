<?php
	get_header();
?>
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
	}
}
?>

    <header class="masthead" style="background-image: url(<?php echo $sIstaknutaSlika; ?>)">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>REZERVACIJA SJEDALA</h1>
            </div>
          </div>
        </div>
      </div>
    </header>

    <?php
    	 echo '<div class="row" style="text-align:center;">
                <div class="col-md-6"><img src="'.get_the_post_thumbnail_url($post->ID).'"alt=""></div>
                <div class="col-md-6" style="text-align:left; margin-right: 5px; margin-left: 50px">
                  '.nl2br(the_content()).'                       
                </div>
             </div>
             <br>
             <div class= "predstaveLista">
                '.daj_dostupne_predstave().'
             </div>';

    ?>
<?php
get_footer();
?>
