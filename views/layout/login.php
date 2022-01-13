<div class="principal">
  <?php if (!isset($_SESSION['login'])) : ?>
    <section class="login">
      <form action="<?= base_url ?>user/login" class="form" method="POST">
          <?php if (isset($_SESSION['error_login']) && $_SESSION['error_login'] == 'failed') : ?>
            <h1>Login fallido, introduce bien los datos.</h1>
          <?php elseif (isset($_SESSION['register']) && $_SESSION['register'] = 'complete') : ?>
            <h1>Registro completado.</h1>
          <?php endif; ?>
          <?php Utils::deleteSession('error_login');
          Utils::deleteSession('register');
          ?>
          <h1>Ingresar a la Web:</h1>
          <input type="email" name="email" placeholder="Email">
          <input type="password" name="password" placeholder="Contraseña">
          <input type="submit" value="Login">
      </form>
    </section>
  <?php else : ?>
    <?php header('Location:' . base_url . 'news/index'); ?>
  <?php endif; ?>