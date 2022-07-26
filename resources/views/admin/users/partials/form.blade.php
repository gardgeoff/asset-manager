@csrf

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
<div class="form-outline mb-4">
    @error('password')
        <p class="text-danger">{{ $message }}</p>
    @enderror
    <input name="password" type="password" class="form-control" />
    <label class="text-dark form-label" for="password">Password</label>
</div>
<div class="mb-4">
    @foreach ($roles as $role)
        <div class="form-check">
            <input class="form-check-input" name="roles[]" type="checkbox" value="{{ $role->id }}"
                id="{{ $role->name }}">
            <label class="form-check-label" for="{{ $role->name }}">{{ $role->name }}</label>
        </div>
    @endforeach
</div>
<button type="submit" class="btn theme-bg-primary btn-block mb-4">Register</button>
