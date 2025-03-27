<?php
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program | Ruhuna Arts Student's Annual Sessions - <?php echo date('Y'); ?> </title>
    <meta name="keywords"
        content="RASAS, Ruhuna Arts Student's Annual Sessions, University of Ruhuna, Humanities and Social Sciences">
    <meta name="description"
        content="Organizes its first student sessions with the aim of creating a platform for the budding researchers in the field of Humanities and Social Sciences">
    <link rel="icon" href="asserts/images/hss.png" type="image/x-icon">
    <link rel="stylesheet" href="asserts/css/bootstrap.css">
    <link rel="stylesheet" href="asserts/css/main.css">
    <link rel="stylesheet" href="asserts/css/mdb.min.css">
    <script src="asserts/js/bootstrap.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="asserts/css/timeline.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="asserts/js/timeline.js"></script>
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

        /* Timeline Base */
        .timeline {
            position: relative;
            max-width: 900px;
            margin: 0px auto;
            padding: 20px;
        }

        /* Vertical Line */
        .timeline::before {
            content: "";
            position: absolute;
            left: 50%;
            width: 4px;
            height: 100%;
            background: #ddd;
            transform: translateX(-50%);
        }

        /* Timeline Item */
        .timeline-item {
            position: relative;
            width: 70%;
            padding: 3px;
            display: flex;
            align-items: center;
        }

        /* Left Side */
        .timeline-item.left {
            left: 0;
            justify-content: flex-end;
        }

        /* Right Side */
        .timeline-item.right {
            left: 30%;
        }

        /* Timeline Box */
        .timeline-box {
            background: #fff;
            padding: 15%;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            width: 120%;
            transition: transform 0.3s ease-in-out;
        }

        .timeline-text {
            color: #333;
            font-size: 16px;
            line-height: 1.6;
        }

        /* Timeline Circle */
        .timeline-circle {
            position: absolute;
            top: 50%;
            left: calc(100% + 15px);
            transform: translateY(-50%);
            background: #ff5722;
            color: white;
            padding: 10px 15px;
            border-radius: 50%;
            font-size: 14px;
            font-weight: bold;
        }

        /* Left Side Circle */
        .timeline-item.left .timeline-circle {
            left: auto;
            right: calc(100% -15px);
        }

        /* Hover Effect */
        .timeline-item:hover .timeline-box {
            transform: scale(1.05);
            background: #ffeb3b;
        }

        /* Responsive Styles */
        @media screen and (max-width: 768px) {
            .timeline::before {
                left: 20px;
            }

            .timeline-item {
                width: 100%;
                padding-left: 40px;
            }

            .timeline-item.right {
                left: 0;
            }

            .timeline-circle {
                left: -30px !important;
            }
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

            .box {
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
                <a href="./program.php" class="active">Program</a>
                <a href="./gallery.php">Gallery</a>
                <a href="./contactus.php">Contact Us</a>
                <a href="./register.php" class="register">Register</a>
                <a href="./login.php" class="register">Log in</a>
            </nav>
        </div>
        <!--main content-->
        <div class="main">
            <div class="box shadow"
                style="display: flex; justify-content: center; align-items: center; width: 100%; height: max-content; padding: 3%;">
                <div class="topic" style="text-align: center;">
                    <p class="main-topic" style="font-size: 40px; font-weight: bold; color: white;">
                        Ruhuna Arts Student's Annual Session - <?php echo date('Y'); ?>
                    </p>
                    <br>
                    <h1 class="sub-topic" style="font-weight: bold; color: white; font-size: 50px;">
                        Program
                        <hr style="border: 1px solid #FFBA00; height: 5px; opacity: 100%;">
                    </h1>
                </div>
            </div>

            <div class="container " style="padding: 10px; margin-top: 5%;">
                <p class="text-center display-4">Conference Schedule</>
                <div class="row justify-content-center shadow">
                    <div class="col-md-8"></div>

                    <div class="contact-box transition-all"
                        style="background-color: #A52A2A; border-radius: 10px; padding: 30px; color: white;">
                        <div class="container py-5">

                            <!-- Timeline Container -->
                            <div class="timeline-container">
                                <!-- Central Line -->
                                <div class="timeline-line"></div>

                                <!-- Timeline Items -->
                                <?php
                                $sql = "SELECT * FROM program";
                                $result = $con->query($sql);
                                $programs = $result->fetch_all(MYSQLI_ASSOC);
                                ?>

                                <div class="timeline">
                                    <?php foreach ($programs as $index => $program):
                                        if (!empty($program['title'])): ?>
                                            <div class="timeline-item <?php echo $index % 2 == 0 ? 'left' : 'right'; ?>">
                                                <div class="timeline-content">
                                                    <div class="timeline-circle">
                                                        <span><?php echo date("h:i A", strtotime($program['start_time'])); ?></span>
                                                    </div>
                                                    <div class="timeline-box">
                                                        <h3 class="timeline-title"><?php echo $program['title']; ?></h3>
                                                        <p class="timeline-text"><?php echo $program['description']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </p>
        </div>
    </section>
    <footer>
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