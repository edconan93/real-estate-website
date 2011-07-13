<?php 
	include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/DichVuDAO.php");
?>
<?php

/**
 * @author hoaphuong
 * @copyright 2011
 */

class DichVuBUS
{
	public static function Add($tieude,$mota,$chusohuu,$phuong,$quan,$tinh,$ngaydang,$ngayupdate,$duong,$rong,$dai,$tang,$sophongngu,$sophongtam,$giaban,$donvitien,$status,$thoihandangtin,$loainha,$phaply,$huongnha,$khuyenmai,$loaidichvu,$donvidv,$X,$Y,$khannang,$rank,$sonha)
    {
        return DichVuDAO::Add($tieude,$mota,$chusohuu,$phuong,$quan,$tinh,$ngaydang,$ngayupdate,$duong,$rong,$dai,$tang,$sophongngu,$sophongtam,$giaban,$donvitien,$status,$thoihandangtin,$loainha,$phaply,$huongnha,$khuyenmai,$loaidichvu,$donvidv,$X,$Y,$khannang,$rank,$sonha);
    }
	public static function Update($id,$tieude,$mota,$chusohuu,$phuong,$quan,$tinh,$ngaydang,$ngayupdate,$duong,$rong,$dai,$tang,$sophongngu,$sophongtam,$giaban,$donvitien,$status,$thoihandangtin,$loainha,$phaply,$huongnha,$khuyenmai,$loaidichvu,$donvidv,$X,$Y,$khannang,$rank,$sonha)
	{
		return DichVuDAO::Update($id,$tieude,$mota,$chusohuu,$phuong,$quan,$tinh,$ngaydang,$ngayupdate,$duong,$rong,$dai,$tang,$sophongngu,$sophongtam,$giaban,$donvitien,$status,$thoihandangtin,$loainha,$phaply,$huongnha,$khuyenmai,$loaidichvu,$donvidv,$X,$Y,$khannang,$rank,$sonha);
	}
	public static function GetIdByViewDate($viewdate)
	{
		return DichVuDAO::GetIdByViewDate($viewdate);
	}
	public static function UpdateStatus($id,$status)
	{
		return DichVuDAO::UpdateStatus($id,$status);
	}
    public static function getAll($offset,$numrow)
    {
        return DichVuDAO::getAll($offset,$numrow);
    }
	public static function getAll0($chusohuu,$offset,$numrow)
    {
        return DichVuDAO::getAll0($chusohuu,$offset,$numrow);
    }
    public static function select($id)
    {
        return DichVuDAO::select($id);
    }
    public static function countAll0($chusohuu)
    {
        return DichVuDAO::countAll0($chusohuu);
    }
	public static function countAll()
    {
        return DichVuDAO::countAll();
    }
    public static function find($sql)
    {
        return DichVuDAO::find($sql);
    }
    public static function getALLDichVuByLoai($idLoai,$offset,$numrow)
    {
        return DichVuDAO::getDichVuByLoai($idLoai,$offset,$numrow);
    }
    public static function countAllDichVuByLoai($idLoai)
    {
        return DichVuDAO::countAllDichVuByLoai($idLoai);
    }
    public static function getAllBySQL($strSQL)
    {
        return DichVuDAO::getAllBySQL($strSQL);
    }
    public static function countAllBySQL($strSQL)
    {
        return DichVuDAO::countAllBySQL($strSQL);
    }
	public static function countAllDichVuByStatus0($status,$chusohuu)
    {
		 return DichVuDAO::countAllDichVuByStatus0($status,$chusohuu);
	}
	public static function getALLDichVuByStatus0($status,$chusohuu,$offset,$numrow)
    {
		return DichVuDAO::getALLDichVuByStatus0($status,$chusohuu,$offset,$numrow);
	}
	public static function countStatusType($status,$user)
    {
		return DichVuDAO::countStatusType($status,$user);
	}
	public static function delete($id)
    {
		return DichVuDAO::delete($id);
	}
	 //hoaphuong
    public static function getCanHoNoiBat()
    {
		return DichVuDAO::getCanHoNoiBat();
	}
}
?>