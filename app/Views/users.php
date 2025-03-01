<!--
Author: Ant-DeLaT
-->
<?= view('includes/head.php'); ?>
<!-- Add required DataTables CSS -->
<link href="<?= base_url('assets/plugins/custom/datatables/datatables.bundle.css'); ?>" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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
                                    <table id="users-table" class="table table-row-bordered gy-5">
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

    <!--begin::Javascript-->
    <?= view('includes/common-scripts.php'); ?>

    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="<?= base_url('assets/plugins/custom/datatables/datatables.bundle.js'); ?>"></script>
    <!--end::Page Vendors Javascript-->

    <!-- DataTables Initialization -->
    <script>
        $(document).ready(function() {
            console.log('DataTables initialization starting...');

            // Destroy existing DataTable if it exists
            if ($.fn.DataTable.isDataTable('#users-table')) {
                $('#users-table').DataTable().destroy();
            }

            // Clear any existing wrappers
            $('#users-table').closest('.dataTables_wrapper').replaceWith($('#users-table'));

            try {
                console.log('Users data:', <?= json_encode($users ?? []); ?>);

                const table = $('#users-table').DataTable({
                    retrieve: true,
                    processing: true,
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
                    },
                    order: [
                        [2, 'desc']
                    ],
                    pageLength: 10,
                    dom: 'Blfrtip',
                    buttons: ['copy', 'csv', 'excel', 'pdf'],
                    initComplete: function(settings, json) {
                        console.log('DataTable initComplete called');
                        console.log('Table rows:', this.api().rows().count());
                        // Force redraw
                        this.api().draw(false);
                    }
                });

                console.log('DataTable initialized successfully');

                // Filter handlers
                $('#filter-name').on('keyup', function() {
                    table.column(0).search(this.value).draw();
                });

                $('#filter-status').on('change', function() {
                    const value = this.value;
                    if (value === 'all') {
                        table.column(3).search('').draw();
                    } else if (value === 'deleted') {
                        table.column(3).search('Eliminado').draw();
                    } else {
                        table.column(3).search('Activo').draw();
                    }
                });

                // Reset filters
                $('#kt_filter_reset').on('click', function() {
                    $('#user-filters')[0].reset();
                    table.search('').columns().search('').draw();
                });
            } catch (error) {
                console.error('Error initializing DataTable:', error);
            }
        });
    </script>
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html> timeOut: 5000
});
});
</script>
<!--end::Javascript-->
</body>
<!--end::Body-->

</html>