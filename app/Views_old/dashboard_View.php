<?php
// require "conn.php";
// if ($_SERVER["REQUEST_METHOD"] == "GET") {
//     $name=$_GET['whName']??"";
//     $email=$_GET['whEmail']??"";
//     $password=$_GET['whPassword']??"";
//     $role=$_GET['$whRole']??"";
//     $created_at=$_GET['whCreated_at']??"";
//     $isDeleted=$_GET['isDeleted']??"";
// }
//VARIABLES END  
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listed Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css">


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->


</head>







<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <!-- Sidebar -->
    <div class="d-flex flex-column flex-root">
        <div>
            <!--begin::Page-->
            <div class="page d-flex flex-row flex-column-fluid">
                <!--begin::Aside-->
                <div id="kt_aside" class="aside aside-dark aside-hoverable drawer drawer-start drawer-on" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
                    <!--begin::Brand-->
                    <div class="flex-column-auto" id="kt_aside_logo" style="margin: 10px;margin-left: 15%">
                        <!--begin::Logo-->
                        <a href="#">
                            <img alt="Logo" src="assets/media/logos/logo-1-dark.svg" class="h-25px logo" />
                        </a>
                        <!--end::Logo-->
                        <!--begin::Aside toggler-->
                        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
                            <span class="svg-icon svg-icon-1 rotate-180">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="black" />
                                    <path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Aside toggler-->
                    </div>
                    <!--end::Brand-->

                    <!--begin::Aside menu-->
                    <div class="aside-menu flex-column-fluid">

                        <!--begin::Aside Menu-->
                        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">

                            <!--begin::Menu-->
                            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">

                                <div class="menu-item">

                                    <!-- Upper -->
                                    <div class="menu-content pt-8 pb-2">
                                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Apps</span>
                                    </div>
                                </div>
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen009.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3" d="M21 22H14C13.4 22 13 21.6 13 21V3C13 2.4 13.4 2 14 2H21C21.6 2 22 2.4 22 3V21C22 21.6 21.6 22 21 22Z" fill="black" />
                                                    <path d="M10 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H10C10.6 2 11 2.4 11 3V21C11 21.6 10.6 22 10 22Z" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>

                                        <!-- This is where most tables will be  -->
                                        <span class="menu-title">Tables</span>
                                        <span class="menu-arrow"></span>
                                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                                            <!-- LINK TO FIRST TABLE -->
                                            <div class="menu-item">
                                                <a class="menu-link" href="#">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot">
                                                            Projects
                                                        </span>
                                                    </span>
                                                    <span class="menu-title">My Projects</span>
                                                </a>
                                            </div>
                                        </div>
                                    </span>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="https://preview.keenthemes.com/metronic8/demo1/layout-builder.html" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                        <span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="black" />
                                                    <path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-title">Layout Builder</span>
                                    </a>
                                    <!-- </div> -->
                                    <div class="menu-item">
                                        <a class="menu-link" href="">
                                            <span class="menu-icon">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                                <span class="svg-icon svg-icon-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="black" />
                                                        <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="black" />
                                                        <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <span class="menu-title">Calendar</span>
                                        </a>
                                    </div>
                                </div>
                                <!--END APPS -->
                            </div>
                            <!--end::Aside Menu-->
                        </div>
                        <!--end::Aside menu-->
                        <!--begin::Footer-->
                        <div class="aside-footer flex-column-auto pt-5 pb-7 px-5" id="kt_aside_footer">
                            <a class="btn btn-custom btn-primary w-100" href="#" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click" title='Click here to access your user data!'>
                                <span class="btn-label">Bienvenido
                                    <?php
                                    $session = session();
                                    //  if(isset($session($user["id"]))){  
                                    // 	if ($id==1) {
                                    // echo "Lucifer";
                                    // }elseif($id==2){
                                    // echo "Príncipe";
                                    // }else{
                                    // echo "Condenado";
                                    // }
                                    // }else{  
                                    echo "Visitante";
                                    // } 
                                    ?>
                                </span>



                                <!-- php echo cambio  -->
                                <!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->
                                <span class="svg-icon btn-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM15 17C15 16.4 14.6 16 14 16H8C7.4 16 7 16.4 7 17C7 17.6 7.4 18 8 18H14C14.6 18 15 17.6 15 17ZM17 12C17 11.4 16.6 11 16 11H8C7.4 11 7 11.4 7 12C7 12.6 7.4 13 8 13H16C16.6 13 17 12.6 17 12ZM17 7C17 6.4 16.6 6 16 6H8C7.4 6 7 6.4 7 7C7 7.6 7.4 8 8 8H16C16.6 8 17 7.6 17 7Z" fill="black" />
                                        <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </a>
                        </div>
                        <!--end::Footer-->
                    </div>

                </div>
                <!--end::Aside-->
                <!--begin::Wrapper-->
                <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                    <!--begin::Header-->
                    <div id="kt_header" class="header align-items-stretch">
                        <!--begin::Container-->
                        <div class="container-fluid d-flex align-items-stretch justify-content-between">
                            <!--begin::Aside mobile toggle-->
                            <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
                                <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_aside_mobile_toggle">
                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                                    <span class="svg-icon svg-icon-2x mt-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
                                            <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Aside mobile toggle-->
                            <!--begin::Mobile logo-->
                            <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                                <a href="#" class="d-lg-none">
                                    <img alt="Logo" src="assets/media/logos/logo-2.svg" class="h-30px" />
                                </a>
                            </div>
                            <!--end::Mobile logo-->
                            <!--begin::Wrapper-->
                            <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
                                <!--begin::Navbar-->
                                <div class="d-flex align-items-stretch" id="kt_header_nav">
                                    <!--begin::Menu wrapper-->
                                    <div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">

                                    </div>
                                    <!--end::Menu wrapper-->
                                </div>
                                <!--end::Navbar-->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- END Sidebar -->



        <!-- DATATABLES -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js" integrity="sha384-VFQrHzqBh5qiJIU0uGU5CIW3+OWpdGGJM9LBnGbuIH2mkICcFZ7lPd/AAtI7SNf7" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js" integrity="sha384-/RlQG9uf0M2vcTw3CX7fbqgbj/h8wKxw7C3zu9/GxcBPRKOEcESxaxufwRXqzq6n" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/moment-2.29.4/jszip-3.10.1/dt-2.2.2/af-2.7.0/b-3.2.2/b-html5-3.2.2/cr-2.0.4/date-1.5.5/kt-2.12.1/r-3.0.4/rg-1.5.1/sb-1.8.2/sp-2.3.3/sl-3.0.0/sr-1.4.1/datatables.min.js" integrity="sha384-lOStfB9w51cCYrPxeiPDDu13j3XyuozGjSybjRQ11umFeuaLhi+QFjYfTR4e2VOw" crossorigin="anonymous"></script>

        <div class="container mt-5">
            <h1 class="text-center">User List</h1>

            <?php if (session()->getFlashdata('success')): ?>
                <script>
                    toastr.success('<?= session()->getFlashdata('success'); ?>');
                </script>
            <?php endif; ?>
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <a href="<?= base_url('users/save') ?>" class="btn btn-primary mb-3">Create user</a>
                    </div>
                    <div class="col-6">
                        <a href="<?= base_url('logout') ?>" class="btn btn-danger mb-3 ">Close session</a>
                    </div>
                </div>
            </div>
            <br>
            <!-- FORM -> GET -->
            <form method="GET" action="<?= base_url('users') ?>" class="mb-3">

                <div class="container">
                    <div class="input group w auto">
                        <input type="text" name="whName" class="form-control" id="whName" placeholder="Name" value="<?= esc($name) ?>">
                        <!-- <button type="submit">SEARCH</button> -->

                        <!-- <button class="btn btn-secondary" id="btnName">Search</button> -->
                        &nbsp;
                        <input type="text" name="whEmail" class="form-control" id="whEmail" placeholder="Email" value="<?= esc($email) ?>">
                        <!-- <button class="btn btn-secondary" id="btnEmail">Search</button> -->
                        &nbsp;
                        <input type="text" name="whPassword" class="form-control" id="whPassword" placeholder="Password">
                        <!-- <button class="btn btn-secondary" id="btnPassword">Search</button> -->
                        &nbsp;
                        <select class="form-control" id="whRole">
                            <option value="admin">
                                Administrator
                            </option>
                            <option value="moderator">
                                Moderator
                            </option>
                            <option value="user">
                                User
                            </option>
                            <option value="any" selected>
                                Any
                            </option>
                        </select>
                        <!-- <button class="btn btn-secondary" id="btnRole">Search</button> -->

                        &nbsp;

                        <input type="date" name="whCreated_at" class="form-control" id="whCreated_at" placeholder="Created_at">
                        <!-- <button class="btn btn-secondary" id="btnCreated_at">Use Filter</button>
        <button class="btn btn-danger" id="noCreated_at">Remove Filter</button> -->
                        &nbsp;
                        <select name="isDeleted" class="form-control" id="isDeleted">
                            <option value="allowed">
                                Allowed
                            </option>
                            <option value="deleted">
                                Deleted
                            </option>
                            <option value="all" selected>
                                All
                            </option>
                        </select>
                    </div><br>
                    <!-- <button class="btn btn-secondary" id="btnDeleted_at">Search</button> -->
                    <div class="row">
                        <div class="col"><button type="submit" class="btn btn-success" id="btnUseFilter">Use Filter</button></div>
                        <div class="col"><a href="<?= base_url("/users") ?>" class="btn btn-danger" id="btnRstFilter">Remove Filters</a></div>
                    </div><br><br>
                </div>
                <!-- END FORM  -->



                <?php if (!empty($users) && is_array($users)): ?>
                    <table class="table table-bordered" id="dashboardTable">
                        <thead>
                            <tr>
                                <!-- <th>ID</th> -->
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th>Created_at</th>
                                <th>Deleted_at</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <!-- <td>< ?= esc($user['id']) ?></td> -->
                                    <td><?= esc($user['name']) ?></td>
                                    <td><?= esc($user['email']) ?></td>
                                    <td><?= esc($user['password']) ?></td>
                                    <td><?= esc($user['role']) ?></td>
                                    <td><?= esc($user['created_at']) ?></td>
                                    <td><?= esc($user['deleted_at']) ?></td>
                                    <td>
                                        <a href="<?= base_url('users/save/' . $user['id']) ?>" class="btn btn-warning ">&#9998;</a>
                                        <!-- Edit -->

                                        <?php if (esc($user['deleted_at']) == null): ?>
                                            <a href="<?= base_url("users/delete/") . esc($user["id"]) ?>"
                                                class='btn btn-danger '
                                                onclick='return confirm("Are you sure you want to delete this user?")'><b>&#128465;</b> </a>
                                            <!-- -->
                                            <!-- Erase -->
                                        <?php else: ?>
                                            <a href="<?= base_url("users/restore/") . esc($user["id"]) ?>"
                                                class='btn btn-success'
                                                onclick='return confirm("Do you really want to restore this user?")'><b>&plus;</b></a>
                                            <!-- Restore -->
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <div class="mt-4">
                        <?= $pager->links("default", "custom_pagination"); ?>
                    </div>
                <?php else: ?>
                    <p class="text-center">No hay usuarios registrados.</p>
                <?php endif; ?>
        </div>

</body>


<script>
    $().ready(() => {
        $("dashboardTable").DataTable();
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<!-- DATATABLES -->
<link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/moment-2.29.4/jszip-3.10.1/dt-2.2.2/af-2.7.0/b-3.2.2/b-html5-3.2.2/cr-2.0.4/date-1.5.5/kt-2.12.1/r-3.0.4/rg-1.5.1/sb-1.8.2/sp-2.3.3/sl-3.0.0/sr-1.4.1/datatables.min.css" rel="stylesheet" integrity="sha384-8YO63l+I4O/yBIeI+DbNGWMxIpc9/nZSvGIr7bWFtrwvMK8ImIiH9JIccFdzj6C5" crossorigin="anonymous">
<!--begin::Page Vendor Stylesheets(used by this page)-->
<link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
<!--end::Page Vendor Stylesheets-->
<!--begin::Global Stylesheets Bundle(used by all pages)-->
<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
<!--end::Global Stylesheets Bundle-->

</html>