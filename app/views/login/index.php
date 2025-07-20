<?php session_start(); ?>

<?php require_once 'app/views/templates/headerPublic.php'?>



<main role="main" class="login-container">
  <div class="page-container">
    <div class="page-header" id="banner">
        <div class="row">
          <div>
             <h1>Login</h1>
          </div>
         </div>
    </div>

  <div class="row">
    <div>
      <form action="/login/verify" method="post" >
        <div class="form-group">
          <label for="username">Username:</label>
          <br>
          <input required type="text" class="form-control" name="username">
          <br><br>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <br>
          <input required type="password" class="form-control" name="password">
          <br>
        </div>
          <br>
          <button type="submit">Login</button>	
      </form> 
      <p>Don't have an account? <a href ="/create/index">Sign up</a></p>
    </div>
    <?php if (isset($_SESSION['error'])): ?>
      <p style="color: red;"><?php echo $_SESSION['error']; ?></p>
      <?php unset($_SESSION['error']);?>
    <?php endif;?>
  </div>
  </div>	
</main>	

  <?php require_once 'app/views/templates/footer.php' ?>
