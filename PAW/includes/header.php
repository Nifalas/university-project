  <?php require "navbar.php" ?>
  <?php require_once "../config/config.php" ?>
  <!-- Page Header-->
  <header class="masthead" style="background-image: url('../assets/img/home-bg.jpg')">
      <div class="container position-relative px-4 px-lg-5">
          <div class="row gx-4 gx-lg-5 justify-content-center">
              <div class="col-md-10 col-lg-8 col-xl-7">
                  <div class="site-heading">
                      <h1><?php
                            $currentUrl = $_SERVER['REQUEST_URI'];
                            $urlParts = parse_url($currentUrl);
                            $path = $urlParts['path'];
                            switch ($path) {
                                case '/PAW/posts/create.php':
                                    echo 'Create Post';
                                    break;
                                case '/PAW/users/profile.php':
                                    echo 'Update Profile';
                                    break;
                                case '/PAW/posts/update.php':
                                    echo 'Update Post';
                                    break;
                                case '/PAW/categories/category.php':
                                    $category_id = $_GET['cat_id'];
                                    $get_name = $conn->query("SELECT * FROM categories WHERE id = '$category_id'");
                                    $get_name->execute();

                                    $category_name = $get_name->fetch(PDO::FETCH_OBJ);
                                    echo $category_name->name;
                                    break;
                                default:
                                    echo 'PAW final project';
                                    break;
                            } ?></h1>

                  </div>
              </div>
          </div>
      </div>
  </header>

  <!-- Main Content-->
  <div class="container px-4 px-lg-5">