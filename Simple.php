
<!DOCTYPE HTML>  
<html>
<head>
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

</body>
</html>