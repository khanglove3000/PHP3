<?php
class login
{
	function logined($user, $pass)
	{
		$user = $_REQUEST['user'];
		$pass = $_REQUEST['pass'];
		switch($_POST['button'])
		{
			case 'Submit':
			{
				if($user ==  'admin' && $pass == '123')
				{
					session_start();
					$_SESSION['user'] = $user;
					$_SESSION['pass'] = $pass;
					header('Location:admin.php');
				}
				else
				{
					echo 'ban khong phai la admin';	
				}	
				break;
			}
		}
	}	
}

?>