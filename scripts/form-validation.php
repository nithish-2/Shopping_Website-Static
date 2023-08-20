<?php
// Initialize variables with empty values
$nameError = $phoneError = $emailError  = $addressError = $cityError = $provinceError = $countryError = $postcodeError = $cardnameError = $cardnumberError = $cardexpError = $cardcvvError = "";
$name = $phone = "";

// Function to test and sanitize user input
function validate_input($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $formvalidity = true;

    // Validate name
    if (empty($_POST["name"])) {
        $nameError = "Name is required";
        $formvalidity = false;
    } else {
        $name = validate_input($_POST["name"]);
        // Check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameError = "Only letters and white space allowed";
            $formvalidity = false;
        }
    }

    // Validate phone number
    if (empty($_POST["phone"])) {
        $phoneError = "Phone number is required";
        $formvalidity = false;

    } else {
        $phone = validate_input($_POST["phone"]);
        // Check if phone number is valid
        if (!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone)) {
            $phoneError = "Invalid phone number format";
            $formvalidity = false;
        }
    }

    // Email validation with regex
    if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", ($_POST["email"]))) {
        // The email address is not valid
        $emailError = "Invalid email address";
        $formvalidity = false;
    }

    // Validate address
    if (empty($_POST["address"])) {
        $addressError = "address is required";
        $formvalidity = false;
    } else {
        $address = validate_input($_POST["address"]);
        // Check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $address)) {
            $addressError = "Only letters and white space allowed";
            $formvalidity = false;
        }
    }

    // Validate city
    if (empty($_POST["city"])) {
        $cityError = "city is required";
        $formvalidity = false;
    } else {
        $city = validate_input($_POST["city"]);
        // Check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $city)) {
            $cityError = "Only letters and white space allowed";
            $formvalidity = false;
        }
    }

    // Check if the province is empty
    if (empty(($_POST['province']))) {
        $provinceError = "Please select a province";
        $formvalidity = false;
    }

    // Check if the country is empty
    if (empty(($_POST['country']))) {
        $countryError = "Please select a country";
        $formvalidity = false;
    }

    // Check if the postcode is empty
    if (empty(($_POST['postcode']))) {
        $postcodeError = "Please enter a postcode";
        $formvalidity = false;
    } else {
        // Check if the postcode format is valid using regex
        if (!preg_match('/[a-zA-Z][0-9][a-zA-Z](-| )[0-9][a-zA-Z][0-9]/', ($_POST['postcode']))) {
            $postcodeError = "Invalid postcode format";
            $formvalidity = false;
        }
    }

    // Validate card name
    if (empty($_POST["cardname"])) {
        $cardnameError = "Card Name is required";
        $formvalidity = false;
    } else {
        $cardname = validate_input($_POST["cardname"]);
        // Check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $cardname)) {
            $cardnameError = "Only letters and white space allowed";
            $formvalidity = false;
        }
    }

    // Validate card number
    if (!preg_match('/^4[0-9]{3}(?:-[0-9]{4}){3}$/', $_POST["cardnumber"])) {
        $cardnumberError = "Invalid credit card number (card number starts with 4)";
        $formvalidity = false;
    }

    // Validate card cvv
    if (!preg_match('/^[0-9]{3}$/', $_POST["cardcvv"])) {
        $cardcvvError = "Invalid credit card cvv";
        $formvalidity = false;
    }

    $cardexpmonth = $_POST['cardexpmonth'];
    $cardexpmonth = strtolower($cardexpmonth);
    $cardexpyear = $_POST['cardexpyear'];
    $expiryDate = DateTime::createFromFormat('M Y', $cardexpmonth . ' ' . $cardexpyear);
    $currentDate = new DateTime();

    // Validate the card expiration month
    if ((!preg_match('/^(jan|feb|mar|apr|may|jun|jul|aug|sep|oct|nov|dec)$/', $cardexpmonth)) || (!preg_match('/^20[2-9][0-9]$/', $cardexpyear))) {
        $cardexpError = "Invalid expiration month and year";
        $formvalidity = false;
    }

    // Check if the expiration date is less than today's date
    elseif ($expiryDate < $currentDate) {
        $cardexpError = "Credit card has expired";
        $formvalidity = false;
    }

    $username = ($_POST["name"]);
    $emailID = ($_POST["email"]);
    $phonenumber = ($_POST["phone"]);

    $address = $_POST['address'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $country = $_POST['country'];
    $postcode = $_POST['postcode'];
    $cardname = $_POST['cardname'];
    $cardnumber = $_POST['cardnumber'];
    $cardexpmonth = $_POST['cardexpmonth'];
    $cardexpyear = $_POST['cardexpyear'];
    $cardcvv = $_POST['cardcvv'];
    $customername = $username;
    $customeremail = $emailID;
    $customerphone = $phonenumber;
    $customeraddress = $address;
    $customercity = $city;
    $customerprovince = $province;
    $customercountry = $country;
    $customerpostcode = $postcode;
    
}
?>