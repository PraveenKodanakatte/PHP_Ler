<?php

  $conn = mysqli_connect("localhost","root","","firstdata");
  error_reporting(0);
    $up = $_GET['up'];
    $fn = $_GET['fn'];
    $Mb =  $_GET['Mb'];
    $Ag =  $_GET['Ag'];
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

    $query = "UPDATE info SET Name='".$Name."',Mobile='".$Mobile."',Age='".$Age."' WHERE id ='$row'";
    $data=mysqli_query($conn,$query);
}
?>
</table>
</body>
</html>

