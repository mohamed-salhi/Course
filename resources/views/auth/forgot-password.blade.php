
@if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
@endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <input type="email" name="email" :value="old('email')" required  class="form-control" id="useremail" placeholder="Enter email">


            </div>
            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>


            <div class="flex items-center justify-end mt-4">

            </div>
        </form>

