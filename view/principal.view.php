<!-- principal.view.php -->
<?php
use config\Router;

$ruta = new Router;
?>
<div class="container mt-4">
    <div class="row mb-3">
        <div class="col d-flex justify-content-between">
            <a href="/formulario" type="button" class="btn btn-success">Agregar Máquina</a>
            <a href="<?=$ruta->redireccion('logout') ?>"  type="button" class="btn btn-danger">Cerrar Sesión</a>
        </div>
    </div>
    <h1>Máquinas del Ciber Café</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre de Máquina</th>
                <th>Hora de Inicio</th>
                <th>Cronómetro</th>
                <th>Día</th>
                <th>Precio</th>
                <th>Pausar/Reanudar</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($consulta as $fila) { ?>
                <tr>
                    <td><?php echo $fila['nombre_maquina']; ?></td>
                    <td><?php echo $fila['tiempo_de_inicio']; ?></td>
                    <td id="cronometro-<?php echo $fila['id']; ?>"><?php echo gmdate("H:i:s", $fila['cronometro']); ?></td>
                    <td><?php echo $fila['dia']; ?></td>
                    <td id="precio-<?php echo $fila['id']; ?>"><?php echo $fila['precio']; ?></td>
                    <td>
                        <button class="btn btn-primary" onclick="toggleCronometro(<?php echo $fila['id']; ?>, '<?php echo $fila['estado']; ?>')">
                            <?php echo $fila['estado'] === 'activo' ? 'Pausar' : 'Reanudar'; ?>
                        </button>
                    </td>
                    <td>
                        <form action="/edit" method="post">
                            <input type="hidden" id="id" name="id" value="<?php echo $fila['id']; ?>">
                            <button type="submit" class="btn btn-warning">Editar</button>
                        </form>
                    </td>
                    <td>
                        <form action="/eliminarDatos" method="post">
                            <input type="hidden" id="id" name="id" value="<?php echo $fila['id']; ?>">
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
let cronometros = {};
let precios = {};

function startCronometro(id, tiempoInicial, precioInicial) {
    if (cronometros[id]) clearInterval(cronometros[id]);
    let tiempo = tiempoInicial;
    let precio = precioInicial;
    cronometros[id] = setInterval(() => {
        tiempo++;
        if (tiempo % 1 === 0) { // Cada 3 minutos (180 segundos)
            precio += 0.02;
            document.getElementById(`precio-${id}`).innerText = precio.toFixed(2);
        }
        document.getElementById(`cronometro-${id}`).innerText = new Date(tiempo * 1000).toISOString().substr(11, 8);
        precios[id] = precio;
    }, 1000);
}

function pauseCronometro(id) {
    if (cronometros[id]) clearInterval(cronometros[id]);
}

function toggleCronometro(id, estado) {
    const button = document.querySelector(`button[onclick="toggleCronometro(${id}, '${estado}')"]`);
    if (estado === 'activo') {
        pauseCronometro(id);
        button.innerText = 'Reanudar';
        button.setAttribute('onclick', `toggleCronometro(${id}, 'pausado')`);
    } else {
        const tiempoTranscurrido = document.getElementById(`cronometro-${id}`).innerText.split(':').reduce((acc, time) => (60 * acc) + +time);
        const precioActual = parseFloat(document.getElementById(`precio-${id}`).innerText);
        startCronometro(id, tiempoTranscurrido, precioActual);
        button.innerText = 'Pausar';
        button.setAttribute('onclick', `toggleCronometro(${id}, 'activo')`);
    }
}

// Inicializar los cronómetros activos al cargar la página
<?php foreach ($consulta as $fila) { 
    if ($fila['estado'] === 'activo') { ?>
        startCronometro(<?php echo $fila['id']; ?>, <?php echo $fila['cronometro']; ?>, <?php echo $fila['precio']; ?>);
    <?php }
} ?>
</script>
