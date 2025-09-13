<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Property;
use App\Models\Blog;

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

    // Total users (excluding admins)
    $totalUsers = User::where('is_admin', 0)->count();

    // Total properties
    $totalProperties = Property::count();

    // Top 5 most viewed properties
    $mostViewedProperties = Property::orderBy('views', 'desc')->take(5)->get();


    return view('admin.dashboard', compact(
        'totalUsers', 
        'totalProperties', 
        'mostViewedProperties'
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
