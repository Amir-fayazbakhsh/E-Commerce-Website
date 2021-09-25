<!DOCTYPE html>
<html lang="en">
<head>
<title>SHOP</title>
<?php include 'includes/header.inc.php';?>
</head>
<?php include 'includes/navbar.inc.php';?>
<?php include_once 'includes/autoloader.inc.php';?>
<?php $product  = new product;?>
<?php $category = new category;?>




<body>

	<section><!-- breadcrumb -->
		<div class=" mt-3">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12  text-center">
						<div class="breadcrumb-content">

							<ul class="breadcrumb ">
								<li><a href="index.php">خانه  \</a></li>
								<li><a href="shop.php"> فروشگاه \</a></li>
								<li><a href="index.php" class="breadcrumbActive">جستجوی محصول</a></li>

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section>



		<div class="container search-box">
			<div class="row ">
				<div class="col-lg-6 col-sm-12 mt-4">
					<form method="post" action="">
					  <div class="input-group ">
					    <input type="text" name="searchtext" class="form-control" placeholder="Search">
					    <div class="input-group-btn">
					      <button  class="btn btn-default" name="searchbtn" type="submit">
					        <i class="bi bi-search"></i>
					      </button>
					    </div>
					  </div>
					</form>
				</div>
			</div>
		</div>

		<div class="container mt-5">

			<div class="row">


				<?php

					if(isset($_POST['searchbtn'])){
						$text = $_POST['searchtext'];
						$val  = $product->search($text);

				?>
				<?php foreach($val as $row) { 
					 $catId = $row["cat_id"];
		             $category->getCatById($catId);
		        ?>


						<div class="col-lg-3 col-sm-12">
							<!--product card -->
					          <div class="card mt-3">
					            <div class="product-1 align-items-center text-center">
					             <a href="product-details.php?productID=<?= $row['id'];?>" target="blank"> <img width="100%" src=<?php echo 'admin/'.$row["picture"];?>></a>
					              <h5><?php echo $row['product_name']; ?></h5>


					              <div class="info mt-3">
					                <span class="d-block"><?php echo $category->catName;?></span>

					              </div>

					              <div class="cost mt-3">
					                <span><?php echo $row['price'];?></span>
					                <div>
					                  <i class="bi bi-star"></i>
					                  <i class="bi bi-star"></i>
					                  <i class="bi bi-star"></i>
					                  <i class="bi bi-star"></i>
					                  <i class="bi bi-star"></i>
					                </div>
					              </div>
					              <div class="addBtn m-3">
					                <a href="#"><i class="bi bi-bag-plus"></i></a>
					                <a href="#"><i class="bi bi-heart"></i></a>
					                <a href="product-details.php?productID=<?= $row['id'];?>"><i class="bi bi-eye"></i></a>
					              </div>
					            </div>
					          </div>
					        <!--product card -->
						</div><!-- col-4 --> <?php } }?>
						
					</div><!-- main row -->
				</div> <!-- container cards -->

	</section>

  <?php include'includes/footer.inc.php';?>
	
</body>

</html>