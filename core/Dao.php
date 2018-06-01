<?php
namespace BWB\CORE;
use BWB\CORE\Crud_interface;
use BWB\CORE\Repository_interface;

/**
 * Le dao est un objet servant de couche intermediare entre la couche metier et la db
 * Cet objet ne doit exister qu'en un seul exemplaire (Singleton)
 */

 //abstract pour ne pas pouvoir faire d'objet Dao seul

abstract class Dao implements Crud_interface,Repository_interface {

    protected $pdo;

    function __construct() {

        $listeConnect = json_decode(file_get_contents('./config/database.json'),true);

        $this->pdo = new PDO(
            $listeConnect['type']
            .":host=".$listeConnect['host'].($listeConnect['port'] === "" ? ";" : ";port=".$listeConnect['port'].";")
            ."dbname=".$listeConnect['dbName']
            ,$listeConnect['user']
            ,$listeConnect['password']
        );
    }

    /**
     * Get the value of pdo
     */ 
    public function getPdo()
    {
        return $this->pdo;
    }

    /**
     * Set the value of pdo
     *
     * @return  self
     */ 
    public function setPdo($pdo)
    {
        $this->pdo = $pdo;

        return $this;
    }
}