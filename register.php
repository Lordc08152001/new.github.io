<?php
    session_start();
    error_reporting(0);

    
    include_once "db/controllers/account.php";


    if (isset($_POST['register'])){
        $fname = $_POST['fname'];
	      $lname= $_POST['lname'];
        $phone_number = $_POST['cont'];
	      $gender= $_POST['gender'];
        $email = $_POST['email'];
	      $username= $_POST['username'];
        $password = $_POST['password'];
        $temp_password = md5($password);
	      $con_password= $_POST['con_password'];
        $image = 'no_pic.png';
        $user ='Admin';
        $register_alert = 0;

        $check_user = new Controller();
      
        $result = $check_user->search_user($username);

        if($result){
          $error_message = 'User name is Already Exists';
          $register_alert = 2;
        }
        else{
          if($password == $con_password){
            $users = new Controller();
            $users->create_new_user(
                                      $fname, $lname, $gender, 
                                      $email, $phone_number, 
                                      $user, $image, $username, 
                                      $temp_password
                                    );
            $register_alert = 1;
          }
          else {
            $error_message = 'Password and Confirm Password didn\'t matched';
            $register_alert = 2;
          }
        }


        $message = '<div class="successfull">
                        <span class="las la-check"></span>
                        <p class="invalid">
                            Aproved Registration
                        </p>
                      </div>';
    }         
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/register.css"><link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <title>Enverga Toda</title>
</head>

<body>
  <div class="registration-container">
  <?php 
    if($register_alert==1){
      echo $message;
    }
    elseif($register_alert==2){
      echo '<div class="error">
              <span class="las la-exclamation-triangle"></span>
              <p class="invalid">'.
              $error_message .
              '</p>
            </div>';
    }
  ?>
  

    <div class="user-img">
      <img src="./images/logo.png">
    </div>

    <div class="registration-header">
      <p>Registration</p>
      <span class="divider"></span>
    </div>
    <div class="registration-body">

      <form action="#" method="post">
        <div class="registration-box">
          <div class="input-box">
            <label>First Name</label>
            <input type="text" id="fname" class="input-field" name="fname" value="<?php echo $fname?>" required>
          </div>
          <div class="input-box">
            <label>Last Name</label>
            <input type="text" id="lname" class="input-field" name="lname" value="<?php echo $lname?>" required>
          </div>
          <div class="input-box">
            <label>Contact Number</label>
            <input type="tel" id="phone" class="input-field" name="cont" value="<?php echo $phone_number?>" required>
          </div>


          <div class="input-box">
            <label for="gender">Gender</label>
            <ul>
              <input type="radio" name="gender" value="Male" required>
                <p>&nbsp;Male&nbsp;&nbsp;</p>
              <input type="radio" name="gender" value="Female" required>
                <p>&nbsp;Female&nbsp;&nbsp;</p>
              <input type="radio" name="gender" value="Other" required>
                <p>&nbsp;Other&nbsp;&nbsp;</p>
            </ul>

          </div>



          <div class="input-box">
            <label>Email</label>
            <input type="email" id="email" class="input-field" name="email" value="<?php echo $email?>" required>
          </div>
          <div class="input-box">
            <label>Username</label>
            <input type="text" id="username" class="input-field" name="username" value="<?php echo $username?>" required>
          </div>
          <div class="input-box">
            <label>Password</label>
            <input type="password" id="pass" class="input-field" name="password" value="<?php echo $password?>" required>
          </div>
          <div class="input-box">
            <label>Confirm Password</label>
            <input type="password" id="conpass" class="input-field" name="con_password" value="<?php echo $con_password?>" required>
          </div>
        </div>
        <button class="btn-register" name="register">Register Now</button>
      </form>
    </div>
    <div class="registration-footer">
      Already have an account? <a href="index.php"> Login</a>
    </div>
  </div>

</body>

</html>