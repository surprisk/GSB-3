<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    </head>
    <body style='background-color: #2E86C1'>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><img src="https://lauretyann.files.wordpress.com/2014/03/logo1.png?w=100"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Galaxy Swiss Bourdin <span class="sr-only">(current)</span></a>
                </li>
                <?php
                if($this->session->has_userdata('id')){
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="#">Compte : <?php echo $this->session->userdata('prenom')." ".$this->session->userdata('nom') ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url().'index.php/C_conferences' ?>"> Conférences </a>
                </li>
                <?php
                    if($this->session->userdata('statut')=='R'){
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url().'index.php/C_statistiques' ?>">Statistiques</a>
                </li>
                <?php
                    }
                }
                ?>
            </ul>
        </div>
        <?php
        if($this->session->has_userdata('id')){
            echo form_open('c_connexion/deconnexion');
            $deconnexion = array(

                'name'=>'deco',
        
                'id'=>'deco',
        
                'class'=>'btn btn-outline-danger',

                'style'=>'float: right',
        
                'value'=>'Deconnexion'
        
            );
            echo form_submit($deconnexion);
            echo form_close();
        }
        ?>
    </nav>