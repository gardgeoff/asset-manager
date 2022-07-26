<x-layout>
    <div class=" d-flex justify-content-center align-items-center w-100 vh-100">
        <div style="width:35%" class="mb-5 d-flex justify-content-center">


        </div>
        <p class="my-4 text-dark h3">Create New User</p>
        <div class="p-md-5 p-sm-3 card w-md-25 w-sm-100">

            <form method="POST" action="{{ route('admin.users.store') }}">
                @include('admin.users.partials.form');
            </form>
        </div>
    </div>
</x-layout>
