<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function showPaymentReceipt($filename)
    {
        $path = 'payment_receipts/' . $filename;

        if (!Storage::disk('private')->exists($path)) {
            abort(404);
        }

        $file = Storage::disk('private')->get($path);
        $type = Storage::disk('private')->mimeType($path);

        return response($file, 200)->header('Content-Type', $type);
    }

    public function showImageRoom($filename)
    {
        $path = 'room_images/' . $filename;

        if (!Storage::disk('public')->exists($path)) {
            abort(404);
        }

        $file = Storage::disk('public')->get($path);
        $type = Storage::disk('public')->mimeType($path);

        return response($file, 200)->header('Content-Type', $type);
    }
}
