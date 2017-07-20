<?php

class Planning_Models_Horaire {

    protected $connect;

    function __construct($connect) {
        $this->connect = $connect;
    }

    public function insert_horaire($data, $id_users) {
        $instance = Planning_Bdd_Connect::getInstance();
        $connect = $instance->getPdo();
        $mois = date("m");
        $annee = date("Y");
        $semaine = date("W");
        $req = $connect->prepare('INSERT INTO horaires(start, type1, pause, reprise, type2, fin, jour, annee, mois, semaine, id_users) VALUES (:start, :type1, :pause, :reprise, :type2, :fin, :jour, :annee, :mois,:semaine, :id_users)');
        $ok = $req->execute(array(
            "start" => $data['now'],
            "type1" => $data['type1'],
            "pause" => '',
            "reprise" => '',
            "type2" => $data['type2'],
            "fin" => '',
            "jour" => $data['day'],
            "semaine" => $semaine,
            "mois" => $mois,
            "annee" => $annee,
            "id_users" => $id_users));
        if (!$ok) {
            var_dump(__FILE__, __LINE__) . die();
        }
        $id_horaire = $connect->lastInsertId();
        return $id_horaire;
    }

    public function is_started() {
        if (isset($_SESSION['id_horaire'])) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function update_pause($data, $id_horaire) {
        //$bdd = $this->connect->getPdo();
        $instance = Planning_Bdd_Connect::getInstance();
        $connect = $instance->getPdo();
        $req2 = $connect->prepare('UPDATE horaires SET pause = :pause WHERE id_horaire = :id_horaire');
        $req2->execute(array(
            "id_horaire" => $id_horaire,
            "pause" => $data['pause'])
        );
    }

    public function update_reprise($data, $id_horaire) {
        //$bdd = $this->connect->getPdo();
        $instance = Planning_Bdd_Connect::getInstance();
        $connect = $instance->getPdo();
        $req2 = $connect->prepare('UPDATE horaires SET reprise = :reprise, type2 = :type2 WHERE id_horaire = :id_horaire');
        $ok = $req2->execute(array(
            "id_horaire" => $id_horaire,
            "type2" => $data['type2'],
            "reprise" => $data['reprise'])
        );
        if (!$ok) {
            var_dump(__FILE__, __LINE__, $req2) . die();
        }
    }

    public function update_fin($data, $id_horaire) {
        //$bdd = $this->connect->getPdo();
        $instance = Planning_Bdd_Connect::getInstance();
        $connect = $instance->getPdo();
        $req2 = $connect->prepare('UPDATE horaires SET fin = :fin WHERE id_horaire = :id_horaire');
        $req2->execute(array(
            "id_horaire" => $id_horaire,
            "fin" => $data['fin'])
        );
    }

    public function select_horaire($id_users, $start_search, $fin_search) {
        //$bdd = $this->connect->getPdo();
        $instance = Planning_Bdd_Connect::getInstance();
        $connect = $instance->getPdo();
        //SELECT * FROM horaires WHERE `jour` BETWEEN '2017-05-04' AND '2017-06-07' AND `type1` = 'norm' AND `id_users` = 40
        //$req = $bdd->prepare("SELECT * FROM horaires WHERE `jour` BETWEEN '2017-05-04' AND '2017-06-07' AND `type1` = 'norm' AND `id_users` = 40");
        //$req = $bdd->prepare("SELECT * FROM horaires WHERE `jour` BETWEEN '$start_search' AND '$fin_search' AND `type1` = 'norm' AND `id_users` = :id_users");
        //$req = $bdd->prepare("SELECT * FROM horaires WHERE `jour` BETWEEN '$start_search' AND '$fin_search' AND `type1` = 'norm' OR `type1` = 'form' OR `type1` = 'maj1' OR `type1` = 'maj2' AND `type2`= 'norm' OR `type2` = 'form' OR `type2` = 'form' OR `type2` = 'maj1' OR `type2` = 'maj2'  AND `id_users` = :id_users");
        $req = $connect->prepare("SELECT * FROM horaires WHERE `jour` BETWEEN '$start_search' AND '$fin_search' AND `type1` = 'norm' AND `type2`= 'norm' AND `id_users` = :id_users");
        //$req = $bdd->prepare("SELECT id_horaire, start, pause, reprise, fin, jour, mois, semaine, annee, id_users FROM horaires WHERE id_users = :id_users ORDER BY start");

        $req->execute(array(
            "id_users" => $id_users,
        ));
        $tempreqs = $req->fetchAll();
        //return $tempreqs;
        $reqs = array();
        foreach ($tempreqs as $key => $value) {
            $value['total_heure_normale'] = $this->total_by_choice(Planning_Bdd_Constants::HNORMALE, $connect, $id_users); //total normal
            $value['total_semaine'] = $this->total_by_choice(Planning_Bdd_Constants::HFORMATION, $connect, $id_users); //total formation
            $value['total_mois'] = $this->total_by_choice(Planning_Bdd_Constants::HMAJORE1, $connect, $id_users); //total majore1
            $value['total_annee'] = $this->total_by_choice(Planning_Bdd_Constants::HMAJORE2, $connect, $id_users); //total majore2
            $reqs[$key] = $value;
        }
        return $reqs;
    }

    /**
     * 
     * @param string $searchvalue : voir constante Planning_Bdd_Constants::HNORMALE et autres
     * @param pdo $bdd
     * @param int $id_users : voir table users
     * @return time : en secondes
     */
    protected function total_by_choice($searchvalue, $connect, $id_users) {
        $instance = Planning_Bdd_Connect::getInstance();
        $connect = $instance->getPdo();
        $query = $connect->prepare('SELECT id_horaire FROM horaires WHERE id_users = :id_users');
        $query->execute(array(":id_users" => $id_users));
        $temp1 = $this->total_by_type_and_choice(Planning_Bdd_Constants::TYPE1, $searchvalue, $connect, $id_users);
        $temp2 = $this->total_by_type_and_choice(Planning_Bdd_Constants::TYPE2, $searchvalue, $connect, $id_users);
        $resulttemps = $temp1 + $temp2;
        if (1) {
            $req_update_bdd = $connect->prepare('UPDATE horaires SET total_heure_normale = :Resulttemps WHERE id_horaire = :Id_horaire AND id_users = :Id_users');
            $req_update_bdd->execute(array(
                'Resulttemps' => $resulttemps,
                'Id_horaire' => $_SESSION['id_horaire'],
                'Id_users' => $id_users)
            );
            //$req_update_bdd->fetch();
            //var_dump($req_update_bdd).die();
        }
        return $resulttemps;
    }

    protected function total_by_type_and_choice($wheretype, $searchvalue, $connect, $id_users) {
        switch ($wheretype) {
            case Planning_Bdd_Constants::TYPE1:
                $reqtotaltype1 = $connect->prepare("SELECT id_horaire, start, pause, id_users FROM horaires WHERE $wheretype = '$searchvalue' AND id_users = :id_users");
                $reqtotaltype1->execute(array(":id_users" => $id_users));
                $recuptotal1 = $reqtotaltype1->fetchAll(PDO::FETCH_ASSOC);
                $total = 0;
                foreach ($recuptotal1 as $key => $value) {
                    $res = Planning_ModelHelper::start_pause($value['start'], $value['pause']);
                    $total = $res + $total;
                }
                return $total;
                break;
            case Planning_Bdd_Constants::TYPE2:
                $reqtotaltype2 = $connect->prepare("SELECT id_horaire, reprise, fin, id_users FROM horaires WHERE $wheretype = '$searchvalue' AND  id_users = :id_users");
                $reqtotaltype2->execute(array(":id_users" => $id_users));
                $recuptotal2 = $reqtotaltype2->fetchAll(PDO::FETCH_ASSOC);
                $total2 = 0;
                foreach ($recuptotal2 as $key => $value) {
                    $res2 = Planning_ModelHelper::reprise_fin($value['reprise'], $value['fin']);
                    $total2 = $res2 + $total2;
                }
                return $total2;
                break;
            default:
                die(__FILE__);
                break;
        }
    }
}
