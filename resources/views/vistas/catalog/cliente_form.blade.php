<form method="POST" id="clientFormAction"
    action="{{ route('administracion.cliente') }}">
    @csrf
    <input type="hidden" name="id" id="client_id">

    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">RFC</label>
            <input type="text" name="rfc" id="rfc" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Teléfono</label>
            <input type="text" name="phone" id="phone" class="form-control">
        </div>

        <div class="col-12 mb-3">
            <label class="form-label">Dirección</label>
            <textarea name="address" id="address"
                class="form-control" rows="2"></textarea>
        </div>
    </div>

    <div class="text-end">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>