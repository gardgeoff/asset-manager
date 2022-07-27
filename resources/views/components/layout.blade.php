<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="//unpkg.com/alpinejs" defer></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <title>Asset Manager</title>
</head>

<body class="w-100">

    <body>

        <nav class="px-5 navbar navbar-expand-sm bg-dark navbar-dark ">
            <a class="navbar-brand" href="{{ url('/') }}">Asset Manager</a>
            @can('logged-in')
                <form class="ml-auto" method="POST" action="/logout">
                    @csrf
                    <button class="btn btn-sm theme-bg-primary">Log Out</button>

                </form>
            @endcan
            @cannot('logged-in')
                <div class="ml-auto">
                    <a href={{ url('/login') }} class="nav-link text-light">Log In</a>

                </div>
            @endcannot
        </nav>
        @can('logged-in')
            <nav class="px-5 shadow-sm  navbar navbar-expand-sm bg-light navbar-light">

                <a class="float-start bottom-nav-link nav-link" href="{{ url('/') }}">Assets</a>
                @can('is-admin')
                    <a class="float-start bottom-nav-link nav-link" href="{{ route('admin.users.index') }}">Users</a>
                @endcan
            </nav>
        @endcan
        <main>
            {{ $slot }}
        </main>
    </body>
</body>

</html>
