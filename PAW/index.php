<?php
// require "../CMS/includes/header.php";
require "includes/navbar.php";
require "config/config.php";

?>

<?php

$posts = $conn->query("SELECT * FROM posts WHERE status = 1");
$posts->execute();
$rows = $posts->fetchAll(PDO::FETCH_OBJ);


$categories = $conn->query("SELECT * FROM categories");
$categories->execute();
$category = $categories->fetchAll(PDO::FETCH_OBJ);


?>
<div class="hp-banner">
    <div style="background-image: url('assets/img/banner-1.jpg');" class="single-slide">
        <h1>Welcome to blog about web development</h1>
    </div>
    <div style="background-image: url('assets/img/banner-2.jpg');" class="single-slide">
        <h2>Check our articles</h2>
    </div>
    <div style="background-image: url('assets/img/banner-3.jpg');" class="single-slide">
        <h2>Join our community</h2>
    </div>
</div>

<script>
    $('.hp-banner').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        speed: 1000,
        arrows: false,
        dots: false

    });
</script>
<div class="container gx-4 gx-lg-5 justify-content-center">
    <h2 style="font-size:1.5em;font-weight:bold;">Recent articles</h2>
    <div class="row hp-posts-container">

        <?php foreach ($rows as $row) : ?>

            <div class="post-preview col-lg-6 col-md-6 col-sm-12">

                <div class="hp-single-post hover-scale-anim" style="background-image:url('posts/images/<?php echo $row->img ?>');">
                    <div class="post-text">
                        <a href="posts/post.php?post_id=<?php echo $row->id ?>">
                            <h2 class="post-title"><?php echo $row->title ?></h2>
                        </a>


                        <p class="post-meta">
                            Posted by
                            <a href="#!"><?php echo $row->user_name ?></a>
                            on <?php echo  date('d', strtotime($row->created_at)) . ' ' . date('M', strtotime($row->created_at))  . ', ' . date('Y', strtotime($row->created_at)); ?>
                        </p>
                    </div>

                </div>
            </div>


        <?php endforeach; ?>
        <hr class="my-4" />



    </div>
</div>
<div class="container">

    <div class="row gx-4 gx-lg-5 justify-content-center">

        <h2 style="font-size:1.5em;font-weight:bold;">Categories</h2>
        <?php foreach ($category as $cat) : ?>

            <div class="col-md-6">
                <a href="categories/category.php?cat_id=<?php echo $cat->id ?>">
                    <div class="alert alert-dark bg-dark text-center text-white hover-scale-anim" role="alert">
                        <?php echo $cat->name; ?>
                    </div>
                </a>
            </div>

        <?php endforeach; ?>
    </div>

</div>
<?php
require "includes/footer.php";

?>