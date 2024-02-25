<?php

function encryptData($data, $key, $iv) {
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
    return base64_encode($encrypted);
}

function decryptData($encryptedData, $key, $iv) {
    $decrypted = openssl_decrypt(base64_decode($encryptedData), 'aes-256-cbc', $key, 0, $iv);
    return $decrypted;
}

// Example usage
$data = "Sensitive data to encrypt";
$key = "a1b2c3d4e5f6g7h8i9j0k1l2m3n4o5p"; // 32-character key for AES-256
$iv = openssl_random_pseudo_bytes(16); // Initialization Vector (IV) for AES-256-CBC

$encrypted = encryptData($data, $key, $iv);
echo "Encrypted: $encrypted\n";

$decrypted = decryptData($encrypted, $key, $iv);
echo "Decrypted: $decrypted\n";

?>
