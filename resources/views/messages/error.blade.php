@if(Session::has('error'))

@php($error = Session::get('error')) 

@if ($error['class'] == 'errorregisterlicense')
 
  <script type="text/javascript">
    Swal.fire({title: 'خطا!',text: 'شما بیش از حد مجاز اطلاعات ثبت کرده اید .',type: 'error',confirmButtonText: 'باشه'})
  </script>

@endif

@endif