
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
error_reporting(E_ALL ^ E_WARNING);
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
  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
  if (empty($_POST["city"])) {
    $cityErr = "City is required";
  } else {
    $city = test_input($_POST["city"]);
  }
  if (empty($_POST["comment"])) {
    $commentErr = "comment is required";
  } else {
    $comment = test_input($_POST["comment"]);
  }
  if (empty($_POST["hobbies"])) {
    $hobbiesErr = "hobbies is required";
  } else {
    $hobbies = test_input($_POST["hobbies"]);
  }
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data; 
}
?>
<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<input type="hidden" name="id" value="<?php echo $id;?>">
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <br><br>
  mobile: <input type="number" name="mobil" value="<?php echo $mobil;?>">
  <br><br>
  Age: <input type="text" name="ages" value="<?php echo $ages;?>">
  <br><br>
  
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <br><br>
  <label for="city">Choose a City:</label>
  <select name="city" id="city">
    <option value="Shivmoga">Shivmoga</option>
    <option value="Sagara">Sagara</option>
    <option value="Soraba">Soraba</option>
    <option value="Kodanakatte">Kodanakatte</option>
  </select><br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea><br>
<br>
  Hobbies:<input type="checkbox" id="hobbies1" name="hobbies" value="Cricket">
  <label for="hobbies"> I play cricket</label><br>
  <input type="checkbox" id="hobbies1" name="hobbies" value="Football">
  <label for="hobbies"> I play football</label><br>
  <input type="checkbox" id="hobbies1" name="hobbies" value="Movies">
  <label for="hobbies"> I watch Movies</label><br><br>
  <br><input type="submit" name="submit" value="Submit">  
  <input type="submit" name="update" value="update">  

</form>

<?php
$conn = mysqli_connect("localhost", "root", "", "firstdata");

if(isset($_POST['submit']))
{    
     $id=$_POST['id'];
     $name = $_POST['name'];
     $mobil = $_POST['mobil'];
     $ages = $_POST['ages'];
     $gender=$_POST['gender']; 
     $city=$_POST['city'];
     $comment=$_POST['comment'];
     $hobbies=$_POST['hobbies'];
   $sql = "INSERT INTO info (Name,Mobile,Age,gender,city,comment,hobbies)VALUES ('$name','$mobil','$ages','$gender','$city','$comment','$hobbies')";
     if (mysqli_query($conn, $sql)) {
      echo '<script>alert("Record added Successfully")</script>';
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
      <th>Gender</th>
      <th>city</th>
      <th>comment</th>
      <th>hobbies</th>
      <th colspan="2">Operations</th>
      
  </tr>
  <?php

  $conn = mysqli_connect("localhost","root","","firstdata");
  $sql = "SELECT id,Name,Mobile,Age,gender,city,comment,hobbies from info";
  $result =$conn-> query($sql);
  if($result-> num_rows > 0){ $i=1;
    while($row = $result-> fetch_assoc()){
      
        echo "
          <tr>  
          <td>". $i++."</td>
          <td>" .$row['Name'] . "</td>
          <td>". $row['Mobile']. "</td>
          <td>". $row['Age']. "</td>
          <td>". $row['gender']. "</td>
          <td>". $row['city']. "</td>
          <td>". $row['comment']. "</td>
          <td>". $row['hobbies']. "</td>
          <td><a href='Simple.php?nm=$row[id]'>Delete</td>
          <td><a href='Simple.php?up=$row[id]&fn=$row[Name]&Mb=$row[Mobile]&Ag=$row[Age]'>edit</td>
          </tr>
          ";
    }
  
    $conn = mysqli_connect("localhost","root","","firstdata");
    $row=$_GET['nm'];   

    $query="DELETE FROM info WHERE id =$row";

    $data=mysqli_query($conn,$query);

   
    $row=$_GET['up'];  
    $name = $_GET['name'];
    $mobil =  $_GET['mobil'];
    $ages =  $_GET['ages'];

    if($_GET['update'])
{
    $row=$_GET['id'];
    $Name= $_GET['Name'];
    $Mobile= $_GET['Mobile'];
    $Age= $_GET['Age'];

    $query = "UPDATE info SET Name='".$Name."',Mobile='".$Mobile."',Age='".$Age."' WHERE id ='$row'";
    $data=mysqli_query($conn,$query);
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
