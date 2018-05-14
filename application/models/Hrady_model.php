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

    function dajVsetkyStavyHradov(){
        $this->db->distinct();
        $this->db->select('Stav')
            ->from('hrady');

        $query = $this->db->get();
        return $query->result_array();
    }
    function dajVsetkyTypyHradov(){
        $this->db->distinct();
        $this->db->select('Typ')
            ->from('hrady');

        $query = $this->db->get();
        return $query->result_array();
    }

    function dajVstupne($id){
        $this->db->select('*')
            ->from('vstupne')
            ->where('idHrady_a_zamky', $id);

        $query = $this->db->get();
        return $query->result_array();
    }

    function insertHodnotenie(){
        $f1 = $_POST['meno'];
        $f5 = $_POST['idHrad'];
        $f2 = $_POST['rating'];
        $f3 = $_POST['pohlavie'];
        $f4 = date("Y-m-d H:i:s");
        $this->db->query("INSERT INTO rating(meno, idHrad, hodnotenie, pohlavie, datum_a_cas) VALUES('$f1','$f5','$f2','$f3','$f4')");
    }

    function dajVsetkoOHrade($id)
    {
        $this->db->select('hrady.nazov, hrady.Stav, hrady.Typ, hrady.picture, historia.vznik, historia.Text_historie, hrady.Adresa, mesto.nazov AS mesto, mesto.psc AS psc, hrady.gps_lat, hrady.gps_long, hrady.email, hrady.telefon, hrady.webstranka')
            ->from('hrady')
            ->join('historia', 'hrady.idHistoria = historia.id')
            ->join('mesto', 'hrady.idMesto = mesto.id')
            ->where('hrady.id', $id);

        $query = $this->db->get();
        return $query->result_array();
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

    public function fetch_castles($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("hrady");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
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
    public function delete($id)
    {
        $delete = $this->db->delete('hrady', array('id' => $id));
        return $delete ? true : false;
    }
}