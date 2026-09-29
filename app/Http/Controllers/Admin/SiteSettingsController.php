<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\Settings;
use Illuminate\Http\Request;

class SiteSettingsController extends Controller
{
    /** dot-path (under "site.") => [label, type] */
    protected function fields(): array
    {
        return [
            'tagline' => ['Tagline', 'textarea'],
            'phone' => ['Phone (display, e.g. 9207780808)', 'text'],
            'phone_e164' => ['Phone (tel: link, e.g. +919207780808)', 'text'],
            'email' => ['Email', 'text'],
            'whatsapp' => ['WhatsApp number (digits with country code, e.g. 919207780808)', 'text'],
            'address_full' => ['Corporate address (one line per address line)', 'textarea'],
            'billing_address' => ['Billing address (one line per address line — leave empty to hide it in the footer)', 'textarea'],
            'map_query' => ['Map location (address, or "lat,lng" — used for the embedded map on the Contact page)', 'text'],
            'social.facebook' => ['Facebook URL', 'text'],
            'social.instagram' => ['Instagram URL', 'text'],
            'social.linkedin' => ['LinkedIn URL', 'text'],
            'social.youtube' => ['YouTube URL', 'text'],
            'social.x' => ['X (Twitter) URL', 'text'],
        ];
    }

    public static function formKey(string $path): string
    {
        return str_replace('.', '__', $path);
    }

    public function edit()
    {
        $values = [];
        foreach ($this->fields() as $path => $meta) {
            $values[$path] = config("site.$path");
        }

        return view('admin.settings.edit', ['fields' => $this->fields(), 'values' => $values]);
    }

    public function update(Request $request)
    {
        foreach ($this->fields() as $path => [$label, $type]) {
            $formKey = self::formKey($path);
            $value = $type === 'checkbox' ? $request->boolean($formKey) : $request->input($formKey);
            Settings::put('site', "site.$path", $value);
        }

        return redirect()->route('admin.settings.edit')->with('status', 'Settings updated.');
    }
}
