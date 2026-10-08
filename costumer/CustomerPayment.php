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

$selectedPayment = $_SESSION['payment_method'] ?? '';
$paymentReference = $_SESSION['payment_reference'] ?? '';

/*
|--------------------------------------------------------------------------
| HANDLE PAYMENT METHOD SELECTION
|--------------------------------------------------------------------------
*/

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $cart) {

    $paymentMethod = $_POST['payment_method'] ?? '';

    /*
    |--------------------------------------------------------------------------
    | CASH / MAYA
    |--------------------------------------------------------------------------
    */

    if ($paymentMethod === 'Cash' || $paymentMethod === 'Maya') {

        $_SESSION['payment_method'] = $paymentMethod;
        $_SESSION['order_total'] = $total;

        /*
         * Keep payment pending until the actual payment is verified.
         */
        $_SESSION['payment_status'] = 'PENDING';

        /*
         * Generate order number if one does not already exist.
         */
        $_SESSION['order_number'] =
            $_SESSION['order_number'] ?? 'SALE001';

        header('Location: CustomerReceipt.php');
        exit;
    }

    /*
    |--------------------------------------------------------------------------
    | GCASH - SHOW QR FIRST
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
    | GCASH PAYMENT REFERENCE SUBMISSION
    |--------------------------------------------------------------------------
    */

    if (
        isset($_POST['gcash_payment_reference'])
        && trim($_POST['gcash_payment_reference']) !== ''
    ) {

        $reference = trim($_POST['gcash_payment_reference']);

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
         PAYMENT HEADER
         ========================================================= -->

    <div class="checkout-title">

        <span class="step-number">3</span>

        <div>
            <h1>Payment</h1>
            <p>Select your preferred payment method.</p>
        </div>

    </div>


    <!-- =========================================================
         ORDER TOTAL
         ========================================================= -->

    <div class="summary-total">

        <span>Total Amount</span>

        <strong>
            <?= money($total) ?>
        </strong>

    </div>


    <?php if ($selectedPayment !== 'GCash'): ?>

        <!-- =====================================================
             PAYMENT METHOD SELECTION
             ===================================================== -->

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
                class="payment-method"
                name="payment_method"
                value="Cash"
                type="submit"
            >

                <b>₱</b>

                <span>
                    <strong>Cash</strong>
                    <small>Pay at the counter</small>
                </span>

                →
            </button>


            <!-- GCASH -->

            <button
                class="payment-method"
                name="payment_method"
                value="GCash"
                type="submit"
            >

                <b>G</b>

                <span>
                    <strong>GCash</strong>
                    <small>Pay using GCash</small>
                </span>

                →
            </button>


            <!-- MAYA -->

            <button
                class="payment-method"
                name="payment_method"
                value="Maya"
                type="submit"
            >

                <b>M</b>

                <span>
                    <strong>Maya</strong>
                    <small>Pay using Maya</small>
                </span>

                →
            </button>

        </form>


    <?php else: ?>

        <!-- =====================================================
             GCASH PAYMENT
             ===================================================== -->

        <div class="gcash-payment-box">

            <div class="gcash-header">

                <h2>Pay with GCash</h2>

                <p>
                    Scan the QR code using your GCash app.
                </p>

            </div>


            <!-- =================================================
                 QR CODE
                 ================================================= -->

            <div class="gcash-qr-wrapper">

                <img
                    src="gcash.jpg"
                    alt="BigBrew GCash Payment QR Code"
                    class="gcash-qr"
                >

            </div>


            <!-- =================================================
                 PAYMENT AMOUNT
                 ================================================= -->

            <div class="gcash-amount">

                <span>Amount to Pay</span>

                <strong>
                    <?= money($total) ?>
                </strong>

            </div>


            <!-- =================================================
                 INSTRUCTIONS
                 ================================================= -->

            <div class="gcash-instructions">

                <h3>How to pay</h3>

                <ol>

                    <li>
                        Open your GCash app.
                    </li>

                    <li>
                        Scan the QR code above.
                    </li>

                    <li>
                        Enter the exact amount:
                        <strong><?= money($total) ?></strong>
                    </li>

                    <li>
                        Complete the payment in GCash.
                    </li>

                    <li>
                        Copy your GCash transaction/reference number.
                    </li>

                </ol>

            </div>


            <!-- =================================================
                 PAYMENT WARNING
                 ================================================= -->

            <div class="gcash-warning">

                <strong>Important</strong>

                <p>
                    Please make sure the amount you pay matches
                    the order total exactly.
                </p>

                <p>
                    Your order will remain pending until the
                    payment is verified by BigBrew.
                </p>

            </div>


            <!-- =================================================
                 PAYMENT REFERENCE
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
                    placeholder="Enter your GCash reference number"
                    required
                    autocomplete="off"
                    value="<?= htmlspecialchars($paymentReference) ?>"
                >


                <small class="gcash-reference-help">

                    Enter the reference number shown after
                    completing your GCash payment.

                </small>


                <button
                    type="submit"
                    class="gcash-paid-button"
                >

                    I HAVE PAID

                </button>

            </form>


            <!-- =================================================
                 BACK
                 ================================================= -->

            <div class="checkout-actions">

                <a
                    class="back-button"
                    href="CustomerPayment.php"
                >
                    ← Change Payment Method
                </a>

            </div>

        </div>

    <?php endif; ?>


    <?php if ($selectedPayment !== 'GCash'): ?>

        <div class="checkout-actions">

            <a
                class="back-button"
                href="CustomerCheckout.php"
            >
                ← Back
            </a>

        </div>

    <?php endif; ?>

</section>

</main>

</body>
</html>