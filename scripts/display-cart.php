<?php
if (!empty($_SESSION['cart'])) { ?>
<table>
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Brand</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($_SESSION['cart'] as $key => $item) { ?>
            <tr>
                <td><?php echo $item['title']; ?></td>
                <td><?php echo $item['ownedby']; ?></td>
                <td><?php echo $item['price']; ?></td>
                <td><?php echo $item['quantity']; ?></td>
                <td><?php echo $item['price'] * $item['quantity']; ?></td>
                <td>
                    <form method="POST" action="">
                        <input type="hidden" name="title" value="<?php echo $item['title']; ?>">
                        <button type="submit" name="remove">Remove an item</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </tbody>

</table>
    <?php


?>
<?php } else { ?>
    <p>Your cart is empty.</p>
<?php } ?>

<?php
if (calculateSubtotal() < 10) {
    $carterror = "Minimum purchase value is $10. Add more items to proceed with the purchase";
} else {
    $carterror = "";
}
?>