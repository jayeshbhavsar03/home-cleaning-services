<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css?v=<?php echo time();?>">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>about us</h3>
   <p> <a href="home.php">home</a> / about </p>
</div>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="img/1.jpg" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Home cleaning is an integral part of personal health and hygiene. It is essential to sanitise every house corner to eliminate dust, bacteria and pollutants and not harm the occupants. NoBroker offers the best house cleaning services in Aurangabad with expert planning and flawless execution. Our hygiene experts provide deep cleaning services of the highest standards and eliminate any chance of infection-causing germs and pungent odours. Our customer satisfaction testimonials vouch for 5-star professional home cleaning services in Aurangabad. Check our carpet, deep, sofa, kitchen, and bathroom cleaning services in Aurangabad and book with just a single click!</p>
      </div>

   </div>

</section>

<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>