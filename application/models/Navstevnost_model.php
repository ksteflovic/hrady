<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Štefinka
 * Date: 04.05.2018
 * Time: 13:57
 */

class Navstevnost_model extends CI_Model {
    public function insert($data) {
        $this->db->insert('navstevnost', $data);
    }

}