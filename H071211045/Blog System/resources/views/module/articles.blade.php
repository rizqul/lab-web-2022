@extends('module')

@section('content')
    <div class="display-5 pt-4">Articles</div>

    <div class="mt-2">
        <div class="row">
            <div class="form-outline d-flex">
                <input type="text" class="form-control rounded-0" id="datatable-search-input"
                    placeholder="Search For Any Posts" />
                <button type="button" class="btn px-3 bg-primary rounded-0">
                    <i class="bi bi-search text-third"></i>
                </button>

                <div class="ms-3 me-3 dropdown">
                    <button class="btn bg-primary text-third rounded-0 px-5  dropdown-toggle" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Filter By
                    </button>
                    <ul class="dropdown-menu rounded-0 bg-third">
                        <li><a class="dropdown-item" href="#">Date Created</a></li>
                        <li><a class="dropdown-item" href="#">Status</a></li>
                        <li><a class="dropdown-item" href="#">Most Views</a></li>
                    </ul>
                </div>

                <a href="articles/new" class="bg-primary text-third px-4 d-flex justify-content-center align-items-center">
                    <span class="me-2">New</span>
                    <span class="me-2">Article</span>
                    <i class="bi bi-plus-circle"></i>
                </a>
            </div>
        </div>

        <div class="row px-3 mt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Likes</th>
                        <th scope="col">Comments</th>
                        <th scope="col">Visitors</th>
                        <th scope="col">Created Date</th>
                        <th scope="col">Author</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Mark</th>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td class="actions">
                            <a href="#" class="btn bg-secondary text-third rounded-0"><i
                                    class="bi bi-pencil-square"></i></a>
                            <a href="#" class="btn bg-warning text-secondary rounded-0"><i
                                    class="bi bi-archive"></i></a>
                            <a href="#" class="btn bg-danger text-fourth rounded-0"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Jacob</th>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>@fat</td>
                        <td>@fat</td>
                        <td>@fat</td>
                        <td>@fat</td>
                        <td class="actions">
                            <a href="#" class="btn bg-secondary text-third rounded-0"><i
                                    class="bi bi-pencil-square"></i></a>
                            <a href="#" class="btn bg-warning text-secondary rounded-0"><i
                                    class="bi bi-archive"></i></a>
                            <a href="#" class="btn bg-danger text-fourth rounded-0"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Larry</th>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                        <td class="actions">
                            <a href="#" class="btn bg-secondary text-third rounded-0"><i
                                    class="bi bi-pencil-square"></i></a>
                            <a href="#" class="btn bg-warning text-secondary rounded-0"><i
                                    class="bi bi-archive"></i></a>
                            <a href="#" class="btn bg-danger text-fourth rounded-0"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        {{-- Laravel's Pagination --}}
        

    </div>

    {{-- <div class="row">
        <div class="d-flex justify-content-center">
            {{ $articles->links() }}
        </div>
    </div> --}}
@endsection
