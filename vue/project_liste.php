<table>

    <tr>
        <th>id</th>
        <th>name</th>
        <th>description</th>
        <th>client_name</th>
        <th>start_date</th>
        <th>checkpoint_date</th>
        <th>delivery_date</th>
    </tr>

    <?php
    foreach ($projects as $project) { ?>


        <tr>
            <?php
            // id, name, description, client_name, start_date, checkpoint_date, delivery_date
            ?>

            <td><?= $project['id'] ?></td>
            <td><?= $project['name'] ?></td>
            <td><?= $project['description'] ?></td>
            <td><?= $project['client_name'] ?></td>
            <td><?= $project['start_date'] ?></td>
            <td><?= $project['checkpoint_date'] ?></td>
            <td><?= $project['delivery_date'] ?></td>
            <td><a href="index.php?table=project&id=<?= $project['id'] ?>&op=update">🖊️</a></td>
            <td><a href="index.php?table=project&id=<?= $project['id'] ?>&op=insert">✖️ </a></td>
            <td><a href="index.php?table=project&id=<?= $project['id'] ?>&op=delete">❌</a></td>
        </tr>
    <?php } ?>
</table>