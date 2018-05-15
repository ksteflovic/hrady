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

    function dajMesta(){
        $this->db->select('*')
            ->from('mesto');

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

    function insertHrad(){
        $f1 = $_POST['nazov'];
        $f2 = $_POST['stav'];
        $f3 = $_POST['typ'];
        $f4 = $_POST['rok'];
        $f5 = $_POST['historia'];
        $f6 = $_POST['adresa'];
        $f7 = $_POST['mesto'];
        $f20 = $_POST['gps_lat'];
        $f21 = $_POST['gps_long'];
        $f8 = $_POST['email'];
        $f9 = $_POST['telefon'];
        $f10 = $_POST['webstranka'];
        $f2 = str_replace("_", " ", $f2);
        $f3 = str_replace("_", " ", $f3);
        $this->db->query("INSERT INTO historia(Vznik, Text_Historie) VALUES('$f4','$f5')");
        $idHistoria = $this->db->insert_id();
        $this->db->query("INSERT INTO hrady(nazov, idHistoria, stav, typ, adresa, idMesto, gps_lat, gps_long, email, telefon, webstranka) VALUES('$f1','$idHistoria',
'$f2','$f3','$f6','$f7','$f20','$f21','$f8','$f9','$f10')");

    }

    function updateHrad(){
        $f0 = $_POST['idHrad'];
        $f02 = $_POST['idHistoria'];
        $f1 = $_POST['nazov'];
        $f2 = $_POST['stav'];
        $f3 = $_POST['typ'];
        $f4 = $_POST['rok'];
        $f5 = $_POST['historia'];
        $f6 = $_POST['adresa'];
        $f7 = $_POST['mesto'];
        $f20 = $_POST['gps_lat'];
        $f21 = $_POST['gps_long'];
        $f8 = $_POST['email'];
        $f9 = $_POST['telefon'];
        $f10 = $_POST['webstranka'];
        $f2 = str_replace("_", " ", $f2);
        $f3 = str_replace("_", " ", $f3);
        $f20 = str_replace(",", ".", $f20);
        $f21 = str_replace(",", ".", $f21);
        $this->db->query("UPDATE historia SET Vznik = '$f4', Text_Historie = '$f5' WHERE id='$f02'");
        $this->db->query("UPDATE hrady SET nazov = '$f1', idHistoria = '$f02', stav = '$f2', typ = '$f3', adresa = '$f6', idMesto = '$f7', gps_lat = '$f20', gps_long = '$f21', email = '$f8', telefon = '$f9', webstranka = '$f10' WHERE id = '$f0'");
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
            $this->db->select('hrady.nazov, hrady.Stav, hrady.Typ, hrady.picture, historia.id as idHistoria, historia.vznik AS rok, historia.Text_historie AS historia, hrady.Adresa, mesto.nazov AS mesto, mesto.psc AS psc, hrady.gps_lat, hrady.gps_long, hrady.email, hrady.telefon, hrady.webstranka')
                ->from('hrady')
                ->join('historia', 'hrady.idHistoria = historia.id')
                ->join('mesto', 'hrady.idMesto = mesto.id')
                ->where('hrady.id', $id);
            $query = $this->db->get();
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