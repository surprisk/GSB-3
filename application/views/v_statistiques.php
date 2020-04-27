<div class='container' style='margin : 50px auto auto auto; background-color : white; padding: 30px; border-radius: 5px'>
    <div><h1> Statistiques <h1></div>
    <div style='text-align: center; background-color: #154360; color: white; border-top-left-radius: 20px; border-top-right-radius: 20px; margin : 100px auto auto auto'><h2> Molécule (<?php echo "Inscris : " . $totM ?>) </h2></div>
    <table class="table table-bordered" style='text-align : center'>
        <tr style='background-color: #2E86C1; color: white'>
            <th>Inscris</th>
            <th>Horaire</th>
            <th>Durée</th>
            <th>Places</th>
            <th>Date</th>
            <th>Animateur</th>
            <th>Salle</th>
        </tr>
        <?php
            foreach ($confM->result() as $row){
                echo "<tr>";
                echo "  <td> ".$row->nom." ".$row->prenom." </td>";
                echo "  <td> $row->horaire </td>";
                echo "  <td> $row->duree </td>";
                echo "  <td> $row->nbPlace </td>";
                echo "  <td> $row->dateP </td>";
                echo "  <td> $row->theme </td>";
                echo "  <td> $row->codeSalle </td>";
                echo "</tr>";
            }
        ?>
    </table>
    <div style='text-align: center; background-color: #154360; color: white; border-top-left-radius: 20px; border-top-right-radius: 20px; margin : 100px auto auto auto'><h2> Enfants (<?php echo "Inscris : " . $totE ?>) </h2></div>
    <table class="table table-bordered" style='text-align : center'>
        <tr style='background-color: #2E86C1; color: white'>
            <th>Inscris</th>
            <th>Horaire</th>
            <th>Durée</th>
            <th>Places</th>
            <th>Date</th>
            <th>Animateur</th>
            <th>Salle</th>
        </tr>
        <?php
            foreach ($confE->result() as $row){
                echo "<tr>";
                echo "  <td> $row->nom $row->prenom </td>";
                echo "  <td> $row->horaire </td>";
                echo "  <td> $row->duree </td>";
                echo "  <td> $row->nbPlace </td>";
                echo "  <td> $row->dateP </td>";
                echo "  <td> $row->theme </td>";
                echo "  <td> $row->codeSalle </td>";
                echo "</tr>";
            }
        ?>
    </table>
</div>