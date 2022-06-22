<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard_model extends CI_Model {

    function add($post) {
        $username = $this->session->userdata('username');
        $data['title'] = $post['title'];
        $data['content'] = $post['content'];
        $data['username'] = $username;
        $data['date'] = date("Y-m-d H:i:s");
        $this->db->insert('post', $data);
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
        $data['title'] = $post['title'];
        $data['content'] = $post['content'];
        $data['username'] = $username;
        $data['date'] = date("Y-m-d H:i:s");
        $this->db->where("idpost", $id);
        $this->db->update('post', $data);
    }

    function delete($id) {
        $this->db->where("idpost", $id);
        $this->db->delete("post");
    }

    function get_data() {
        $this->db->select("*")->from("post");
        $q = $this->db->get()->result_array();
        return $q;
    }

}