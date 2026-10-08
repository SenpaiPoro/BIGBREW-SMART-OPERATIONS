<?php

require_once 'functions.php';

$customerName = trim(
    $_POST['customer_name']
    ?? $_SESSION['customer_name']
    ?? 'Customer'
);

if ($customerName !== 'Customer') {
    $_SESSION['customer_name'] = $customerName;
}

$cart = getCart();
$total = calculateOrderTotal($cart);


/*
|--------------------------------------------------------------------------
| PAYMENT METHOD
|--------------------------------------------------------------------------
|
| We use the current POST/session selection only to determine
| whether the GCash section should appear.
|
*/

$selectedPayment = $_POST['payment_method']
    ?? ($_SESSION['payment_method'] ?? '');


/*
|--------------------------------------------------------------------------
| GCASH REFERENCE
|--------------------------------------------------------------------------
*/

$paymentReference = $_SESSION['payment_reference'] ?? '';


/*
|--------------------------------------------------------------------------
| HANDLE PAYMENT
|--------------------------------------------------------------------------
*/

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $cart) {

    $paymentMethod = $_POST['payment_method'] ?? '';


    /*
    |--------------------------------------------------------------------------
    | CASH
    |--------------------------------------------------------------------------
    */

    if ($paymentMethod === 'Cash') {

        $_SESSION['payment_method'] = 'Cash';
        $_SESSION['order_total'] = $total;
        $_SESSION['payment_status'] = 'PENDING';

        $_SESSION['order_number'] =
            $_SESSION['order_number'] ?? 'SALE001';

        header('Location: CustomerReceipt.php');
        exit;
    }


    /*
    |--------------------------------------------------------------------------
    | MAYA
    |--------------------------------------------------------------------------
    */

    if ($paymentMethod === 'Maya') {

        $_SESSION['payment_method'] = 'Maya';
        $_SESSION['order_total'] = $total;
        $_SESSION['payment_status'] = 'PENDING';

        $_SESSION['order_number'] =
            $_SESSION['order_number'] ?? 'SALE001';

        header('Location: CustomerReceipt.php');
        exit;
    }


    /*
    |--------------------------------------------------------------------------
    | GCASH - JUST SHOW THE QR
    |--------------------------------------------------------------------------
    */

    if ($paymentMethod === 'GCash') {

        $_SESSION['payment_method'] = 'GCash';
        $_SESSION['order_total'] = $total;
        $_SESSION['payment_status'] = 'PENDING';

        $_SESSION['order_number'] =
            $_SESSION['order_number'] ?? 'SALE001';

        $selectedPayment = 'GCash';
    }


    /*
    |--------------------------------------------------------------------------
    | GCASH REFERENCE SUBMITTED
    |--------------------------------------------------------------------------
    */

    if (
        isset($_POST['gcash_payment_reference'])
        && trim($_POST['gcash_payment_reference']) !== ''
    ) {

        $reference = trim(
            $_POST['gcash_payment_reference']
        );

        $_SESSION['payment_method'] = 'GCash';
        $_SESSION['order_total'] = $total;
        $_SESSION['payment_status'] = 'PENDING';
        $_SESSION['payment_reference'] = $reference;

        $_SESSION['order_number'] =
            $_SESSION['order_number'] ?? 'SALE001';

        header('Location: CustomerReceipt.php');
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>BigBrew Payment</title>

    <link
        rel="stylesheet"
        href="style.css"
    >

</head>


<body class="checkout-page">

<main class="checkout-content">

<section class="checkout-card">


    <!-- =========================================================
         HEADER
         ========================================================= -->

    <div class="checkout-title">

        <span class="step-number">3</span>

        <div>

            <h1>Payment</h1>

            <p>
                Select your preferred payment method.
            </p>

        </div>

    </div>


    <!-- =========================================================
         TOTAL
         ========================================================= -->

    <div class="summary-total">

        <span>Total Amount</span>

        <strong>
            <?= money($total) ?>
        </strong>

    </div>


    <!-- =========================================================
         PAYMENT METHOD SELECTION
         
         THIS ALWAYS REMAINS VISIBLE.
         ========================================================= -->

    <form
        method="post"
        class="payment-method-list"
    >

        <input
            type="hidden"
            name="customer_name"
            value="<?= htmlspecialchars($customerName) ?>"
        >


        <!-- CASH -->

        <button
            class="payment-method <?= $selectedPayment === 'Cash' ? 'selected' : '' ?>"
            name="payment_method"
            value="Cash"
            type="submit"
        >

            <b>₱</b>

            <span>

                <strong>Cash</strong>

                <small>
                    Pay at the counter
                </small>

            </span>

            →

        </button>


        <!-- GCASH -->

        <button
            class="payment-method <?= $selectedPayment === 'GCash' ? 'selected' : '' ?>"
            name="payment_method"
            value="GCash"
            type="submit"
        >

            <b>G</b>

            <span>

                <strong>GCash</strong>

                <small>
                    Pay using GCash
                </small>

            </span>

            →

        </button>


        <!-- MAYA -->

        <button
            class="payment-method <?= $selectedPayment === 'Maya' ? 'selected' : '' ?>"
            name="payment_method"
            value="Maya"
            type="submit"
        >

            <b>M</b>

            <span>

                <strong>Maya</strong>

                <small>
                    Pay using Maya
                </small>

            </span>

            →

        </button>

    </form>


    <?php if ($selectedPayment === 'GCash'): ?>

        <!-- =====================================================
             GCASH SECTION
             
             ONLY APPEARS AFTER CUSTOMER SELECTS GCASH
             ===================================================== -->

        <div class="gcash-payment-box">


            <!-- HEADER -->

            <div class="gcash-header">

                <h2>
                    Pay with GCash
                </h2>

                <p>
                    Scan the QR code using your GCash app.
                </p>

            </div>


            <!-- =================================================
                 QR CODE
                 ================================================= -->

            <div class="gcash-qr-wrapper">

                <img
                    src="../assets/img/gcash.jpg"
                    alt="BigBrew GCash QR Code"
                    class="gcash-qr"
                >

            </div>


            <!-- =================================================
                 AMOUNT
                 ================================================= -->

            <div class="gcash-amount">

                <span>
                    Amount to Pay
                </span>

                <strong>
                    <?= money($total) ?>
                </strong>

            </div>


            <!-- =================================================
                 INSTRUCTIONS
                 ================================================= -->

            <div class="gcash-instructions">

                <h3>
                    How to pay
                </h3>

                <ol>

                    <li>
                        Open your GCash app.
                    </li>

                    <li>
                        Scan the QR code above.
                    </li>

                    <li>
                        Enter the exact amount:
                        <strong>
                            <?= money($total) ?>
                        </strong>
                    </li>

                    <li>
                        Complete the payment.
                    </li>

                    <li>
                        Copy the GCash transaction reference number.
                    </li>

                </ol>

            </div>


            <!-- =================================================
                 WARNING
                 ================================================= -->

            <div class="gcash-warning">

                <strong>
                    Important
                </strong>

                <p>
                    Make sure the amount you pay matches
                    your BigBrew order total.
                </p>

                <p>
                    Your payment will remain pending until
                    it is verified by BigBrew.
                </p>

            </div>


            <!-- =================================================
                 REFERENCE NUMBER
                 ================================================= -->

            <form
                method="post"
                class="gcash-reference-form"
            >

                <input
                    type="hidden"
                    name="customer_name"
                    value="<?= htmlspecialchars($customerName) ?>"
                >

                <input
                    type="hidden"
                    name="payment_method"
                    value="GCash"
                >


                <label for="gcash_payment_reference">

                    GCash Payment Reference Number

                </label>


                <input
                    type="text"
                    id="gcash_payment_reference"
                    name="gcash_payment_reference"
                    placeholder="Enter GCash reference number"
                    autocomplete="off"
                    required
                    value="<?= htmlspecialchars($paymentReference) ?>"
                >


                <small class="gcash-reference-help">

                    Enter the reference number shown
                    after completing your payment.

                </small>


                <button
                    type="submit"
                    class="gcash-paid-button"
                >

                    I HAVE PAID

                </button>

            </form>

        </div>

    <?php endif; ?>


    <!-- =========================================================
         BACK BUTTON
         ========================================================= -->

    <div class="checkout-actions">

        <a
            class="back-button"
            href="CustomerCheckout.php"
        >
            ← Back
        </a>

    </div>


</section>

</main>

</body>

</html>