    <!-- Start footer section -->
    <footer class="footer footer__section">
        <div class="dashboard__footer--inner text-center">
            <p class="copyright__content mb-0">© {{ date('Y') }} WGRCFP is an initiative of <a href="https://morgansconsulting.ng/" target="_blank">THE MORGANS CONSORTIUM.</a> Designed by <a href="https://tynesideinnovation.com/" target="_blank">Tyneside Innovations</a></p>

        </div>
    </footer>
    <!-- End footer section -->

 <!-- Scroll top bar -->
 <button id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round"  stroke-width="48" d="M112 244l144-144 144 144M256 120v292"/></svg></button>
    
 <!-- All Script JS Plugins here  -->
 <script src="{{ asset('assets/admin/js/vendor/popper.js')}}" defer="defer"></script>
 <script src="{{ asset('assets/admin/js/vendor/bootstrap.min.js')}}" defer="defer"></script>
 <script src="{{ asset('assets/admin/js/plugins/swiper-bundle.min.js')}}"></script>
 <script src="{{ asset('assets/admin/js/plugins/glightbox.min.js')}}"></script>
  
  <!-- Customscript js -->  
  <style>
    /* Styles to make the footer fixed at the bottom */
    .footer.footer__section {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #ffffff; /* Adjust to your theme's footer background color */
        z-index: 1000; /* Ensures footer is above most other content */
        /* border-top: 1px solid #e0e0e0; */ /* Optional: adds a separator line */
        /* You may want to add some padding within the footer itself */
        /* padding-top: 15px; */
        /* padding-bottom: 15px; */
    }

    /*
       IMPORTANT: Prevent content overlap!
       Add bottom padding to your main content wrapper. This value should be
       at least the height of your footer.
       You'll need to add this style to your global CSS file or in a <style>
       tag in your main layout file (e.g., layouts/dashboard.blade.php).

       Based on your `user/dashboard.blade.php`, the main content wrapper might be '.page__body--wrapper'.
       Example:
       .page__body--wrapper {
           padding-bottom: 70px; /* Adjust this value to your footer's actual height */
       }
    */
  </style>
  <script src="{{ asset('assets/admin/js/script.js')}}"></script>

  <!-- Dark to light js -->
  <script>
      // On page load or when changing themes, best to add inline in `head` to avoid FOUC
      if (localStorage.getItem("theme-color") === "dark" || (!("theme-color" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
      document.getElementById("light__to--dark")?.classList.add("dark--version");
      } 
      if (localStorage.getItem("theme-color") === "light") {
      document.getElementById("light__to--dark")?.classList.remove("dark--version");
      } 
  </script>
  {{-- <!-- Chart JS --> 
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- Customscript js -->
  <script src="{{ asset('assets/admin/js/chart-activation.js')}}"></script> 
    @if (session('success') || session('error'))
        <script>
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 1500
                });
            @elseif (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: '{{ session('error') }}',
                    showConfirmButton: false,
                    timer: 1500
                });
            @endif
        </script>
    @endif
   --}}
   <style>
    /* Increase font size of Toastr */
    #toast-container > .toast {
        font-size: 20px; /* You can change 18px to any size you want */
    }
</style>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "timeOut": "3000",
            "positionClass": "toast-top-right"
        };
 
        @if(session('success'))
            toastr.success("{{ session('success') }}");
        @endif
        
        @if(session('status'))
            toastr.success("{{ session('status') }}");
        @endif

        // @if(session('error'))
        //     toastr.error("{{ session('error') }}");
        // @endif

        @if($errors->any()) 
            @foreach($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif
    });
</script>