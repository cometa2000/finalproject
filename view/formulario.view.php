<!-- formulario.view.php -->
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h1>Agregar Máquina</h1>
            <form action="/ciberForm" method="post">
                <div class="form-group">
                    <label for="nombre_maquina">Nombre de Máquina</label>
                    <input type="text" class="form-control" id="nombre_maquina" name="nombre_maquina" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>
