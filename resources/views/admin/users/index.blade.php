<x-layout>
    <div class="container">
        <div class="row">
            <div class=" my-5 col-12">
                <h1 class="float-start">Users</h1>
                <a class="float-end btn btn-sm btn-success" href={{ route('admin.users.create') }} role="button">Create
                </a>
            </div>
        </div>

        <div class="card">

            <table class=" table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a class="btn btn-sm theme-bg-secondary" href={{ route('admin.users.edit', $user->id) }}
                                    role="button">Edit </a>
                                <button type="button" class="btn btn-sm theme-bg-primary"
                                    onClick="event.preventDefault(); document.getElementById('delete-user-form-{{ $user->id }}').submit();">Delete</button>
                                <form method="POST" id="delete-user-form-{{ $user->id }}"
                                    action="{{ route('admin.users.destroy', $user->id) }}" style="display:none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
</x-layout>