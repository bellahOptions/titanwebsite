<?php

namespace App\Services;

use App\Models\Settings;

class SettingsService
{
    protected $settings;

    public function __construct()
    {
        $this->loadSettings();
    }

    public function loadSettings()
    {
        // Get the first settings record or create with defaults
        $this->settings = Settings::firstOrCreate([], [
            'site_name' => 'Titan & Equity Resources Limited',
            'facebook_url' => '#',
            'x_url' => '#',
            'youtube_url' => '#',
            'instagram_url' => '#',
            'map_url' => '#',
            'company_address' => '9 Olaoye Segun Str, Ibeju-Lekki, Lagos',
            'auto_approve_properies' => 'no',
            'status' => 'active',
            'admin_email' => 'titanrealtyltd@gmail.com',
            'currency' => 'Naira',
            'currency_symbol' => '₦',
        ]);
    }

    public function get($key)
    {
        return $this->settings->$key ?? null;
    }

    public function all()
    {
        return $this->settings;
    }

    public function updateSettings($data)
    {
        $this->settings->update($data);
        $this->loadSettings(); // Reload settings
        return true;
    }

    // Helper methods
    public function isActive()
    {
        return $this->get('status') === 'active';
    }

    public function isMaintenance()
    {
        return $this->get('status') === 'maintenance';
    }

    public function getAdminEmail()
    {
        return $this->get('admin_email');
    }

    public function getCurrency()
    {
        return $this->get('currency');
    }

    public function getCurrencySymbol()
    {
        return $this->get('currency_symbol');
    }

    public function autoApproveProperties()
    {
        return $this->get('auto_approve_properties') === 'yes';
    }

    public function refresh()
    {
        $this->loadSettings();
        return $this;
    }
}