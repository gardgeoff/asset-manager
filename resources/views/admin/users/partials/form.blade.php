@csrf

<div class="form-outline mb-4">
    @error('name')
        <p class="text-danger">{{ $message }}</p>
    @enderror
    <input value="{{ old('name') }} @isset($user) {{ $user->name }} @endisset" name="name"
        type="text" class="form-control" />
    <label class="text-dark name" for="form2Example1">Name</label>

</div>
<div class="form-outline mb-4">
    @error('email')
        <p class="text-danger">{{ $message }}</p>
    @enderror
    <input value="{{ old('email') }} @isset($user) {{ $user->email }} @endisset" name="email"
        type="email" class="form-control" />
    <label class="text-dark form-label" for="email">Email address</label>

</div>
@isset($create)
    <div class="form-outline mb-4">
        @error('password')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <input name="password" type="password" class="form-control" />
        <label class="text-dark form-label" for="password">Password</label>
    </div>
@endisset
<div class="mb-4">
    @foreach ($roles as $role)
        <div class="form-check">
            <input class="form-check-input" name="roles[]" type="checkbox" value="{{ $role->id }}"
                @isset($user) @if (in_array($role->id, $user->roles->pluck('id')->toArray())) checked @endif
            id="{{ $role->name }}" @endisset>
        <label class="form-check-label" for="{{ $role->name }}">{{ $role->name }}</label>
    </div>
@endforeach
</div>

<button type="submit" class="btn theme-bg-primary btn-block mb-4">Submit</button>
