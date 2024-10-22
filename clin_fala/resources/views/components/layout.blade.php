<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de ramais</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <nav class="navbar expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a href="{{ route('pessoas.index')}}" class="navbar-brand">Homme</a>
            @auth
            <a href="{{ route('pessoas.create') }}" class="nav-link me-3">Cadastrar Novo Ramal</a>
            @endauth
            @auth
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Sair</button>
            </form>
            @endauth
            @guest
            <a href="{{ route('login') }}"> Entrar </a>
            @endguest
        </div>

    </nav>    

    <div class="container mt-4">
        {{ $slot }} 
    </div>
</body>
</html>