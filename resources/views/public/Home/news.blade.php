@include('public.Home.header')
@include('public.Home.navbar')
<div class="container-fluid bg-green mt-5">
    <div class="container">
        <h1 class="p-4">NEWS</h1>
    </div>
    </div>
<div class="container p-5">
    <div class="row">
        @foreach ($datas as $data)
        <div class="card col-md-12 mt-3">
            <img src="{{ asset('images/news/'.$data->image_path) }}" class="card-img-top mt-3 h-100" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$data->title}}</h5>
                <p class="card-text text-wrap">{{$data->content}}</p>
                <p class="mt-2"> {{ date('M d, Y', strtotime($data->created_at)) }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@include('public.Home.footer')
