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
    <link rel="stylesheet" href="css/style.css">

    <title>Localizador de Productos</title>
</head>
<body>
    <div id="modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content"></div>
        </div>
    </div>
    <main class="container-fluid">
        <button type="button" id="add" class="btn btn-primary" data-toggle="modal" data-target="#modal">&plus; Nuevo producto</button>
        <div class="container row d-flex justify-content-between">
            <table class="col-8">
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
                                <button type="button" data-id="<?php echo $index; ?>" class="edit btn btn-warning" data-toggle="modal" data-target="#modal">Editar</button>
                                <button type="button" data-id="<?php echo $index; ?>" class="delete btn btn-danger" data-toggle="modal" data-target="#modal">Borrar</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
            <svg width="320" height="500" class="col-4">
                <!-- 8 --> <rect id="estanteria8" x="10" y="10" width="90" height="30" style="fill:rgb(154,192,224);stroke-width:.5;stroke:rgb(0,0,0)" />
                <!-- 7 --> <rect id="estanteria7" x="100" y="10" width="90" height="30" style="fill:rgb(154,192,224);stroke-width:.5;stroke:rgb(0,0,0)" />
                <!-- 6 --> <rect id="estanteria6" x="190" y="10" width="90" height="30" style="fill:rgb(154,192,224);stroke-width:.5;stroke:rgb(0,0,0)" />
                
                <!-- 15 --> <rect id="estanteria15" x="10" y="40" width="30" height="90" style="fill:rgb(154,192,224);stroke-width:.5;stroke:rgb(0,0,0)" />
                <!-- 14 --> <rect id="estanteria14" x="10" y="130" width="30" height="90" style="fill:rgb(154,192,224);stroke-width:.5;stroke:rgb(0,0,0)" />
                <!-- 13 --> <rect id="estanteria13" x="10" y="220" width="30" height="90" style="fill:rgb(154,192,224);stroke-width:.5;stroke:rgb(0,0,0)" />
                <!-- 12 --> <rect id="estanteria12" x="10" y="310" width="30" height="90" style="fill:rgb(154,192,224);stroke-width:.5;stroke:rgb(0,0,0)" />

                <!-- 11 --> <rect id="estanteria11" x="120" y="310" width="30" height="90" style="fill:rgb(154,192,224);stroke-width:.5;stroke:rgb(0,0,0)" />
                <!-- 10 --> <rect id="estanteria10" x="120" y="220" width="30" height="90" style="fill:rgb(154,192,224);stroke-width:.5;stroke:rgb(0,0,0)" />
                <!-- 9 --> <rect id="estanteria9" x="120" y="130" width="30" height="90" style="fill:rgb(154,192,224);stroke-width:.5;stroke:rgb(0,0,0)" />

                <!-- 5 --> <rect id="estanteria5" x="150" y="130" width="30" height="90" style="fill:rgb(255,192,224);stroke-width:.5;stroke:rgb(0,0,0)" />
                <!-- 4 --> <rect id="estanteria4" x="150" y="220" width="30" height="90" style="fill:rgb(154,192,224);stroke-width:.5;stroke:rgb(0,0,0)" />
                <!-- 3 --> <rect id="estanteria3" x="150" y="310" width="30" height="90" style="fill:rgb(154,192,224);stroke-width:.5;stroke:rgb(0,0,0)" />

                <!-- 0 --> <rect id="estanteria0" x="280" y="310" width="30" height="90" style="fill:rgb(154,192,224);stroke-width:.5;stroke:rgb(0,0,0)" />
                <!-- 1 --> <rect id="estanteria1" x="280" y="220" width="30" height="90" style="fill:rgb(154,192,224);stroke-width:.5;stroke:rgb(0,0,0)" />
                <!-- 2 --> <rect id="estanteria2" x="280" y="130" width="30" height="90" style="fill:rgb(154,192,224);stroke-width:.5;stroke:rgb(0,0,0)" />
                
                <rect x="-20" y="290" width="30" height="90" style="fill:rgba(0,0,0,0);stroke-width:.5;stroke:rgba(0,0,0,.2)" />
                <rect x="-20" y="200" width="30" height="90" style="fill:rgba(0,0,0,0);stroke-width:.5;stroke:rgba(0,0,0,.2)" />
                <rect x="-20" y="110" width="30" height="90" style="fill:rgba(0,0,0,0);stroke-width:.5;stroke:rgba(0,0,0,.2)" />
                <rect x="-20" y="20" width="30" height="90" style="fill:rgba(0,0,0,0);stroke-width:.5;stroke:rgba(0,0,0,.2)" />
                <rect x="-10" y="450" width="160" height="40" style="fill:rgba(0,0,0,0);stroke-width:.5;stroke:rgba(0,0,0,.2)" />
            </svg>
        </div>
    </main>
    <script src="js/jquery-3.4.1.js"></script>
    <script src="js/bootstrap.js"></script>

    <script>
        var modalContent = $('#modal .modal-content');

        $(document).ready(function() {
            
            $('#add').on('click', function() {
                $.ajax({
                    url: "add.php",
                    success: function(response) {
                        $(response).appendTo(modalContent);
                    }
                });
            });

            $('#modal').on('hidden.bs.modal', function() {
                $(this).find('.modal-content').html('');
            })

            $('.edit').on('click', function() {
                $.ajax({
                    url: "edit.php?id=" + $(this).data('id'),
                    success: function(response) {
                        $(response).appendTo(modalContent);
                    }
                });
                console.log($(this).data('id'));
            });
            
            $('.delete').on('click', function() {
                $(`
                    <div class="modal-header">
                        <h5 class="modal-title">Borrar producto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body container-fluid">
                        <p>¿Está seguro de que desea borrar el siguiente producto?</p>
                        <table>
                            <tbody>
                                <tr>
                                    ${$(this).parents('tr').html()}
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer button-group">
                        <input type="submit" value="Borrar" class="btn btn-danger"/>
                        <button type="button" data-dismiss="modal" class="btn btn-default">No</button>
                    </div>
                `).appendTo(modalContent);
                console.log($(this).parents('tr').html());
            });
        });
    </script>
    <script src="svgRackHandler.js"></script>
</body>
</html>