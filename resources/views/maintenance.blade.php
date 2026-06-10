<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Maintenance - {{ config('app.name', 'Laravel') }}</title>
    <style>
        body { 
            font-family: 'Arial', sans-serif; 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #333;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .maintenance-container {
            background: white;
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            text-align: center;
            max-width: 500px;
            width: 90%;
        }
        h1 { 
            color: #e74c3c; 
            margin-bottom: 1rem;
            font-size: 2.5rem;
        }
        p { 
            font-size: 1.1rem; 
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }
        .admin-login {
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid #eee;
        }
        .btn {
            background: #3498db;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 1rem;
        }
        .btn:hover {
            background: #2980b9;
        }
    </style>
</head>
<body>
    <div class="maintenance-container">
        <h1>🚧 Site Maintenance</h1>
        <p>We're currently performing scheduled maintenance. We'll be back online shortly.</p>
        <p>Thank you for your patience.</p>
        
        @if(auth()->check())
            <div class="admin-login">
                <p>You are logged in as an administrator.</p>
                <a href="{{ url('/admin') }}" class="btn">Go to Admin Panel</a>
                <form method="POST" action="{{ route('logout') }}" style="display: inline-block; margin-left: 10px;">
                    @csrf
                    <button type="submit" class="btn" style="background: #95a5a6;">Logout</button>
                </form>
            </div>
        @else
            <div class="admin-login">
                <p>Administrator access:</p>
                <a href="{{ route('login') }}" class="btn">Admin Login</a>
            </div>
        @endif
        
        <div style="margin-top: 2rem; font-size: 0.9rem; color: #7f8c8d;">
            <p>If this is an emergency, please contact: <strong>{{ app(App\Services\SettingsService::class)->getAdminEmail() }}</strong></p>
        </div>
    </div>
</body>
</html>