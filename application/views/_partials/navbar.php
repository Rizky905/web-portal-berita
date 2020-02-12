<?php
	$servername="localhost";
	$username="root";
	$password="";
	$database="adminpanel";
	$conn=mysqli_connect($servername,$username,$password,$database);
	/*foreach ($results_navigation as $val_navigation) {
		var_dump($val_navigation);
		echo '<br>';
	}*/
?>

<div class="logo-wrap">
	<div class="container">
		<div class="row justify-content-between align-items-center">
			<div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-left no-padding">
				<a href="Home/home">
					<img class="img-fluid" src="../assets/img/navbar-logo.jpg">
				</a>
			</div>
			<!-- UnderWork
			<div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-right no-padding">
				<a href="https://www.facebook.com/beritasatu/"><i class="social-icon fa fa-facebook-square fa-2x pull-right"></i></a>
				<a href="https://www.twitter.com/beritasatu/"><i class="social-icon fa fa-twitter fa-2x pull-right"></i></a>
				<a href="https://www.youtube.com/user/beritasatu"><i class="social-icon fa fa-youtube-play fa-2x pull-right"></i></a>
				<a href="https://www.instagram.com/beritasatu/"><i class="social-icon fa fa-instagram fa-2x pull-right"></i></a>
			</div>
			-->
		</div>
	</div>
</div>
<header class="container sticky-top">
	<nav class="navbar navbar-expand-lg navbar-light">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>			
		</button>
		<div class="collapse navbar-collapse" id="navbarToggler">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item"><h4><a class="nav-link" href="Home/home">Home</a></h4></li>
				<?php

				$length=7;
				$flag=0;

				/*
				if(!empty($results_parent)){
					foreach ($results_parent as $val_parent){
						foreach ($results_child as $val_child) {
							if($val_child['ID_PARENT_CATEGORY']==$val_parent['ID_CATEGORY']){
								?>
								<li class="nav-item dropdown menu"><a href="Home/category/<?php echo $val_parent['SLUG_CATEGORY']; ?>" class="nav-link dropdown-toggle" id="navbardrop"><?php echo $val_parent['NAME_CATEGORY']; ?></a>
								<div class="dropdown-menu sm-menu">
								<?php
								foreach ($results_child as $val_child) {
									if($val_child['ID_PARENT_CATEGORY']==$val_parent['ID_CATEGORY']){
										?>
										<a href="Home/category/<?php echo $val_child['SLUG_CATEGORY']; ?>" class="dropdown-item"><?php echo $val_child['NAME_CATEGORY']; ?></a>
										<?php
									}
								}
								?>
								</div>
								</li>
								<?php
								break;
							}else if($val_child['ID_PARENT_CATEGORY']!=$val_parent['ID_CATEGORY']){
								?>
								<li class="nav-item"><a href="Home/category/<?php echo $val_parent['SLUG_CATEGORY']; ?>" class="nav-link"><?php echo $val_parent['NAME_CATEGORY']; ?></a></li>
								<?php
							}
						}
					}
				}
				*/

				$sql_1="SELECT * FROM category WHERE STATUS_CATEGORY='1' AND ID_PARENT_CATEGORY IS NULL ORDER BY NAME_CATEGORY ASC";
				$result_1 = $conn->query($sql_1);

				if($result_1->num_rows>0){
					while ($row_1=$result_1->fetch_assoc()){
						$sql_2="SELECT * FROM category WHERE STATUS_CATEGORY='1' AND ID_PARENT_CATEGORY=".$row_1['ID_CATEGORY'];
						$result_2=$conn->query($sql_2);
						if($flag<$length){
							if($result_2->num_rows>0){
								?>
								<li class="nav-item dropdown menu"><a href="Home/category?category=<?php echo $row_1['SLUG_CATEGORY']; ?>" class="nav-link dropdown-toggle" id="navbardrop"><?php echo $row_1['NAME_CATEGORY']; ?></a>
								<div class="dropdown-menu sm-menu">
								<?php
								while($row_2 = $result_2->fetch_assoc()){
									?>
									<a href="Home/category?category=<?php echo $row_2['SLUG_CATEGORY']; ?>" class="dropdown-item"><?php echo $row_2['NAME_CATEGORY']; ?></a>
									<?php
								}
								?>
								</div>
								</li>
								<?php
							}else{
								?>
								<li class="nav-item"><a href="Home/category?category=<?php echo $row_1['SLUG_CATEGORY']; ?>" class="nav-link"><?php echo $row_1['NAME_CATEGORY']; ?></a></li>
								<?php
							}
						}else if($flag==$length){
							?>
							<li class="nav-item dropdown menu"><a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">More</a>
							<div class="dropdown-menu sm-menu">
							<a href="Home/category?category=<?php echo $row_1['SLUG_CATEGORY']; ?>" class="dropdown-item"><?php echo $row_1['NAME_CATEGORY']; ?></a>
							<?php
						}else if($flag>$length){
							?>
							<a href="Home/category?category=<?php echo $row_1['SLUG_CATEGORY']; ?>" class="dropdown-item"><?php echo $row_1['NAME_CATEGORY']; ?></a>
							<?php
						}
						$flag=$flag+1;	
					}
					if($flag==$length||$flag>$length){
						?>
						</div>
						</li>
						<?php
					}
				}
				?>
		</ul>
		<div class="col-lg-3">
			<form method="get" action="<?php echo site_url('en/Home/search');?>">
			<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search...'" placeholder="Search..." name="search">
			</form>
		</div>
	</div>
</nav>
</header>