<x-layout title="Lista de Pessoas e Ramais">
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Local</th>
                <th>Setor</th>
                <th>Ramal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pessoas as $pessoa)
                <tr>
                    <td>
                        <a href="{{ route('pessoas.edit', $pessoa->id) }}">
                            {{ $pessoa->nome }}
                        </a>
                    </td>
                    <td>{{ $pessoa->local }}</td>
                    <td>{{ $pessoa->setor }}</td>
                    <td>
                        @if($pessoa->ramal)
                            <a href="{{ route('ramais.edit', $pessoa->ramal->id) }}">
                                {{ $pessoa->ramal->ramal }}
                            </a>
                        @else
                            Nenhum ramal associado
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
