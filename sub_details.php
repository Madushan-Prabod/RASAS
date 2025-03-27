<?php
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission Details | Ruhuna Arts Student's Annual Sessions - <?php echo date('Y'); ?> </title>
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

        hr {
            width: 80%;
            background-color: #FFBA00;
            height: 5px;
            display: block;
            justify-self: center;
            opacity: 0.9;
            border: none;
            margin-top: 15px;
        }

        .box {
            padding: 3%;
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
                font-family : Arial, Helvetica, sans-serif;

            }

            hr {
                width: 92% !important;
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
                <a href="./sub_details.php" class="active">Submission Details</a>
                <a href="./program.php">Program</a>
                <a href="./gallery.php">Gallery</a>
                <a href="./contactus.php">Contact Us</a>
                <a href="./register.php" class="register">Register</a>
                <a href="./login.php" class="register">Log in</a>
            </nav>
        </div>
        <!--main content-->
        <div class="main">
            <div class="box shadow main-box"
                style="display: flex; justify-content: center; align-items: center; width: 100%; height: max-content;">
                <div class="topic" style="text-align: center;">
                    <p class="main-topic" style="font-size: 40px; font-weight: bold; color: white;">
                        Ruhuna Arts Student's Annual Session - <?php echo date('Y'); ?>
                    </p>
                    <br>
                    <h1 class="sub-topic" style="font-weight: bolder !important; color: white; font-size: 50px;">
                        Submission Details
                        <hr style="border: 1px;">
                    </h1>
                </div>

            </div>
            <div class="container" style="padding: 10px; margin-top: 5%;">
                <p class="text-center display-4">Submission Instructions</p>
                <div class="container" style="padding: 10px;">
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        <div class="col">
                            <div class="card border-light shadow-sm"
                                style="font-family: 'Lato', sans-serif; border-radius: 10px; background-color: #f8f9fa; font-size: 18px; height: 100%;">
                                <div class="card-header bg-danger text-white text-center"
                                    style="border-radius: 10px 10px 0 0; font-size: 20px; font-weight: bold; line-height: 1.2; background-color: #A52A2A !important;">
                                    <h5 class="mb-0" style="font-size: 20px; font-weight: bold;">Medium</h5>
                                </div>
                                <div class="card-body" style="padding: 20px;">
                                    <p class="card-text text-center text-muted"
                                        style="font-size: 18px; line-height: 1.5; color: #6c757d; font-style: italic;">
                                        Authors may submit Medium Extended Abstracts in either English or Sinhala, with
                                        the option to present their work in the chosen language.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border-light shadow-sm"
                                style="font-family: 'Lato', sans-serif; border-radius: 10px; background-color: #f8f9fa; font-size: 18px; height: 100%;">
                                <div class="card-header bg-primary text-white text-center"
                                    style="border-radius: 10px 10px 0 0; font-size: 20px; font-weight: bold; line-height: 1.2; background-color: #A52A2A !important;">
                                    <h5 class="mb-0" style="font-size: 20px; font-weight: bold;">For Whom</h5>
                                </div>
                                <div class="card-body" style="padding: 20px;">
                                    <p class="card-text text-center text-muted"
                                        style="font-size: 18px; line-height: 1.5; color: #6c757d; font-style: italic;">
                                        Undergraduate students of Sri Lankan Universities and Higher Education
                                        Institutions who are in the
                                        field of Humanities and Social Sciences can submit their extended abstracts.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border-light shadow-sm"
                                style="font-family: 'Lato', sans-serif; border-radius: 10px; background-color: #f8f9fa; font-size: 18px; height: 100%;">
                                <div class="card-header bg-primary text-white text-center"
                                    style="border-radius: 10px 10px 0 0; font-size: 20px; font-weight: bold; line-height: 1.2; background-color: #A52A2A !important;">
                                    <h5 class="mb-0" style="font-size: 20px; font-weight: bold;">General Instructions
                                    </h5>
                                </div>
                                <div class="card-body" style="padding: 20px;">
                                    <ul class="card-text text-muted "
                                        style="font-size: 18px; line-height: 1.5; color: #6c757d; font-style: italic;">
                                        <li>Paper should be in original source of personnel and should not be under
                                            consideration or should not have been
                                            considered for any other conference or publication.</li>
                                        <li>A soft copy of author's declaration should be enclosed with the extended
                                            abstract.</li>
                                        <li>Extended Abstract should be submitted to the following email. Email:
                                            rasas2024ruh@gmail.com</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border-light shadow-sm"
                                style="font-family: 'Lato', sans-serif; border-radius: 10px; background-color: #f8f9fa; font-size: 18px; height: 100%;">
                                <div class="card-header bg-primary text-white text-center"
                                    style="border-radius: 10px 10px 0 0; font-size: 20px; font-weight: bold; line-height: 1.2; background-color: #A52A2A !important;">
                                    <h5 class="mb-0" style="font-size: 20px; font-weight: bold;">Format of the Extended
                                        Abstracts</h5>
                                </div>
                                <div class="card-body" style="padding: 20px;">
                                    <p class="card-text text-center text-muted"
                                        style="font-size: 18px; line-height: 1.5; color: #6c757d; font-style: italic;">
                                        In order to publish the extended abstract in the proceedings of the Ruhuna Arts
                                        Student's Annual Sessions (RASAS) - <?php echo date('Y'); ?>, authors should
                                        submit the extended abstracts according to the prescribed format.
                                        <br><br>Extended Abstracts should include the Title, Affiliations, Abstract
                                        (with 5 keywords), Introduction, Literature Review, Research Methodology,
                                        Discussion, Conclusion/s, maximum of 5 most related references.
                                    </p>
                                    <br><br>
                                    <h5 class="text-center" style="font-size: 20px; font-weight: bold;">
                                        Fonts:
                                    </h5>
                                    <p class="card-text text-center text-muted"
                                        style="font-size: 18px; line-height: 1.5; color: #6c757d; font-style: italic; font-family: 'Times New Roman', serif;">
                                        English - Times New Roman (12)
                                    </p>
                                    <p class="card-text text-center text-muted"
                                        style="font-size: 18px; line-height: 1.5; color: #6c757d; font-style: italic; font-family: 'iskoola pota', serif;">
                                        සිංහල - Iskoola pota (12)
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border-light shadow-sm"
                                style="font-family: 'Lato', sans-serif; border-radius: 10px; background-color: #f8f9fa; font-size: 18px; height: 100%;">
                                <div class="card-header bg-primary text-white text-center"
                                    style="border-radius: 10px 10px 0 0; font-size: 20px; font-weight: bold; line-height: 1.2; background-color: #A52A2A !important;">
                                    <h5 class="mb-0" style="font-size: 20px; font-weight: bold;">Download Extended
                                        Abstract Templates</h5>
                                </div>
                                <div class="card-body" style="padding: 20px;">
                                    <p class="card-text text-center text-muted"
                                        style="font-size: 18px; line-height: 1.5; color: #6c757d; font-style: italic;">
                                        Authors can download the Extended Abstract Templates from the following links.
                                        Please
                                        note that the templates are available in both English and සිංහල.
                                    </p>
                                    <br><br>
                                    <a href="https://view.officeapps.live.com/op/view.aspx?src=https%3A%2F%2Fhss.ruh.ac.lk%2Frasas%2Frasas2024%2Fimages%2FRASAS%2520Extended%2520Abstract%2520-%2520English.docx&wdOrigin=BROWSELINK"
                                        class="btn btn-primary" target="_blank"
                                        style="font-size: 18px; font-weight: bold; background-color: #A52A2A; color: white; border-radius: 5px; padding: 10px; text-decoration: none;">English</a>
                                    <a href="https://view.officeapps.live.com/op/view.aspx?src=https%3A%2F%2Fhss.ruh.ac.lk%2Frasas%2Frasas2024%2Fimages%2FRASAS%2520Extended%2520Abstract%2520-%2520Sinhala.docx&wdOrigin=BROWSELINK"
                                        class="btn btn-primary" target="_blank"
                                        style="font-size: 18px; font-weight: bold; background-color: #A52A2A; color: white; border-radius: 5px; padding: 10px; text-decoration: none;">සිංහල</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </section>
    <footer>

        <p>&copy; <?php echo date('Y'); ?> Ruhuna Arts Student's Annual Sessions. All rights reserved.</p>

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