<?php

require_once('Connexionbdd.php');

class Student
{ //création d'une classe et déclaration de la base de données, accède à la table de données
  public int $id;
  public int $school_year_id;
  public int $project_id;
  public string $firstname;
  public string $lastname;
  public string $email;
  public DateTime $created_at;
  public DateTime $updated_at;
  private $pdo;

  public function __construct() // création d'une nouvelle instance de l'objet, ce qui est intéressant pour toutes les initialisations dont l'objet a besoin avant d'être utilisé. il faut qu'il sache comment se connecter à la bdd.
  {
    $this->pdo = getPdo();
  }

  public function tous()
  {
    $sql = "select id, school_year_id, project_id, firstname, lastname, email, created_at, updated_at from student";
    $stmt = $this->pdo->prepare($sql); // prépare la requête sql
    $stmt->execute(); // exécute la requête
    $data = $stmt->fetchAll(); // récupérer la requête
    return $data;
  }

  public function update()
  {
    $sql = 'update student set schoolyearid =:school_year_id, projectid =:project_id, firstname =:firstname, lastname =;lastname, email =:email, createdat =:created_at, updatedat =:updated_at';
    $sql = $sql . ' where id = :id';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':school_year_id', $this->school_year_id);
    $stmt->bindParam(':project_id', $this->project_id);
    $stmt->bindParam(':firstname', $this->firstname);
    $stmt->bindParam(':lastname', $this->lastname);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':created_at', $this->created_at);
    $stmt->bindParam(':updated_at', $this->updated_at);
    $stmt->bindParam(':id', $this->id);
    $stmt->execute();
    $this->select($this->id);
  }

  public function insert()
  {
    $sql = 'insert into tag (school_year_id, project_id, firstname, lastname, email, created_at, updated_at)';
    $sql = $sql . ' values (:school_year_id,:project_id, :firstname, :lastname, :email, :created_at, :updated_at)';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':school_year_id', $this->school_year_id);
    $stmt->bindParam(':project_id', $this->project_id);
    $stmt->bindParam(':firstname', $this->firstname);
    $stmt->bindParam(':lastname', $this->lastname);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':created_at', $this->created_at);
    $stmt->bindParam(':updated_at', $this->updated_at);
    $stmt->execute();
    $this->id = $this->pdo->lastInsertId();
    $this->select($this->id);
  }


  public function select(int $id)
  {
    $sql = 'select id, school_year_id, project_id, firstname, lastname, email, created_at, updated_at from student where id = :id';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $data = $stmt->fetch();
    $this->id = $data['id'];
    $this->school_year_id = $data['school_year_id'];
    $this->project_id = $data['project_id'];
    $this->firstname = $data['firstname'];
    $this->lastname = $data['lastname'];
    $this->email = $data['email'];
    //$this->created_at = $data['created_at'];
    //$this->updated_at = $data['updated_at'];
  }

  public function delete(int $id)
  {
    $sql = 'delete from tag where id = :id';
    $stmt = $this->pdo->prepare($sql); //préparer la requete sql,
    $stmt->bindParam(':id', $id); // gère les caractères spéciaux, sert à éviter des failles de sécurité
    $stmt->execute(); // exécuter la requête
  }
}
