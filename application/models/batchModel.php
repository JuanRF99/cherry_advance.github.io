<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BatchModel extends CI_Model{
    public function save_batch($data)
    {
        return $this->db->insert_batch('employeelaverequestdetails',$data);
    }

    public function updates($table,$data,$where)
    {
        return $this->db->update($table,$data,$where);
    }

}