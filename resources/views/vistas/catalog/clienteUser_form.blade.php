<form method="POST" id="clientFormClientUsers"
    action="{{ route('cliente.usuario.save') }}">
    @csrf
    <input type="hidden" name="id" id="client_id">

    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Empresa</label>
            <select class="form-control" name="cliente_id" required>
                <option value="">Seleccione un cliente</option>
                @foreach ($clientes as $cliente)
                <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Teléfono</label>
            <input type="text" name="phone" id="phone" class="form-control">
        </div>
    </div>

    <div class="text-end">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>