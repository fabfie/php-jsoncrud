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

    $post["code"] = isset($_POST["code"]) ? $_POST["code"] : "";
    $post["subcode"] = isset($_POST["subcode"]) ? $_POST["subcode"] : "";
    $post["shelf"] = isset($_POST["shelf"]) ? $_POST["shelf"] : "";
    $post["rack"] = isset($_POST["rack"]) ? $_POST["rack"] : "";



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

<div class="modal-header">
    <h5 class="modal-title">Modal title</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body container-fluid">
    <form action="edit.php" method="POST">
        <input type="hidden" value="<?php echo $id ?>" name="id" class="form-control"/>

        <div class="form-group row">
            <label class="col-12">
                <p><strong>SKU</strong></p>
                <input type="text" name="code" value="<?php echo $jsonfile["code"] ?>" placeholder="eg. 1" class="form-control"/>
            </label>
        </div>
        <div class="form-group row">
            <label class="col-12">
                <p><strong>subcode</strong></p>
                <input type="text" name="subcode" value="<?php echo $jsonfile["subcode"] ?>" placeholder="eg. 'LED Amarillo de ????'" class="form-control"/>
            </label>
        </div>
        <div class="form-group row">
            <label class="col-12">
                <p><strong>Número de estantería</strong></p>
                <div class="card card-body">
                    <p>-1 indica que el producto no se encuentra en ninguna de las estanterías <br>del depósito y usualmente se dejan indicaciones sobre su ubicación en general.</p>
                    <p>La primera estantería es el 0.</p>
                </div>
                <input type="number" min="-1" name="rackNro" value="<?php echo $jsonfile["shelf"] ?>" placeholder="eg. 3" class="form-control col-1"/>
            </label>
        </div>
        <div class="form-group row">
            <label class="col-12">
                <p><strong>Número de estante</strong></p>
                <div class="card card-body">
                    <p>-1 indica que el producto no se encuentra en ninguno de los estantes de la estantería. <br>Sirve para darle énfasis a la descripción de ubicación.</p>
                    <p>El primer estante empieza en 0 y es el más alto.</p>
                </div>
                <input type="number" min="-1" name="shelf" value="<?php echo $jsonfile["rack"] ?>" placeholder="eg. 14" class="form-control col-1"/>
            </label>
        </div>
    </form>
</div>
<div class="modal-footer button-group">
    <input type="submit" value="Confirm changes" class="btn btn-primary"/>
    <button type="button" data-dismiss="modal" class="btn btn-default">Cancelar</button>
</div>



<?php endif; ?>