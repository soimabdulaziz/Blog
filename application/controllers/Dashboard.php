<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct() {
		parent::__construct();
		check_not_login();
		$this->load->model('dashboard_model');
	}
	public function index()
	{
		$data['blog'] = $this->dashboard_model->get_data();
		$this->template->load('template', 'dashboard/dashboard', $data);
	}

	public function detail() {
		$data['blog'] = $this->dashboard_model->get_post();
		$this->template->load('template','dashboard/detail_blog', @$data);
	}

	function add(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');

		$this->form_validation->set_message('required', '%s Harus Diisi!');

		$this->form_validation->set_error_delimiters('<span class="help-block">' , '</span>');
		$id = $this->uri->segment(3);

		if ($this->form_validation->run() == FALSE) {
			$this->db->select("*")->from("post");
			$this->db->where("idpost", $id);
			$q = $this->db->get();
			$d = $q->result_array();
			@$data['d'] = $d[0];
			$this->template->load('template','dashboard/add_blog', @$data);

		} else {
			$post = $this->input->post(null, TRUE);
			if(empty($id)){
				$this->dashboard_model->add($post);
				$this->session->set_flashdata('success', 'Data berhasil disimpan');
				redirect("Dashboard");
			} else{
				$this->dashboard_model->edit($post);
				$this->session->set_flashdata('success', 'Data berhasil diupdate');
				redirect("dashboard");
			}
		}
	}
	function delete(){
		$id=$this->uri->segment(3);
		$this->dashboard_model->delete($id);
		$this->session->set_flashdata('delete', 'Data berhasil dihapus');
		redirect("dashboard");
	}

}
