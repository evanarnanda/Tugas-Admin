<?php 
/**
 * 
 */
class modelUtama extends CI_Model
{
	
	public function getAllData(){
		$query = $this->db->get('user');
		//Check if Data Exists
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function addData(){
		

		$field = [
			'name' => htmlspecialchars($this -> input -> post('name', true)),
			'email' => htmlspecialchars($this -> input -> post('email', true)),
			'password' => password_hash($this -> input -> post('password'), PASSWORD_DEFAULT),
			'role_id' => 2,
			'is_active' => 0,
			'date_created' => time()
		];
		$this->db->insert('user',$field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function editData(){
		$id = $this->input->get('id');
		$this->db->where('id',$id);
		$query = $this->db->get('user');

		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updateData(){
		$id = $this->input->post('detectId');
			$field = [
			'name' => htmlspecialchars($this->input->post('name',true)),
			'email' => htmlspecialchars($this->input->post('email',true)),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
		];
		$this->db->where('id',$id);
		$this->db->update('user', $field);

		if($this->db->affected_rows() > 0 ){
			return true;
		}else{
			return false;
		}
	}

	function deleteData(){
		$id = $this->input->get('id');
		$this->db->where('id',$id);
		$this->db->delete('user');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
}
 ?>