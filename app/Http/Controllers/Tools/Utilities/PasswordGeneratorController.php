<?php

namespace App\Http\Controllers\Tools\Utilities;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class PasswordGeneratorController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'password-generator')->firstOrFail();
        return view('tools.utility.password-generator', compact('tool'));
    }

    public function generate(Request $request)
    {
        $length = $request->input('length', 16);
        $includeUppercase = $request->input('uppercase', true);
        $includeLowercase = $request->input('lowercase', true);
        $includeNumbers = $request->input('numbers', true);
        $includeSymbols = $request->input('symbols', true);

        $characters = '';
        if ($includeLowercase)
            $characters .= 'abcdefghijklmnopqrstuvwxyz';
        if ($includeUppercase)
            $characters .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        if ($includeNumbers)
            $characters .= '0123456789';
        if ($includeSymbols)
            $characters .= '!@#$%^&*()_+-=[]{}|;:,.<>?';

        $password = '';
        $charactersLength = strlen($characters);
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[random_int(0, $charactersLength - 1)];
        }

        $strength = $this->calculatePasswordStrength($password);

        return response()->json([
            'success' => true,
            'password' => $password,
            'strength' => $strength
        ]);
    }

    private function calculatePasswordStrength($password)
    {
        $strength = 0;
        $length = strlen($password);

        // Length
        if ($length >= 8)
            $strength += 20;
        if ($length >= 12)
            $strength += 20;
        if ($length >= 16)
            $strength += 10;

        // Complexity
        if (preg_match('/[a-z]/', $password))
            $strength += 15;
        if (preg_match('/[A-Z]/', $password))
            $strength += 15;
        if (preg_match('/[0-9]/', $password))
            $strength += 10;
        if (preg_match('/[^a-zA-Z0-9]/', $password))
            $strength += 10;

        return min($strength, 100);
    }
}
