<?php
$conn = new mysqli('localhost', 'root','','booksell');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



//call the recursive function to print category listing
echo "<select name='ddlCategory'>";
category_tree(1);
echo "</select>";

//Recursive php function
function category_tree($parent_id){
    global $conn;
    $sql = "SELECT * From tbl_catagory 
        where parrent_id ='".$parent_id."'";
    $result = $conn->query($sql);
    
    while($row = mysqli_fetch_object($result)){
        $spaces = "";
        
        for($i=1; $i<=$row->lavel; $i++){
            $spaces .= "&nbsp;&nbsp;&nbsp;&nbsp;";
        }
        echo '<option value='.$row->id.'>';
            echo $spaces . $row->name;
            category_tree($row->id);
        echo '</option>';

        
    }
}
//close the connection
mysqli_close($conn);

?>