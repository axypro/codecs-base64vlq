<?php

declare(strict_types=1);

namespace axy\codecs\base64vlq\examples;

use axy\codecs\base64vlq\Encoder;

require_once __DIR__ . '/../index.php';

$args = array_slice($_SERVER['argv'], 1);
if (empty($args)) {
    $original = [12345, -12345, 0];
} else {
    $original = array_map('intval', $args);
}

$encoder = new Encoder();

$encoded = $encoder->encode($original);
$decoded = $encoder->decode($encoded);

echo 'Original: ' . print_r($original, true) . PHP_EOL;
echo "Encoded: $encoded\n";
echo 'Decoded: ' . print_r($decoded, true) . PHP_EOL;
