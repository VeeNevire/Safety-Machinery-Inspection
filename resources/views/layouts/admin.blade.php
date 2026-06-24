<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title', 'Dashboard') | Safety</title>
    <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('js/select.dataTables.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/bs4Toast.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
</head>
<body>
    <div class="container-scroller">
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="{{ route('dashboard') }}"><img src="{{ asset('images/ogo.svg') }}" class="mr-3" alt="logo"></a>
                <a class="navbar-brand brand-logo-mini" href="{{ route('dashboard') }}"><img src="{{ asset('images/ogo1.svg') }}" alt=""></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <span>
                    <b>
                        <div class="date">
                            <script type='text/javascript'>
                                var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                                var date = new Date();
                                var day = date.getDate();
                                var month = date.getMonth();
                                var thisDay = date.getDay(),
                                    thisDay = myDays[thisDay];
                                var yy = date.getYear();
                                var year = (yy < 1000) ? yy + 1900 : yy;
                                document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                            </script>
                        </div>
                    </b>
                </span>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                            <i class="icon-bell mx-0"></i>
                            <span class="count" id="notificationCount">0</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                            <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                            <div class="dropdown" id="notificationList">
                                <p class="text-center">Tidak ada notifikasi</p>
                            </div>
                        </div>
                    </li>
                    @auth
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="{{ asset('assets/images/icon.png') }}" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <span class="dropdown-item-text">{{ Auth::user()->name ?? Auth::user()->username }}</span>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ti-power-off text-primary"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endauth
                    <li class="nav-item nav-settings d-none d-lg-flex"></li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <i class="fa-solid fa-house"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <i class="fa-solid fa-gauge-simple-high"></i>
                            <span class="menu-title">Data Master</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ route('pengguna.index') }}">Data Pengguna</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('mesin.index') }}">Data Mesin</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('opl.index') }}">Data OPL</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('omob.index') }}">Data OMOB</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                            <i class="fa-solid fa-map-location-dot"></i>
                            <span class="menu-title">Area</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="form-elements">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ route('lokasi.index') }}">Lokasi</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('department.index') }}">Departemen</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('riwayat.index') }}">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                            <span class="menu-title">Riwayat</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('scan.index') }}">
                            <i class="fa-solid fa-qrcode"></i>
                            <span class="menu-title">Scan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('agenda.index') }}">
                            <i class="fa-regular fa-calendar-days"></i>
                            <span class="menu-title">Agenda</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('laporan.index') }}">
                            <i class="fa-solid fa-bullhorn"></i>
                            <span class="menu-title">Laporan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-side').submit();">
                            <i class="fa-solid fa-door-open"></i>
                            <span class="menu-title">Logout</span>
                        </a>
                        <form id="logout-form-side" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                    </li>
                </ul>
            </nav>
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright &copy; {{ date('Y') }}. PT. Corinthian Industries Indonesia. All rights reserved.</span>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/bs4-toast.js') }}"></script>
    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/Chart.roundedBarCharts.js') }}"></script>

    <script>
    function loadNotifications() {
        fetch('{{ route("notifications") }}')
            .then(response => response.json())
            .then(data => {
                const list = document.getElementById('notificationList');
                const count = document.getElementById('notificationCount');
                let html = '';
                let total = 0;

                if (data.expired && data.expired.length > 0) {
                    data.expired.forEach(function(n) {
                        html += '<a class="dropdown-item preview-item bg-danger bg-gradient-faded-secondary">';
                        html += '  <div class="preview-thumbnail"><div class="preview-icon bg-danger"><i class="ti-alert mx-0"></i></div></div>';
                        html += '  <div class="preview-item-content">';
                        html += '    <h6 style="color:white;" class="preview-subject font-weight-normal">Sudah waktunya Inspeksi</h6>';
                        html += '    <p style="color:white;"><b>' + n.no_mesin + '</b><br>Harus segera inspeksi! - Tanggal: ' + n.tanggal + '</p>';
                        html += '  </div></a>';
                        total++;
                    });
                }

                if (data.near_expiry && data.near_expiry.length > 0) {
                    data.near_expiry.forEach(function(n) {
                        html += '<a class="dropdown-item preview-item bg-warning">';
                        html += '  <div class="preview-thumbnail"><div class="preview-icon"><i class="ti-time mx-0"></i></div></div>';
                        html += '  <div class="preview-item-content">';
                        html += '    <h6 style="color:white;" class="preview-subject font-weight-normal">Inspeksi yang akan datang!</h6>';
                        html += '    <p style="color:white;"><b>' + n.no_mesin + '</b><br>Akan Inspeksi Pada Tanggal: ' + n.tanggal + '</p>';
                        html += '  </div></a><hr>';
                        total++;
                    });
                }

                if (total === 0) {
                    html = '<p class="text-center">Tidak ada notifikasi</p>';
                }

                list.innerHTML = html;
                count.textContent = total;
            });
    }

    document.addEventListener('DOMContentLoaded', function() {
        loadNotifications();
    });
    </script>

    @yield('scripts')
</body>
</html>
