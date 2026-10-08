<header>
    <h2>Заказы</h2>
</header>
<main>
    <form action="processor.php" method="POST">
        <label for="name">Название категории:</label>
        <input type="text" name="name" id="name">
        <button type="submit" name="button_cats">Создать категорию</button>
    </form>
    
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>allias</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                    $select_category = DBQuery("SELECT * FROM `cats`");

                    while ($category = mysqli_fetch_assoc($select_category)) {
                        echo '<tr>
                        <td>' . $category['id'] . '</td>
                        <td><a href="index.php?cat=' . $category['alias'] . '">' . $category['name'] . '</a></td>
                        <td>' . $category['alias'] . '</td>
                        </tr>';
                    }
                    // echo $_GET['cat'];
                ?>
            </tr>
        </tbody>
    </table>


    <h3>Список категорий</h3>

        <table border="1" cellpadding="8">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Alias</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $select_category = DBQuery(
                    "SELECT `id`, `name`, `alias`
                     FROM `cats`
                     ORDER BY `id`"
                );

                while ($category = mysqli_fetch_assoc($select_category)) {
                    echo '<tr>
                        <td>' . (int)$category['id'] . '</td>
                        <td>' . htmlspecialchars($category['name']) . '</td>
                        <td>' . htmlspecialchars($category['alias']) . '</td>
                        <td>
                            <a href="index.php?mod=cats&act=edit&id=' . (int)$category['id'] . '">
                                Изменить
                            </a>

                            <form action="processor.php" method="POST" style="display:inline;">
                                <input type="hidden" name="cat_id" value="' . (int)$category['id'] . '">
                                <button type="submit" name="cat_del" value="delete"
                                        onclick="return confirm(\'Удалить категорию?\');">
                                    Удалить
                                </button>
                            </form>
                        </td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
</main>