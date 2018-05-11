<?php
/**
 * Created by PhpStorm.
 * User: Štefinka
 * Date: 04.05.2018
 * Time: 15:07
 */

class Hrady_model extends CI_Model
{
    public function get_hrady()
    {
        return $this->db->get("hrady");
    }

    function getRows($id = "")
    {
        if (!empty($id)) {
            $query = $this->db->get_where('hrady', array('id' => $id));
            return $query->row_array();
        } else {
            $query = $this->db->get('hrady');
            return $query->result_array();
        }
    }

    // vlozenie zaznamu
    public function insert($data = array())
    {
        $insert = $this->db->insert('hrady', $data);
        if ($insert) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    // aktualizacia zaznamu
    public function update($data, $id)
    {
        if (!empty($data) && !empty($id)) {
            $update = $this->db->update('hrady', $data,
                array('id' => $id));
            return $update ? true : false;
        } else {
            return false;
        }
    }

    // odstranenie zaznamu
    public function delete($id){
        $delete = $this->db->delete('hrady',array('id'=>$id));
        return $delete?true:false;
    }
}