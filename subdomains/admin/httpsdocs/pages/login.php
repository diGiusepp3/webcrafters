<?php
	// login.php
	session_start();
	$pagetitle = "Login Form";
	$pagekeywords = "Webcrafters, Login Page, Loginform";
	$pagedescription = "Login form made by webcrafters";
	
	include ('../header.php');
	include ('../ini.inc');
echo"

<!-- Start main content -->
<div class='container mt-5'>
	<div class='row justify-content-center'>
		<div class='col-md-6'>
			<div class='card'>
				<div class='card-header bg-primary text-white'>
					<h3 class='mb-0 text-center text-light'>Login Form</h3>
				</div>
				<div class='card-body opacity-50'>
					<form method='post' action='' id='loginForm' onsubmit='loginUser(event)'>
						<div class='mb-3'>
							<label for='username' class='form-label'>Username</label>
							<input type='text' class='form-control' id='username' name='username' required>
						</div>
						<div class='mb-3'>
							<label for='password' class='form-label'>Password</label>
							<input type='password' class='form-control' id='password' name='password' required>
						</div>
						<div class='mb-3 text-center'>
							<button type='submit' class='btn btn-primary btn-lg rounded-circle'>Login</button>
						</div>
						<div class='text-center'>
							<p>Don't have an account yet? <a href='register.php'>Click here to register</a></p>
						</div>
					</form>
					
					<div id='login-success' style='display:none;'></div>
					<div id='login-error' style='display: none;'></div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End main content -->

<script>
    function loginUser(e) {
        e.preventDefault();
        let username = $('#username').val();
        let password = $('#password').val();

        $.ajax({
            type: 'POST',
            url: '/functions/getUser.php',
            data: { username: username, password: password },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // When login is successful, show success message
                    $('#login-success').html(response.message).show();
                    $('#login-error').html('').hide();
                    $(\"form[id='loginForm']\").remove();
                    
                    $.ajax({
				        type: 'POST',
				        url: '/functions/updateSessions.php?username=username',
				        data: { username: username },
				        dataType: 'json',
				        success: function(sessionResponse) {
				            if (sessionResponse.status === 'success') {
				                console.log('Session variables updated successfully.');
				            } else {
				                console.log('Error updating session variables.');
				            }
				        },
				        error: function() {
				            console.log('An error occurred while updating session variables.');
				        }
				    });
                } else {
                    // Show error when login is not successful
                    $('#login-error').html(response.message).show();
                    $('#login-success').html('').hide();
                }
            },
            error: function() {
                // Show error message if the AJAX request fails
                $('#login-error').html('An error occurred while logging in.').show();
                $('#login-success').html('').hide();
            }
        });
    }
</script>

";
	include ('../footer.php');


	
	
	