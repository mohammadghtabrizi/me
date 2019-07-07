@if(Session::has('submitstatus'))

  @php($submitstatus = Session::get('submitstatus')) 
  
  @if ($submitstatus['class'] == 'success')
  <script type="text/javascript">
    Swal.fire({title: 'ثبت درخواست موفق ',text: 'درخواست شما با موفقیت ثبت شد منتظر تماس کارشناسان ما باشید',type: 'success',confirmButtonText: 'باشه'})
  </script>

  @endif

@endif