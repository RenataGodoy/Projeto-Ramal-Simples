<x-layout title="Editar Ramal">
    <form action="{{ route('ramais.update', $ramal->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="pessoa" class="form-label">Pessoa:</label>
            {{-- <input type="text" class="form-control" value="{{ $ramal->pessoa->nome }}" disabled> --}}
        </div>

        <div class="mb-3">
            <label for="ramal" class="form-label">Ramal:</label>
            <input type="text" name="ramal" id="ramal" class="form-control" value="{{ old('ramal', $ramal->ramal) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Ramal</button>
    </form>
</x-layout>
