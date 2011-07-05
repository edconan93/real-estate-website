<?php
	//upload file
	if (isset($_POST["newid"]))
	{
		for ($i=1;$i<=5;$i++)
		{
			$flag = true;
			// if($_FILES["ffImage".$i]["error"] > 0 )	
				// $flag = false;
			// if($flag && $_FILES["ffImage"]["size"] == 0 || $_FILES["ffImage"]["size"] > 1024 * 1024)
				// $flag = false;
			echo $flag;
		}
		return;
		/*if($flag)
		{
			echo "<br> file uploaded not failed";
			$arrType = explode ("/",$_FILES["ffImage"]["type"]);
			if($arrType[0]!="image")
			{
				$flagInsert = false;
				$flag = false;
			}
		}
		if($flag)
		{
			$PATH_BASE = str_replace("//","/",dirname(__FILE__)."/");
			$random = rand (1,1000000);		
			$path = $PATH_BASE . "../../images/upload";
			if(!is_dir("$path/$chusohuu"))
			{
				mkdir("$path/$chusohuu");
			}
			if(!is_dir("$path/$chusohuu/Picture_House"))
				mkdir("$path/$chusohuu/Picture_House");
			$path = "$path/$chusohuu/Picture_House/";
			
			move_uploaded_file($_FILES["ffImage"]["tmp_name"],$path.$random.$_FILES["ffImage"]["name"]);
			$picture_path = "images/upload/$chusohuu/Picture_House/".$random.$_FILES["ffImage"]["name"];
			echo "<br>path=".$picture_path;
			$kq=HinhAnhBUS::insert($picture_path,(int)$rs);
			if($kq == false)
			{
				$flagInsert = false;
				echo "<br>Insert image = false";
			}
			else
				echo "upload picture finish!";
		}*/
	}
	if($flagInsert == true)
	{
		$length = strlen($_COOKIE["url"]);
		$url = $_COOKIE["url"];
		$url[$length - 1] = 2;
		header("Location:".$url."&newid=".$rs);
		//header("Location:../tindadang.php?type=2?dangtin=successfully");
	}
	else
	{
	    header("Location:../dangtindichvu.php?dangtin=fail");
	}
?>