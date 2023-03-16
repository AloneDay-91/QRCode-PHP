<?php
require_once 'phpqrcode/qrlib.php';

if (isset($_POST['data'])) {
    $data = $_POST['data'];

    // Générer le QR code
    QRcode::png($data, 'qrcode.png');

    // Afficher le QR code
    echo '<img src="qrcode.png">';
}
