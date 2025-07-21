<?php session_start(); ?>

<?php require_once 'app/views/templates/headerPublic.php'?>

  <div class="page-container">
    <div class="signup">
      <h1>Sign Up</h1>
      <form method="post" action="/create/save">
        <label for="username">Username:</label>
        <br>
        <input type="text" id="username" name="username" required>
        <br><br>
        <label for="password">Password:</label>
        <br>
        <input type="password" id="password" name="password" required>
        <br><br>
        <label for="confirm_password">Confirm Password:</label>
        <br>
        <input type="password" id="confirm_password" name="confirm_password" required>
        <br><br>
        <button type="submit" value="Sign Up">Sign Up</button>
        <br>
      </form>

      <?php if (isset($_SESSION['error'])): ?>
        <p style="color: red;"><?php echo $_SESSION['error']; ?></p>
        <?php unset($_SESSION['error']);?>
      <?php endif;?>

      <?php if (isset($_SESSION['success'])): ?>
        <p style="color: green;"><?php echo $_SESSION['success']; ?></p>
        <?php unset($_SESSION['success']);?>
      <?php endif;?> 
    </div>
  </div>

    <?php require_once 'app/views/templates/footer.php'?>