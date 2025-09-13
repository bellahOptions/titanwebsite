
    // Total properties
    $totalProperties = Property::count();

    // Top 5 most viewed properties
    $mostViewedProperties = Property::orderBy('views', 'desc')->take(5)->get();


    // Manage properties
    public function properties()
    {
        $properties = Property::paginate(20);
        return view('admin.properties', compact('properties'));
    }

    public function createProperty()
    {
        return view('admin.create-property');
    }

    public function storeProperty(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'features' => 'nullable|string',
            'property_type' => 'required|string',
            'listing_price' => 'required|numeric',
            'sale_lease_price' => 'nullable|numeric',
            'lease_term' => 'nullable|string',
            'address' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('properties', 'public');
        }

        Property::create($data);
        return redirect()->route('admin.properties')->with('success', 'Property added successfully.');
    }

    public function editProperty($id)
    {
        $property = Property::findOrFail($id);
        return view('admin.edit-property', compact('property'));
    }

    public function updateProperty(Request $request, $id)
    {
        $property = Property::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'features' => 'nullable|string',
            'property_type' => 'required|string',
            'listing_price' => 'required|numeric',
            'sale_lease_price' => 'nullable|numeric',
            'lease_term' => 'nullable|string',
            'address' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('properties', 'public');
        }

        $property->update($data);
        return redirect()->route('admin.properties')->with('success', 'Property updated successfully.');
    }

    public function destroyProperty($id)
    {
        Property::findOrFail($id)->delete();
        return back()->with('success', 'Property deleted successfully.');
    }







# ParseError - Internal Server Error
Unmatched '}'

PHP 8.2.12
Laravel 12.26.4
localhost

## Stack Trace

0 - C:\xampp\htdocs\titan\routes\web.php:57
1 - C:\xampp\htdocs\titan\vendor\laravel\framework\src\Illuminate\Routing\Router.php:526
2 - C:\xampp\htdocs\titan\vendor\laravel\framework\src\Illuminate\Routing\Router.php:480
3 - C:\xampp\htdocs\titan\vendor\laravel\framework\src\Illuminate\Routing\RouteRegistrar.php:206
4 - C:\xampp\htdocs\titan\vendor\laravel\framework\src\Illuminate\Foundation\Configuration\ApplicationBuilder.php:248
5 - C:\xampp\htdocs\titan\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php:36
6 - C:\xampp\htdocs\titan\vendor\laravel\framework\src\Illuminate\Container\Util.php:43
7 - C:\xampp\htdocs\titan\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php:84
8 - C:\xampp\htdocs\titan\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php:35
9 - C:\xampp\htdocs\titan\vendor\laravel\framework\src\Illuminate\Container\Container.php:836
10 - C:\xampp\htdocs\titan\vendor\laravel\framework\src\Illuminate\Foundation\Support\Providers\RouteServiceProvider.php:162
11 - C:\xampp\htdocs\titan\vendor\laravel\framework\src\Illuminate\Foundation\Support\Providers\RouteServiceProvider.php:59
12 - C:\xampp\htdocs\titan\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php:36
13 - C:\xampp\htdocs\titan\vendor\laravel\framework\src\Illuminate\Container\Util.php:43
14 - C:\xampp\htdocs\titan\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php:84
15 - C:\xampp\htdocs\titan\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php:35
16 - C:\xampp\htdocs\titan\vendor\laravel\framework\src\Illuminate\Container\Container.php:836
17 - C:\xampp\htdocs\titan\vendor\laravel\framework\src\Illuminate\Support\ServiceProvider.php:143
18 - C:\xampp\htdocs\titan\vendor\laravel\framework\src\Illuminate\Foundation\Application.php:1153
19 - C:\xampp\htdocs\titan\vendor\laravel\framework\src\Illuminate\Foundation\Application.php:1131
20 - C:\xampp\htdocs\titan\vendor\laravel\framework\src\Illuminate\Foundation\Application.php:1130
21 - C:\xampp\htdocs\titan\vendor\laravel\framework\src\Illuminate\Foundation\Bootstrap\BootProviders.php:17
22 - C:\xampp\htdocs\titan\vendor\laravel\framework\src\Illuminate\Foundation\Application.php:341
23 - C:\xampp\htdocs\titan\vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php:186
24 - C:\xampp\htdocs\titan\vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php:170
25 - C:\xampp\htdocs\titan\vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php:144
26 - C:\xampp\htdocs\titan\vendor\laravel\framework\src\Illuminate\Foundation\Application.php:1219
27 - C:\xampp\htdocs\titan\public\index.php:20

## Request

GET /properties

## Headers

* **host**: localhost
* **connection**: keep-alive
* **cache-control**: max-age=0
* **sec-ch-ua**: "Not;A=Brand";v="99", "Google Chrome";v="139", "Chromium";v="139"
* **sec-ch-ua-mobile**: ?0
* **sec-ch-ua-platform**: "Windows"
* **upgrade-insecure-requests**: 1
* **user-agent**: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36
* **accept**: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7
* **sec-fetch-site**: same-origin
* **sec-fetch-mode**: navigate
* **sec-fetch-user**: ?1
* **sec-fetch-dest**: document
* **referer**: http://localhost/titan/public/properties
* **accept-encoding**: gzip, deflate, br, zstd
* **accept-language**: en-US,en;q=0.9
* **cookie**: XSRF-TOKEN=eyJpdiI6IllVZ1hiMVpSc2hUUFEyTFZvUkJEZUE9PSIsInZhbHVlIjoiUG1OaHM5eEI2dGpuRnNsMG5xNDYydVpJR2JKTUNtNkExMkNPamlkQ3M1Z2ZiZzRGNythbEtSeHhYK1RLZXBlU2hpSGhCNHg5bHdzK0FQWlR5ZU4wMmY1VHBwaEFBQ3AvRXFxMWE2RGJodDZrYUNVdmtpbFUvOEdPZ2llRzVPU3UiLCJtYWMiOiJkMGJiOWY4MzlmZTU2NTQzMGEwNTEyNzY3YmU4NWUxMGM3ZDFiYTUwYjdjYzI3MzgxMDc0ZDZhZTAzN2FmNjljIiwidGFnIjoiIn0%3D; laravel-session=eyJpdiI6IkpIQnBJdDhJSjJ1bjBHbGhhcDhDTUE9PSIsInZhbHVlIjoiT2RiMW5zRlBlanR5Q1N6SmFlNzZRUE4xWTVwbldYZGF4Um1qR0owampKM2dNdHVwWFk1dW41bk1KeE41a3lLcmZUNVBidHhGOUlRbno2WkNSNlBOZ2hrckxNK3pMa3BJSHNjcUE3Nktza2drZmNTZ3VjYlVhUHo5VWl0Mi84OXUiLCJtYWMiOiJkZmVmODQxNjQ0MjQzOTllZGUxZDlkMDcwZDEzZDZlYzc1ZmUwNGVmNDU4ZDVjN2M3MzMzNGEwNmQyNmNiN2M5IiwidGFnIjoiIn0%3D

## Route Context

No routing data available.

## Route Parameters

No route parameter data available.

## Database Queries

No database queries detected.
