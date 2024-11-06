<?php
class Item_model extends CI_Model {

    // Constructor
    function __construct(){
        parent::__construct();
    }

    // Insert data into t_model
    function insert_item($data){
        return $this->db->insert('t_model', $data);
    }

    // Select all data from t_model
    function select_all(){
        $this->db->select('*');
        $this->db->from('t_model');
        $this->db->order_by('kd_model', 'desc');
        return $this->db->get();
    }

    /**
     * Select data by kode model (used for searching)
     */
    function select_by_kode($kd_model){
        $this->db->select('*');
        $this->db->from('t_model');
        $this->db->where("(LOWER(kd_model) LIKE '%{$kd_model}%')");
        return $this->db->get();
    }

    // Select data by id (kd_model)
    function select_by_id($kd_model){
        $this->db->select('*');
        $this->db->from('t_model');
        $this->db->where('kd_model', $kd_model);
        return $this->db->get();
    }

    // Update data in t_model
    function update_item($kd_model, $data){
        $this->db->where('kd_model', $kd_model);
        $this->db->update('t_model', $data);
    }

    // Delete data from t_model
    function delete_item($kd_model){
        $this->db->where('kd_model', $kd_model);
        $this->db->delete('t_model');
    }

    // Function for pagination (select with limit and offset)
    function select_all_paging($limit = array()){
        $this->db->select('*');
        $this->db->from('t_model');
        
        if ($limit != NULL) {
            $this->db->limit($limit['perpage'], $limit['offset']);
        }
        
        return $this->db->get();
    }

    // Count total rows in t_model
    function jumlah_item(){
        $this->db->select('*');
        $this->db->from('t_model');
        return $this->db->count_all_results();
    }

    // Export data from t_model
    function eksport_data() {
        $this->db->select('kd_model, nama_model, deskripsi');
        $this->db->from('t_model');
        return $this->db->get();
    }
}
?>
