<?php
    session_start();
    error_reporting(0);

    
    include_once "db/controllers/account.php";


    if (isset($_POST['submit'])){
        $users = new Controller();
        $email = $_POST['email'];
        $username = $email;
	    $password= $_POST['password'];
        $temp_password = md5($password);
        


        $result = $users->get_user($username, $email, $temp_password);
        $error = '';

        foreach ($result as &$row) {
            $_SESSION['id'] = $row["id"];
            $uname = $row["username"];
            $user = $row["user"];
            $_SESSION['Names'] = $row['fname'] . ' ' . $row['lname'];
        }

        if ('Admin' == $user){
            header ('Location: admin/index.php');
        }
        elseif ('Toda Member' == $user) {
            header ('Location: toda_member/index.php');
        }
        elseif ('Passenger' == $user) {
            header ('Location: passenger/index.php');
        }
        else {
            $error = '
                        <div class="error">
                            <span class="las la-exclamation-triangle"></span>
                            <p class="invalid">
                                Incorrect Username or password
                            </p>
                        </div>';
        }
    }
            
?>

<!DOCTYPE html>
<html>

<head>
    <title>Enverga Toda</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>

<body>
    <div class="container">
        <?php
            if($error != ''){
                echo $error;
            }
        ?>
        

        <form action="#" method="POST" class="login-email">
            <p class="user-img"><img src="./images/logo.png"></p>

            <p class="login-text">User Login</p>

            <div class="input-group">
                <p>Email or Username:</p>
                <input type="text" name="email" value="<?php echo "$email" ?>" required>
                <span></span>
            </div>
            <div class="input-group">
                <p class="pass-p">Password:</p>
                <input type="password" name="password" value="<?php echo $password; ?>" required>
                <span></span>
            </div>
            <div class="input-group">
                <button name="submit" class="btn-submit">Login</button>
            </div>
        </form>

        <div class="register">
            Don't have an account? <a href="register.php">Register</a>
        </div>
    </div>


</body>

</html>
