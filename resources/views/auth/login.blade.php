<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}" />
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.0.3') }}" rel="stylesheet" />
    <style>
        body, html { margin: 0; padding: 0; width: 100%; height: 100%; overflow: hidden; }
        .fo { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-size: cover; background-position: center; background-image: url('{{ asset("assets/img/curved-images/m.jpg") }}'); object-fit: cover; z-index: -1; }
        .container { display: flex; justify-content: flex-start; margin-top: 5px; }
        .blur-background { backdrop-filter: blur(3px); color: black; background-color: rgba(255, 255, 255, 0.5); border-radius: 15px; padding: 20px; width: 350px; margin-left: -90px; margin-top: 30px; }
        @media (max-width: 768px) { .blur-background { margin-left: 40px; margin-top: 190px; background-image: none; background-color: white; } .fo { background-color: whitesmoke; object-fit: none; } }
        @media (max-width: 480px) { .blur-background { margin-left: -20px; } }
        .login-header { color: #007bff; margin-bottom: 20px; }
        .form-control { margin-bottom: 10px; }
        .btn-login { width: 100%; padding: 10px; background: #007bff; border: none; color: white; border-radius: 5px; }
        .btn-login:hover { background: #0056b3; }
        label { font-size: 1rem; }
    </style>
</head>
<body>
    <div class="fo"></div>
    <div class="container position-sticky z-index-sticky top-0"><div class="row"><div class="col-12"></div></div></div>
    <main class="main-content mt-0">
        @if($errors->any())
        <script>
            Swal.fire({
                icon: "error",
                title: "Login Gagal",
                text: "{{ $errors->first() }}",
                confirmButtonText: "OK"
            });
        </script>
        @endif
        @if(session('error'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Login Gagal",
                text: "{{ session('error') }}",
                confirmButtonText: "OK"
            });
        </script>
        @endif
        <section>
            <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                            <div class="blur-background">
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <h3 class="font-weight-bolder text-info text-gradient login-header">APLIKASI PENGECEKAN MESIN</h3>
                                    <p class="mb-0">Input Username dan Password untuk Login</p>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('cek-login') }}" method="post">
                                        @csrf
                                        <label>Username</label>
                                        <div class="mb-3">
                                            <input type="text" title="Silahkan Masukan Username" name="username" class="form-control" placeholder="Username" aria-label="Username" required />
                                        </div>
                                        <label>Password</label>
                                        <div class="mb-3">
                                            <input type="password" title="Silahkan Masukan Password" name="password" class="form-control" placeholder="Password" aria-label="Password" required />
                                        </div>
                                        <div class="text-center">
                                            <input type="submit" class="btn-login mt-4 mb-0" value="Login">
                                        </div>
                                    </form>
                                </div>
                                <div>
                                    <p class="mb-0" style="color:black;">
                                        Copyright &copy; <script>document.write(new Date().getFullYear());</script> PT Corinthian Industries Indonesia.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf("Win") > -1;
        if (win && document.querySelector("#sidenav-scrollbar")) {
            var options = { damping: "0.5" };
            Scrollbar.init(document.querySelector("#sidenav-scrollbar"), options);
        }
    </script>
    <script src="{{ asset('assets/js/soft-ui-dashboard.min.js?v=1.0.3') }}"></script>
</body>
</html>
