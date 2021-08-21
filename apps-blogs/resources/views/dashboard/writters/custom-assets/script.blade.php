 <!-- Bootstrap core JavaScript-->
 <script src="vendor/jquery/jquery.min.js"></script>
 <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"
  integrity="sha512-Tn2m0TIpgVyTzzvmxLNuqbSJH3JP8jm+Cy3hvHrW7ndTDcJ1w5mBiksqDBb8GpE2ksktFvDB/ykZ0mDpsZj20w=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <!-- Custom scripts for all pages-->
 <script src="js/sb-admin-2.min.js"></script>
 <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
 {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
 {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
 <script>
    //  ck editor
     CKEDITOR.replace('contents');

     //message with sweetalert
    //  @if (session()->has('success'))
     
    //      swal({
    //      title: "Success!",
    //      text: "{{ Session::get('success') }}",
    //      icon: "success",
    //      button: "Aww yiss!",
    //      }); @endif
    //  @if (session()->has('error'))
     
    //  swal({
    //      title: "Failed!",
    //      text: "{{ Session::get('error') }}",
    //      icon: "warning",
    //      button: "Aww yiss!",
    //      });      
    //  @endif
 </script>
