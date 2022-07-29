<x-layout>
    <div class="py-5 d-flex justify-content-center align-items-center w-100 ">
        <div class=" p-5 card w-50">
            <form method="POST" action="/users">
                @csrf
                <div class="mb-5 d-flex justify-content-center">
                    <!-- Email input -->
                    <img style="width:25%" src="{{ asset('images/logo.png') }}" />
                </div>
                <p class="my-4 text-dark h3">Register</p>
                <div class="form-outline mb-4">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input value="{{ old('name') }}"" name="name" type="text" class="form-control" />
                    <label class="text-dark name" for="form2Example1">Name</label>

                </div>
                <div class="form-outline mb-4">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input value="{{ old('email') }}"" name="email" type="email" class="form-control" />
                    <label class="text-dark form-label" for="email">Email address</label>

                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input name="password" type="password" class="form-control" />
                    <label class="text-dark form-label" for="password">Password</label>
                </div>
                <div class="form-outline mb-4">

                    <input name="password_confirmation" type="password" class="form-control" />
                    <label class="text-dark form-label" for="password_confirmation">Confirm Password</label>
                </div>

                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">

                </div>

                <!-- Submit button -->
                <button type="submit" class="btn theme-bg-primary btn-block mb-4">Register</button>

                <!-- Register buttons -->

            </form>
        </div>
    </div>
</x-layout>
