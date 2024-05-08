<?php

use Carbon\Carbon;

function changeFormatDate($date)
{
    if (!$date) return null;
    $carbonDate = Carbon::createFromFormat('d-m-Y', $date);
    return $carbonDate->format('Y-m-d');
}

function backChangeFormatDate($date)
{
    if (!$date) return null;
    $carbonDate = Carbon::parse($date);
    return $carbonDate->format('d-m-Y');
}

function backChangeFormatDateTime($datetime)
{
    // from Y-m-dTh:i:s
    if (!$datetime) return null;
    $carbonDateTime = Carbon::parse($datetime);
    return $carbonDateTime->format('d-m-Y H:i');
}

function dateTimeToFormatDate($date)
{
    // Parse the original date using Carbon
    $carbonDate = Carbon::parse($date);
    // Format the date as "F, d Y" (month, day, year)
    $formattedDate = $carbonDate->format('l, d F Y');
    return $formattedDate;
}

function encryptSignatureResetPassword($value)
{
    // return openssl_encrypt($value, 'AES-128-CBC', env('RESET_PASSWORD_KEY', 'KAI-ESA'), 0, '1234567891011121');
    $cipher = "AES-256-CBC";
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext = openssl_encrypt($value, $cipher, env('RESET_PASSWORD_KEY', 'KAI-ESA'), OPENSSL_RAW_DATA, $iv);
    $hmac = hash_hmac('sha256', $ciphertext, env('RESET_PASSWORD_KEY', 'KAI-ESA'), true);
    return base64_encode($iv . $hmac . $ciphertext);
}

function decryptSignatureResetPassword($valueEncrpt)
{
    $cipher = "AES-256-CBC";
    $c = base64_decode($valueEncrpt);
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = substr($c, 0, $ivlen);
    $hmac = substr($c, $ivlen, $sha2len = 32);
    $ciphertext = substr($c, $ivlen + $sha2len);
    $original_plaintext = openssl_decrypt($ciphertext, $cipher, env('RESET_PASSWORD_KEY', 'KAI-ESA'), OPENSSL_RAW_DATA, $iv);
    $calcmac = hash_hmac('sha256', $ciphertext, env('RESET_PASSWORD_KEY', 'KAI-ESA'), true);
    if (hash_equals($hmac, $calcmac)) {
        return $original_plaintext;
    }
    return false;
}

/*
 * return true when have value as superadmin or false
 */
function isUserAsSuperadmin()
{
    return in_array("Superadmin", session('userdata')['role']);
}
