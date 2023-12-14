<?php
session_start();
$conn = new mysqli('localhost', 'root','','booksell');
$sql="SELECT * FROM book";



$sql_qeury=mysqli_query($conn,$sql);
// $id = $_GET['id'];

//create array  for stor card
if(!isset($_SESSION['cart'])){
  
  $_SESSION['cart'] = array();
}


unset($_SESSION['qty_array']);




?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Simple Shopping Cart using Session in PHP</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <!-- bootrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<!-- font-avsome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Simple Shopping Cart</a>
	    </div>
 
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	      	<!-- left nav here -->
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	      	<li class="active"><a href="view_cart.php"><span class="badge"><?php echo count($_SESSION['cart']); ?></span> Cart <span class="glyphicon glyphicon-shopping-cart"></span></a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
	<h1 class="page-header text-center">Cart Details</h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<?php 
			if(isset($_SESSION['message'])){
				?>
				<div class="alert alert-info text-center">
					<?php echo $_SESSION['message']; ?>
				</div>
				<?php
				unset($_SESSION['message']);
			}
 
			?>
			<form method="POST" action="updatecart.php">
			<table class="table table-bordered table-striped">
				<thead>
					<th></th>
					<th>Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Subtotal</th>
				</thead>
				<tbody>
					<?php
						//initialize total
						$total = 0;
						if(!empty($_SESSION['cart'])){
						//connection
					
						//create array of initail qty which is 1
 						$index = 0;
                         if(!empty($_SESSION['cart'])){
                            if(!isset($_SESSION['qty_array'])){
                                  $_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
                              }
                            $sql = "SELECT * FROM book WHERE id IN (".implode(',',$_SESSION['cart']).")";
                            $sql_qeury=mysqli_query($conn,$sql);
                            if(mysqli_num_rows($sql_qeury)>0)
                            {
                                    while($row=mysqli_fetch_assoc($sql_qeury)) 
                                    {
                                    
                                    $price= $row["price"];
                                    $total+=$price;

                                    ?>
                                    <tr>
                                    <td>
                                        <div class="image-cart">
                                             <img src="./admin/upload/<?php echo $row["image"]?>" alt="">
                                        </div>
                                    </td>
                                    <td><?php echo $row["book_title"]?></td>
                                    <td><?php echo $row["price"]?></td>
                                    <td>
                                    <input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
                                      <input type="number" class="form-control w-50" value="<?php echo $_SESSION['qty_array'][$index];?>" name="qty_<?php echo $index;?>">
                                    </td>
                                    <td>
                                      <?php
                                    //  $total=0;
                                     // $price=$row["price"];
                            
                                     // $total=$_SESSION['qty'] * $price;
                                      //echo $total;
                                      ?>
                                        <!-- <p class="text-danger">  <?php $total += $_SESSION['qty_array'][$index]*$row['price']; ?></p> -->
                       
                                    </td>
                                    <td>
                                    <a href="deleteCartView.php?id=<?php echo $row['id']?>"class="text-danger"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                    <tr>
                                    <?php
                                    }
                                ?>          
                                <?php
                                     }
                                 }
                                }
                                else
                                {
                                    echo  "<p class='text-center'> No cart </P>";
                                }            
                     ?>
				</tbody>
			</table>
			<a href="index.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
			<button type="submit" class="btn btn-success" name="save">Save Changes</button>
			<a href="clear_cart.php" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Clear Cart</a>
			<a href="checkout.php" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Checkout</a>
			</form>
		</div>
	</div>
</div>
</body>