function seatsAmount(playID, availableSeats)
{
	localStorage.setItem('playID', playID);
	localStorage.setItem('availableSeats', availableSeats);
	window.open('/CMSKV/odaberisjedala', '_self');
}

function confirmReservation()
{		
	if($.trim($('#inputName').val()))
	{
		if($('#inputSeats').val() > 0)
		{
			if($('#inputSeats').val() <= parseInt(localStorage.getItem('availableSeats')))
			{
				$('#inputName').prop('readonly', true);
				$('#inputSeats').prop('readonly', true);
				$('.btn').prop('disabled', true);

				var ukupnaCijena = $('#inputSeats').val() * 55;
				$('#reservationReaction').empty();
				$('#reservationReaction').show();
		        $('#reservationReaction').append('Cijena jednog sjedala je 55 kuna. Budući da ste rezervirali ' + $('#inputSeats').val() + ' sjedala, ukupna cijena je: ' + ukupnaCijena + ' kuna. Jeste li sigurni da želite rezervirati sjedala?<br><br><button type="button" class="btn btn-primary" onclick= "reserveSeatsRequest()">Potvrdi</button> <button type="button" class="btn btn-danger" onclick= "cancelTransaction()">Odustani</button>');
			}
			else
			{
				$('#reservationReaction').empty();
				$('#reservationReaction').show();
		        $('#reservationReaction').append('Broj karata je veći od dostupnih!');
			}
		}
		else
		{
			$('#reservationReaction').empty();
			$('#reservationReaction').show();
		    $('#reservationReaction').append('Morate odabrati barem jednu kartu!');
		}
	}
	else
	{
		$('#reservationReaction').empty();
		$('#reservationReaction').show();
		$('#reservationReaction').append('Niste unijeli svoje ime i prezime!');
	}
}

function reserveSeatsRequest()
{
	var data = {
        action: 'update_Seats',
        playID: localStorage.getItem('playID'),
        seatNumber: $('#inputSeats').val()
    };

    jQuery.post(my_ajax_object.ajax_url, data, function(response) {
        localStorage.removeItem('playID');
		var popup = window.open('/CMSKV/uspjesnarezervacija', '_self');
    });

}

function cancelTransaction()
{
	$('#inputName').prop('readonly', false);
	$('#inputSeats').prop('readonly', false);
	$('.btn').prop('disabled', false);

	$('#reservationReaction').hide();
}

function filter(filterType, playType)
{
	var data = {
        action: 'filter_Plays',
        filter_id: filterType,
        play_type: playType
    };

	jQuery.get(my_ajax_object.ajax_url, data, function(response) {
        $('.predstaveLista').empty();
        $('.predstaveLista').append(response);
    });
}
