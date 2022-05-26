<?php
require('stripe-php-master/init.php');
$publishableKey = "pk_test_51KvZXVSD5b0Utr1YgRDznjlAmSn7XFzrxzuRhkbAJpuxNaRq7OYaU0Cc7w7r12sTpzbXc2Mr7c7DGvxVcnWZGo2K00GvczIm5V";
$secretKey = "sk_test_51KvZXVSD5b0Utr1YrKeGSRkvFQLewIAAswf6Jer30hqR2Eho4gnwhgjfrYh2ehNLk1eegDOnFgwQv7DDw3ak7kqN00bLXk4bj9";
\Stripe\Stripe::setApiKey($secretKey);

?>