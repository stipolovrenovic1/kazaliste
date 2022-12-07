<?php
	get_header();
?>
	<header class="masthead">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-10 mx-auto">
					<div class="site-heading">
						<h1>Trenutne predstave kazališta</h1>
					</div>
				</div>
			</div>
		</div>
	</header>
	<main>
		<?php
		echo daj_predstave();
		?>
	</main>
<?php
get_footer();
?>