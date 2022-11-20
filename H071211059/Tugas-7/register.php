<?php echo session_status(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
    .card {
        width: 50%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);

    }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Sign Up
            </div>
            <form id="register">
                <div class="card-body">
                    <div class="mb-3 form-group">
                        <label for="email" class="mb-2">Email</label>
                        <input type="email" name="email" class="form-control" id="email" />
                    </div>
                    <div class="mb-3 form-group">
                        <label for="uname" class="mb-2">Username</label>
                        <input type="text" name="uname" class="form-control" id="uname" />
                    </div>
                    <div class="mb-3 form-group">
                        <label for="password" class="mb-2">Password</label>
                        <input type="password" name="password" class="form-control" id="password" />
                    </div>
                    <div class="mb-3 form-group">
                        <label for="rpassword" class="mb-2">Repeat Password</label>
                        <input type="password" name="rpassword" class="form-control" id="rpassword" />
                    </div>
                </div>
                <div class="modal-footer mb-3 me-3">
                    <p class="me-4">Already Register? <a href="index.php">Login Here</a></p>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </div>
    <!-- SCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="main.js"></script>
</body>

</html>