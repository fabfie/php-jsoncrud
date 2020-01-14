<?php
    $getfile = file_get_contents('test.json');
    $jsonfile = json_decode($getfile);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/bootstrap.css">

    <title>Localizador de Productos</title>
</head>
<body>
    <div id="modal"></div>
    <main>
        <a href="add.php" class="btn btn-primary">Add</a>
        <table>
            <thead>
                <tr>
                    <th>SKU</th>
                    <th>Producto y/o descripción</th>
                    <th>Estantería</th>
                    <th>Estante</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jsonfile->data as $index => $obj): ?>
                    <tr>
                        <td><?php echo $obj->sku; ?></td>
                        <td><?php echo $obj->nombre; ?></td>
                        <td><?php echo $obj->estanteNro; ?></td>
                        <td><?php echo $obj->estanteria; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $index; ?>" class="btn btn-warning">Edit</a>
                            <a href="delete.php?id=<?php echo $index; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <script src="js/bootstrap.js"></script>
</body>
</html>

<?php