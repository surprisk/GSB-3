<?php         
$this->load->view('v_header');
?>
    <div class='container' style=' margin-top: 40vh; transform: translateY(-50%); background-color : white; padding: 30px; border-radius: 5px'>
        <h2> ✅ Connexion </h2>
        <div class='row'>
            <div class='col-xl-2 offset-5'>
                <?php
                $this->load->view('v_formConnexion');
                ?>
            </div>
        </div>
        <?php
        if($err){
            $this->load->view('v_erreurConnexion');
        }
        else{
        ?>
            <div class='container' style='margin : 20px auto auto auto; text-align : center; padding: 0; background-color: transparent; color: white'>
                <div class="alert alert-secondary" role="alert">
                    Connectez vous !
                </div>
            </div>
        <?php
        }
        ?>
    </div>
<?php         
$this->load->view('v_footer');
?>