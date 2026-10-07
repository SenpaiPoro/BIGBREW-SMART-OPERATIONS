<?php
// Shared functions for the BigBrew customer ordering pages.
session_start();

$products = [
    'PROD001' => ['id'=>'PROD001', 'name'=>'Dark Choco', 'category'=>'Milk Tea', 'small'=>29, 'large'=>39],
    'PROD002' => ['id'=>'PROD002', 'name'=>'Cookies & Cream', 'category'=>'Milk Tea', 'small'=>29, 'large'=>39],
    'PROD003' => ['id'=>'PROD003', 'name'=>'Okinawa', 'category'=>'Milk Tea', 'small'=>29, 'large'=>39],
    'PROD004' => ['id'=>'PROD004', 'name'=>'Wintermelon', 'category'=>'Milk Tea', 'small'=>29, 'large'=>39],
    'PROD005' => ['id'=>'PROD005', 'name'=>'Cheesecake', 'category'=>'Milk Tea', 'small'=>29, 'large'=>39],
    'PROD006' => ['id'=>'PROD006', 'name'=>'Matcha', 'category'=>'Milk Tea', 'small'=>29, 'large'=>39],
    'PROD007' => ['id'=>'PROD007', 'name'=>'Chocolate', 'category'=>'Milk Tea', 'small'=>29, 'large'=>39],
    'PROD008' => ['id'=>'PROD008', 'name'=>'Red Velvet', 'category'=>'Milk Tea', 'small'=>29, 'large'=>39],
    'PROD009' => ['id'=>'PROD009', 'name'=>'Salted Caramel', 'category'=>'Milk Tea', 'small'=>29, 'large'=>39],
    'PROD010' => ['id'=>'PROD010', 'name'=>'Choco Kisses', 'category'=>'Milk Tea', 'small'=>29, 'large'=>39],
    'PROD011' => ['id'=>'PROD011', 'name'=>'Taro', 'category'=>'Milk Tea', 'small'=>29, 'large'=>39],
    'PROD012' => ['id'=>'PROD012', 'name'=>'Strawberry', 'category'=>'Milk Tea', 'small'=>29, 'large'=>39],
    'PROD013' => ['id'=>'PROD013', 'name'=>'Brusko', 'category'=>'Iced Coffee', 'small'=>29, 'large'=>39],
    'PROD014' => ['id'=>'PROD014', 'name'=>'Mocha', 'category'=>'Iced Coffee', 'small'=>29, 'large'=>39],
    'PROD015' => ['id'=>'PROD015', 'name'=>'Macchiato', 'category'=>'Iced Coffee', 'small'=>29, 'large'=>39],
    'PROD016' => ['id'=>'PROD016', 'name'=>'Vanilla', 'category'=>'Iced Coffee', 'small'=>29, 'large'=>39],
    'PROD017' => ['id'=>'PROD017', 'name'=>'Caramel', 'category'=>'Iced Coffee', 'small'=>29, 'large'=>39],
    'PROD018' => ['id'=>'PROD018', 'name'=>'Matcha', 'category'=>'Iced Coffee', 'small'=>29, 'large'=>39],
    'PROD019' => ['id'=>'PROD019', 'name'=>'Fudge', 'category'=>'Iced Coffee', 'small'=>29, 'large'=>39],
    'PROD020' => ['id'=>'PROD020', 'name'=>'Spanish Latte', 'category'=>'Iced Coffee', 'small'=>29, 'large'=>39],
    'PROD021' => ['id'=>'PROD021', 'name'=>'Brusko', 'category'=>'Hot Coffee', 'small'=>39, 'large'=>39],
    'PROD022' => ['id'=>'PROD022', 'name'=>'Mocha', 'category'=>'Hot Coffee', 'small'=>39, 'large'=>39],
    'PROD023' => ['id'=>'PROD023', 'name'=>'Macchiato', 'category'=>'Hot Coffee', 'small'=>39, 'large'=>39],
    'PROD024' => ['id'=>'PROD024', 'name'=>'Vanilla', 'category'=>'Hot Coffee', 'small'=>39, 'large'=>39],
    'PROD025' => ['id'=>'PROD025', 'name'=>'Caramel', 'category'=>'Hot Coffee', 'small'=>39, 'large'=>39],
    'PROD026' => ['id'=>'PROD026', 'name'=>'Matcha', 'category'=>'Hot Coffee', 'small'=>39, 'large'=>39],
    'PROD027' => ['id'=>'PROD027', 'name'=>'Fudge', 'category'=>'Hot Coffee', 'small'=>39, 'large'=>39],
    'PROD028' => ['id'=>'PROD028', 'name'=>'Spanish Latte', 'category'=>'Hot Coffee', 'small'=>39, 'large'=>39],
    'PROD029' => ['id'=>'PROD029', 'name'=>'Lychee', 'category'=>'Fruit Tea', 'small'=>29, 'large'=>39],
    'PROD030' => ['id'=>'PROD030', 'name'=>'Green Apple', 'category'=>'Fruit Tea', 'small'=>29, 'large'=>39],
    'PROD031' => ['id'=>'PROD031', 'name'=>'Blueberry', 'category'=>'Fruit Tea', 'small'=>29, 'large'=>39],
    'PROD032' => ['id'=>'PROD032', 'name'=>'Lemon', 'category'=>'Fruit Tea', 'small'=>29, 'large'=>39],
    'PROD033' => ['id'=>'PROD033', 'name'=>'Strawberry', 'category'=>'Fruit Tea', 'small'=>29, 'large'=>39],
    'PROD034' => ['id'=>'PROD034', 'name'=>'Kiwi', 'category'=>'Fruit Tea', 'small'=>29, 'large'=>39],
    'PROD035' => ['id'=>'PROD035', 'name'=>'Mango', 'category'=>'Fruit Tea', 'small'=>29, 'large'=>39],
    'PROD036' => ['id'=>'PROD036', 'name'=>'Honey Peach', 'category'=>'Fruit Tea', 'small'=>29, 'large'=>39],
    'PROD037' => ['id'=>'PROD037', 'name'=>'Lychee', 'category'=>'Brosty', 'small'=>49, 'large'=>59],
    'PROD038' => ['id'=>'PROD038', 'name'=>'Green Apple', 'category'=>'Brosty', 'small'=>49, 'large'=>59],
    'PROD039' => ['id'=>'PROD039', 'name'=>'Blueberry', 'category'=>'Brosty', 'small'=>49, 'large'=>59],
    'PROD040' => ['id'=>'PROD040', 'name'=>'Lemon', 'category'=>'Brosty', 'small'=>49, 'large'=>59],
    'PROD041' => ['id'=>'PROD041', 'name'=>'Strawberry', 'category'=>'Brosty', 'small'=>49, 'large'=>59],
    'PROD042' => ['id'=>'PROD042', 'name'=>'Kiwi', 'category'=>'Brosty', 'small'=>49, 'large'=>59],
    'PROD043' => ['id'=>'PROD043', 'name'=>'Mango', 'category'=>'Brosty', 'small'=>49, 'large'=>59],
    'PROD044' => ['id'=>'PROD044', 'name'=>'Honey Peach', 'category'=>'Brosty', 'small'=>49, 'large'=>59],
    'PROD045' => ['id'=>'PROD045', 'name'=>'Coffee Jelly', 'category'=>'Praf', 'small'=>49, 'large'=>59],
    'PROD046' => ['id'=>'PROD046', 'name'=>'Caramel Macchiato', 'category'=>'Praf', 'small'=>49, 'large'=>59],
    'PROD047' => ['id'=>'PROD047', 'name'=>'Mocha', 'category'=>'Praf', 'small'=>49, 'large'=>59],
    'PROD048' => ['id'=>'PROD048', 'name'=>'Vanilla Coffee', 'category'=>'Praf', 'small'=>49, 'large'=>59],
    'PROD049' => ['id'=>'PROD049', 'name'=>'Java Chip', 'category'=>'Praf', 'small'=>49, 'large'=>59],
    'PROD050' => ['id'=>'PROD050', 'name'=>'Cheesecake', 'category'=>'Praf', 'small'=>49, 'large'=>59],
    'PROD051' => ['id'=>'PROD051', 'name'=>'Cookies & Cream', 'category'=>'Praf', 'small'=>49, 'large'=>59],
    'PROD052' => ['id'=>'PROD052', 'name'=>'Creamy Avocado', 'category'=>'Praf', 'small'=>49, 'large'=>59],
    'PROD053' => ['id'=>'PROD053', 'name'=>'Chocolate', 'category'=>'Praf', 'small'=>49, 'large'=>59],
    'PROD054' => ['id'=>'PROD054', 'name'=>'Matcha', 'category'=>'Praf', 'small'=>49, 'large'=>59],
    'PROD055' => ['id'=>'PROD055', 'name'=>'Strawberry', 'category'=>'Praf', 'small'=>49, 'large'=>59],
    'PROD056' => ['id'=>'PROD056', 'name'=>'Taro', 'category'=>'Praf', 'small'=>49, 'large'=>59]
];

$categories = ['Milk Tea', 'Iced Coffee', 'Hot Coffee', 'Fruit Tea', 'Brosty', 'Praf'];

function getProducts(): array {
    global $products;
    return $products;
}

// Filter beverages by category. Pass an empty category or "All" to return everything.
function filterBeverages(string $category = 'All'): array {
    $products = getProducts();
    if ($category === '' || strcasecmp($category, 'All') === 0) {
        return $products;
    }

    return array_filter($products, function ($product) use ($category) {
        return strcasecmp($product['category'], $category) === 0;
    });
}

// Add a customized item to the current session cart.
function addToOrder(string $productId, string $size = 'small', string $sugar = '50%', array $addons = [], int $quantity = 1): void {
    $products = getProducts();
    if (!isset($products[$productId])) return;

    $size = strtolower($size) === 'large' ? 'large' : 'small';
    $validSugar = ['0%', '25%', '50%', '75%', '100%'];
    $sugar = in_array($sugar, $validSugar, true) ? $sugar : '50%';
    $validAddons = getAddons();
    $addons = array_values(array_intersect($addons, $validAddons));
    $quantity = max(1, $quantity);

    if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

    sort($addons);
    $addonKey = implode('|', $addons);
    $key = $productId . '_' . $size . '_' . str_replace('%', 'p', $sugar) . '_' . md5($addonKey);
    $unitPrice = (float)$products[$productId][$size] + (count($addons) * 9);

    if (isset($_SESSION['cart'][$key])) {
        $_SESSION['cart'][$key]['quantity'] += $quantity;
        $_SESSION['cart'][$key]['line_total'] = $_SESSION['cart'][$key]['quantity'] * $unitPrice;
    } else {
        $_SESSION['cart'][$key] = [
            'product_id' => $productId,
            'name' => $products[$productId]['name'],
            'category' => $products[$productId]['category'],
            'size' => $size,
            'sugar' => $sugar,
            'addons' => $addons,
            'price' => $unitPrice,
            'quantity' => $quantity,
            'line_total' => $unitPrice * $quantity
        ];
    }
}

function getAddons(): array {
    return ['Pearl', 'Crystal', 'Cream Cheese', 'Cream Puff', 'Cheesecake', 'Crushed Oreo', 'Coffee Jelly', 'Whipped Cream'];
}

function getProduct(string $productId): ?array {
    $products = getProducts();
    return $products[$productId] ?? null;
}

function getCart(): array {
    return $_SESSION['cart'] ?? [];
}

// Calculates the total amount of all items currently in the order.
function calculateOrderTotal(array $cart = null): float {
    $cart = $cart ?? getCart();
    $total = 0;
    foreach ($cart as $item) {
        $total += ((float)$item['price']) * ((int)$item['quantity']);
    }
    return $total;
}

function getCartItemCount(): int {
    $count = 0;
    foreach (getCart() as $item) $count += (int)$item['quantity'];
    return $count;
}

function money(float $amount): string {
    return '₱' . number_format($amount, 2);
}

function clearOrder(): void {
    $_SESSION['cart'] = [];
}
?>
