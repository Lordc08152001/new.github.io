<?php
    session_start();
    error_reporting(0);

    if(empty($_SESSION['id'])){
        header("location:../index.php");
        exit();
    }
    include_once '../db/controllers/account.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="./assets/css/passengers.css">

  <link rel="stylesheet"
    href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

  <title>Enverga Toda</title>
</head>

<body>
<!-- "For Menu Bar" -->
<input type="checkbox" id="nav-toggle">
    <!-- "For Menu Bar2" -->
    <input type="checkbox" id="nav-toggle2">
    <!-- "For down Bar" -->
    <input type="checkbox" id="nav-down">

<div class="slide">      
    <!-- "For Logo" -->
    <div class="logo-details">
        <h2>
            <img src="../images/logo.png" alt="">
            <span>Enverga</span>
        </h2>
    </div>

    <div class="line"></div>

    <div class="sidebar">
        <!-- "For Menu Sidebar" -->
        <div class="sidebar-menu">
            <ul>
               <li>
                    <a href="index.php" class="menu"><p class="las la-igloo"></p>
                    <span>Dashboard</span></a>
                </li>  
                <li>
                    <a href="todamember.php" class="menu"><p class="las la-motorcycle"></p>
                    <span>Toda Members</span></a>
                </li> 
                <li>
                    <a href="passenger.php" class="active"><p class="las la-users"></p>
                    <span>Passengers</span></a>
                </li>
                <li>
                    <a href="booking.php" class="menu"><p class="las la-book"></p>
                    <span>Bookings</span></a>
                </li>  
                <li>
                    <a href="account.php" class="menu"><p class="las la-user-circle"></p>
                    <span>Account</span></a>
                </li> 
            </ul>
        </div>
    </div>

    <!-- "For Logout" -->
    <form action="../logout.php" method="post">
        <div class="logout">
            <label for="nav-logout">
                <div class="logout-details">
                    <p class="las la-sign-out-alt"></p>
                    <button><span>Logout</span></button>
                </div>
            </label>
        </div> 
    </form>
</div>
    <!-- "For Main Content" -->
    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle" class="nav_toggle">
                    <span class="las la-bars"></span>
                </label>
                Passengers
            </h2>


            <div class="user-wrapper">
                <div>
                    <h4><?php echo $_SESSION['Names'];?></h4>
                    <small>Super admin</small>
                </div>
                <img src="../images/uploads/no_pic.png" alt="">
                <label for="nav-down">
                    <span class="las la-angle-down"></span>
                </label>
            </div>
        </header>

        <main>
            
        </main>
    </div>


    <!-- "For Menu Down" -->
    <div class="menu-down">
        <h2>
            <ul>
                <li>
                        <a href=""><p class="las la-user-circle"></p>
                        <span>Account</span></a>
                </li>
                <li>
                        <a href="" ><p class="las la-phone"></p>
                        <span>Contuct</span></a>
                </li>
                <li>
                    <div class="linef"></div>
                </li>
                <li>
                    <form action="../logout.php" method="post">
                        <a href=""><p class="las la-sign-out-alt"></p>
                        <button><span>Logout</span></button></a>
                    </form>
                </li>
            </ul>
            
        </h2>
    </div>
    <!--end for menu Down-->


    <!-- "FOr Second Nav Bar" -->
    <div class="nav2">
        <div>
            <label for="nav-toggle2" class="nav_toggle2">
                <span class="las la-bars"></span>
            </label>
        </div>
    </div>
    <!--end Second Nav Ba-->

    

    
    <div class="nav-ekis">
            <label for="nav-toggle2">
                <span class="las la-times"></span>
            </label>
    </div>
</body>

</html>