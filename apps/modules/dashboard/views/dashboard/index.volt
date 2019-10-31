<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Hello World! from Dashboard Module</h1>
    <form action="{{url('/reg')}}" method="post">
    	<input type="email" name="em">
    	<input type="password" name="pw">
    	<input type="submit">
    </form>
</body>
</html>