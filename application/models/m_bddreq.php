<?php
class M_bddreq extends CI_Model {
    public function sessionIni($uti, $pass){
        $sql = "SELECT * FROM visiteur WHERE login = ? AND mdp = ?";
        $user = $this->db->query($sql, array($uti, $pass));
        $user = $user->row();
        $this->session->set_userdata('id', $user->id);
        $this->session->set_userdata('nom', $user->nom);
        $this->session->set_userdata('prenom', $user->prenom);
        $this->session->set_userdata('statut', $user->Statut);
    }

    public function auth($uti, $pass)
    {   
        $sql = "SELECT * FROM visiteur WHERE login = ? AND mdp = ?";
        $bool = $this->db->query($sql, array($uti, $pass));
        $bool = $bool->num_rows();
        return $bool;
    }

    public function conferencesType($ctype){
        $sql = "SELECT * FROM conference, animateur WHERE CodeC = ? AND conference.code = animateur.code";
        $conf = $this->db->query($sql, array($ctype));
        return $conf;
    }

    public function conferencesAll(){
        $user = 
        $sql = "SELECT * FROM conference, animateur WHERE conference.code = animateur.code";
        $conf = $this->db->query($sql);
        return $conf;
    }

    public function verifInscrip($idConf, $codeC){
        $user = $this->session->userdata('id');
        $sql = "SELECT * FROM inscris WHERE code = ? AND id = ? AND CodeC = ?";
        $bool = $this->db->query($sql, array($user, $idConf, $codeC));
        $bool = $bool->num_rows();
        return $bool;
    }

    public function inscrire($idConf, $codeC){
        $user = $this->session->userdata('id');
        $sql = "INSERT INTO inscris(code, id, CodeC) VALUES(?, ?, ?)";
        $conf = $this->db->query($sql, array($user, $idConf, $codeC));
        $rech = "SELECT * FROM inscris, conference WHERE conference.id = inscris.id AND inscris.code = ? AND inscris.id = ? AND inscris.CodeC = ?";
        $conf = $this->db->query($rech, array($user, $idConf, $codeC));
        $remp = $conf->row();
        $places = $remp->nbPlace;
        $places = $places-1;
        $up = "UPDATE conference SET nbPlace = ? WHERE id = ?";
        $this->db->query($up, array($places, $idConf));
    }

    public function seDesinscrire($idConf, $codeC){
        $user = $this->session->userdata('id');
        $rech = "SELECT * FROM inscris, conference WHERE conference.id = inscris.id AND inscris.code = ? AND inscris.id = ? AND inscris.CodeC = ?";
        $conf = $this->db->query($rech, array($user, $idConf, $codeC));
        $remp = $conf->row();
        $places = $remp->nbPlace;
        $places = $places+1;
        $up = "UPDATE conference SET nbPlace = ? WHERE id = ?";
        $this->db->query($up, array($places, $idConf));
        $sql = "DELETE FROM inscris WHERE code = ? AND id = ? AND CodeC = ?";
        $conf = $this->db->query($sql, array($user, $idConf, $codeC));
    }

    public function listInscrisType($ctype){
        $sql = "SELECT * FROM inscris, theme, conference, visiteur WHERE inscris.CodeC = ? AND inscris.CodeC = theme.CodeC AND conference.id = inscris.id AND inscris.code = visiteur.id GROUP BY conference.id";
        $conf = $this->db->query($sql, array($ctype));
        return $conf;
    }

    public function totalInscrisType($ctype){
        $sql = "SELECT count(code) AS nb FROM inscris WHERE inscris.CodeC = ?";
        $conf = $this->db->query($sql, array($ctype));
        $conf = $conf->row();
        return $conf->nb;
    }

    public function deconnexion(){
        $this->session->sess_destroy();
    }

}
?>