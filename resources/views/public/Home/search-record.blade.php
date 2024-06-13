@include('public.Home.header')
@include('public.Home.navbar')

<div class="container data-policy-box">
    <h3 class="text-bold m-2">REGISTRATION <span style="font-weight:normal">Alumni Information</span></h3>
    <div class="container-fluid">
        <div class="bg-light p-3 d-flex flex-column justify-content-center align-items-center border">
            <h5 class="dpa-text-h3">Fill Alumni Information</h5>
        </div>
        <div class="p-3 p-4 border">
            <p>Read the items below, before proceeding with your registration.</p>
            <ol>
                <li>You may search your record using your complete name and birthday or you may also search your record
                    by using your student number and surname.</li>
                <li>For married alumni, kindly make sure to use your maiden surname in searching your record.</li>
                <li>Data will be based according to the university's record when the registrant was still a student of
                    the university.</li>
                <li>Please make sure to provide your most recent contact information.</li>
                <li>If no record was retrieved, you may manually input your data.</li>
            </ol>
        </div>

        <div class="border p-3">
            <form class="col-md-12 row form" method="POST" action="{{ route('search-record-submit') }}">
                @csrf
                @if (Session::has('status'))
                    @if (Session::get('status') == 'success')
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @else
                        <div class="alert alert-danger">
                            {{ Session::get('message') }}
                            <a href="{{ route('register-form') }}" class="d-block text-primary">Input data manually?
                                CLick here.</a>
                        </div>
                    @endif
                @endif
                <h6>Search Record</h6>
                <div class="row">
                    <div class="d-flex">
                        <input type="checkbox" name="use_student_number" id="use_student_number" class="mx-2"
                            style="width:20px; height:20px">
                        <p>Use Student Number instead</p>
                    </div>
                    <div class="row" id="first-row">
                        <div class="col-md-3 form-group">
                            <input type="hidden" name="row_number" id="row_number" value="1">
                            <input type="text" name="lastname" id="lastname"
                                class="form-control @error('lastname') is-invalid @enderror"
                                placeholder="Enter Last Name">
                            @error('lastname')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 form-group">
                            <input type="text" class="form-control @error('firstname') is-invalid @enderror"
                                name="firstname" placeholder="Enter First Name">
                            @error('firstname')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 form-group">
                            <input type="text" name="middlename" id="middlename"
                                class="form-control @error('middlename') is-invalid @enderror"
                                placeholder="Enter Middle Name">
                            @error('middlename')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 form-group">
                            <input type="date" name="birthdate" id="birthdate"
                                class="form-control @error('birthdate') is-invalid @enderror">
                            @error('birthdate')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row" id="second-row">
                        <div class="col-md-3 form-group">
                            <input type="text" class="form-control @error('student_number') is-invalid @enderror"
                                name="student_number" placeholder="Enter Student Number">
                            @error('student_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 form-group">
                            <input type="text" name="last_name" id="lastname"
                                class="form-control @error('last_name') is-invalid @enderror"
                                placeholder="Enter Last Name">
                            @error('last_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 form-group my-3">
                        <button class="btn btn-success"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
                    </div>
                </div>
        </div>
    </div>
</div>

</div>

@include('public.Home.footer')
<script>
    if(localStorage.getItem('row_number') == 1){
        $('#use_student_number').prop('checked', false);
        $('#row_number').val(1);
        $('#first-row').show();
        $('#second-row').hide();
    } else {
        $('#use_student_number').prop('checked', true);
        $('#row_number').val(2);
        $('#first-row').hide();
        $('#second-row').show();
    }
    $('#use_student_number').change(function() {
        if ($(this).is(':checked')) {
            console.log("Checkbox is checked..")
            localStorage.setItem("row_number", 2);
            $('#row_number').val(2);
            $('#first-row').hide();
            $('#second-row').show();
        } else {
            console.log("Checkbox is not checked..")
            localStorage.setItem("row_number", 1);
            $('#row_number').val(1);
            $('#first-row').show();
            $('#second-row').hide();
        }
    });
</script>
