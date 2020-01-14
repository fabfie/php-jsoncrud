<form action="add.php" method="POST">
    <input type="text" name="sku" placeholder="SKU"/>
    <input type="text" name="nombre" placeholder="Nombre"/>
    <input type="text" name="estanteria" placeholder="Letra estantería"/>
    <input type="text" min="0" name="estanteNro" placeholder="Nº de estante"/>
    <input type="submit" name="add"/>
</form>
<?php
if (isset($_POST["add"])) {
    $file = file_get_contents('test.json');
    $data = json_decode($file, true);
    unset($_POST["add"]);
    $data["data"] = array_values($data["data"]);
    array_push($data["data"], $_POST);
    file_put_contents("test.json", json_encode($data));
}
?>