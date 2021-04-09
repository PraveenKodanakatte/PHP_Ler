
<!DOCTYPE HTML>  
<html>
<head>
<style>
#bor1 {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

#bor1 td, #bor1 th {  
  border: 1px solid #ddd;
  padding: 8px;
}

#bor1 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>  

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
      $name="";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["mobil"])) {
    $mobil="";
  } else {
    $mobil = test_input($_POST["mobil"]);
  }
    
  if (empty($_POST["ages"])) {
    $ages = "";
  } else {
    $ages = test_input($_POST["ages"]);   
  }
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data; 
}
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<input type="hidden" name="id" value="<?php echo $id;?>">
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <br><br>
  Mobile: <input type="number" name="mobil" value="<?php echo $mobil;?>">
  <br><br>
  Age: <input type="text" name="ages" value="<?php echo $ages;?>">
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
$conn = mysqli_connect("localhost", "root", "", "firstdata");
if(isset($_POST['submit']))
{    
    $id=$_POST['id'];
     $name = $_POST['name'];
     $mobil = $_POST['mobil'];
     $ages = $_POST['ages'];
     $sql = "INSERT INTO info (Name,Mobile,Age)VALUES ('$name','$mobil','$ages')";
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);   
}
?>

<table id="bor1">
  <tr>
      <th>S_no</th?>
      <th>Name</th>
      <th>Mobile</th>
      <th>Age</th>
      <th>Operations</th>
  </tr>
  <?php

  $conn = mysqli_connect("localhost","root","","firstdata");
  $sql = "SELECT id,Name,Mobile,Age from info";
  $result =$conn-> query($sql);
  if($result-> num_rows > 0){ $i=1;
    while($row = $result-> fetch_assoc()){
      
        echo "
          <tr>  
          <td>". $i++."</td>
          <td>" .$row['Name'] . "</td>
          <td>". $row['Mobile']. "</td>
          <td>". $row['Age']. "</td>
          <td><a href='Simple.php?nm=$row[id]'>Delete</td>
          </tr>
          ";
    }
  
    $conn = mysqli_connect("localhost","root","","firstdata");
    $row=$_GET['nm'];

    $query="DELETE FROM info WHERE id =$row";

    $data=mysqli_query($conn,$query);

    echo  "</table>";
  }
  else {
    echo "0 result";
  }
  $conn-> close();  
?>
  </table>
  

</body>
</html>
