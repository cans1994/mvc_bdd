<form method="POST" action="index.php?table=StudentTag&id=<?= $student->id ?>&op=maj">
    <p>Entrez vos valeurs</p>

    <label>Student ID</label> <br />
    <textarea rows="5" cols="20" student_id="student_id">Entrez votre Student ID</textarea><br />


    <label>Tag Id</label> <br />
    <textarea rows="5" cols="20" tag="tag">Entrez votre Tag ID</textarea><br />
    <input type="submit" value="Validez les valeurs" />
</form>