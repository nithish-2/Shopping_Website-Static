# Simple Shopping Website

This repository contains PHP files for a simple shopping website. It includes pages for browsing electronics, home essentials, and grocery items, managing a shopping cart, completing a purchase, and handling form validation.

## Files:

### ElectronicsPage.php
This file represents the page where users can browse and purchase electronic items.

#### Features:
- Users must be logged in to access the page.
- Displays a list of electronic products with images, names, brands, and prices.
- Allows users to add items to the cart.
- Calculates subtotal and provides a button to proceed to purchase.

### HomeEssentialsPage.php
This file represents the page where users can browse and purchase home essentials.

#### Features:
- Users must be logged in to access the page.
- Displays a list of home essential products with images, names, brands, and prices.
- Allows users to add items to the cart.
- Calculates subtotal and provides a button to proceed to purchase.

### GroceryPage.php
This file represents the page where users can browse and purchase grocery items.

#### Features:
- Users must be logged in to access the page.
- Displays a list of grocery products with images, names, brands, and prices.
- Allows users to add items to the cart.
- Calculates subtotal and provides a button to proceed to purchase.

### PurchaseForm.php
This file represents the form where users can complete their purchase by providing their contact and payment information.

#### Features:
- Users must be logged in to access the form.
- Validates user input for name, email, phone, address, city, province, country, postcode, card name, card number, card expiry date, and CVV.
- Calculates tax based on the user's province.
- Displays a receipt with the customer's information, purchased items, subtotal, tax, and total.
- Provides a button to return to the main page after the purchase is completed.

### cart.php
This file manages the shopping cart functionality.

#### Features:
- Initializes the cart if not set or unset.
- Adds items to the cart based on user input.
- Removes items from the cart.
- Calculates the subtotal of the cart.

### display-cart.php
This file displays the items in the shopping cart.

### display-receipt-items.php
This file displays the purchased items in the receipt.

### form-validation.php
This file handles form validation for the purchase form.

### logout.php
This file handles the logout functionality.

### script.js
This JavaScript file contains client-side scripts for the website.

#### Features:
- Displays the login popup when the document is ready.

## Usage:
1. Clone the repository to your local machine.
2. Ensure that you have a PHP server environment set up.
3. Place the PHP files in the appropriate directory accessible by your server.
4. Access the files through a web browser.

## Notes:
- Ensure that you have a valid session management system in place to handle user authentication.
- Customize the styling and functionality as needed for your specific use case.
- Additional features like user registration, product categories, and payment processing can be implemented for a more robust shopping experience.


## Author
- **Name:** Nithish Jagadeesan
- **Email:** [nithish.jagadeesan@gmail.com](mailto:nithish.jagadeesan@gmail.com)
