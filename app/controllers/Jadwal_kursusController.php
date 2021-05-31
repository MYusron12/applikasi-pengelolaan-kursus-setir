<?php 
/**
 * Jadwal_kursus Page Controller
 * @category  Controller
 */
class Jadwal_kursusController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "jadwal_kursus";
	}
	/**
     * List page records
     * @param $fieldname (filter record by a field) 
     * @param $fieldvalue (filter field value)
     * @return BaseView
     */
	function index($fieldname = null , $fieldvalue = null){
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$fields = array("jadwal_kursus.id", 
			"user.nama AS user_nama", 
			"user.foto AS user_foto", 
			"paket_kursus.nama_paket AS paket_kursus_nama_paket", 
			"paket_kursus.pertemuan AS paket_kursus_pertemuan", 
			"jadwal_kursus.pertemuan_1", 
			"jadwal_kursus.act_pertemuan_1", 
			"jadwal_kursus.pertemuan_2", 
			"jadwal_kursus.act_pertemuan_2", 
			"jadwal_kursus.pertemuan_3", 
			"jadwal_kursus.act_pertemuan_3", 
			"jadwal_kursus.pertemuan_4", 
			"jadwal_kursus.act_pertemuan_4", 
			"jadwal_kursus.pertemuan_5", 
			"jadwal_kursus.act_pertemuan_5", 
			"jadwal_kursus.pertemuan_6", 
			"jadwal_kursus.act_pertemuan_6", 
			"jadwal_kursus.pertemuan_7", 
			"jadwal_kursus.act_pertemuan_7");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				jadwal_kursus.id LIKE ? OR 
				jadwal_kursus.user_id LIKE ? OR 
				user.nama LIKE ? OR 
				user.foto LIKE ? OR 
				paket_kursus.nama_paket LIKE ? OR 
				paket_kursus.pertemuan LIKE ? OR 
				jadwal_kursus.nama_paket_id LIKE ? OR 
				jadwal_kursus.pertemuan_1 LIKE ? OR 
				jadwal_kursus.act_pertemuan_1 LIKE ? OR 
				jadwal_kursus.pertemuan_2 LIKE ? OR 
				jadwal_kursus.act_pertemuan_2 LIKE ? OR 
				jadwal_kursus.pertemuan_3 LIKE ? OR 
				jadwal_kursus.act_pertemuan_3 LIKE ? OR 
				jadwal_kursus.pertemuan_4 LIKE ? OR 
				jadwal_kursus.act_pertemuan_4 LIKE ? OR 
				jadwal_kursus.pertemuan_5 LIKE ? OR 
				jadwal_kursus.act_pertemuan_5 LIKE ? OR 
				jadwal_kursus.pertemuan_6 LIKE ? OR 
				jadwal_kursus.act_pertemuan_6 LIKE ? OR 
				jadwal_kursus.pertemuan_7 LIKE ? OR 
				jadwal_kursus.act_pertemuan_7 LIKE ? OR 
				user.email LIKE ? OR 
				user.password LIKE ? OR 
				user.user_role_id LIKE ? OR 
				paket_kursus.id LIKE ? OR 
				paket_kursus.durasi LIKE ? OR 
				paket_kursus.harga LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "jadwal_kursus/search.php";
		}
		$db->join("user", "jadwal_kursus.user_id = user.id", "INNER");
		$db->join("paket_kursus", "jadwal_kursus.nama_paket_id = paket_kursus.id", "INNER");
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("jadwal_kursus.id", ORDER_TYPE);
		}
		if($fieldname){
			$db->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$tc = $db->withTotalCount();
		$records = $db->get($tablename, $pagination, $fields);
		$records_count = count($records);
		$total_records = intval($tc->totalCount);
		$page_limit = $pagination[1];
		$total_pages = ceil($total_records / $page_limit);
		$data = new stdClass;
		$data->records = $records;
		$data->record_count = $records_count;
		$data->total_records = $total_records;
		$data->total_page = $total_pages;
		if($db->getLastError()){
			$this->set_page_error();
		}
		$page_title = $this->view->page_title = "Jadwal Kursus";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("jadwal_kursus/list.php", $data); //render the full page
	}
	/**
     * View record detail 
	 * @param $rec_id (select record by table primary key) 
     * @param $value value (select record by value of field name(rec_id))
     * @return BaseView
     */
	function view($rec_id = null, $value = null){
		$request = $this->request;
		$db = $this->GetModel();
		$rec_id = $this->rec_id = urldecode($rec_id);
		$tablename = $this->tablename;
		$fields = array("jadwal_kursus.id", 
			"user.nama AS user_nama", 
			"user.foto AS user_foto", 
			"paket_kursus.nama_paket AS paket_kursus_nama_paket", 
			"paket_kursus.pertemuan AS paket_kursus_pertemuan", 
			"jadwal_kursus.pertemuan_1", 
			"jadwal_kursus.act_pertemuan_1", 
			"jadwal_kursus.pertemuan_2", 
			"jadwal_kursus.act_pertemuan_2", 
			"jadwal_kursus.pertemuan_3", 
			"jadwal_kursus.act_pertemuan_3", 
			"jadwal_kursus.pertemuan_4", 
			"jadwal_kursus.act_pertemuan_4", 
			"jadwal_kursus.pertemuan_5", 
			"jadwal_kursus.act_pertemuan_5", 
			"jadwal_kursus.pertemuan_6", 
			"jadwal_kursus.act_pertemuan_6", 
			"jadwal_kursus.pertemuan_7", 
			"jadwal_kursus.act_pertemuan_7");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("jadwal_kursus.id", $rec_id);; //select record based on primary key
		}
		$db->join("user", "jadwal_kursus.user_id = user.id", "INNER ");
		$db->join("paket_kursus", "jadwal_kursus.nama_paket_id = paket_kursus.id", "INNER ");  
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "View  Jadwal Kursus";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		}
		else{
			if($db->getLastError()){
				$this->set_page_error();
			}
			else{
				$this->set_page_error("No record found");
			}
		}
		return $this->render_view("jadwal_kursus/view.php", $record);
	}
	/**
     * Insert new record to the database table
	 * @param $formdata array() from $_POST
     * @return BaseView
     */
	function add($formdata = null){
		if($formdata){
			$db = $this->GetModel();
			$tablename = $this->tablename;
			$request = $this->request;
			//fillable fields
			$fields = $this->fields = array("user_id","nama_paket_id","pertemuan_1","act_pertemuan_1","pertemuan_2","act_pertemuan_2","pertemuan_3","act_pertemuan_3","pertemuan_4","act_pertemuan_4","pertemuan_5","act_pertemuan_5","pertemuan_6","act_pertemuan_6","pertemuan_7","act_pertemuan_7");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'user_id' => 'required',
				'nama_paket_id' => 'required',
				'pertemuan_1' => 'required',
				'act_pertemuan_1' => 'required',
				'pertemuan_2' => 'required',
				'act_pertemuan_2' => 'required',
				'pertemuan_3' => 'required',
				'act_pertemuan_3' => 'required',
				'act_pertemuan_4' => 'required',
				'act_pertemuan_5' => 'required',
				'act_pertemuan_6' => 'required',
				'act_pertemuan_7' => 'required',
			);
			$this->sanitize_array = array(
				'user_id' => 'sanitize_string',
				'nama_paket_id' => 'sanitize_string',
				'pertemuan_1' => 'sanitize_string',
				'act_pertemuan_1' => 'sanitize_string',
				'pertemuan_2' => 'sanitize_string',
				'act_pertemuan_2' => 'sanitize_string',
				'pertemuan_3' => 'sanitize_string',
				'act_pertemuan_3' => 'sanitize_string',
				'pertemuan_4' => 'sanitize_string',
				'act_pertemuan_4' => 'sanitize_string',
				'pertemuan_5' => 'sanitize_string',
				'act_pertemuan_5' => 'sanitize_string',
				'pertemuan_6' => 'sanitize_string',
				'act_pertemuan_6' => 'sanitize_string',
				'pertemuan_7' => 'sanitize_string',
				'act_pertemuan_7' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("jadwal_kursus");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Jadwal Kursus";
		$this->render_view("jadwal_kursus/add.php");
	}
	/**
     * Update table record with formdata
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function edit($rec_id = null, $formdata = null){
		$request = $this->request;
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		 //editable fields
		$fields = $this->fields = array("id","user_id","nama_paket_id","pertemuan_1","act_pertemuan_1","pertemuan_2","act_pertemuan_2","pertemuan_3","act_pertemuan_3","pertemuan_4","act_pertemuan_4","pertemuan_5","act_pertemuan_5","pertemuan_6","act_pertemuan_6","pertemuan_7","act_pertemuan_7");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'user_id' => 'required',
				'nama_paket_id' => 'required',
				'pertemuan_1' => 'required',
				'act_pertemuan_1' => 'required',
				'pertemuan_2' => 'required',
				'act_pertemuan_2' => 'required',
				'pertemuan_3' => 'required',
				'act_pertemuan_3' => 'required',
				'act_pertemuan_4' => 'required',
				'act_pertemuan_5' => 'required',
				'act_pertemuan_6' => 'required',
				'act_pertemuan_7' => 'required',
			);
			$this->sanitize_array = array(
				'user_id' => 'sanitize_string',
				'nama_paket_id' => 'sanitize_string',
				'pertemuan_1' => 'sanitize_string',
				'act_pertemuan_1' => 'sanitize_string',
				'pertemuan_2' => 'sanitize_string',
				'act_pertemuan_2' => 'sanitize_string',
				'pertemuan_3' => 'sanitize_string',
				'act_pertemuan_3' => 'sanitize_string',
				'pertemuan_4' => 'sanitize_string',
				'act_pertemuan_4' => 'sanitize_string',
				'pertemuan_5' => 'sanitize_string',
				'act_pertemuan_5' => 'sanitize_string',
				'pertemuan_6' => 'sanitize_string',
				'act_pertemuan_6' => 'sanitize_string',
				'pertemuan_7' => 'sanitize_string',
				'act_pertemuan_7' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("jadwal_kursus.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("jadwal_kursus");
				}
				else{
					if($db->getLastError()){
						$this->set_page_error();
					}
					elseif(!$numRows){
						//not an error, but no record was updated
						$page_error = "No record updated";
						$this->set_page_error($page_error);
						$this->set_flash_msg($page_error, "warning");
						return	$this->redirect("jadwal_kursus");
					}
				}
			}
		}
		$db->where("jadwal_kursus.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Jadwal Kursus";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("jadwal_kursus/edit.php", $data);
	}
	/**
     * Update single field
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function editfield($rec_id = null, $formdata = null){
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		//editable fields
		$fields = $this->fields = array("id","user_id","nama_paket_id","pertemuan_1","act_pertemuan_1","pertemuan_2","act_pertemuan_2","pertemuan_3","act_pertemuan_3","pertemuan_4","act_pertemuan_4","pertemuan_5","act_pertemuan_5","pertemuan_6","act_pertemuan_6","pertemuan_7","act_pertemuan_7");
		$page_error = null;
		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;
			$postdata = $this->format_request_data($postdata);
			$this->rules_array = array(
				'user_id' => 'required',
				'nama_paket_id' => 'required',
				'pertemuan_1' => 'required',
				'act_pertemuan_1' => 'required',
				'pertemuan_2' => 'required',
				'act_pertemuan_2' => 'required',
				'pertemuan_3' => 'required',
				'act_pertemuan_3' => 'required',
				'act_pertemuan_4' => 'required',
				'act_pertemuan_5' => 'required',
				'act_pertemuan_6' => 'required',
				'act_pertemuan_7' => 'required',
			);
			$this->sanitize_array = array(
				'user_id' => 'sanitize_string',
				'nama_paket_id' => 'sanitize_string',
				'pertemuan_1' => 'sanitize_string',
				'act_pertemuan_1' => 'sanitize_string',
				'pertemuan_2' => 'sanitize_string',
				'act_pertemuan_2' => 'sanitize_string',
				'pertemuan_3' => 'sanitize_string',
				'act_pertemuan_3' => 'sanitize_string',
				'pertemuan_4' => 'sanitize_string',
				'act_pertemuan_4' => 'sanitize_string',
				'pertemuan_5' => 'sanitize_string',
				'act_pertemuan_5' => 'sanitize_string',
				'pertemuan_6' => 'sanitize_string',
				'act_pertemuan_6' => 'sanitize_string',
				'pertemuan_7' => 'sanitize_string',
				'act_pertemuan_7' => 'sanitize_string',
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("jadwal_kursus.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount();
				if($bool && $numRows){
					return render_json(
						array(
							'num_rows' =>$numRows,
							'rec_id' =>$rec_id,
						)
					);
				}
				else{
					if($db->getLastError()){
						$page_error = $db->getLastError();
					}
					elseif(!$numRows){
						$page_error = "No record updated";
					}
					render_error($page_error);
				}
			}
			else{
				render_error($this->view->page_error);
			}
		}
		return null;
	}
	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
     * @return BaseView
     */
	function delete($rec_id = null){
		Csrf::cross_check();
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$this->rec_id = $rec_id;
		//form multiple delete, split record id separated by comma into array
		$arr_rec_id = array_map('trim', explode(",", $rec_id));
		$db->where("jadwal_kursus.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("jadwal_kursus");
	}
}
