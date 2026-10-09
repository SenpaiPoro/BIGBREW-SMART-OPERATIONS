<?php
require_once 'functions.php';
$cart = getCart();
$total = calculateOrderTotal($cart);
$customerName = $_SESSION['customer_name'] ?? 'Customer';
$allowedMethods = ['Cash', 'GCash', 'Maya'];
$selectedPayment = $_SESSION['payment_method'] ?? '';
$paymentReference = $_SESSION['payment_reference'] ?? '';
$error = '';
function e($value) { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); }
function payItemName($item) { return $item['product'] ?? $item['name'] ?? 'Product'; }
function payItemTotal($item) { $qty=(int)($item['quantity']??1); return (float)($item['total']??$item['line_total']??((float)($item['unitPrice']??$item['price']??0)*$qty)); }
function payAddons($item) { $a=$item['addons']??$item['addOns']??[]; if(!is_array($a)) return (string)$a; return implode(', ',array_filter(array_map(fn($v)=>is_array($v)?($v['name']??''):(string)$v,$a))); }
if (!$cart) { header('Location: CustomerMenu.php'); exit; }
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postedMethod = $_POST['payment_method'] ?? '';
    if (in_array($postedMethod, $allowedMethods, true) && !isset($_POST['gcash_payment_reference'])) {
        $selectedPayment = $postedMethod;
        $_SESSION['payment_method'] = $postedMethod;
        $_SESSION['order_total'] = $total;
        $_SESSION['payment_status'] = 'PENDING';
        // Do not create or confirm a paid transaction merely by selecting a method.
    }
    if (isset($_POST['gcash_payment_reference'])) {
        $postedMethod = 'GCash';
        $reference = trim($_POST['gcash_payment_reference']);
        if ($reference === '') { $selectedPayment = 'GCash'; $error = 'Enter the GCash transaction reference after completing your payment.'; }
        else {
            $_SESSION['payment_method'] = 'GCash';
            $_SESSION['order_total'] = $total;
            $_SESSION['payment_status'] = 'PENDING';
            $_SESSION['payment_reference'] = mb_substr($reference, 0, 100);
            $_SESSION['order_number'] = $_SESSION['order_number'] ?? ('SALE' . date('ymdHis'));
            header('Location: CustomerReceipt.php'); exit;
        }
    }
}
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>BigBrew Payment</title><link rel="stylesheet" href="style.css"></head>
<body class="checkout-page"><main class="checkout-content"><section class="checkout-card">
<div class="checkout-title"><span class="step-number">2</span><div><h1>Payment</h1><p>Choose how you would like to pay for your BigBrew order.</p></div></div>
<div class="summary-total"><span>Total Amount</span><strong><?=money($total)?></strong></div>
<?php if ($error): ?><p class="gcash-warning"><?=e($error)?></p><?php endif; ?>
<form method="post" class="payment-method-list">
<button class="payment-method <?= $selectedPayment==='Cash'?'selected':'' ?>" name="payment_method" value="Cash" type="submit"><b>₱</b><span><strong>Cash</strong><small>Pay at the counter</small></span><span>→</span></button>
<button class="payment-method <?= $selectedPayment==='GCash'?'selected':'' ?>" name="payment_method" value="GCash" type="submit"><b>G</b><span><strong>GCash</strong><small>Pay using GCash</small></span><span>→</span></button>
<button class="payment-method <?= $selectedPayment==='Maya'?'selected':'' ?>" name="payment_method" value="Maya" type="submit"><b>M</b><span><strong>Maya</strong><small>Pay using Maya</small></span><span>→</span></button>
</form>
<?php if ($selectedPayment === 'GCash'): ?>
<section class="gcash-payment-box"><div class="gcash-header"><h2>Pay with GCash</h2><p>Scan this QR code using your GCash app.</p></div>
<div class="gcash-qr-wrapper"><img src="../assets/img/gcash.jpg" alt="BigBrew GCash QR code" class="gcash-qr"></div>
<div class="gcash-amount"><span>Amount to Pay</span><strong><?=money($total)?></strong></div>
<div class="gcash-instructions"><h3>How to pay</h3><ol><li>Open your GCash app and scan the QR code.</li><li>Enter the exact amount: <strong><?=money($total)?></strong></li><li>Complete the transfer in GCash.</li><li>Copy the transaction reference number from the successful transaction.</li></ol></div>
<div class="gcash-warning"><strong>Important</strong><p>Entering a reference number does not verify payment. BigBrew must check the actual transaction before marking the order PAID.</p></div>
<form method="post" class="gcash-reference-form"><input type="hidden" name="payment_method" value="GCash"><label for="gcash_payment_reference">GCash transaction reference number</label><input id="gcash_payment_reference" name="gcash_payment_reference" type="text" maxlength="100" autocomplete="off" placeholder="Enter reference number after payment" value="<?=e($paymentReference)?>" required><small class="gcash-reference-help">Your payment will remain pending until verified by BigBrew.</small><button class="gcash-paid-button" type="submit">I HAVE PAID — SUBMIT FOR VERIFICATION</button></form>
</section>
<?php elseif ($selectedPayment === 'Cash'): ?><div class="gcash-warning"><strong>Cash selected</strong><p>You will pay at the counter. No QR code is needed.</p></div><form method="post"><input type="hidden" name="confirm_cash" value="1"><button class="gcash-paid-button" type="submit" name="payment_method" value="Cash">Continue with Cash</button></form>
<?php elseif ($selectedPayment === 'Maya'): ?><div class="gcash-warning"><strong>Maya selected</strong><p>Maya payment has not been integrated here. Do not treat this order as paid until payment is verified.</p></div><form method="post"><button class="gcash-paid-button" type="submit" name="confirm_maya" value="1">Continue with Maya (Pending)</button></form><?php endif; ?>
<div class="checkout-actions"><a class="back-button" href="CustomerCheckout.php">← Back</a></div>
</section></main></body></html>
