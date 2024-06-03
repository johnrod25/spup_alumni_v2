@include('public.Home.header')

<head>
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
</head>
<form class="container-fluid w-75 p-5" action="{{ route('register-form-submit') }}" method="post">
    @csrf
    @if (Session::has('success_message'))
        <div class="alert alert-success">
            {{ Session::get('success_message') }}
        </div>
    @endif
    <div class="row container-fluid d-flex align-items-center justify-content-center">
        <h5 class="text-bold">PERSONAL INFORMATION</h5>
        <div class="col-md-4 form-group">
            <label>Last Name</label>
            <input type="text" class="form-control" name="lastname" placeholder="Enter Last Name" required>
        </div>
        <div class="col-md-4 form-group">
            <label>First Name</label>
            <input type="text" class="form-control" name="firstname" placeholder="Enter First Name" required>
        </div>
        <div class="col-md-4 form-group">
            <label>Middle Name</label>
            <input type="text" class="form-control" name="middlename" placeholder="Enter Middle Name" required>
        </div>
        <div class="col-md-4 form-group">
            <label>Student Number(Optional)</label>
            <input type="text" class="form-control" name="student_number" placeholder="Enter Student Number"
                required>
        </div>
        <div class="col-md-4 form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" placeholder="Enter Email Address" required>
        </div>
        {{-- <div class="col-md-4 form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
        </div> --}}
        <div class="col-md-4 form-group">
            <label>Phone Number</label>
            <input type="text" class="form-control" name="phone_number" placeholder="Enter Phone Number" required>
        </div>
        <div class="col-md-8 form-group">
            <label>Home Address</label>
            <input type="text" class="form-control" name="home_address" placeholder="Enter Home Address" required>
        </div>
        <div class="col-md-4 form-group">
            <label>Birth Date</label>
            <input type="date" class="form-control" name="birthdate" placeholder="Enter Birth Date" required>
        </div>
    </div>
    <div class="row container-fluid d-flex align-items-center justify-content-center mt-3">
        <h5 class="text-bold">ACADEMIC PROGRAM/ DEGREE IN ST.PAUL UNIVERSITY PHILIPPINES</h5>
        <div class="col-md-6 form-group">
            <label>Program(s)/Degree(s) Completed in St. Paul University</label>
            <select name="degree" placeholder="Enter Program/ Degree" class="form-select" required>
                <option value=""></option>
                <option value="Information Technology">Information Technology</option>
                <option value="Computer Science">Computer Science</option>
            </select>
            {{-- <input type="text" class="form-control" name="degree" placeholder="Enter Program/ Degree" required> --}}
        </div>
        <div class="col-md-6 form-group">
            <label>What Batch(es) do you belong?</label>
            <select name="batch" placeholder="Select batch" class="form-select" required>
                <option value=""></option>
                <option value="HS BATCH78">HS BATCH78</option>
                <option value="BSN BATCH90">BSN BATCH90</option>
                <option value="MBA BATCH2009">MBA BATCH2009</option>
            </select>
            {{-- <input type="text" class="form-control" name="batch" placeholder="EG. HS BATCH78; BSN BATCH90; MBA BATCH2009,ETC." required> --}}
        </div>
        <div class="col-md-6 form-group">
            <label>Please indicate how you would want to br involved in your Alma Mater</label>
            <select name="involve_purpose"
                placeholder="Please indicate how you would want to br involved in your Alma Mater" class="form-select"
                required>
                <option value=""></option>
                <option value="Consultant">Consultant</option>
                <option value="Resource Speaker">Resource Speaker</option>
                <option value="Standing Committee Member">Standing Committee Member</option>
                <option value="Advisory Committee Member">Advisory Committee Member</option>
                <option value="Part-time Faculty">Part-time Faculty</option>
                <option value="Panel member in Theses/Dissertation Validation">Panel member in Theses/Dissertation
                    Validation</option>
                <option value="Marketing Campaign">Marketing Campaign</option>
                <option value="Mentoring Current Students">Mentoring Current Students</option>
                <option value="Supporting recent graduates as they start their career.">Supporting recent graduates as
                    they start their career.</option>
            </select>
        </div>
        <div class="col-md-6 form-group">
            <label>Year Graduated/ Last Year Attended</label>
            <input type="date" class="form-control" name="year_graduated"
                placeholder="Enter Year Graduated/ Last Year Attended" required>
        </div>
        <div class="row container-fluid d-flex align-items-center justify-content-center mt-3">
            <h5 class="text-bold">ABOUT YOUR WORK</h5>
            <div class="col-md-4 form-group">
                <label>Company Name/ Employer</label>
                <input type="text" class="form-control" name="company_name"
                    placeholder="Enter Company Name/ Employer" required>
            </div>
            <div class="col-md-4 form-group">
                <label>Specialization/ Expertise/ Industry</label>
                <input type="text" class="form-control" name="specialization" placeholder="Enter Speacialization.."
                    required>
            </div>
            <div class="col-md-4 form-group">
                <label>Designation/ Occupation</label>
                <input type="text" class="form-control" name="occupation" placeholder="Enter ..." required>
            </div>
            <div class="col-md-6 form-group">
                <label>Work Engagement Status</label>
                <select name="work_status" id="work_status" class="form-select" required>
                    <option value=""></option>
                    <option value="Employer">Employer/ Company or Business Owner</option>
                    <option value="Full time">Full Time Employee</option>
                    <option value="Part time">Part Time Employee</option>
                    <option value="self-employed">Self Employed</option>
                    <option value="freelance">Freelance Consultant/ Service Provider</option>
                    <option value="retiree">Retiree</option>
                    {{-- <option value="others">Others</option> --}}
                </select>
            </div>
            <div class="col-md-6 form-group">
                <label>How long did it take before you were employed after graduation?</label>
                <select name="before_employed" id="before_employed" class="form-select" required>
                    <option value=""></option>
                    <option value="1-3">One to three (1-3) months</option>
                    <option value="4-6">Four to six (4-6) months</option>
                    <option value="7-11">Seven to eleven (7-11) months</option>
                    <option value="1 year">One year</option>
                    <option value="1-2 years">One to two years</option>
                    <option value="2 years or more">Two years or more</option>
                    <option value="na">N/A</option>
                </select>
            </div>

        </div>
        <div class="row container-fluid float-right mt-3">
            <button class="btn btn-success float-right">Submit</button>
        </div>
    </div>
</form>


@include('public.Home.footer')
