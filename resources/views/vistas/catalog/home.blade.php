<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    </x-slot>
    <div class="container">
        <div class="py-5">
            <div class="row">
                <!-- Módulo 1 -->
                <div class="col-12 col-sm-4">
                    <div class="card shadow rounded h-100 d-flex align-items-center justify-content-center">
                        <div class="card-body text-center">
                            <a href="#"
                                class="text-decoration-none text-dark fw-bold fs-5"
                                data-bs-toggle="modal"
                                data-bs-target="#createClientModal">
                                <i class="bi bi-file-earmark-text me-2"></i> Clientes
                            </a>

                        </div>
                    </div>
                </div>


                <div class="modal fade" id="createClientModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content rounded-4">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold">Alta de Cliente</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <form method="POST" action="{{route('administracion.cliente')}}">
                                @csrf

                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Nombre</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">RFC</label>
                                        <input type="rfc" name="rfc" class="form-control">
                                    </div>


                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Teléfono</label>
                                        <input type="text" name="phone" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Dirección</label>
                                        <textarea name="address" class="form-control" rows="2"></textarea>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Cancelar
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        Guardar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <!-- Módulo 2 -->






                <!-- Módulo 3 -->


            </div>



        </div>

    </div>


</x-app-layout>