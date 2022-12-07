<?php
	get_header();
?>
	<header class="masthead">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-10 mx-auto">
					<div class="site-heading">
						<h1>Kupnja karata</h1>
					</div>
				</div>
			</div>
		</div>
	</header>
	<main>
		<form id = "seatReserveForm">
		  <div class="form-group">
		    <label for="inputName">Ime i Prezime</label>
		    <input type="text" class="form-control" id="inputName">
		  </div>
		  <div class="form-group">
		  	<label for="inputSeats">Broj karata</label>
		    <input type="number" class="form-control" id="inputSeats" maxlength="2">
		  </div>
		  <button type="button" class="btn btn-primary" onclick = "confirmReservation()">Kupi karte</button>
		  <br>
		  <br>
		  <div id = "reservationReaction">
		  </div>
		</form>
	</main>
<?php
get_footer();
?>