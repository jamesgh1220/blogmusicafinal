<div class="content">
    <?php if (isset($_SESSION['login']) && !isset($_SESSION['error_login'])) : ?>
        <div class="central">
            <div class="img-home">
                <h2>NOTICIAS </h2>
                <p>En este sitio web encontrarás las mejores noticas de Musica Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel quod assumenda facere asperiores, soluta ex sapiente est eaque fugiat minima in qui voluptate nulla. Voluptatem quibusdam illum dolores fugiat.
                </p>
                <a href="#" class="btn">Leer Más <i class="fa fa-angle-double-right"></i></a>
            </div>
        </div>
    <?php endif; ?>
    <?php if (!isset($_SESSION['login'])) : ?>
        <div class="home-ppal">
            <div class="home">
                <div class="box sign-in">
                    <h2>¿ Ya tienes una cuenta ?</h2>
                    <button class="sign-in-button">Ingresar</button>
                </div>
                <div class="box sign-up">
                    <h2>¿ No tienes una cuenta ?</h2>
                    <button class="sign-up-button">Registrarse</button>
                </div>
            </div>
            <div class="form-home">
                <div class="form-ppal sign-in-form">
                    <form action="<?= base_url ?>user/login" method="POST">
                        <?php if (!isset($_SESSION['login'])) : ?>
                            <?php if (isset($_SESSION['error_login']) && $_SESSION['error_login'] == 'failed') : ?>
                                <h3>Login fallido, introduce bien los datos.</h3>
                            <?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'complete') : ?>
                                <h3>Registro completado.</h3>
                            <?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed') : ?>
                                <h3>Registro fallido, introduce bien los datos.</h3>
                                <?php echo isset($_SESSION['errors']) ? Utils::getError($_SESSION['errors'], 'name') : ''; ?>
                                <?php echo isset($_SESSION['errors']) ? Utils::getError($_SESSION['errors'], 'lastName') : ''; ?>
                                <?php echo isset($_SESSION['errors']) ? Utils::getError($_SESSION['errors'], 'email') : ''; ?>
                                <?php echo isset($_SESSION['errors']) ? Utils::getError($_SESSION['errors'], 'password') : ''; ?>
                            <?php endif; ?>
                            <?php Utils::deleteSession('error_login');
                            Utils::deleteSession('register');
                            ?>
                            <h3>Ingresar a la Web</h3>
                            <input type="email" name="email" placeholder="Email">
                            <input type="password" name="password" placeholder="Contraseña">
                            <input type="submit" value="Ingresar">
                            <a href="#" class="password-recover">Recuperar Contraseña</a>
                    </form>
                <?php else : ?>
                    <?php header('Location:' . base_url . 'news/index'); ?>
                <?php endif; ?>
                </div>
                <div class="form-ppal sign-up-form">
                    <form action="<?= base_url ?>user/save" method="POST">
                        <h3>Registrarse</h3>
                        <input type="text" name="name" placeholder="Nombre" required>
                        <input type="text" name="lastName" placeholder="Apellidos" required>
                        <input type="email" name="email" placeholder="Email" required>
                        <input type="password" name="password" placeholder="Contraseña" required>
                        <input type="submit" value="Registrarse">
                    </form>
                </div>
                <?php Utils::deleteErrors(); ?>
            </div>
        </div>
    <?php endif; ?>
</div>
<div class="principal">