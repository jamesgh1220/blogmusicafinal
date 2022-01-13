    <div class="table">
        <div class="tittle">
            <h1>Gestionar Categorías</h1>
        </div>
        <table>
            <!--Encabezados de tabla-->
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
            </tr>
            <?php while ($category = $categories->fetch_object()) : ?>
                <!--Una fila por cada iteracion al bucle-->
                <tr>
                    <td><?= $category->id; ?></td>
                    <td><?= $category->nombre; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>