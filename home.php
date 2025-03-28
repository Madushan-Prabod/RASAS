<?php
include 'db.php';

$sql = "SELECT * FROM event order by event_id desc limit 1";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ruhuna Arts Student's Annual Sessions | RASAS-</title>
  <meta name="keywords" content="RASAS, Ruhuna Arts Student's Annual Sessions, University of Ruhuna, Humanities and Social Sciences">
  <meta name="description" content="Organizes its first student sessions with the aim of creating a platform for the budding researchers in the field of Humanities and Social Sciences">
  <link rel="icon" href="asserts/images/hss.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="asserts/css/main.css">
  <link rel="stylesheet" href="asserts/css/bootstrap.css">
  <link rel="stylesheet" href="asserts/css/mdb.min.css">
  <style>
    .layout {
      width: 100%;
      display: grid;
      grid:
        "header" 100px;
      gap: 8px;
    }

    .header {
      grid-area: header;
    }

    .footer {
      grid-area: footer;
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

    .logo-image {
      width: 250px;
      height: 350px;
    }

    

    .logo {
      width: 150px;
      height: auto;
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
      background: #FFBA00;
      color: #A52A2A;
      text-transform: uppercase;
      font-weight: bold;
      border: 1px solid black;
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

    /* Ensure the container spans the full screen width */
    .main-content-video {
      width: 100% !important;
      /* Full viewport width */
      height: 700px;
      overflow: hidden;
      /* Hide any overflowing parts of the video */
      margin: 0;
      padding: 0;
    }

    /* Style the video */
    .main-content-video {
      position: relative;
      margin-bottom: 2rem;
    }

    .main-content-video video {
      width: 100%;
      height: 510px;
      object-fit: cover;
      display: block;
    }

    .rasas-text {
      position: absolute;
      top: 18%;
      left: 30%;
      transform: translate(-50%, -50%);
      text-align: center;
      color: #fff;
      font-size: 45px;
      text-shadow: black;
      font-weight: 1000;
      font-family: 'Times New Roman', Times, serif;
      text-shadow: 3px 3px 3px black;
    }

    .rasas-text h1 {
      margin-bottom: 1rem;
    }

    .carousel-container {
      position: absolute;
      top: 16%;
      right: 5%;
      width: 510px;
      margin-left: 20px;
      border-radius: 10px;
    }

    .carousel {
      width: 100%;
      max-width: 500px;
      margin: 0 auto;
    }

    .carousel-item img {
      height: 300px;
      object-fit: cover;
      width: 100%;
    }

    .carousel-control-prev,
    .carousel-control-next {
      width: 10%;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
      background-color: black;
      border-radius: 50%;
      padding: 1rem;
    }

    .box {
      width: 200px;
      height: 100px;
      background-color: #A52A2A;
    }

    .registration-button {
      position: absolute;
      top: 55%;
      left: 29%;
      transform: translate(-50%, -50%);
      text-align: center;
      font-size: 24px;
      font-weight: bolder;
      font-family: Arial, Helvetica, sans-serif;
      background-color: none;
      color: black;
      padding: 1em 2em;
      border-radius: 4px;
      text-decoration: none;
      animation: popup 1s ease-in-out infinite alternate;

    }

    /* From Uiverse.io by vikiWayne */
    .button-submit {
      padding: 20px 40px;
      border: none;
      border-radius: 5px;
      font-weight: bold;
      letter-spacing: 5px;
      text-transform: uppercase;
      cursor: pointer;
      color: #A52A2A;
      transition: all 1000ms;
      font-size: 18px;
      position: relative;
      overflow: hidden;
      outline: 2px solid #800020;
    }

    .button-submit:hover {
      color: #FFBA00;
      transform: scale(1.1);
      outline: 2px solid #FFBA00;
      box-shadow: 4px 5px 17px -4px #800020;
    }

    .button-submit::before {
      content: "";
      position: absolute;
      left: -50px;
      top: 0;
      width: 0;
      height: 100%;
      background-color: #800020;
      transform: skewX(45deg);
      z-index: -1;
      transition: width 1000ms;
    }

    .button-submit:hover::before {
      width: 250%;
    }


    .glow {
      display: inline-block;
      padding: 10px 20px;
      font-size: 16px;
      text-align: center;
      text-decoration: none;
      color: black;
      background-color: #FFBA00;
      border-radius: 5px;
      box-shadow: 0 0 20px #FFC300;
      transition: box-shadow 0.3s;
    }

    .glow:hover {
      box-shadow: 0 0 20px #800020;
    }

    .location-date .date {
      position: absolute;
      top: 40%;
      left: 15%;
      transform: translate(-50%, -50%);
      text-align: center;
      color: #fff;
      font-size: 20px;
      font-weight: bolder;
      font-family: Arial, Helvetica, sans-serif;
      gap: 20px;
      cursor: progress;

    }

    .location-date .location {
      position: absolute;
      top: 42%;
      left: 43%;
      transform: translate(-50%, -50%);
      text-align: center;
      color: #fff;
      font-size: 18px;
      font-weight: bolder;
      font-family: Arial, Helvetica, sans-serif;
      gap: 20px;
      cursor: pointer;
    }

    .location-icon,
    .date-icon {
      margin-right: 5px;
      width: 40px;
      height: 40px;


    }

    .about-rasas {
      display: flex;
      position: relative;
      justify-content: center;
      text-align: justify;
      padding: 4rem 2rem;
      background-color: #f4f4f4;
      bottom: 190px;
      border-radius: 2px;
      box-shadow: 4px 4px 4px 4px gainsboro;
      font-size: 14px;

    }

    hr {
      width: 100%;
      background-color: #FFBA00;
      height: 5px;
      display: block;
      justify-self: center;
      opacity: 0.9;
      border: none;
      margin-top: 10px;
    }

    .card-group {
      display: flex;
      justify-content: space-around;
      align-items: center;
      position: relative;
      bottom: 100px;
      gap: 15px;
    }

    .card {
      width: auto;
      height: auto;
      background-color: #f4f4f4;
      border-radius: 10px !important;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease-in-out;
      cursor: pointer;
      background-color: #A52A2A3D;
      padding: 10px;
    }

    .card-body {
      padding: 20px;
      text-align: center;

    }

    .card-title {
      font-size: 20px;
      margin-bottom: 10px;
    }

    .card-text {
      font-size: 30px;
      margin-bottom: 10px;
      text-align: left;
    }

    .status {
      font-size: 16px;
      font-weight: bold;
      margin-bottom: 10px;
      width: 50px;
      height: auto;
      border-radius: 10px;
      text-align: center;
      color: var(--status-color);
    }

    .card:hover {
      transform: scale(1.05);
      color: #FFBA00;
      background-color: #A52A2A;
      transition: cubic-bezier(0.075, 0.82, 0.165, 1);
    }

    .contact_information {
      height: none;
      display: none;
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

      footer {
        width: 100%;
      }

      footer .footer-content p {
        text-align: center;
        align-items: center;
        height: 50px;
        background-color: #800020;
        color: white;
        width: 100%;
      }

      .carousel {
        display: none;
      }

      .rasas-text {
        width: 100%;
        position: absolute;
        left: 50% !important;

      }

      .rasas-text p {
        font-size: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;

      }

      .location-date .date {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        font-size: 15px;
        margin-left: 5% !important;
      }

      .location-date .location {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        font-size: 12px;
        margin-left: 30% !important;
      }

      .registration-button {
        position: absolute !important;
        left: 0% !important;
        top: 55% !important;
        transform: translateX(-50%);
        animation: popup 1s ease-in-out infinite alternate;
      }

      @keyframes popup {
        from {
          transform: scale(0.5);
        }
        to {
          transform: scale(1);
        }
      }

      .key-image {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-left: 0px;
      }

      .contact_information{
        height: 2rem !important;
        margin-top: 10px !important;
        margin-bottom: 10px !important;
        
      }

      hr{
        width: 100% !important;
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
    height: 550px;
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

  /* footer .footer-content p {
    text-align: center;
    align-items: center;
    height: 50px;
    background-color: #800020;
    color: white;
    width: 100%;
  } */

  .carousel {
    display: none;
  }

  .rasas-text {
    width: 100%;
    position: absolute;
    left: 50% !important;
  }

  .rasas-text p {
    font-size: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
  }

  .location-date .date {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    font-size: 20px !important;
    margin-left: 5% !important;
    font-weight: bolder;
  }

  .location-date .location {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    margin-left: 30% !important;
  }

  .registration-button {
    position: absolute !important;
        left: 20% !important;
        top: 55% !important;
        transform: translateX(-50%);
        animation: popup 1s ease-in-out infinite alternate;
      }

      @keyframes popup {
        from {
          transform: scale(0.5);
        }
        to {
          transform: scale(1);
        }
  }

  .key-image {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-left: 0px;
  }

  .contact_information {
    height: 2rem !important;
    margin-top: 10px !important;
    margin-bottom: 10px !important;
  }

  hr {
    width: 100% !important;
  }

  .date-text {
    font-size: 16px;
    font-weight: bold;
  }

  .dates {
    font-size: 12px;
    font-weight: bold;
  }

  .location-date .date {
      font-size: 150% !important;
  }

   .location-date .location {
      font-size: 120% !important;
      font-weight: bolder !Important;
  }

}   
@media (min-width: 1025px) {
    .carousel {
        margin-left: 12% !important;
      }

    .rasas-text{
        margin-left: 2% !important;
        text-shadow: 3px 3px 3px black;
    }
}
  </style>
</head>

<body>

  <!--navigation-->
  <di id="content" style="display:;">
    <div class="col-md-12 header sticky-md-top">
      <img src="asserts/images/rasas_logo.png" alt="RASAS Logo" class="logo"
        title="Ruhuna Arts Student's Annual Sessions">
      <div class="hamburger">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <nav class="nav">
        <a href="./index.php" class="actived">Home</a>
        <a href="./con_team.php">Conference Team</a>
        <a href="./sub_details.php">Submission Details</a>
        <a href="./program.php">Program</a>
        <a href="./gallery.php">Gallery</a>
        <a href="./cont_us.php">Contact Us</a>
        <a href="./register.php" class="register">Register</a>
        <a href="./login.php" class="register">Log in</a>
      </nav>
    </div>
    <!--main-->
    <main>
      <div class="col-md-12 main-content-video">
        <!-- Video section -->
        <video src="asserts/videos/42154-431423229_small.mp4" autoplay loop muted></video>

        <!-- RASAS text -->
        <div class="rasas-text">
          <p>Ruhuna Arts Student's Annual Sessions - <?php echo date('Y', strtotime($row['event_date'])); ?></p>
          <h5>"Spirit of Sprouting Research of Tomorrow"</h5>
        </div>

        <!-- location and date-->
        <div class="location-date">
          <p class="date">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="date-icon">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
            </svg>
            <?php echo date('d F Y', strtotime($row['event_date'])); ?>
          </p>
          <p class="location">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="location-icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
            </svg>
            <?php echo $row['department']; ?><br>
            Faculty of Humanities and Social Sciences,<br> University of Ruhuna.
            
          </p>
        </div>

        <!-- Registration button -->
        <style>
          .registration-button {}

          @keyframes popup {
            from {
              transform: scale(0.5);
            }

            to {
              transform: scale(1);
            }
          }
        </style>
        <div style="position: absolute; left: 12%; transform: translateX(-50%); top: 55%;" class="registration-button">
          <button type="button" class="button-submit scale" style="background-color: #FFBA00;"
            onclick="window.location.href='sub_details.php'">Submit
            Abstract</button>
        </div>
        <!-- Carousel section -->
        <div class="carousel-container  box-shadow">
          <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <?php
              $sql = "SELECT media_url FROM gallery where media_url IS NOT NULL order by media_id desc";
              $result = mysqli_query($con, $sql);
              $i = 0;
              while ($row = mysqli_fetch_assoc($result)) {
                $i++;
                ?>
                <div class="carousel-item <?php echo $i == 1 ? 'active' : ''; ?>">
                  <img src="./Dashboard/gallery/<?php echo $row['media_url']; ?>" class="d-block w-100"
                    alt="Conference Image <?php echo $i; ?>">
                </div>
                <?php
              }
              ?>
            </div>

            <!-- Carousel controls -->
            <button class="carousel-control-prev visually-hidden" type="button"
              data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next visually-hidden" type="button"
              data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>

      </div>

      <!--about rasas-->
      <?php
      $sql = "SELECT * FROM event order by event_id desc limit 1";
      $result = mysqli_query($con, $sql);
      $row = mysqli_fetch_assoc($result);
      ?>
      <div class="container bg-gradient align-content-center">
        <div class="about-rasas">
          <p>
            <?php echo $row['about_event']; ?>
          </p>
        </div>
        <br>
        <hr style="position: relative; bottom: 170px; width: 100%;;">
        <!--important dates-->
        <div class="container group">
          <div class="row text-center">
            <h1 class="display-4 bold" style="position: relative; bottom: 140px;">Important Dates</h1>
          </div>
          <div class="row row-cols-1 row-cols-md-4 g-4" style="position: relative; bottom: 100px;">
            <?php
            $dates = [
              'Deadline for Submission of Extended Abstracts' => $row['deadline_submission'],
              'Notification of Acceptance &nbsp;&nbsp;&nbsp;&nbsp;' => $row['notification_acceptance'],
              'Submissions of the Revised Abstracts' => $row['submission_revised'],
              'Early Bird Registration &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>' => $row['early_registeration']
            ];
            foreach ($dates as $title => $date) {
              ?>
              <div class="col">
                <div class="card h-100">
                  <div class="card-body">
                    <h5 class="card-title date-text"><?php echo $title; ?></h5>
                    <hr style="width: 100%;height: 1px; background-color: white; font-weight: none;">
                    <div
                      class="status font-monospace <?php echo (new DateTime() > new DateTime($date)) ? 'text-danger bg-danger bg-opacity-25' : 'text-success bg-success bg-opacity-25'; ?>">
                      <?php echo (new DateTime() > new DateTime($date)) ? 'Close' : 'Open'; ?>
                    </div>
                    <p class="card-text dates"><?php echo date('d F Y', strtotime($date)); ?></p>
                  </div>
                </div>
              </div>
              <?php
            }
            ?>
          </div>

          <hr style="position: relative; bottom: 45px; width: 100%;">
          <!--topics-->
          <?php
          $sql = "SELECT theme FROM themes order by theme_id desc";
          $result = mysqli_query($con, $sql);
          ?>
          <div class="container group">
            <div class="row text-center">
              <h1 class="display-4 bold">Conference Themes</h1>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
              <?php
              while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col">
                  <div class="card h-100 box-shadow">
                    <div class="card-body" style="width: 100%; height: auto !important;">
                      <h5 class="card-title" style="font-family: 'Lato', sans-serif;"><i class="fa-solid fa-circle-info me-2"></i><?php echo $row['theme']; ?></h5>
                    </div>
                  </div>
                </div>
                <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>

      <hr style="position: relative; bottom: -50px; width: 84% !important;">
      
      <br>
      <!--keynote speacker-->
      <?php
      $sql = "SELECT * FROM event order by event_id desc limit 1";
      $result = mysqli_query($con, $sql);
      $row = mysqli_fetch_assoc($result);
      ?>
      <div class="container">
        <div class="row text-center">
          <h1 class="display-4 " style="position: relative; top: 50px;">Keynote Speaker</h1>
        </div>
        <br><br><br>
        <div class="card mb-6 box-shadow" style="max-width: auto; border-radius: 10px;">
          <div class="row g-0">
            <div class="col-md-4 d-flex align-items-center key-image">
              <img src="./Dashboard/key_image/<?php echo $row['key_image']; ?>" alt="keynote-speaker"
                class="img-fluid rounded-start"
                style="display: flex; justify-content: center; border-radius: 10px 0 0 10px;" width="200px"
                height="200px" />
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title" style="font-size: 2.5rem;"><?php echo $row['key_title']; ?></h5>
                <p class="card-text" style="font-size: 1.2rem;">
                  <?php echo $row['keynote_speacker']; ?>
                </p>
                <p class="card-text" style="font-size: 1.2rem;">
                  <small class="text text-light"><?php echo $row['key_position']; ?></small>
                </p>
                <p class="card-text" style="font-size: 1.2rem;">
                  <small class="text text-light"><?php echo $row['key_affiliation']; ?></small>
                </p>
                <p class="card-text" style="font-size: 1.2rem;">
                  <small class="text text-light"><?php echo $row['key_location']; ?></small>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <div class="row" style="background-color: #A52A2A; color: #FFC300;">
      <div class="col-md-3 border border-light border-end text-center">
        <br>
        <?php
        $sql = "SELECT * FROM contact_us where contact_id = 1";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
        <h5 style="color:rgb(244, 241, 83); text-decoration: underline;"><?php echo $row['role']; ?></h5>
        <p><?php echo $row['name']; ?></p>
        <p><?php echo $row['email']; ?></p>
      </div>

      <div class="col-md-3 border border-light border-end text-center">
        <br>
        <?php
        $sql = "SELECT * FROM contact_us where contact_id = 2";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
        <h5 style="color:rgb(244, 241, 83); text-decoration: underline;"><?php echo $row['role']; ?></h5>
        <p><?php echo $row['name']; ?></p>
        <p><?php echo $row['email']; ?></p>
      </div>

      <div class="col-md-3 border border-light border-end text-center">
        <br>
        <?php
        $sql = "SELECT * FROM conference_team where role = 'Chief Editor'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
        <h5 style="color:rgb(244, 241, 83); text-decoration: underline;">Editor-in-Chief</h5>
        <p><?php echo $row['name']; ?></p>
      </div>

      <div class="col-md-3 border border-light border-end text-center">
        <br>
        <?php
        $sql = "SELECT * FROM contact_us where contact_id = 3";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
        <h5 style="color:rgb(244, 241, 83); text-decoration: underline;"><?php echo $row['role']; ?></h5>
        <p><?php echo $row['name']; ?></p>
        <p><?php echo $row['email']; ?></p>
      </div>
    </div>
    <!--footer-->
    <div class="row">
        <div class="footer" style="background-color: #800020; color: white;">
            <div class="footer-content text-center" style="position: relative; z-index: 30;">
                <p>&copy; <?php echo date('Y'); ?> Ruhuna Arts Student's Annual Sessions. All rights reserved.</p>
            </div>
        </div>
    </div>
        
    </section>

    <script src="asserts/js/bootstrap.js"></script>
    <script src="asserts/js/main.js"></script>
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