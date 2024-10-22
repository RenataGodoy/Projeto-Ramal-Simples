<x-layout title="Lista de Pessoas e Ramais">
    <form method="GET" action="{{ route('pessoas.index') }}" class="mb-3">
        <div class="row">
            <div class="col-md-3">
                <input type="text" name="nome" class="form-control" placeholder="Nome" value="{{ request('nome') }}">
            </div>
            <div class="col-md-3">
                <input type="text" name="local" class="form-control" placeholder="Local" value="{{ request('local') }}">
            </div>
            <div class="col-md-3">
                <input type="text" name="setor" class="form-control" placeholder="Setor" value="{{ request('setor') }}">
            </div>
            <div class="col-md-3">
                <input type="text" name="ramal" class="form-control" placeholder="Ramal" value="{{ request('ramal') }}">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Local</th>
                <th>Setor</th>
                <th>Ramal</th>
                @auth
                    <th>Ações</th>
                @endauth
            </tr>
        </thead>
        <tbody>
            @foreach($pessoas as $pessoa)
                <tr>
                    <td>
                        @auth
                            <a href="{{ route('pessoas.edit', $pessoa->id) }}">
                                {{ $pessoa->nome }}
                            </a>
                        @else
                            {{ $pessoa->nome }}
                        @endauth
                    </td>
                    <td>{{ $pessoa->local }}</td>
                    <td>{{ $pessoa->setor }}</td>
                    <td>
                        @if($pessoa->ramal)
                            @auth
                                <a href="{{ route('ramais.edit', $pessoa->ramal->id) }}">
                                    {{ $pessoa->ramal->ramal }}
                                </a>
                            @else
                                {{ $pessoa->ramal->ramal }}
                            @endauth
                        @else
                            Nenhum ramal associado
                        @endif
                    </td>        
                    @auth
                        <td>
                            <form action="{{ route('pessoas.destroy', $pessoa->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </td>
                    @endauth        
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
