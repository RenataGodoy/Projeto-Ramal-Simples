<x-layout title="Cadastrar Pessoa">
    <form action="{{ route('pessoas.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}" required>
        </div>

        <div class="mb-3">
            <label for="local" class="form-label">Local:</label>
            <input type="text" name="local" id="local" class="form-control" value="{{ old('local') }}" required>
        </div>

        <div class="mb-3">
            <label for="setor" class="form-label">Setor:</label>
            <input type="text" name="setor" id="setor" class="form-control" value="{{ old('setor') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar Pessoa</button>
    </form>
</x-layout>
