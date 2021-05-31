<?php 
/**
 * Formulir_pendaftaran Page Controller
 * @category  Controller
 */
class Formulir_pendaftaranController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "formulir_pendaftaran";
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
		$fields = array("formulir_pendaftaran.id", 
			"user.nama AS user_nama", 
			"formulir_pendaftaran.nama_lengkap", 
			"formulir_pendaftaran.alasan_mengikuti_kursus", 
			"paket_kursus.nama_paket AS paket_kursus_nama_paket", 
			"paket_kursus.harga AS paket_kursus_harga", 
			"paket_kursus.pertemuan AS paket_kursus_pertemuan", 
			"formulir_pendaftaran.harga_pendaftaran");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				formulir_pendaftaran.id LIKE ? OR 
				formulir_pendaftaran.user_id LIKE ? OR 
				user.nama LIKE ? OR 
				formulir_pendaftaran.id_paket_kursus LIKE ? OR 
				formulir_pendaftaran.nama_lengkap LIKE ? OR 
				formulir_pendaftaran.alamat LIKE ? OR 
				formulir_pendaftaran.pekerjaan LIKE ? OR 
				formulir_pendaftaran.alasan_mengikuti_kursus LIKE ? OR 
				formulir_pendaftaran.umur LIKE ? OR 
				formulir_pendaftaran.bukti_pembayaran LIKE ? OR 
				formulir_pendaftaran.is_active LIKE ? OR 
				paket_kursus.nama_paket LIKE ? OR 
				paket_kursus.harga LIKE ? OR 
				paket_kursus.pertemuan LIKE ? OR 
				formulir_pendaftaran.harga_pendaftaran LIKE ? OR 
				user.email LIKE ? OR 
				user.password LIKE ? OR 
				user.foto LIKE ? OR 
				user.user_role_id LIKE ? OR 
				paket_kursus.id LIKE ? OR 
				paket_kursus.durasi LIKE ? OR 
				formulir_pendaftaran.no_telpon LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "formulir_pendaftaran/search.php";
		}
		$db->join("user", "formulir_pendaftaran.user_id = user.id", "INNER");
		$db->join("paket_kursus", "formulir_pendaftaran.id_paket_kursus = paket_kursus.id", "INNER");
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("formulir_pendaftaran.id", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Formulir Pendaftaran";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("formulir_pendaftaran/list.php", $data); //render the full page
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
		$fields = array("user.foto AS user_foto", 
			"formulir_pendaftaran.id", 
			"user.nama AS user_nama", 
			"formulir_pendaftaran.nama_lengkap", 
			"user.email AS user_email", 
			"formulir_pendaftaran.alamat", 
			"formulir_pendaftaran.pekerjaan", 
			"formulir_pendaftaran.alasan_mengikuti_kursus", 
			"formulir_pendaftaran.umur", 
			"formulir_pendaftaran.no_telpon", 
			"paket_kursus.nama_paket AS paket_kursus_nama_paket", 
			"paket_kursus.durasi AS paket_kursus_durasi", 
			"paket_kursus.pertemuan AS paket_kursus_pertemuan", 
			"paket_kursus.harga AS paket_kursus_harga", 
			"formulir_pendaftaran.harga_pendaftaran", 
			"formulir_pendaftaran.bukti_pembayaran");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("formulir_pendaftaran.id", $rec_id);; //select record based on primary key
		}
		$db->join("user", "formulir_pendaftaran.user_id = user.id", "INNER ");
		$db->join("paket_kursus", "formulir_pendaftaran.id_paket_kursus = paket_kursus.id", "INNER ");  
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "View  Formulir Pendaftaran";
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
		return $this->render_view("formulir_pendaftaran/view.php", $record);
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
			$fields = $this->fields = array("user_id","id_paket_kursus","nama_lengkap","alamat","pekerjaan","alasan_mengikuti_kursus","umur","no_telpon","harga_pendaftaran","bukti_pembayaran");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'id_paket_kursus' => 'required',
				'nama_lengkap' => 'required',
				'alamat' => 'required',
				'pekerjaan' => 'required',
				'alasan_mengikuti_kursus' => 'required',
				'umur' => 'required|numeric',
				'no_telpon' => 'required|numeric',
				'harga_pendaftaran' => 'required|numeric',
				'bukti_pembayaran' => 'required',
			);
			$this->sanitize_array = array(
				'id_paket_kursus' => 'sanitize_string',
				'nama_lengkap' => 'sanitize_string',
				'alamat' => 'sanitize_string',
				'pekerjaan' => 'sanitize_string',
				'alasan_mengikuti_kursus' => 'sanitize_string',
				'umur' => 'sanitize_string',
				'no_telpon' => 'sanitize_string',
				'harga_pendaftaran' => 'sanitize_string',
				'bukti_pembayaran' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['user_id'] = USER_ID;
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("formulir_pendaftaran/view/$rec_id");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Formulir Pendaftaran";
		$this->render_view("formulir_pendaftaran/add.php");
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
		$fields = $this->fields = array("id","user_id","id_paket_kursus","nama_lengkap","alamat","pekerjaan","alasan_mengikuti_kursus","umur","no_telpon","harga_pendaftaran","bukti_pembayaran");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'id_paket_kursus' => 'required',
				'nama_lengkap' => 'required',
				'alamat' => 'required',
				'pekerjaan' => 'required',
				'alasan_mengikuti_kursus' => 'required',
				'umur' => 'required|numeric',
				'no_telpon' => 'required|numeric',
				'harga_pendaftaran' => 'required|numeric',
				'bukti_pembayaran' => 'required',
			);
			$this->sanitize_array = array(
				'id_paket_kursus' => 'sanitize_string',
				'nama_lengkap' => 'sanitize_string',
				'alamat' => 'sanitize_string',
				'pekerjaan' => 'sanitize_string',
				'alasan_mengikuti_kursus' => 'sanitize_string',
				'umur' => 'sanitize_string',
				'no_telpon' => 'sanitize_string',
				'harga_pendaftaran' => 'sanitize_string',
				'bukti_pembayaran' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['user_id'] = USER_ID;
			if($this->validated()){
				$db->where("formulir_pendaftaran.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("formulir_pendaftaran");
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
						return	$this->redirect("formulir_pendaftaran");
					}
				}
			}
		}
		$db->where("formulir_pendaftaran.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Formulir Pendaftaran";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("formulir_pendaftaran/edit.php", $data);
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
		$fields = $this->fields = array("id","user_id","id_paket_kursus","nama_lengkap","alamat","pekerjaan","alasan_mengikuti_kursus","umur","no_telpon","harga_pendaftaran","bukti_pembayaran");
		$page_error = null;
		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;
			$postdata = $this->format_request_data($postdata);
			$this->rules_array = array(
				'id_paket_kursus' => 'required',
				'nama_lengkap' => 'required',
				'alamat' => 'required',
				'pekerjaan' => 'required',
				'alasan_mengikuti_kursus' => 'required',
				'umur' => 'required|numeric',
				'no_telpon' => 'required|numeric',
				'harga_pendaftaran' => 'required|numeric',
				'bukti_pembayaran' => 'required',
			);
			$this->sanitize_array = array(
				'id_paket_kursus' => 'sanitize_string',
				'nama_lengkap' => 'sanitize_string',
				'alamat' => 'sanitize_string',
				'pekerjaan' => 'sanitize_string',
				'alasan_mengikuti_kursus' => 'sanitize_string',
				'umur' => 'sanitize_string',
				'no_telpon' => 'sanitize_string',
				'harga_pendaftaran' => 'sanitize_string',
				'bukti_pembayaran' => 'sanitize_string',
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("formulir_pendaftaran.id", $rec_id);;
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
		$db->where("formulir_pendaftaran.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("formulir_pendaftaran");
	}
}
