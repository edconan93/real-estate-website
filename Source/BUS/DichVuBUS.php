<?php 
	include_once (str_replace("//","/",dirname(__FILE__)."/")  . "../DAO/DichVuDAO.php");
?>
<?php

/**
 * @author panda
 * @copyright 2011
 */

class DichVuBUS
{
	public static function Add($tieude,$mota,$chusohuu,$phuong,$quan,$tinh,$ngaydang,$ngayupdate,$duong,$rong,$dai,$tang,$sophongngu,$sophongtam,$giaban,$donvitien,$status,$thoihandangtin,$loainha,$phaply,$huongnha,$khuyenmai,$loaidichvu,$donvidv,$X,$Y,$khannang)
    {
        return DichVuDAO::Add($tieude,$mota,$chusohuu,$phuong,$quan,$tinh,$ngaydang,$ngayupdate,$duong,$rong,$dai,$tang,$sophongngu,$sophongtam,$giaban,$donvitien,$status,$thoihandangtin,$loainha,$phaply,$huongnha,$khuyenmai,$loaidichvu,$donvidv,$X,$Y,$khannang);
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
    public static function select($id)
    {
        return DichVuDAO::select($id);
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
}

?>