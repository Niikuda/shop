        <header>
            <h2>Заказы</h2>
        </header>
        <main>
            <?php

                // запрос в бд таблицу orders
                // вывод через цикл всех записей в таблицу
                // $q_prods = DBQuery(" SELECT * FROM `cart` WHERE `id`='$_GET[id]' ");
                // $prod = mysqli_fetch_assoc($q_prods);

                $q_prods = DBQuery(" SELECT * FROM products ");
                $prods_info = [];
                while( $q_prod = mysqli_fetch_assoc($q_prods) ) {
                    $prods_info[$q_prod['id']] = $q_prod;
                }

                $s = DBQuery(" SELECT * FROM `cart`");

                echo '<div class="main-table">
                <table border="1">
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>email</th>
                        <th>phone</th>
                        <th>cart</th>
                        <th>статус</th>
                        <th>статус</th>
                    </tr>';

                while ($ord = mysqli_fetch_assoc($s)) {
                    $ord_cart = json_decode($ord['cart'], true);
                    $ord_cart_html = '';
                    $ord_cart_sum_total = 0;

                    foreach( $ord_cart as $ord_cart_it_k => $ord_cart_it ) {
                        $ord_cart_prod_sum = $prods_info[$ord['id']]['price'] * $ord_cart_it['amount'];
                        $ord_cart_sum_total += $ord_cart_prod_sum;
                        $ord_cart_html .= '<i>' . $prods_info[$ord_cart_it_k]['brand'] . ' ' . $prods_info[$ord_cart_it_k]['model'] . '</i> - ' . $ord_cart_it['amount'] . ' шт | <strong>' . $prods_info[$ord['id']]['price'] . '$ = ' . $ord_cart_prod_sum . '$</strong><br>';
                    }

                    // $prods_info[$ord['id']]['price']

                    echo  '<tr class="row">
                        <td class="id">' . $ord['id'] . '</td>
                        <td class="name">' . $ord['name'] . '</td>
                        <td class="email">' . $ord['email'] . '</td>
                        <td class="phone">' . $ord['phone'] . '</td>
                        <td class="cart">' . $ord_cart_html . '<br>сумма: <strong>' . $ord_cart_sum_total . '$' . '</strong></td>
                        <td class="status">' . ORDER_STATUS[$ord['status']] .'</td>
                        <td class="change_order_status">
                </div>';
                        
                                if ($ord['status'] !=1) {
                                    echo '<form action="processor.php" method="post">
                                            <input type="hidden" name="prod_id" value="' . $ord['id'] . '">
                                            <button class="accept_order" name="button_accept" type="submit" value="update">принять</button>
                                    </form>';
                                }
                                if ($ord['status'] !=2) {
                                echo '<form action="processor.php" method="post">
                                        <input type="hidden" name="prod_id" value="' . $ord['id'] . '">    
                                        <button class="reject_order" name="button_reject" type="submit" value="update">отклонить</button>
                                </form>';
                                }
                                
                            echo '</div>
                        </td>';

                    echo '</tr>';
                }
                echo '</table>';
            ?>
            
        </main>