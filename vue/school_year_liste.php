<table>

    <tr>
        <th>id</th>
        <th>name</th>
        <th>description</th>
        <th>start_date</th>
        <th>end_date</th>
    </tr>

    <?php
    foreach ($school_years as $school_year) { ?>


        <tr>
            <?php
            // id, name, description, client_name, start_date, checkpoint_date, delivery_date
            ?>

            <td><?= $school_year['id'] ?></td>
            <td><?= $school_year['name'] ?></td>
            <td><?= $school_year['description'] ?></td>
            <td><?= $school_year['start_date'] ?></td>
            <td><?= $school_year['end_date'] ?></td>
            <td><a href="index.php?table=school_year&id=<?= $project['id'] ?>&op=update">🖊️</a></td>
            <td><a href="index.php?table=school_year&id=<?= $project['id'] ?>&op=delete">
                    ❌</a></td>
        </tr>
    <?php } ?>
</table>