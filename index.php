<?php
require('config.php');


?>

<form action = "submit.php" method = "post">
    <script src = "https://checkout.stripe.com/checkout.js" class = "stripe-button"
    data-key = "<?php echo $Publishablekey?>"
    data-amount = "500"
    data-name = "Madayikkal Poultries"
    data-description = "Madayikkal Poultries dec"
    data-image = ""
    data-currency = "inr"
    >
        </script>
</form>