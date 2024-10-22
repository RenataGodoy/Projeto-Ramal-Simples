<x-layout title="Editar Pessoa">
    <form action="{{ route('pessoas.update', $pessoa->id) }}" method="post">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $pessoa->nome) }}" required>
        </div>

        <div class="mb-3">
            <label for="local" class="form-label">Local:</label>
            <input type="text" name="local" id="local" class="form-control" value="{{ old('local', $pessoa->local) }}" required>
        </div>

        <div class="mb-3">
            <label for="setor" class="form-label">Setor:</label>
            <input type="text" name="setor" id="setor" class="form-control" value="{{ old('setor', $pessoa->setor) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Pessoa</button>
    </form>
</x-layout>
