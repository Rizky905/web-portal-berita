<?php
function custom_echo($x, $length){
if(strlen($x)<=$length){
echo $x;
}else{
$y=substr($x,0,$length) . '...';
echo $y;
}
}
?>
<body>
    <div class="container">
        <!-- Start latest-post Area -->
        <div class="row">
            <div class="col-lg-8">
                <div class="sidebars-area">
                    <div class="single-sidebar-widget most-popular-widget">
                        <h6 class="title">
                            <?php
                               $var_value=$_GET['category']; echo $var_value;?>
                            </h6>
                    </div>
                    <?php
                    if(!empty($results_category)){
                        foreach ($results_category as $val){
                            $title_article=$val->TITLE_ARTICLES;
                            $id=$val->ID_ARTICLES;
                            $sum=$val->SUMMARY_ARTICLES;
                            $created=$val->CREATED_DATE;
                            $title_media=$val->TITLE_MEDIA;
                            $var_value=$_GET['category'];
                            $url = "../assets/uploads/files/".$val->URL_MEDIA;
                            ?>
                            <div class="card">
                                <div class="row no-gutters h-200">
                                    <div class="col-auto">
                                        <a href="Home/landing_page?category=<?php echo $var_value; ?>&id=<?php echo $id; ?>"><img src="<?php echo $url; ?>" class="img-category-page img-fluid" alt="<?php echo $title_media; ?>"></a>
                                    </div>
                                    <div class="col">
                                        <div class="card-block px-2">
                                            <span><h4 class="card-title"><a class="card-title" href="Home/landing_page?category=<?php echo $var_value; ?>&id=<?php echo $id; ?>">
                                                <?php custom_echo($title_article,25) ?>
                                            </a></h4></span>
                                            <p class="card-text">
                                                <?php custom_echo($sum,25) ?>
                                            </p>
                                            <p class="time-text"><?php echo $created; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="paging">
                            <?php
                            echo $this->pagination->create_links();
                            ?>
                        </div>
                        <?php
                    }else{?>
                        <div class="not-found-search">
                            <h5>Tidak ada hasil pencarian category</h5></br>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebars-area">
                    <div class="single-sidebar-widget editors-pick-widget">
                        <h6 class="title">Rekomendasi Berita</h6>
                        <div class="editors-pick-post">
                            <?php
                            foreach ($results_side_category as $val_terkini) {
                                $url="../assets/uploads/files/" .$val_terkini[ 'URL_MEDIA'];
                                $id=$val_terkini['ID_ARTICLES'];
                                $title_article=$val_terkini['TITLE_ARTICLES'];
                                $title_media=$val_terkini['TITLE_MEDIA'];
                                $sum=$val_terkini['SUMMARY_ARTICLES'];
                                $created=$val_terkini['CREATED_DATE'];
                                $var_value=$_GET['category'];
                                ?>
                                <div class="post-lists">
                                    <div class="single-post d-flex flex-row">
                                        <div class="thumb">
                                            <a href="Home/landing_page?category=<?php echo $var_value; ?>&id=<?php echo $id; ?>"><img src="<?php echo $url; ?>" class="imgcategory-landing" alt="<?php echo $title_media; ?>"></a>
                                        </div>
                                        <div class="detail">
                                            <a href="Home/landing_page?category=<?php echo $var_value; ?>&id=<?php echo $id; ?>"><h6><?php echo $title_article; ?></h6></a>
                                            <ul class="meta">
                                                <li><span class="lnr lnr-calendar-full"></span><?php echo $created; ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="single-sidebar-widget social-network-widget">
                        <h6 class="title">Social Networks</h6>
                        <ul class="social-list">
                            <li class="d-flex justify-content-between align-items-center fb">
                                <div class="icons d-flex flex-row align-items-center">
                                    <a href="https://www.facebook.com/beritasatu/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </div>
                                <a href="https://www.facebook.com/beritasatu/">Like our page</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center tw">
                                <div class="icons d-flex flex-row align-items-center">
                                    <a href="https://twitter.com/beritasatu" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </div>
                                <a href="https://twitter.com/beritasatu">Follow Us</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center yt">
                                <div class="icons d-flex flex-row align-items-center">
                                    <a class="social-network" href="https://www.youtube.com/user/BeritaSatu"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                                </div>
                                <a href="https://www.youtube.com/user/BeritaSatu" target="_blank">Subscribe</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End latest-post Area -->
    </div>
</body>