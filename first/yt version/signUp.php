<?php include_once 'header.php'?>
 
<section class="signup-form">

    <div class="form__log-in-form">
        <p class="form__log-in-msg">Sign Up</p>
        <p class='form__log-in-msg'>Please fill in all the fields below to apply for an Account with The Den. </br> </p>
    
    <form action="includes/signup.inc.php" method="post">
        <div class="form__field">
                <label for="Acname" class="form__log-in-msg">Please enter the name of the primary account holder </label>
            <input type="text" class="form__log-in-txt" name="Acname" id="AcName" placeholder="Account Name"> 
                <label for="email" class="form__log-in-msg">Please enter the email address you want to use</label>
            <input type="text" class="form__log-in-txt" name="email" id="email" placeholder="Email Address">
        </div>    
        <div class="form__field">
                <label for="name" class="form__log-in-msg">Please enter the name of the learner</label>
            <input type="text" class="form__log-in-txt" name="name" id="name" placeholder="Full Name">
                <label for="KnAs" class="form__log-in-msg">Name the learner wants to be called </label>
            <input type="text" class="form__log-in-txt" name="KnAs" id="KnAs" placeholder="User Name">
        </div>
        <p class="form__log-in-msg">These two fields are for guidance only - these choices will be confirmed before any teaching takes place. </p></br>
        <div class="form__field">
            
                <label for="learnMethod" class="form__log-in-msg" class="form__log-in-txt">Choose your prefered method of learning: </label>
            <select type="text" class="form__log-in-txt" name="lMethod" id="lMethod" placeholder="Learning Method">
                <option class="form__log-in-msg" value="den">At The Den</option>
                <option class="form__log-in-msg" value="home">At My Home</option>
                <option class="form__log-in-msg" value="online">Online</option>
                <option class="form__log-in-msg" value="mixed">Mixed Learning</option>
            </select>
                <label for="pMethod" class="form__log-in-msg">Choose your prefered payment method: </label>
            <select type="text" class="form__log-in-txt" name="pMethod" id="pMethod" placeholder="Payment preference" >
                <option class="form__log-in-msg" value="block">Block payment in Advance</option>
                <option class="form__log-in-msg" value="pyg">Pay as you go</option>
            </select>
        </div></br>
        <div class="form__field">
                <label for="pwd" class="form__log-in-msg">Please enter your password</label>
            <input type="password"class="form__log-in-txt"  name="pwd" id="pwd" placeholder="Your Password" >
            <input type="password" class="form__log-in-txt" name="pwdr" id="pwdr" placeholder="Repeat your Password" >
        </div>
              
        <button type="submit" class="form__btn-grp" name="submit_signUp">Sign Up</button>
    </form>
    </div>
</section>

<?php include_once 'footer.php'?>