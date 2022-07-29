@csrf

<div class="form-outline mb-4">
    @error('name')
        <p class="text-danger">{{ $message }}</p>
    @enderror
    <input value="{{ old('name') }} @isset($asset) {{ $asset->name }} @endisset" name="name"
        type="text" class="form-control" />
    <label class="text-dark ">Asset Name</label>
</div>
<div class="form-outline mb-4">
    @error('category')
        <p class="text-danger">{{ $message }}</p>
    @enderror
    <input value="{{ old('category') }} @isset($asset) {{ $asset->category }} @endisset"
        type="text" name="category" class="form-control" />
    <label class="text-dark form-label" for="email">Asset Category</label>
</div>
<div class="form-outline mb-4">
    <label for="user_id" class="text-dark form-label">Assign to user</label>
    <select name="user_id" class="form-select" aria-label="Default select example">
        <option disabled selected>Open this select menu</option>
        @foreach ($users as $user)
            <option @isset($asset) {{ $asset->user_id === $user->id ? 'selected' : '' }} @endisset
                value="{{ $user->id }}">
                {{ $user->name }}</option>
        @endforeach
    </select>
</div>



<button type="submit" class="btn theme-bg-primary btn-block mb-4">Submit</button>
