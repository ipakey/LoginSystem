<?php include_once 'header.php'?>
 
<section class="signup-form">

    <div class="form__log-in-form">
        <p class="form__log-in-msg">Log In</p>
        <p class='form__log-in-msg'>Please fill in all the fields below to log into your Account with The Den. </br> </p>
    
    <form action="includes/login.inc.php" method="post">

        <div class="form__field">
                <label for="Uname" class="form__log-in-msg">Please enter your user name </label>
            <input type="text" class="form__log-in-txt" name="Uname" id="name" placeholder="User Name" autocomplete="off"> 
               
        <div class="form__field">
                <label for="pwd" class="form__log-in-msg">Please enter your password</label>
            <input type="password"class="form__log-in-txt"  name="pwd" id="pwd" placeholder="Your Password" autocomplete="off">
        </div>
              
        <button type="submit" class="form__btn-grp" name="submit_login">Sign Up</button>
    </form>
    </div>
</section>

<?php include_once 'footer.php'?>