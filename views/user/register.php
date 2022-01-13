<div class="principal">
    <section class="register">
        <form action="<?= base_url ?>user/save" class="form" id="register" method="post">
            <h1>Registrarse</h1>
            <input type="text" name="name" placeholder="Nombre" required>
            <?php echo isset($_SESSION['errors']) ? Utils::getError($_SESSION['errors'], 'name') : ''; ?>
            <input type="text" name="lastName" placeholder="Apellidos" required>
            <?php echo isset($_SESSION['errors']) ? Utils::getError($_SESSION['errors'], 'lastName') : ''; ?>
            <input type="email" name="email" placeholder="Email" required>
            <?php echo isset($_SESSION['errors']) ? Utils::getError($_SESSION['errors'], 'email') : ''; ?>
            <input type="password" name="password" placeholder="Contraseña" required>
            <?php echo isset($_SESSION['errors']) ? Utils::getError($_SESSION['errors'], 'password') : ''; ?>
            <input type="submit" value="Registrarse">
        </form>
    </section>
    <?php Utils::deleteErrors(); ?>