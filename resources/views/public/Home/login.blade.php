@include('public.Home.header')

<div class="container-fluid login-page">
    <div class="row h-100">
        <div class="col-md-6 p-3 d-flex align-items-center">
            <div class="container p-5 login-form">
                <form class="yourform" action="{{ route('login') }}" method="post">
                    @csrf
                    <h1>Welcome Back!</h1>
                    <p class="mt-3">To keep connected with us, please login using your personal information.</p>
                    <div class="form-group mt-5">
                        <label for="username">Email Address</label>
                        <input type="email" name="username" id="username" class="form-control mb-3" value="{{ old('username') }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control mb-4">
                    </div>
                    <div class="d-flex justify-content-between align-items-center border-1 border-top pt-3">
                        <button class="btn btn-yellow text-uppercase px-5">Sign In</button>
                        <a href="#" class="">Forgot Password</a>
                    </div>
                </form>
                @error('error-message')
                    <div class='alert alert-danger mt-3'>{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div
            class="container h-100 col-md-6 d-flex justify-content-center align-items-center flex-column bg-yellow text-white">
            <img src="{{ asset('images/SPUP LOG IN LOGO.png') }}" alt="..." style="max-height: 400px;">
            <h1 class="text-bold text-dark">Hello, SPUP Alumni!</h1>
            <p class="text-dark">Enter your personal details and start your journey with us.</p>
            <a href="{{ route('register') }}" class="btn btn-dark text-uppercase px-5">Sign Up</a>
        </div>
    </div>
</div>
@include('public.Home.footer')
