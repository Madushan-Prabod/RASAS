<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conference Team | Ruhuna Arts Student's Annual Sessions</title>
    <meta name="keywords" content="RASAS, Ruhuna Arts Student's Annual Sessions, University of Ruhuna, Humanities and Social Sciences">
    <meta name="description" content="Organizes its first student sessions with the aim of creating a platform for the budding researchers in the field of Humanities and Social Sciences">
    <link rel="icon" href="asserts/images/hss.png" type="image/x-icon">
    <link rel="stylesheet" href="asserts/css/bootstrap.css">
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

        .footer {
            grid-area: 3 / 1 / -1 / -1;
            margin-bottom: 0;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            background: white;
            color: white;
            position: relative;
            z-index: 10;

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
            transition: color 0.3s;
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

        

        .box {
            width: 100%;
            height: 300px;
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
            font-family : Arial, Helvetica, sans-serif !important;
        }

        hr {
            width: 92%;
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

        .register:hover {
            background-color: #e76f51;
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

        footer{
            background-color: #800020;
            color: white;
            height: 50px;
            text-align: center;
        }

        .line{
            border-bottom: 5px solid #FFBA00; 
            width: 160%; 
            margin: 0 0 0 -30%;
           
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

            .line{
                width: 93% !important;
                margin: 0 auto !important;
            }

            hr{
                width: 92% !important;
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
                height: max-content;
            }

            .main-topic {
                font-size: 30px;
            }

            .hr_main{
                width: 180% !important;
                position: relative;
                right: 40% !important;
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
                width: 100% !important;
            }

            .hr_main{
                width: 180% !important;
                position: relative;
                right: 40% !important;
            }

            .footer {
                width: 100%;
                position: relative !important;
                overflow: hidden;
                margin-bottom: 10px !important;
                background-color: #800020;
                color: white;
                
            }
            footer .footer-content {
                    
                    justify-content: center;
                    align-items: center;
                    height: 50px;
                }
        }
    </style>
</head>

<bod>
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
                <a href="./home.php">Home</a>
                <a href="./con_team.php" class="active">Conference Team</a>
                <a href="./sub_details.php">Submission Details</a>
                <a href="./program.php">Program</a>
                <a href="./gallery.php">Gallery</a>
                <a href="./contactus.php">Contact Us</a>
                <a href="./register.php" class="register">Register</a>
                <a href="./login.php" class="register">Log in</a>
            </nav>
        </div>
        <?php
        $sql = "SELECT * FROM conference_team";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        ?>
        <div class="main">
            <div class="col-md-12 box shadow" style="display: flex; justify-content: center; align-items: center;">
                <div class="topic">
                    <p class="main-topic">
                        Ruhuna Arts Student's Annual Session - <?php echo date('Y'); ?>
                    </p>
                    <br>
                    <h1 class="sub-topic" style="font-weight: bold; color: white; font-size: 50px; margin-bottom: 2%;">
                        Conference Team
                        <div class="line"></div>
                    </h1>
                </div>
            </div>

            <div>
                <div class="container group">
                    <div class="row text-center">
                        <h1 class="display-4">Advisory Board</h1>
                    </div>
                    <div class="row row-cols-1 row-cols-md-3 g-4" style="margin-top: 10px;">
                        <?php
                        $sql = "SELECT * FROM conference_team WHERE team_id = 1";
                        $result = $con->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <div class="col">
                                <div class="card align-content-center" style=" padding-top: 3%; width: 100%; height: 100%;">
                                    <center>
                                        <img src="./Dashboard/profile_pic_contact/<?php echo $row['con_image']; ?>"
                                            class="card-img-top" alt="..."
                                            style="width: fit-content; height: 100px; padding: 5px; border: 1px solid #800020; border-radius: 0;">
                                    </center>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                        <p class="card-text"><?php echo $row['description']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <hr>

            <!--2nd group-->
            <div class="container group">
                <div class="row text-center">
                    <h1 class="display-4 ">Organizing Committee</h1>
                </div>
                <div class="row row-cols-1 row-cols-md-3 g-4" style="margin-top: 10px;">
                    <?php
                    $sql = "SELECT * FROM conference_team WHERE team_id = 2";
                    $result = $con->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        if (!empty($row['name'])) {
                            ?>
                            <div class="col">
                                <div class="card align-content-center" style="padding-top: 3%; width: 100%; height: 100%;">
                                    <center>
                                        <img src="./Dashboard/profile_pic_contact/<?php echo $row['con_image']; ?>"
                                            class="card-img-top" alt="..."
                                            style="width: fit-content; height: 100px; padding: 5px; border: 1px solid #800020; border-radius: 0;">
                                    </center>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                        <p class="card-text"><?php echo $row['role']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <hr>

            <!--3rd group-->
            <div class="container group">
                <div class="row text-center">
                    <h1 class="display-4 ">Editorial Board</h1>
                </div>
                <div class="row row-cols-1 row-cols-md-3 g-4" style="margin-top: 10px;">
                    <?php
                    $sql = "SELECT * FROM conference_team WHERE team_id = 3";
                    $result = $con->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        if (!empty($row['name'])) {
                            ?>
                            <div class="col">
                                <div class="card align-content-center" style="padding-top: 3%; width: 100%; height: 100%;">
                                    <center>
                                        <img src="./Dashboard/profile_pic_contact/<?php echo $row['con_image']; ?>"
                                            class="card-img-top" alt="..."
                                            style="width: fit-content; height: 100px; padding: 5px; border: 1px solid #800020; border-radius: 0;">
                                    </center>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                        <?php
                                        if ($row['role'] == 'Chief Editor') {
                                            echo '<p class="card-text">' . $row['role'] . '</p>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <hr>

            <!-- Ceremonial Committee -->
            <div class="container group">
                <div class="row text-center">
                    <h1 class="display-4 ">Ceremonial Committee</h1>
                </div>
                <div class="row row-cols-1 row-cols-md-3 g-4" style="margin-top: 10px;">
                    <?php
                    $sql = "SELECT * FROM conference_team WHERE team_id = 4";
                    $result = $con->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="col">
                            <div class="card align-content-center" style="padding-top: 3%; width: 100%; height: 100%;">
                                <center>
                                    <img src="./Dashboard/profile_pic_contact/<?php echo $row['con_image']; ?>"
                                        class="card-img-top" alt="..."
                                        style="width: fit-content; height: 100px; padding: 5px; border: 1px solid #800020; border-radius: 0;">
                                </center>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                    <?php
                                    if ($row['role'] == 'Chairman') {
                                        echo '<p class="card-text">' . $row['role'] . '</p>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <hr>
            <!-- Food and Accommodation Committee -->
            <div class="container group">
                <div class="row text-center">
                    <h1 class="display-4 "> Food and Accommodation Committee</h1>
                </div>
                <div class="row row-cols-1 row-cols-md-3 g-4" style="margin-top: 10px;">
                    <?php
                    $sql = "SELECT * FROM conference_team WHERE team_id = 5";
                    $result = $con->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="col">
                            <div class="card align-content-center" style="padding-top: 3%; width: 100%; height: 100%;">
                                <center>
                                    <img src="./Dashboard/profile_pic_contact/<?php echo $row['con_image']; ?>"
                                        class="card-img-top" alt="..."
                                        style="width: fit-content; height: 100px; padding: 5px; border: 1px solid #800020; border-radius: 0;">
                                </center>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                    <?php
                                    if ($row['role'] == 'Chairman') {
                                        echo '<p class="card-text">' . $row['role'] . '</p>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <hr>
            <!-- Session Organizing Committee -->
            <div class="container group">
                <div class="row text-center">
                    <h1 class="display-4 ">Sessions Organizing Committee</h1>
                </div>
                <div class="row row-cols-1 row-cols-md-3 g-4" style="margin-top: 10px;">
                    <?php
                    $sql = "SELECT * FROM conference_team WHERE team_id = 6";
                    $result = $con->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="col">
                            <div class="card align-content-center" style="padding-top: 3%; width: 100%; height: 100%;">
                                <center>
                                    <img src="./Dashboard/profile_pic_contact/<?php echo $row['con_image']; ?>"
                                        class="card-img-top" alt="..."
                                        style="width: fit-content; height: 100px; padding: 5px; border: 1px solid #800020; border-radius: 0;">
                                </center>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                    <?php
                                    if ($row['role'] == 'Chairman') {
                                        echo '<p class="card-text">' . $row['role'] . '</p>';
                                    } ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <hr>

            <!--publicity committee-->
            <div class="container group">
                <div class="row text-center">
                    <h1 class="display-4 ">Publicity Committee</h1>
                </div>
                <div class="row row-cols-1 row-cols-md-3 g-4" style="padding-top: 3%; ">
                    <?php
                    $sql = "SELECT * FROM conference_team WHERE team_id = 7";
                    $result = $con->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="col">
                            <div class="card align-content-center" style="padding-top: 3%; width: 100%; height: 100%;">
                                <center>
                                    <img src="./Dashboard/profile_pic_contact/<?php echo $row['con_image']; ?>"
                                        class="card-img-top" alt="..."
                                        style="width: fit-content; height: 100px; padding: 5px; border: 1px solid #800020; border-radius: 0;">
                                </center>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                    <?php
                                    if ($row['role'] == 'Chairman') {
                                        echo '<p class="card-text">' . $row['role'] . '</p>';
                                    } ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>

        </div>

        <!--footer-->
    <div class="row">
        <div class="footer" style="background-color: #800020; color: white;">
            <div class="footer-content text-center" style="position: relative; z-index: 30;">
                <p>&copy; <?php echo date('Y'); ?> Ruhuna Arts Student's Annual Sessions. All rights reserved.</p>
            </div>
        </foot>
    </div>
    </section>



    <!--javascript-->
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