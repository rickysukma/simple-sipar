<?php 

class M_login extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}

	 public function s_userdata($table,$where){ //user
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);

        // $query = $this->db->get();
        // if ($query->num_rows() > 0 ) {
        //     $results = $query->result();
        // } else {
        //     return 0;
        // }
        $this->db->order_by('iduser','desc');
        $res = $this->db->get();
        return $res->result_array();
        
    }	
}