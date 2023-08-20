
<?php
if (!empty($_SESSION['cart'])) { ?>
<table>
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Brand</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
    <?php
            $count = 1;
        foreach ($_SESSION['cart'] as $key => $item) { ?>
            <tr>
                <td><?php echo $item['title']; ?></td>
                <td><?php echo $item['ownedby']; ?></td>
                <td><?php echo $item['quantity']; ?></td>
                <td><?php echo $item['price'] * $item['quantity']; ?>$</td>
                <td>
                    <form method="POST" action="">
                        <input type="hidden" name="title" value="<?php echo $item['title']; ?>">
                    </form>
                </td>
            </tr>
            <?php
                $count = $count + 1;
            } ?>
    </tbody>

</table>
    <?php


?>
<?php } else { ?>
    <p>Your cart is empty.</p>
<?php } ?>
