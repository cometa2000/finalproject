
<div class="container">

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    <form role="form" action="/registerUser" method="post" novalidate>
        <input type="hidden" name="action" value="insertar_datos">
        <h2>Regístrate. <small>Es gratis y siempre lo será.</small></h2>
        <hr class="colorgraph">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <input type="text" name="nombre" id="nombre" class="form-control input-lg" placeholder="Nombre de pila" tabindex="1">
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <input type="text" name="apellido" id="apellido" class="form-control input-lg" placeholder="Apellido/s" tabindex="2">
                </div>
            </div>
        </div>
        <div class="form-group">
            <input type="text" name="nombreUser" id="nombreUser" class="form-control input-lg" placeholder="Nombre para mostrar" tabindex="3">
        </div>
        <div class="form-group">
            <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Dirección de correo electrónico" tabindex="4" >
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Contraseña" tabindex="5">
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <input type="password" name="confirmarPassword" id="confirmarPassword" class="form-control input-lg" placeholder="Confirmar Contraseña" tabindex="6">
                </div>
            </div>
        </div>
        <hr class="colorgraph">
        <div class="row">
            <div class="col-xs-12 col-md-6"><input type="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
            <div class="col-xs-12 col-md-6"><a href="/login" class="btn btn-success btn-block btn-lg">Sign In</a></div>
        </div>
    </form>

	</div>
</div>

</div>