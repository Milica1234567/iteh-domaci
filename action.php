<?php
    require_once 'db.php';
    $db = new Database();


    if(isset($_POST['action']) && $_POST['action'] == "view"){
        $output = '';
        $data = $db->read();
        
        if($db->totalRowCount()>0){
            $output .= '<table class="table table-striped table-sm table-bordered">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Ime</th>
                    <th>Ime roditelja</th>
                    <th>Prezime</th>
                    <th>Broj telefona</th>
                    <th>JMBG</th>
                    <th>Doktor</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';
            foreach ($data as $row){
                $output .= '<tr class="text-center text-secondary">
                <td>'.$row['id'].'</td>
                <td>'.$row['ime'].'</td>
                <td>'.$row['ime_roditelja'].'</td>
                <td>'.$row['prezime'].'</td>
                <td>'.$row['br_telefona'].'</td>
                <td>'.$row['jmbg'].'</td>
                <td>'.$row['doktor_id'].'</td>
                <td>
                    <a href="#" title="Detalji" class="text-success"><i class="fas fa-info-circle fa-lg"></i></a>&nbsp;&nbsp;
                    <a href="#" title="Edit" class="text-primary"><i class="fas fa-edit fa-lg"></i></a>&nbsp;&nbsp;
                    <a href="#" title="Delete" class="text-danger"><i class="fas fa-trash-alt fa-lg"></i></a>
                </td></tr>';

            }
            $output .= '</tbody></table>';
            echo $output;
        }
        else{
            echo '<h3 class="text-center text-secondary mt-5>Nema pacijenata u bazi podataka</h3>';
        }
    }
    

?>