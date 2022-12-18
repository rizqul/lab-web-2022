@extends('layout.user')
@section('content')
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    
    <!-- Page Header -->
    <header class="page-header page-header-mini">
        <h1 class="title">{{ $data1 -> title }}</h1>
        <ol class="breadcrumb pb-0">
            @foreach($data3 as $item)
            <li class="breadcrumb-item"><a href="index.html">{{$item -> name}}</a></li>
            @endforeach
            @foreach($data6 as $item)
            <li class="breadcrumb-item active" aria-current="page">{{$item -> name}}</li>
            @endforeach
        </ol>
    </header>
    <!-- End Of Page Header -->

    <section class="container">
        <div class="page-container">
            <div class="page-content">
                <div class="card">
                    <div class="card-header pt-0">
                        <h3 class="card-title mb-4">{{ $data1 -> title }}</h3>
                        <small class="small text-muted">
                            @foreach($data7 as $item)
                            <a class="text-muted">BY {{ $item -> username }}</a>
                            @endforeach
                            <span class="px-2">·</span>
                            <span>{{$data1 -> created_at}}</span>
                            <span class="px-2">·</span>
                        </small>
                    </div>
                    <div class="card-body border-top">
                        {!! $data1->body !!}
                    </div>
                    
                                      
                </div> 

                
                <hr>
                
            </div>
            <!-- Sidebar -->
            <div class="page-sidebar">
                <h6 class=" ">Tags</h6>
                @foreach($data4 as $item)
                <a href="javascript:void(0)" class="badge badge-primary m-1">#{{ $item->tag_id }}</a>
                @endforeach
                <h6 class="mt-5">Picture/Thumbnail</h6>
                <img src="{{ asset('fotoArticle/'. $data1->foto) }}" class="w-100" alt="foto-article">
            </div>
        </div>
    </section>

    

    <!-- Page Footer -->
    
    <!-- End of Page Footer -->

	<!-- core  -->
    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- JoeBLog js -->
    <script src="assets/js/joeblog.js"></script>



</body>
@endsection