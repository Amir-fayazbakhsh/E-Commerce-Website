<?php

 $filepath = realpath(dirname(__FILE__));
include_once($filepath."/../lib/db.class.php");
include_once($filepath."/../function/jdf.php");
include_once($filepath."/../function/function.php");












class cart{


	public $errormsg;
  	public $infomsg ;
  	public $query;

  	public $db;
  	public $quantity;
  	public $product_id;








	public function __construct(){


		$this->db = new Dbh;

	}




	public function addToCart($quantity,$productID){

		$userID	   = Session::get('userID_login');

		// $sqlP = "SELECT * FROM `product` WHERE `id` = '$productID'";
		// $this->query = $this->db->queryDb($sqlP);
		// $res = $this->query->fetch();

		// $product_name = $res['product_name'];
		// $pric         = $res['price'];
		// $image        = $res['picture'];


		$sqlC = "SELECT * FROM cart WHERE product_id = '$productID' AND `user_id` = '$userID'";
		$resC = $this->db->Query($sqlC);

		if($resC->rowCount()>0){

			return $this->errormsg = "اینمحصول قبلا به سبد اضاافه شده!!" .'<a href="cart.php">مشاهده سبد</a>';

		}else{

			$sqlIC = "INSERT INTO cart(product_id, quantity,user_id,status) VALUES ('$productID', '$quantity', '$userID', '0')";

			$resIC = $this->db->Query($sqlIC);

			if($resIC){
				
				return $this->infomsg = "محصول با موفقیت به سبد خرید اضافه شد".'<a href="cart.php">مشاهده سبد</a>';

			}else{

				header("location:404.php");
			}
		}







	}



	public  function cartCount(){

		$userID	   = Session::get('userID_login');
		$sql = "SELECT * FROM cart WHERE user_id = '$userID'";
		$res = $this->db->queryDb($sql);
		$i = 0;
		foreach($res as $row){

			$i++;
		}

		echo $i;
	}



	public function cartList(){

		$userID	   = Session::get('userID_login');
		$sql = "SELECT * FROM cart WHERE user_id = '$userID'";
		return $this->db->queryDb($sql);


	}




	    public function deleteCart($id){
      
        $result = $this->db->Query("DELETE  FROM `cart` WHERE `cart`.`cart_id`=?",[$id]);
        if($result){

               $infomsg ="دسته با موفقیت حذف شد";
        }else{

               $errormsg ="خطا در حذف";

        }

      }





















}










?>