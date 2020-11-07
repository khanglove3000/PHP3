<?php
class upload
{
	function uploaded($local, $folder, $name)
	{
		if($local != '' && $folder != '' && $name != '')
		{
			$newname = $folder.'/'.$name;
			if(move_uploaded_file($local, $newname))
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
		else
		{
			return 0;	
		}
	}
}

?>