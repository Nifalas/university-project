<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="<?php if (isset($post_seo_desc)) {
                                            echo $post_seo_desc;
                                        } else {
                                            echo "Strona powstała jako projekt zaliczeniowy po studiach podyplomowych - Projektowanie Aplikacji Webowych ";
                                        } ?>" />
    <meta name="author" content="" />
    <title><?php if (isset($post_seo_title)) {
                echo $post_seo_title;
            } else {
                echo "Projekt końcowy - PAW";
            } ?></title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="http://localhost/PHP/CMS/css/styles.css" rel="stylesheet" />
    <link href="http://localhost/PHP/CMS/css/custom-styles.css" rel="stylesheet" />~
    <!-- Slick slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php $site_url = 'http://localhost/PAW'; ?>
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="<?php echo $site_url; ?>/index.php"> <img src="<?php echo $site_url; ?>/assets/img/logo-paw.png" alt="" width="90"> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo $site_url; ?>/index.php">Home</a></li>
                    <?php if (isset($_SESSION['username'])) : ?>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo $site_url; ?>/posts/create.php">create</a></li>
                        <li class="nav-item dropdown mt-3">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $_SESSION['username']; ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color:black;">
                                <a class="dropdown-item" href="<?php echo $site_url; ?>/users/profile.php?prof_id=<?php echo $_SESSION['user_id']; ?>">Profile</a>
                                <a class="dropdown-item" href="<?php echo $site_url; ?>/auth/logout.php">Logout</a>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo $site_url; ?>/admin-panel/admins/login-admins.php" target="_blank">admin</a></li>
                    <?php else : ?>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo $site_url; ?>/auth/login.php">login</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo $site_url; ?>/auth/register.php">register</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>