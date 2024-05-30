<div class="container mt-4">
    <div class="row  ">
        <div class="col">
            <a href="/registerUsuarios" type="button" class="btn btn-success">Agregar</a>
            <h1>Usuarios</h1>
            <table class="table ">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Nombre de Usuario</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Editar</th>
                        <th>Emilinar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($consulta as $fila) { ?>
                        <tr>
                            <td><?php echo $fila['id']; ?></td>
                            <td><?php echo $fila['nombre']; ?></td>
                            <td><?php echo $fila['apellido']; ?></td>
                            <td><?php echo $fila['nombreUser']; ?></td>
                            <td><?php echo $fila['email']; ?></td>
                            <td><?php echo $fila['password']; ?></td>
                            <td>
                                <form action="/editarUsuarios" method="post">
                                    <input type="hidden" id="id" name="id" value="<?php echo $fila['id']; ?>">
                                    <button type="submit" class="btn btn-warning">Editar</button>
                                </form>
                            </td>
                            <td>
                                <form action="/elimina" method="post">
                                    <input type="hidden" id="id" name="id" value="<?php echo $fila['id']; ?>">
                                    <button type="button" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
