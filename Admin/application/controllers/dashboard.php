<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class dashboard extends CI_Controller
{
	
	public function __construct()
	{
		# code...
			parent:: __construct();
			$this -> load -> library('Ciqrcode.php'); 
			$this->load->model('modelUtama');
	}

	public function index()
	{
		# code...
		$data['title'] = 'My Profile';
		$data['user'] = $this -> db -> get_where('user', ['email' => $this -> session -> userdata('email')]) -> row_array();
		$this -> load -> view('templates/header',$data);
		$this -> load -> view('user/index',$data);
		$this -> load -> view('templates/footer');
		
	}
	public function QRcode($kodenya='1234')
	{
		# code...
		QRcode::png(
			$kodenya,
			$outfile = false,
			$level = QR_ECLEVEL_H,
			$size = 5,
			$margin = 2
		);
	}

	public function tabel()
	{
		# code...
		$data['title'] = 'Data user';
		$data['user'] = $this -> db -> get_where('user', ['email' => $this -> session -> userdata('email')]) -> row_array();
		$this -> load -> view('templates/header',$data);
		$this -> load -> view('user/tabel',$data);
		$this -> load -> view('templates/footer');
	}
	public function showAllData(){
		$result = $this->modelUtama->getAllData();
		echo json_encode($result);
	}

	//Ajax Controller Add Data
	public function addNew(){
		$result = $this->modelUtama->addData();
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	//Ajax Controller Edit Data
	public function editData(){
		$result = $this->modelUtama->editData();
		echo json_encode($result);
	}

	public function updateData(){
		$result = $this->modelUtama->updateData();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deleteData(){
		$result = $this->modelUtama->deleteData();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
}
	

 ?>
