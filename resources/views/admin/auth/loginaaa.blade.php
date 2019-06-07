<!DOCTYPE html>
<html>
<head>
	<title>admin login page</title>
</head>
<body>

	<form method="post" action="{{ route('admin_login_act') }}">
		
		{{ csrf_field() }}

		<input type="text" name="email">

		<input type="password" name="password">

		<button type="submit">login</button>

	</form>

</body>
</html>