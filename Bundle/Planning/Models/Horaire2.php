<?php

/**
 * 
 */
class Planning_Models_Horaire2 {

    protected $connect;

    function __construct($connect) {
        $this->connect = $connect;
    }

    public function insert_semaine() {
        $instance = Planning_Bdd_Connect::getInstance();
        $connect = $instance->getPdo();
        //$bdd = $this->connect->getPdo();
        $id_horaire = $_SESSION['id_horaire'];
        $semaine = date("W");
        $req = $connect->prepare('INSERT INTO horaires(semaine) VALUES :semaine');
        $req->execute(array(
            'semaine' => $semaine)
        );
    }

    public function insert_mois() {
        $instance = Planning_Bdd_Connect::getInstance();
        $connect = $instance->getPdo();
        //$bdd = $this->connect->getPdo();
        $id_horaire = $_SESSION['id_horaire'];
        $mois = date("m");
        $req = $connect->prepare("INSERT INTO horaires(mois) VALUES :mois");
        $req->execute(array(
            'mois' => $mois)
        );
    }

    public function insert_annee() {
        $instance = Planning_Bdd_Connect::getInstance();
        $connect = $instance->getPdo();
        //$bdd = $this->connect->getPdo();
        $id_horaire = $_SESSION['id_horaire'];
        $annee = date("Y");
        $req = $connect->prepare("INSERT INTO horaires(annee) VALUES :annee");
        $req->execute(array(
            'annee' => $annee)
        );
    }

    public function calcul_total_semaine() {
        $instance = Planning_Bdd_Connect::getInstance();
        $connect = $instance->getPdo();
        //$bdd = $this->connect->getPdo();
        $id_horaire = $_SESSION['id_horaire'];
        $annee = date("Y");
        $semaine = date("W");

        $req = $connect->prepare('SELECT SEC_TO_TIME( SUM( TIME_TO_SEC(`total_journee`) ) ) FROM horaires WHERE semaine = :semaine AND annee = :annee');
        $req->execute(array(
            'semaine' => $semaine,
            'annee' => $annee)
        );
        $sumsemaine = $req->fetchColumn();
        $reqsemaine = $connect->prepare('UPDATE horaires SET total_semaine = :total_semaine WHERE id_horaire = :id_horaire');
        $reqsemaine->execute(array(
            "id_horaire" => $id_horaire,
            "total_semaine" => $sumsemaine)
        );
    }

    public function calcul_total_mois() {
        $instance = Planning_Bdd_Connect::getInstance();
        $connect = $instance->getPdo();
        //$bdd = $this->connect->getPdo();
        $id_horaire = $_SESSION['id_horaire'];
        $mois = date("m");
        $annee = date("Y");

        $req2 = $connect->prepare('SELECT SEC_TO_TIME( SUM( TIME_TO_SEC(`total_journee`) ) ) FROM horaires WHERE mois = :mois AND annee = :annee');
        $req2->execute(array(
            'mois' => $mois,
            'annee' => $annee
        ));
        $summois = $req2->fetchColumn();
        $reqmois = $connect->prepare('UPDATE horaires SET total_mois = :total_mois WHERE id_horaire = :id_horaire');
        $reqmois->execute(array(
            "id_horaire" => $id_horaire,
            "total_mois" => $summois)
        );
    }

    public function calcul_total_annee() {
        $instance = Planning_Bdd_Connect::getInstance();
        $connect = $instance->getPdo();
        //$bdd = $this->connect->getPdo();
        $id_horaire = $_SESSION['id_horaire'];
        $mois = date("m");
        $annee = date("Y");

        $req3 = $connect->prepare('SELECT SEC_TO_TIME( SUM( TIME_TO_SEC(`total_journee`) ) ) FROM `horaires` WHERE `annee` = :annee');
        $req3->execute(array(
            'annee' => $annee)
        );
        $sumannee = $req3->fetchColumn();

        $reqannee = $connect->prepare('UPDATE horaires SET total_annee = :total_annee WHERE id_horaire = :id_horaire');
        $reqannee->execute(array(
            'id_horaire' => $id_horaire,
            'total_annee' => $sumannee)
        );
    }

}
