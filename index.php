<?php
	$getfile = file_get_contents('locations.json');
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
		<div class="col-8 container row d-flex justify-content-between">
			<input type="text" id="searchBar" placeholder="Search..." class="form-control">
		</div>
		<div class="col-8 container row d-flex justify-content-between p-0 mx-2">
			<div id="scanner"></div>
			<table class="table">
				<thead>
					<tr>
						<th>Rack</th>
						<th>Shelf</th>
						<th>Code</th>
						<th>Subcode</th>
						<th>Kit list</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><input type="number" name="rack" min="-2" placeholder="(0-?)" class="form-control"></td>
						<td><input type="number" name="shelf" min="-2" placeholder="(0-?)" class="form-control"></td>
						<td><input type="number" name="code" placeholder="sku" class="form-control"></td>
						<td><input type="number" name="subcode" placeholder="optional" class="form-control"></td>
						<td><button id="addButton" type="button" class="edit btn btn-success">(+)</button></td>
					</tr>
					<?php foreach ($jsonfile->data as $index => $obj): ?>
						<tr>
							<td><?php echo $obj->rack; ?></td>
							<td><?php echo $obj->shelf; ?></td>
							<td class="searchQueue"><?php echo $obj->code; ?></td>
							<td><?php echo $obj->subcode; ?></td>
							<td>
								<!-- <button type="button" data-id="<?php /*echo $index; */?>" class="edit btn btn-warning" data-toggle="modal" data-target="#modal">Editar</button> -->
								<!-- <button type="button" data-id="<?php /*echo $index; */?>" class="delete btn btn-danger" data-toggle="modal" data-target="#modal">Borrar</button> -->
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<!-- <svg id="racksSVG" width="320" height="500" class="col-4">
				<rect id="r8" x="10" y="10" width="90" height="30" style="fill:rgb(154,192,224);stroke-width:.5;stroke:rgb(0,0,0)" />
				<rect id="r7" x="100" y="10" width="90" height="30" style="fill:rgb(154,192,224);stroke-width:.5;stroke:rgb(0,0,0)" />
				<rect id="r6" x="190" y="10" width="90" height="30" style="fill:rgb(154,192,224);stroke-width:.5;stroke:rgb(0,0,0)" />
				
				<rect id="r15" x="10" y="40" width="30" height="90" style="fill:rgb(154,192,224);stroke-width:.5;stroke:rgb(0,0,0)" />
				<rect id="r14" x="10" y="130" width="30" height="90" style="fill:rgb(154,192,224);stroke-width:.5;stroke:rgb(0,0,0)" />
				<rect id="r13" x="10" y="220" width="30" height="90" style="fill:rgb(154,192,224);stroke-width:.5;stroke:rgb(0,0,0)" />
				<rect id="r12" x="10" y="310" width="30" height="90" style="fill:rgb(154,192,224);stroke-width:.5;stroke:rgb(0,0,0)" />

				<rect id="r11" x="120" y="310" width="30" height="90" style="fill:rgb(154,192,224);stroke-width:.5;stroke:rgb(0,0,0)" />
				<rect id="r10" x="120" y="220" width="30" height="90" style="fill:rgb(154,192,224);stroke-width:.5;stroke:rgb(0,0,0)" />
				<rect id="r9" x="120" y="130" width="30" height="90" style="fill:rgb(154,192,224);stroke-width:.5;stroke:rgb(0,0,0)" />

				<rect id="r5" x="150" y="130" width="30" height="90" style="fill:rgb(255,192,224);stroke-width:.5;stroke:rgb(0,0,0)" />
				<rect id="r4" x="150" y="220" width="30" height="90" style="fill:rgb(154,192,224);stroke-width:.5;stroke:rgb(0,0,0)" />
				<rect id="r3" x="150" y="310" width="30" height="90" style="fill:rgb(154,192,224);stroke-width:.5;stroke:rgb(0,0,0)" />

				<rect id="r0" x="280" y="310" width="30" height="90" style="fill:rgb(154,192,224);stroke-width:.5;stroke:rgb(0,0,0)" />
				<rect id="r1" x="280" y="220" width="30" height="90" style="fill:rgb(154,192,224);stroke-width:.5;stroke:rgb(0,0,0)" />
				<rect id="r2" x="280" y="130" width="30" height="90" style="fill:rgb(154,192,224);stroke-width:.5;stroke:rgb(0,0,0)" />
				
				<rect x="-20" y="290" width="30" height="90" style="fill:rgba(0,0,0,0);stroke-width:.5;stroke:rgba(0,0,0,.2)" />
				<rect x="-20" y="200" width="30" height="90" style="fill:rgba(0,0,0,0);stroke-width:.5;stroke:rgba(0,0,0,.2)" />
				<rect x="-20" y="110" width="30" height="90" style="fill:rgba(0,0,0,0);stroke-width:.5;stroke:rgba(0,0,0,.2)" />
				<rect x="-20" y="20" width="30" height="90" style="fill:rgba(0,0,0,0);stroke-width:.5;stroke:rgba(0,0,0,.2)" />
				<rect x="-10" y="450" width="160" height="40" style="fill:rgba(0,0,0,0);stroke-width:.5;stroke:rgba(0,0,0,.2)" />
			</svg>
			<svg>
				<rect id="s0" x="10" y="10" width="90" height="30" style="fill:rgb(154,192,224);stroke-width:.5;stroke:rgb(0,0,0)" />
			</svg> -->
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


			var scannerHTML = $('#scanner');
			document.addEventListener('mousemove', logKey);
			var scannerHeight = scannerHTML.css('height');
			var pxIndex = scannerHeight.indexOf('px');
			scannerHeight = scannerHeight.slice(0,pxIndex);
			window = $(window);

			function logKey(e) {
				scannerHTML.attr('style', `top: ${window.scrollY + e.clientY - parseInt(scannerHeight) / 1.2}px`);
			}
			
			$('#searchBar').on('keyup', function() {
				var array = $('table').find('.searchQueue');
				var text;
				for (var i = 0; i < array.length; i++) {
					text = array[i].textContent;
					if (text.indexOf($('#searchBar').val() >= 0)) {
						$(array[i]).parent().show();
						console.log("yes");
					} else {
						$(array[i]).parent().hide();
						console.log("no");
					}
				}
			});

			// $('.delete').on('click', function() {
			// 	$(`
			// 		<div class="modal-header">
			// 			<h5 class="modal-title">Borrar producto</h5>
			// 			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			// 				<span aria-hidden="true">&times;</span>
			// 			</button>
			// 		</div>
			// 		<div class="modal-body container-fluid">
			// 			<p>¿Está seguro de que desea borrar el siguiente producto?</p>
			// 			<table>
			// 				<tbody>
			// 					<tr>
			// 						${$(this).parents('tr').html()}
			// 					</tr>
			// 				</tbody>
			// 			</table>
			// 		</div>
			// 		<div class="modal-footer button-group">
			// 			<input type="submit" value="Borrar" class="btn btn-danger"/>
			// 			<button type="button" data-dismiss="modal" class="btn btn-default">No</button>
			// 		</div>
			// 	`).appendTo(modalContent);
			// 	console.log($(this).parents('tr').html());
			// });
		});
	</script>
	<script src="main.js"></script>
</body>
</html>