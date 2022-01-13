    <section class="news">
        <?php if (isset($_SESSION['login'])) : ?>
            <form action="<?=base_url?>news/add" class="form" method="POST" enctype="multipart/form-data">
                <h1>Crea una noticia:</h1>
                <select name="category_id">
                <?php while($category = $categories->fetch_object()): ?>
                        <option value="<?=$category->id?>">
                            <?=$category->nombre?>
                        </option>
                    <?php endwhile; ?>
                </select>
                <input type="text" name="tittle" placeholder="Título" required>
                <input type="text" name="description" placeholder="Descripción" required>
                <input type="file" name="image">
                <input type="submit" value="Crear">
            </form>
        <?php endif; ?>
    </section>