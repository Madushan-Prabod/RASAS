<?php
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Ruhuna Arts Student's Annual Sessions - <?php echo date('Y'); ?> </title>
    <meta name="keywords" content="RASAS, Ruhuna Arts Student's Annual Sessions, University of Ruhuna, Humanities and Social Sciences">
    <meta name="description" content="Organizes its first student sessions with the aim of creating a platform for the budding researchers in the field of Humanities and Social Sciences">
    <link rel="icon" href="asserts/images/hss.png" type="image/x-icon">
    <link rel="stylesheet" href="asserts/css/bootstrap.css">
    <link rel="stylesheet" href="asserts/css/main.css">
    <!-- <link rel="stylesheet" href="asserts/css/mdb.min.css"> -->
    <script src="asserts/js/bootstrap.js"></script>
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

        /*Active Class*/
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

        body {
            background-color: #fcfcfc;
        }

        /* Hamburger Menu */
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
            /* Initial color */
            border-radius: 5px;
            transition: transform 0.3s, opacity 0.3s, background-color 0.3s;
        }

        /* Responsive Design */
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
                height: 550px;
            }

            .hamburger span {
                width: 25px;
                height: 3px;
                background-color: #A52A2A;
                /* Change this color */
                border-radius: 5px;
                transition: background-color 0.3s;
                font-weight: bolder;
            }

            .hamburger.open span {
                background-color: #800020;
                /* Example green color for open state */
            }

            /* Close Button Animation */
            .hamburger.open span:nth-child(1) {
                transform: rotate(45deg) translate(5px, 5px);
            }

            .hamburger.open span:nth-child(2) {
                opacity: 0;
            }

            .hamburger.open span:nth-child(3) {
                transform: rotate(-55deg) translate(5px, -5px);
            }

            footer .footer-content p {
                text-align: center;
                align-items: center;
                height: 50px;
                background-color: #800020;
                color: white;
            }

            .box {
            width: 100%;
            height: max-content;
            background-color: #A52A2A;
        }

        .topic {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .main-topic {
            color: white;
            font-weight: bold;
            font-size: 40px;
            text-align: center;
            justify-self: center;
            margin: 50px;
        }

        .sub-topic {
            color: white;
            font-weight: bold;
            font-size: 50px;
            text-align: center;
            justify-self: center;
            font-family: Arial, Helvetica, sans-serif !important;
        }

        hr {
            width: 130% !important;
            background-color: #FFBA00;
            height: 5px;
            display: block;
            justify-self: center;
            opacity: 0.9;
            border: none;
            margin-top: 15px;
        }

        .group {
            margin-top: 25px;
            margin-bottom: 10px;
        }

        .box{
            height: fit-content;
        }

        .main-topic {
            font-size: 30px !important;
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

            .footer {
                width: 100%;
                position: relative !important;
                overflow: hidden;
                margin-bottom: 10px !important;

                
            }
            footer .footer-content {
                    
                    justify-content: center;
                    align-items: center;
                    
                    background-color: #800020;
                    color: white;
                }
        }


        
    </style>
</head>

<body>
    <section class="layout">
        <!--navigation with logo-->
        <div class="col-md-12 header sticky-md-top">
            <img src="asserts/images/rasas_logo.png" alt="RASAS Logo" class="logo"
                title="Ruhuna Arts Student's Annual Sessions">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <nav class="nav">
                <a href="./home.php">Home</a>
                <a href="./con_team.php">Conference Team</a>
                <a href="./sub_details.php">Submission Details</a>
                <a href="./program.php">Program</a>
                <a href="./gallery.php">Gallery</a>
                <a href="./contactus.php" class="active">Contact Us</a>
                <a href="./register.php" class="register">Register</a>
                <a href="./login.php" class="register">Log in</a>
            </nav>
        </div>
        <!--main content-->
        <div class="main">
        <div class="box shadow" style="display: flex; justify-content: center; align-items: center; width: 100%; height: max-content; padding: 3%;">
                <div class="topic" style="text-align: center;">
                    <p class="main-topic" style="font-size: 40px; font-weight: bold; color: white;">
                        Ruhuna Arts Student's Annual Session - <?php echo date('Y'); ?>
                    </p>
                    <br>
                    <h1 class="sub-topic" style="font-weight: bold; color: white; font-size: 50px;">
                        Contact Us
                        <hr style="border: 1px;">
                    </h1>
                </div>
            </div>
            <div class="container " style="padding: 10px; margin-top: 5%;">
            <p class="text-center display-4">Contact Information</>
                <div class="row justify-content-center shadow">
                    <div class="col-md-8"></div>
                    
                        <div class="contact-box transition-all" style="background-color: #A52A2A; border-radius: 10px; padding: 30px; color: white;">
                            
                            <div class="row">

                                <!-- Secetrery -->
                                <?php
                                $sql = 'SELECT * FROM contact_us WHERE contact_id = 2 AND role = "Secretary"';
                                $result = mysqli_query($con, $sql);
                                $row = mysqli_fetch_array($result);
                                ?>
                                <div class="col-md-4 text-center mb-4 border border-warning rounded shadow-lg transition-all" 
                                    style="padding: 10px; gap: 20px;" 
                                    onmouseover="this.style.transform = 'translateY(-10px)'" 
                                    onmouseout="this.style.transform = 'translateY(0px)'" >
                                    <img src="./Dashboard/profile_pic_contact/<?php echo $row['user_pic']; ?>" alt="Secretary photo" 
                                        style="max-width: 200px; height: 200px;" 
                                        title=<?php echo $row['role']; ?>>
                                        <p class="fs-4 text-warning"><?php echo $row['role']; ?></p>
                                        <p><?php echo $row['name']; ?></p>
                                        <p><?php echo $row['department']; ?></p>
                                        <p>Tel: <a href="tel:+94<?php echo $row['phone_number']; ?>" style="color: white; text-decoration: none;">+94 <?php echo $row['phone_number']; ?></a></p>
                                        <p>Email: <a href="mailto:<?php echo $row['email']; ?>" style="color: white; text-decoration: none;"><?php echo $row['email']; ?></a></p>
                                </div>


                                <!-- Chairperson -->
                                <?php
                                $sql = 'SELECT * FROM contact_us WHERE contact_id = 1 AND role = "Chairperson"';
                                $result = mysqli_query($con, $sql);
                                $row = mysqli_fetch_array($result);
                                ?>

                                <div class="col-md-4 text-center mb-4 border border-warning rounded shadow-lg transition-all" 
                                    style="padding: 10px; gap: 20px; background-color: #A52A2A;" 
                                    onmouseover="this.style.transform = 'translateY(-10px)'" 
                                    onmouseout="this.style.transform = 'translateY(0px)'" >
                                    <img src="./Dashboard/profile_pic_contact/<?php echo $row['user_pic']; ?>" alt="Chairperson photo" 
                                        style="max-width: 200px; height: 200px;" 
                                        title=<?php echo $row['role']; ?>>
                                        <p class="fs-4 text-warning"><?php echo $row['role']; ?></p>
                                        <p><?php echo $row['name']; ?></p>
                                        <p><?php echo $row['department']; ?></p>
                                        <p>Tel: <a href="tel:+94<?php echo $row['phone_number']; ?>" style="color: white; text-decoration: none;">+94 <?php echo $row['phone_number']; ?></a></p>
                                        <p>Email: <a href="mailto:<?php echo $row['email']; ?>" style="color: white; text-decoration: none;"><?php echo $row['email']; ?></a></p>
                                </div>

                                
                                <!-- Treasurer -->
                                <?php
                                $sql = 'SELECT * FROM contact_us WHERE contact_id = 3 AND role = "Treasurer"';
                                $result = mysqli_query($con, $sql);
                                $row = mysqli_fetch_array($result);
                                ?>
                                <div class="col-md-4 text-center mb-4 border border-warning rounded shadow-lg transition-all" 
                                    style="padding: 10px; gap: 20px;" 
                                    onmouseover="this.style.transform = 'translateY(-10px)'" 
                                    onmouseout="this.style.transform = 'translateY(0px)'" >
                                    <img src="./Dashboard/profile_pic_contact/<?php echo $row['user_pic']; ?>" alt="Treasurer photo" 
                                        style="max-width: 200px; height: 220px;" 
                                        title=<?php echo $row['role']; ?>>
                                        <p class="fs-4 text-warning"><?php echo $row['role']; ?></p>
                                        <p><?php echo $row['name']; ?></p>
                                        <p><?php echo $row['department']; ?></p>
                                        <p>Tel: <a href="tel:+94<?php echo $row['phone_number']; ?>" style="color: white; text-decoration: none;">+94 <?php echo $row['phone_number']; ?></a></p>
                                        <p>Email: <a href="mailto:<?php echo $row['email']; ?>" style="color: white; text-decoration: none;"><?php echo $row['email']; ?></a></p>
                                </div>
                            </div>


                            <div class="contact-info">
                                <p class="text-center mb-4">
                                    If you have any questions or concerns, please don't hesitate to contact us. 
                                    We would be happy to assist you.
                                </p>
                                
                                <!-- general contact details -->
                                <?php
                                $sql = 'SELECT email FROM event WHERE event_date = (SELECT MAX(event_date) FROM event)';
                                $result = mysqli_query($con, $sql);
                                $row = mysqli_fetch_array($result);
                                ?>
                                <div class="contact-details text-center">
                                    <p class="mb-3">You can reach us at:</p>
                                    <p class="mb-3">
                                        Email: <a href="mailto:<?php echo $row['email']; ?>" style="color: #FFBA00; text-decoration: none;" target="_blank"><?php echo $row['email']; ?></a>
                                    </p>
                                    <p class="mb-3">
                                        Web: <a href="https://hss.ruh.ac.lk/rasas/RASAS2024/" style="color: #FFBA00; text-decoration: none;" target="_blank">https://hss.ruh.ac.lk/rasas/RASAS2024/</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div></p>
        </div>
</section>
        <footer
            <p> &copy; <?php echo date('Y'); ?> Ruhuna Arts Student's Annual Sessions. All rights reserved.</p>    
        </footer>

    

    <!-- JavaScript -->
    <script>
        const hamburger = document.querySelector('.hamburger');
        const nav = document.querySelector('.nav');

        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('open'); // Toggles the "open" class on the hamburger
            nav.classList.toggle('active');    // Toggles the visibility of the navigation menu
        });

    </script>
</body>

</html>