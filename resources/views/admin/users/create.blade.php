<x-layout>
    <div class=" d-flex justify-content-center align-items-center w-100 vh-100">
<<<<<<< HEAD
        <div style="width: 35%" class="p-md-5 p-sm-3 card ">

            <p class="my-4 text-dark h3">Create New User</p>
            <form method="POST" action="{{ route('admin.users.store') }}">
                @include('admin.users.partials.form', ['create' => true]);
=======
        <div class=" p-md-5 p-sm-3 card w-md-25 w-sm-100">
            <form method="POST" action="{{ route('admin.users.store') }}">
                @include('admin.users.partials.form');
>>>>>>> 86d9bcd55c2642c3c670eb693dcb799127016c8e
            </form>
        </div>
    </div>
</x-layout>
