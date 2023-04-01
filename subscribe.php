<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['order_btn'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $number = $_POST['number'];
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $method_plans = mysqli_real_escape_string($conn, $_POST['method_plans']);
   $method = mysqli_real_escape_string($conn, $_POST['method']);
   $address = mysqli_real_escape_string($conn, 'flat no. '. $_POST['flat'].', '. $_POST['street'].', '. $_POST['city'].', '. $_POST['country'].' - '. $_POST['pin_code']);
   $placed_on = date('d-M-Y');

   

         mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method_plans, method, address, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$method_plans', '$method', '$address', '$placed_on')") or die('query failed');
         $message[] = 'order placed successfully!';
     
   

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css?v=<?php echo time();?>">
    <script src="./js/country-states.js"></script>

</head>

<body>

    <?php include 'header.php'; ?>

    <div class="heading">
        <h3>checkout</h3>
        <p> <a href="home.php">home</a> / checkout </p>
    </div>

    <section class="checkout">

        <form action="" method="post">
            <h3>place your order</h3>
            <div class="flex">
                <div class="inputBox">
                    <span>your name :</span>
                    <input type="text" name="name" required placeholder="enter your name">
                </div>
                <div class="inputBox">
                    <span>your number :</span>
                    <input type="number" name="number" required placeholder="enter your number">
                </div>
                <div class="inputBox">
                    <span>your email :</span>
                    <input type="email" name="email" required placeholder="enter your email">
                </div>
                <div class="inputBox">
                    <span>Which plans you want :</span>
                    <select name="method_plans">
                        <option value="Furnished Apartment">Furnished Apartment</option>
                        <option value="Unfurnished Apartment">Unfurnished Apartment</option>
                        <option value="Kitchen Cleaning">Kitchen Cleaning</option>
                        <option value="Sofa Cleaning">Sofa Cleaning</option>
                        <option value="Bathroom Cleaning">Bathroom Cleaning</option>
                    </select>
                </div>
                <div class="inputBox">
                    <span>payment method :</span>
                    <select name="method">
                        <option value="cash on delivery">cash on delivery</option>
                        <option value="credit card">credit card</option>
                        <option value="paypal">paypal</option>
                        <option value="paytm">paytm</option>
                    </select>
                </div>
                <div class="inputBox">
                    <label for="country" style="font-size: 2rem;">Country</label>
                    <select id="country" name="country">
                        <option>select country</option>
                    </select>
                </div>
                <div class="inputBox">
                    <label for="state" style="font-size: 2rem;">State</label>
                    <span id="state-code"><input type="text" id="state"></span>
                </div>
                <div class="inputBox">
                    <span>city :</span>
                    <input type="text" name="city" required placeholder="e.g. mumbai">
                </div>
                <div class="inputBox">
                    <span>address line 01 :</span>
                    <input type="number" min="0" name="flat" required placeholder="e.g. flat no.">
                </div>
                <div class="inputBox">
                    <span>address line 01 :</span>
                    <input type="text" name="street" required placeholder="e.g. street name">
                </div>
                <div class="inputBox">
                    <span>pin code :</span>
                    <input type="number" min="0" name="pin_code" required placeholder="e.g. 123456">
                </div>
            </div>
            <input type="submit" value="order now" class="btn" name="order_btn">
        </form>

    </section>









    <?php include 'footer.php'; ?>

    <script>
    // user country code for selected option
    let user_country_code = "IN";

    (function() {
        // script https://www.html-code-generator.com/html/drop-down/country-region

        // Get the country name and state name from the imported script.
        let country_list = country_and_states['country'];
        let states_list = country_and_states['states'];

        // creating country name drop-down
        let option = '';
        option += '<option>select country</option>';
        for (let country_code in country_list) {
            // set selected option user country
            let selected = (country_code == user_country_code) ? ' selected' : '';
            option += '<option value="' + country_code + '"' + selected + '>' + country_list[country_code] +
                '</option>';
        }
        document.getElementById('country').innerHTML = option;

        // creating states name drop-down
        let text_box = '<input type="text" class="input-text" id="state">';
        let state_code_id = document.getElementById("state-code");

        function create_states_dropdown() {
            // get selected country code
            let country_code = document.getElementById("country").value;
            let states = states_list[country_code];
            // invalid country code or no states add textbox
            if (!states) {
                state_code_id.innerHTML = text_box;
                return;
            }
            let option = '';
            if (states.length > 0) {
                option = '<select id="state">\n';
                for (let i = 0; i < states.length; i++) {
                    option += '<option value="' + states[i].code + '">' + states[i].name + '</option>';
                }
                option += '</select>';
            } else {
                // create input textbox if no states 
                option = text_box
            }
            state_code_id.innerHTML = option;
        }

        // country select change event
        const country_select = document.getElementById("country");
        country_select.addEventListener('change', create_states_dropdown);

        create_states_dropdown();
    })();
    </script>
    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>

</html>