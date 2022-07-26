<x-layout>


    <div class=" d-flex justify-content-center align-items-center w-100 vh-100">
        <div class=" p-5 card w-25">
            <form method="POST" action="/users/authenticate">
                @csrf
                <div class="mb-5 d-flex justify-content-center">
                    <!-- Email input -->
                    <img style="width:35%" src="{{ asset('images/logo.png') }}" />
                </div>
                <p class="my-4 text-dark h3">Sign In</p>
                <div class="form-outline mb-4">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input value="{{ old('email') }}"" name="email" type="email" class="form-control" />
                    <label class="text-dark form-label" for="email">Email address</label>

                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input name="password" type="password" class="form-control" />
                    <label class="text-dark form-label" for="password">Password</label>
                </div>

                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">

                </div>

                <!-- Submit button -->
                <button type="submit" class="btn theme-bg-primary btn-block mb-4">Sign in</button>

                <!-- Register buttons -->

            </form>
        </div>
    </div>
</x-layout>
