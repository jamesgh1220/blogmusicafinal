<div class="view-new">
    <div>
        <h1>Gestion de Usuarios</h1>
    </div>
    <div class="news-content">
        <?php while ($user = $allUsers->fetch_object()) : ?>
            <div class="news">
                <div class="img-new">
                    <h2><i class="fa fa-user" aria-hidden="true"></i></h2>
                    <!--poner img de new por defecto-->
                </div>
                <div class="info-new">
                    <p><?= $user->nombre ?></p>
                    <p><?= $user->apellidos ?></p>
                    <p><?= $user->email ?></p>
                    <p><?= $user->fecha ?></p>
                </div>
                <a href=""><i class="fa fa-plus" aria-hidden="true"></i></a>
                <a href="<?=base_url?>user/delete&id=<?=$user->id?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
            </div>
        <?php endwhile; ?>
    </div>
</div>