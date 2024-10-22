<x-layout title="Cadastrar Ramal para {{ $pessoa->nome }}">
    <form action="{{ route('ramais.store') }}" method="post">
        @csrf
        <input type="hidden" name="pessoa_id" value="{{ $pessoa->id }}">

        <div class="mb-3">
            <label for="nome" class="form-label">Funcionário:</label>
            <input type="text" id="nome" class="form-control" value="{{ $pessoa->nome }}" disabled>
        </div>

        <div class="mb-3">
            <label for="ramal" class="form-label">Ramal:</label>
            <input type="text" name="ramal" id="ramal" class="form-control" value="{{ old('ramal') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Associar Ramal</button>
    </form>
</x-layout>
