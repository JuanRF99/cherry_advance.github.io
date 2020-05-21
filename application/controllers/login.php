<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

    // public function __construct() {
	// 	parent::__construct();
	// 	$this->load->model('land_models');
    // }

    public function index()
    {
        $this->load->view('login');
	}
	
	public function authorize($username,$password)
	{
		$this->load->database();
		return $this->db->where(array('username' => $username, 'password' => $password))
				 ->get('appsuseraccount')
				 ->result_array();
	}

    public function auth()
	{
    	$username   = strtolower($this->input->post('username'));
		$password   = md5($this->input->post('password'));
		$result     = $this->authorize($username, $password);
		if ($result) {
			if ($result[0]['status'] == 1) {
				if ($result[0]['rolecode'] == 'ADM') {
					$sess = array(
						'user'		=> $result[0]['code'],
						'nama'	    => $result[0]['name'],
						'empcode'	=> $result[0]['employeecode'],
						'rolecode'	=> $result[0]['rolecode'],
				    	'logged_in' => TRUE
					);
					$this->session->set_userdata($sess);
					redirect('adm');
				}
				if (($result[0]['rolecode'] == 'EMP')) {
					$sess = array(
						'user'		=>	$result[0]['code'],
						'nama'		=> 	$result[0]['name'],
						'empcode'	=>	$result[0]['employeecode'],
						'rolecode'	=>	$result[0]['rolecode'],
						'logged_in'	=>	TRUE
					);
					$this->session->set_userdata($sess);
					redirect('emp');
				}
			}else{
				$this->session->set_flashdata('message', 'Username Anda '.ucwords($username).' Sedang Dinonaktifkan');
				redirect(base_url());
			}
		} else {
			$this->session->set_flashdata('message', 'Kombinasi Username atau Password Salah');
			redirect(base_url('#login_frm'));
		}

	}
	
 function logout()
	{	
		$this->session->sess_destroy();
		redirect('');
	}
}
