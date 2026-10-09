BIGBREW CUSTOMER FLOW — PHP CONVERSION

Files:
- CustomerCheckout.php
- CustomerPayment.php
- CustomerReceipt.php

This conversion follows the provided JSX component flow in PHP using the existing functions.php session/cart helpers and shared style.css.

INSTALL:
1. Back up your existing PHP files first.
2. Copy the three PHP files into your existing costumer folder, alongside functions.php and style.css.
3. Ensure functions.php starts a session and provides getCart(), calculateOrderTotal(), and money().
4. Place your QR image at the path used in CustomerPayment.php: ../assets/img/gcash.jpg. Adjust that relative path if your actual folder layout differs.
5. Open CustomerCheckout.php through XAMPP/localhost.

PAYMENT BEHAVIOR:
- Cash, GCash, and Maya selection stays visible.
- The GCash QR and reference form appear only after GCash is selected.
- GCash reference submission saves the order/payment state as PENDING and shows the receipt.
- A reference number is not proof of payment. Owner/cashier must verify the transaction before changing payment status to PAID.
- Maya is a placeholder/pending flow only; no Maya gateway integration is included.

IMPORTANT LIMITATIONS:
- This is a PHP session-based flow; it does not call the React version's Orders/Create.php API. That API requires product_size_id and add-on IDs and should be integrated separately if the PHP site must write orders to the MySQL database.
- Order number generation here is a session fallback, not a database-backed unique ID. For production, create order IDs in the database and add CSRF protection and server-side payment verification.
- Keep your existing style.css. Additional GCash styles may be needed if not already present.
