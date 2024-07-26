<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('font-awesome/css/font-awesome.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/plugins/iCheck/custom.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/plugins/slick/slick.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/plugins/slick/slick-theme.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/animate.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/style.css') !!}" rel="stylesheet">
    <!-- Sweet Alert -->
    <link href="{!! asset('css/plugins/sweetalert/sweetalert.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') !!}" rel="stylesheet">
    {{-- Chocen --}}
    <link href="{!! asset('css/plugins/chosen/bootstrap-chosen.css') !!}" rel="stylesheet">
    @yield('style')
</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <img alt="image" class="rounded-circle" style="width: 100px; height: 100px;"
                                src="{{ asset('img/perfil.jpg') }}" />
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="block m-t-xs font-bold"> {{ Auth::user()->nombre }}
                                    {{ Auth::user()->apellido }} </span>
                                <span class="text-muted text-xs block">{{ Auth::user()->roles[0]->role->rol }} <b
                                        class="caret"></b></span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="dropdown-item" href="profile.html">Perfil</a></li>
                                <li><a class="dropdown-item" href="contacts.html">Contacto</a></li>
                                <li><a class="dropdown-item" href="mailbox.html">Mail</a></li>
                                <li class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Salir</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>
                    </li>
                    @if (Auth::user()->roles[0]->role->rol == 'Administrador')
                        <li>
                            <a href="{{ route('home') }}"><i class="fa fa-tachometer"></i><span class="nav-label">Panel
                                    de
                                    Control</span> </a>
                        </li>
                        <li>
                            <a href="{{ route('autobuses.index') }}"><i class="fa fa-bus"></i><span
                                    class="nav-label">Autobuses</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('destinos.index') }}"><i class="fa fa-map-marker"></i><span
                                    class="nav-label">Destinos</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('rutas.index') }}"><i class="fa fa-road"></i><span
                                    class="nav-label">Rutas</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('clientes.index') }}"><i class="fa fa-users"></i><span
                                    class="nav-label">Clientes</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('choferes.index') }}"><i class="fa fa-wheelchair"></i><span
                                    class="nav-label">Choferes</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->roles[0]->role->rol == 'Administrador' || Auth::user()->roles[0]->role->rol == 'Cliente')
                        <li>
                            <a href="{{ route('reservas.index') }}"><i class="fa fa-ticket"></i><span
                                    class="nav-label">Reservas</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->roles[0]->role->rol == 'Administrador')
                        <li>
                            <a href="{{ route('reportes.index') }}"><i class="fa fa-th"></i> <span
                                    class="nav-label">Reporte de Ventas</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('usuarios.create') }}"><i class="fa fa-user-plus"></i> <span
                                    class="nav-label">Agregar Nuevo
                                    Administrador</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-lock"></i> <span class="nav-label">Auth</span><span
                                    class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="{{ route('roles.index') }}">Roles</a></li>
                                <li><a href="{{ route('usuarios.index') }}">Usuarios</a></li>
                            </ul>
                        </li>
                    @endif
                    {{-- <li>
                        <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">Mis Tareas
                            </span><span class="label label-warning float-right">16/24</span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="mailbox.html">Inbox</a></li>
                            <li><a href="mail_detail.html">Email view</a></li>
                            <li><a href="mail_compose.html">Compose email</a></li>
                            <li><a href="email_template.html">Email templates</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">Mantenimiento de Datos
                            </span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{ route('funcionarios.getfuncionario') }}">Gestionar Funcionarios</a></li>
                            <li><a href="profile.html">Gestionar Areas</a></li>
                            <li><a href="profile.html">Gestionar Tipo de denuncia</a></li>
                            <li><a href="profile.html">Gestionar Estados</a></li>

                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Forms</span><span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class="active"><a href="form_basic.html">Basic form</a></li>
                            <li><a href="form_advanced.html">Advanced Plugins</a></li>
                            <li><a href="form_wizard.html">Wizard</a></li>
                            <li><a href="form_file_upload.html">File Upload</a></li>
                            <li><a href="form_editors.html">Text Editor</a></li>
                            <li><a href="form_autocomplete.html">Autocomplete</a></li>
                            <li><a href="form_markdown.html">Markdown</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span>
                            <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="index.html">Dashboard v.1</a></li>
                            <li><a href="dashboard_2.html">Dashboard v.2</a></li>
                            <li><a href="dashboard_3.html">Dashboard v.3</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="metrics.html"><i class="fa fa-pie-chart"></i> <span class="nav-label">Metrics</span>
                        </a>
                    </li>
                    <li>
                        <a href="widgets.html"><i class="fa fa-flask"></i> <span class="nav-label">Widgets</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">App Views</span>
                            <span class="float-right label label-primary">SPECIAL</span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="profile_2.html">Profile v.2</a></li>
                            <li><a href="contacts_2.html">Contacts v.2</a></li>
                            <li><a href="projects.html">Projects</a></li>
                            <li><a href="project_detail.html">Project detail</a></li>
                            <li><a href="activity_stream.html">Activity stream</a></li>
                            <li><a href="teams_board.html">Teams board</a></li>
                            <li><a href="social_feed.html">Social feed</a></li>
                            <li><a href="clients.html">Clients</a></li>
                            <li><a href="full_height.html">Outlook view</a></li>
                            <li><a href="vote_list.html">Vote list</a></li>
                            <li><a href="file_manager.html">File manager</a></li>
                            <li><a href="calendar.html">Calendar</a></li>
                            <li><a href="issue_tracker.html">Issue tracker</a></li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="article.html">Article</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="timeline.html">Timeline</a></li>
                            <li><a href="pin_board.html">Pin board</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Other
                                Pages</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="search_results.html">Search results</a></li>
                            <li><a href="lockscreen.html">Lockscreen</a></li>
                            <li><a href="invoice.html">Invoice</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="login_two_columns.html">Login v.2</a></li>
                            <li><a href="forgot_password.html">Forget password</a></li>
                            <li><a href="register.html">Register</a></li>
                            <li><a href="404.html">404 Page</a></li>
                            <li><a href="500.html">500 Page</a></li>
                            <li><a href="empty_page.html">Empty page</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-globe"></i> <span
                                class="nav-label">Miscellaneous</span><span
                                class="label label-info float-right">NEW</span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="toastr_notifications.html">Notification</a></li>
                            <li><a href="nestable_list.html">Nestable list</a></li>
                            <li><a href="agile_board.html">Agile board</a></li>
                            <li><a href="timeline_2.html">Timeline v.2</a></li>
                            <li><a href="diff.html">Diff</a></li>
                            <li><a href="pdf_viewer.html">PDF viewer</a></li>
                            <li><a href="i18support.html">i18 support</a></li>
                            <li><a href="sweetalert.html">Sweet alert</a></li>
                            <li><a href="idle_timer.html">Idle timer</a></li>
                            <li><a href="truncate.html">Truncate</a></li>
                            <li><a href="password_meter.html">Password meter</a></li>
                            <li><a href="spinners.html">Spinners</a></li>
                            <li><a href="spinners_usage.html">Spinners usage</a></li>
                            <li><a href="tinycon.html">Live favicon</a></li>
                            <li><a href="google_maps.html">Google maps</a></li>
                            <li><a href="datamaps.html">Datamaps</a></li>
                            <li><a href="social_buttons.html">Social buttons</a></li>
                            <li><a href="code_editor.html">Code editor</a></li>
                            <li><a href="modal_window.html">Modal window</a></li>
                            <li><a href="clipboard.html">Clipboard</a></li>
                            <li><a href="text_spinners.html">Text spinners</a></li>
                            <li><a href="forum_main.html">Forum view</a></li>
                            <li><a href="validation.html">Validation</a></li>
                            <li><a href="tree_view.html">Tree view</a></li>
                            <li><a href="loading_buttons.html">Loading buttons</a></li>
                            <li><a href="chat_view.html">Chat view</a></li>
                            <li><a href="masonry.html">Masonry</a></li>
                            <li><a href="tour.html">Tour</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-flask"></i> <span class="nav-label">UI Elements</span><span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="icons.html">Icons</a></li>
                            <li><a href="draggable_panels.html">Draggable Panels</a></li>
                            <li><a href="resizeable_panels.html">Resizeable Panels</a></li>
                            <li><a href="buttons.html">Buttons</a></li>
                            <li><a href="video.html">Video</a></li>
                            <li><a href="tabs_panels.html">Panels</a></li>
                            <li><a href="tabs.html">Tabs</a></li>
                            <li><a href="notifications.html">Notifications & Tooltips</a></li>
                            <li><a href="helper_classes.html">Helper css classes</a></li>
                            <li><a href="badges_labels.html">Badges, Labels, Progress</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="grid_options.html"><i class="fa fa-laptop"></i> <span class="nav-label">Grid
                                options</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Tables</span><span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="table_basic.html">Static Tables</a></li>
                            <li><a href="table_data_tables.html">Data Tables</a></li>
                            <li><a href="table_foo_table.html">Foo Tables</a></li>
                            <li><a href="jq_grid.html">jqGrid</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-shopping-cart"></i> <span
                                class="nav-label">E-commerce</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="ecommerce_products_grid.html">Products grid</a></li>
                            <li><a href="ecommerce_product_list.html">Products list</a></li>
                            <li><a href="ecommerce_product.html">Product edit</a></li>
                            <li><a href="ecommerce_product_detail.html">Product detail</a></li>
                            <li><a href="ecommerce-cart.html">Cart</a></li>
                            <li><a href="ecommerce-orders.html">Orders</a></li>
                            <li><a href="ecommerce_payments.html">Credit Card form</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">Gallery</span><span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="basic_gallery.html">Lightbox Gallery</a></li>
                            <li><a href="slick_carousel.html">Slick Carousel</a></li>
                            <li><a href="carousel.html">Bootstrap Carousel</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Menu Levels
                            </span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <a href="#">Third Level <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>

                                </ul>
                            </li>
                            <li><a href="#">Second Level Item</a></li>
                            <li>
                                <a href="#">Second Level Item</a>
                            </li>
                            <li>
                                <a href="#">Second Level Item</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="css_animation.html"><i class="fa fa-magic"></i> <span class="nav-label">CSS
                                Animations </span><span class="label label-info float-right">62</span></a>
                    </li>
                    <li class="landing_link">
                        <a target="_blank" href="landing.html"><i class="fa fa-star"></i> <span
                                class="nav-label">Landing Page</span> <span
                                class="label label-warning float-right">NEW</span></a>
                    </li>
                    <li class="special_link">
                        <a href="package.html"><i class="fa fa-database"></i> <span
                                class="nav-label">Package</span></a>
                    </li> --}}
                </ul>
            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i
                                class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" action="search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control"
                                    name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Gobierno de Santa Cruz de la Sierra</span>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-envelope"></i> <span class="label label-warning">16</span>
                            </a>
                            <ul class="dropdown-menu dropdown-messages">
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle"
                                                src="{{ asset('img/a7.jpg') }}">
                                        </a>
                                        <div class="media-body">
                                            <small class="float-right">46h ago</small>
                                            <strong>Mike Loreipsum</strong> started following <strong>Monica
                                                Smith</strong>. <br>
                                            <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle"
                                                src="{{ asset('img/a4.jpg') }}">
                                        </a>
                                        <div class="media-body ">
                                            <small class="float-right text-navy">5h ago</small>
                                            <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica
                                                Smith</strong>. <br>
                                            <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle"
                                                src="{{ asset('img/profile.jpg') }}">
                                        </a>
                                        <div class="media-body ">
                                            <small class="float-right">23h ago</small>
                                            <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                            <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="mailbox.html" class="dropdown-item">
                                            <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i> <span class="label label-primary">8</span>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="mailbox.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                            <span class="float-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a href="profile.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                            <span class="float-right text-muted small">12 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a href="grid_options.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                            <span class="float-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="notifications.html" class="dropdown-item">
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- TODO: ESTO HACERLO EDITABLE -->
            <!-- <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Basic Form</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a>Forms</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>Basic Form</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div> -->
            @yield('content')
        </div>
    </div>
    <!-- Mainly scripts -->
    @yield('script')
    <script src="{!! asset('js/jquery-3.1.1.min.js') !!}"></script>
    <script src="{!! asset('js/popper.min.js') !!}"></script>
    <script src="{!! asset('js/bootstrap.js') !!}"></script>
    <script src="{!! asset('js/plugins/metisMenu/jquery.metisMenu.js') !!}"></script>
    <script src="{!! asset('js/plugins/slimscroll/jquery.slimscroll.min.js') !!}"></script>
    <!-- Custom and plugin javascript -->
    <script src="{!! asset('js/inspinia.js') !!}"></script>
    <script src="{!! asset('js/plugins/pace/pace.min.js') !!}"></script>
    <!-- iCheck -->
    <script src="{!! asset('js/plugins/iCheck/icheck.min.js') !!}"></script>
    <script src="{!! asset('js/plugins/slick/slick.min.js') !!}"></script>
    <script src="{!! asset('js/plugins/dataTables/datatables.min.js') !!}"></script>
    <script src="{!! asset('js/plugins/dataTables/dataTables.bootstrap4.min.js') !!}"></script>
    <script src="{!! asset('js/plugins/chosen/chosen.jquery.js') !!}"></script>
    {{-- <script src="{{ asset('js/plugins/chosen/chosen.jquery.js') }}"></script> --}}
    <script>
        $(document).ready(function() {
            $(".chosen-select").chosen({ width: "100%" });
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [{
                        extend: 'copy'
                    },
                    {
                        extend: 'csv'
                    },
                    {
                        extend: 'excel',
                        title: 'ExampleFile'
                    },
                    {
                        extend: 'pdf',
                        title: 'ExampleFile'
                    },

                    {
                        extend: 'print',
                        customize: function(win) {
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]

            });
        });
    </script>

</body>

</html>
