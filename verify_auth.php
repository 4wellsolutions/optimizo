<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// 1. Ensure a user exists
$email = 'test_api@example.com';
$password = 'password123';
$user = User::firstOrCreate(
    ['email' => $email],
    ['name' => 'Test API', 'password' => Hash::make($password)]
);

echo "User: $email / $password\n";

// 2. Test Login API
echo "\nTesting Login API...\n";
$loginRequest = Request::create('/api/login', 'POST', [
    'email' => $email,
    'password' => $password
]);
$response = $app->handle($loginRequest);
$loginData = json_decode($response->getContent(), true);

if (isset($loginData['access_token'])) {
    $token = $loginData['access_token'];
    echo "SUCCESS: Logged in. Token: " . substr($token, 0, 10) . "...\n";
} else {
    echo "FAILURE: Could not login.\n";
    print_r($loginData);
    exit;
}

// 3. Test Protected API (Blogs Index)
echo "\nTesting Protected API (without token)...\n";
$unauthRequest = Request::create('/api/blogs', 'GET');
$response = $app->handle($unauthRequest);
echo "Status code (expected 401 or redirect): " . $response->getStatusCode() . "\n";

echo "\nTesting Protected API (with token)...\n";
$authRequest = Request::create('/api/blogs', 'GET');
$authRequest->headers->set('Authorization', 'Bearer ' . $token);
$authRequest->headers->set('Accept', 'application/json');
$response = $app->handle($authRequest);
echo "Status code (expected 200): " . $response->getStatusCode() . "\n";

if ($response->getStatusCode() === 200) {
    echo "SUCCESS: Protected API accessed with token.\n";
} else {
    echo "FAILURE: Protected API access failed.\n";
    echo $response->getContent();
}

// Clean up user
// $user->delete();
