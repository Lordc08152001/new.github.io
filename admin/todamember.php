<?php
session_start();
//error_reporting(0);

if (empty($_SESSION['id'])) {
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

    <link rel="stylesheet" href="./assets/css/todamember.css">

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
                        <a href="index.php" class="menu">
                            <p class="las la-igloo"></p>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="todamember.php" class="active">
                            <p class="las la-motorcycle"></p>
                            <span>Toda Members</span>
                        </a>
                    </li>
                    <li>
                        <a href="passenger.php" class="menu">
                            <p class="las la-users"></p>
                            <span>Passengers</span>
                        </a>
                    </li>
                    <li>
                        <a href="booking.php" class="menu">
                            <p class="las la-book"></p>
                            <span>Bookings</span>
                        </a>
                    </li>
                    <li>
                        <a href="account.php" class="menu">
                            <p class="las la-user-circle"></p>
                            <span>Account</span>
                        </a>
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
                Toda Member
            </h2>


            <div class="user-wrapper">
                <div>
                    <h4>
                        <?php echo $_SESSION['Names']; ?>
                    </h4>
                    <small>Super admin</small>
                </div>
                <img src="../images/uploads/no_pic.png" alt="">
                <label for="nav-down">
                    <span class="las la-angle-down"></span>
                </label>
            </div>
        </header>

        <main>
            <!--       ==( For Table )==     --->
            <!--table header--->
            <div class="table">
                <div class="table_header">
                    <p>Toda Members</p>
                    <input type="text" placeholder="Search" />
                    <div>
                        <button class="add_new">Add Member</button>
                    </div>
                </div>
            </div>

            <!--table--->
            <div class="table_section">






                <table class="content-table">
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>License No</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    <?php
                            include_once "../db/controllers/todamember.php";
                            
                            $users = new TodaController();
                            $result = $users->get_all_users();
                            if ($result) {
                            
                            $count = 0;
                            /* fetch associative array */
                            foreach ($result as &$row) {
                                $count = $count + 1;
                                $id = $row["id"];
                                $fname = $row["fname"];
                                $lname = $row["lname"];
                                $gender = $row["gender"];
                                $email = $row["email"];
                                $number = $row["number"];
                                $license_no = $row["license_no"];
                                $username = $row["user_name"];
                                $password = $row["password"];
                                $image = $row["image"];
                            echo "
                                <tr>
                                <th>$count</th>
                                <td>"?><img src="../images/uploads/<?php echo $image; ?>" alt="" height="40px" width="40px"><?php echo "</td>
                                <td>$fname $lname</td>
                                <td>$number</td>
                                <td>$license_no</td>
                                <td>";
                            ?>
                                <a href="validation/update_toda.php?id=<?php echo $row['id'] ?>"><i class="las la-edit"></i> </a>
                                <a href="validation/delete_toda.php?id=<?php echo $row['id'] ?>"><i class="las la-trash"></i></a>
                            
                            </td>
                            </tr>
                            
                            
                            <?php }
                            
                            /* free result set 
                            $result->free();*/
                            }

                        ?>
                    </tbody>
                </table>
            </div>
            <!--       ==( END Table )==     --->
        </main>
    </div>


    <!-- "For Menu Down" -->
    <div class="menu-down">
        <h2>
            <ul>
                <li>
                    <a href="">
                        <p class="las la-user-circle"></p>
                        <span>Account</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <p class="las la-phone"></p>
                        <span>Contuct</span>
                    </a>
                </li>
                <li>
                    <div class="linef"></div>
                </li>
                <li>
                    <form action="../logout.php" method="post">
                        <a href="">
                            <p class="las la-sign-out-alt"></p>
                            <button><span>Logout</span></button>
                        </a>
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