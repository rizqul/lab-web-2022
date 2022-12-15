@extends('module')

@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
    <style>
        span.ck-file-dialog-button {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="display-5 pt-4">Tags</div>

    <div class="mt-2">
        <table class="table" id="table_tags">
            <div class="row px-3 collapse w-75 mb-5" id="filter-menu">

                <div class="d-flex align-items-center">
                    <div class="display-7 fw-bold ">Filters</div>
                </div>

                <hr class="mt-2 ms-2">
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
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Articles Tagged</th>
                        <th scope="col">Author</th>
                        <th scope="col">Created Date</th>
                        <th scope="col">Actions</th>
                        <th scope="col">id</th>
                    </tr>
                </thead>
                <tbody class="taglist">
                    @foreach ($tags as $tag)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $tag->tag_name }}</td>
                            <td>{{ $tag->status }}</td>
                            <td>{{ $tag->article_count }}</td>
                            <td>{{ $tag->username }}</td>
                            <td>{{ $tag->created_at }}</td>
                            <td class="actions">
                                <button class="btn bg-secondary text-third rounded-0 edit" data-bs-toggle="modal"
                                    data-bs-target="#tag-modal" data-id="{{ $tag->id }}">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <button class="btn bg-danger text-third rounded-0 delete" data-bs-toggle="modal"
                                    data-bs-target="#confirm-delete-modal" data-id="{{ $tag->id }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                            <td>{{ $tag->id }}</td>
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
                    The deleted tag will be permanently removed from the system.
                </div>
                <div class="modal-footer delete-forms">
                    <button type="button" class="btn bg-danger text-fourth rounded-0"
                        data-bs-dismiss="modal">Close</button>
                    <a href="{{ url('/panel/tags/delete/') }}" type="submit" class="btn bg-primary text-fourth rounded-0"
                        id="confirm-delete">Delete</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade " id="tag-modal" tabindex="-1" aria-labelledby="tag-modal-label"aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tag-modal-label">Create a New Tag</h1>
                    <button type="button" class="btn-close close-forms" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body forms">
                    <label for="name" class="row form-label mb-1 ms-1">Tag Name</label>
                    <input type="text" name="tag_name" id="tag_name" placeholder="Tag Name"
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
            "<button class='btn rounded-0 bg-primary text-third px-4 d-flex justify-content-center align-items-center' id='add-new' onclick='add()' data-bs-toggle='modal' data-bs-target='#tag-modal'><span class='me-2'>New</span><span class='me-2'>Tag</span><i class='bi bi-plus-circle'></i></button>" +
            "</div>";

        var description, table, rowIndex;

        function add() {
            $('#tag-modal-label').text('Create a New Tag');
            $('#id').remove();
        }

        function clearInput() {
            $('#tag_name').val('');
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
            table = $("#table_tags").DataTable({
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

                    // Target : table column as index - date
                    var date = new Date(data[5]);
                    // console.log(date)
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

                // Target : table column as index - status
                table.column(2).search(searchTerms.join('|'), true, false, true)
                    .draw();
                // console.log($(this).val());
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


            // table.row('[id=' + 1 + ']').remove().draw(false);
            // console.log(table.columns(7).search('87').data());

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
                let tagName = $('#tag_name').val();
                let tagDescription = description.getData();
                let store = !isEdit ? true : false;
                let _token = $('meta[name="csrf-token"]').attr('content');
                let firstCol = (table.rows().count() != 0) ? table.rows().count() + 1 : 1;

                // Send data to controller
                $.ajax({
                    url: '{{ route('tags.store') }}',
                    type: 'POST',
                    data: {
                        tag_name: tagName,
                        description: tagDescription,
                        id: id_token,
                        mode: store,
                        _token: _token
                    },
                    success: function(data) {
                        if (data) {
                            clearInput();
                            $('#tag-modal').modal('hide');

                            // console.log(data);

                            if (store) { // Add new data
                                console.log('fetched id: ' + data.id);
                                data.articles_count = 0;
                                table.row.add([

                                    firstCol, data.tag_name, data.status, data
                                    .articles_count,
                                    data.username, data.created_at,
                                    "<div class='actions d-flex w-100'>" +
                                    "<button class='btn bg-secondary text-third rounded-0 edit'" +
                                    "data-bs-toggle='modal' data-bs-target='#tag-modal' data-id='" +
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

                                return swal.fire('Successfuly added the Tag!');

                            } else { // Edit Data

                                table.cell(rowIndex, 1).data(data.tag_name);
                                
                                return swal.fire('Successfuly edited the Tag!');
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
                $('#confirm-delete').attr('href', '/panel/tags/delete/' + id);
            });

            $('.taglist').on('click', '.edit', function() { // Edit
                $(this).parents('tr').addClass('editing');
                rowIndex = table.row('.editing').index();
                $(this).parents('tr').removeClass('editing');
                console.log(rowIndex)
                $('#tag-modal-label').text('Edit Tag');
                var id = $(this).data("id");

                console.log("[DEBUG] Prepared edit ID: " + id);
                $.ajax({
                    url: '/panel/tags/edit/' + id,
                    type: 'GET',
                    dataType: 'json',

                    success: function(data) {
                        $('.forms').append(
                            '<input type="hidden" name="id" id="id" value="' + data.id +'">'
                        );

                        $('#tag_name').val(data.tag_name);

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

    @if (session('status'))
        <script>
            swal.fire('Successfuly deleted the Tag!');
        </script>
    @endif
    
@endsection
