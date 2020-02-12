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
		<!-- Breaking News -->
		<div class="widget-block flasher-sec w-100 mb-2">
			<div class="row px-3">
				<div class="col-md-2 pr-0">
					<div class="heading-box box-headline">Breaking News</div>
				</div>
				<div class="col-md-10 pl-0">
					<div class="content-box box-headline">
							<marquee class="scroll-right-to-left" behavior="scroll" direction="left" scrollamount="4"><ul>
								<?php
								if (!empty($resultsheadline)) {
									foreach ($resultsheadline as $value){
										$content = "";
										$active = "";
										$title=$value['TITLE_ARTICLES'];
										$id=$value['ID_ARTICLES'];
										$sum=$value['SUMMARY_ARTICLES'];
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
										/*$content = str_replace('<p>', '', $value['SUMMARY_ARTICLES']);
										$content = str_replace('</p>', '', $content);*/
										?>
										<!-- <div class="carousel-item <?=$active?>"> -->
											<li class="headline-marquee"><p><span class="time-box"><?=date("| d M, Y - H:i |", strtotime($value['CREATED_DATE']))?></span><a class="running-text" href="Home/landing_page?category=<?php echo $slug; ?>&id=<?php echo $id; ?>"><?php echo $title; ?> - <?php echo $sum; ?></a></p></li>
										
										<?php	
									}
								}
								?>
							</ul></marquee>
					</div>
				</div>
			</div>
		</div>

		<!-- HEADLINE -->
		<div class="row w-100 section-01 px-3">
			<div class="col-md-12 ">
				<h2 class="heading-large mb-3 mt-5">Headline</h2>
			</div>

			<?php
			foreach (array_slice($resultsheadline, 0, 1) as $value) {
				$title=$value['TITLE_ARTICLES'];
				$id=$value['ID_ARTICLES'];
				$sum=$value['SUMMARY_ARTICLES'];
				$url = "../assets/uploads/files/".$value['URL_MEDIA'];
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
				<div class = "col-lg-6 mt-2">
					<div class = "card">
						<a href="Home/landing_page?category=<?php echo $slug; ?>&id=<?php echo $id; ?>"><?php echo '<img src   = "'.$url.'" class = "card-img-top img-homepage-headlarge">';?></a>
						<div class = "card-body">
							<i><a style="color: #000; font-weight: bold;" href ="Home/landing_page?id=<?php echo $id; ?>"><?php echo $title; ?></a></i>
							<p> <?php custom_echo ($sum,25); ?></p>
						</div>
					</div>
				</div>
				<?php
			}
			?>

			<div class="col-md-3 mt-2">
				<?php
				foreach(array_slice($resultsheadline, 1, 2) as $value) {
					$id=$value['ID_ARTICLES'];
					$title=$value['TITLE_ARTICLES'];
					$sum=$value['SUMMARY_ARTICLES'];
					$url = "../assets/uploads/files/".$value['URL_MEDIA'];
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
					<div class="card mb-4">
						<a href="Home/landing_page?category=<?php echo $slug; ?>&id=<?php echo $id; ?>"><?php echo '<img src   = "'.$url.'" class = "img-fluid img-homepage-headsmall">';?></a>
						<!-- <div class="card-img-overlay"> <span class="badge badge-pill badge-danger">News</span> </div> -->
						<div class="card-body">
							<i><a style="color: #000; font-weight: bold;" href ="Home/landing_page?id=<?php echo $id; ?>"><?php echo $title; ?></a></i>
							<p> <?php custom_echo ($sum,25); ?></p>
						</div>
					</div>
					<?php
				}
				?>
			</div>

			<div class="col-md-3 mt-2">
				<?php 
				$id=$value['ID_ARTICLES'];
				foreach (array_slice($resultsheadline, 3 ,2) as $value) {
					$id=$value['ID_ARTICLES'];
					$title=$value['TITLE_ARTICLES'];
					$sum=$value['SUMMARY_ARTICLES'];
					$url = "../assets/uploads/files/".$value['URL_MEDIA'];
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
					<div class="card mb-4">
						<a href="Home/landing_page?category=<?php echo $slug; ?>&id=<?php echo $id; ?>"><?php echo '<img src   = "'.$url.'" class = "img-fluid img-homepage-headsmall">';?></a>
						<!-- <div class="card-img-overlay"> <span class="badge badge-pill badge-danger">News</span> </div> -->
						<div class="card-body">
							<i><a style="color: #000; font-weight: bold;" href ="Home/landing_page?id=<?php echo $id; ?>"><?php echo $title; ?></a></i>
							<p> <?php custom_echo ($sum,25); ?></p>
						</div>
					</div>
					<?php  
				}
				?>
			</div>
		</div>

		<!-- vertikal news-->
		<div class="row w-100 section-01 px-3">
			<div class="col-md-12">
				<h2 class="heading-large mb-3 mt-5">Nasional</h2>
			</div>
			<?php
			foreach (array_slice($resultsarticlecategory, 0, 4) as $value) {
				$url = "../assets/uploads/files/".$value['URL_MEDIA'];
				$id=$value['ID_ARTICLES'];
				$title=$value['TITLE_ARTICLES'];
				$sum=$value['SUMMARY_ARTICLES'];
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
				<div class="col-lg-3 mt-4">
					<div class="card">
						<a href="Home/landing_page?category=<?php echo $slug; ?>&id=<?php echo $id; ?>"><?php echo '<img src   = "'.$url.'" class = "card-img-top img-homepage">';?></a>
						<div class="card-body">
							<i><a style="color: #000; font-weight: bold;" href ="Home/landing_page?id=<?php echo $id; ?>"><?php echo $title; ?></a></i>
							<p> <?php custom_echo ($sum,25); ?></p>
						</div>
					</div>
				</div>
				<?php 
			}
			?>
			<div class="article-next w-100">
				<a href="Home/category?category=nasional" class="load-more-selected-category primary-btn">LIHAT SEMUA</a>
			</div>
		</div>

		

		<!-- Badan Berita-01  -->
		<div class="section-01 latest-post-area pb-50">
			<div class="row">
				<div class="col-lg-8">
					<h3 class="heading">TERKINI</h3>
				</div>
				<div class="col-md-8 post-list">
					<div class="latest-post-wrap" style="background-color: #ffffff">
						<?php
						foreach($resultsarticle as $value){
							$url = "../assets/uploads/files/".$value['URL_MEDIA'];
							$id=$value['ID_ARTICLES'];
							$title=$value['TITLE_ARTICLES'];
							$sum=$value['SUMMARY_ARTICLES'];
							$created=$value['CREATED_DATE'];
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
									<a href="Home/landing_page?category=<?php echo $slug; ?>&id=<?php echo $id; ?>"><?php echo '<img src   = "'.$url.'" class = "card-img-top">';?></a>
								</div>
								<div class="col-lg-7 post-right">
									<i><a style="color: #000; font-weight: bold;" href ="Home/landing_page?id=<?php echo $id; ?>"><?php echo $title; ?></a></i>
									<p><?php echo $created;?></p>
									<p> <?php echo $sum ?></p>
								</div>
							</div>
							<?php	
						}
						?>
						<div class="load-more">
							<a href="Home/index" class="primary-btn list-all">LIHAT SEMUA</a>
						</div>
					</div>
				</div>

				<div class="col-lg-3 side-tabs">
					<div class="col-md-9">
						<h3 class="heading-small" style="margin-top: -48px"> terpopuler</h3>
					</div>
					<?php
					foreach (array_slice($resultsarticle, 0, 5) as $value) {
						$url = "../assets/uploads/files/".$value['URL_MEDIA'];
						$id=$value['ID_ARTICLES'];
						$title=$value['TITLE_ARTICLES'];
						$sum=$value['SUMMARY_ARTICLES'];
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
						<div class="side-tabs box">
							<div class="col-lg-15 " style="padding :20px 20px 20px">
								<i><a style="color: #000; font-weight: bold;" href ="Home/landing_page?id=<?php echo $id; ?>"><?php echo $title; ?></a></i>								
							</div>
						</div>
						<?php	
					}  
					?>
				</div>
			</div>
		</div>
	</div>
</body>