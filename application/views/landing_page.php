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
        <div class="row">
            <div class="col-lg-8">
                <div class="main-content-area">
                    <?php foreach ($results_select_article as $val){
                        $url="../assets/uploads/files/" .$val[ 'URL_MEDIA'];
                        $id=$val['ID_ARTICLES'];
                        $title_article=$val['TITLE_ARTICLES'];
                        $title_media=$val['TITLE_MEDIA'];
                        $body_article=$val['BODY_ARTICLES'];
                        $creator=$val['username'];
                        $created=$val['CREATED_DATE'];
                        ?>
                        <div class="single-content-title most-popular-widget">
                            <h6 class="title"><?php echo $title_article;?></h6>
                        </div>
                        <div class="single-post-wrap">
                            <div class="single-img relative">
                                <img src="<?php echo $url;?>"class="img-landing-page img-fluid" alt="<?php echo $title_media;?>">
                            </div>
                            <ul class="meta pb-20">
                                <li><span class="lnr lnr-user"></span><?php echo $creator;?></li>
                                <li><span class="lnr lnr-calendar-full"></span><?php echo $created;?></li>
                            </ul>
                        </div>
                        <div class="body-text-article">
                            <p class="article-body"><?php echo $body_article; ?></p>
                        </div>
                        <p class="tag-title"> TAGS </p><br><br>
                        <div class="tag-area">
                            <?php
                            $sql="
                                SELECT tag.* FROM articles
                                LEFT JOIN articles_have_tag ON articles.ID_ARTICLES=articles_have_tag.ID_ARTICLES
                                LEFT JOIN tag ON articles_have_tag.ID_TAG=tag.ID_TAG
                                WHERE articles_have_tag.ID_ARTICLES='".$id."'
                            ";
                            $query = $this->db->query($sql);
                            foreach ($query->result() as $val_tag) {
                                $tag=$val_tag->SLUG;
                                ?>
                                <h5 class="box-tag"><a class="member-tag" href="Home/tag?tag=<?php echo $tag; ?>"><i class="fa fa-tags" aria-hidden="true"> <?php echo $tag;?></i></a></h5>
                                <?php
                            };
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="berita-terkini-area">
                    <div class="main-content-area">
                        <div class="berita-terkini-box">
                            <!-- <span class="berita-terkini-title">Berita Terkini</span> -->
                        </div>
                        <!-- <?php
                        foreach ($results_berita_terkini as $val_terkini) {
                            $url="../assets/uploads/files/" .$val_terkini[ 'URL_MEDIA'];
                            $id=$val_terkini['ID_ARTICLES'];
                            $title_article=$val_terkini['TITLE_ARTICLES'];
                            $title_media=$val_terkini['TITLE_MEDIA'];
                            $sum=$val_terkini['SUMMARY_ARTICLES'];
                            $created=$val_terkini['CREATED_DATE'];
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
                            <div class="single-berita-terkini-box">
                                <div class="image-terkini">
                                    <a href="Home/landing_page?category=<?php echo $slug; ?>&id=<?php echo $id; ?>"><img class="card-img-top img-homepage-news" src="<?php echo $url; ?>" alt="<?php echo $title_article; ?>"></a>
                                </div>
                                <div class="title-text-article">
                                    <a class="title-terkini" href="Home/landing_page?category=<?php echo $slug; ?>&id=<?php echo $id; ?>"><?php custom_echo($title_article,25); ?></a>
                                </div>
                                <div class="body-text-article">
                                    <p class="sum-terkini" href=""><?php custom_echo($sum,25); ?></p>
                                </div>
                            </div>
                            <?php
                        }
                        ?> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebars-area">
                    <div class="single-sidebar-widget editors-pick-widget">
                        <h6 class="title">Rekomendasi Berita</h6>
                        <div class="editors-pick-post">
                            <?php
                            foreach ($results_side_category as $val_side) {
                                $url="../assets/uploads/files/" .$val_side[ 'URL_MEDIA'];
                                $id=$val_side['ID_ARTICLES'];
                                $title_article=$val_side['TITLE_ARTICLES'];
                                $title_media=$val_side['TITLE_MEDIA'];
                                $sum=$val_side['SUMMARY_ARTICLES'];
                                $created=$val_side['CREATED_DATE'];
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
                                <div class="post-lists">
                                    <div class="single-post d-flex flex-row">
                                        <div class="thumb">
                                            <a href="Home/landing_page?category=<?php echo $slug; ?>&id=<?php echo $id; ?>"><img src="<?php echo $url; ?>" class="imgcategory-landing" alt="<?php echo $title_media; ?>"></a>
                                        </div>
                                        <div class="detail">
                                            <a href=""><h6><?php echo $title_article; ?></h6></a>
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
                                <a href="https://www.facebook.com/beritasatu/" target="_blank">Like our page</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center tw">
                                <div class="icons d-flex flex-row align-items-center">
                                    <a href="https://twitter.com/beritasatu" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </div>
                                <a href="https://twitter.com/beritasatu" target="_blank">Follow Us</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center yt">
                                <div class="icons d-flex flex-row align-items-center">
                                    <a class="social-network" href="https://www.youtube.com/user/BeritaSatu"><i class="fa fa-youtube-play" aria-hidden="true" target="_blank"></i></a>
                                </div>
                                <a href="https://www.youtube.com/user/BeritaSatu" target="_blank">Subscribe</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>