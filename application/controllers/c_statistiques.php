<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_statistiques extends CI_Controller {

	public function index()
	{
        //Appel de la librairie pour la validation du formulaire
        $this->load->library('form_validation');
        //Appel du helper 'form'
        $this->load->helper('form');
        if($this->session->has_userdata('id')){
            if($this->session->userdata('statut') == 'R'){
                $this->load->model('m_bddreq');
                $confM = $this->m_bddreq->listInscrisType(1);
                $confE = $this->m_bddreq->listInscrisType(2);
                $totM = $this->m_bddreq->totalInscrisType(1);
                $totE = $this->m_bddreq->totalInscrisType(2);
                //Appel de la vue des reservations
                $data['confM'] = $confM;
                $data['confE'] = $confE;
                $data['totM'] = $totM;
                $data['totE'] = $totE;
                $this->load->view('v_header');
                $this->load->view('v_statistiques', $data);
                $this->load->view('v_footer');
            }
        }
        else{
            redirect('c_connexion');
        }
    }
}
?>