@extends('auth.register')
@section('register')

    <div class="wrapper-page">
        <div class="card">
            <div class="card-body">

                <div class="auth-logo">
                    <h3 class="text-center">
                        <h1 class="text-center text-info">Vega Wep</h1>
                    </h3>
                </div>

                <div class="p-3">
                    <h4 class="text-muted font-size-18  text-center">Free Register</h4>
                    <p class="text-muted text-center">Get your free Agroxa account now.</p>
                    @if ($errors->any())
                        <div class="mb-4">
                            <div class="font-medium text-red-600">
                                {{ __('Whoops! Something went wrong.') }}
                            </div>

                            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="form-horizontal " method="post" action="{{route('register')}}">
@csrf
                        <div class="mb-3">
                            <label class="form-label" for="username">Username</label>
                            <input type="text" name="name" :value="old('name')" required  class="form-control" id="username" placeholder="Enter username">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="useremail">Email</label>
                            <input type="email" name="email" :value="old('email')" required  class="form-control" id="useremail" placeholder="Enter email">
                        </div>



                        <div class="mb-3">
                            <label class="form-label" for="userpassword">Password</label>
                            <input type="password"  name="password"  required class="form-control" id="userpassword" placeholder="Enter password">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="userpassword">Password</label>
                            <input type="password"  name="password_confirmation" required  class="form-control" id="userpassword" placeholder="Enter password">
                        </div>

                        <div class="mb-3 row">
                            <div class="col-12 text-end">
                                <button class="btn btn-primary w-md waves-effect waves-light"
                                        type="submit">Register</button>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-12">
                                <p class="font-size-14 text-muted mb-0">By registering you agree to the Agroxa <a href="#"
                                                                                                                  class="text-primary">Terms of Use</a></p>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="text-center">
            <p class="text-muted">Already have an account ? <a href="{{route('login')}}" class="text-white"> Login </a> </p>
            <p class="text-muted">©
                <script>document.write(new Date().getFullYear())</script> Agroxa. Crafted with <i
                    class="mdi mdi-heart text-primary"></i> by Themesbrand
            </p>
        </div>
    </div>
@endsection
