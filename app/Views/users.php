<!--
Author: Ant-DeLaT
-->
<?= view('includes/head.php'); ?>
<!-- DataTables CSS -->
<link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/moment-2.29.4/jszip-3.10.1/dt-2.2.2/af-2.7.0/b-3.2.2/b-html5-3.2.2/cr-2.0.4/date-1.5.5/kt-2.12.1/r-3.0.4/rg-1.5.1/sb-1.8.2/sp-2.3.3/sl-3.0.0/sr-1.4.1/datatables.min.css" rel="stylesheet">
<title>Gestión de Usuarios</title>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!-- begin::sidebar -->
            <?= view('includes/sidebar.php'); ?>
            <!-- end::sidebar -->

            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Container-->
                    <div id="kt_content_container" class="container-xxl">
                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success">
                                <?= session()->getFlashdata('success'); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Debug output -->
                        <?php if (ENVIRONMENT === 'development') : ?>
                            <div class="alert alert-info">
                                <h4>Debug Info:</h4>
                                <pre><?php print_r($users ?? []); ?></pre>
                            </div>
                        <?php endif; ?>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Usuarios</h3>
                                <div class="card-toolbar">
                                    <a href="<?= base_url('users/save'); ?>" class="btn btn-sm btn-primary">
                                        Crear usuarios
                                    </a>
                                    <a href="<?= base_url('logout'); ?>" class="btn btn-sm btn-danger ms-2">
                                        Cerrar sesión
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Begin::Filters -->
                                <form id="user-filters" class="mb-7">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-auto">
                                            <input type="text" name="name" id="filter-name" class="form-control form-control-solid" placeholder="Filtrar por nombre">
                                        </div>
                                        <div class="col-auto">
                                            <select name="status" id="filter-status" class="form-select form-select-solid">
                                                <option value="allowed">Usuarios Activos</option>
                                                <option value="deleted">Usuarios Eliminados</option>
                                                <option value="all">Todos los Usuarios</option>
                                            </select>
                                        </div>
                                        <div class="col-auto">
                                            <button type="button" id="kt_filter_reset" class="btn btn-light btn-active-light-primary">Resetear</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- End::Filters -->

                                <!-- Begin::Users Table -->
                                <div class="table-responsive">
                                    <table id="users-table" class="table table-row-bordered table-row-dashed gy-5 gs-7">
                                        <thead>
                                            <tr class="fw-bold fs-6 text-gray-800">
                                                <th>Nombre</th>
                                                <th>Email</th>
                                                <th>Fecha Creación</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($users) && is_array($users)) : ?>
                                                <?php foreach ($users as $user) : ?>
                                                    <tr>
                                                        <td><?= esc($user['name']); ?></td>
                                                        <td><?= esc($user['email']); ?></td>
                                                        <td><?= esc($user['created_at']); ?></td>
                                                        <td>
                                                            <span class="badge badge-light-<?= isset($user['deleted_at']) && $user['deleted_at'] ? 'danger' : 'success'; ?>">
                                                                <?= isset($user['deleted_at']) && $user['deleted_at'] ? 'Eliminado' : 'Activo'; ?>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <a href="<?= base_url('users/edit/' . $user['id']); ?>" class="btn btn-icon btn-light-warning btn-sm me-1">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a href="<?= base_url('users/delete/' . $user['id']); ?>" class="btn btn-icon btn-light-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?');">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- End::Users Table -->
                            </div>
                        </div>
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->
    <!--end::Main-->

    <!-- First common scripts (includes jQuery from Metronic) -->
    <?= view('includes/common-scripts.php'); ?>

    <!-- Then DataTables and its dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js" integrity="sha384-VFQrHzqBh5qiJIU0uGU5CIW3+OWpdGGJM9LBnGbuIH2mkICcFZ7lPd/AAtI7SNf7" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js" integrity="sha384-/RlQG9uf0M2vcTw3CX7fbqgbj/h8wKxw7C3zu9/GxcBPRKOEcESxaxufwRXqzq6n" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/moment-2.29.4/jszip-3.10.1/dt-2.2.2/af-2.7.0/b-3.2.2/b-html5-3.2.2/cr-2.0.4/date-1.5.5/kt-2.12.1/r-3.0.4/rg-1.5.1/sb-1.8.2/sp-2.3.3/sl-3.0.0/sr-1.4.1/datatables.min.js" integrity="sha384-lOStfB9w51cCYrPxeiPDDu13j3XyuozGjSybjRQ11umFeuaLhi+QFjYfTR4e2VOw" crossorigin="anonymous"></script>

    <script>
        // Debug function
        function logDebug(message, data) {
            console.log('DEBUG:', message, data || '');
        }

        // Log when script starts executing
        logDebug('Script execution started');

        // Check if jQuery is loaded
        if (typeof jQuery === 'undefined') {
            console.error('jQuery is not loaded!');
        } else {
            logDebug('jQuery version:', jQuery.fn.jquery);
        }

        // Check if DataTables is loaded
        if (typeof jQuery.fn.DataTable === 'undefined') {
            console.error('DataTables is not loaded!');
        } else {
            logDebug('DataTables version:', jQuery.fn.DataTable.version);
        }

        // Log DOM ready state
        logDebug('Document ready state:', document.readyState);

        $(document).ready(function() {
            logDebug('Document ready event fired');

            // Check if table element exists
            const tableElement = $('#users-table');
            if (tableElement.length === 0) {
                console.error('Table element #users-table not found in DOM!');
                return;
            }
            logDebug('Table element found', {
                rows: tableElement.find('tr').length,
                columns: tableElement.find('th').length
            });

            try {
                logDebug('Attempting to initialize DataTable');
                const dt = $('#users-table').DataTable({
                    responsive: true,
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ],
                    order: [
                        [2, 'desc']
                    ], // Order by created_at by default
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
                    }
                });

                // Handle filter changes
                $('#filter-name').on('keyup', function() {
                    dt.column(0).search(this.value).draw();
                });

                $('#filter-status').on('change', function() {
                    const value = this.value;
                    dt.column(3).search(value === 'all' ? '' :
                        value === 'deleted' ? 'Eliminado' : 'Activo'
                    ).draw();
                });

                // Reset filters
                $('#kt_filter_reset').on('click', function() {
                    $('#filter-name').val('');
                    $('#filter-status').val('allowed');
                    dt.search('').columns().search('').draw();
                });

                logDebug('DataTable initialization complete');
            } catch (error) {
                console.error('Error initializing DataTable:', error);
            }
        });

        // Log when script finishes executing
        logDebug('Script execution completed');
    </script>
</body>

</html> timeOut: 5000
});
});
</script>
<!--end::Javascript-->
</body>
<!--end::Body-->

</html>