<?php

require_once('Connexionbdd.php');

class StudentTag { //création d'une classe et déclaration de la base de données, accède à la table de données
    public string $studentid;
    public string $tagid;
    private $pdo;

    public function __construct() // création d'une nouvelle instance de l'objet, ce qui est intéressant pour toutes les initialisations dont l'objet a besoin avant d'être utilisé. il faut qu'il sache comment se connecter à la bdd.
    {
        $this->pdo = getPdo();   
    }

    public function tous() 
    {
        $sql = "select studentid, tagid from student_tag";
        $stmt = $this->pdo->prepare($sql); // prépare la requête sql
        $stmt->execute(); // exécute la requête
        $data = $stmt->fetchAll(); // récupérer la requête
        return $data;   
    }

    public function update()
    {
      $sql = 'update tag set studentid=:student_id, tagid=:tag_id';
      //$sql = $sql . ' where id = :id';
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(':student_id', $this->studentid);
      $stmt->bindParam(':tag_id', $this->tagid);
      $stmt->execute();
      //$this->select($this->id);
    }

    public function insert()
    {
      $sql = 'insert into tag (studentid, tagid)';
      $sql = $sql . ' values (:student_id, :tag_id)';
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(':student_id', $this->studentid);
      $stmt->bindParam(':tag_id', $this->tagid);
      $stmt->execute();
      $this->id = $this->pdo->lastInsertId();
      //$this->select($this->id);
    }
  

    public function select(int $id)
    {
    $sql = 'select student, description from tag where i
    
    id = :id';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $data = $stmt->fetch();
    $this->id = $data['id'];
    $this->name = $data['name'];
    $this->description = $data['description'];
    }

    public function delete(int $id) {
        $sql = 'delete from tag where id = :id'; 
        $stmt = $this->pdo->prepare($sql); //préparer la requete sql,
        $stmt->bindParam(':id', $id); // gère les caractères spéciaux, sert à éviter des failles de sécurité
        $stmt->execute(); // exécuter la requête
    }

}