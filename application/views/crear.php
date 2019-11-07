<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Inventory</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<div class="container mt-4">
		<div id="app" class="container m-2">
			<table class="table table-striped">
				<thead class="thead-dark">
					<tr>
						<th>Crear empleado</th>
					</tr>
				</thead>
				<tbody id="item-list">
				</tbody>
			</table>
			<nav id="pag">

			</nav>
		</div>
	</div>


	<div class="container">
		<div class="col-sm-12">
		<form id="formItem" action="CrearEmpleado/crearEmpleado">
            <div  class="form-group">
                <label for="">Nombre completo *</label>
                <input name="nombre" type="text" class="form-control"  placeholder="Nombre" required>
			</div>
			
			<div  class="form-group">
                <label for="">Correo electronico *</label>
                <input name="email" type="text" class="form-control"  placeholder="Nombre" required>
			</div>


			<div  class="form-group">
                <label for="">Sexo *</label>
				<div class="radio">
					<label><input type="radio"  value="m" name="genero"> Masculino</label><br>
  					<label><input type="radio" value="f" name="genero"> Femenino</label>
				</div>
			</div>


			<div class="form-group">
			<label for="sel1">Area *</label>
			<select class="form-control" id="area" name="area">
				<option value="">Seleccione una area</option>
				<?php foreach ($areas as $area) {?>
					<option value="<?= $area->id;?>"><?= $area->area;?></option>
				<?php } ?>
			</select>
			</div>
		
            <div class="form-group">
            <label for="">Descripcion *</label>
				<textarea class="form-control" name="descripcion" cols="30" rows="5"></textarea>
				
			<label class="checkbox-inline"><input type="checkbox"  name="boletin"> Deseo recibir boletin informativo</label>
			</div>
			
			<div class="form-group">
			<label for="">Roles *</label>
				<?php foreach ($roles as $rol) {?>
					<div class="checkbox">
						<label><input type="checkbox" name="check_list[]" value="<?= $rol->id;?>"> <?= $rol->nombre;?></label>
					</div>
				<?php } ?>
			</div>
		
			<button type="submit" class="btn btn-dark btn-md">Guardar</button>
            
        </form>
		</div>
	</div>


	<br>
	<br>

	

<?php include("layouts/modal.php") ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="assets/js/main.js"></script>
</body>
</html>