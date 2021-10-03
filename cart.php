<!DOCTYPE html>
<html lang="en">
<head>
<title>SHOP</title>
<?php include 'includes/header.inc.php';?>
</head>
<?php include 'includes/navbar.inc.php';?>
<?php include_once 'includes/autoloader.inc.php';?>
<?php $product  = new product;  ?>
<?php $category = new category; ?>
<?php $comment  = new comment; ?>
<?php $users    = new users; ?>
<?php $cart     = new cart; ?>

<?php  include 'includes/quantityjs.php' ;   ?>



<?php

if(Session::get('userLogin')==false){
	header("location:login.php");
}

if(isset($_GET["del_cart_id"])){

	 $cart->deleteCart($_GET["del_cart_id"]);
}


?>

<body>
	<section><!-- breadcrumb -->
		<div class=" mt-3">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12  text-center">
						<div class="breadcrumb-content">

							<ul class="breadcrumb ">
								<li><a href="index.php">خانه  \</a></li>
								<li><a href="cart.php" class="breadcrumbActive"> سبد خرید</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- msg notification -->

	<div class="row">
		<div class="col-md-12 col-sm-12">
				<?php if (isset($cart->infomsg)) {?>
					<div class="alert alert-success text-center"><?php echo $cart->infomsg; ?></div>
				<?php }?>

				<?php if (isset($cart->errormsg)) {?>
					<div class="alert alert-danger text-center"><?php echo $cart->errormsg; ?></div>
				<?php }?>
		</div>
	</div>



	<section>
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-sm-12 ">
					

      
					<div class="cartTotal text-center mr-4 jumbotron">
						<h5>مجموع سبد</h5>
						<table class="">
							<tr class="d-flex flex-row-reverse">
								<th>: مجموع قیمت</th>
								<td> ﷼  </td>
							</tr>
							<tr class="d-flex flex-row-reverse">
								<th>: ارزش افزوده</th>
								<td> ﷼  ۷۰۰۰</td>
							</tr>

							<tr class="d-flex flex-row-reverse mt-4 pt-3" style="border-top: 1px solid #5555; ">
								<th>: ارزش افزوده</th>
								<td> ﷼  ۷۰۰۰</td>
							</tr>
						</table>
					</div>


				</div>

				<div class="col-lg-8 col-sm-12">
					<table class="table text-center">
						<thead>
							<tr class="">
								<th>حذف</th>
								<th>قیمت</th>
								<th>تعداد</th>
								<th>محصول</th>
								<th>شماره</th>
								
							</tr>
						</thead>
						<tbody>
							<?php $res = $cart->cartList(); ?>
							<?php foreach($res as $row){ ?>

							<?php

								$product_id = $row['product_id'];
								$product->getProductById($product_id);
							?>
							<?php
							 
							 

							 ?>
							<tr>
								<td><a href="?del_cart_id=<?= $row['cart_id'] ?>"><i class="bi bi-trash"></i></a></td>
								<td><?= (product::$price * $row['quantity']); ?></td>
								<td class="text-center">

								  <form method="post" action="">
									<div class="input-group">
				                      <span class="input-group-btn">
				                           <button type="button" class="quantity-left-minus btn  btn-number"  data-type="minus" data-field="">
				                                 <i class="">-</i>
				                            </button>
				                        </span>
				                        <input type="text" id="quantity" name="quantity" class="form-control input-number" value='<?= $row['quantity']; ?>' min="1" max="6">
				                        <span class="input-group-btn">
				                            <button type="button" class="quantity-right-plus btn  btn-number" data-type="plus" data-field="">
				                                <i class="bi bi-plus"></i>
				                            </button>
				                        </span>
				               		 </div>
				               		 <button name="updateQuantity" type="submit" class="btn btn-sm  ">ویرایش سبد</button>
				               	  </form>
								</td>
								<td><a href="product-details.php?productID=<?= product::$productId; ?>"><img width="100px" alt="product-pic" src="admin/<?= product::$picture; ?>">
									<p class="mt-1"><?= product::$productName; ?></p>
								</a></td>

								<td>1</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>


	


  <?php include'includes/footer.inc.php';?>
  <?php include'includes/Dry.php';?>
	
</body>

</html>