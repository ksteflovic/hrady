<?php
/**
 * Created by PhpStorm.
 * User: Štefinka
 * Date: 04.05.2018
 * Time: 9:15
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data = array();
        //ziskanie sprav zo session
        if ($this->session->userdata('success_msg')) {
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if ($this->session->userdata('error_msg')) {
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }

        $data['hrady'] = $this->Hrady_model->getRows();

        $ip = $this->input->ip_address();
        $date = date('Y-m-d H:i:s');
        $this->load->model('Navstevnost_model');
        $navsteva = array(
            'ip_adress' => $ip,
            'date' => $date
        );
        $id = $this->Navstevnost_model->insert($navsteva);


        $this->load->library('table');
        $this->load->library('pagination');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database(); //load library database

        $num_rows = $this->db->count_all("hrady");
        $config["base_url"] = base_url() . "home/index";
        $config['total_rows'] = $num_rows;
        $config['per_page'] = 5;
        $config['num_links'] = $num_rows;
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);

        /*
                $this->load->library("pagination");

                $config = array();
                $config["base_url"] = base_url() . "home/index";
                $config["total_rows"] = count($this->Hrady_model->getRows());
                $config["per_page"] = 5;
                $config["uri_segment"] = 3;

                $this->pagination->initialize($config);

                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["results"] = $this->Hrady_model->fetch_castles($config["per_page"], $page);
                $data["links"] = $this->pagination->create_links();
        */
        $this->load->view('template/header');
        $this->load->view('template/navigation');
        $this->load->view('template/tabulka_hrady', $data);
        $this->load->view('hrady/chart');
        $this->load->view('template/footer');
    }


    public function __construct()
    {
        Parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model("Hrady_model");
    }

    public
    function castles_page()
    {
        header("Access-Control-Allow-Origin: *");
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $hrady = $this->Hrady_model->get_hrady();

        $pole = array();

        foreach ($hrady->result() as $hrad) {
            $sub_array = array();
            $sub_array[] = $hrad->id;
            $sub_array[] = '<img src="' . $hrad->picture . '" class="doTabulky" />'; //$hrad->id;
            $sub_array[] = $hrad->nazov;
            $sub_array[] = $hrad->Typ;
            if (strpos($hrad->Stav, 're verejnosť') !== false) {
                $sub_array[] = '<td><h5><span class="badge badge-success">' . mb_strtoupper($hrad->Stav) . '</span></h5></td>';
            } elseif (strpos($hrad->Stav, 'Ruiny') !== false || strpos($hrad->Stav, 'achoval') !== false) {
                $sub_array[] = '<td><h5><span class="badge badge-warning">' . mb_strtoupper($hrad->Stav) . '</span></h5></td>';
            } else {
                $sub_array[] = '<td><h5><span class="badge badge-danger">' . mb_strtoupper($hrad->Stav) . '</span></h5></td>';
            }
            $sub_array[] = '<button type="button" class="btn btn-outline-success" onclick="otvorView(this.id)" id="' . $hrad->id . '">Detail <i class="fas fa-eye"></i></button>';
            $sub_array[] = '<button type="button" class="btn btn-outline-warning" onclick="otvorUpravu(this.id)" id="' . $hrad->id . '">Uprav <i class="fas fa-pencil-alt"></i></button>';
            $sub_array[] = '<button type="button" class="btn btn-outline-danger" onclick="otvorVymaz(this.id)" id="' . $hrad->id . '">Vymaž <i class="fas fa-trash-alt"></i></button>';
            $pole[] = $sub_array;
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $hrady->num_rows(),
            "recordsFiltered" => $hrady->num_rows(),
            "data" => $pole
        );
        echo json_encode($output);
        exit();
    }

    function ohodnot()
    {
        $this->load->model('Hrady_model');
        $this->Hrady_model->insertHodnotenie();
        redirect('/home');
        echo "<script type='text/javascript'>alert('Ďakujeme za hodnotenie!');</script>";
    }

    function pridaj()
    {
        $this->load->model('Hrady_model');
        $pridaj = $this->Hrady_model->insertHrad();
        if ($pridaj) {
            $this->session->set_flashdata('msg', 'Castle has been added successfully.');
        } else {
            $this->session->set_flashdata('error_msg', 'Some problems occurred, please try again.');
        }
        redirect('/home');
    }

    function uprav()
    {
        $this->load->model('Hrady_model');
        $uprav = $this->Hrady_model->updateHrad();
        if ($uprav) {
            $this->session->set_flashdata('msg', 'Castle has been updated successfully.');
        }
        else{
            $this->session->set_flashdata('error_msg', 'Some problems occurred, please try again.');
        }
        redirect('/home');
    }

    public function view($id)
    {
        $data = array();
        if (!empty($id)) {
            $data['hradky'] = $this->Hrady_model->dajVsetkoOHrade($id);
            $data['vstupne'] = $this->Hrady_model->dajVstupne($id);
            $data['action'] = 'Detail hradu';
            //$data['title'] = $data['temperatures']['measurement_date'];
            //nahratie detailu zaznamu
            $this->load->view('template/header', $data);
            $this->load->view('template/navigateAEV', $data);
            $this->load->view('hrady/view', $data);
        } else {
            redirect('/home');
        }
    }

    public function add()
    {
        $data = array();
        $postData = array();
        //zistenie, ci bola zaslana poziadavka na pridanie zaznamu
        if ($this->input->post('postSubmit')) {
            //definicia pravidiel validacie
            $this->form_validation->set_rules('Stav', 'Stav', 'required');
            $this->form_validation->set_rules('Typ', 'Typ', 'required');
            $this->form_validation->set_rules('rok', 'rok', 'required');
            $this->form_validation->set_rules('historia', 'historia', 'required');
            $this->form_validation->set_rules('Adresa', 'Adresa', 'required');
            $this->form_validation->set_rules('mesto', 'mesto', 'required');
            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('telefon', 'phone', 'required');
            $this->form_validation->set_rules('webstranka', 'web page', 'required');
            $this->form_validation->set_rules('picture', 'picture', 'required');
            //priprava dat pre vlozenie
            $postData = array(
                'nazov' => $this->input->post('nazov'),
                'stav' => $this->input->post('Stav'),
                'typ' => $this->input->post('Typ'),
                'rok' => $this->input->post('rok'),
                'historia' => $this->input->post('historia'),
                'adresa' => $this->input->post('Adresa'),
                'mesto' => $this->input->post('mesto'),
                'email' => $this->input->post('email'),
                'telefon' => $this->input->post('telefon'),
                'webstranka' => $this->input->post('webstranka'),
                'picture' => $this->input->post('picture')
            );
            //validacia zaslanych dat
            if ($this->form_validation->run() == true) {
                //vlozenie dat
                $insert = $this->Hrady_model->insert($postData);
                if ($insert) {
                    $this->session->set_flashdata('msg', 'Castle was added successfully.');
                    redirect('/home');
                } else {
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }
        }
        $data['post'] = $postData;
        $data['stavy'] = $this->Hrady_model->dajVsetkyStavyHradov();
        $data['typy'] = $this->Hrady_model->dajVsetkyTypyHradov();
        $data['mesta'] = $this->Hrady_model->dajMesta();

        $data['action'] = 'Pridanie nového hradu do databázy';
        //zobrazenie formulara pre vlozenie a editaciu dat
        $this->load->view('template/header', $data);
        $this->load->view('template/navigateAEV', $data);
        $this->load->view('hrady/add-edit', $data);
    }

    // aktualizacia dat
    public function edit($id)
    {
        $data = array();
        //ziskanie dat z tabulky
        $postData = $this->Hrady_model->getRows($id);
        //zistenie, ci bola zaslana poziadavka na aktualizaciu
        if ($this->input->post('postSubmit')) {
            //definicia pravidiel validacie
            $this->form_validation->set_rules('nazov', 'nazov', 'required');
            $this->form_validation->set_rules('Stav', 'Stav', 'required');
            $this->form_validation->set_rules('Typ', 'Typ', 'required');
            $this->form_validation->set_rules('rok', 'rok', 'required');
            $this->form_validation->set_rules('historia', 'historia', 'required');
            $this->form_validation->set_rules('Adresa', 'Adresa', 'required');
            $this->form_validation->set_rules('mesto', 'mesto', 'required');
            $this->form_validation->set_rules('gps_lat', 'gps_lat', 'required');
            $this->form_validation->set_rules('gps_long', 'gps_long', 'required');
            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('telefon', 'telefon', 'required');
            $this->form_validation->set_rules('webstranka', 'webstranka', 'required');
            $this->form_validation->set_rules('picture', 'picture', 'required');
            // priprava dat pre aktualizaciu
            $postData = array(
                'nazov' => $this->input->post('nazov'),
                'stav' => $this->input->post('Stav'),
                'typ' => $this->input->post('Typ'),
                'rok' => $this->input->post('rok'),
                'historia' => $this->input->post('historia'),
                'adresa' => $this->input->post('Adresa'),
                'mesto' => $this->input->post('mesto'),
                'gps_lat' => $this->input->post('gps_lat'),
                'gps_long' => $this->input->post('gps_long'),
                'email' => $this->input->post('email'),
                'telefon' => $this->input->post('telefon'),
                'webstranka' => $this->input->post('webstranka'),
                'picture' => $this->input->post('picture')
            );
        }
        $data['post'] = $postData;
        $data['stavy'] = $this->Hrady_model->dajVsetkyStavyHradov();
        $data['typy'] = $this->Hrady_model->dajVsetkyTypyHradov();
        $data['mesta'] = $this->Hrady_model->dajMesta();
        //$data['title'] = 'Update Temperature';
        $data['action'] = 'Úprava existujúceho hradu';
        $this->load->view('template/header', $data);
        $this->load->view('template/navigateAEV', $data);
        $this->load->view('hrady/add-edit', $data);
    }

    // odstranenie dat
    public function delete($id)
    {
        //overenie, ci id nie je prazdne
        if ($id) {
            //odstranenie zaznamu
            $delete = $this->Hrady_model->delete($id);
            if ($delete) {
                $this->session->set_flashdata('msg', 'Castle has been removed successfully.');
            } else {
                $this->session->set_flashdata('error_msg', 'Some problems occurred, please try again.');
            }
        }
        redirect('/home');
    }


    function vypisNavstevy()
    {
        header("Access-Control-Allow-Origin: *");

        define('DB_HOST', 'localhost');
        define('DB_USERNAME', 'stefi7773');
        define('DB_PASSWORD', 'bIHBUVufUV65648BKHKKHdcn');
        define('DB_NAME', 'hrady');

        $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

        if (!$mysqli) {
            die("Connection failed: " . $mysqli->error);
        }

        $query = sprintf("SELECT COUNT(ip_adress) AS Pocet, CONCAT(DAY(date), '.', MONTH(date), '.', YEAR(date)) AS Datum FROM navstevnost GROUP BY Datum ORDER BY date DESC LIMIT 7");

        $result = $mysqli->query($query);

        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }

        $result->close();
        $mysqli->close();

        echo json_encode($data);
    }

    function vypisNavstevy2()
    {
        header("Access-Control-Allow-Origin: *");

        define('DB_HOST', 'localhost');
        define('DB_USERNAME', 'stefi7773');
        define('DB_PASSWORD', 'bIHBUVufUV65648BKHKKHdcn');
        define('DB_NAME', 'hrady');

        $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

        if (!$mysqli) {
            die("Connection failed: " . $mysqli->error);
        }

        $query = sprintf("SELECT DISTINCT HOUR(date) AS Cas, COUNT(date) AS Pocet FROM navstevnost GROUP BY Cas");

        $result = $mysqli->query($query);

        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }

        $result->close();
        $mysqli->close();

        echo json_encode($data);
    }

    function navstevnostHrady($id)
    {
        header("Access-Control-Allow-Origin: *");

        define('DB_HOST', 'localhost');
        define('DB_USERNAME', 'stefi7773');
        define('DB_PASSWORD', 'bIHBUVufUV65648BKHKKHdcn');
        define('DB_NAME', 'hrady');

        $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

        if (!$mysqli) {
            die("Connection failed: " . $mysqli->error);
        }

        $query = sprintf("SELECT hodnotenie, COUNT(*) AS pocet FROM rating WHERE idHrad = " . $id . " GROUP BY hodnotenie");

        $result = $mysqli->query($query);

        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }

        $result->close();
        $mysqli->close();

        echo json_encode($data);
    }

}