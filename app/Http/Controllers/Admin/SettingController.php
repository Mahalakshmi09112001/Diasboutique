<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function general()
    {
        // Your logic for the general method
        return view('admin.settings.general'); // Example: Return a view for general settings
    }
}
