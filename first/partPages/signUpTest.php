<?php include_once 'headertest.php'?>
 
<section class="signup-form">

    <div class="form__log-in-form">
        <p class="form__log-in-msg">Sign Up</p>
        <p class='form__log-in-msg'>Please fill in all the fields below to apply for an Account with The Den. </br> </p>
    
    <form action="includes/signuptest.inc.php" method="post">
        <div class="form__field">
                <label for="Acname" class="form__log-in-msg">Please enter the name of the primary account holder </label>
            <input type="text" class="form__log-in-txt" name="Acname" id="AcName" placeholder="Account Name"> 

                <label for="email" class="form__log-in-msg">Please enter the email address you want to use</label>
            <input type="text" class="form__log-in-txt" name="email" id="email" placeholder="Email Address">
        </div>    

        <div class="form__field">
                <label for="pwd" class="form__log-in-msg">Please enter your password</label>
            <input type="password"class="form__log-in-txt"  name="pwd" id="pwd" placeholder="Your Password" >
            <input type="password" class="form__log-in-txt" name="pwdr" id="pwdr" placeholder="Repeat your Password" >
        </div>
              
        <button type="submit" class="form__btn-grp" name="submit_signUpTest">Sign Up</button>
    </form>
    </div>
</section>

<?php include_once 'footer.php'?>