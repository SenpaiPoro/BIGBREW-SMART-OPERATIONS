BIGBREW INVENTORY UI POLISH

Files:
- inventory-view.php: cleaned version of your supplied inventory/recipes/purchasing/receiving view; existing PHP logic and class names preserved.
- inventory-enhanced.css: visual override stylesheet; retains existing class names and responsive behavior.

INSTALLATION:
1. Back up your existing view and CSS first.
2. Copy inventory-enhanced.css into the same public CSS folder used by your app.
3. In include/header.php, add this AFTER your existing main stylesheet link:
   <link rel="stylesheet" href="assets/css/inventory-enhanced.css">
   Change the path to match your project folders.
4. Replace the existing view only with inventory-view.php if you intend to use the cleaned supplied view. Do not overwrite your shared header/footer.

Note: this is a visual polish pass. It preserves the supplied class names and layout rather than changing backend behavior or inventing database data.
