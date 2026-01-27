<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Http\Request;

$email = '4wellsolutions@gmail.com';
$password = 'pass@word';

echo "Testing Protected API with Basic Auth (Email/Password)...\n";

$request = Request::create('/api/blogs', 'GET');
$request->headers->set('Authorization', 'Basic ' . base64_encode("$email:$password"));
$request->headers->set('Accept', 'application/json');

$response = $app->handle($request);

echo "Status code (expected 200): " . $response->getStatusCode() . "\n";

if ($response->getStatusCode() === 200) {
    echo "SUCCESS: API accessed with email/password.\n";
} else {
    echo "FAILURE: API access failed.\n";
    echo $response->getContent();
}

echo "\nTesting API with WRONG password...\n";
$badRequest = Request::create('/api/blogs', 'GET');
$badRequest->headers->set('Authorization', 'Basic ' . base64_encode("$email:wrongpassword"));
$badRequest->headers->set('Accept', 'application/json');

$response = $app->handle($badRequest);
echo "Status code (expected 401): " . $response->getStatusCode() . "\n";
