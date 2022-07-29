<x-layout>
    <div class="row">
        <div class=" my-4 col-12">
            <h1 class="float-start">My Assets</h1>

        </div>
    </div>
    <div class=" table-card card">

        <table class=" table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Asset ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($assets as $asset)
                    <tr>
                        <th scope="row">{{ $asset->id }}</th>
                        <td>{{ $asset->name }}</td>
                        <td>{{ $asset->category }}</td>


                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $assets->links() }}
    </div>


</x-layout>
