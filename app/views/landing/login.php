<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    
    <title>Log in</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/customer/LoginPageCSS.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/signupCss.css" />

</head>
<body>
    <div class="container">
        <?php flash('register_success'); ?>
        <form class="login" action="<?php echo URLROOT; ?>/landing/login" method="post">
            <h1>Log in</h1>
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
            <input type="email" name="email" placeholder="Email" value="<?= isset($_COOKIE['email']) ? $_COOKIE['email'] : '' ?>" required >
            <div class="password-wrapper">
            <span class="invalid-feedback"><?php echo $data['pass_err']; ?></span>
            
            <input type="password" name="pass" placeholder="password"  value="<?= isset($_COOKIE['pass']) ? $_COOKIE['pass'] : '' ?>" required ><i class="fa fa-eye-slash" id="togglePassword"></i> <br></div>
            <input type="checkbox" id="rememberMe" name="rememberMe" <?= (isset($_COOKIE['email']) && isset($_COOKIE['pass'])) ? "checked" : '' ?> value=1>
            <span id="rememberme"><label for="rememberme">Remember me</label></span>
            <a href="<?php echo URLROOT; ?>/landing/enteremail">Forgot password !</a>
            <button class="btn" name="submit" type="submit">log in</button>
           
            <div>
                <span class="copyright">BookHive&copy;2024</span> 
            </div>  
        </form>


        <div class="register">
            <div class="back-btn-div-login">
                <button class="back-btn-login" onclick="history.back()"><i class="fa fa-angle-double-left"></i> Go Back</button>
            </div>
            <img src="<?php echo URLROOT; ?>/assets/images/customer/bookhive.png">
            
            <h3>WELCOME TO</h3>
            <h2>BookHive</h2>
            <p>Here we introducing a web-based Platform for Buying
                Selling, exchanging, and Donating both new & used books.</p>
            <a href="<?php echo URLROOT; ?>/landing/selectuser"><button>Sign Up</button></a>
        </div>  
      </div>
    

   

</body>
</html>

<script>
   document.getElementById('togglePassword').addEventListener('click', function() {
  var passwordInput = document.querySelector('input[name="pass"]');
  var type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
  passwordInput.setAttribute('type', type);

  this.classList.toggle('fa-eye-slash'); // Toggle the slash on the icon
  this.classList.toggle('fa-eye');   // Toggle the eye icon itself
});
document.addEventListener('DOMContentLoaded', function() {
            const emailInput = document.querySelector('input[type="email"]');
            const emailError = document.getElementById('email-error');
            emailInput.addEventListener('input', function() {
                if (!/@/.test(emailInput.value)) {
                    emailError.textContent = 'Please enter a valid email address';
                    emailError.style.display = 'block';
                } else {
                    emailError.textContent = '';
                    emailError.style.display = 'none';
                }
            });
        });
</script>
          
