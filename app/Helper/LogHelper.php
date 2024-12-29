<?php

namespace App\Helper;

use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class LogHelper
{
    public static function logAction($action, $description = null)
    {
        $userId = Auth::id();
        if ($userId) {
            Log::create([
                'user_id' => $userId,
                'action' => $action,
                'description' => $description,
            ]);
        }
    }
}