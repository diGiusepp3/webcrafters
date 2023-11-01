<?php
	
	
	$pagetitle = "Webcrafters Register Page";
	$pagekeywords = "Registerpage, register,  webcrafters.be, digidesign.be";
	$pagedescription = "A registerform made by digidesign.be and webcrafters.be";
	
	include('../header.php');
	
	echo "
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
					            <label for='rol' class='form-label'>Rol</label>
					            <input type='text' class='form-control' id='rol' name='rol' required>
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
    let naam = $('#naam').val();
    let gebruikersnaam = $('#gebruikersnaam').val();
    let email = $('#email').val();
    let paswoord = $('#paswoord').val();
    let rol = $('#rol').val();

    $.ajax({
        type: 'POST',
        url: '/functions/addAdminUser.php',
        data: {
            naam: naam,
            gebruikersnaam: gebruikersnaam,
            email: email,
            paswoord: paswoord,
            rol: rol,
        },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                // When add is successful, show success message
                $('#add-succes').html(response.message).show();
                $('#add-error').html(response.message).hide();
                $(\"form[id='registerForm']\").remove();
                window.location.href = '/';
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
	
	include('../footer.php');