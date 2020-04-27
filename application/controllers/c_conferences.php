<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_conferences extends CI_Controller {
    
	public function index()
	{
        //Appel de la librairie pour la validation du formulaire
        $this->load->library('form_validation');
        //Appel du helper 'form'
        $this->load->helper('form');
        //Appel du modele
        $this->load->model('m_bddreq');
        if($this->session->has_userdata('id')){
            $confM = $this->m_bddreq->conferencesType(1);
            $confE = $this->m_bddreq->conferencesType(2);
            //Appel de la vue des reservations
            $data['confM'] = $confM;
            $data['confE'] = $confE;
            $this->load->view('v_header');
            $this->load->view('v_conferences', $data);
            $this->load->view('v_footer');
        }
        else{
            redirect('c_connexion');
        }
    }

    public function inscription()
    {
        $this->load->model('m_bddreq');
        echo $this->m_bddreq->inscrire($_REQUEST['id'], $_REQUEST['code']);
        redirect('c_Conferences');
    }

    public function desinscription()
    {
        $this->load->model('m_bddreq');
        $this->m_bddreq->seDesinscrire($_REQUEST['id'], $_REQUEST['code']);
        redirect('c_Conferences');
    }

}