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
		<!-- Badan Berita-01  -->
		<div class="section-01 latest-post-area pb-50">
			<div class="row">
				<div class="col-lg-8">
					<h3 class="heading">TERKINI</h3>
				</div>
				<div class="col-md-8 post-list">
					<div class="latest-post-wrap" style="background-color: #ffffff">
						<?php
						foreach($user as $value){
							$title_article=$value->TITLE_ARTICLES;
                            $id=$value->ID_ARTICLES;
                            $sum=$value->SUMMARY_ARTICLES;
                            $created=$value->CREATED_DATE;
                            $title_media=$value->TITLE_MEDIA;
                            $url = "../assets/uploads/files/".$value->URL_MEDIA;
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
							<div class="single-latest-post row align-items-center">
								<div class="col-lg-3">
									<a href="Home/landing_page?category=<?php echo $slug; ?>&id=<?php echo $id; ?>"><img src="<?php echo $url; ?>" class="card-img-top" alt="<?php echo $title_media; ?>"></a>
								</div>
								<div class="col-lg-7 post-right">
									<a href="Home/landing_page?category=<?php echo $slug; ?>&id=<?php echo $id; ?>"><h4><?php echo $title_article; ?></h4></a>
									<p><?php echo $created;?></p>
									<p><?php echo $sum;?></p>
								</div>
							</div>
							<?php
						}
						?>
						<div class="mt-4">
							<?php echo $this->pagination->create_links(); ?> 
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	</body>