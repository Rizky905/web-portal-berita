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
                        <h6 class="title">Category</h6>
                    </div>
                    <?php
                    if(!empty($results_tag)){
                        foreach ($results_tag as $val){
                            $title_article=$val->TITLE_ARTICLES;
                            $id=$val->ID_ARTICLES;
                            $sum=$val->SUMMARY_ARTICLES;
                            $created=$val->CREATED_DATE;
                            $title_media=$val->TITLE_MEDIA;
                            $url = "../assets/uploads/files/".$val->URL_MEDIA;
                            $sql="
                                SELECT category.SLUG_CATEGORY,category.ID_PARENT_CATEGORY FROM articles
                                LEFT JOIN articles_have_category ON articles.ID_ARTICLES=articles_have_category.ID_ARTICLES
                                LEFT JOIN category ON articles_have_category.ID_CATEGORY=category.ID_CATEGORY
                                WHERE articles_have_category.ID_ARTICLES='".$id."' ORDER BY ID_PARENT_CATEGORY ASC LIMIT 1
                            ";
                            $query = $this->db->query($sql);
                            foreach ($query->result() as $val_cat) {
                                $slug=$val_cat->SLUG_CATEGORY;
                            };
                            ?>
                            <div class="card">
                                <div class="row no-gutters h-200">
                                    <div class="col-auto">
                                        <a href="Home/landing_page?category=<?php echo $slug; ?>&id=<?php echo $id; ?>"><img src="<?php echo $url; ?>" class="img-category-page img-fluid" alt="<?php echo $title_media; ?>"></a>
                                    </div>
                                    <div class="col">
                                        <div class="card-block px-2">
                                            <span><h4 class="card-title"><a class="card-title" href="Home/landing_page?category=<?php echo $slug; ?>&id=<?php echo $id; ?>">
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
                            foreach ($results_side_tag as $val_terkini) {
                                $url="../assets/uploads/files/" .$val_terkini[ 'URL_MEDIA'];
                                $id=$val_terkini['ID_ARTICLES'];
                                $title_article=$val_terkini['TITLE_ARTICLES'];
                                $title_media=$val_terkini['TITLE_MEDIA'];
                                $sum=$val_terkini['SUMMARY_ARTICLES'];
                                $created=$val_terkini['CREATED_DATE'];
                                $sql="
                                    SELECT category.SLUG_CATEGORY FROM articles
                                    LEFT JOIN articles_have_category ON articles.ID_ARTICLES=articles_have_category.ID_ARTICLES
                                    LEFT JOIN category ON articles_have_category.ID_CATEGORY=category.ID_CATEGORY
                                    WHERE articles_have_category.ID_ARTICLES='".$id."' LIMIT 1
                                ";
                                $query = $this->db->query($sql);
                                foreach ($query->result() as $val_cat) {
                                    $slug=$val_cat->SLUG_CATEGORY;
                                };
                                ?>
                                <div class="post-lists">
                                    <div class="single-post d-flex flex-row">
                                        <div class="thumb">
                                            <a href="Home/landing_page?category=<?php echo $slug; ?>&id=<?php echo $id; ?>"><img src="<?php echo $url; ?>" class="img-popular-category-page img-fluid" alt="<?php echo $title_media; ?>"></a>
                                        </div>
                                        <div class="detail">
                                            <a href="Home/landing_page?category=<?php echo $slug; ?>&id=<?php echo $id; ?>"><h6><?php echo $title_article; ?></h6></a>
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