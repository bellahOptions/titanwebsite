<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use App\Services\SettingsService;

class SettingsController extends Controller
{
    protected $settingsService;

    public function __construct(SettingsService $settingsService)
    {
        $this->settingsService = $settingsService;
    }

    public function index()
    {
        return view('admin.settings', [
            'settings' => $this->settingsService->all()
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'site_name' => 'required|string|max:255',
            'facebook_url' => 'required|url|max:500',
            'x_url' => 'required|url|max:500',
            'youtube_url' => 'required|url|max:500',
            'instagram_url' => 'required|url|max:500',
            'map_url' => 'required|url|max:1000',
            'company_address' => 'required|string|max:1000', // Note: typo preserved from your code
            'auto_approve_properties' => 'required|in:yes,no',
            'status' => 'required|in:active,maintenance',
            'admin_email' => 'required|email|max:255',
            'currency' => 'required|string|max:50',
            'currency_symbol' => 'required|string|max:5',
        ]);

        $this->settingsService->updateSettings($validated);

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }
}