<?php
require_once 'functions.php';
$cart = getCart();
$total = calculateOrderTotal($cart);
$customerName = $_SESSION['customer_name'] ?? '';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerName = trim($_POST['customer_name'] ?? '');
    if ($customerName === '') $error = 'Please enter your name.';
    elseif (!$cart) $error = 'Your cart is empty.';
    else {
        $_SESSION['customer_name'] = mb_substr($customerName, 0, 50);
        header('Location: CustomerPayment.php');
        exit;
    }
}
function e($value) { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); }
function checkoutItemName($item) { return $item['product'] ?? $item['name'] ?? 'Product'; }
function checkoutItemTotal($item) { $qty = (int)($item['quantity'] ?? 1); return (float)($item['total'] ?? $item['line_total'] ?? ((float)($item['unitPrice'] ?? $item['price'] ?? 0) * $qty)); }
function checkoutAddons($item) { $addons = $item['addons'] ?? $item['addOns'] ?? []; if (!is_array($addons)) return (string)$addons; return implode(', ', array_filter(array_map(fn($a) => is_array($a) ? ($a['name'] ?? '') : (string)$a))); }
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>BigBrew - Review Your Order</title><link rel="stylesheet" href="style.css"></head>
<body class="checkout-page"><main class="checkout-content">
<section class="checkout-card"><div class="checkout-title"><span class="step-number">1</span><div><h1>Customer Information</h1><p>Enter your name and review your order before proceeding.</p></div></div>
<?php if ($error): ?><p class="gcash-warning"><?=e($error)?></p><?php endif; ?>
<form method="post"><label class="checkout-label" for="customer_name">Customer Name</label><input class="checkout-input" id="customer_name" name="customer_name" value="<?=e($customerName)?>" placeholder="Enter your name" maxlength="50" required></section>
<section class="checkout-card"><div class="checkout-title"><span class="step-number">2</span><div><h1>Order Summary</h1><p>Check your selected items.</p></div></div>
<?php if (!$cart): ?><p class="helper-text">Your cart is empty. Return to the menu to add a beverage.</p><?php else: foreach ($cart as $item): ?><div class="summary-item"><div><strong><?=e(checkoutItemName($item))?></strong><div class="helper-text"><?=e(ucfirst((string)($item['size'] ?? '')))?><?=!empty($item['sugar'])?' · Sugar '.e($item['sugar']):''?><?php $a=checkoutAddons($item); if ($a!=='') echo ' · +'.e($a); ?></div></div><span>×<?= (int)($item['quantity'] ?? 1) ?></span><strong><?=money(checkoutItemTotal($item))?></strong></div><?php endforeach; endif; ?>
<div class="summary-total"><span>Total Amount</span><strong><?=money($total)?></strong></div></section>
<section class="checkout-card"><div class="checkout-title"><span class="step-number">3</span><div><h1>Payment</h1><p>Select your payment method on the next step.</p></div></div><p class="helper-text">You will choose Cash, GCash, or Maya on the next page.</p></section>
<div class="checkout-actions"><a class="back-button" href="CustomerMenu.php">← Back to Menu</a><button class="proceed-payment" type="submit" <?=!$cart?'disabled':''?>>Proceed to Payment →</button></div></form>
</main></body></html>
