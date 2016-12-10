<?php
include ("header.php");
include ("navbar.php");

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
?>
<div class="container">
    <div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
            <div class="row">
							<div class="col-xs-6">
							<h3 class="panel-title"><a href="#" class="active" id="login-form-link">Login</a></h3>
							</div>
							<div class="col-xs-6">
								<h3 class="panel-title"><a href="#" id="register-form-link">Register</a></h3>
							</div>
						</div>
			 	</div>
			  	<div class="panel-body">
            <div id="login-form">
			    	<form accept-charset="UTF-8" role="form" id="login-form1" action="/pages/auth.php?type=login" method="post" role="form" style="display: block;">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="Username" required name="handle" id="handle" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" required name="password" id="password" type="password" value="">
			    		</div>
			    		<div class="checkbox">
			    	    	<label>
			    	    		<input name="remember" type="checkbox" value="Remember Me"> Remember Me
			    	    	</label>

			    	    </div>
                <div class="form-group" style="margin-left:12px;">
                  <div id="login">

                  </div>
                  </div>
			    		<input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
			    	</fieldset>
			      	</form>

                      <hr/>
                    <center><h4>OR</h4></center>

            <a href="github.php" class="btn btn-lg btn-block onl_btn-github" data-toggle="tooltip" data-placement="top" title="GitHub">
              <i class="fa fa-github fa-2x"></i>
              <span class="hidden-xs"></span>
            </a>
          </div>
            <form id="register-form" action="/pages/auth.php?type=register" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" required placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" required placeholder="Email Address" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control"  required placeholder="Password">
									</div>
                  <div class="form-group" style="margin-left:12px;">
                    <div id="register">

                    </div>
                  </div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<button type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-primary btn-cons">Register Now</div>
											</div>
										</div>
								</form>
                </div>
			    </div>
			</div>
    </div>
    <div class="row">
    <?php if($_GET['check'] == 'exists'){?>
      <div class="col-md-4 col-md-offset-4 alert alert-danger fade in" id="alertFadeOut">
            <strong>Username or Email</strong> is taken - please try another.
		</div>
    <?php } elseif ($_GET['check'] == 'invalid') {?>
      <div class="col-md-4 col-md-offset-4 alert alert-danger fade in" id="alertFadeOut">
            <strong>Username or Password</strong> not correct
      </div>
      <?php } elseif ($_GET['check'] == 'recaptcha') {?>
        <div class="col-md-4 col-md-offset-4 alert alert-danger fade in" id="alertFadeOut">
              <strong>You are a bot! Go away!</strong>
        </div>
      <?php } ?>
    </div>
	</div>


<script> $(function() {

    $("#login-form-link").click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$("#register-form-link").removeClass("active");
		$(this).addClass("active");
		e.preventDefault();
	});
	  $("#register-form-link").click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$("#login-form-link").removeClass("active");
		$(this).addClass("active");
		e.preventDefault();
	});

});
$('#alertFadeOut').fadeOut(1800);

      var login;
      var register;
      var myCallBack = function() {
        //Render the recaptcha1 on the element with ID "recaptcha1"
        login = grecaptcha.render('login', {
          'sitekey' : '6LdZcQ4UAAAAADbwrtSdZRmM67HXTwOg04iU9APq', //Replace this with your Site key
          'theme' : 'light'
        });

        //Render the recaptcha2 on the element with ID "recaptcha2"
        register = grecaptcha.render('register', {
          'sitekey' : '6LdNcg4UAAAAAOq8-dCXaF3v54LTnOrVX59N6WOu', //Replace this with your Site key
          'theme' : 'light'
        });
      };
</script>

<?php

include("footer.php");
?>
