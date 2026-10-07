<?php
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_key'])) {
    unset($_SESSION['cart'][$_POST['remove_key']]);
    header('Location: CustomerCheckout.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['customer_name'])) {
    $_SESSION['customer_name'] = trim($_POST['customer_name']);
}

$cart = getCart();
$total = calculateOrderTotal($cart);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BigBrew - Confirm Order</title><link rel="stylesheet" href="style.css">
</head>
<body class="checkout-page">
<main class="checkout-content">
<section class="checkout-card">
    <div class="checkout-title"><span class="step-number">1</span><div><h1>Customer Information</h1><p>What name should we use for your order?</p></div></div>
    <label class="checkout-label">Customer Name</label>
    <input id="customerName" class="checkout-input" type="text" value="<?= htmlspecialchars($_SESSION['customer_name'] ?? '') ?>" placeholder="Enter your name">
    <p class="helper-text">This name will appear on your order and e-receipt.</p>
</section>

<section class="checkout-card">
    <div class="checkout-title"><span class="step-number">2</span><div><h1>Order Summary</h1><p>Check your selected items.</p></div></div>
    <div class="summary-list">
    <?php foreach ($cart as $key => $item): ?>
        <div class="summary-item">
            <div class="summary-name"><strong><?= htmlspecialchars($item['name']) ?></strong><div class="tags"><span><?= htmlspecialchars(ucfirst($item['size'])) ?></span><span>Sugar <?= htmlspecialchars($item['sugar']) ?></span><?php foreach($item['addons'] as $addon): ?><span>+<?= htmlspecialchars($addon) ?></span><?php endforeach; ?></div></div>
            <span class="summary-qty">×<?= (int)$item['quantity'] ?></span>
            <strong class="summary-price"><?= money($item['line_total']) ?></strong>
        </div>
    <?php endforeach; ?>
    <?php if (!$cart): ?><p class="helper-text">Your order is empty. Return to the menu to add a beverage.</p><?php endif; ?>
    </div>
    <div class="summary-total"><span>Total Amount</span><strong><?= money($total) ?></strong></div>
</section>

<section class="checkout-card payment-preview">
    <div class="checkout-title"><span class="step-number">3</span><div><h1>Payment</h1><p>Select your payment method on the next step.</p></div></div>
    <div class="payment-preview-box"><div class="peso-icon">₱</div><div><strong>Payment Method</strong><p>You will choose your payment method after reviewing your order.</p></div></div>
</section>

<div class="checkout-actions">
    <a class="back-button" href="CustomerMenu.php">← Back to Menu</a>
    <?php if ($cart): ?><button class="proceed-payment" id="proceedButton" type="button">Proceed to Payment&nbsp; →</button><?php endif; ?>
</div>
</main>

<form id="proceedForm" method="post" action="CustomerPayment.php"><input type="hidden" name="customer_name" id="customerNameHidden"></form>
<script>
document.getElementById('proceedButton')?.addEventListener('click', function(){
    const name = document.getElementById('customerName').value.trim();
    if (!name) { alert('Please enter your name first.'); document.getElementById('customerName').focus(); return; }
    document.getElementById('customerNameHidden').value = name;
    document.getElementById('proceedForm').submit();
});
</script>
</body></html>
