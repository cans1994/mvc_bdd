<form action="index.php?table=project&op=insert" method="post">

  <h2>Ajoutez votre project</h2>

  <label>Nom du projet</label> <br />
  <textarea rows="5" cols="20" name="name" placeholder="Entrez le nom du projet"></textarea><br />

  <label>Description</label><br />
  <textarea rows="5" cols="20" name="description">Ajoutez une description</textarea><br />

  <label>Nom du client</label><br />
  <textarea rows="5" cols="20" name="client_name">Ajoutez le nom du client</textarea><br />

  <label>Date de début du projet</label> <br />
  <textarea rows="5" cols="20" name="start_date">Ajoutez la date du début de votre projet</textarea><br />

  <label>Date de point de contrôle</label> <br />
  <textarea rows="5" cols="20" name="checkpoint_date">Ajoutez la date de point de contrôle</textarea><br />

  <label>Date de rendu</label> <br />
  <textarea rows="5" cols="20" name="delivery_date">Ajoutez la date de rendu</textarea><br />
  <input type="submit" value="Validez les valeurs" />

</form>