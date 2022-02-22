<table>

  <tr>
    <th>Student Id</th>
    <th>Tag Id</th>
  </tr>

  <?php //liste des tags avec des boucles for each
  foreach ($studenttags as $studenttag) { ?>
    <tr>
      <td><?= $studenttag['student'] ?></td>
      <td><?= $studenttag['tag'] ?></td>
      <td><a href="index.php?table=tag&id=<?= $tag['id']?>&op=update">🖊️</a> </td>
      <td><a href="index.php?table=tag&id=<?= $tag['id']?>&op=delete">❌</a> </td>
    </tr>
      <?php } ?>
</table>