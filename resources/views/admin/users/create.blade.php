<x-layout>
    <div class=" d-flex justify-content-center align-items-center w-100 vh-100">
        <div class=" p-md-5 p-sm-3 card w-md-25 w-sm-100">
            <div class="mb-5 d-flex justify-content-center">
                <img style="width:35%" src="{{ asset('images/logo.png') }}" />
            </div>
            <p class="my-4 text-dark h3">Create New User</p>
            <form method="POST" action="{{ route('admin.users.store') }}">
                @include('admin.users.partials.form', ['create' => true])
            </form>
        </div>
    </div>
</x-layout>
