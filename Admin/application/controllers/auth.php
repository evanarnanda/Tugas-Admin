<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * 
 */
class auth extends CI_Controller
{
	public function __construct()
	{
		# code...
		parent::__construct();
		$this -> load -> library('form_validation'); 
		$this->load->model('modelUtama');
	}
	

	public function index()
	{
		# code...
		$this -> form_validation -> set_rules('email', 'Email', 'trim|required|valid_email');
		$this -> form_validation -> set_rules('password', 'Password', 'trim|required');
		if ($this -> form_validation ->run() == false) {
			# code...
		$data['title'] = 'Login page';
		$this -> load -> view('templates/auth_header',$data);
		$this -> load -> view('login');
		$this -> load -> view('templates/auth_footer');	
		}else{
			$this -> _login();
		}
		
	}

	private function _login()
	{
		$email = $this -> input -> post('email');
		$password = $this -> input -> post('password');

		$user = $this -> db -> get_where('user', ['email'=> $email]) -> row_array();

		if ($user ) {
			# code...
			$form_response=$this->input->post('g-recaptcha-response');
		   $url="https://www.google.com/recaptcha/api/siteverify";
		   $sitekey="6LfDJaoUAAAAAFELAegLifCQWka874_2bwQKF9zE";
		   $response = file_get_contents($url."?secret=".$sitekey."&response=".$form_response."&remoteip=".$_SERVER["REMOTE_ADDR"]);
		   $data=json_decode($response);
			if (isset($data->success) && $data->success=="true") {
					# code... cek recaptca
			
				if ($user['is_active'] == 1) {
					# code... cek akun

					if (password_verify($password, $user['password'])) {
						# code...cek password

						$data = [
							'email' => $user['email'],
							'role_id' => $user['role_id'],
						];
						$this -> session -> set_userdata($data);
						redirect('dashboard');
					}else{
						$this -> session -> set_flashdata('massage', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
					redirect('auth');

					}

				}else{
					$this -> session -> set_flashdata('massage', '<div class="alert alert-danger" role="alert">This email has not been verify!</div>');
					redirect('auth');
				}
			}else{
				$this->session->set_flashdata('message','<small class="text-danger label-material" role="alert">Please fill the captcha!</small>');
				redirect('auth');
			}

		}else{
			$this -> session -> set_flashdata('massage', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
			redirect('auth');

		}
	}


	public function register()
	{
		# code...
		$this -> form_validation -> set_rules('name', 'Name', 'required|trim');

		$this -> form_validation -> set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',
			[
				'matches' => 'password dont match!',
				'min_length' => 'password to short!'
			]);

		$this -> form_validation -> set_rules('password2', 'Password', 'required|trim|matches[password2]');

		$this -> form_validation -> set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
				'is_unique' => 'This email has already registered'
		]);


		if ($this -> form_validation -> run() == false) {
			# code...
		$data['title'] = 'Halaman register'; 
		$this -> load -> view('templates/auth_header',$data);
		$this -> load -> view('register');
		$this -> load -> view('templates/auth_footer');	
		}

		else{
			$email = $this -> input -> post('email', true);
			$data = [
			'name' => htmlspecialchars($this -> input -> post('name', true)),
			'email' => htmlspecialchars($email),
			'password' => password_hash($this -> input -> post('password1'), PASSWORD_DEFAULT),
			'role_id' => 2,
			'is_active' => 0,
			'date_created' => time()

			];
			$token = base64_encode(random_bytes(32));
			$user_token = [
				'email' => $email,
				'token' => $token,
				'date_created' => time()
			];

			//model lagi
			$this -> db -> insert('user', $data);
			$this -> db -> insert('user_token', $user_token);
			//akhir

			$this -> _sendEmail($token,$email);
   				
   				
			
			$this -> session -> set_flashdata('massage', '<div class="alert alert-success" role="alert">Congratulation registration success, please activate your account!</div>');
			redirect('auth');
			
		}
		
	}
	private function _sendEmail($token,$email)
	{
		$this->load->library('phpmailer_lib');
				$mail = $this->phpmailer_lib->load();
				$mail->isSMTP();
				$mail->Host = 'smtp.gmail.com';
				$mail->SMTPAuth = true;
				$mail->Username = 'iqbal.ramadhan9933@gmail.com';
				$mail->Password = 'hanekawa123';
				$mail->SMTPSecure = 'tls';
				$mail->Port = 587;

				$mail->setFrom('iqbal.ramadhan9933@gmail.com','Admin');
				$mail->addReplyTo('gilang.alans7@gmail.com','Gilang Ramadhan');

				$mail->addAddress($this -> input -> post('email'));

				$mail->Subject = 'Account Verification';

				$mail->isHTML(true);
				$idw = $this->input->post('email');
				$mail->Body = 'Click this link to verify your account <a href='.base_url().'auth/verify?email='. base64_encode($email).'&token='.$token.'>Activate</a>';
				$mail->send();
	}

	public function verify()
	{
		# code...
		//awal model
		$email = base64_decode($this -> input -> get('email'));
		$token = $this ->  input -> get('token');
		
		$user = $this -> db -> get_where('user', ['email'=> $email]) -> row_array();

		$token = $this -> db -> get_where('user_token', ['token'=> $token]) -> row_array();
		//akhir model

		if ($user) {
			# code...
			if ($token) {
				# code...
				#model
				$this -> db ->  set('is_active', 1);
				$this -> db -> where('email', $email);
				$this -> db -> update('user');
				#akhir model
				$this -> session -> set_flashdata('massage', '<div class="alert alert-success" role="alert">your email has been activated!</div>');
					redirect('auth');
			}else{
				$this -> session -> set_flashdata('massage', '<div class="alert alert-danger" role="alert">your token is wrong!</div>');
					redirect('auth');
			}
			
		}else{
			$this -> session -> set_flashdata('massage', '<div class="alert alert-danger" role="alert">account activation failed!</div>');
			redirect('auth'); 
		}
	}


	public function logout()
	{
		# code...
		$this -> session -> unset_userdata('email');
		$this -> session ->unset_userdata('role_id');

		$this -> session -> set_flashdata('massage', '<div class="alert alert-success" role="alert">you have been logout!</div>');
			redirect('auth');
	}
}


 ?>