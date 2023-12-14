<?php include("navbar.php"); ?>
<?php
$conn = new mysqli('localhost', 'root', '', 'booksell');
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

  <div class="container mt-5">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Add catagory
    </button>

    <!-- Modal -->
    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="allFuction" method="POST" enctype="multipart/form-data">
              <label for=""><span class="text-danger">*</span>Catagory</label>
              <input type="text" name="name" class="form-control mb-4" require>

              <label for=""><span class="text-danger">*</span>sub catagory</label>

              <select name="ddlCategory" id="" class="form-select mb-4 ">
                <option value="0">Main</option>
                <?php category_tree(0); ?>
              </select>

              <label for=""><span class="text-danger">*</span>Decription</label>
              <input type="text" name="dectiption" class="form-control mb-4" require>

              <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
              <input type="submit" name="addcategory" class="btn btn-primary">
            </form>
          </div>

        </div>
      </div>
    </div>

    <table class="table mt-5">
      <tr>
        <th>id</th>
        <th>cagory name</th>
        <th>Sub catagory</th>
        <th>Deciption</th>
        <th>Action</th>
      </tr>

      <tbody>
        <?php
        $sql = "SELECT * From tbl_catagory";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
              <td><?php echo $row["id"] ?></td>

              <td><?php echo $row["name"] ?></td>
              <td><?php echo $row["parrent_id"] ?>
            
            </td>
              <td><?php echo $row["Decription"] ?></td>
              <td>
                <a class="btn btn-primary" href="">Update</a>
                <a class="btn btn-warning" href="">Delete</a>
              </td>
            </tr>
        <?php
          }
        }
        ?>
        <tr>

        </tr>
      </tbody>
    </table>
  </div>
</body>

</html>

<?php
echo "<select name='ddlCategory'>";

echo "</select>";

//Recursive php function
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
//add category Funtion
function addcategory()
{
}
?>