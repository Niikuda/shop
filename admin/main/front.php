<header>
    <h2>Главная страница</h2>
</header>
<main>
    <?php
        $q_prods = DBQuery(" SELECT * FROM products ");
        $prods_info = [];
        while ($q_prod = mysqli_fetch_assoc($q_prods)) {
            $prods_info[$q_prod['id']] = $q_prod;
        }

        $p_count = DBQuery(" SELECT COUNT(model) AS product_count FROM products ");
        $row_products = mysqli_fetch_assoc($p_count);

        $u_count = DBQuery(" SELECT COUNT(login) AS user_count FROM users ");
        $row_users = mysqli_fetch_assoc($u_count);

        $o_count = DBQuery(" SELECT COUNT(cart) AS order_count FROM cart ");
        $row_orders = mysqli_fetch_assoc($o_count);

        $o_s_a_count = DBQuery(" SELECT COUNT(cart) AS order_status_accepted_count FROM cart WHERE status = 1");
        $row_status_accepted_orders = mysqli_fetch_assoc($o_s_a_count);
        $o_s_r_count = DBQuery(" SELECT COUNT(cart) AS order_status_rejected_count FROM cart WHERE status = 2");
        $row_status_rejected_orders = mysqli_fetch_assoc($o_s_r_count);

        $o_s_count = DBQuery(" SELECT COUNT(cart) AS order_status_count FROM cart WHERE status = 0");
        $row_status_orders = mysqli_fetch_assoc($o_s_count);


        // echo '<div class="main-table">
        //     <table border="1">
        //         <tr>
        //             <th>Товары</th>
        //             <th>Всего пользователей</th>
        //             <th>Всего заказов</th>
        //             <th>Ожидание обработки</th>
        //         </tr>
        //         <tr>
        //             <td>' . $row_products['product_count'] . '</td>
        //             <td>' . $row_users['user_count'] . '</td>
        //             <td>' . $row_orders['order_count'] . '</td>
        //             <td>' . $row_status_orders['order_status_count'] . '</td>
        //         </tr>
        //     </table>
        // </div>';

    echo '<div id="main-info">
        <div class="card">
                <h3>Товары</h3>
                '. $row_products['product_count'] .'
        </div>
        
        <div class="card">
                <h3>Всего пользователей</h3>
                '. $row_users['user_count'] .'
        </div>

        <div class="card">
                <h3>Всего заказов</h3>
                '. $row_orders['order_count'] .'
        </div>

        <div class="card">
                <h3>Всего заказов</h3>
                '. $row_status_accepted_orders['order_status_accepted_count'] .'
        </div>
        <div class="card">
                <h3>Всего заказов</h3>
                '. $row_status_rejected_orders['order_status_rejected_count'] .'
        </div>

        <div class="card" id="open-orders-model-button">
                <h3>Ожидание обработки</h3>
                '. $row_status_orders['order_status_count'] .'
        </div>
    </div>';

        $last_orders = DBQuery(" SELECT * FROM cart ORDER BY id DESC LIMIT 5 ");

        echo '<div class="main-table">
            <table border="1">
                <tr>
                    <th>id заказа</th>
                    <th>Имя</th>
                    <th>Телефон</th>
                    <th>Статус заказа</th>
                </tr>';

                while ($order = mysqli_fetch_assoc($last_orders)) {
                echo '<tr>
                    <td>' . $order['id'] . '</td>
                    <td>' . $order['name'] . '</td>
                    <td>' . $order['phone'] . '</td>
                    <td>' . ORDER_STATUS[$order['status']] . '</td>
                </tr>';
                }
            echo '</table>
        </div>';
    ?>

</main>

<script>
    const orderModelBtn = document.getElementById('open-orders-model-button')
    function openOrderModel() {
        window.location.href = 'http://localhost:8890/admin/index.php?mod=orders';
    }

    orderModelBtn.addEventListener('click', () => {
        openOrderModel();
    });
</script>