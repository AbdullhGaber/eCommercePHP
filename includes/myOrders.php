<div class="card">
    <div class="card-header text-center container py-4">
        <!-- card-header-starts -->
        <h1>My orders</h1>
        <h5 class="text-muted">your orders on one place</h5>
        <p class="text-muted">if you have any question, please feel free to contact us, our customer service center is working for you 24/7</p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>O N</th>
                    <th>Due Amount</th>
                    <th>Invoice No</th>
                    <th>Qty</th>
                    <th>Size</th>
                    <th>Order Date</th>
                    <th>Paid/Unpaid</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody class="">
                <?php
                if ($_GET['cus_id']) {
                    $cus_id = $_GET['cus_id'];
                }
                $order_sql = "SELECT * FROM `customer_orders` WHERE customer_id = $cus_id ";

                $order_run = mysqli_query($conn, $order_sql);
                $i = 0;
                while ($order_row = mysqli_fetch_assoc($order_run)) :
                    $i++;
                    if($order_row['order_status']=='pending'){

                        $order_row['order_status'] = "Unpaid";
                        
                        }
                        else{
                        
                        $order_row['order_status'] = "Paid";
                        
                        }
                ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td>
                            <p>$<?= $order_row['due_amount'] ?></p>
                        </td>

                        <td>
                            <p><?= $order_row['invoice_no'] ?></p>
                        </td>

                        <td>
                            <p><?= $order_row['qty'] ?></p>
                        </td>

                        <td class="text-center">
                            <p><?= $order_row['size'] ?></p>
                        </td>

                        <td>
                            <p><?= $order_row['order_date'] ?></p>
                        </td>
                        <td>
                            <p><?= $order_row['order_status'] ?></p>
                        </td>
                        <td>
                            <a href="confirm.php?order_id=<?= $order_row['order_id']?>" target="blank">
                                <input type="button" class="btn btn-success btn-sm " value="confirm if paid">
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>

            </tbody>


        </table>
    </div>
</div>