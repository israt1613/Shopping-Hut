<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- login.php -->
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/shoppingHut/core/init.php';
include 'includes/head.php';

$email = ((isset($_POST['email']))?sanitize($_POST['email']):'');
$email = trim($email);
$password = ((isset($_POST['password']))?sanitize($_POST['password']):'');
$password = trim($password);
$errors = array();
?>
<style>
    body{
        background-image:url("/shoppingHut/images/headerlogo/background.png");
        background-size:100vw 100vh;
        background-attachment: fixed;
    }
</style>
<div id="login-form">
    <div>
    
    <?php
        if($_POST){
            //form validation
            if(empty($_POST['email']) || empty($_POST['password'])){
                $errors[] = 'You must provide email and password.';
            }

            //validate email
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $errors[] = 'You must enter a valid Email.';
            }

            //password is more than 6 characters
            if(strlen($password) < 6){
                $errors[] = 'Passwords must be at least 6 characters.';
            }

            //check if email exists in the database
            $query = $db->query("SELECT * FROM users WHERE email = '$email'");
            $user = mysqli_fetch_assoc($query);
            $userCount = mysqli_num_rows($query);
            if($userCount < 1){
                $errors[] = 'That Email does not exists in our database.';
            }

            if(!password_verify($password, $user['password'])){
                $errors[] = 'The password does not match our records. Please try again...';
            }

            //check for errors
            if(!empty($errors)){
                echo display_errors($errors);
            }else{
                //log user in
                $user_id = $user['id'];
                login($user_id);
            }
        }
    ?>
    </div>
    
    <h2 class="text-center">Login</h2><hr>
    <form action="login.php" method="post">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" placeholder="Enter your Email" name="email" id="email" class="form-control" value="<?=$email;?>">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" placeholder="Password must be atleast 6 characters." name="password" id="password" class="form-control" value="<?=$password;?>">
            <!-- <input type="checkbox" onclick="myFunction()">Show Password -->
        </div>
        <div class="form-group">
            <input type="submit" value="login" class="btn btn-primary">
        </div>
    </form>

    <p class ="text-right"><a href="/shoppingHut/index.php" atl="home"><b>Visit Site</b></p>
</div>



<?php
include 'includes/footer.php'; ?>