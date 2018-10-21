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
 
    public function tambah($data){
        $res = $this->db->insert('sampah', $data); // Kode ini digunakan untuk memasukan record baru kedalam sebuah tabel
        return $res; // Kode ini digunakan untuk mengembalikan hasil $res
    }
 
    public function update($data, $where){
        $this->db->where('id_sampah',$where);
        $res = $this->db->update('sampah',$data); // Kode ini digunakan untuk merubah record yang sudah ada dalam sebuah tabel
        return $res;
    }
 
    public function hapus($where){
        $this->db->where('id_sampah',$where);
        $res = $this->db->delete('sampah'); // Kode ini digunakan untuk menghapus record yang sudah ada

        return;
    }

}
?>