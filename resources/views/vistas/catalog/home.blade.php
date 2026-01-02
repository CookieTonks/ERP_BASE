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
                                data-bs-target="#clientsModal">
                                <i class="bi bi-file-earmark-text me-2"></i> Clientes
                            </a>


                        </div>
                    </div>
                </div>


                <div class="modal fade" id="clientsModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                        <div class="modal-content rounded-4">

                            <div class="modal-header">
                                <h5 class="modal-title fw-bold">Catalogo de Clientes</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">

                                <!-- BOTÓN AGREGAR -->
                                <div class="mb-3 text-end">
                                    <button type="button" class="btn btn-primary" onclick="newClient()">
                                        + Nuevo cliente
                                    </button>
                                </div>

                                <!-- FORMULARIO -->
                                <div id="clientForm" class="mb-4 d-none">
                                    @include('vistas.catalog.cliente_form')
                                </div>

                                <!-- LISTA -->
                                <table class="table table-hover align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>RFC</th>
                                            <th>Email</th>
                                            <th>Teléfono</th>
                                            <th class="text-end">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($clientes as $cliente)
                                        <tr>
                                            <td>{{ $cliente->name }}</td>
                                            <td>{{ $cliente->rfc }}</td>
                                            <td>{{ $cliente->email }}</td>
                                            <td>{{ $cliente->phone }}</td>
                                            <td class="text-end">

                                                <button type="button"
                                                    class="btn btn-sm btn-outline-primary"
                                                    onclick='editClient(@json($cliente))'>
                                                    Editar
                                                </button>

                                                <form method="POST"
                                                    action="{{ route('clientes.destroy', $cliente->id) }}"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('¿Eliminar cliente?')">
                                                        Eliminar
                                                    </button>
                                                </form>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>


                        </div>
                    </div>
                </div>
            </div>





        </div>



    </div>

    <script>
        function newClient() {
            const form = document.getElementById('clientForm');
            form.classList.remove('d-none');

            document.getElementById('clientFormAction').reset();
            document.getElementById('client_id').value = '';

            document.getElementById('clientFormAction').action =
                "{{ route('administracion.cliente') }}";
        }

        function editClient(cliente) {
            const form = document.getElementById('clientForm');
            form.classList.remove('d-none');

            document.getElementById('client_id').value = cliente.id;
            document.getElementById('name').value = cliente.name ?? '';
            document.getElementById('rfc').value = cliente.rfc ?? '';
            document.getElementById('email').value = cliente.email ?? '';
            document.getElementById('phone').value = cliente.phone ?? '';
            document.getElementById('address').value = cliente.address ?? '';

            document.getElementById('clientFormAction').action =
                `/clientes/${cliente.id}/update`;
        }
    </script>




    </div>




</x-app-layout>