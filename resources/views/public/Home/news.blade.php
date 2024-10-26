@include('public.Home.header')
@include('public.Home.navbar')
<div class="container-fluid bg-green mt-5">
    <div class="container">
        <h1 class="p-4">NEWS</h1>
    </div>
    </div>
<div class="container p-5">
    <form class="container-fluid row" action="{{ route('select-year-news') }}" method="post">
        @csrf
        <div class="form-group col-md-10">
            <select name="year_news" id="select_news" class="form-control">
                <option value="">Select year of news</option>
                <option value="2025">2025</option>
                <option value="2024">2024</option>
                <option value="2023">2023</option>
                <option value="2022">2022</option>
                <option value="2021">2021</option>
                <option value="2020">2020</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary col-md-2">OK</button>
    </form>
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
