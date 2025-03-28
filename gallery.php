<?php
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery | Ruhuna Arts Student's Annual Sessions</title>
    <meta name="keywords" content="RASAS, Ruhuna Arts Student's Annual Sessions, University of Ruhuna, Humanities and Social Sciences">
    <meta name="description" content="Organizes its first student sessions with the aim of creating a platform for the budding researchers in the field of Humanities and Social Sciences">
    <link rel="icon" href="asserts/images/hss.png" type="image/x-icon">
    <link rel="shortcut icon" href="asserts/images/hss_logo.png" type="image/x-icon">
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
        .actived {
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
                height: 100px;
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
                width: 205% !important;
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
                height: max-content;
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
                <a href="./sub_details.php">Submission Details</a>
                <a href="./program.php">Program</a>
                <a href="./gallery.php" class="actived">Gallery</a>
                <a href="./contactus.php">Contact Us</a>
                <a href="./register.php" class="register">Register</a>
                <a href="./login.php" class="register">Log in</a>
            </nav>
        </div>
        <!--main content-->
        <div class="main">
            <div class="box shadow"
                style="display: flex; justify-content: center; align-items: center; width: 100%;height: max-content; padding: 3%;">
                <div class="topic" style="text-align: center;">
                    <p class="main-topic" style="font-size: 40px; font-weight: bold; color: white;">
                        Ruhuna Arts Student's Annual Session - <?php echo date('Y'); ?>
                    </p>
                    <br>
                    <h1 class="sub-topic" style="font-size: 50px; font-weight: bold; color: white;">
                        Gallery
                        <hr style="border: 1px;">
                    </h1>
                </div>
            </div>
            <br>
            <div class="container">
                <div class="row">
                    <?php
                    $sql = "SELECT * FROM event ORDER BY event_date DESC LIMIT 1";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($result);

                    $session = 8;
                    $year = 2024;
                    $event_date = date('Y', strtotime($row['event_date']));
                    if ($event_date != $year) {
                        $session = $session + ($event_date - $year);
                    }
                    ?>

                    <p class="text-center m-lg-4 border border-info fw-bold">The Faculty of Humanities and Social
                        Sciences organized the <?php echo "$session".'<sup>th</sup>' ?> Ruhuna Arts Students' Annual
                        Sessions (RASAS <?php echo date('Y'); ?>) on <?php echo date('F jS, Y', strtotime($row['event_date'])); ?> to enhance the explorative and analytical skills of its
                        sprouting scholars.</p>
                </div>
            </div>

            <?php
            $sql = "SELECT media_url FROM gallery;";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);
            ?>
            <div class="gallery">
                <div class="container">
                    <div Class="row">
                        <div class="col-md-12">
                            <div id="carouselExampleAutoplaying" class="carousel slide border border-2 border-black"
                                data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <?php
                                    $sql = "SELECT media_url FROM gallery WHERE media_url IS NOT NULL;";
                                    $result = mysqli_query($con, $sql);
                                    $i = 0;
                                    while ($row = mysqli_fetch_array($result)) {
                                        if ($i == 0) {
                                            echo '<div class="carousel-item active">';
                                        } else {
                                            echo '<div class="carousel-item">';
                                        }
                                    ?>
                                        <img src="./Dashboard/gallery/<?php echo $row['media_url']; ?>" class="d-block w-100" alt="..."
                                            style="width: 800px; height: 300px;">
                                    </div>
                                    <?php
                                        $i++;
                                    }
                                    ?>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                        <br>
                    <?php
                    $sql = "SELECT media_url FROM gallery LIMIT 20;";
                    $result = mysqli_query($con, $sql);

                    echo '<div class="row">';
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<div class="col-md-4 mb-3">
                                <div class="card border border-light">
                                    <img src="./Dashboard/gallery/' . $row['media_url'] . '" 
                                        class="card-img-top" 
                                        alt="Gallery Image" 
                                        style="width: 100%; height: 250px; object-fit: contain; background-color: #f8f9fa;" 
                                        onClick="openModal(${row.media_url});currentSlide()">
                                </div>
                            </div>';
                    }
                    echo '</div>';
                    ?>
                </div>

            </div>


        </div>

        </div>

        <footer>
                <p>&copy; <?php echo date('Y'); ?> Ruhuna Arts Student's Annual Sessions. All rights reserved.</p>
        </footer>

    </section>

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