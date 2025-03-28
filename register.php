<?php
require 'db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Ruhuna Arts Student's Annual Sessions</title>
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
            width: 100%;
            position: fixed;
            bottom: 0;
            left: 0;
            justify-content: center;
            align-items: center;
            height: 50px;
            background-color: #800020;
            color: white;
            text-align: center;
            z-index: 1000;
        }

        .main-content-video {
            margin-bottom: 0;
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

        footer {
            height: 50px;
            margin-bottom: 50%;
        }

        .main-content-video {
            padding-bottom: 13%;
            height: 130% !important;
        }



        @media (max-width: 767px) {
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

            footer {
                height: 50px;
                position: relative !important;
                bottom: 0 !important;
                width: 100% !important;
                margin-top: 132% !important;
                z-index: 1000;
            }


            .login-form {
                position: absolute;
                top: 50% !important;
                left: 50%;
                transform: translate(-50%, -50%);
                padding: 20px;
                border-radius: 10px;
                background-color: #FFBA00;
                opacity: 80%;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                width: 90%;
            }

            .login-form {
                position: absolute;
            }

            .main-content-video {
                height: 290% !important;

            }
        }

        @media screen and (min-device-width: 768px) and (max-device-width: 1024px) {
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
                margin-top: 20% !important;

            }

            .main-content-video {
                height: 280% !important;
            }

            .login-form {
                position: absolute;
                top: -650%;
                left: 50%;
                transform: translate(-50%, -50%);
                padding: 20px;
                border-radius: 10px;
                background-color: #FFBA00;
                opacity: 80%;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                width: 90%;
            }

        }


        @media screen and (min-width: 1025px) {
            .main-content-video {
                height: 108% !important;
            }

            footer {
                position: relative !important;
                bottom: 42% !important;
                width: 100% !important;
                margin-bottom: 80% !important;
            }

            .login-form {
                position: relative;
                top: 40% !important;
                left: 50%;
                transform: translate(-50%, -50%);
                padding: 20px;
                border-radius: 10px;
                background-color: #FFBA00;
                opacity: 80%;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                width: 50%;
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
                <a href="register.php" class="register active"
                    style="background-color: #FFBA00; color: black;">Register</a>
                <a href="login.php" class="register">Log in</a>
            </nav>
        </div>
        <div class="main">
            <div class="col-md-12 main-content-video img-fluid">
                <video src="asserts/videos/42154-431423229_small.mp4" autoplay loop muted
                    class="col-md-12 main-content-video"
                    style="width: 100%; height: 150%; margin-top: 0; margin-bottom: 0px;  opacity: 40%;"></video>
                <!-- Login form -->
                <div class="col-md-6 bg-white login-form"
                    style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 20px; border-radius: 10px; background-color: #FFBA00; opacity: 80%; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
                    <form style="color: #A52A2A;" action="register.php" method="POST" enctype="multipart/form-data">
                        <legend class="text-center fw-bold">Register</legend>
                        <!--Name input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="full name"
                                style="opacity: 100%; color: #A52A2A; font-weight: bolder;">Full Name</label>
                            <input type="text" id="full_name" name="full_name" class="form-control"
                                style="border: 1px solid #FFBA00; color: #A52A2A;" required
                                placeholder="Enter full name" />
                        </div>


                        <div class="col">
                            <!-- Email input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="mail"
                                    style="opacity: 100%; color: #A52A2A; font-weight: bolder;">Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    style="border: 1px solid #FFBA00; color: #A52A2A;" required
                                    placeholder="Enter email address" />
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-mb-2">
                                <!-- Password input -->
                                <div data-mdb-input-init class="form-outline">
                                    <label class="form-label" for="password"
                                        style="opacity: 100%; color: #A52A2A; font-weight: bolder;">Password</label>
                                    <input type="password" id="password_hash" name="password_hash" class="form-control"
                                        style="border: 1px solid #FFBA00; color: #A52A2A;" required
                                        placeholder="Enter password" />
                                    <p id="passwordError"></p>
                                </div>
                            </div>
                            <div class="col-mb-2">
                                <!-- Re-enter Password input -->
                                <div data-mdb-input-init class="form-outline">
                                    <label class="form-label mb-2" for="re-password"
                                        style="opacity: 100%; color: #A52A2A; font-weight: bolder;">Re-Enter
                                        Password</label>
                                    <input type="password" id="re-password" class="form-control"
                                        style="border: 1px solid #FFBA00; color: #A52A2A;" required
                                        placeholder="Re-Enter password" />
                                    <p id="re_passwordError"></p>
                                </div>
                            </div>

                            <div class="col-mb-2">
                                <!-- Phone number input -->
                                <div data-mdb-input-init class="form-outline">
                                    <label class="form-label" for="p_number"
                                        style="opacity: 100%; color: #A52A2A; font-weight: bolder;">Phone
                                        number</label>
                                    <input type="tel" id="p_number" class="form-control" name="phone"
                                        style="border: 1px solid #FFBA00; color: #A52A2A;" required
                                        placeholder="078-1234567" />
                                </div>
                            </div>
                        </div><br>


                        <div class="row">
                            <!-- Address input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="address"
                                    style="opacity: 100%; color: #A52A2A; font-weight: bolder;">Address</label>
                                <input type="text" id="address" class="form-control" name="address"
                                    style="border: 1px solid #FFBA00; color: #A52A2A;" required
                                    placeholder="Enter address" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <!-- University-->
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="university"
                                        style="opacity: 100%; color: #A52A2A; font-weight: bolder;">University</label>
                                    <input type="text" id="university" class="form-control" name="university"
                                        style="border: 1px solid #FFBA00; color: #A52A2A;" required
                                        placeholder="Enter university name" />
                                </div>
                            </div>
                            <div class="col">
                                <!-- department-->
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="department"
                                        style="opacity: 100%; color: #A52A2A; font-weight: bolder;">Department</label>
                                    <input type="text" id="department" class="form-control" name="department"
                                        style="border: 1px solid #FFBA00; color: #A52A2A;"
                                        placeholder="Enter department name" />
                                </div>
                            </div>
                        </div>

                        <!-- Submit button -->
                        <div class="row" style="margin-left: 3px;">
                            <div class="col">
                                <button data-mdb-ripple-init type="submit" name="register" id="submit"
                                    class="btn btn-primary btn-block"
                                    style="background-color: #A52A2A; color: #FFBA00; font-weight: bolder;">Register</button>
                            </div>
                            <div class="col">
                                <button data-mdb-ripple-init type="reset" class=" btn btn-primary btn-block"
                                    style="background-color: #A52A2A; color: #FFBA00; font-weight: bolder;">Reset</button>
                            </div>
                        </div>

                        <div id="creativeLoader" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%, -50%); z-index:9999; background:rgba(255,255,255,0.8); padding:20px; border-radius:5px;">
                            <div class="spinner-border text-danger" role="status">
                                <span class="sr-only" style="display: none;">Loading...</span>
                            </div>
                        </div>
                        <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            const form = document.querySelector('form[action="register.php"]');
                            const loader = document.getElementById("creativeLoader");
                             if (form) {
                                form.addEventListener("submit", function(event) {
                                    loader.style.display = "block";
                                });
                            }
                        });
                        </script>
                </div>

                <!--PHP code to insert data into the database-->
                <?php
                // Load PHPMailer
                require 'vendor/autoload.php';

                use PHPMailer\PHPMailer\PHPMailer;
                use PHPMailer\PHPMailer\Exception;


                if (isset($_POST['register'])) {
                    // User inputs
                    $full_name = $_POST['full_name'];
                    $email = $_POST['email'];
                    $password = $_POST['password_hash']; // Store plain password for email
                    $password_hash = password_hash($password, PASSWORD_DEFAULT);
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];
                    $university = $_POST['university'];
                    $department = $_POST['department'];

                    // Check if email exists
                    $query = "SELECT * FROM users WHERE email = '$email'";
                    $result = mysqli_query($con, $query);

                    if (mysqli_num_rows($result) > 0) {
                        echo "<div style='position: absolute; top: 0; right: 0;' class='alert alert-danger alert-dismissible fade show' role='alert'>Registration failed, Email already exists.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                    } else {
                        // Insert user into the database
                        $query = "INSERT INTO users (full_name, email, password_hash, phone, address, university, department) 
                        VALUES ('$full_name', '$email', '$password_hash', '$phone', '$address', '$university', '$department')";

                        if (mysqli_query($con, $query)) {
                            // Send confirmation email
                            sendEmail($email, $password);
                            echo "<div style='position: absolute; top: 0; right: 0;' class='alert alert-success alert-dismissible fade show' role='alert'>Registration Successful! Please <a href='login.php' class='alert-link'>Login here</a>.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                            echo "<script>setTimeout(\"location.href = 'login.php';\", 1000);</script>";
                        } else {
                            echo "<div style='position: absolute; top: 0; right: 0;' class='alert alert-danger alert-dismissible fade show' role='alert'>Registration failed.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                        }
                    }
                }

                //Function to send email
                function sendEmail($toEmail, $password)
                {
                    $mail = new PHPMailer(true);

                    try {
                        // SMTP Configuration
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->Username = 'testweblanka@gmail.com';  // Your Gmail ID
                        $mail->Password = 'xpix hyjd htlj rbei';  // Use App Password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                        $mail->Port = 587;

                        // Email settings
                        $mail->setFrom('testweblanka@gmail.com', 'RASAS');
                        $mail->addAddress($toEmail);
                        $mail->Subject = 'Registration Successful';
                        $mail->isHTML(true);

                        // Email body
                        $mail->Body = "
                                        <html>
                                        <body style='font-family: Arial, sans-serif; background-color: #f4f4f4; text-align: center; padding: 20px;'>
                                            <div style='background-color: white; padding: 20px; border-radius: 10px; max-width: 500px; margin: auto; box-shadow: 0 4px 8px rgba(0,0,0,0.1);'>
                                                <h2 style='color:rgb(205, 36, 36);'> Welcome!</h2>
                                                <p>Your registration was successful.</p>
                                                
                                                <div style='background: #f9f9f9; padding: 10px; border-radius: 8px; margin: 20px 0; border: 1px solid #ddd;'>
                                                    <p><b>Email:</b> $toEmail</p>
                                                    <p><b>Password:</b> $password</p>
                                                </div>

                                                <p>You can now <a href='../login.php' style='background-color: #28a745; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Log in</a> to your account.</p>
                                                
                                                <p><b>🔒 Please keep your credentials safe.</b></p>
                                                
                                                <p style='margin-top: 5px; font-size: 14px; color: #555;'>
                                                    <b>Regards,</b><br>
                                                    <b>Ruhuna Arts Student's Annual Sessions - University of Ruhuna</b>
                                                </p>
                                            </div>
                                        </body>
                                        </html>
                                    ";

                        $mail->send();
                    } catch (Exception $e) {
                        echo "Email sending failed: {$mail->ErrorInfo}";
                    }
                }
                ?>
                </form>

                </fieldset>
            </div>
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

        // password validation
        const passwordInput = document.getElementById('password_hash');
        const rePasswordInput = document.getElementById('re-password');
        const passwordError = document.getElementById('passwordError');
        const rePasswordError = document.getElementById('re_passwordError');

        rePasswordInput.addEventListener('input', () => {
            if (passwordInput.value !== rePasswordInput.value) {
                rePasswordError.textContent = 'Password does not Matched';
                rePasswordError.style.color = 'red';
            } else {
                rePasswordError.textContent = 'Password Matched';
                rePasswordError.style.color = 'green';
            }
        });

        passwordInput.addEventListener('input', () => {
            if (passwordInput.value.length >= 8) {
                passwordError.textContent = 'Password is Strong';
                passwordError.style.color = 'green';
            } else {
                passwordError.textContent = 'Password is Weak';
                passwordError.style.color = 'red';
            }
        });

        //if password is not same as re-enter password and password length is less than 8, then disable the submit button
        const submitButton = document.querySelector('button[type="submit"]');
        rePasswordInput.addEventListener('input', () => {
            if (passwordInput.value !== rePasswordInput.value || passwordInput.value.length < 8) {
                submitButton.disabled = true;
            } else {
                submitButton.disabled = false;
            }
        });

    </script>
    </section>
</body>

</html>