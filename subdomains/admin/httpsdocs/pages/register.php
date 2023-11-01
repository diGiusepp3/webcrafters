<?php

$pagetitle = "Webcrafters Register Page";
$pagekeywords = "Registerpage, register,  webcrafters.be, digidesign.be";
$pagedescription = "A registerform made by digidesign.be and webcrafters.be";

include ('../header.php');

echo"
    <div class='container mt-5'>
        <div class='row justify-content-center'>
            <div class='col-md-6'>
                <div class='card'>
                    <div class='card-header bg-primary text-white'>
                        <h3 class='mb-0 text-center text-light'>Register Form</h3>
                    </div>
                    <div class='card-body'>
					    <form action='' method='post' id='registerForm' onsubmit='addUser(event)'>
					        <div class='mb-3'>
					            <label for='naam' class='form-label'>Naam</label>
					            <input type='text' class='form-control' id='naam' name='naam' required>
					        </div>
					        <div class='mb-3'>
					            <label for='achternaam' class='form-label'>Achternaam</label>
					            <input type='text' class='form-control' id='achternaam' name='achternaam' required>
					        </div>
					        <div class='mb-3'>
					            <label for='geslacht' class='form-label'>Geslacht</label>
					            <input type='text' class='form-control' id='geslacht' name='geslacht' required>
					        </div>
					        <div class='mb-3'>
					            <label for='geboortedatum' class='form-label'>Geboortedatum</label>
					            <input type='date' class='form-control' id='geboortedatum' name='geboortedatum' required>
					        </div>
					        
					        <div class='mb-3'>
					            <label for='gebruikersnaam' class='form-label'>Gebruikersnaam</label>
					            <input type='text' class='form-control' id='gebruikersnaam' name='gebruikersnaam' required>
					        </div>
					        <div class='mb-3'>
					            <label for='email' class='form-label'>E-mail</label>
					            <input type='email' class='form-control' id='email' name='email' required>
					        </div>
					        <div class='mb-3'>
					            <label for='paswoord' class='form-label'>Wachtwoord</label>
					            <input type='password' class='form-control' id='paswoord' name='paswoord' required>
					        </div>
					        <div class='mb-3'>
					            <label for='straat' class='form-label'>Straat</label>
					            <input type='text' class='form-control' id='straat' name='straat' required>
					        </div>
					        <div class='mb-3'>
					            <label for='huisnummer' class='form-label'>Huisnummer</label>
					            <input type='text' class='form-control' id='huisnummer' name='huisnummer' required>
					        </div>
					        <div class='mb-3'>
					            <label for='postcode' class='form-label'>Postcode</label>
					            <input type='number' class='form-control' id='postcode' name='postcode' required>
					        </div>
					        <div class='mb-3'>
					            <label for='gemeente' class='form-label'>Stad/Gemeente</label>
					            <input type='text' class='form-control' id='gemeente' name='gemeente' required>
					        </div>
					        <div class='mb-3'>
					            <label for='land' class='form-label'>Land</label>
					            <input type='text' class='form-control' id='land' name='land' required>
					        </div>
					        <div class='mb-3 text-center'>
					            <button type='submit' class='btn btn-primary btn-lg rounded-circle'>Registreren</button>
					        </div>
					        <div class='text-center'>
					            <p>Heb je al een account? <a href='login.php'>Klik hier om in te loggen</a></p>
					        </div>
					    </form>
					    <div id='add-succes' style='display:none;'></div>
					    <div id='add-error' style='display: none;'></div>
					</div>
                </div>
            </div>
        </div>
    </div>
    <script>
	function addUser(event) {
    event.preventDefault();
    let registratieDatum = new Date().toISOString().slice(0, 19).replace('T', ' ');    let naam = $('#naam').val();
    let achternaam = $('#achternaam').val();
    let geslacht = $('#geslacht').val();
    let geboortedatum = $('#geboortedatum').val();
    let gebruikersnaam = $('#gebruikersnaam').val();
    let email = $('#email').val();
    let paswoord = $('#paswoord').val();
    let straat = $('#straat').val();
    let huisnummer = $('#huisnummer').val();
    let postcode = $('#postcode').val();
    let gemeente = $('#gemeente').val();
    let land = $('#land').val();

    $.ajax({
        type: 'POST',
        url: '/functions/addUser.php',
        data: {
            naam: naam,
            achternaam: achternaam,
            geslacht: geslacht,
            geboortedatum: geboortedatum,
            gebruikersnaam: gebruikersnaam,
            email: email,
            paswoord: paswoord,
            straat: straat,
            huisnummer: huisnummer,
            postcode: postcode,
            gemeente: gemeente,
            land: land,
            geregistreerd_op: registratieDatum
        },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                // When add is successful, show success message
                $('#add-succes').html(response.message).show();
                $('#add-error').html(response.message).hide();
                $(\"form[id='registerForm']\").remove();
            } else {
                // Show error when add is not successful
                $('#add-error').html(response.message).show();
                $('#add-succes').html('').hide();
            }
        },
        error: function() {
            // Show error message if the AJAX request fails
            $('#add-error').html('Er is een fout opgetreden bij het registreren.').show();
            $('#add-succes').html('').hide();
        }
    });
}

 

	</script>";

include ('../footer.php');