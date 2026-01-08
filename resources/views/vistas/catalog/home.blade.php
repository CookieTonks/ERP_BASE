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

                <div class="col-12 col-sm-4">
                    <div class="card shadow rounded h-100 d-flex align-items-center justify-content-center">
                        <div class="card-body text-center">
                            <a href="#"
                                class="text-decoration-none text-dark fw-bold fs-5"
                                data-bs-toggle="modal"
                                data-bs-target="#clientUsersModal">
                                <i class="bi bi-file-earmark-text me-2"></i> Usuario Cliente
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
                                <div id="clientFormClientes" class="mb-4 d-none">
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
                                                <form method="POST"
                                                    action="{{ route('cliente.destroy', $cliente->id) }}"
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

                <div class="modal fade" id="clientUsersModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                        <div class="modal-content rounded-4">

                            <div class="modal-header">
                                <h5 class="modal-title fw-bold">Catalogo de Usuarios de Cliente</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">

                                <!-- BOTÓN AGREGAR -->
                                <div class="mb-3 text-end">
                                    <button type="button" class="btn btn-primary" onclick="newClientUser()">
                                        + Nuevo Usuario de Cliente
                                    </button>
                                </div>

                                <!-- FORMULARIO -->
                                <div id="clientFormClientUsers" class="mb-4 d-none">
                                    @include('vistas.catalog.clienteUser_form')
                                </div>

                                <!-- LISTA -->
                                <table class="table table-hover align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Empresa</th>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Teléfono</th>
                                            <th class="text-end">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($clientUsers as $usuario)
                                        <tr>
                                            <td>{{ $usuario->client?->name }}</td>
                                            <td>{{ $usuario->name }}</td>
                                            <td>{{ $usuario->email }}</td>
                                            <td>{{ $usuario->phone }}</td>
                                            <td class="text-end">
                                                <form method="POST"
                                                    action="{{ route('cliente.usuario.destroy', $usuario->id) }}"
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function newClient() {
            const container = document.getElementById('clientFormClientes');
            const form = document.getElementById('clientFormAction');

            container.classList.remove('d-none');
            form.reset();

            document.getElementById('client_id').value = '';
            form.action = "{{ route('cliente.save') }}";
        }


        function newClientUser() {
            const modalEl = document.getElementById('clientUsersModal');
            const modal = new bootstrap.Modal(modalEl);
            modal.show();

            const container = document.getElementById('clientFormClientUsers');
            const form = document.getElementById('clientUserFormAction');

            container.classList.remove('d-none');
            form.reset();

            document.getElementById('client_user_id').value = '';
            form.action = "{{ route('cliente.usuario.save') }}";
        }


        // function editClient(cliente) {
        //     const container = document.getElementById('clientFormClientes');
        //     const form = document.getElementById('clientFormAction');

        //     container.classList.remove('d-none');

        //     document.getElementById('client_id').value = cliente.id;
        //     document.getElementById('name').value = cliente.name ?? '';
        //     document.getElementById('rfc').value = cliente.rfc ?? '';
        //     document.getElementById('email').value = cliente.email ?? '';
        //     document.getElementById('phone').value = cliente.phone ?? '';
        //     document.getElementById('address').value = cliente.address ?? '';

        //     form.action = `/clientes/${cliente.id}/update`;
        // }
    </script>







    </div>




</x-app-layout>