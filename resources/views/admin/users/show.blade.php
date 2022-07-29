<x-layout>

    <div class="row">
        <div class=" my-5 col-12">
            <h1 class="float-start">Assets assigned to {{$user->name}}</h1>
         
        </div>
    </div>

    <div class="table-card card">
        <table class=" table table-striped table-hover">
            <thead>


                <tr>
                    <th class="sortable" scope="col">@sortablelink('id')</th>
                    <th class="sortable" scope="col">@sortablelink('name')</th>
                    <th class="sortable" scope="col">@sortablelink('category')</th>
                    <th scope="col">Assigned To</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assets as $asset)
                    <tr>
                        <th scope="row">{{ $asset->id }}</th>
                        <td>{{ $asset->name }}</td>
                        <td>{{ $asset->category }}</td>

                        <td>{{ !$asset->user_id ? 'no user' : $asset->user->name }}</td>
                        <td><a href="{{ route('admin.assets.edit', ['asset' => $asset->id]) }}"><i
                                    class="mx-3 fa-solid fa-pencil"></i></a>
                            <form class="d-inline" method="POST"
                                action={{ route('admin.assets.destroy', ['asset' => $asset->id]) }}>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-no-style submit"> <i
                                        class="pointer text-danger fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
             {{ $assets->links() }}
   
</x-layout>
