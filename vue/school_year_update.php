<form method="POST" action="index.php?table=school_year&id=<?= $tag->id ?>&op=maj">
    <p>Entrez vos valeurs</p>

    <label>Name</label> <br />
    <textarea rows="5" cols="20" name="nom">Entrez le nom</textarea><br />


    <label>Description</label> <br />
    <textarea rows="5" cols="20" name="description">Ajoutez une description</textarea><br />
    <input type="submit" value="Validez les valeurs" />

    <label>start_date</label> <br />
    <textarea rows="5" cols="20" name="start_date">Ajoutez une date de début</textarea><br />
    <input type="submit" value="Validez les valeurs" />

    <label>end_date</label> <br />
    <textarea rows="5" cols="20" name="end_date">Ajoutez une end_date</textarea><br />
    <input type="submit" value="Validez les valeurs" />

</form>