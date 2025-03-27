<?php require 'db.php'; ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">


    <!-- Nav Item - Dashboard -->
    <li class="nav-item active"></li>
    <a class="nav-link container-fluid">
        <span style="color: white; font-size: 100%; text-transform: uppercase; font-weight: bolder; letter-spacing: 2px; margin-left: 13%;"
            title="Ruhuna Arts Student's Annual Sessions - RASAS">RASAS</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <?php
    $sql = "SELECT * FROM users WHERE user_id = " . $_SESSION['user_id'];
    $obj = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($obj);
    $role = $row['role'];
    if ($role == 'admin') {
        echo "<li class=\"nav-item\">
        <a class=\"nav-link\" href=\"dashboard_admin.php\">
            <i class=\"fas fa-fw fa-home\"></i>
            <span>Home Page</span></a>
    </li>";
    } elseif ($role == 'reviewer') {
        echo "<li class=\"nav-item\">
        <a class=\"nav-link\" href=\"dashboard_reviewer.php\">
            <i class=\"fas fa-fw fa-home\"></i>
            <span>Home Page</span></a>
    </li>";
    } else {
        echo "<li class=\"nav-item\">
        <a class=\"nav-link\" href=\"dashboard_user.php\">
            <i class=\"fas fa-fw fa-home\"></i>
            <span>Home Page</span></a>
    </li>";
    }
    ?>
    <!-- 
    <li class="nav-item">
        <a class="nav-link" href="dashboard.php">
            <i class="fas fa-fw fa-user"></i>
            <span>Home Page</span></a>
    </li> -->
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $sql = "SELECT * FROM users WHERE user_id = " . $_SESSION['user_id'];
    $obj = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($obj);

    if ($row['role'] == 'admin') {
        ?>
        <li class="nav-item">
            <a class="nav-link" href="all_users.php">
                <i class="fas fa-fw fa-users"></i>
                <span>All Users</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="all_submissions.php">
                <i class="fas fa-fw fa-file-alt"></i>
                <span>All Submissions</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="reviewers.php">
                <i class="fas fa-fw fa-users"></i>
                <span>Reviewers</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="assign_reviewers.php">
                <i class="fas fa-fw fa-user-plus"></i>
                <span>Assign Reviewers</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="revised_papers.php">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Revised Submissions</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="event.php">
                <i class="fas fa-fw fa-calendar"></i>
                <span>Event</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="program.php">
                <i class="fas fa-fw fa-list"></i>
                <span>Program</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="conference_team.php">
                <i class="fas fa-fw fa-users"></i>
                <span>Conference Team</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="contact_det.php">
                <i class="fas fa-fw fa-address-book"></i>
                <span>Contact Details</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="gallery_ad.php">
                <i class="fas fa-fw fa-image"></i>
                <span>Gallery</span>
            </a>
        </li>
        <?php
    }
    ?>


    <?php if ($row['role'] == 'researcher') { ?>
        <li class="nav-item">
            <a class="nav-link" href="submit_abstract.php">
                <i class="fas fa-fw fa-file-upload"></i>
                <span>Submit Abstract</span></a>
        </li>

        <li class="nav-item">
        <a class="nav-link" href="track_submissions.php">
            <i class="fas fa-fw fa-road"></i>
            <span>Track Abstract</span></a>
    </li>

    <!-- <li class="nav-item">
         <a class="nav-link" href="comments.php">
             <i class="fas fa-fw fa-comments"></i>
             <span>Comments</span></a>
    </li> -->
    <?php } ?>
    

    <?php if ($row['role'] == 'reviewer') { ?>
        <li class="nav-item">
        <a class="nav-link" href="view_submissions.php">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>View Abstracts</span></a>
    </li>
    <?php } ?>   
</ul>