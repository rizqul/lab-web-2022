<!DOCTYPE html>
<html lang="en">

<?php include_once 'plugins/functions.php' ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="plugins/style.css" rel="stylesheet">
    <title>Planetary Management</title>
</head>

<?php requestConnection() ?>

<body>
    <nav class="navbar navbar-light bg-dark">
        <div class="container-fluid mx-5">
            <a class="navbar-brand display-7">
                <img src="assets/logo.png" width="225" height="50" class="d-inline-block align-center" alt="">
                &nbsp;|&nbsp;&nbsp;&nbsp;<b>Planetary Management</b>
            </a>
            <form class="d-flex" role="search" method="post">
                <input class="form-control me-2 rounded-0" type="search" placeholder="Search" aria-label="Search" name="search" id="search-input">
                <button class="btn btn-outline-orange btn-dark" type="submit" name="find" id="search-button">Search</button>
                <button class="btn btn-outline-orange btn-dark" style="display: none;" type="submit" name="back" id="back-button">Back</button>
            </form>
        </div>
    </nav>

    <a href="index.php"><div class="overlay"></div></a>


    <div class="card w-50 input-data border-dark" style="display: none;">
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

    <div class="card w-75 output-data">
        <div class="card-header bg-orange label-output-data d-flex flex-row">
            <div class="col display-7 text-light m-auto label-output">Project Data</div>
            <div class="col-100">
                <button type="button" class="btn btn-dark btn-add">+</button>
            </div>
        </div>

        <form method="post">
            <table class="table table-striped">
                <thead>
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

                    <?php setButtons($conn); ?>
                    <?php listRecords($conn) ?>
                    
                </tbody>
            </table>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="plugins/script.js"></script>
    <iframe style="display: none;"></iframe>

</body>
</html>
