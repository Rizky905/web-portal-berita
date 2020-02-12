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
		<h4 class="search-title-pass">Kata Kunci: <?php $var_value=$_GET['search']; echo $var_value; ?></h4></br>
		<hr>
		<div class="row-search col-lg-12">
			<?php
			if(!empty($results)){
				foreach ($results as $val){
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
								<a href="Home/landing_page?category=<?php echo $slug; ?>&id=<?php echo $id; ?>"><img src="<?php echo $url; ?>" class="img-search-page img-fluid" alt="<?php echo $title_media; ?>"></a>
								</div>
								<div class="col">
									<div class="card-block px-2">
										<span><h4 class="card-title"><a class="card-title" href="Home/landing_page?category=<?php echo $slug; ?>&id=<?php echo $id; ?>">
										<?php custom_echo($title_article,25); ?>
										</a></h4></span>
										<p class="card-text">
										<?php custom_echo($sum,50); ?>
										</p>
										<p class="time-text"><?php echo $created; ?></p>
									</div>
								</div>
							</div>
						</div>
					<hr>
				<?php
				}
				?>
				<div class="paging">
					<?php
					echo $this->pagination->create_links();
					?>
				</div>
				<?php
			}else{var_dump($results);?>
				<div class="not-found-search">
					<h5>Tidak ada hasil pencarian.</h5></br>
				</div>
			<?php
			}
			?>
		</div>
	</div>
</body>