<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="text-center">
            <div class="h2">Register</div>
            <form action="{{ url('/post_register') }}" method="POST">
                <div class="form-group row">
                    <div class="col-md-3 text-right">
                        <label for="username">Username</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3 text-right">
                        <label for="email">Email</label>
                    </div>
                    <div class="col-md-9">
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3 text-right">
                        <label for="password">Password</label>
                    </div>
                    <div class="col-md-9">
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>