<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <base href='http://localhost/LoginSystem/'>
    <link rel="stylesheet" href="style.css">
  
</head>
<body>
    <div class="wrapper page-header">
        <form action="includes/signup.inc.php" method="post" class="form__log-in-form">
            <label for="name" class="form__log-in-txt"></label>
            <label for="email" class="form__log-in-txt"></label>
            <label for="pwd" class="form__log-in-txt"></label>
            
            <input type="text" id='name' name='name' class='form__field'>
            <input type="text" id='email' name='email' class='form__field'>
            <input type="text" id='pwd' name='pwd' class='form__field'>

            <button type="submit" class='form__btn-grp' name='submit-registration'>Submit</button>
</form>
    </div>
</body>
</html>