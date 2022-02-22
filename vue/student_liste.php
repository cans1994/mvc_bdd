<table>

  <tr>
    <th>Id</th>
    <th>Id année scolaire</th>
    <th>Projet Id</th>
    <th>Prénom</th>
    <th>Nom de famille</th>
    <th>Email</th>
    <th>Crée le :</th>
    <th>Modifié le :</th>

  </tr>

  <?php //liste des tags avec des boucles for each
  foreach ($students as $student) { ?>
    <tr>
      <td><?= $student['id'] ?></td>
      <td><?= $student['school_year_id'] ?></td>
      <td><?= $student['project_id'] ?></td>
      <td><?= $student['firstname'] ?></td>
      <td><?= $student['lastname'] ?></td>
      <td><?= $student['email'] ?></td>
      <td><?= $student['created_at'] ?></td>
      <td><?= $student['updated_at'] ?></td>
      <td><a href="index.php?table=tag&id=<?= $student['id']?>&op=update">🖊️</a> </td>
      <td><a href="index.php?table=tag&id=<?= $student['id']?>&op=delete">❌</a> </td>
    </tr>
      <?php } ?>
</table>