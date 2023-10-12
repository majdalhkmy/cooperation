<?php
?>
<center>  
<form method ="post" action="db.php">
<input type ="submit" name="show" value ="عرض الكل ">
<h1>حذف البيانات</h1> 
<input type="text"  name="username" >    
<input type="submit"  name="delete" value ="حذف">    
<input type="submit"  name="signout" value ="تسجسيل خروج">    
<hr>    


<h1>تعديل البيانات</h1>    
 id:<input type="text"  name="id" value="id" ><br><br>    
to id:<input type="text"  name="id2" value="id" ><br><br>    
salare:<input type="text"  name="sal" value="salare" ><br><br>    
    
<input type="submit"  name="modefy" value ="تعديل"><br><br>    
<hr>  


<h1>اضافة البيانات</h1>    
    
id:<input type="text"  name="id" value="id" ><br><br>    
name:<input type="text"  name="name" value="name" ><br><br>    
salare:<input type="text"  name="salare" value="salare" ><br><br>   
    
<input type="submit"  name="add" value ="اضافة"><br><br>    
<hr> 
 
</form>
</center>  

<?php
 $connection = mysqli_connect ('localhost','root','','inplwe');

// تسجيل الخروج
if(isset($_POST['signout'])){  
    
  session_start();  
  $_SESSION['username']='';  
  header("location: signin.php");  
  exit();  
 }  
 
 //اضافة بيانات 
 
if(isset($_POST['add'])){    
      
     $userid= $_POST['id'];    
  $username= $_POST['name'];  
  $salareu= $_POST['salare'];
  
     
  $query=" insert into users values ('$userid',' $username','$salareu')";    
 $result = mysqli_query ($connection,$query);    
 if ($result){    
  echo "inserted done";    
      
}else {die('error');    
 }    
}  


//تعديل البيانات   
if(isset($_POST['modefy'])){    
       $userid= $_POST['id1'];    
     $userid2= $_POST['id2'];    
  $salareu= $_POST['sal'];    
       
     
  $query="update users set id = '$userid2', salare= '$salareu' where id= '$userid'";    
 $result = mysqli_query ($connection,$query);    
 if ($result){    
  echo "updated done";    
      
}else {die('error');    
 }    
} 


//حذف   
if(isset($_POST['delete'])){    
     $name= $_POST['username'];    
  $query="delete from users where name= '$name'";    
 $result = mysqli_query ($connection,$query);    
 if ($result){    
  echo "deleted done";    
      
}else {die('error');    
 }    
} 



if (isset($_POST['show'])){
	$query = 'select * from users';
	$result = mysqli_query($connection,$query);
	
	if ($result){
		echo 'success';
		echo '<table border ="1">
		
		<th>id</th>
		<th>name</th>
		<th>salare</th>
		
';
while ($row =mysqli_fetch_row($result)){
	ECHO ' <tr>
	<td>'.$row[0].'</td>
	<td>'.$row[1].'</td>
	<td>'.$row[2].'</td>
	
	</tr>';

	}
	}
	else {
		die ('error'.mysqli_error($connection));
	}
}
?>

		