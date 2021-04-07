
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
  if (empty($_POST["Options"])) {
    $Options = "";
  } else {
    $Options = test_input($_POST["ages"]);
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
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <br><br>
  Mobile: <input type="number" name="mobil" value="<?php echo $mobil;?>">
  <br><br>
  Age: <input type="text" name="ages" value="<?php echo $ages;?>">
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $mobil;
echo "<br>";
echo $ages;
echo "<br>";
?>

<?php
$conn = mysqli_connect("localhost", "root", "", "firstdata");

if($conn === false){
    die("ERROR: Could not connect. " 
        . mysqli_connect_error());
}

$name =  $_REQUEST['name'];
$mobil = $_REQUEST['mobil'];
$ages =  $_REQUEST['ages'];
    

$sql = "INSERT INTO info VALUES ('$name', 
            '$mobil','$ages')";

if(mysqli_query($conn, $sql)){
    echo ""; 

} else{
    echo "ERROR: Hush! Sorry $sql. " 
        . mysqli_error($conn);
}
  
mysqli_close($conn);

?>

<table id="bor1">
  <tr>
      <th>Name</th>
      <th>Mobile</th>
      <th>Age</th>
      <th>Operations</th>
  </tr>
  <?php

  $conn = mysqli_connect("localhost","root","","firstdata");

  $sql = "SELECT name,mobile,age,Options from info";
  $result =$conn-> query($sql);
  if($result-> num_rows > 0){
    while($row = $result-> fetch_assoc()){
          echo "
          <tr>
          <td>" .$row['name'] . "</td>
          <td>". $row['mobile']. "</td>
          <td>". $row['age']. "</td>
          <td><a href='delete.php?nm=$row[name]'>Delete</td>
          </tr>
          ";
    }

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