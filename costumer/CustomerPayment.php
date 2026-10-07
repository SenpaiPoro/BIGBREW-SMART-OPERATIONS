<?php
require_once 'functions.php';
$customerName = trim($_POST['customer_name'] ?? $_SESSION['customer_name'] ?? 'Customer');
if ($customerName !== 'Customer') $_SESSION['customer_name'] = $customerName;
$cart = getCart();
$total = calculateOrderTotal($cart);
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['payment_method']) && $cart) {
    $_SESSION['payment_method'] = $_POST['payment_method'];
    $_SESSION['order_total'] = $total;
    $_SESSION['order_number'] = $_SESSION['order_number'] ?? 'SALE001';
    header('Location: CustomerReceipt.php'); exit;
}
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0"><title>BigBrew Payment</title><link rel="stylesheet" href="style.css"></head>
<body class="checkout-page"><main class="checkout-content"><section class="checkout-card"><div class="checkout-title"><span class="step-number">3</span><div><h1>Payment</h1><p>Select your preferred payment method.</p></div></div><div class="summary-total"><span>Total Amount</span><strong><?= money($total) ?></strong></div><form method="post" class="payment-method-list"><input type="hidden" name="customer_name" value="<?= htmlspecialchars($customerName) ?>"><button class="payment-method" name="payment_method" value="Cash" type="submit"><b>₱</b><span><strong>Cash</strong><small>Pay at the counter</small></span>→</button><button class="payment-method" name="payment_method" value="GCash" type="submit"><b>G</b><span><strong>GCash</strong><small>Pay using GCash</small></span>→</button><button class="payment-method" name="payment_method" value="Maya" type="submit"><b>M</b><span><strong>Maya</strong><small>Pay using Maya</small></span>→</button></form><div class="checkout-actions"><a class="back-button" href="CustomerCheckout.php">← Back</a></div></section></main></body></html>
