<x-layout>
    <div class=" d-flex justify-content-center align-items-center w-100 vh-100">
        <div class=" p-md-5 p-sm-3 card w-50 w-sm-100">
            <div class=" d-flex justify-content-center">
            </div>
            <p class="my-5 text-dark h3">Edit Asset</p>
            <form method="POST" action="{{ route('admin.assets.update', $asset->id) }}">
                @method('PATCH')
                @include('admin.assets.partials.form')
            </form>
        </div>
    </div>
</x-layout>
