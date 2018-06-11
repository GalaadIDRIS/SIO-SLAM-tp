<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beneficiaire_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }


    public function get_beneficiaire()
    {
        $query = $this->db->get('beneficiaire');

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
    }
    
    function save($additional_data)
    {
        if($this->db->insert('beneficiaire',$additional_data))
                return true;
        else
            return false;
    }
    
    public function get_beneficiaire_by_id($id)
    {
        $this->db->where("beneficiaire.id=$id");
        $query = $this->db->get('beneficiaire');

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
    }
    
    
    public function count_monoparental()
    {
        $this->db->where("beneficiaire.monoparental=1");
        $query = $this->db->get('beneficiaire');

        if ($query->num_rows() > 0)
        {
            return count($query->result_array());
        }
        else
        {
            return 0;
        }
    }
    
    function delete_beneficiaire($id){
                $delete_qry = "DELETE from beneficiaire
        WHERE beneficiaire.id = $id";

        $this->db->query($delete_qry);
    }

    public function update($data,$id)
    {
        $where = "id = ".$id;

        return $this->db->update('beneficiaire', $data, $where);
    }

}
