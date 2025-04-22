<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>{{ $contactUs->company_name }}</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset($contactUs->favicon) }}">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Nunito:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- CSS Plugins -->
  <link rel="stylesheet" href="{{ asset('assets/admin/css/plugins/swiper-bundle.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/plugins/glightbox.min.css') }}">

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/bootstrap.min.css') }}">

  <!-- Custom Styles -->
  <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/dashboard.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/chart.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/dark.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/rtl.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/table.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/creat-listing.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/chat.css') }}">

  <!-- Toastr CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <!-- SweetAlert2 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.min.css">

  <!-- Livewire Styles -->
  @livewireStyles

  <!-- Theme Initialization -->
  <script>
    if (localStorage.getItem("theme-color") === "dark" || (!("theme-color" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
      document.documentElement.classList.add("dark");
    }
    if (localStorage.getItem("theme-color") === "light") {
      document.documentElement.classList.remove("dark");
    }
  </script>

  <style>
    .dashboard__chart--box__inner {
      height: 317px;
      padding-left: 0px;
    }
    .sold-out__progress-bar__field {
      max-width: 200px;
      width: 100%;
    }
  </style>
</head>

<body>
  <div class="dashboard__page--wrapper">
    @include('advisory.partial.navbar')
    @include('advisory.partial.sidebar')

    @yield('content')

    @include('advisory.partial.footer')
  </div>

  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- Toastr JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <!-- SweetAlert2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.all.min.js"></script>

  <!-- Livewire Scripts -->
  @livewireScripts

  <!-- Notifications -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      @if (session('success'))
        toastr.success("{{ session('success') }}");
      @endif
      @if (session('error'))
        toastr.error("{{ session('error') }}");
      @endif

      Livewire.on('notify', message => {
        toastr.success(message);
      });

      Livewire.on('alert', (title, message) => {
        Swal.fire({
          title: title,
          text: message,
          icon: 'success',
        });
      });
    });
  </script>
</body>

</html>
