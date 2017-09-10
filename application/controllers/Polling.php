<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Polling extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{		
        if($this->input->post('submit')){
            $data['query'] = $this->polling_model->get_polling_units();
            $data['results'] = $this->polling_model->get_polling_unit_Result($this->input->post('polls'));
            
            
            $this->load->view('inc/header');
            $this->load->view('polling', $data );
            $this->load->view('inc/footer');
        }else{
            $data['query'] = $this->polling_model->get_polling_units();
            $this->load->view('inc/header');
            $this->load->view('polling', $data );
            $this->load->view('inc/footer');
        }
	}

    public function lga()
	{
		if($this->input->post('submit')){
            $data['query'] = $this->polling_model->get_lga();
            $data['results'] = $this->polling_model->get_lga_Result($this->input->post('lga'));
            
            $this->load->view('inc/header');
            $this->load->view('lga', $data );
            $this->load->view('inc/footer');
        }else{
            $data['query'] = $this->polling_model->get_lga();

            $this->load->view('inc/header');
            $this->load->view('lga', $data );
            $this->load->view('inc/footer');
        }
	}

    public function add()
	{
		if($this->input->post('submit')){
           $this->load->library('form_validation'); 

            $this->form_validation->set_rules('username', 'Name', 'required');
            $this->form_validation->set_rules('polls', 'Polling unit', 'required');
            $this->form_validation->set_rules('party', 'Political Party', 'required');
            $this->form_validation->set_rules('score', 'Party Score', 'required');
            
                if ($this->form_validation->run() == FALSE)
                {
                        //$this->load->view('myform');
                }
                else
                {
                        //$this->load->view('formsuccess');

                        $data = array(
                            'polling_unit_uniqueid' => $this->input->post('polls'),
                            'party_abbreviation' => $this->input->post('party'),
                            'party_score' => $this->input->post('score'),
                            'entered_by_user' => $this->input->post('username'),
                            'date_entered' => date('Y-m-d H:i:s'),
                            'user_ip_address' => file_get_contents('https://api.ipify.org/')
                        );
                        if($this->polling_model->add_party_Result($data)){
                            $this->session->set_flashdata('success','Score was successfully added!');
                        }
                }
            
            $data['query'] = $this->polling_model->get_polling_units();
            $data['party'] = $this->polling_model->get_pol_parties();

            
            $this->load->view('inc/header');
            $this->load->view('add', $data );
            $this->load->view('inc/footer');
        }else{
            $data['query'] = $this->polling_model->get_polling_units();
            $data['party'] = $this->polling_model->get_pol_parties();

            $this->load->view('inc/header');
            $this->load->view('add', $data );
            $this->load->view('inc/footer');
        }
	}
}
