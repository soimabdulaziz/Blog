<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	function __construct() {
		parent::__construct();
		check_not_login();
		$this->load->model('Account_model');
	}
	public function index()
	{
		$data['account'] = $this->Account_model->get_data();
		$this->template->load('template', 'Account/Account', $data);
	}

	public function detail() {
		$data['blog'] = $this->Account_model->get_post();
		$this->template->load('template','Account/detail_blog', @$data);
	}

	function add(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('role', 'Role', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');

		$this->form_validation->set_message('required', '%s Harus Diisi!');

		$this->form_validation->set_error_delimiters('<span class="help-block">' , '</span>');
		$id = $this->uri->segment(3);

		if ($this->form_validation->run() == FALSE) {
			$this->db->select("*")->from("account");
			$this->db->where("username", $id);
			$q = $this->db->get();
			$d = $q->result_array();
			@$data['d'] = $d[0];
			$this->template->load('template','Account/account_add', @$data);

		} else {
			$post = $this->input->post(null, TRUE);
			if(empty($id)){
				$this->Account_model->add($post);
				$this->session->set_flashdata('success', 'Data berhasil disimpan');
				redirect("Account");
			} else{
				$this->Account_model->edit($post);
				$this->session->set_flashdata('success', 'Data berhasil diupdate');
				redirect("Account");
			}
		}
	}
	function delete(){
		$id=$this->uri->segment(3);
		$this->Account_model->delete($id);
		$this->session->set_flashdata('delete', 'Data berhasil dihapus');
		redirect("Account");
	}

}
