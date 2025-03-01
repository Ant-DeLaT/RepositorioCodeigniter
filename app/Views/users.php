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
            <!--begin::Aside-->
            <?= view('includes/sidebar.php'); ?>
            <!--end::Aside-->

            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Content-->
                <div class="content d-flex flex-column-fluid" id="kt_content">
                    <!--begin::Container-->
                    <div id="kt_content_container" class="container-fluid h-100 px-3">
                        <!-- Begin::Filter Form -->
                        <div class="card mb-3">
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold fs-3 mb-1">User Management</span>
                                </h3>
                                <div class="card-toolbar">
                                    <a href="<?= base_url('users/save') ?>" class="btn btn-sm btn-primary">Create
                                        User</a>
                                    <a href="<?= base_url('logout') ?>" class="btn btn-sm btn-danger ms-2">Close
                                        Session</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="GET" action="<?= base_url('users') ?>" class="mb-3">
                                    <div class="row g-3">
                                        <div class="col-md-2">
                                            <input type="text" name="whName" class="form-control" id="whName"
                                                   placeholder="Name" value="<?= esc($name) ?>">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" name="whEmail" class="form-control" id="whEmail" placeholder="Email" value="<?= esc($email) ?>">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" name="whPassword" class="form-control" id="whPassword"
                                                   placeholder="Password">
                                        </div>
                                        <div class="col-md-2">
                                            <select class="form-control" id="whRole">
                                                <option value="admin">Administrator</option>
                                                <option value="moderator">Moderator</option>
                                                <option value="user">User</option>
                                                <option value="any" selected>Any</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="date" name="whCreated_at" class="form-control" id="whCreated_at" placeholder="Created_at">
                                        </div>
                                        <div class="col-md-2">
                                            <select name="isDeleted" class="form-control" id="isDeleted">
                                                <option value="allowed">Allowed</option>
                                                <option value="deleted">Deleted</option>
                                                <option value="all" selected>All</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 text-end">
                                            <button type="submit" class="btn btn-success" id="btnUseFilter">Use Filter</button>
                                            <a href="<?= base_url("/users") ?>" class="btn btn-danger"
                                                   id="btnRstFilter">Remove Filters</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- End::Filter Form -->

                        <!-- Begin::Users Table -->
                        <?php if (!empty($users) && is_array($users)): ?>
                        <div class="card h-100">
                            <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped w-100" id="dashboardTable">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Password</th>
                                                    <th>Role</th>
                                                    <th>Created_at</th>
                                                    <th>Deleted_at</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($users as $user): ?>
                                                    <tr>
                                                        <td><?= esc($user['name']) ?></td>
                                                        <td><?= esc($user['email']) ?></td>
                                                        <td><?= esc($user['password']) ?></td>
                                                        <td><?= esc($user['role']) ?></td>
                                                        <td><?= esc($user['created_at']) ?></td>
                                                        <td><?= esc($user['deleted_at']) ?></td>
                                                        <td>
                                                            <a href="<?= base_url('users/save/' . $user['id']) ?>"
                                                               class="btn btn-sm btn-warning">&#9998;</a>
                                                            <?php if (esc($user['deleted_at']) == null): ?>
                                                                <a href="<?= base_url("users/delete/") . esc($user["id"]) ?>"
                                                               class="btn btn-sm btn-danger"
                                                               onclick="return confirm('Are you sure you want to delete this user?')">
                                                                <b>&#128465;</b>
                                                            </a>
                                                            <?php else: ?>
                                                                <a href="<?= base_url("users/restore/") . esc($user["id"]) ?>"
                                                               class="btn btn-sm btn-success"
                                                               onclick="return confirm('Do you really want to restore this user?')">
                                                                <b>&plus;</b>
                                                            </a>
                                                            <?php endif ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                                </tbody>
                                                </table>
                                        <div class="mt-4">
                                            <?= $pager->links("default", "custom_pagination"); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                                <div class="alert alert-info">
                                    <p class="text-center mb-0">No hay usuarios registrados.</p>
                                </div>
                            <?php endif; ?>
                            <!-- End::Users Table -->
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
        $(document).ready(function() {
            $('#dashboardTable').DataTable({
                pageLength: 10,
                order: [
                    [0, 'asc']
                ]
            });
        });
    </script>
    <!--end::Javascript-->
</body>
<!--end::Body-->
</script>
</body>

</html>