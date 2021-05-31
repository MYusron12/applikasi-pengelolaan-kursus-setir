<?php 

/**
 * SharedController Controller
 * @category  Controller / Model
 */
class SharedController extends BaseController{
	
	/**
     * formulir_pendaftaran_id_paket_kursus_option_list Model Action
     * @return array
     */
	function formulir_pendaftaran_id_paket_kursus_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT id AS value,nama_paket AS label FROM paket_kursus ORDER BY id";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * user_nama_value_exist Model Action
     * @return array
     */
	function user_nama_value_exist($val){
		$db = $this->GetModel();
		$db->where("nama", $val);
		$exist = $db->has("user");
		return $exist;
	}

	/**
     * user_email_value_exist Model Action
     * @return array
     */
	function user_email_value_exist($val){
		$db = $this->GetModel();
		$db->where("email", $val);
		$exist = $db->has("user");
		return $exist;
	}

	/**
     * user_user_role_id_option_list Model Action
     * @return array
     */
	function user_user_role_id_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT role_id AS value, role_name AS label FROM roles";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * jadwal_kursus_user_id_option_list Model Action
     * @return array
     */
	function jadwal_kursus_user_id_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT id AS value,nama AS label FROM user ORDER BY id";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * jadwal_kursus_nama_paket_id_option_list Model Action
     * @return array
     */
	function jadwal_kursus_nama_paket_id_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT id AS value,nama_paket AS label FROM paket_kursus ORDER BY id";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

}
