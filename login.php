<?php
$conn = require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Ruhuna Arts Student's Annual Sessions</title>
    <meta name="keywords"
        content="RASAS, Ruhuna Arts Student's Annual Sessions, University of Ruhuna, Humanities and Social Sciences">
    <meta name="description"
        content="Organizes its first student sessions with the aim of creating a platform for the budding researchers in the field of Humanities and Social Sciences">
    <link rel="icon" href="asserts/images/hss.png" type="image/x-icon">
    <link rel="stylesheet" href="asserts/css/bootstrap.css">
    <link rel="stylesheet" href="asserts/css/main.css">
    <link rel="stylesheet" href="asserts/css/mdb.min.css">
    <script src="asserts/js/bootstrap.js"></script>
    <script src="asserts/js/mdb.es.min.js"></script>
    <style>
        .layout {
            width: 100%;

            display: grid;
            grid-template-rows: 100px 1fr 50px;
            gap: 8px;
        }

        .header {
            grid-area: 1 / 1 / 2 / -1;
        }

        .main {
            grid-area: 2 / 1 / 3 / -1;
        }

        footer {
            grid-area: 3 / 1 / -1 / -1;
            margin-bottom: 0;
            width: 100%;
            position: relative !important;
            overflow: hidden;
            margin-bottom: 10px !important;
            justify-content: center;
            align-items: center;
            height: 50px;
            background-color: #800020;
            color: white;
            text-align: center;
            margin-top: 2%;
        }

        .main-content-video {
            margin-bottom: 0;
            width: 100%;
            height: 125%;
            display: block;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            background: white;
        }

        .logo {
            height: auto;
            width: 150px;
        }

        .nav {
            display: flex;
            gap: 30px;
            align-items: center;
            position: sticky;
            font-family: Arial, sans-serif;
            font-size: 17px;
        }

        .nav a {
            text-decoration: none;
            color: #333;
        }

        .nav a:hover {
            color: #FFBA00;
            text-transform: uppercase;
            color: #A52A2A;
            font-weight: bold;
        }

        .nav .register {
            background: #A52A2A;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 4px;
        }

        .nav .register:hover {
            background-color: #FFBA00;
            text-transform: uppercase;
            color: #A52A2A;
            font-weight: bold;
            border: 1px solid black;
        }

        .active {
            background-color: #FFBA00;
            text-transform: uppercase;
            color: #A52A2A;
            font-weight: bold;
            width: fit-content;
            height: fit-content;
            padding: 0.5rem 1rem;
            border-radius: 4px;

        }

        body {
            background-color: #fcfcfc;
        }

        footer .footer-content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50px;
            background-color: #800020;
            color: white;
        }

        .hamburger {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
            position: relative;
            z-index: 20;
        }

        .hamburger span {
            width: 25px;
            height: 3px;
            background-color: #f4a261;
            border-radius: 5px;
            transition: transform 0.3s, opacity 0.3s, background-color 0.3s;
        }

        @media (max-width: 768px) {
            .nav {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 60px;
                right: 20px;
                background-color: #FFBA00;
                padding: 10px;
                border-radius: 5px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                width: auto;
                text-align: center;
                font-weight: bolder;
            }

            .nav.active {
                display: flex;
                width: max-content;
                height: max-content;
            }

            .hamburger {
                display: flex;
            }

            .hamburger span {
                width: 25px;
                height: 3px;
                background-color: #A52A2A;
                border-radius: 5px;
                transition: background-color 0.3s;
                font-weight: bolder;
            }

            .hamburger.open span {
                background-color: #800020;
            }

            .hamburger.open span:nth-child(1) {
                transform: rotate(45deg) translate(5px, 5px);
            }

            .hamburger.open span:nth-child(2) {
                opacity: 0;
            }

            .hamburger.open span:nth-child(3) {
                transform: rotate(-55deg) translate(5px, -5px);
            }

            .main-content-video {
                height: 100%;
            }

            footer {
                width: 100vw !important;
                margin-top: 18% !important;
            }


        }

        @media (max-width: 900px) {
            .nav {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 60px;
                right: 20px;
                background-color: #FFBA00;
                padding: 10px;
                border-radius: 5px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                width: 100%;
                text-align: center;
                font-weight: bolder;
            }

            .nav.active {
                display: flex;
                width: max-content;
                height: max-content;
            }

            .hamburger {
                display: flex;
            }

            .box {
                width: 100%;
                height: fit-content;
            }

            .hamburger span {
                width: 25px;
                height: 3px;
                background-color: #A52A2A;
                border-radius: 5px;
                transition: background-color 0.3s;
                font-weight: bolder;
            }

            .hamburger.open span {
                background-color: #800020;
            }

            .hamburger.open span:nth-child(1) {
                transform: rotate(45deg) translate(5px, 5px);
            }

            .hamburger.open span:nth-child(2) {
                opacity: 0;
            }

            .hamburger.open span:nth-child(3) {
                transform: rotate(-55deg) translate(5px, -5px);
            }

            footer {
                width: 100vw !important;

            }

            hr {
                width: 100%;
            }

            footer {
                width: 100%;
                position: relative !important;
                overflow: hidden;
                margin-bottom: 10px !important;
                justify-content: center;
                align-items: center;
                height: 50px;
                background-color: #800020;
                color: white;
                text-align: center;
                margin-top: 13%;
            }

            .main-content-video {
                height: 133%;
            }

        }
    </style>
</head>

<body>
    <section class="layout">
        <div class="col-md-12 header sticky-md-top">
            <img src="asserts/images/rasas_logo.png" alt="RASAS Logo" class="logo"
                title="Ruhuna Arts Student's Annual Sessions">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <nav class="nav">
                <a href="home.php">Home</a>
                <a href="con_team.php">Conference Team</a>
                <a href="sub_details.php">Submission Details</a>
                <a href="program.php">Program</a>
                <a href="gallery.php">Gallery</a>
                <a href="contactus.php">Contact Us</a>
                <a href="register.php" class="register">Register</a>
                <a href="login.php" class="register active" style="background-color: #FFBA00; color: black;der;">Log
                    in</a>
            </nav>
        </div>
        <div class="main">
            <div class="col-md-12 main-content-video">
                <video src="asserts/videos/42154-431423229_small.mp4" autoplay loop muted
                    class="col-md-12 main-content-video"
                    style="width: 100%; height: 700px; margin-bottom: -200px; overflow: hidden; opacity: 40%;"></video>
                <!-- Login form -->
                <div class="col-md-6 bg-white"
                    style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 20px; border-radius: 10px; background-color: #FFBA00; opacity: 80%; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
                    <form style="color: #A52A2A;" method="post" action="login.php">
                        <fieldset>
                            <legend class="text-center fw-bold">Login</legend>
                            <!-- Email input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="form1Example1"
                                    style="opacity: 100%; color: #A52A2A; font-weight: bolder;">Email address</label>
                                <input type="email" name="email" id="form1Example1" class="form-control"
                                    style="border: 1px solid #FFBA00; color: #A52A2A;" required
                                    placeholder="Enter email address" />

                            </div>

                            <!-- Password input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label mb-2" for="form1Example2"
                                    style="opacity: 100%; color: #A52A2A; font-weight: bolder;">Password</label>
                                <input type="password" name="password" id="form1Example2" class="form-control"
                                    style="border: 1px solid #FFBA00; color: #A52A2A;" required
                                    placeholder="Enter password" />

                            </div>

                            <!-- 2 column grid layout for inline styling -->
                            <div class="row mb-4">
                                <div class="col d-flex justify-content-center">
                                    <!-- Checkbox -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="form1Example3"
                                            checked />
                                        <label class="form-check-label" for="form1Example3"> Remember me </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <!-- Simple link -->
                                    <a href="forget_password.php">Forgot password?</a>
                                </div>
                            </div>

                            <!-- Submit button -->
                            <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block" name="login"
                                style="background-color: #A52A2A; color: #FFBA00; font-weight: bolder;">Log in</button>

                            <div id="creativeLoader" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%, -50%); z-index:9999; background:rgba(255,255,255,0.8); padding:20px; border-radius:5px;">
                                <div class="spinner-border text-danger" role="status">
                                    <span class="sr-only" style="display: none;">Loading...</span>
                                </div>
                            </div>
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    const form = document.querySelector('form[action="login.php"]');
                                    const loader = document.getElementById("creativeLoader");
                                    if (form) {
                                        form.addEventListener("submit", function(event) {
                                            loader.style.display = "block";
                                        });
                                    }
                                });
                            </script>
                            <!--php code-->
                            <?php
                            if (isset($_POST['login'])) {
                                $email = $_POST['email'];
                                $password = $_POST['password']; // User-entered password (plain text)
                            
                                // Fetch the user record based on the email
                                $sql = "SELECT * FROM users WHERE email = '$email'";
                                $user_obj = mysqli_query($con, $sql);

                                if ($user_obj && mysqli_num_rows($user_obj) == 1) {
                                    $row = mysqli_fetch_assoc($user_obj);
                                    $stored_hash = $row['password_hash']; // Get the hashed password from the database
                            
                                    // Verify the password
                                    if (password_verify($password, $stored_hash)) {
                                        // Password matched, login successful
                                        $id = $row['user_id'];
                                        $_SESSION['user_id'] = $id;

                                        // Update last login timestamp
                                        $sql1 = "UPDATE users SET last_login = NOW() WHERE user_id = '$id'";
                                        mysqli_query($con, $sql1);

                                        echo "<div style='position: fixed; top: 20px; right: 20px; z-index: 1000;' class='alert alert-success alert-dismissible fade show' role='alert'>Login successful! Please <a href='Dashboard/dashboard.php' class='alert-link'>Go to Dashboard</a>.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";

                                        // Redirect based on role
                                        $role = $row['role'];
                                        if ($role == 'admin') {
                                            echo "<script>setTimeout(\"location.href = 'Dashboard/dashboard_admin.php';\", 1000);</script>";
                                        } elseif ($role == 'reviewer') {
                                            echo "<script>setTimeout(\"location.href = 'Dashboard/dashboard_reviewer.php';\", 1000);</script>";
                                        } else {
                                            echo "<script>setTimeout(\"location.href = 'Dashboard/dashboard_user.php';\", 1000);</script>";
                                        }
                                    } else {
                                        echo "<div class='alert alert-danger'>Invalid Password. Please try again.</div>";
                                    }
                                } else {
                                    echo "<div class='alert alert-danger'>Email not found. Please <a href='register.php'>Register</a>.</div>";
                                }
                            }
                            ?>
                        </fieldset>
                    </form>
                </div>
            </div>
    </section>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Ruhuna Arts Student's Annual Sessions. All rights reserved.</p>
    </footer>
    <script>
        //hambuger menu
        const hamburger = document.querySelector('.hamburger');
        const nav = document.querySelector('.nav');
        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('open');
            nav.classList.toggle('active');
        });
    </script>

</body>

</html>