<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_connexion extends CI_Controller {

	public function index()
	{
        //Appel de la librairie pour la validation du formulaire
        $this->load->library('form_validation');
        //Appel du helper 'form'
        $this->load->helper('form');
        //Appel de la vue du formulaire de connexion
        $data['err'] = false;
        $this->load->view('v_connexion', $data);
    }
    
    public function verifConnexion()
    {
        $uti = $_REQUEST['uti'];
        $pass = $_REQUEST['pass'];
        $this->load->model('m_bddreq');
        $auth = $this->m_bddreq->auth($uti, $pass);
        if($auth){
            $this->m_bddreq->sessionIni($uti, $pass);
            redirect('C_conferences');
        }
        else{
            //Appel de la librairie pour la validation du formulaire
            $this->load->library('form_validation');
            //Appel du helper 'form'
            $this->load->helper('form');
            $data['err'] = true;
            $this->load->view('v_connexion', $data);
        }
    }

    public function deconnexion()
    {
        $this->load->model('m_bddreq');
        $this->m_bddreq->deconnexion();
        redirect('C_connexion');
    }

}
