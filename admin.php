<?php
session_start();
if( isset($_SESSION['user']) && isset($_SESSION['pass']))
{
	if( $_SESSION['user'] != 'admin' || $_SESSION['pass'] != '123')
	{
		header('Location:login.php');	
	}
}	
else
{
	header('Location:login.php');	
}

include('source/class.php');
$p = new upload()
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<form id="form1" enctype="multipart/form-data"  name="form1" method="post" action="">
  Chọn file cần upload: 
  <input type="file" name="file" id="file" />
  <input type="submit" name="button" id="button" value="Submit" />
  
<?php
switch($_POST['button'])
{
	case 'Submit':
	{
		$errors = array();
		$name = $_FILES['file']['name'];
		$size = $_FILES['file']['size'];
		$local = $_FILES['file']['tmp_name'];
		$type = $_FILES['file']['type'];
		$file_exc = strtolower(end(explode(".", $name)));
		$expension = array("png", "jpg", "docx", "pdf");
		$maxsize = 1*1024*1024;
		
		if($size > $maxsize)
		{
			die('Kich thuoc file toi da la 1MB');	
		}
		
		if(in_array($file_exc, $expension) === false)
		{
			die('chi cho phep upload file png, jpg, docx, pdf');
		}
		
		
		if(empty($errors) == true)
		{
			$newname = time().'_'.$name;
			if($p->uploaded($local,"data",$newname) == 1)
			{
				echo $newname;
			}
			else
			{
				echo 'upload that bai';	
			}
		}
		else
		{
			print_r($errors);	
		}
		
		
		break;	
	}	
}

?> 
</form>
</body>
</html>