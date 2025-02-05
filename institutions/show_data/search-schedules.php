<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Search Schedules</title> <!-- title for the page  -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script> <!-- include jquery library -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> <!-- include bootstrap library -->
  <link href="https://fonts.googleapis.com/css?family=Coustard|Lato&display=swap" rel="stylesheet"> <!-- include two google fonts -->

    <style>
        body {

            background-image: url("../images/back22.jpg");  /* put the background image  */

            background-size: cover; /* make it cover the screen */


        }

        .navtitle {
            font-family: 'Lato', sans-serif;  /* put font Lato to the nav title */
        }

        .navbar {
            box-shadow: 0 3px 4px rgba(0, 0, 0, 0.16), 0 3px 4px;   /* Adding simple shadow effect to the navbar */
        }
    </style>
</head>

<body>

    <!-- Grey with black text -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark"> <!-- make a dark navbar with bootstrap -->

        <div class="container">
            <a class="navbar-brand" href="../welcome.php"> <!-- Redirect to welcome page when click on it -->
                <h1 class="text-center navtitle">RSK GROUP OF COLLEGES</h1>
            </a>


            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item dropdown ">
                    <a class="navbar-toggler-icon" href="#" id="navbardrop" data-toggle="dropdown"></a> <!-- Creating a dropdown menu -->
                    <div class="dropdown-menu">

                        <a class="dropdown-item" href="../welcome.php">Home</a> <!-- One for home page -->
                        <a class="dropdown-item" href="../reset-password.php">Reset Password</a> <!-- Second for Reset Password -->
                        <a class="dropdown-item" href="../logout.php">Log out</a> <!-- Third to log out -->

                    </div>
                </li>
            </ul>
    </nav>

    <div class="container">
    <div class="col-13 col-sm-6 col-md-5 mx-auto" style="padding: 2%;"> 
        <div class="form-group">
          <h2 class="text-center" style=" font-size: 45px; font-family:'Coustard', serif; color: #FFFFFF; background-color:#353a40;">Search Student</h2>
          <input type="text" name="search" id="search" autocomplete="off" class="form-control" placeholder="Enter Student Full Name">
          <div id="output" style="font-family: 'Coustard', serif; background-color:#353a40; color: rgb(255, 255, 255); padding-left: 2%;"></div>
        </div>
      </div>
    </div>

    <div class="container" style="padding: 2%;">

    


                    <?php



                    // Initialize the session
                    session_start();

                    // Check if the user is logged in, if not then redirect him to login page
                    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
                        echo "<br/>" . "Please Login" . "<br/>";
                        exit;
                    }

                    include("../config.php");

                    $query = "SELECT * FROM schedules";
                    $result = mysqli_query($link, $query);


                    if (mysqli_num_rows($result) > 0) {
                        while ($user = mysqli_fetch_array($result)) {

                            if ($user['school_id'] == (int)$_SESSION['id']) {

                            echo"<table class='table table-bordered table-striped table-dark' style='width: 100%;'>";
                           echo " <thead>";
                           echo"<tr>";
                           echo      "  <th style='text-align: center;'>ID</th>
                                        <th style='text-align: center; '>Grade</th>
                                        <th style='text-align: center;'>1</th>
                                        <th style='text-align: center;'>2</th>
                                        <th style='text-align: center;'>3</th>
                                        <th style='text-align: center;'>4</th>
                                        <th style='text-align: center;'>5</th>
                                        <th style='text-align: center;'>6</th>
                                        <th style='text-align: center;'>7</th>
                                        <th style='text-align: center;'>8</th>
                                        <th style='text-align: center;'>Date of register</th>
                                        <th style='text-align: center;'>Edit</th>
                                        <th style='text-align: center;'>Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                    
                                    <tr>";
                                
                            echo "<td align='center'>" . $user['id'] . "</td>";
                            echo "<td align='center'>" . $user['grade'] . "</td>";
                            echo "<td align='center'>" . $user['appointment1'] . "</td>";
                            echo "<td align='center'>" . $user['appointment2'] . "</td>";
                            echo "<td align='center'>" . $user['appointment3'] . "</td>";
                            echo "<td align='center'>" . $user['appointment4'] . "</td>";
                            echo "<td align='center'>" . $user['appointment5'] . "</td>";
                            echo "<td align='center'>" . $user['appointment6'] . "</td>";
                            echo "<td align='center'>" . $user['appointment7'] . "</td>";
                            echo "<td align='center'>" . $user['appointment8'] . "</td>";
                            echo "<td align='center'>" . $user['date_of_register'] . "</td>";
                            echo ("<td align='center'><a href=\"../edit_data/edit-schedule.php?schedule_id=".$user['id']."\">Edit</a></td>");
                            echo ("<td align='center'><a href=\"../remove_data/remove-schedule.php?schedule_id=".$user['id']."\">Remove</a></td>");
                            echo "</tr>";

                        }
                    }
                }
                    mysqli_close($link);
                    ?>
        </table>
    </div>


</body>



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>