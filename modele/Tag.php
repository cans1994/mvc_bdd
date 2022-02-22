<?php

require_once('Connexionbdd.php');

class Tag
{ //création d'une classe et déclaration de la base de données, accède à la table de données
  public int $id;
  public string $name;
  public string $description;
  private $pdo;

  public function __construct() // création d'une nouvelle instance de l'objet, ce qui est intéressant pour toutes les initialisations dont l'objet a besoin avant d'être utilisé. il faut qu'il sache comment se connecter à la bdd.
  {
    $this->pdo = getPdo();
  }

  public function tous()
  {
    $sql = "select id, name, description from tag";
    $stmt = $this->pdo->prepare($sql); // prépare la requête sql
    $stmt->execute(); // exécute la requête
    $data = $stmt->fetchAll(); // récupérer la requête
    return $data;
  }

  public function update()
  {
    $sql = 'update tag set name=:name, description=:description';
    $sql = $sql . ' where id = :id';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':description', $this->description);
    $stmt->execute();
    $this->select($this->id);
  }

  public function insert()
  {
    $sql = 'insert into tag (name, description)';
    $sql = $sql . ' values (:name, :description)';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':description', $this->description);
    $stmt->execute();
    $this->id = $this->pdo->lastInsertId();
    $this->select($this->id);
  }


  public function select(int $id)
  {
    $sql = 'select id, name, description from tag where id = :id';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $data = $stmt->fetch();
    $this->id = $data['id'];
    //$this->name = $data['name'];
    //$this->description = $data['description'];
  }

  public function delete(int $id)
  {
    $sql = 'delete from tag where id = :id';
    $stmt = $this->pdo->prepare($sql); //préparer la requete sql,
    $stmt->bindParam(':id', $id); // gère les caractères spéciaux, sert à éviter des failles de sécurité
    $stmt->execute(); // exécuter la requête
  }
}
