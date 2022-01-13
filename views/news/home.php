<div class="view-new">
    <div>
        <h1>Noticias</h1>
    </div>
    <div class="news-content">
        <?php while ($new = $allNews->fetch_object()) : ?>
            <div class="news">
                <div class="img-new">
                    <h2><?= $new->titulo ?></h2>
                    <!--poner img de new por defecto-->
                </div>
                <div class="info-new">
                    <p><?= $new->titulo ?></p>
                    <p><?= $new->descripcion ?></p>
                    <!--Manejar que aparezca una sola parte de la descrpcion y no toda, toca un div para la descripcion y manejarle el tamaño igual al de la caja de la noticia y desps hacer el substr-->
                    <p><?= $new->fecha ?></p>
                </div>
                <a href=""><i class="fa fa-plus" aria-hidden="true"></i></a>
            </div>
        <?php endwhile; ?>
    </div>
</div>