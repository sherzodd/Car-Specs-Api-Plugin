<?php
?>

<table class="table table-striped table-dark">
    <thead>
    <tr>
        <th scope="col">Specification</th>
        <th scope="col">Value</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data->jsonSerialize() as $specification => $value): ?>
        <tr>
            <td><?= htmlspecialchars($specification) ?></td>
            <td><?= isset($value) ? htmlspecialchars($value) : ''; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
