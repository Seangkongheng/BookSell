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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Online store</title>
</head>
<!-- bootrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<!-- font-avsome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="style.css">
<body>
<!-- <div class="top-header">
    <div class="top">
                <div class="header-text">
                        <p class="mt-2 text-white">Gmail: kong hengseang878@gmail.com</p>
                        <p></p>
                </div>
                <div class="login-register">
                    <a class="btn btn-primary" href="">login</a>
                    <a class="btn btn-warning" href="">Register</a>
                </div>
    </div>
    
</div> -->
<nav class="fiexnav navbar navbar-expand-lg  navbar-dark bg-dark ">
<!-- bg-body-tertiary -->
  <div class="container">
    <a class="navbar-brand" href="#">
    <div class="imag-logo">
    <img src="image/logo-no-background.png" alt="">
    </div>
    </a>
    <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
      <ul class="navbar-nav  mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="index.php">HOME</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="#">CATALOG</a>
        </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            CATALOG
          </a>
            <div class="catalog-dropdown">
             <ul class="dropdown-menu  mt-4" aria-labelledby="navbarDropdown">
                  <div class="all-dropdown d-flex">
                      <div class="firs-dropdown">
                          <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item " href="#editorchoice">Editor choice</a></li>
                                <li><a class="dropdown-item " href="#freebook">Free child</a></li>
                                <li><a class="dropdown-item " href="#">Hornor</a></li>
                                <li><a class="dropdown-item" href="#">Fanjusty</a></li>
                                <li><a class="dropdown-item" href="#">Marima</a></li>
                                <li><a class="dropdown-item" href="#">Holywood</a></li>
                               
                      </div>
                      <div class="second-dropddown">
                              <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Thunder</a></li>
                                    <li><a class="dropdown-item" href="#">The king</a></li>
                                    <li><a class="dropdown-item" href="#">The vdo move</a></li>
                                    <li><a class="dropdown-item" href="#">Counting casualties</a></li>
                                    <li><a class="dropdown-item" href="#">The leang</a></li>
                                    <li><a class="dropdown-item" href="#">The kheang</a></li>
                            
                      </div>
                      <div class="second-dropddown">
                              <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Non-Funtion</a></li>
                                    <li><a class="dropdown-item" href="#">Literary Fiction</a></li>
                                    <li><a class="dropdown-item" href="#">Master-Threaler</a></li>
                                    <li><a class="dropdown-item" href="#">Young Adult</a></li>
                                    <li><a class="dropdown-item" href="#">Biography & History</a></li>
                                    <li><a class="dropdown-item" href="#">Deposting</a></li>
                        
                              
                      </div>
                      <div class="second-dropddown">
                              <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Kengkingstone</a></li>
                                    <li><a class="dropdown-item" href="#">OBI-wan</a></li>
                                    <li><a class="dropdown-item" href="#">The nife</a></li>
                                    <li><a class="dropdown-item" href="#">star war</a></li>
                                    <li><a class="dropdown-item" href="#">Historycle Fiction</a></li>
                                    <li><a class="dropdown-item" href="#">Sicent Fiction</a></li>
          
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">coppyRight@kon chkea.com</a></li>
                      </div>
                  </div>
              </ul>
              
            </div>
         
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="#">SELECT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="#">PROMOTION</a>
        </li>
       
        <!-- <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="#"> <i class="fa-solid fa-cart-shopping"></i>
      </ul>
      </a>
        </li> -->
    
        <!-- <div class="top-menu">
        <ul>
          <li class="text-white">English</li>
          <li class="text-white">Help</li>
          <li class="text-white">Cart</li>
          <li class="text-white">Login</li>
        </ul>
        </div> -->
       
       <!-- <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
    <div class="right-menu">
    <ul>
        <li class="text-white English">English</li>
        <li class="text-white help">Help</li>

        <li class="dropdown">
            <a class="text-decoration-none text-white " href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
              <span>cart
              <span class="badge bg-danger">
              <?php
                  $count = count($_SESSION['cart']);
                  echo $count;
              ?>
            </span>
            </span>
            </a>
            <div class="dropdown-menu mt-5 viewcart " aria-labelledby="dropdownMenuLink">
              <div class="card">
                  <div class="card-header">
                      <p>shopping cart<p>
                      <p class="count-item">you have <?php echo  $count ?> item in cart</p>
                  </div>
                  <?php
            
                $total=0;
              if(!empty($_SESSION['cart'])){
                      $sql = "SELECT * FROM book WHERE id IN (".implode(',',$_SESSION['cart']).")";
                      $sql_qeury=mysqli_query($conn,$sql);
                      if(mysqli_num_rows($sql_qeury)>0)
                    {
                      while($row=mysqli_fetch_assoc($sql_qeury))
                          
                      {
                        
                        $price= $row["price"];
                        $total+=$price;
                        ?>
                          <div class="view-cart-list">
                          <div class="image-cart">
                          <img src="./admin/upload/<?php echo $row["image"]?>" alt="">
                          </div>
                          <div class="name-cart">
                              <p><?php echo $row["book_title"]?></p>
                          </div>
                          <div class="qty-cart">
                              <p>1</p>
                          </div>
                          <div class="price">
                          <p class="text-danger">$<?php echo $row["price"]?></p>
                          </div>
                          <div class="delete">
                        

                             <a href="deleteCart.php?id=<?php echo $row['id']?>"class="text-danger"><i class="fa-solid fa-trash"></i></a>
                          </div>
                      </div>
                                <?php
                              
                        ?>          
                      <?php
                      }
                    }
              }
              else
              {
                echo "<p class='text-center mt-5'>No item cart</>";
              }

         
            ?>
            
              </div>
             <div class="bottom-cart mt-3">
             <a href="viewcart.php" class="btn btn-info text-white"> view all</a>
             <?php
          
             ?>
              <p>Total : <?php echo $total ?>$</p>
             </div>
            </div>
         </li>

         <li class="text-white">
         <?php

if(isset($_SESSION['user']))
{

  echo"
      <a href='logout.php'class='text-decoration-none  text-white'> | Logout</a>";
   


}
else
{
echo '  <a  type="button" class="text-decoration-none text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">login <i class="fa-solid fa-user m2-2"></i></li></a>';
}
?>
         </li>
      </ul>
    <div class="form-before-responsive">
    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
    </div>
  </div>
  
  <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Login</h5>
        <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body bg-dark">
          <div class="form-login">
          <form>
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row">
              <div class="col-md-6 mb-3">
                <div class="form-outline">
                  <input type="text" id="form3Example1"placholder="name" class="form-control" />
                  <label class="form-label text-white" for="form3Example1"><span class="text-danger">*</span >First name</label>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="form-outline">
                  <input type="text" id="form3Example2" class="form-control" />
                  <label class="form-label text-white" for="form3Example2"><span class="text-danger">*</span>Last name</label>
                </div>
              </div>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-3">
              <input type="email" id="form3Example3" class="form-control" />
              <label class="form-label text-white" for="form3Example3"><span class="text-danger">*</span>Email address</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
              <input type="password" id="form3Example4" class="form-control" />
              <label class="form-label text-white" for="form3Example4"> <span class="text-danger">*</span> Password</label>
            </div>
          <span class="dont_register text-white" href=""> Have you don't account already? <a href="dont_register text-white"> sing up</a>  </span>
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block float-end">
              Login
            </button>

            <!-- Register buttons -->
            <div class="text-center mt-4">
              <p class="text-white">or sign up with:</p>
              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-facebook-f"></i>
              </button>

              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-google"></i>
              </button>

              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-twitter"></i>
              </button>

              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-github"></i>
              </button>
            </div>
          </form>
          </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div> -->
    </div>
  </div>
</div>
</nav>
<!-- --viewcart-- -->
<div class="">
    
</div>
     <div class="container mt-5">
              <h1 class="text-center">My shopping cart</h1>
              <div class="view-cart mt-5">
<form  method="POST" action="updatecart.php">
                    <table class="table">
                        <tr>
                            <th>Image book</th>
                            <th>book</th>
                            <th>Price</th>
                            <th>Qanity</th>
                            <th>New Qaunity</th>
                            <th>Subtotal</th>
                            <th>Action</th>
                        </tr>
                        <tbody>

                        

                    
                        <?php
                      $index = 0;
                      $total = 0;
                      $toalgrand=0;
                        if(!empty($_SESSION['cart'])){

                                if(!isset($_SESSION['qty_array'])){
                                      $_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
                                  }
                                $sql ="SELECT * FROM book WHERE id IN (".implode(',',$_SESSION['cart']).")";
                                $sql_qeury=mysqli_query($conn,$sql);
                                if(mysqli_num_rows($sql_qeury)>0)
                                {
                                     while($row=$sql_qeury->fetch_assoc()){
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
                                        <td>$<?php echo $row["price"]?></td>
                                        <td>
                                        <input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
                                          <input type="number" class="form-control w-50" value="<?php echo $_SESSION['qty_array'][$index]; ?>" name="qty_<?php echo $index; ?>">
                                        </td>
                                       
                                        <td>

                                          <?php
                                         $total=0;
                                         $price=$row["price"];
                                        $qty=($_SESSION['qty']);
          
                                         
                              
                                        echo $qty;
                           

                                
                    
                             
                                          ?>
                                         
                           
                                        </td>
                                             <td>
                                                  <?php
                                                           $toal=$_SESSION['qty']*$price;
                                                   echo $toal?>
                                             </td>
                                                  
                                        <td>
                                        <a href="deleteCartView.php?id=<?php echo $row['id']?>"class="text-danger"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                        <?php 
                                          $toalgrand+=$_SESSION['qty']*$price;
                                        ?>
                                        <tr>
                                        <?php
                                           $index ++;
                                    
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
              </div>
     </div>     
   <div class="container">
   <button type="submit" class="btn btn-success" name="save">Save Changes</button>
   <a href="DeletAllcart.php" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Clear Cart</a>
   </div>
</form>      
<!-- end view cart -->
<!-- browser-center -->

<!-- end-broser-center -->

<!-- editoer -->
<div class="editor">




<?php
if(isset($_SESSION['message'])){
    ?>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-6">

               <?php echo $_SESSION['message']; ?>

        </div>
    </div>
    <?php
    unset($_SESSION['message']);
}
?>

<!-- --------total------- -->
    <div class="container">
        <hr>
        <div class="row">   
            <div class="col-9">

            </div>
            <div class="col-3">
               <div class="shipping float-end"> 
                
               <b>$00.00</b>alway from Free shipping<br><br>
               <span><b>SUBTOTAL </b>  :<?php  echo number_format($toalgrand,2)?> $</span><br><br>
               <span><b>GRAND TOTAL    : </b>  :<?php  echo number_format($toalgrand,2)?> $</span><br><br>
               <button class="btn-checkout mt-2 btn btn-warning text-white px-5 py-3">
                    PROCEED TO CHECKOUT
               </button><br><br>
                <p class="text-center">OR</p>
               <button class="btn-checkout mt-2 btn btn-info text-white px-5 py-3">
                    CONTINUES SHOPPING
               </button>

            </div>

            </div>
        </div>
    </div>
<!-- end total -->
<!-- FOOTER -->
<footer class="bg-dark text-center text-lg-start mt-5 ">
  <!-- Grid container -->
 <div class="container-fruit">
 <div class="container p-4">
    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
      <div class="imag-logo-footer">
          <img src="image/logo-no-background.png" alt="">
     </div>
  
       
      </div>
      <!--Grid column-->
  
      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase mb-0 text-white">CONTACT US</h5>

        <ul class="list-unstyled mb-0  mt-2">
          <li class="mt-2">
            <a href="#!" class="text-white text-decoration-none">BOOK CENTER</a>
          </li>
          <li class="mt-2">
            <a href="#!" class="text-white text-decoration-none">CATALOG</a>
          </li>
          <li class="mt-2">
            <a href="#!" class="text-white text-decoration-none">SELECTION</a>
          </li>
          <li  class="mt-2"> 
            <a href="#!" class="text-white text-decoration-none">PROMOTION</a>
          </li>
          <li  class="mt-2">
            <a href="#!" class="text-white text-decoration-none">TRENDING</a>
          </li>
        </ul>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase text-white">MY TEAM</h5>

        <ul class="list-unstyled mb-0  mt-2">
          <li class="mt-2">
            <a href="#!" class="text-white text-decoration-none">PENTECH MENG</a>
          </li>
          <li class="mt-2">
            <a href="#!" class="text-white text-decoration-none">SEANG KONG HENG</a>
          </li>
          <li class="mt-2">
            <a href="#!" class="text-white text-decoration-none">OUENG CHHENG KHEANG</a>
          </li>
          <li  class="mt-2"> 
            <a href="#!" class="text-white text-decoration-none">LIM SENGLEANG</a>
          </li>
          <li  class="mt-2">
            <a href="#!" class="text-white text-decoration-none">SIEK TONG HENG</a>
          </li>
        </ul>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase mb-0 text-white">CONTACT US</h5>

           <p class="text-white mt-2">Socail</p>
      <div class="socail mt-1">
                  <!-- Facebook -->
            <a
                class="btn text-white btn-floating m-1"
                style="background-color: #3b5998;"
                href="#!"
                role="button"><i class="fab fa-facebook-f"></i>
            </a>
            <a
                class="btn text-white btn-floating m-1"
                style="background-color: #ac2bac;"
                href="#!"
                role="button"
                ><i class="fab fa-instagram"></i>
            </a>
            <!-- Twitter -->
            <a
              class="btn text-white btn-floating m-1"
              style="background-color: #55acee;"
              href="#!"
              role="button"
              ><i class="fab fa-twitter"></i
            ></a>

        
            <!-- Instagram -->
            <a
              class="btn text-white btn-floating m-1"
              style="background-color: #ac2bac;"
              href="#!"
              role="button"
              ><i class="fab fa-instagram"></i
            ></a>

            <!-- Github -->
            <a
              class="btn text-white btn-floating m-1"
              style="background-color: #333333;"
              href="#!"
              role="button"
              ><i class="fab fa-github"></i
            ></a>
            <form action=""class="mt-3">
              <!--Grid row-->
              <div class="row d-flex ">
                <!--Grid column-->
                <!--Grid column-->

                <!--Grid column-->
                <div class="">
                <!-- col-md-5 col-12 -->
                  <!-- Email input -->
                  <div class="form-outline form-white mb-4">
                    <input type="email" id="form5Example21" placeholder="Enter you email.." class="form-control w-100" />
                  </div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-auto">
                  <!-- Submit button -->
                  <button type="submit" class="btn btn-outline-light mb-4">
                    Subscribe
                  </button>
                </div>
                <!--Grid column-->
              </div>
              <!--Grid row-->
            </form>
      </div>
      </div>
      <!--Grid column-->
    </div>
    <!--Grid row-->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center text-white p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2023 Copyright:
    <a class="text-white" href="https://mdbootstrap.com/">KONCHKEA.COM</a>
  </div>
  <!-- Copyright -->
 </div>
</footer>
<!-- ENDFOOTER -->
</body>

</html>