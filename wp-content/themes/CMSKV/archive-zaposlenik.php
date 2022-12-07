<?php
	get_header();
?>
	<header class="masthead">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-10 mx-auto">
					<div class="site-heading">
						<h1>Zaposlenici kazališta</h1>
					</div>
				</div>
			</div>
		</div>
	</header>
	<main>
		
			<h2 style = "text-align: center; font-weight: bold;">Upravitelj</h2>
			<?php
			echo daj_zaposlenike('Upravitelj');
			?>
			<br>

			<h2 style = "text-align: center; font-weight: bold;">Dramaturgi</h2>
			<?php
			echo daj_zaposlenike('dramaturg');
			?>
			<br>

			<h2 style = "text-align: center; font-weight: bold;">Marketinški direktor</h2>
			<?php
			echo daj_zaposlenike('marketinski-direktor');
			?>
			<br>
			
			
			<h2 style = "text-align: center; font-weight: bold;">Tehnički direktor</h2>
			<?php
			echo daj_zaposlenike('tehnicki-direktor');
			?>
			<br>

			<h2 style = "text-align: center; font-weight: bold;">Umjetnički direktor</h2>
			<?php
			echo daj_zaposlenike('umjetnicki-direktor');
			?>
			<br>
		
	</main>
<?php
get_footer();
?>