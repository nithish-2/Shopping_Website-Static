<?php
// Start a new session
if (!isset($_SESSION)) {
  session_start();
}

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
  // Redirect to the first page
  header("Location: index.php");
  exit();
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Shopping Website</title>
  <link rel="stylesheet" type="text/css" href="CSS\style.css">
  <script src="scripts\script.js"></script>
</head>

<body>
  <header>
    <?php include('scripts/logout.php'); ?>
    <nav>
      <ul>
        <li><img src="Images/logo.png" alt="Easy Shopping Logo"></li>
        <li><a href="ElectronicsPage.php">Electronics</a></li>
        <li><a href="HomeEssentialsPage.php">Home Essentials</a></li>
        <li><a href="GroceryPage.php">Grocery</a></li>
      </ul>
      <p>Welcome,
        <?php echo $_SESSION["username"]; ?>
      </p>
      <form method="post">
        <button type="submit" name="logout">Logout</button>
      </form>
    </nav>
    <section class="hero">
      <div class="hero-image">
      </div>
  </header>
  </section>
  <script>
    if (performance.navigation.type === 1) {
      window.onload = function () {
        // Get the element to scroll to
        var element = document.getElementById("products");

        // Scroll to the element smoothly
        element.scrollIntoView({
          behavior: "smooth"
        });
      }
    }
  </script>
  <section class="products" id="products">
    <?php include('scripts/cart.php'); ?>
    <div>
      <h2>Latest on Electronics</h2>
    </div>
    <div>
      <form method="post">
        <div class="product-row1">

          <div class="product1">
            <div class="product-img">
              <img src="Images\Air-Pods.jpg" alt="Air pods">
            </div>
            <div class="productname">
              <h3>Apple Air Pods</h3>
            </div>
            <div class="productownedby">
              <p>Apple</p>
            </div>
            <div class="productprice">
              <p>129$</p>
            </div>
            <div class="productbutton">
              <input type="hidden" name="title1" value="Apple Air Pods">
              <input type="hidden" name="ownedby1" value="Apple">
              <input type="hidden" name="price1" value="129">
              <input type="hidden" name="quantity1" value="1">
              <button type="submit" name="add-to-cart1">ADD TO CART</button>
            </div>
          </div>

          <div class="product2">
            <div class="product-img">
              <img src="Images\Air-Tag.jpg" alt="product 2">
            </div>
            <div class="productname">
              <h3>Apple Air Tag</h3>
            </div>
            <div class="productownedby">
              <p>Apple</p>
            </div>
            <div class="productprice">
              <p>90$</p>
            </div>
            <div class="productbutton">
              <input type="hidden" name="title2" value="Apple Air Tag">
              <input type="hidden" name="ownedby2" value="Apple">
              <input type="hidden" name="price2" value="90">
              <input type="hidden" name="quantity2" value="1">
              <button type="submit" name="add-to-cart2">ADD TO CART</button>
            </div>
          </div>

        </div>

        <div class="product-row2">
          <div class="product3">
            <div class="product-img">
              <img src="Images\Fire-TV.jpg" alt="product 3">
            </div>
            <div class="productname">
              <h3>Amazon Fire TV Stick</h3>
            </div>
            <div class="productownedby">
              <p>Amazon</p>
            </div>
            <div class="productprice">
              <p>40$</p>
            </div>
            <div class="productbutton">
              <input type="hidden" name="title3" value="Amazon Fire TV Stick">
              <input type="hidden" name="ownedby3" value="Amazon">
              <input type="hidden" name="price3" value="40">
              <input type="hidden" name="quantity3" value="1">
              <button type="submit" name="add-to-cart3">ADD TO CART</button>
            </div>
          </div>

          <div class="product4">
            <div class="product-img">
              <img src="Images\Fire-Smart-TV.jpg" alt="product 4">
            </div>
            <div class="productname">
              <h3>Amazon Fire Smart TV 32"</h3>
            </div>
            <div class="productownedby">
              <p>Amazon</p>
            </div>
            <div class="productprice">
              <p>220$</p>
            </div>
            <div class="productbutton">
              <input type="hidden" name="title4" value="Amazon Fire Smart TV 32 Inch">
              <input type="hidden" name="ownedby4" value="Amazon">
              <input type="hidden" name="price4" value="220">
              <input type="hidden" name="quantity4" value="1">
              <button type="submit" name="add-to-cart4">ADD TO CART</button>
            </div>
          </div>

        </div>
      </form>
      <p>Go to <a href="ElectronicsPage.php">Page 1</a> | <a href="HomeEssentialsPage.php">Page 2</a> | <a
          href="GroceryPage.php">Page 3</a></p>
    </div>

  </section>



  <section class="cart" id="cart">
    <div class="container">
      <h2>Your Cart</h2>
      <?php include('scripts/display-cart.php'); ?>
      <tr>
        <td colspan="2"></td>
        <td>
          <h4>Subtotal:
            <?php echo '$' . calculateSubtotal(); ?>
          </h4>
        </td>
      </tr><br /><br />
      <?php if (calculateSubtotal() >= 1) { ?>
        <button id="purchasebutton" onclick="openPurchasePage()">Continue to Purchase</button>
      <?php } ?>
      <script>
        function openPurchasePage() {
          window.open("PurchaseForm.php", "_blank");
        }
      </script>
    </div>
  </section>

  <footer>
    <p>&copy; 2023 Easy Shopping Website. All rights reserved.</p>
  </footer>
</body>

</html>