<?php

  $conn = mysqli_connect("localhost","root","","firstdata");
  error_reporting(0);
    $up = $_GET['up'];
    $fn = $_GET['fn'];
    $Mb =  $_GET['Mb'];
    $Ag =  $_GET['Ag'];
    $gn= $_GET['gn'];
    $ct = $_GET['ct'];
    $cm = $_GET['cm'];
    $hb = $_GET['hb'];
 
    
    ?>
<html>
    <head>
        <title>Update</title>
    </head>

</html>
<body>
<form action="" method="GET">
<table border="0">
<tr>
    <td></td>
    <td><input type="hidden" value="<?php  echo "$up" ?>" name="id" required></td>
</tr>
<tr>
    <td>Name</td>
    <td><input type="text" value="<?php  echo "$fn" ?>" name="Name" required></td>
</tr>
<tr>
    <td>Mobile</td>
    <td><input type="text" value="<?php  echo "$Mb" ?>" name="Mobile" required></td>
</tr>
<tr>
    <td>Age</td>
    <td><input type="text" value="<?php  echo "$Ag" ?>" name="Age" required></td>
</tr>
<tr>
<td>Gender</td>

    <td>
    <input type="radio" name="gender" <?php if (isset($gn) && $gn=="female") echo "checked";?>  value="female">Female
   <input type="radio" name="gender" <?php if (isset($gn) && $gn=="male") echo "checked";?>  value="male">Male
      </td>
    </tr>

<tr>
<td>Choose City</td>
<td>
<select name="city">
    <option value="Shivmoga"
    <?php if (isset($ct) && $ct=="Shivmoga") echo "selected";?> 
    
        >Shivmoga</option>
    <option value="Sagara"
    <?php if (isset($ct) && $ct=="Sagara") echo "selected";?>
    
     >Sagara</option>
    <option value="Soraba"
    <?php if (isset($ct) && $ct=="Soraba") echo "selected";?>
    
      >Soraba</option>
    <option value="Kodanakatte"
    <?php if (isset($ct) && $ct=="Kodanakatte") echo "selected";?>
    >Kodanakatte</option>
  </select></td>

</tr>
 
<tr>
<td> Comment: </td>
<td><textarea name="comment" rows="5" cols="40" value ="comment" ><?php  echo "$cm" ?></textarea><br> </td>
</tr>

<tr>

</tr>
        <td>Hobbies</td>
        <td>
            <input type="checkbox"  name="Cricket" value="Cricket" <?php if (isset($hb) && $hb=="Cricket") echo "checked";?>>
            <label for="hobbies"> I play cricket</label><br>
            <input type="checkbox" name="Football" value="Football" <?php if (isset($hb) && $hb=="Football") echo "checked";?>>
            <label for="hobbies"> I play football</label><br>
            <input type="checkbox"  name="Movies" value="Movies" <?php if (isset($hb) && $hb=="Movies") echo "checked";?>>
            <label for="hobbies"> I watch Movies</label>
        </td>

<tr>
    <td colspan="2" align="center"><input type="submit"  name="submit" value="Update"></td>
    
</tr>

<?php
 $conn = mysqli_connect("localhost","root","","firstdata");
 error_reporting(0);
if($_GET['submit'])
{
    $row=$_GET['id'];
    $Name= $_GET['Name'];
    $Mobile= $_GET['Mobile'];
    $Age= $_GET['Age'];
    $gender= $_GET['gender']; 
    $city= $_GET['city'];
    $comment= $_GET['comment'];
    $hobbies= $_GET['hobbies'];

    $query = "UPDATE info SET Name='".$Name."',Mobile='".$Mobile."',Age='".$Age."',gender='".$gender."',city='".$city."',comment='".$comment."',hobbies='".$hobbies."' WHERE id ='$row'";
    $data=mysqli_query($conn,$query);
}
?>
</table>
</body>
</html>

