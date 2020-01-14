<div class="modal-header">
    <h5 class="modal-title">Agregar producto</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body container-fluid">
    <form action="add.php" method="POST">
        <div class="form-group row">
            <label class="col-12">
                <p><strong>SKU</strong></p>
                <input type="text" name="sku" placeholder="eg. 1" class="form-control"/>
            </label>
        </div>
        <div class="form-group row">
            <label class="col-12">
                <p><strong>Nombre</strong></p>
                <input type="text" name="nombre" placeholder="eg. 'LED Amarillo de ????'" class="form-control"/>
            </label>
        </div>
        <div class="form-group row">
            <label class="col-12">
                <p><strong>Número de estantería</strong></p>
                <div class="card card-body">
                    <p>-1 indica que el producto no se encuentra en ninguna de las estanterías del depósito y usualmente se dejan indicaciones sobre su ubicación en general.</p>
                    <p>La primera estantería es el 0.</p>
                </div>
                <input type="number" min="-1" name="estanteriaNro" placeholder="eg. 3" class="form-control col-1"/>
            </label>
        </div>
        <div class="form-group row">
            <label class="col-12">
                <p><strong>Número de estante</strong></p>
                <div class="card card-body">
                    <p>-1 indica que el producto no se encuentra en ninguno de los estantes de la estantería. Sirve para darle énfasis a la descripción de ubicación.</p>
                    <p>El primer estante empieza en 0 y es el más alto.</p>
                </div>
                <input type="number" min="-1" name="estanteNro" placeholder="eg. 14" class="form-control col-1"/>
            </label>
        </div>
    </form>
</div>
<div class="modal-footer button-group">
    <input type="submit" class="btn btn-primary"/>
    <button type="button" data-dismiss="modal" class="btn btn-default">&times;</button>
</div>

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