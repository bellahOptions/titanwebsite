@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address - Admin Access') }}</div>

                <div class="card-body">
                    @if (session('warning'))
                        <div class="alert alert-warning" role="alert">
                            {{ session('warning') }}
                        </div>
                    @endif

                    <div class="alert alert-warning">
                        <strong>Administrator Access Required:</strong> 
                        You must verify your email address before accessing the admin dashboard.
                    </div>

                    <p>Before proceeding to the admin dashboard, please check your email for a verification link.</p>
                    <p>If you did not receive the email,</p>

                    <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                            click here to request another
                        </button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection