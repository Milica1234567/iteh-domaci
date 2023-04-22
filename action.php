<?php

    require_once 'db.php';
    $db = new Database();
    

    session_start();

    if(isset($_POST['action']) && $_POST['action'] == "view"){
        $output = '';
        $id_doktora=$_SESSION['id_dr'];
         
        $data = $db->readidjoin($id_doktora);
        
        if($db->totalRowCount()>0){
            $output .= '<table class="table">
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
                <td>'.$row['ime_doktora']. ' '. $row['prezime_doktora'].'</td>
                <td>
                    <a href="#" title="Detalji" class="text-success infoBtn" id="'.$row['id'].'"><i class="fas fa-info-circle fa-lg"></i></a>&nbsp;&nbsp;

                    <a href="#" title="Edit" class="text-primary editBtn" data-toggle="modal" data-target="#editPatient" id="'.$row['id'].'"><i class="fas fa-edit fa-lg"></i></a>&nbsp;&nbsp;
                    
                    <a href="#" title="Delete" class="text-danger delBtn" id="'.$row['id'].'"><i class="fas fa-trash-alt fa-lg"></i></a>
                </td></tr>';

            }
            $output .= '</tbody></table>';
            echo $output;
        }
        else{
            echo '<h3 class="text-center text-secondary mt-5>Nema pacijenata u bazi podataka</h3>';
        }
    }

    if(isset($_POST['action']) && $_POST['action']=='insert'){
        $ime = $_POST['ime'];
        $imeRod= $_POST['imeRod'];
        $prezime=$_POST['prezime'];
        $brTelefona=$_POST['brTelefona'];
        $jmbg=$_POST['jmbg'];
        $dr_id=$_POST['dr_id'];

        $db->insert($ime, $imeRod, $prezime, $brTelefona, $jmbg, $dr_id);
    }

    if(isset($_POST['edit_id'])){
        $id = $_POST['edit_id'];

        $row=$db->getPatientById($id);
        echo json_encode($row);
    }

    if(isset($_POST['action']) && $_POST['action']=='update'){
        $id = $_POST['id'];
        $ime = $_POST['ime'];
        $imeRod= $_POST['imeRod'];
        $prezime=$_POST['prezime'];
        $brTelefona=$_POST['brTelefona'];
        $jmbg=$_POST['jmbg'];
        $dr_id=$_POST['dr_id'];

        $db->update($id, $ime, $imeRod, $prezime, $brTelefona, $jmbg, $dr_id);
    }

    if(isset($_POST['del_id'])){
        $id=$_POST['del_id'];

        $db->delete($id);
    }

    if(isset($_POST['info_id'])){
        $id=$_POST['info_id'];
        $row=$db->getPatientById($id);
        echo json_encode($row);
    }
    

?>