<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="text-center">
            <h4>Hello World! from Dashboard Module</h4>
            {{ flashSession.output() }}
		    {% if session.has('auth')%}
		    <p>Selamat Datang, <span class="h4">{{ session.get('auth')['username'] }}</span></p>
		    <form action="{{url('/logout')}}" method="post">
		    	<button type="submit" class="btn btn-primary">Logout</button>
		    </form>
		    {% endif %}
		    {% if session.has('auth') == false %}
            <form action="{{url('/login')}}" method="post">
                <div class="row">
                    <label for="email" class="col-md-4 text-right">Email</label>
                    <input type="email" name="em" class="col-md-4 form-control">
                </div>
                <div class="row">
                    <label for="password" class="col-md-4 text-right">Password</label>
                    <input type="password" name="pw" class="col-md-4 form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
		    </form>
		    {% endif %}
		    <br>
            <div class="h2">Dashboard</div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    {% for user in users %}
                    <tr>
                        <th>{{ user.id }}</th>
                        <th>{{ user.username }}</th>
                        <th>{{ user.email }}</th>
                    </tr>
                    {% endfor  %}
                </tbody>
            </table>
        </div>
    </div>
</body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>