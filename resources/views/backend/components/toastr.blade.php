<script type="text/javascript">
	toastr.options = {
  "closeButton": true,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-bottom-right",
  "preventDuplicates": false,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
};


var success_msg=`@if(session('success'))
{{session('success')}}
@endif`;

var error_msg=`@if(session('error'))
{{session('error')}}
@endif`;

if(success_msg)toastr.success("Success", success_msg);
if(error_msg)toastr.error("Error", error_msg);


</script>

