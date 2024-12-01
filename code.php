<?php  
session_start();
$conn = new mysqli('localhost', 'root','','booksell');
if(isset($_POST['register']))
{
    $fistName=$_POST['fistName'];
    $lastName=$_POST['lastName'];
    $adress=$_POST['address'];
    $phone=$_POST['numberphone'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $Password=$_POST['password'];


    //cofirm with pass

        
            
    $sql="INSERT INTO userregister (fistname,LastName,address,phonenumber,email,username,password) 
    VALUES('$fistName','$lastName','$adress','$phone','$email','$username','$Password')";
    $query_run =Mysqli_query($conn,$sql);
        if($query_run)
        {
           // $_SESSION['success']="admin profile added";
           // header('location: register.php');
           $_SESSION['message'] = '<script>alert("you  successfull.")</script>';
        }
        else
        {
            $_SESSION['message'] = '<script>alert("not successfull.")</script>';
      
        }

}
// login



//login user
if(isset($_POST['btnUserlogign']))
{
    $userName_login=$_POST['txt_username'];
    $password_login=$_POST['txt_password'];

    // echo $userName_login;
    // echo $password_login;
    

 $query = "SELECT * FROM  userregister WHERE username ='$userName_login' AND password ='$password_login'";
 $result =mysqli_query($conn,$query);
 if(mysqli_num_rows($result)==1)
{ 

    $rows=mysqli_fetch_array($result);
    $_SESSION['user']=$userName_login;
    // echo "you login successfull";
    $_SESSION['message'] = '<script>alert("You login successfull.")</script>';
    header("Location: index.php");
 }
 else
 {
   
    $_SESSION['message'] = '<script>alert("You login not successfull.")</script>';
    header("Location: index.php");
  
 }

}

?>
