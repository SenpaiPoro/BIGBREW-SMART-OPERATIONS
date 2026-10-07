BIGBREW CUSTOMER PHP VERSION

Files:
- functions.php: product data, beverage filter, cart functions, and total calculation.
- CustomerMenu.php: dynamic beverage menu with category filtering and Add to Order.
- CustomerCheckout.php: session cart and automatic total amount calculation.
- CustomerPayment.php: payment selection.
- CustomerReceipt.php: dynamic receipt.
- CustomerOrderStatus.php: order status screen.
- CustomerQR.php: QR landing screen.
- style.css: ONE shared CSS file for all pages.

Run with XAMPP:
1. Put this folder inside C:\xampp\htdocs\bigbrew_customer_php\
2. Start Apache in XAMPP.
3. Open http://localhost/bigbrew_customer_php/CustomerMenu.php

Main PHP functions:
- filterBeverages($category)
- addToOrder($productId, $size, $quantity)
- calculateOrderTotal($cart)
- getCartItemCount()
