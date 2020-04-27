<?php
    echo form_open('c_connexion/verifConnexion');
    echo form_label('Utilisateur : ', 'uti');
    echo '<br>';
    $uti= array(

        'name'=>'uti',

        'id'=>'uti',

        'placeholder'=>'Utilisateur',

        'class'=>'form-control',

        'value'=>set_value('uti')

    );
    echo form_input($uti);
    echo form_error('uti');
    echo '<br>';
    echo form_label('Mot de passe : ', 'pass');
    echo '<br>';
    $pass= array(

        'name'=>'pass',

        'id'=>'pass',

        'placeholder'=>'Mot de passe',

        'class'=>'form-control',

        'value'=>set_value('pass')

    );
    echo form_input($pass);
    echo form_error('pass');
    echo '<br>';
    $submit = array(

        'name'=>'conn',

        'id'=>'conn',

        'class'=>'btn btn-outline-primary',

        'value'=>'Connexion'

    );
    echo form_submit($submit);
    echo form_close();
?>