<?php
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $getfile = file_get_contents('test.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["data"];
    $jsonfile = $jsonfile[$id];
}

if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
    $getfile = file_get_contents('test.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["data"];
    $jsonfile = $jsonfile[$id];

    $post["sku"] = isset($_POST["sku"]) ? $_POST["sku"] : "";
    $post["nombre"] = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
    $post["estanteNro"] = isset($_POST["estanteNro"]) ? $_POST["estanteNro"] : "";
    $post["estanteria"] = isset($_POST["estanteria"]) ? $_POST["estanteria"] : "";



    if ($jsonfile) {
        unset($all["data"][$id]);
        $all["data"][$id] = $post;
        $all["data"] = array_values($all["data"]);
        file_put_contents("test.json", json_encode($all));
    }
    header("Location: index.php");
}
?>
<?php if (isset($_GET["id"])): ?>
    <form action="edit.php" method="POST">
        <input type="hidden" value="<?php echo $id ?>" name="id"/>
        <input type="text" value="<?php echo $jsonfile["sku"] ?>" name="sku"/>
        <input type="text" value="<?php echo $jsonfile["nombre"] ?>" name="nombre"/>
        <input type="number" value="<?php echo $jsonfile["estanteNro"] ?>" name="estanteNro"/>
        <input type="text" value="<?php echo $jsonfile["estanteria"] ?>" name="estanteria"/>
        <input type="submit"/>
    </form>
<?php endif; ?>