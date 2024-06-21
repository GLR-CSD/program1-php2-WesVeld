<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nummerlijst</title>
    <link rel="stylesheet" href="public/css/simple.css">
</head>
<body>
<h1>Nummerlijst</h1>
<table>
    <tr>
        <th>ID</th>
        <th>AlbumID</th>
        <th>Titel</th>
        <th>Duur</th>
        <th>URL</th>
    </tr>
    <?php foreach ($nummers as $nummer): ?>
        <tr>
            <td><?= $nummer->getID() ?></td>
            <td><?= $nummer->getAlbumID() ?></td>
            <td><?= $nummer->getTitel() ?></td>
            <td><?= $nummer->getDuur() ?></td>
            <td><a href="<?= $nummer->getURL() ?>" target="_blank"><?= $nummer->getURL() ?></a></td>
        </tr>
    <?php endforeach; ?>
</table>

<div class="notice">
    <h2>Persoon Toevoegen:</h2>
    <?php if (!empty($errors)): ?>
        <div style="color: red;">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <form action="toevoegen.php" method="post">
        <label for="voornaam">Voornaam:</label>
        <input type="text" id="voornaam" name="voornaam" value="<?= $formValues['voornaam'] ?? '' ?>" required>
        <?php if (isset($errors['voornaam'])): ?>
            <span style="color: red;"><?= $errors['voornaam'] ?></span>
        <?php endif; ?><br>

        <label for="achternaam">Achternaam:</label>
        <input type="text" id="achternaam" name="achternaam" value="<?= $formValues['achternaam'] ?? '' ?>"  required>
        <?php if (isset($errors['achternaam'])): ?>
            <span style="color: red;"><?= $errors['achternaam'] ?></span>
        <?php endif; ?><br>

        <label for="telefoonnummer">Telefoonnummer:</label>
        <input type="text" id="telefoonnummer" name="telefoonnummer" value="<?= $formValues['telefoonnummer'] ?? '' ?>">
        <?php if (isset($errors['telefoonnummer'])): ?>
            <span style="color: red;"><?= $errors['telefoonnummer'] ?></span>
        <?php endif; ?><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= $formValues['email'] ?? '' ?>">
        <?php if (isset($errors['email'])): ?>
            <span style="color: red;"><?= $errors['email'] ?></span>
        <?php endif; ?><br>

        <label for="opmerkingen">Opmerkingen:</label><br>
        <textarea id="opmerkingen" name="opmerkingen" rows="4" cols="50">
            <?= $formValues['opmerkingen'] ?? '' ?>
        </textarea><br>
        <input type="submit" value="Toevoegen">
    </form>
</div>

</body>
</html>
