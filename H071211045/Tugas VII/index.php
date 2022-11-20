<!DOCTYPE html>
<html lang="en">

<?php include 'server/functions.php' ?>
<?php requestConnection() ?>
<?php if (!$_SESSION['login']) header("Location: login.php") ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="plugins/index.css" rel="stylesheet">
    <title>Planetary Management</title>
</head>

<body>

    <nav class="navbar navbar-light bg-dark">
        <div class="container-fluid mx-5">
            <a class="navbar-brand display-7">
                <img src="assets/logo.png" width="225" height="50" class="d-inline-block align-center" alt="">
                &nbsp;|&nbsp;&nbsp;&nbsp;<b>Planetary Management</b>
            </a>
            <form class="d-flex" role="search" method="post">
                <input class="form-control me-2 rounded-0" type="search" placeholder="Find a data (e.g AX-)" aria-label="Search" name="search" id="search-input">
                <button class="btn btn-outline-orange btn-dark" type="submit" name="find" id="search-button"><i class="bi bi-search"></i></button>
                <button class="btn btn-outline-orange btn-dark" style="display: none;" type="submit" name="back" id="back-button">Show All</button>
            </form>
            <form method="post">
                <button type="submit" name="logout-button" class="btn btn-outline-orange btn-dark p-3"><i class="input-icon bi bi-person"> <?= strtok($_SESSION['user']->username, " ");  ?></i> | Logout</button>
            </form>
        </div>
    </nav>

    <a href="index.php"><div class="overlay"></div></a>

    <div class="container w-50 confirm-delete" style="display: none;">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger m-3" role="alert">
                    <h4 class="alert-heading">Are you sure?</h4>
                    <p>Once you delete this data, you won't be able to recover it.</p>
                    <hr>
                    <p class="mb-0">Are you sure you want to delete this data?</p>
                </div>
                <div class="d-flex justify-content-center m-3">
                    <form method="post">
                        <button type="submit" class="btn btn-danger px-4 mx-1" name="confirm-delete">Yes</button>
                        <a href="index.php"><button type="button" class="btn btn-success px-4 mx-1">No</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card w-50 input-data" style="display: none;">
        <div class="card-header label-input d-flex">
            <div class="col display-7 m-auto label">Add/Edit Data</div>
            <div class="col text-end m-auto">
                <button type="button" class="btn-close m-0" aria-label="Close"></button>
            </div>
        </div>

        <form method="post">
            <div class="row mt-2">
                <div class="col-2 m-3 display-7">Project Name</div>
                <div class="col-9 m-2"><input type="text" class="form-control" id="project_name" placeholder="Project Name" name="project_name"></div>
            </div>
            <div class="row">
                <div class="col-2 m-3 display-7">Head Staff</div>
                <div class="col-9 m-2"><input type="text" class="form-control" id="head_staff" placeholder="Head Staff" name="head_staff"></div>
            </div>
            <div class="row">
                <div class="col-2 m-3 display-7">Research Code</div>
                <div class="col-9 m-2"><input type="text" class="form-control" id="research_code" placeholder="Research Code" name="research_code"></div>
            </div>
            <div class="row">
                <div class="col-2 m-3 display-7">Status</div>
                <div class="col-9 m-2">
                    <select class="form-select" aria-label="Default select example" id="status" name="status">
                        <option selected value="">- Select Project Status -</option>
                        <option value="Announced Only">Announced Only</option>
                        <option value="Disbanded">Disbanded</option>
                        <option value="On-Going">On-Going</option>
                        <option value="Completed">Completed</option>
                    </select>
                </div>
            </div>
            <div class="row m-3">
                <button type="submit" name="save" class="btn btn-primary" id="save-button" value="">Add Data</button>
            </div>
        </form>
    </div>

    <form method="post">
        <div class="card w-75 output-data">
            <div class="card-header bg-orange label-output-data d-flex flex-row">
                <div class="col display-7 text-light m-auto label-output">Project Data</div>
                <div class="col-100">
                    <button type="submit" class="btn btn-dark btn-add" name="add-button">+</button>
                </div>
            </div>

            <table class="table table-bordered m-auto">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Project Name</th>
                        <th scope="col">Head Staff</th>
                        <th scope="col">Research Code</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <script src="plugins/index.js"></script>
                    <?php setButtons($conn); ?>
                    <?php listRecords($conn) ?>

                </tbody>
            </table>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>