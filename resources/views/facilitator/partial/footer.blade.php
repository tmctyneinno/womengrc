    <!-- Start footer section -->
    <footer class="footer footer__section">
        <div class="dashboard__footer--inner text-center">
            <p class="copyright__content mb-0">© {{ date('Y') }} WomeninGRC is Proudly Owned by <a href="https://morgansconsulting.ng/" target="_blank">Morgans Consulting</a></p>

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