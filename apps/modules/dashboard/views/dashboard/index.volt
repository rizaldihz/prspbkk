<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Hello World! from Dashboard Module</h1>
    {% if session.get('auth') != null %}
    <p>Selamat Datang, <h4>{{ session.get('auth')['username'] }}</h4> </p>
    {% endif %}
    {% if error is defined %}
    <p style="color: red">{{error}}</p>
    {% endif %}
    {% if session.has('auth') == false %}
    <form action="{{url('/login')}}" method="post">
    	<input type="email" name="em">
    	<input type="password" name="pw">
    	<input type="submit">
    </form>
    {% endif %}
</body>
</html>