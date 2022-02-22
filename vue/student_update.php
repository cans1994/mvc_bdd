<form method="POST" action="index.php?table=Student&id=<?= $student->id ?>&op=maj">
    <p>Entrez vos valeurs</p>
    <label for="id">ID</label> <br />
    <textarea rows="5" cols="20" id="id">Entrez votre ID</textarea><br />

    <label for="name">Name</label> <br />
    <textarea rows="5" cols="20" name="name">Entrez votre nom</textarea><br />


    <label>Année scolaire</label> <br />
    <textarea rows="5" cols="20" name="school_year_id">Ajoutez votre ID de l'année scolaire </textarea><br />
    <input type="submit" value="Validez les valeurs" />
</form>