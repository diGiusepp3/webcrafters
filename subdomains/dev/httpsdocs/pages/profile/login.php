<?php
	session_start();
	require('../../ini.inc');
	$pagetitle = 'login';
	include('../../header.php');

echo'
<style>

main {
  display: grid;
  height: 100%;
  width: 100%;
  place-items: center;
}
::selection{
  background: #3A5F6D;
  color: #fff;
}
.wrapper{
  overflow: hidden;
  max-width: 390px;
  background: #fff;
  padding: 30px;
  border-radius: 5px;
  box-shadow: 0px 15px 20px rgba(0,0,0,0.1);
  height: auto;
  margin: 4em;
}
.wrapper .title-text{
  display: flex;
  width: 200%;
}
.wrapper .title{
  width: 50%;
  font-size: 35px;
  font-weight: 600;
  text-align: center;
  transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
}
.wrapper .slide-controls{
  position: relative;
  display: flex;
  height: 50px;
  width: 100%;
  overflow: hidden;
  margin: 30px 0 10px 0;
  justify-content: space-between;
  border: 1px solid lightgrey;
  border-radius: 5px;
}
.slide-controls .slide{
  height: 100%;
  width: 100%;
  color: #fff;
  font-size: 18px;
  font-weight: 500;
  text-align: center;
  line-height: 48px;
  cursor: pointer;
  z-index: 1;
  transition: all 0.6s ease;
}
.slide-controls label.signup{
  color: #000;
}
.slide-controls .slider-tab{
  position: absolute;
  height: 100%;
  width: 50%;
  left: 0;
  z-index: 0;
  border-radius: 5px;
  background: -webkit-linear-gradient(left, #3A5F6D, #fa4299);
  transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
}
input[type="radio"]{
  display: none;
}
#signup:checked ~ .slider-tab{
  left: 50%;
}
#signup:checked ~ label.signup{
  color: #fff;
  cursor: default;
  user-select: none;
}
#signup:checked ~ label.login{
  color: #000;
}
#login:checked ~ label.signup{
  color: #000;
}
#login:checked ~ label.login{
  cursor: default;
  user-select: none;
}
.wrapper .form-container{
  width: 100%;
  overflow: hidden;
}
.form-container .form-inner{
  display: flex;
  width: 200%;
}
.form-container .form-inner form{
  width: 50%;
  transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
}
.form-inner form .field{
  height: 50px;
  width: 100%;
  margin-top: 20px;
}
.form-inner form .field input{
  height: 100%;
  width: 100%;
  outline: none;
  padding-left: 15px;
  border-radius: 5px;
  border: 1px solid lightgrey;
  border-bottom-width: 2px;
  font-size: 17px;
  transition: all 0.3s ease;
}
.form-inner form .field input:focus{
  border-color: #3A5F6D;
  /* box-shadow: inset 0 0 3px #fb6aae; */
}
.form-inner form .field input::placeholder{
  color: #999;
  transition: all 0.3s ease;
}
form .field input:focus::placeholder{
  color: #b3b3b3;
}
.form-inner form .pass-link{
  margin-top: 5px;
}
.form-inner form .signup-link{
  text-align: center;
  margin-top: 30px;
}
.form-inner form .pass-link a,
.form-inner form .signup-link a{
  color: #3A5F6D;
  text-decoration: none;
}
.form-inner form .pass-link a:hover,
.form-inner form .signup-link a:hover{
  text-decoration: underline;
}
form .btn{
  height: 50px;
  width: 100%;
  border-radius: 5px;
  position: relative;
  overflow: hidden;
}
form .btn .btn-layer{
  height: 100%;
  width: 300%;
  position: absolute;
  left: -100%;
  background: -webkit-linear-gradient(right, #242526, #18191A, #3A5F6D, #fa4299);
  border-radius: 5px;
  transition: all 0.4s ease;;
}
form .btn:hover .btn-layer{
  left: 0;
}
form .btn input[type="submit"]{
  height: 100%;
  width: 100%;
  z-index: 1;
  position: relative;
  background: none;
  border: none;
  color: #fff;
  padding-left: 0;
  border-radius: 5px;
  font-size: 20px;
  font-weight: 500;
  cursor: pointer;
}

</style>

<main>
    <div class="wrapper">

		<div class="title-text">
	        <div class="title login">Inloggen</div>
	        <div class="title signup">Registreer</div>
	    </div>
		<div class="form-container">
	        <div class="slide-controls">
	          <input type="radio" name="slide" id="login" checked>
	          <input type="radio" name="slide" id="signup">
	          <label for="login" class="slide login">Inloggen</label>
	          <label for="signup" class="slide signup">Registreren</label>
	          <div class="slider-tab"></div>
	        </div>
	        <div class="form-inner">
	          <form id="login-form" action="/functions/account/login.php" method="POST" class="login">
	            <div class="field">
	              <input type="text" placeholder="Email Adres" name="email" required>
	            </div>
	            <div class="field">
	              <input type="password" placeholder="Wachtwoord" name="password" required>
	            </div>
	            <div class="pass-link">
	                <a href="/functions/account/forgot-password.php">Wachtwoord vergeten?</a>
	            </div>
	            <div class="field btn">
	              <div class="btn-layer"></div>
	              <input type="submit" name="submit" value="Inloggen">
	            </div>
	            <div class="signup-link">Heb je nog geen account? <a href="">Registreer hier</a></div>
	          </form>
	          
	          <form action="/functions/account/register.php" class="signup">
	            <div class="field">
	              <input type="text" placeholder="Email Adres" required>
	            </div>
	            <div class="field">
	              <input type="password" placeholder="Wachtwoord" required>
	            </div>
	            <div class="field">
	              <input type="password" placeholder="Bevestig wachtwoord" required>
	            </div>
	            <div class="field btn">
	              <div class="btn-layer"></div>
	              <input type="submit" value="Registreer">
	            </div>
	          </form>
	        </div>
	      </div>
	    </div>
	    <!--
		<div class="container">
			<form id="login-form" method="post" action="/functions/account/login.php">
				<input type="text" name="email" placeholder="Email adres">
				<input type="password" name="password" placeholder="wachtwoord">
				<input type="submit" name="submit" value="Indienen" class="bg-dark text-white border-0">
			</form>
			<div id="login-response"></div>
		</div>
		-->
	</div>
</main>

<script>
      const loginText = document.querySelector(".title-text .login");
      const loginForm = document.querySelector("form.login");
      const loginBtn = document.querySelector("label.login");
      const signupBtn = document.querySelector("label.signup");
      const signupLink = document.querySelector("form .signup-link a");
      signupBtn.onclick = (()=>{
        loginForm.style.marginLeft = "-50%";
        loginText.style.marginLeft = "-50%";
      });
      loginBtn.onclick = (()=>{
        loginForm.style.marginLeft = "0%";
        loginText.style.marginLeft = "0%";
      });
      signupLink.onclick = (()=>{
        signupBtn.click();
        return false;
      });
</script>

';
	include('../../footer.php');
