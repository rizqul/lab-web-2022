@extends('module')

@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
    {{-- <style>
        span.ck-file-dialog-button {
            display: none;
        }
    </style> --}}
@endsection

@section('content')
    <div class="display-5 pt-4">Articles</div>

    <div class="mt-2">
        <table class="table" id="table_articles">
            {{-- Filters --}}
            <div class="row px-3 collapse w-75 mb-5" id="filter-menu">
                <div class="d-flex align-items-center">
                    <div class="display-7 fw-bold ">Filters</div>
                </div>

                <hr class="mt-2 ms-2">
                {{-- Date --}}
                <div class="col d-flex flex-column">
                    <span class="fw-bold mb-3">Date</span>
                    <div class="row mb-2 d-flex align-items-center">
                        <span class="col form-check-label" for="from">From</span>
                        <input class="col filter-status" name="status" type="date" id="from" value="from">
                    </div>

                    <div class="row mb-2 d-flex align-items-center">
                        <span class="col form-check-label" for="to">To</span>
                        <input class="col filter-status" name="status" type="date" id="to" value="to">
                    </div>
                </div>

                {{-- Status --}}
                <div class="col ms-3 d-flex flex-column">
                    <span class="mb-2 fw-bold">Status</span>
                    <div class="row mb-2 d-flex align-items-center">
                        <span class="col form-check-label" for="published">Published</span>
                        <input class="col filter-status" name="status" type="checkbox" id="published" value="published">
                    </div>

                    <div class="row mb-2 d-flex align-items-center">
                        <span class="col form-check-label" for="archived">Archived</span>
                        <input class="col filter-status" name="status" type="checkbox" id="archived" value="archived">
                    </div>

                    <div class="row">
                        <button class="btn bg-third rounded-0 w-50 mt-2 ms-2" id="clear-filter">Clear Filter</button>
                    </div>
                </div>
                </form>
            </div>

            <div class="row px-3 mt-3">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Status</th>
                        <th scope="col">Description</th>
                        <th scope="col">Likes</th>
                        <th scope="col">Comments</th>
                        <th scope="col">Visitors</th>
                        <th scope="col">Created Date</th>
                        <th scope="col">Actions</th>
                        <th scope="col">id</th>
                    </tr>
                </thead>
                <tbody class="articlelist">
                    @foreach ($articles as $article)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $article->title }}</td>
                            <td class="text-capitalize">{{ $article->status }}</td>
                            <td>{{ $article->description }}</td>
                            <td>{{ $article->likes }}</td>
                            <td>{{ $article->comments }}</td>
                            <td>{{ $article->visitors }}</td>
                            <td>{{ $article->created_at }}</td>
                            <td class="actions">
                                <button class="btn bg-secondary text-third rounded-0 edit" data-bs-toggle="modal"
                                    data-bs-target="#article-modal" data-id="{{ $article->id }}">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <button class="btn bg-danger text-third rounded-0 delete" data-bs-toggle="modal"
                                    data-bs-target="#confirm-delete-modal" data-id="{{ $article->id }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                            <td>{{ $article->id }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </div>
        </table>
    </div>

    <div class="modal fade " id="confirm-delete-modal" tabindex="-1" aria-labelledby="confirm-delete-modal-label"
        aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="confirm-delete-modal-label">Are you sure Bro?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    The deleted article will be permanently removed from the system.
                </div>
                <div class="modal-footer delete-forms">
                    <button type="button" class="btn bg-danger text-fourth rounded-0"
                        data-bs-dismiss="modal">Close</button>
                    <a href="{{ url('/panel/articles/delete/') }}" type="submit" class="btn bg-primary text-fourth rounded-0"
                        id="confirm-delete">Delete</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade " id="article-modal" tabindex="-1" aria-labelledby="article-modal-label" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog ">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="article-modal-label">Create a New article</h1>
                    <button type="button" class="btn-close close-forms" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body forms">
                    <label for="name" class="row form-label mb-1 ms-1">Article Name</label>
                    <input type="text" name="article_name" id="article_name" placeholder="Article Name"
                        class="row form-control mb-2 ms-1">

                    <label for="description" class="row form-label mb-1 ms-1">Description</label>
                    <textarea id="description" name="description" placeholder="Description" class="row border mb-2"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn bg-primary text-fourth rounded-0 store">Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const filterMenu =
            "<div class='form-outline d-flex'>" +
            "<button class='btn bg-primary text-third rounded-0 px-5 me-3 dropdown-toggle' data-bs-toggle='collapse'data-bs-target='#filter-menu' aria-expanded='false' aria-controls='filter-menu'>Filter By </button>" +
            "<button class='btn rounded-0 bg-primary text-third px-4 d-flex justify-content-center align-items-center' id='add-new' onclick='add()' data-bs-toggle='modal' data-bs-target='#article-modal'><span class='me-2'>New</span><span class='me-2'>article</span><i class='bi bi-plus-circle'></i></button>" +
            "</div>";

        var description, table, rowIndex;

        function add() {
            $('#article-modal-label').text('Create a New article');
            $('#id').remove();
        }

        function clearInput() {
            $('#article_name').val('');
            description.setData('');
            $('#id').remove();
        }

        $(document).ready(function() {
            ClassicEditor
                .create(document.querySelector('#description'))
                .then(editor => {
                    description = editor;
                })
                .catch(error => {
                    console.error(error);
                });

            /*
             * DataTables
             */
            table = $("#table_articles").DataTable({
                // hide last column

                "columnDefs": [{
                        "sortable": false,
                        "targets": [0, 6]
                    },
                    {
                        "visible": false,
                        "targets": [7]
                    }
                ],

                dom: '<"#filterDiv">frtip',
            });


            $('#from, #to').on('change', function() {
                table.draw();
            });

            $("#filterDiv").append(
                filterMenu
            );

            $("#filter-menu").prependTo($("#filterDiv"));

            fromDate = $("#from");
            toDate = $("#to");

            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var min = fromDate.val();
                    var max = toDate.val();
                    var date = new Date(data[5]);
                    year = date.getFullYear();
                    month = date.getMonth() + 1;
                    day = date.getDate();
                    date = year + "-" + month + "-" + day
                    if (
                        (min === "" && max === "") ||
                        (min === "" && date <= max) ||
                        (min <= date && max === "") ||
                        (min <= date && date <= max)
                    ) {
                        return true;
                    }
                }
            );

            $('.filter-status').on('change', function(e) {
                var searchTerms = []
                $.each($('.filter-status'), function(i, elem) {
                    if ($(elem).prop('checked')) {
                        searchTerms.push("^" + $(this).val() + "$")
                    }
                })
                table.column(2).search(searchTerms.join('|'), true, false, true)
                    .draw();
            });

            $(document).on('click', '#clear-filter', function(e) { // Clear Filter
                $('input[type=checkbox]').prop('checked', false);
                $('input[type=date]').val('');
                table
                    .search('')
                    .columns().search('')
                    .draw();
            });
            /* * * */

            /*
             *  Modal Buttons
             */
            $(".close-forms").click(function() {
                clearInput();
            });

            $(".store").click(function(e) { // Submit modal (2 Kondisi : Membuat baru atau edit)
                e.preventDefault();
                let isEdit = document.getElementById("id");
                let id_token = $('#id').val();
                let articleName = $('#article_name').val();
                let articleDescription = description.getData();
                let store = !isEdit ? true : false;
                let _token = $('meta[name="csrf-token"]').attr('content');
                let firstCol = (table.rows().count() != 0) ? table.rows().count() + 1 : 1;

                // Send data to controller
                $.ajax({
                    url: '{{ route('articles.store') }}',
                    type: 'POST',
                    data: {
                        article_name: articleName,
                        description: articleDescription,
                        id: id_token,
                        mode: store,
                        _token: _token
                    },
                    success: function(data) {
                        if (data) {
                            clearInput();
                            $('#article-modal').modal('hide');

                            // console.log(data);

                            if (store) { // Add new data
                                console.log('fetched id: ' + data.id);
                                data.articles_count = 0;
                                table.row.add([

                                    firstCol, data.article_name, data.status, data
                                    .articles_count,
                                    data.username, data.created_at,
                                    "<div class='actions d-flex w-100'>" +
                                    "<button class='btn bg-secondary text-third rounded-0 edit'" +
                                    "data-bs-toggle='modal' data-bs-target='#article-modal' data-id='" +
                                    data.id + "'>" +
                                    "<i class='bi bi-pencil-square'></i>" +
                                    "</button>" +

                                    "<button class='ms-1 btn bg-danger text-third rounded-0 delete'" +
                                    "data-bs-toggle='modal' data-bs-target='#confirm-delete-modal' data-id='" +
                                    data.id + "'>" +
                                    "<i class='bi bi-trash'></i>" +
                                    "</button>" +
                                    "</div>", data.id

                                ]).draw(false);

                                return swal.fire('Successfuly added the article!');

                            } else { // Edit Data

                                table.cell(rowIndex, 1).data(data.article_name);
                                
                                return swal.fire('Successfuly edited the article!');
                            }
                        }
                    }
                });
            });
            /* * * */

            /*
             *   Action Buttons
             */
            $(".delete").click(function() { // Delete
                var id = $(this).data("id");
                $('#confirm-delete').attr('href', '/panel/articles/delete/' + id);
            });

            $('.articlelist').on('click', '.edit', function() { // Edit
                $(this).parents('tr').addClass('editing');
                rowIndex = table.row('.editing').index();
                $(this).parents('tr').removeClass('editing');
                console.log(rowIndex)
                $('#article-modal-label').text('Edit article');
                var id = $(this).data("id");

                console.log("[DEBUG] Prepared edit ID: " + id);
                $.ajax({
                    url: '/panel/articles/edit/' + id,
                    type: 'GET',
                    dataType: 'json',

                    success: function(data) {
                        $('.forms').append(
                            '<input type="hidden" name="id" id="id" value="' + data.id +'">'
                        );

                        $('#article_name').val(data.article_name);

                        if (data.description == null) {
                            data.description = '';
                        }
                        description.setData(data.description);
                    }
                });
            });
            /* * * */
        });
    </script>
@endsection
