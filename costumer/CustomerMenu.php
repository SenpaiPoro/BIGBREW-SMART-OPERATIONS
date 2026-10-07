<?php
require_once 'functions.php';

$selectedCategory = $_GET['category'] ?? 'All';
$productsToShow = filterBeverages($selectedCategory);
$selectedProductId = $_GET['product'] ?? '';
$selectedProduct = getProduct($selectedProductId);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'add_to_cart') {
    addToOrder(
        $_POST['product_id'] ?? '',
        $_POST['size'] ?? 'small',
        $_POST['sugar'] ?? '50%',
        $_POST['addons'] ?? [],
        (int)($_POST['quantity'] ?? 1)
    );
    header('Location: CustomerMenu.php?category=' . urlencode($selectedCategory));
    exit;
}

$cart = getCart();
$total = calculateOrderTotal($cart);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BigBrew Menu</title>
<link rel="stylesheet" href="style.css">
</head>
<body class="menu-page">
<header class="menu-header">
    <div class="brand-block">
        <div class="brand">BIGBREW</div>
        <div class="brand-subtitle">CUSTOMER ORDERING</div>
    </div>
        <button
            id="cartButton"
            class="cart-button"
            type="button"
        >
            <span>🛒</span>
            Cart
            <b><?= getCartItemCount() ?></b>
        </button>
</header>

<section class="menu-top">
    <div>
        <span class="eyebrow">BIGBREW MENU</span>
        <h1>What would you like today?</h1>
        <p>Choose your favorite beverage and customize it your way.</p>
    </div>
</section>

<nav class="category-bar">
    <div class="category-inner">
        <a class="category-pill <?= strcasecmp($selectedCategory, 'All') === 0 ? 'active' : '' ?>" href="CustomerMenu.php?category=All">All</a>
        <?php foreach ($categories as $category): ?>
            <a class="category-pill <?= strcasecmp($selectedCategory, $category) === 0 ? 'active' : '' ?>" href="CustomerMenu.php?category=<?= urlencode($category) ?>">
                <?= htmlspecialchars($category) ?>
            </a>
        <?php endforeach; ?>
    </div>
</nav>

<main class="menu-content">
    <div class="product-grid customer-grid">
        <?php foreach ($productsToShow as $product): ?>
            <article class="customer-product-card">
                <div class="product-photo">
                    <div class="cup-placeholder">🥤</div>
                </div>
                <div class="product-info">
                    <h2><?= htmlspecialchars($product['name']) ?></h2>
                    <div class="product-category"><?= htmlspecialchars($product['category']) ?></div>
                    <div class="product-bottom">
                        <div><span class="from-label">From</span> <strong><?= money($product['small']) ?></strong></div>
                        <a class="product-arrow" href="CustomerMenu.php?category=<?= urlencode($selectedCategory) ?>&product=<?= urlencode($product['id']) ?>" aria-label="Customize <?= htmlspecialchars($product['name']) ?>">→</a>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</main>

<?php if ($selectedProduct): ?>
<div class="overlay product-overlay" id="productOverlay">
    <section class="product-modal">
        <div class="modal-heading">
            <div>
                <div class="modal-category"><?= htmlspecialchars(strtoupper($selectedProduct['category'])) ?></div>
                <h2><?= htmlspecialchars($selectedProduct['name']) ?></h2>
            </div>
            <a class="close-button" href="CustomerMenu.php?category=<?= urlencode($selectedCategory) ?>">×</a>
        </div>

        <form method="post" id="customizeForm">
            <input type="hidden" name="action" value="add_to_cart">
            <input type="hidden" name="product_id" value="<?= htmlspecialchars($selectedProduct['id']) ?>">

            <div class="custom-section">
                <h3>Size</h3>
                <div class="choice-grid two">
                    <label class="choice-card selected">
                        <input type="radio" name="size" value="small" checked onchange="updatePrice()">
                        <span>Small</span><b><?= money($selectedProduct['small']) ?></b>
                    </label>
                    <label class="choice-card">
                        <input type="radio" name="size" value="large" onchange="updatePrice()">
                        <span>Large</span><b><?= money($selectedProduct['large']) ?></b>
                    </label>
                </div>
            </div>

            <div class="custom-section">
                <h3>Sugar Level</h3>
                <div class="sugar-row">
                    <?php foreach (['0%', '25%', '50%', '75%', '100%'] as $sugar): ?>
                        <label class="sugar-choice <?= $sugar === '50%' ? 'selected' : '' ?>">
                            <input type="radio" name="sugar" value="<?= $sugar ?>" <?= $sugar === '50%' ? 'checked' : '' ?> onchange="setSugar(this)">
                            <span><?= $sugar ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="custom-section">
                <div class="section-title-row"><h3>Add-ons</h3><span>+₱9 each</span></div>
                <div class="addon-grid">
                    <?php foreach ($addons as $addon): ?>
                        <label class="addon-choice">
                            <input type="checkbox" name="addons[]" value="<?= htmlspecialchars($addon) ?>" onchange="updatePrice()">
                            <span><?= htmlspecialchars($addon) ?></span><b>+₱9</b>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="custom-section quantity-section">
                <h3>Quantity</h3>
                <div class="quantity-control">
                    <button type="button" onclick="changeQty(-1)">−</button>
                    <input id="quantity" name="quantity" value="1" readonly>
                    <button type="button" onclick="changeQty(1)">+</button>
                </div>
            </div>

            <div class="modal-footer">
                <div><span>Total</span><strong id="customTotal"><?= money($selectedProduct['small']) ?></strong></div>
                <button class="add-cart-button" type="submit">Add to Cart</button>
            </div>
        </form>
    </section>
</div>
<?php endif; ?>

<div class="overlay" id="cartOverlay" hidden>
    <section class="cart-modal">
        <div class="cart-heading">
            <div><h2>Your Order</h2><p><?= getCartItemCount() ?> <?= getCartItemCount() === 1 ? 'item' : 'items' ?></p></div>
            <button class="close-button" type="button" onclick="closeCart()">×</button>
        </div>
        <div class="cart-items">
            <?php if (!$cart): ?>
                <div class="empty-cart">Your cart is empty.</div>
            <?php else: ?>
                <?php foreach ($cart as $key => $item): ?>
                    <div class="cart-item">
                        <div class="cart-thumb">🥤</div>
                        <div class="cart-item-main">
                            <strong><?= htmlspecialchars($item['name']) ?></strong>
                            <span><?= htmlspecialchars(ucfirst($item['size'])) ?> · Sugar <?= htmlspecialchars($item['sugar']) ?></span>
                            <?php if (!empty($item['addons'])): ?><span>+<?= htmlspecialchars(implode(', +', $item['addons'])) ?></span><?php endif; ?>
                            <b><?= (int)$item['quantity'] ?> × <?= money($item['price']) ?></b>
                        </div>
                        <div class="cart-item-right">
                            <strong><?= money($item['line_total']) ?></strong>
                            <form method="post" action="CustomerMenu.php?category=<?= urlencode($selectedCategory) ?>">
                                <input type="hidden" name="remove_key" value="<?= htmlspecialchars($key) ?>">
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="cart-total"><span>Total</span><strong><?= money($total) ?></strong></div>
        <div class="cart-actions">
            <button class="secondary-action" type="button" onclick="closeCart()">Continue Shopping</button>
            <?php if ($cart): ?><a class="proceed-button" href="CustomerCheckout.php">Proceed to Order</a><?php endif; ?>
        </div>
    </section>
</div>

<script>
const smallPrice = <?= (float)$selectedProduct['small'] ?? 0 ?>;
const largePrice = <?= (float)$selectedProduct['large'] ?? 0 ?>;

function updatePrice() {
    const size = document.querySelector('input[name="size"]:checked')?.value || 'small';
    const base = size === 'large' ? largePrice : smallPrice;
    const addonCount = document.querySelectorAll('input[name="addons[]"]:checked').length;
    const qty = parseInt(document.getElementById('quantity')?.value || 1);
    const total = (base + addonCount * 9) * qty;
    const totalEl = document.getElementById('customTotal');
    if (totalEl) totalEl.textContent = '₱' + total.toFixed(2);
    document.querySelectorAll('.choice-card').forEach(x => x.classList.toggle('selected', x.querySelector('input')?.checked));
}
function setSugar(input) {
    document.querySelectorAll('.sugar-choice').forEach(x => x.classList.remove('selected'));
    input.closest('.sugar-choice').classList.add('selected');
}
function changeQty(delta) {
    const input = document.getElementById('quantity');
    if (!input) return;
    input.value = Math.max(1, parseInt(input.value) + delta);
    updatePrice();
}
function openCart() {
    document.getElementById('cartOverlay').hidden = false;
    document.body.classList.add('no-scroll');
}
function closeCart() {
    document.getElementById('cartOverlay').hidden = true;
    document.body.classList.remove('no-scroll');
}
updatePrice();
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {

    const cartButton = document.getElementById("cartButton");
    const cartOverlay = document.getElementById("cartOverlay");

    if (cartButton && cartOverlay) {

        cartButton.addEventListener("click", function () {
            cartOverlay.hidden = false;
            document.body.classList.add("no-scroll");
        });

        const closeButton = cartOverlay.querySelector(".close-button");

        if (closeButton) {
            closeButton.addEventListener("click", function () {
                cartOverlay.hidden = true;
                document.body.classList.remove("no-scroll");
            });
        }

        const continueButton =
            cartOverlay.querySelector(".secondary-action");

        if (continueButton) {
            continueButton.addEventListener("click", function () {
                cartOverlay.hidden = true;
                document.body.classList.remove("no-scroll");
            });
        }
    }

});
</script>
</body>
</html>
