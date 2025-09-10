<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Property;
use App\Models\Visitor;
use App\Models\Testimonial;

class AdminController extends Controller
{
    // Show admin login form
    public function loginForm()
    {
        return view('admin.login'); // points to resources/views/admin/login.blade.php
    }

    // Handle admin login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'email' => $request->email, 
            'password' => $request->password,
            'is_admin' => 1
        ])) {
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Invalid credentials');
    }

    // Admin dashboard
    public function dashboard()
    {
        return view('admin.dashboard'); // points to resources/views/admin/dashboard.blade.php
    }
    public function index()
{
    // Total daily visitors
    $dailyVisitors = Visitor::whereDate('created_at', today())->count();

    // Total users (excluding admins)
    $totalUsers = User::where('is_admin', 0)->count();

    // Total properties
    $totalProperties = Property::count();

    // Top 5 most viewed properties
    $mostViewedProperties = Property::orderBy('views', 'desc')->take(5)->get();

    // Recent testimonials (latest 5)
    $recentTestimonials = Testimonial::orderBy('created_at', 'desc')->take(5)->get();

    return view('admin.dashboard', compact(
        'dailyVisitors', 
        'totalUsers', 
        'totalProperties', 
        'mostViewedProperties', 
        'recentTestimonials'
    ));
}


    // Manage users
    public function users()
    {
        $users = User::where('is_admin', 0)->paginate(20);
        return view('admin.users', compact('users'));
    }

    public function banUser($id)
    {
        $user = User::findOrFail($id);
        $user->is_banned = true;
        $user->save();

        return back()->with('success', 'User banned successfully.');
    }

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

    // Settings
    public function settings()
    {
        return view('admin.settings');
    }

    public function updateSettings(Request $request)
    {
        // Update contact info etc
    }

    // Testimonials
    public function testimonials()
    {
        $testimonials = Testimonial::paginate(10);
        return view('admin.testimonials', compact('testimonials'));
    }

    public function addTestimonial(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'message' => 'required|string',
        ]);

        Testimonial::create($data);
        return back()->with('success', 'Testimonial added.');
    }
    // Blog Management
public function blogs() {
    $blogs = Blog::latest()->paginate(10);
    return view('admin.blogs', compact('blogs'));
}

public function createBlog() {
    return view('admin.create-blog');
}

public function storeBlog(Request $request) {
    $data = $request->validate([
        'title'=>'required|string|max:255',
        'content'=>'required|string',
    ]);
    $data['author'] = Auth::user()->name;
    Blog::create($data);
    return redirect()->route('admin.blogs')->with('success','Blog added!');
}

public function editBlog($id) {
    $blog = Blog::findOrFail($id);
    return view('admin.edit-blog', compact('blog'));
}

public function updateBlog(Request $request, $id) {
    $blog = Blog::findOrFail($id);
    $data = $request->validate([
        'title'=>'required|string|max:255',
        'content'=>'required|string',
    ]);
    $blog->update($data);
    return redirect()->route('admin.blogs')->with('success','Blog updated!');
}

public function destroyBlog($id) {
    Blog::findOrFail($id)->delete();
    return back()->with('success','Blog deleted!');
}

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
