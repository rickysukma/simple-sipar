<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Maininfo extends CI_Model{

    public function get_wisata(){
        $this->db->select('*');
        $this->db->from('maininfo wisata');
        $this->db->join('city kota','kota.idcity=wisata.idcity','left');
        $this->db->order_by('idmaininfo','desc');
        $res=$this->db->get(); // Kode ini berfungsi untuk memilih tabel yang akan ditampilkan
        return $res->result_array(); // Kode ini digunakan untuk mengembalikan hasil operasi $res menjadi sebuah array
    }

    public function get_wisata_bykota($id){
        $this->db->select('*');
        $this->db->from('maininfo wisata');
        $this->db->join('city kota','kota.idcity=wisata.idcity','left');
        $this->db->where('wisata.idcity',$id);
        $this->db->order_by('idmaininfo','desc');
        $res=$this->db->get(); // Kode ini berfungsi untuk memilih tabel yang akan ditampilkan
        return $res->result_array(); // Kode ini digunakan untuk mengembalikan hasil operasi $res menjadi sebuah array
    }

    public function count_wisata(){
        $this->db->select('*');
        $this->db->from('maininfo');
        $cnt = $this->db->count_all_results();
    }

    public function gethotel_by($id){ //hotel
        $this->db->select('*');
        $this->db->from('info_ads');
        $this->db->where('idmaininfo',$id);
        $this->db->where('status','0');
        $this->db->where('idcat','1');
        // $query = $this->db->get();
        // if ($query->num_rows() > 0 ) {
        //     $results = $query->result();
        // } else {
        //     return 0;
        // }
        $this->db->order_by('idinfoads','desc');
        $res = $this->db->get();
        return $res->result_array();
        
    }

    public function getevent_by($id){ //event
        $this->db->select('*');
        $this->db->from('info_ads');
        $this->db->where('idmaininfo',$id);
        $this->db->where('status','0');
        $this->db->where('idcat','3');
        $this->db->order_by('idinfoads','desc');
        $res = $this->db->get();
        return $res->result_array();
        
    }

    public function getkat(){
        $this->db->select('*');
        $this->db->from('cat_ads');
        $this->db->order_by('idcat','desc');
        $res = $this->db->get();
        return $res->result_array();
    }

    public function getkota_by($id){ //event
        $this->db->select('*');
        $this->db->from('city');
        $this->db->where('idcity',$id);
        $res = $this->db->get();
        return $res->result_array();
        
    }

    public function getinfoads(){
        $this->db->select('*');
        $this->db->from('info_ads');
        $this->db->join('cat_ads','cat_ads.idcat=info_ads.idcat','left');
        $this->db->order_by('idinfoads','asc');
        $res = $this->db->get();
        return $res->result_array();

    }

    public function getkuliner_by($id){ //kuliner
        $this->db->select('*');
        $this->db->from('info_ads');
        $this->db->where('idmaininfo',$id);
        $this->db->where('status','0');
        $this->db->where('idcat','2');

        // $query = $this->db->get();
        // if ($query->num_rows() > 0 ) {
        //     $results = $query->result();
        // } else {
        //     return 0;
        // }
        $this->db->order_by('idinfoads','desc');
        $res = $this->db->get();
        return $res->result_array();
        
    }

    public function getinfoads_by($id){ //kuliner
        $this->db->select('*');
        $this->db->from('info_ads');
        $this->db->where('idinfoads',$id);
        $this->db->order_by('idinfoads','desc');
        $res = $this->db->get();
        return $res->result_array();
        
    }

    public function get_wisata_byid($id){
        $this->db->select('*');
        $this->db->from('maininfo wisata');
        $this->db->join('city kota','kota.idcity=wisata.idcity','left');
        $this->db->where('wisata.idmaininfo',$id);
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            $results = $query->result();
            return $results;
        }else{
            return 0;
        }
    }


    public function get_kota(){
        $this->db->select('*');
        $this->db->from('city');
        $res=$this->db->get();
        return $res->result_array();

    }

    // --------------------------------------------------------------------------------------//

    // Upload image
    // -------------------------------------------------------------------------------------- //
 
    public function tambah_maininfo($data){
        $res = $this->db->insert('maininfo', $data); // Kode ini digunakan untuk memasukan record baru kedalam sebuah tabel
        return $res; // Kode ini digunakan untuk mengembalikan hasil $res
    }

    public function tambah_kota($data){
        $res = $this->db->insert('city', $data); // Kode ini digunakan untuk memasukan record baru kedalam sebuah tabel
        return $res; // Kode ini digunakan untuk mengembalikan hasil $res
    }

    public function tambah_ads($data){
        $res = $this->db->insert('info_ads',$data);
        return $res;
    }

    public function update_ads($data,$where){
        $this->db->where('idinfoads',$where);
        $res = $this->db->update('info_ads',$data);
        return $res;
    }
 
    public function update_kota($data, $where){
        $this->db->where('idcity',$where);
        $res = $this->db->update('city',$data); // Kode ini digunakan untuk merubah record yang sudah ada dalam sebuah tabel
        return $res;
    }

    public function update_wisata($data,$where){
        $this->db->where('idmaininfo',$where);
        $res = $this->db->update('maininfo',$data);
        return $res;
    }
 
    public function hapus_kota($where){
        $this->db->where('idcity',$where);
        $res = $this->db->delete('city'); // Kode ini digunakan untuk menghapus record yang sudah ada

        return;
    }

    public function hapus_wisata($where){
        $this->db->where('idmaininfo',$where);
        $res = $this->db->delete('maininfo'); // Kode ini digunakan untuk menghapus record yang sudah ada

        return;
    }

}
?>