<?php

$views = [
    'home.blade.php',
    'shop/index.blade.php',
    'shop/show.blade.php',
    'cart/index.blade.php',
    'checkout/index.blade.php',
    'account/index.blade.php',
    'account/orders.blade.php',
    'account/wishlist.blade.php',
    'account/settings.blade.php',
    'contact.blade.php',
    'faq.blade.php',
    'terms.blade.php',
];

$baseDir = __DIR__ . '/resources/views/';

foreach ($views as $view) {
    $filePath = $baseDir . $view;

    // Ensure directory exists
    $directory = dirname($filePath);
    if (!is_dir($directory)) {
        mkdir($directory, 0755, true);
    }

    // Create file if it doesn't exist
    if (!file_exists($filePath)) {
        file_put_contents($filePath, "<!-- $view -->\n");
        echo "Created: $filePath\n";
    } else {
        echo "Already exists: $filePath\n";
    }
}
