<!-- resources/views/auth/register.blade.php -->

<form method="POST" action="/fun-laravel/public/auth/register">
    {!! csrf_field() !!}

    <div>
        User Name
        <input type="text" name="user_code" value="{{ old('user_code') }}">
    </div>

    <div>
        Password
        <input type="password" name="password">
    </div>

    <div>
        Confirm Password
        <input type="password" name="password_confirmation">
    </div>

    <div>
        <button type="submit">Register</button>
    </div>
</form>