<?php

    class Database{
        private $dsn = "mysql:host=localhost;dbname=medicamea";
        private $user = "root";
        private $pass = "";
        public $conn;

        public function __construct(){
            try{
                $this->conn = new PDO($this->dsn, $this->user, $this->pass);
                //echo 'ok';
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function insert($ime, $ime_roditelja, $prezime, $br_telefona, $jmbg, $dr_id){
            $sql = "INSERT INTO patients (ime, ime_roditelja, prezime, br_telefona, jmbg, doktor_id) VALUES (:ime, :ime_roditelja, :prezime, :br_telefona, :jmbg, :dr_id)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['ime'=>$ime,'ime_roditelja'=>$ime_roditelja,'prezime'=>$prezime,'br_telefona'=>$br_telefona,'jmbg'=>$jmbg,'dr_id'=>$dr_id]);
            return true;
        }

        public function read(){
            $data = array();
            $sql = "SELECT * FROM patients";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            //hvatanje u assoc niz
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $row){
                $data[] = $row;
            }
            return $data;
        }

        public function getPatientById($id){
            $sql = "SELECT * FROM patients WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        public function update($id, $ime, $ime_roditelja, $prezime, $br_telefona, $jmbg, $dr_id){
            $sql = "UPDATE patients SET ime = :ime, ime_roditelja = :ime_roditelja, prezime = :prezime, br_telefona = :br_telefona, jmbg = :jmbg, 
            doktor_id = :dr_id WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['ime'=>$ime,'ime_roditelja'=>$ime_roditelja,'prezime'=>$prezime,'br_telefona'=>$br_telefona,'jmbg'=>$jmbg,'dr_id'=>$dr_id,'id'=>$id]);
            return true;
        }

        public function delete($id){
            $sql = "DELETE FROM patients WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);
            return true;
        }

        public function totalRowCount(){
            $sql = "SELECT * FROM patients";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $t_rows = $stmt->rowCount();
            return $t_rows;
        }
    }


    
?>