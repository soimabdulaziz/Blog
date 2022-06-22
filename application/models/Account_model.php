<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model {

    function add($post) {
        $username = $this->session->userdata('username');
        $data['username'] = $post['username'];
        $data['role'] = $post['role'];
        $data['password'] = $post['password'];
        $data['name'] = $post['name'];
        $this->db->insert('account', $data);
    }

    function get_post() {
        $id = $this->uri->segment(3);
        $this->db->where("idpost", $id);
        $this->db->select("*")->from("post");
        $q = $this->db->get()->result_array();
        return $q;
    }
    function edit($post) {
        $username = $this->session->userdata('username');
        $id= $this->uri->segment(3);
        $data['username'] = $post['username'];
        $data['role'] = $post['role'];
        $data['password'] = $post['password'];
        $data['name'] = $post['name'];
        $this->db->where("username", $id);
        $this->db->update('account', $data);
    }

    function delete($id) {
        $this->db->where("username", $id);
        $this->db->delete("account");
    }

    function get_data() {
        $this->db->select("*")->from("account");
        $q = $this->db->get()->result_array();
        return $q;
    }

}