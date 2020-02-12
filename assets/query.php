SELECT articles.*,media.URL_MEDIA
FROM articles
LEFT JOIN articles_have_tag
ON articles.ID_ARTICLES=articles_have_tag.ID_ARTICLES
LEFT JOIN tag
ON articles_have_tag.ID_TAG=tag.ID_TAG
LEFT JOIN articles_have_media
ON articles.ID_ARTICLES=articles_have_media.ID_ARTICLES
LEFT JOIN media
ON articles_have_media.ID_MEDIA=media.ID_MEDIA
LEFT JOIN admin_create_articles
ON articles.ID_ARTICLES=admin_create_articles.ID_ARTICLE
LEFT JOIN admin_users
ON admin_create_articles.ID=admin_users.id
WHERE EXISTS (
    SELECT * FROM articles_have_category
    WHERE articles_have_category.ID_ARTICLES=articles.ID_ARTICLES
    AND articles_have_category.ID_CATEGORY=(
        SELECT category.ID_CATEGORY FROM category WHERE category.SLUG_CATEGORY='sepak bola'
    )
)OR EXISTS(
    SELECT * FROM articles_have_category
    WHERE articles_have_category.ID_ARTICLES=articles.ID_ARTICLES
    AND articles_have_category.ID_CATEGORY=(
        SELECT category.ID_PARENT_CATEGORY FROM category WHERE category.SLUG_CATEGORY='sepak bola'
    )
)


public function get_category_side($category_term){

        $condition_1=("SELECT category.ID_CATEGORY FROM category WHERE category.SLUG_CATEGORY='".$category_term."'");
        $condition_2=("SELECT category.ID_PARENT_CATEGORY FROM category WHERE category.SLUG_CATEGORY='".$category_term."'");

        $query = $this->db->query(
            "
            SELECT articles.*,media.URL_MEDIA FROM articles
            LEFT JOIN articles_have_tag ON articles.ID_ARTICLES=articles_have_tag.ID_ARTICLES
            LEFT JOIN tag ON articles_have_tag.ID_TAG=tag.ID_TAG
            LEFT JOIN articles_have_media ON articles.ID_ARTICLES=articles_have_media.ID_ARTICLES
            LEFT JOIN media ON articles_have_media.ID_MEDIA=media.ID_MEDIA
            LEFT JOIN admin_create_articles ON articles.ID_ARTICLES=admin_create_articles.ID_ARTICLE
            LEFT JOIN admin_users ON admin_create_articles.ID=admin_users.id
            WHERE EXISTS (
                SELECT * FROM articles_have_category WHERE
                articles_have_category.ID_ARTICLES=articles.ID_ARTICLES AND
                articles_have_category.ID_CATEGORY=(".$condition_1.")
            ) OR EXISTS (
                SELECT * FROM articles_have_category WHERE
                articles_have_category.ID_ARTICLES=articles.ID_ARTICLES AND
                articles_have_category.ID_CATEGORY=(".$condition_2.")
            )
            "
        );

        return $query->result_array();
    }


SELECT * from category WHERE ID_CATEGORY NOT IN (SELECT category.ID_PARENT_CATEGORY FROM category WHERE STATUS_CATEGORY='1' AND ID_PARENT_CATEGORY IS NOT NULL)
SELECT * from category WHERE ID_CATEGORY IN (SELECT category.ID_PARENT_CATEGORY FROM category WHERE STATUS_CATEGORY='1' AND ID_PARENT_CATEGORY IS NOT NULL) AND ID_PARENT_CATEGORY IS NULL
SELECT * FROM articles
WHERE EXISTS (SELECT * FROM articles_have_category WHERE articles_have_category.ID_ARTICLES=articles.ID_ARTICLES AND articles_have_category.ID_CATEGORY=23) AND EXISTS (SELECT * FROM articles_have_category WHERE articles_have_category.ID_ARTICLES=articles.ID_ARTICLES AND articles_have_category.ID_CATEGORY=24)

SELECT * FROM articles
INNER JOIN articles_have_category ON articles.ID_ARTICLES=articles_have_category.ID_ARTICLES
INNER JOIN category ON articles_have_category.ID_CATEGORY=category.ID_CATEGORY
LEFT JOIN articles_have_tag ON articles.ID_ARTICLES=articles_have_tag.ID_ARTICLES
LEFT JOIN tag ON articles_have_tag.ID_TAG=tag.ID_TAG
LEFT JOIN articles_have_media ON articles.ID_ARTICLES=articles_have_media.ID_ARTICLES
LEFT JOIN media ON articles_have_media.ID_MEDIA=media.ID_MEDIA
LEFT JOIN admin_create_articles ON articles.ID_ARTICLES=admin_create_articles.ID_ARTICLE
LEFT JOIN admin_users ON admin_create_articles.ID=admin_users.id
WHERE EXISTS (
    SELECT * FROM articles_have_category WHERE
    articles_have_category.ID_ARTICLES=articles.ID_ARTICLES AND
    articles_have_category.ID_CATEGORY=(
        SELECT category.ID_CATEGORY FROM category WHERE category.SLUG_CATEGORY='sport'
    )
) OR EXISTS (
    SELECT * FROM articles_have_category WHERE
    articles_have_category.ID_ARTICLES=articles.ID_ARTICLES AND
    articles_have_category.ID_CATEGORY=(
        SELECT category.ID_PARENT_CATEGORY FROM category WHERE category.SLUG_CATEGORY='sport'
    )
)

SELECT * FROM articles
LEFT JOIN articles_have_category
ON articles.ID_ARTICLES=articles_have_category.ID_CATEGORY
LEFT JOIN category
ON articles_have_category.ID_CATEGORY=category.ID_CATEGORY

SELECT
p.ID_CATEGORY AS "ID Parent",
c.ID_CATEGORY AS "ID Child",
p.NAME_CATEGORY AS "Parent Category",
c.NAME_CATEGORY AS "Child Category"
FROM category c
LEFT JOIN category p
ON p.ID_CATEGORY=c.ID_PARENT_CATEGORY

SELECT p.ID_CATEGORY AS "ID Parent",e.ID_CATEGORY AS "ID Child",p.NAME_CATEGORY AS "Name Parent",e.NAME_CATEGORY AS "Nama Child"
FROM category e
LEFT JOIN category p
ON p.ID_CATEGORY=e.ID_PARENT_CATEGORY


SELECT * FROM articles
            LEFT JOIN articles_have_category ON articles.ID_ARTICLES=articles_have_category.ID_ARTICLES
            LEFT JOIN category ON articles_have_category.ID_CATEGORY=category.ID_CATEGORY
            LEFT JOIN articles_have_tag ON articles.ID_ARTICLES=articles_have_tag.ID_ARTICLES
            LEFT JOIN tag ON articles_have_tag.ID_TAG=tag.ID_TAG
            LEFT JOIN articles_have_media ON articles.ID_ARTICLES=articles_have_media.ID_ARTICLES
            LEFT JOIN media ON articles_have_media.ID_MEDIA=media.ID_MEDIA
            LEFT JOIN admin_create_articles ON articles.ID_ARTICLES=admin_create_articles.ID_ARTICLE
            LEFT JOIN admin_users ON admin_create_articles.ID=admin_users.id
            WHERE category.NAME_CATEGORY='".$search_term."'

<body>
    <div class="site-main-container">
        <!-- Start latest-post Area -->
        <section class="latest-post-area pb-120">
            <div class="container no-padding">
                <div class="row">
                    <div class="col-lg-8 post-list">
                        <!-- Start single-post Area -->
                        <div class="single-post-wrap">
                            <div class="feature-img-thumb relative">
                                <div class="active-gallery-carusel">
                                    <div class="single-img relative">
                                        <div class="overlay overlay-bg"></div>
                                        <img class="img-fluid item" src="img/g1.jpg" alt="">
                                    </div>
                                    <div class="single-img relative">
                                        <div class="overlay overlay-bg"></div>
                                        <img class="img-fluid item" src="img/g2.jpg" alt="">
                                    </div>
                                    <div class="single-img relative">
                                        <div class="overlay overlay-bg"></div>
                                        <img class="img-fluid item" src="../assets/img/jadwal-lengkap-matchday-kesembilan-liga-inggris-2018-2019-xgn.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <?php
                            $sql = "SELECT * FROM articles where ID_ARTICLES=5";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                            echo'
                            <div class="content-wrap">
                                <ul class="tags mt-10">
                                    <li><a href="#">Food Habit</a></li>
                                </ul>
                                <blockquote>'.$row['SUMMARY_ARTICLES'].'</blockquote>
                                <a href="#">
                                    <h3>A Discount Toner Cartridge Is Better Than Ever.</h3>
                                </a>
                                <ul class="meta pb-20">
                                    <li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
                                    <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                                    <li><a href="#"><span class="lnr lnr-bubble"></span>06 </a></li>
                                </ul>
                                <p>
                                '.$row['BODY_ARTICLES'].'
                                </p>
                                ';
                                }
                            }
                            ?>
                            <div class=recomend>
                                <div class=title-recomend>
                                    <h3>Rekomendasi Berita</h3>
                                </div>
                                <div class="row">
                                <?php
                                $sql = "SELECT * FROM articles limit 4";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                echo'
                                    <div class="col-md-3">
                                    <div class="card-recomend">
                                        <img class="card-img-top" src="../assets/img/jadwal-lengkap-matchday-kesembilan-liga-inggris-2018-2019-xgn.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <a class="card-title">'.$row['TITLE_ARTICLES'].'</a>
                                        </div>
                                    </div>
                                    </div>
                                    ';
                                }
                                }
                                ?>
                            </div>
                            </div>
                                <div class="comment-sec-area">
                                    <div class="container">
                                        <div class="row flex-column">
                                            <h6>05 Comments</h6>
                                            <div class="comment-list">
                                                <div class="single-comment justify-content-between d-flex">
                                                    <div class="user justify-content-between d-flex">
                                                        <div class="thumb">
                                                            <img src="img/blog/c1.jpg" alt="">
                                                        </div>
                                                        <div class="desc">
                                                            <h5><a href="#">Emilly Blunt</a></h5>
                                                            <p class="date">December 4, 2017 at 3:12 pm </p>
                                                            <p class="comment">
                                                                Never say goodbye till the end comes!
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="reply-btn">
                                                        <a href="" class="btn-reply text-uppercase">reply</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment-list left-padding">
                                                <div class="single-comment justify-content-between d-flex">
                                                    <div class="user justify-content-between d-flex">
                                                        <div class="thumb">
                                                            <img src="img/blog/c2.jpg" alt="">
                                                        </div>
                                                        <div class="desc">
                                                            <h5><a href="#">Emilly Blunt</a></h5>
                                                            <p class="date">December 4, 2017 at 3:12 pm </p>
                                                            <p class="comment">
                                                                Never say goodbye till the end comes!
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="reply-btn">
                                                        <a href="" class="btn-reply text-uppercase">reply</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment-list">
                                                <div class="single-comment justify-content-between d-flex">
                                                    <div class="user justify-content-between d-flex">
                                                        <div class="thumb">
                                                            <img src="img/blog/c3.jpg" alt="">
                                                        </div>
                                                        <div class="desc">
                                                            <h5><a href="#">Emilly Blunt</a></h5>
                                                            <p class="date">December 4, 2017 at 3:12 pm </p>
                                                            <p class="comment">
                                                                Never say goodbye till the end comes!
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="reply-btn">
                                                        <a href="" class="btn-reply text-uppercase">reply</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-form">
                                <h4>Post Comment</h4>
                                <form>
                                    <div class="form-group form-inline">
                                        <div class="form-group col-lg-6 col-md-12 name">
                                            <input type="text" class="form-control" id="name" placeholder="Enter Name"
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Enter Name'">
                                        </div>
                                        <div class="form-group col-lg-6 col-md-12 email">
                                            <input type="email" class="form-control" id="email"
                                                placeholder="Enter email address" onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Enter email address'">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control mb-10" rows="5" name="message"
                                            placeholder="Messege" onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Messege'" required=""></textarea>
                                    </div>
                                    <a href="#" class="primary-btn text-uppercase">Post Comment</a>
                                </form>
                            </div>
                        </div>
                        <!-- End single-post Area -->
                    </div>
                    <div class="col-lg-4">
                        <div class="sticky-sidebar flex-grow-1">
                            <div class="nav flex-sm-column">
                                <div class="sidebars-area">
                                    <div class="single-sidebar-widget editors-pick-widget">
                                        <h6 class="title">Category</h6>
                                        <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner-sidebar">
                                                <div class="carousel-item active" data-interval="5000">
                                                    <img src="img/FUT_0584-800x533.jpg" class="d-block w-100" alt="...">
                                                    <div class="karokaro carousel-caption d-none d-md-block">
                                                        <a href="#">
                                                            <h4 class="text-karo">Indonesia</h4>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="img/jadwal-lengkap-matchday-kesembilan-liga-inggris-2018-2019-xgn.jpg"
                                                        class="d-block w-100" alt="...">
                                                    <div class="karokaro carousel-caption d-none d-md-block">
                                                        <a href="#">
                                                            <h4 class="text-karo">Inggris</h4>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <a class="carousel-control-prev" href="#carouselExampleInterval"
                                                role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleInterval"
                                                role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="single-sidebar-widget most-popular-widget">
                                        <h6 class="title">Popular</h6>
                                        <div class="single-list flex-row d-flex">
                                            <div class="thumb">
                                                <img src="img/m1.jpg" alt="">
                                            </div>
                                            <div class="details">
                                                <a href="image-post.html">
                                                    <h6>Help Finding Information
                                                        Online is so easy</h6>
                                                </a>
                                                <ul class="meta">
                                                    <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April,
                                                            2018</a>
                                                    </li>
                                                    <li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="single-list flex-row d-flex">
                                            <div class="thumb">
                                                <img src="img/m2.jpg" alt="">
                                            </div>
                                            <div class="details">
                                                <a href="image-post.html">
                                                    <h6>Compatible Inkjet Cartr
                                                        world famous</h6>
                                                </a>
                                                <ul class="meta">
                                                    <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April,
                                                            2018</a>
                                                    </li>
                                                    <li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="single-list flex-row d-flex">
                                            <div class="thumb">
                                                <img src="img/m3.jpg" alt="">
                                            </div>
                                            <div class="details">
                                                <a href="image-post.html">
                                                    <h6>5 Tips For Offshore Soft
                                                        Development </h6>
                                                </a>
                                                <ul class="meta">
                                                    <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April,
                                                            2018</a>
                                                    </li>
                                                    <li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="single-list flex-row d-flex">
                                            <div class="thumb">
                                                <img src="img/m4.jpg" alt="">
                                            </div>
                                            <div class="details">
                                                <a href="image-post.html">
                                                    <h6>5 Tips For Offshore Soft
                                                        Development </h6>
                                                </a>
                                                <ul class="meta">
                                                    <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April,
                                                            2018</a>
                                                    </li>
                                                    <li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
        </section>
        <!-- End latest-post Area -->
    </div>
</body>





<div class="container no-padding">
    <div class="row">
        <div class="col-lg-8 post-list">
            <!-- Start latest-post Area -->
            <div class="latest-post-wrap">
                <h4 class="cat-title">Terkini</h4>
                <div class="single-latest-post row align-items-center">
                    <div class="col-lg-5 post-left">
                        <div class="feature-img relative">
                            <div class="overlay overlay-bg"></div>
                            <a href="#">
                                <img class="img-fluid" src="img/amido_balde_melakukan_selebrasi_usai_cetak_gol-169.jpg" alt="">
                            </a>
                        </div>
                        <ul class="tags">
                            <li><a href="#">Liga 1 2019</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-7 post-right">
                        <a href="image-post.html">
                            <h4>A Discount Toner Cartridge Is
                            Better Than Ever.</h4>
                        </a>
                        <ul class="meta">
                            <li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
                            <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                            <li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
                        </ul>
                        <p class="excert">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt.
                        </p>
                    </div>
                </div>
                <div class="single-latest-post row align-items-center">
                    <div class="col-lg-5 post-left">
                        <div class="feature-img relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="img/l2.jpg" alt="">
                        </div>
                        <ul class="tags">
                            <li><a href="#">Science</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-7 post-right">
                        <a href="image-post.html">
                            <h4>A Discount Toner Cartridge Is
                            Better Than Ever.</h4>
                        </a>
                        <ul class="meta">
                            <li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
                            <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                            <li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
                        </ul>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt.
                        </p>
                    </div>
                </div>
                <div class="single-latest-post row align-items-center">
                    <div class="col-lg-5 post-left">
                        <div class="feature-img relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="img/l3.jpg" alt="">
                        </div>
                        <ul class="tags">
                            <li><a href="#">Travel</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-7 post-right">
                        <a href="image-post.html">
                            <h4>A Discount Toner Cartridge Is
                            Better Than Ever.</h4>
                        </a>
                        <ul class="meta">
                            <li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
                            <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                            <li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
                        </ul>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt.
                        </p>
                    </div>
                </div>
                <div class="single-latest-post row align-items-center">
                    <div class="col-lg-5 post-left">
                        <div class="feature-img relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="img/l4.jpg" alt="">
                        </div>
                        <ul class="tags">
                            <li><a href="#">Fashion</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-7 post-right">
                        <a href="image-post.html">
                            <h4>A Discount Toner Cartridge Is
                            Better Than Ever.</h4>
                        </a>
                        <ul class="meta">
                            <li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
                            <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                            <li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
                        </ul>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt.
                        </p>
                    </div>
                </div>
                <div class="single-latest-post row align-items-center">
                    <div class="col-lg-5 post-left">
                        <div class="feature-img relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="img/r1.jpg" alt="">
                        </div>
                        <ul class="tags">
                            <li><a href="#">Science</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-7 post-right">
                        <a href="image-post.html">
                            <h4>A Discount Toner Cartridge Is
                            Better Than Ever.</h4>
                        </a>
                        <ul class="meta">
                            <li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
                            <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                            <li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
                        </ul>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt.
                        </p>
                    </div>
                </div>
                <div class="single-latest-post row align-items-center">
                    <div class="col-lg-5 post-left">
                        <div class="feature-img relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="img/r2.jpg" alt="">
                        </div>
                        <ul class="tags">
                            <li><a href="#">Travel</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-7 post-right">
                        <a href="image-post.html">
                            <h4>A Discount Toner Cartridge Is
                            Better Than Ever.</h4>
                        </a>
                        <ul class="meta">
                            <li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
                            <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                            <li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
                        </ul>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt.
                        </p>
                    </div>
                </div>
                <div class="single-latest-post row align-items-center">
                    <div class="col-lg-5 post-left">
                        <div class="feature-img relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="img/r3.jpg" alt="">
                        </div>
                        <ul class="tags">
                            <li><a href="#">Fashion</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-7 post-right">
                        <a href="image-post.html">
                            <h4>A Discount Toner Cartridge Is
                            Better Than Ever.</h4>
                        </a>
                        <ul class="meta">
                            <li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
                            <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                            <li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
                        </ul>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt.
                        </p>
                    </div>
                </div>
                <div class="load-more">
                    <a href="#" class="primary-btn">Load More Posts</a>
                </div>
            </div>
            <!-- End latest-post Area -->
        </div>
        <div class="col-lg-4">
            <div class="sidebars-area">
                <div class="single-sidebar-widget editors-pick-widget">
                    <h6 class="title">Category</h6>
                    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner-sidebar">
                            <div class="carousel-item active" data-interval="5000">
                                <img src="img/FUT_0584-800x533.jpg" class="d-block w-100" alt="...">
                                <div class="karokaro carousel-caption d-none d-md-block">
                                    <a href="#">
                                        <h4 class="text-karo">Indonesia</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="img/jadwal-lengkap-matchday-kesembilan-liga-inggris-2018-2019-xgn.jpg" class="d-block w-100"
                                alt="...">
                                <div class="karokaro carousel-caption d-none d-md-block">
                                    <a href="#">
                                        <h4 class="text-karo">Inggris</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="single-sidebar-widget ads-widget">
                <img class="img-fluid" src="img/sidebar-ads.jpg" alt="">
            </div>
            <div class="single-sidebar-widget most-popular-widget">
                <h6 class="title">Popular</h6>
                <div class="single-list flex-row d-flex">
                    <div class="thumb">
                        <img src="img/m1.jpg" alt="">
                    </div>
                    <div class="details">
                        <a href="image-post.html">
                            <h6>Help Finding Information
                            Online is so easy</h6>
                        </a>
                        <ul class="meta">
                            <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a>
                        </li>
                        <li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
                    </ul>
                </div>
            </div>
            <div class="single-list flex-row d-flex">
                <div class="thumb">
                    <img src="img/m2.jpg" alt="">
                </div>
                <div class="details">
                    <a href="image-post.html">
                        <h6>Compatible Inkjet Cartr
                        world famous</h6>
                    </a>
                    <ul class="meta">
                        <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a>
                    </li>
                    <li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
                </ul>
            </div>
        </div>
        <div class="single-list flex-row d-flex">
            <div class="thumb">
                <img src="img/m3.jpg" alt="">
            </div>
            <div class="details">
                <a href="image-post.html">
                    <h6>5 Tips For Offshore Soft
                    Development </h6>
                </a>
                <ul class="meta">
                    <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a>
                </li>
                <li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
            </ul>
        </div>
    </div>
    <div class="single-list flex-row d-flex">
        <div class="thumb">
            <img src="img/m4.jpg" alt="">
        </div>
        <div class="details">
            <a href="image-post.html">
                <h6>5 Tips For Offshore Soft
                Development </h6>
            </a>
            <ul class="meta">
                <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a>
            </li>
            <li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
        </ul>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>