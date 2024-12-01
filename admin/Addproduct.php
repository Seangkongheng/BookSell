<?php
session_start();

// Database Connection
$conn = new mysqli('localhost', 'root', '', 'booksell');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Recursive Function to Fetch Category Tree
function category_tree($parent_id) {
    global $conn;
    $sql = "SELECT * FROM tbl_catagory WHERE parrent_id='" . $parent_id . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Category: " . $row['category_name'] . "<br>";
            category_tree($row['id']); // Recursive call
        }
    }
}

// Add Product Function
  try{
    if (isset($_POST['addmovie'])) {
      $title_movie = $conn->real_escape_string($_POST['movieTitle']);
      
      $Mv_catagory = $conn->real_escape_string($_POST['catagory']);
      $book_price = $conn->real_escape_string($_POST['price']);
      $book_author = $conn->real_escape_string($_POST['author']);
      $book_stock = $conn->real_escape_string($_POST['stock']);

      if (isset($_FILES['image_book']) && $_FILES['image_book']['error'] === 0) {
          $allowed_types = ['image/jpeg', 'image/png'];
          if (!in_array($_FILES['image_book']['type'], $allowed_types)) {
              echo "Invalid file type.";
              return;
          }

          $image = $_FILES['image_book']['name'];
          $image_temp = $_FILES['image_book']['tmp_name'];
          $folder = "upload/" . basename($image);

          $sql = $conn->prepare("INSERT INTO book (book_title, catagory, price, Author, stock, image) 
                                 VALUES (?, ?, ?, ?, ?, ?)");
          $sql->bind_param("ssssss", $title_movie, $Mv_catagory, $book_price, $book_author, $book_stock, $image);

          if ($sql->execute()) {
              move_uploaded_file($image_temp, $folder);
              header('Location: product.php');
          } else {
              echo "Failed to add the product: " . $conn->error;
          }
      } else {
          echo "Error uploading image.";
      }
  }
  }catch(Exception $e){
    echo 'Message: ' .$e->getMessage();
  }
 

    
?>
