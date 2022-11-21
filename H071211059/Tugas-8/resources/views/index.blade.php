<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>
<body class="antialiased">

{{--NAVBAR--}}
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid w-75">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

{{--FORM--}}
<div class="modal fade" id="productAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="min-width: 75%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="productForm" action="{{route('store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <input type="hidden" name="id" class="form-control form-control-sm" id="id" placeholder="duh"/>
                    <div class="mb-3 form-floating">
                        <input type="text" name="title" class="form-control form-control-sm" id="sTitle"
                               placeholder="duh"/>
                        <label for="sTitle">Title</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="text" name="price" class="form-control form-control-sm" id="sPrice"
                               placeholder="duh"/>
                        <label for="sPrice">Price</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="text" name="qty" class="form-control form-control-sm" id="sQty"
                               placeholder="duh"/>
                        <label for="sQty">Quantity</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="text" name="series" class="form-control form-control-sm" id="sSeries"
                               placeholder="duh"/>
                        <label for="sSeries">Series</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="text" name="prod_desc" class="form-control form-control-sm" id="sProd_desc"
                               placeholder="duh"/>
                        <label for="sProd_desc">Product Description</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="text" name="img_sources" class="form-control form-control-sm" id="sImg_src"
                               placeholder="duh"/>
                        <label for="sImg_src">Image Source</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="goBtn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--TABLE--}}
<div class="container">
    <a class="btn btn-success my-3 addProduct" href="" data-bs-toggle="modal"
       data-bs-target="#productAddModal"> Create New Product</a>
    <table class="table table-bordered table-hover" id="the-table">
        <thead>
        <tr>
            <th class="table-primary">Code</th>
            <th class="table-primary">Title</th>
            <th class="table-primary">Price</th>
            <th class="table-primary">Quantity</th>
            <th class="table-primary">Series</th>
            <th class="table-primary">Description</th>
            <th class="table-primary">Action</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">

        @foreach($products as $product)
            <tr>
                <td>
                    {{ $product->id }}
                </td>
                <td>
                    {{$product->productName}}
                </td>
                <td>
                    {{$product->price}}
                </td>
                <td>
                    {{$product->qty}}
                </td>
                <td>
                    {{$product->series}}
                </td>
                <td>
                    {{$product->description}}
                </td>
                <td>

                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="{{'#images' . $product->id}}">
                        View Images
                    </button>
                    <button type="button" value="{{$product}}"
                            data-value="{{$product->imageSrcs()->get()}}"
                            class="editProductBtn btn btn-success btn-sm">
                        Edit
                    </button>
                    <a href="{{route('delete', ['id' => $product->id])}}">

                        <button type="button" class="btn btn-danger btn-sm">Delete</button>
                    </a>
                </td>
                <div class="modal fade" id="{{'images' . $product->id}}" tabindex="-1"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" style="min-width: 80vw;">
                        <div class="modal-content" style="background-color: #dedede;">
                            <div class="modal-body">
                                <div id="{{'carousel' . $product->id}}" class="carousel slide"
                                     data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach($product->imageSrcs()->get() as $images)
                                            <div
                                                class="carousel-item {{($product->imageSrcs()->get()[0]->src == $images->src) ? 'active' : ''}}">
                                                <img src="{{$images->src}}" class="d-block w-100" alt=""
                                                     style="max-width: 100%; max-height: 85vh; object-fit: contain;">
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                            data-bs-target="{{'#carousel' . $product->id}}"
                                            data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                            data-bs-target="{{'#carousel' . $product->id}}"
                                            data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$products->links('pagination::bootstrap-5')}}
</div>

{{--JS--}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
<script>
    $(document).on('click', '.editProductBtn', function () {
        $('#formLabel').text('Edit Product');
        $('#goBtn').text('Update');
        $('#productAddModal').modal('show');
        $('#productForm').attr('action', '{{route('update')}}');

        let product = jQuery.parseJSON($(this).val());
        let images = jQuery.parseJSON($(this).attr('data-value'));

        images = images.map(function (item) {
            return item['src'];
        });
        $('#id').val(product.id);
        $('#sTitle').val(product.productName);
        $('#sPrice').val(product.price);
        $('#sQty').val(product.qty);
        $('#sSeries').val(product.series);
        $('#sProd_desc').val(product.description);
        $('#sImg_src').val(String(images));
        // console.log(product);
        // console.log(images);
    })

    $(document).on('click', '.addProduct', function () {
        console.log($('#productForm'));
        $('#formLabel').text('Add Product');
        $('#goBtn').text('Submit');
        $('#productForm')[0].reset();
    })
</script>
</body>
</html>
