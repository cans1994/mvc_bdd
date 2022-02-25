<?php

require_once('Connexionbdd.php');

class Project
{
    public int $id;
    public string $name;
    public $description;
    public $client_name;
    public $start_date;
    public $checkpoint_date;
    public $delivery_date;
    private $pdo;
    //pdo c'est l'objet php qui nous permet d'exécuter des requêtes sql
    //qd on initialise un objet tag. c'est une syntaxe php qui nous permet d'accéder à notre sql.
    public function __construct()
    {
        $this->pdo = getpdo();
        //grâce à ca il saura cmt se connecter à la bdd
    }

    public function tous()
    {
        $sql = "select id, name, description, client_name, start_date, checkpoint_date, delivery_date from project";
        //requête sql
        $stmt = $this->pdo->prepare($sql);
        // au dessus on cherche à comprendre la requête select id et l'optimiser,... puis en dessous on exécute
        $stmt->execute();
        //dans le cadre d'un select, ici le execute n'est pas forcément nécessaire. Par contre ds le k d'un insert, là du coup ca exécute l'ordre
        $data = $stmt->fetchAll();
        //avec le $data on récupère l'intégralité de la table
        return $data;
    }
    public function selectionner(string $terme)
    {
        echo '<br><pre>';
        //var_dump($terme);
        echo '</pre><br>';
        $sql = "select id, name, description, client_name, start_date, checkpoint_date, delivery_date from project where name like '%" . $terme . "%'";
        //var_dump($sql);
        //requête sql
        $stmt = $this->pdo->prepare($sql);

        // au dessus on cherche à comprendre la requête select id et l'optimiser,... puis en dessous on exécute
        $stmt->execute();
        //dans le cadre d'un select, ici le execute n'est pas forcément nécessaire. Par contre ds le k d'un insert, là du coup ca exécute l'ordre
        $data = $stmt->fetchAll();
        //avec le $data on récupère l'intégralité de la table
        return $data;
    }
    public function insert()
    {
        $sql = 'insert into project (name, description, client_name, start_date, checkpoint_date, delivery_date)';
        $sql = $sql . 'values (:name, :description, :client_name, :start_date, :checkpoint_date, :delivery_date)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':client_name', $this->client_name);
        $stmt->bindParam(':start_date', $this->start_date);
        $stmt->bindParam(':checkpoint_date', $this->checkpoint_date);
        $stmt->bindParam(':delivery_date', $this->delivery_date);
        $stmt->execute();
        $this->id = $this->pdo->lastInsertId();
        $this->select($this->id);
    }
    public function update()
    {
        $sql = 'update project set name=:name, description=:description, client_name=:client_name, start_date=:start_date, checkpoint_date=:checkpoint_date, delivery_date=:delivery_date';
        $sql = $sql . ' where id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':client_name', $this->client_name);
        $stmt->bindParam(':start_date', $this->start_date);
        $stmt->bindParam(':checkpoint_date', $this->checkpoint_date);
        $stmt->bindParam(':delivery_date', $this->delivery_date);
        $stmt->execute();
        $this->select($this->id);
    }
    public function select(int $id)
    {
        $sql = 'select id, name, description, client_name, start_date, checkpoint_date, delivery_date from project where id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch();
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->description = $data['description'];
        $this->client_name = $data['client_name'];
        $this->start_date = $data['start_date'];
        $this->checkpoint_date = $data['checkpoint_date'];
        $this->delivery_date = $data['delivery_date'];
    }
    public function delete(int $id)
    {
        /*         
        $sql = 'delete from student_tag where student_id in (select id from student where project_id = :id)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        //bindParam va se charger de gérer les caractères spéciaux et éviter les failles de sécurité. Par exemple si y a des é ou autres caractères spé dans un nom qu'on cherche à supprimer.
        $stmt->execute();

        $sql = 'delete from student where project_id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        //bindParam va se charger de gérer les caractères spéciaux et éviter les failles de sécurité. Par exemple si y a des é ou autres caractères spé dans un nom qu'on cherche à supprimer.
        $stmt->execute();


        $sql = 'delete from project_tag where project_id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        //bindParam va se charger de gérer les caractères spéciaux et éviter les failles de sécurité. Par exemple si y a des é ou autres caractères spé dans un nom qu'on cherche à supprimer.
        $stmt->execute(); */

        $sql = 'delete from project where id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        //bindParam va se charger de gérer les caractères spéciaux et éviter les failles de sécurité. Par exemple si y a des é ou autres caractères spé dans un nom qu'on cherche à supprimer.
        $stmt->execute();
    }
}
