

<!------ Include the above in your HEAD tag ---------->
<?php
   use config\Router;
   $dependencia = new Router;
?>
      <div class="sidenav">
         <div class="login-main-text">
            <h2>Application<br> Login Page</h2>
            <p>Login or register from here to access.</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form role="form" action="/loginUser" method="post">
                  <div class="form-group">
                     <label>User Name</label>
                     <input type="text" name="nombreUser" id="nombreUser" class="form-control" placeholder="User Name">
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                  </div>
                  <button type="submit" class="btn btn-black">Login</button>
                  <a href="/register" class="btn btn-secondary">Register</a>
               </form>
            </div>
         </div>
      </div>