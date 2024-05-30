<?php 
	use model\TablaCiber;
	$consulta = new TablaCiber();
	$id = $_POST['id'];
    $ciber = $consulta->consulta()->where('id', $id)->first();
	
?>
<!-- editform.view.php -->
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h1>Editar Máquina</h1>
            <form action="/editarDatos" method="post">
                <input type="hidden" id="id" name="id" value="<?php echo  $ciber['id']; ?>">
                <div class="form-group">
                    <label for="nombre_maquina">Nombre de Máquina</label>
                    <input type="text" class="form-control" id="nombre_maquina" name="nombre_maquina" value="<?php echo  $ciber['nombre_maquina']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>
</div>
