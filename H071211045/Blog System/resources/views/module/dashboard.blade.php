@extends('module')

@section('content')
    <div class="display-5 pt-4">Dashboard</div>
    <div>
        <div class="row">
            <div class="col my-4" align="center">
                <div class="dash-stats border p-3 bg-fourth">
                    <i class="d-flex justify-content-center bi bi-people-fill"></i>
                    <div class="font-title text-center">Total Chads Joined</div>
                    <span id="total_member" class="display-5 fw-bold d-flex justify-content-center">0</span>
                </div>
            </div>


            <div class="col my-4" align="center">
                <div class="dash-stats border p-3 bg-fourth">
                    <i class="d-flex justify-content-center bi bi-people-fill"></i>
                    <div class="font-title text-center">Total Articles Created</div>
                    <span id="total_member" class="display-5 fw-bold d-flex justify-content-center">0</span>
                </div>
            </div>

            <div class="col my-4" align="center">
                <div class="dash-stats border p-3 bg-fourth">
                    <i class="d-flex justify-content-center bi bi-people-fill"></i>
                    <div class="font-title text-center">Total Visitors</div>
                    <span id="total_member" class="display-5 fw-bold d-flex justify-content-center">0</span>
                </div>
            </div>
        </div>

    </div>


    <div class="row px-5">
        <table class="table table-hover table-borderless border caption-top">
            <caption>Articles with Most Likes</caption>
            <thead class="bg-primary text-third">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Categories</th>
                    <th scope="col">Likes</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="row px-5">
        <table class="table table-hover table-borderless border caption-top">
            <caption>Articles with Most Comments</caption>
            <thead class="bg-primary text-third">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Categories</th>
                    <th scope="col">Comments</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="row px-5">
        <table class="table table-hover table-borderless border caption-top">
            <caption>Articles with Most Visits</caption>
            <thead class="bg-primary text-third">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Categories</th>
                    <th scope="col">Visitors</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
