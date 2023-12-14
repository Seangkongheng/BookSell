<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'booksell');

$id=$_GET['id'];
echo $id;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- bootrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <!-- font-avsome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!-- nav bar -->
  <?php include("navbar.php"); ?>
  <!-- end navbar -->
  <div class="container mt-5">
    <!-- Button trigger modal -->
    <!-- Modal -->
    <form action="Addproduct.php" method="POST" enctype="multipart/form-data">


              <label for=""><span class="text-danger">*</span> Movie Tile</label>
              <input type="text" name="movieTitle" class="form-control mb-4" require>

              <label for=""><span class="text-danger">*</span>Catagory</label>
              <!-- <input type="text" name="movieTitle" class="form-control mb-4" require> -->
              <select name="catagory" id="" class="form-select">
                <?php category_tree(0) ?>
              </select><br>

              <label for=""><span class="text-danger">*</span>price</label>
              <input type="number" name="price" class="form-control mb-4" require>

              <label for=""><span class="text-danger">*</span>Author</label>
              <input type="text" name="author" class="form-control mb-4" require>


              <label for=""><span class="text-danger">*</span>stock</label>
              <input type="number" name="stock" class="form-control mb-4" require>

              <label for=""><span class="text-danger">*</span>image</label>
              <input type="file" name="image_book" class="form-control mb-4" require>

              <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
              <input type="submit" name="addmovie" class="btn btn-primary">
            </form>
    </div>
</body>

</html>
<?php

//funtion recursive
function category_tree($parent_id)
{
  global $conn;
  $sql = "SELECT * From tbl_catagory 
      where parrent_id ='" . $parent_id . "'";
  $result = $conn->query($sql);

  while ($row = mysqli_fetch_object($result)) {
    $spaces = "";

    for ($i = 1; $i <= $row->lavel; $i++) {
      $spaces .= "&nbsp;&nbsp;&nbsp;&nbsp;";
    }
    echo '<option value=' . $row->id . '>';
    echo $spaces . $row->name;
    category_tree($row->id);
    echo '</option>';
  }
}

?>