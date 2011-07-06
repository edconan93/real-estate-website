<?php 
	include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/RoleDAO.php");

	class RoleBUS
	{
		public static function GetRoleByID ($id)
		{
			return RoleDAO::GetRoleByID ($id);
		}
		public static function GetAllRole()
		{
			return RoleDAO::GetAllRole();
		}
	}
?>