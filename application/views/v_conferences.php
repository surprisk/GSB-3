<div class='container' style='margin : 50px auto auto auto; background-color : white; padding: 30px; border-radius: 5px'>
    <div><h1> Bienvenue <?php echo $this->session->userdata('prenom')." ".$this->session->userdata('nom') ?><h1></div>
    <div style='text-align: center; background-color: #154360; color: white; border-top-left-radius: 20px; border-top-right-radius: 20px; margin : 100px auto auto auto'><h2> Molécule </h2></div>
    <table class="table table-bordered" style='text-align : center'>
        <tr style='background-color: #2E86C1; color: white'>
            <th>Horaire</th>
            <th>Durée</th>
            <th>Places</th>
            <th>Date</th>
            <th>Animateur</th>
            <th>Salle</th>
            <th>Inscription</th>
        </tr>
        <?php
            foreach ($confM->result() as $row){
                echo "<tr>";
                echo "  <td> $row->horaire </td>";
                echo "  <td> $row->duree </td>";
                echo "  <td> $row->nbPlace </td>";
                echo "  <td> $row->dateP </td>";
                echo "  <td> $row->nom </td>";
                echo "  <td> $row->codeSalle </td>";
                echo "  <td>";
                if($row->nbPlace > 0){
                    if(!$this->m_bddreq->verifInscrip($row->id, $row->CodeC)){
                        echo form_open('c_conferences/inscription');
                        echo form_input(array(
                            'type'  => 'hidden',
                            'name'  => 'id',
                            'id'    => 'id',
                            'value' => $row->id,
                        ));
                        echo form_input(array(
                            'type'  => 'hidden',
                            'name'  => 'code',
                            'id'    => 'code',
                            'value' => $row->CodeC,
                        ));
                        echo form_submit(array(
                            'id' => 'insc',
                            'value' => '✓', 
                            'class' => 'btn btn-success'
                        ));
                        echo form_close();
                    }
                    else{
                        echo form_open('c_conferences/desinscription');
                        echo form_input(array(
                            'type'  => 'hidden',
                            'name'  => 'id',
                            'id'    => 'id',
                            'value' => $row->id,
                        ));
                        echo form_input(array(
                            'type'  => 'hidden',
                            'name'  => 'code',
                            'id'    => 'code',
                            'value' => $row->CodeC,
                        ));
                        echo form_submit(array(
                            'id' => 'insc',
                            'value' => '✗', 
                            'class' => 'btn btn-danger'
                        ));
                        echo form_close();
                    }
                }
                else{
                    echo "<form>";
                    echo form_submit(array(
                        'id' => 'insc',
                        'value' => '✗', 
                        'class' => 'btn btn-danger'
                    ));
                    echo "</form>";
                }
                echo "  </td>";
                echo "</tr>";
            }
        ?>
    </table>
    <div style='text-align: center; background-color: #154360; color: white; border-top-left-radius: 20px; border-top-right-radius: 20px; margin : 100px auto auto auto'><h2> Enfants </h2></div>
    <table class="table table-bordered" style='text-align : center'>
        <tr style='background-color: #2E86C1; color: white'>
            <th>Horaire</th>
            <th>Durée</th>
            <th>Places</th>
            <th>Date</th>
            <th>Animateur</th>
            <th>Salle</th>
            <th>Inscription</th>
        </tr>
        <?php 
            foreach ($confE->result() as $row){
                echo "<tr>";
                echo "  <td> $row->horaire </td>";
                echo "  <td> $row->duree </td>";
                echo "  <td> $row->nbPlace </td>";
                echo "  <td> $row->dateP </td>";
                echo "  <td> $row->nom </td>";
                echo "  <td> $row->codeSalle </td>";
                echo "  <td>";
                if($row->nbPlace > 0){
                    if(!$this->m_bddreq->verifInscrip($row->id, $row->CodeC)){
                        echo form_open('c_conferences/inscription');
                        echo form_input(array(
                            'type'  => 'hidden',
                            'name'  => 'id',
                            'id'    => 'id',
                            'value' => $row->id,
                        ));
                        echo form_input(array(
                            'type'  => 'hidden',
                            'name'  => 'code',
                            'id'    => 'code',
                            'value' => $row->CodeC,
                        ));
                        echo form_submit(array(
                            'id' => 'insc',
                            'value' => '✓', 
                            'class' => 'btn btn-success'
                        ));
                        echo form_close();
                    }
                    else{
                        echo form_open('c_conferences/desinscription');
                        echo form_input(array(
                            'type'  => 'hidden',
                            'name'  => 'id',
                            'id'    => 'id',
                            'value' => $row->id,
                        ));
                        echo form_input(array(
                            'type'  => 'hidden',
                            'name'  => 'code',
                            'id'    => 'code',
                            'value' => $row->CodeC,
                        ));
                        echo form_submit(array(
                            'id' => 'insc',
                            'value' => '✗', 
                            'class' => 'btn btn-danger'
                        ));
                        echo form_close();
                    }
                }
                else{
                    echo "<form>";
                    echo form_submit(array(
                        'id' => 'insc',
                        'value' => '✗', 
                        'class' => 'btn btn-danger'
                    ));
                    echo "</form>";
                }
                echo "  </td>";
                echo "</tr>";
            }
        ?>
    </table>
</div>