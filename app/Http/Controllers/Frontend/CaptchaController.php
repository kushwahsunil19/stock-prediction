<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
class CaptchaController extends Controller
{
   public function generateCaptcha()
{
    // Define characters including special characters
    $characters = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz23456789!@#$%^&*()';
    $captchaCode = substr(str_shuffle($characters), 0, 6); // Generate a random string of 6 characters
    $createdAt = Carbon::now(); // Current time

    // Store the CAPTCHA code and creation time in the session
    session(['captcha_code' => $captchaCode, 'captcha_created_at' => $createdAt]);

    // Generate the CAPTCHA image
    $image = $this->createCaptchaImage($captchaCode);

    return response($image, 200)->header('Content-Type', 'image/png');
}

private function createCaptchaImage($text)
{
    $width = 180;
    $height = 60;

    $image = imagecreatetruecolor($width, $height);
    $bgColor = imagecolorallocate($image, 200, 200, 200); // Light gray background
    $lineColor = imagecolorallocate($image, 150, 150, 150); // Medium gray lines
    $textColor = imagecolorallocate($image, 0, 0, 0); // Black text

    imagefilledrectangle($image, 0, 0, $width, $height, $bgColor);

    // Add random lines
    for ($i = 0; $i < 6; $i++) {
        imageline($image, mt_rand(0, $width), mt_rand(0, $height), mt_rand(0, $width), mt_rand(0, $height), $lineColor);
    }

    // Add random noise
    for ($i = 0; $i < 70; $i++) {
        imagesetpixel($image, mt_rand(0, $width), mt_rand(0, $height), $lineColor);
    }

    // Add slightly distorted text
    $font = public_path('fonts/Roboto-Regular.ttf'); // Ensure you have this font or replace with another

    if (!file_exists($font)) {
        throw new \Exception("Font file not found: $font");
    }

    // Apply moderate text distortion
    $fontSize = 26;
    $angleRange = 20; // Medium angle range for text distortion
    $x = 15;
    $y = 50;

    // Render each character with a slight distortion
    $charSpacing = $width / strlen($text); // Space characters evenly
    $textLength = strlen($text);
    for ($i = 0; $i < $textLength; $i++) {
        $char = $text[$i];
        $charAngle = mt_rand(-$angleRange, $angleRange); // Medium angle for each character
        $charX = $x + ($i * $charSpacing);
        $charY = $y + mt_rand(-5, 5); // Small vertical variation for text

        imagettftext($image, $fontSize, $charAngle, $charX, $charY, $textColor, $font, $char);
    }

    // Optionally add some background noise
    $noiseColor = imagecolorallocate($image, 180, 180, 180); // Slightly darker gray for noise
    for ($i = 0; $i < 40; $i++) {
        imagesetpixel($image, mt_rand(0, $width), mt_rand(0, $height), $noiseColor);
    }

    ob_start();
    imagepng($image);
    imagedestroy($image);
    return ob_get_clean();
}

    
    
}
