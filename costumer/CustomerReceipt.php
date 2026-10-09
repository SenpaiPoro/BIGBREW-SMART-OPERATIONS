<?php
require_once 'functions.php';
$cart = getCart();
$total = (float)($_SESSION['order_total'] ?? calculateOrderTotal($cart));
$customerName = $_SESSION['customer_name'] ?? 'Customer';
$method = $_SESSION['payment_method'] ?? 'Pending';
$status = strtoupper($_SESSION['payment_status'] ?? 'PENDING');
$reference = $_SESSION['payment_reference'] ?? '';
$orderNumber = $_SESSION['order_number'] ?? 'SALE' . date('ymdHis');
$_SESSION['order_number'] = $orderNumber;
$isPaid = $status === 'PAID';
function e($value) { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); }
function receiptName($item) { return $item['product'] ?? $item['name'] ?? 'Product'; }
function receiptTotal($item) { $qty=(int)($item['quantity']??1); return (float)($item['total']??$item['line_total']??((float)($item['unitPrice']??$item['price']??0)*$qty)); }
function receiptAddons($item) { $a=$item['addons']??$item['addOns']??[]; if(!is_array($a)) return (string)$a; return implode(', ',array_filter(array_map(fn($v)=>is_array($v)?($v['name']??''):(string)$v,$a))); }
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>BigBrew Order Receipt</title><link rel="stylesheet" href="style.css"></head>
<body class="checkout-page"><main class="checkout-content">
<section class="checkout-card"><div class="checkout-title"><span class="step-number">✓</span><div><h1><?= $isPaid ? 'Payment Confirmed' : 'Order Received' ?></h1><p>Thank you, <?=e($customerName)?>. <?= $isPaid ? 'Your payment has been verified.' : 'Your order is recorded as pending until applicable payment verification is complete.' ?></p></div></div>
<div class="gcash-amount"><span>ORDER NUMBER</span><strong>#<?=e($orderNumber)?></strong></div>
<div class="summary-total"><span>Payment Method</span><strong><?=e($method)?></strong></div>
<div class="summary-total"><span>Payment Status</span><strong><?= $isPaid ? 'PAID' : ($method === 'GCash' ? 'PENDING VERIFICATION' : 'PENDING') ?></strong></div>
<?php if ($method === 'GCash'): ?><div class="summary-item"><span>GCash Reference</span><strong><?=e($reference ?: 'Not submitted')?></strong></div><?php endif; ?>
<h2>Order Items</h2>
<?php foreach ($cart as $item): ?><div class="summary-item"><div><strong><?=e(receiptName($item))?></strong><div class="helper-text"><?=e(ucfirst((string)($item['size']??'')))?><?=!empty($item['sugar'])?' · Sugar '.e($item['sugar']):''?><?php $a=receiptAddons($item); if($a!=='') echo ' · Add-ons: '.e($a); ?></div></div><span>×<?= (int)($item['quantity']??1) ?></span><strong><?=money(receiptTotal($item))?></strong></div><?php endforeach; ?>
<div class="summary-total"><span>Total Amount</span><strong><?=money($total)?></strong></div>
<?php if (!$isPaid && $method === 'GCash'): ?><div class="gcash-warning"><strong>Awaiting verification</strong><p>Keep your GCash reference number. The owner/cashier must confirm the transaction in GCash for Business before the order is treated as paid.</p></div><?php endif; ?>
<div class="checkout-actions"><a class="back-button" href="CustomerMenu.php">New Order</a><a class="proceed-payment" href="CustomerOrderStatus.php">Track My Order →</a></div>
</section></main></body></html>
