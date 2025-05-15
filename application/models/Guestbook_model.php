<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property CI_DB_query_builder $db
 */ 

class Guestbook_model extends CI_Model {

    public function insert_guest($data) {
        $this->db->insert('guests', $data);
    }

    public function get_all_guests() {
        return $this->db->order_by('created_at', 'DESC')->get('guests')->result();
    }

    public function get_filtered_guests($start_date = null, $end_date = null) {
        if ($start_date) {
            $this->db->where('DATE(created_at) >=', $start_date);
        }
        if ($end_date) {
            $this->db->where('DATE(created_at) <=', $end_date);
        }

        return $this->db->order_by('created_at', 'DESC')->get('guests')->result();
    }
}