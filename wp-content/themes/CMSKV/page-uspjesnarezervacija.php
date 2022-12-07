<?php
	get_header();
?>

    <header class="masthead" style="background-image: url(<?php echo $sIstaknutaSlika; ?>)">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Kazalište Maskerada</h1>
              <span class="subheading">Kutijek</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <?php
    	 echo '
            <div id = "aboutText" class="row" style="text-align:center;">
                <div class="col-md-6" style="text-align:left; margin-right: 5px; margin-left: 50px">
                        '.nl2br($post->post_content).'
                        </div>
                      </div>';
    ?>



<?php
get_footer();
?>
