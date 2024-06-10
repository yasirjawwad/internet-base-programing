<?php
session_start();


?>

<?php include('../layout/header.php') ?>

<!-- payment part -->
<section class="container-fluid my-5 py-5">
    <div class="container text-center mx-auto my-2">
        <h3 class="my-2 line">Payment</h3>
        <?php if (isset($_POST['detail-paynow-btn'])) { ?>
        <p class="my-4">
            Total payment: <span class="text-danger">$<?php echo $_POST['total'] ?></span>
        </p>
        <?php $total = $_POST['total']; ?>
        <?php $order_id = $_POST['order_id']; ?>
        <div class="mx-auto w-50">
            <div id="paypal-button-container"></div>
        </div>
        <?php } else if (isset($_SESSION['total']) && $_SESSION['total'] > 0) { ?>
        <p class="my-4">
            Total payment: <span class="text-danger">$<?php echo $_SESSION['total'] ?></span>
        </p>
        <?php $total = $_SESSION['total']; ?>
        <?php $order_id = $_SESSION['order_id']; ?>
        <div class="mx-auto w-50">
            <div id="paypal-button-container"></div>
        </div>


        <?php } else { ?>
        <p class="my-4">
            Total payment: <span class="text-danger">$0</span>
        </p>
        <p><strong>Your cart is empty!</strong></p>
        <?php } ?>
    </div>
</section>
<!-- payment end part -->

<script
    src="https://www.paypal.com/sdk/js?client-id=Abr-QMWZbM2RGZmX2ZdeFLAK9S-bNQskBy0_TRMTGKtKuQjrtE8ercyd8OQjVG9lx-ORdOBJqW0CiA1m&currency=USD">
</script>
<script>
paypal.Buttons({
    createOrder: function(data, actions) {
        // Set up the transaction
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: '<?php echo $total; ?>' // Replace with the actual amount to be charged
                },
                description: 'Food delivery payment' // Replace with a brief description of the purchase
            }]
        });
    },
    onApprove: function(data, actions) {
        // Finalize the transaction
        return actions.order.capture().then(function(details) {
            // Show a success message to the buyer with payment details
            // alert('Payment completed with ID: ' + details.id + ', for $' + 
            //     .amount.value + ' by ' + details.payer.name.given_name + '!');
            // Redirect to a thank you page after successful payment
            // window.location.href = '/thank-you.php';
            <?php

                $_SESSION['payment_food_id'] = $order_id;
                ?>
            window.location.href =
                `../server/success_payment.php?payment_id=${details.id}`;

        });
    }
}).render('#paypal-button-container');
</script>

<?php include('../layout/footer.php') ?>