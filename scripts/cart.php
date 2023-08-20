<?php
if (!isset($_SESSION)) {
    session_start();
}
$subtotal = 0;
// Initialize cart if not set or is unset
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Add item to cart
if (isset($_POST['add-to-cart1'])) {
    $item_array = array(
        'title' => $_POST['title1'],
        'ownedby' => $_POST['ownedby1'],
        'price' => $_POST['price1'],
        'quantity' => $_POST['quantity1']
    );
    // check if item already exists in cart
    $item_exists = false;
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['title'] == $item_array['title']) {
            $item_exists = true;
            // increase quantity of existing item
            $_SESSION['cart'][$key]['quantity'] += 1;
            break;
        }
    }

    if (!$item_exists) {
        array_push($_SESSION['cart'], $item_array);
    }
    header('Location: #cart');
}

if (isset($_POST['add-to-cart2'])) {
    $item_array = array(
        'title' => $_POST['title2'],
        'ownedby' => $_POST['ownedby2'],
        'price' => $_POST['price2'],
        'quantity' => $_POST['quantity2']
    );
    // check if item already exists in cart
    $item_exists = false;
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['title'] == $item_array['title']) {
            $item_exists = true;
            // increase quantity of existing item
            $_SESSION['cart'][$key]['quantity'] += 1;
            break;
        }
    }

    if (!$item_exists) {
        array_push($_SESSION['cart'], $item_array);
    }
    header('Location: #cart');
}

if (isset($_POST['add-to-cart3'])) {
    $item_array = array(
        'title' => $_POST['title3'],
        'ownedby' => $_POST['ownedby3'],
        'price' => $_POST['price3'],
        'quantity' => $_POST['quantity3']
    );
    // check if item already exists in cart
    $item_exists = false;
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['title'] == $item_array['title']) {
            $item_exists = true;
            // increase quantity of existing item
            $_SESSION['cart'][$key]['quantity'] += 1;
            break;
        }
    }

    if (!$item_exists) {
        array_push($_SESSION['cart'], $item_array);
    }
    header('Location: #cart');
}

if (isset($_POST['add-to-cart4'])) {
    $item_array = array(
        'title' => $_POST['title4'],
        'ownedby' => $_POST['ownedby4'],
        'price' => $_POST['price4'],
        'quantity' => $_POST['quantity4']
    );
    // check if item already exists in cart
    $item_exists = false;
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['title'] == $item_array['title']) {
            $item_exists = true;
            // increase quantity of existing item
            $_SESSION['cart'][$key]['quantity'] += 1;
            break;
        }
    }

    if (!$item_exists) {
        array_push($_SESSION['cart'], $item_array);
    }
    header('Location: #cart');
}

if (isset($_POST['add-to-cart5'])) {
    $item_array = array(
        'title' => $_POST['title5'],
        'ownedby' => $_POST['ownedby5'],
        'price' => $_POST['price5'],
        'quantity' => $_POST['quantity5']
    );
    // check if item already exists in cart
    $item_exists = false;
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['title'] == $item_array['title']) {
            $item_exists = true;
            // increase quantity of existing item
            $_SESSION['cart'][$key]['quantity'] += 1;
            break;
        }
    }

    if (!$item_exists) {
        array_push($_SESSION['cart'], $item_array);
    }
    header('Location: #cart');
}

if (isset($_POST['add-to-cart6'])) {
    $item_array = array(
        'title' => $_POST['title6'],
        'ownedby' => $_POST['ownedby6'],
        'price' => $_POST['price6'],
        'quantity' => $_POST['quantity6']
    );
    // check if item already exists in cart
    $item_exists = false;
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['title'] == $item_array['title']) {
            $item_exists = true;
            // increase quantity of existing item
            $_SESSION['cart'][$key]['quantity'] += 1;
            break;
        }
    }

    if (!$item_exists) {
        array_push($_SESSION['cart'], $item_array);
    }
    header('Location: #cart');
}

if (isset($_POST['remove'])) {
    $title = $_POST['title'];
    foreach ($_SESSION['cart'] as $index => $item) {
        if ($item['title'] === $title) {
            if ($item['quantity'] > 1) {
                $_SESSION['cart'][$index]['quantity']--;
            } else {
                unset($_SESSION['cart'][$index]);
            }
            break;
        }
    }
    header('Location: #cart');
}

function calculateSubtotal()
{
    $subtotal = 0;
    foreach ($_SESSION['cart'] as $item) {
        $subtotal += $item['price'] * $item['quantity'];
    }
    return $subtotal;
}



?>