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
            <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                placeholder="Enter Last Name" value="{{ old('lastname') }}">
            @error('lastname')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4 form-group">
            <label>First Name</label>
            <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname"
                placeholder="Enter First Name" value="{{ old('firstname') }}">
            @error('firstname')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4 form-group">
            <label>Middle Name</label>
            <input type="text" class="form-control @error('middlename') is-invalid @enderror" name="middlename"
                placeholder="Enter Middle Name" value="{{ old('middlename') }}">
            @error('middlename')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4 form-group">
            <label>Student Number(Optional)</label>
            <input type="text" class="form-control" name="student_number" placeholder="Enter Student Number"
                value="{{ old('student_number') }}">
        </div>
        <div class="col-md-4 form-group">
            <label>Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                placeholder="Enter Email Address" value="{{ old('email') }}">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        {{-- <div class="col-md-4 form-group">
            <label>Password</label>
            <input type="password" class="form-control @error('firstname') is-invalid @enderror" name="password" placeholder="Enter Password">
        </div> --}}

        <div class="col-md-4 form-group">
            <label>Phone Number</label>
            <input type="number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                placeholder="Enter Phone Number" value="{{ old('phone_number') }}">
            @error('phone_number')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-8 form-group">
            <label>Home Address</label>
            <input type="text" class="form-control @error('home_address') is-invalid @enderror" name="home_address"
                placeholder="Enter Home Address" value="{{ old('home_address') }}">
            @error('home_address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4 form-group">
            <label>Birth Date</label>
            <input type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate"
                placeholder="Enter Birth Date" value="{{ old('birthdate') }}">
            @error('birthdate')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row container-fluid d-flex align-items-center justify-content-center mt-3">
        <h5 class="text-bold">ACADEMIC PROGRAM/ DEGREE IN ST.PAUL UNIVERSITY PHILIPPINES</h5>
        <div class="col-md-6 form-group">
            <label>Program(s)/Degree(s) Completed in St. Paul University</label>
            <select name="degree" placeholder="Enter Program/ Degree"
                class="form-select @error('degree') is-invalid @enderror" value="{{ old('degree') }}">
                <option value=""></option>
                <option value="Bachelor of Arts in English Language Studies">Bachelor of Arts in English Language
                    Studies</option>
                <option value="Bachelor of Science in Psychology">Bachelor of Science in Psychology</option>
                <option value="Bachelor of Science in Biology">Bachelor of Science in Biology</option>
                <option value="Bachelor of Science in Social Work">Bachelor of Science in Social Work</option>
                <option value="Bachelor of Science in Public Administration">Bachelor of Science in Public
                    Administration</option>
                <option value="Bachelor of Science in Biology Major in MicroBiology">Bachelor of Science in Biology
                    Major in MicroBiology</option>
                <option value="Bachelor of Secondary Education">Bachelor of Secondary Education</option>
                <option value="Bachelor of Elementary Education">Bachelor of Elementary Education</option>
                <option value="Bachelor of Physical Education">Bachelor of Physical Education</option>
                <option value="Bachelor of Science in Accountancy">Bachelor of Science in Accountancy</option>
                <option value="Bachelor of Science in Entrepreneurship">Bachelor of Science in Entrepreneurship</option>
                <option
                    value="Bachelor of Science in Business Administration major in: Marketing Management, Financial Management and Operations Management">
                    Bachelor of Science in Business Administration major in: Marketing Management, Financial Management
                    and Operations Management</option>
                <option value="Bachelor of Science in Management Accounting">Bachelor of Science in Management
                    Accounting</option>
                <option value="Bachelor of Science in Hospitality Management">Bachelor of Science in Hospitality
                    Management</option>
                <option value="Bachelor of Science in Tourism Management">Bachelor of Science in Tourism Management
                </option>
                <option value="Bachelor of Science in Product Design and Marketing Innovation">Bachelor of Science in
                    Product Design and Marketing Innovation</option>
                <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information
                    Technology</option>
                <option value="Bachelor of Library and Information Science">Bachelor of Library and Information Science
                </option>
                <option value="Bachelor of Science in Civil Engineering">Bachelor of Science in Civil Engineering
                </option>
                <option value="Bachelor of Science in Environmental and Sanitary Engineering">Bachelor of Science in
                    Environmental and Sanitary Engineering</option>
                <option value="Bachelor of Science in Computer Engineering">Bachelor of Science in Computer Engineering
                </option>
                <option value="Bachelor of Science in Nursing">Bachelor of Science in Nursing</option>
                <option value="Bachelor of Science in Pharmacy">Bachelor of Science in Pharmacy</option>
                <option value="Bachelor of Science in Medical Technology">Bachelor of Science in Medical Technology
                </option>
                <option value="Bachelor of Science in Physical Therapy">Bachelor of Science in Physical Therapy</option>
                <option value="Bachelor of Science in Radiologic Technology">Bachelor of Science in Radiologic
                    Technology</option>
                <option value="Bachelor of Science in Midwifery">Bachelor of Science in Midwifery</option>
                <option value="Doctor of Medicine">Doctor of Medicine</option>
            </select>
            @error('degree')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            {{-- <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="degree" placeholder="Enter Program/ Degree"> --}}
        </div>
        <div class="col-md-6 form-group">
            <label>What Batch(es) do you belong?</label>
            {{-- <select name="batch" placeholder="Select batch" class="form-select">
                <option value=""></option>
                <option value="HS BATCH78">HS BATCH78</option>
                <option value="BSN BATCH90">BSN BATCH90</option>
                <option value="MBA BATCH2009">MBA BATCH2009</option>
            </select> --}}
            <input type="text" class="form-control @error('batch') is-invalid @enderror" name="batch"
                placeholder="EG. HS BATCH78; BSN BATCH90; MBA BATCH2009,ETC." value="{{ old('batch') }}">
            @error('batch')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6 form-group">
            <label>Please indicate how you would want to br involved in your Alma Mater</label>
            <select name="involve_purpose"
                placeholder="Please indicate how you would want to br involved in your Alma Mater"
                class="form-select @error('involve_purpose') is-invalid @enderror"
                value="{{ old('involve_purpose') }}">
                <option value=""></option>
                <option value="Consultant" @if (old('involve_purpose') == 'Consultant') {{ 'selected' }} @endif>Consultant</option>
                <option value="Resource Speaker" @if (old('involve_purpose') == 'Resource Speaker') {{ 'selected' }} @endif>Resource Speaker</option>
                <option value="Standing Committee Member" @if (old('involve_purpose') == 'Standing Committee Member') {{ 'selected' }} @endif>Standing Committee Member</option>
                <option value="Advisory Committee Member" @if (old('involve_purpose') == 'Advisory Committee Member') {{ 'selected' }} @endif>Advisory Committee Member</option>
                <option value="Part-time Faculty" @if (old('involve_purpose') == 'Part-time Faculty') {{ 'selected' }} @endif>Part-time Faculty</option>
                <option value="Panel member in Theses/Dissertation Validation" @if (old('involve_purpose') == 'Panel member in Theses/Dissertation Validation') {{ 'selected' }} @endif>Panel member in Theses/Dissertation
                    Validation</option>
                <option value="Marketing Campaign" @if (old('involve_purpose') == 'Marketing Campaign') {{ 'selected' }} @endif>Marketing Campaign</option>
                <option value="Mentoring Current Students" @if (old('involve_purpose') == 'Mentoring Current Students') {{ 'selected' }} @endif>Mentoring Current Students</option>
                <option value="Supporting recent graduates as they start their career." @if (old('involve_purpose') == 'Supporting recent graduates as they start their career.') {{ 'selected' }} @endif>Supporting recent graduates as
                    they start their career.</option>
            </select>
            @error('involve_purpose')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6 form-group">
            <label>Year Graduated/ Last Year Attended</label>
            <input type="date" class="form-control @error('year_graduated') is-invalid @enderror"
                name="year_graduated" placeholder="Enter Year Graduated/ Last Year Attended"
                value="{{ old('year_graduated') }}">
            @error('year_graduated')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="row container-fluid d-flex align-items-center justify-content-center mt-3">
            <h5 class="text-bold">ABOUT YOUR WORK</h5>
            <div class="col-md-4 form-group">
                <label>Company Name/ Employer</label>
                <input type="text" class="form-control @error('company_name') is-invalid @enderror"
                    name="company_name" placeholder="Enter Company Name/ Employer"
                    value="{{ old('company_name') }}">
                @error('company_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4 form-group">
                <label>Specialization/ Expertise/ Industry</label>
                <select name="specialization" class="form-select @error('specialization') is-invalid @enderror"
                    id="specialization" value="{{ old('specialization') }}" onchange="showOtherInput()">
                    <option value=""></option>
                    <option value="Civil Engineering" @if (old('specialization') == 'Civil Engineering') {{ 'selected' }} @endif>Civil Engineering
                    </option>
                    <option value="Electrical Engineering" @if (old('specialization') == 'Electrical Engineering') {{ 'selected' }} @endif>Electrical Engineering
                    </option>
                    <option value="Computer Engineering" @if (old('specialization') == 'Computer Engineering') {{ 'selected' }} @endif>Computer Engineering
                    </option>
                    <option value="Software Engineering" @if (old('specialization') == 'Software Engineering') {{ 'selected' }} @endif>Software Engineering
                    </option>
                    <option value="Information Technology and Computer Science" @if (old('specialization') == 'Information Technology and Computer Science') {{ 'selected' }} @endif>Information Technology and Computer Science
                    </option>
                    <option value="Information Technology" @if (old('specialization') == 'Information Technology') {{ 'selected' }} @endif>Information Technology
                    </option>
                    <option value="Cybersecurity" @if (old('specialization') == 'Cybersecurity') {{ 'selected' }} @endif>Cybersecurity
                    </option>
                    <option value="Data Science" @if (old('specialization') == 'Data Science') {{ 'selected' }} @endif>Data Science
                    </option>
                    <option value="Information Systems" @if (old('specialization') == 'Information Systems') {{ 'selected' }} @endif>Information Systems
                    </option>
                    <option value="Network Administration" @if (old('specialization') == 'Network Administration') {{ 'selected' }} @endif>Network Administration
                    </option>
                    <option value="Software Development" @if (old('specialization') == 'Software Development') {{ 'selected' }} @endif>Software Development
                    </option>
                    <option value="Artificial Intelligence" @if (old('specialization') == 'Artificial Intelligence') {{ 'selected' }} @endif>Artificial Intelligence
                    </option>
                    <option value="Game Development" @if (old('specialization') == 'Game Development') {{ 'selected' }} @endif>Game Development
                    </option>
                    <option value="Web Development" @if (old('specialization') == 'Web Development') {{ 'selected' }} @endif>Web Development
                    </option>
                    <option value="Business Administration" @if (old('specialization') == 'Business Administration') {{ 'selected' }} @endif>Business Administration
                    </option>
                    <option value="Marketing" @if (old('specialization') == 'Marketing') {{ 'selected' }} @endif>Marketing
                    </option>
                    <option value="Finance" @if (old('specialization') == 'Finance') {{ 'selected' }} @endif>Finance
                    </option>
                    <option value="Accounting" @if (old('specialization') == 'Accounting') {{ 'selected' }} @endif>Accounting
                    </option>
                    <option value="Human Resource Management" @if (old('specialization') == 'Human Resource Management') {{ 'selected' }} @endif>Human Resource Management
                    </option>
                    <option value="Entrepreneurship" @if (old('specialization') == 'Entrepreneurship') {{ 'selected' }} @endif>Entrepreneurship
                    </option>
                    <option value="Nursing" @if (old('specialization') == 'Nursing') {{ 'selected' }} @endif>Nursing
                    </option>
                    <option value="Pharmacy" @if (old('specialization') == 'Pharmacy') {{ 'selected' }} @endif>Pharmacy
                    </option>
                    <option value="Radiologic Technology" @if (old('specialization') == 'Radiologic Technology') {{ 'selected' }} @endif>Radiologic Technology
                    </option>
                    <option value="Psychology" @if (old('specialization') == 'Psychology') {{ 'selected' }} @endif>Psychology
                    </option>
                    <option value="Political Science" @if (old('specialization') == 'Political Science') {{ 'selected' }} @endif>Political Science
                    </option>
                    <option value="Public Administration" @if (old('specialization') == 'Public Administration') {{ 'selected' }} @endif>Public Administration
                    </option>
                    <option value="others">Other (please specify)</option>
                </select>
                <div id="otherInput" style="display: none;margin-top: 10px;">
                    <input type="text" id="other_specialization" class="form-control" name="specialization1"
                        placeholder="Enter Speacialization..">
                </div>
                @error('specialization')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4 form-group">
                <label>Designation/ Occupation</label>
                <input type="text" class="form-control @error('occupation') is-invalid @enderror"
                    name="occupation" placeholder="Enter Occupation" value="{{ old('occupation') }}">
                @error('occupation')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 form-group">
                <label>Work Engagement Status</label>
                <select name="work_status" id="work_status"
                    class="form-select @error('work_status') is-invalid @enderror" value="{{ old('work_status') }}">
                    <option value=""></option>
                    <option value="Employer" @if (old('work_status') == 'Employer') {{ 'selected' }} @endif>Employer/ Company or Business Owner</option>
                    <option value="Full time" @if (old('work_status') == 'Full time') {{ 'selected' }} @endif>Full Time Employee</option>
                    <option value="Part time" @if (old('work_status') == 'Part time') {{ 'selected' }} @endif>Part Time Employee</option>
                    <option value="self-employed" @if (old('work_status') == 'self-employed') {{ 'selected' }} @endif>Self Employed</option>
                    <option value="freelance" @if (old('work_status') == 'freelance') {{ 'selected' }} @endif>Freelance Consultant/ Service Provider</option>
                    <option value="retiree" @if (old('work_status') == 'retiree') {{ 'selected' }} @endif>Retiree</option>
                    {{-- <option value="others">Others</option> --}}
                </select>
                @error('work_status')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 form-group">
                <label>How long did it take before you were employed after graduation?</label>
                <select name="before_employed" id="before_employed"
                    class="form-select @error('before_employed') is-invalid @enderror"
                    value="{{ old('before_employed') }}">
                    <option value=""></option>
                    <option value="1-3" @if (old('before_employed') == '1-3') {{ 'selected' }} @endif>One to three (1-3) months</option>
                    <option value="4-6" @if (old('before_employed') == '4-6') {{ 'selected' }} @endif>Four to six (4-6) months</option>
                    <option value="7-11" @if (old('before_employed') == '7-11') {{ 'selected' }} @endif>Seven to eleven (7-11) months</option>
                    <option value="1 year" @if (old('before_employed') == '1 year') {{ 'selected' }} @endif>One year</option>
                    <option value="1-2 years" @if (old('before_employed') == '1-2 years') {{ 'selected' }} @endif>One to two years</option>
                    <option value="2 years or more" @if (old('before_employed') == '2 years or more') {{ 'selected' }} @endif>Two years or more</option>
                    <option value="na" @if (old('before_employed') == 'na') {{ 'selected' }} @endif>N/A</option>
                </select>
                @error('before_employed')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>
        <div class="row container-fluid float-right mt-3">
            <button class="btn btn-success float-right">Submit</button>
        </div>
    </div>
</form>


@include('public.Home.footer')

<script>
    function showOtherInput() {
        var selectBox = document.getElementById('specialization');
        var otherInput = document.getElementById('otherInput');
        var otherText = document.getElementById('other_specialization');
        if (selectBox.value === 'others') {
            otherInput.style.display = 'block';
            selectBox.removeAttribute('name');
            otherText.setAttribute('name', 'specialization');

        } else {
            otherInput.style.display = 'none';
            selectBox.setAttribute('name', 'specialization');
            otherText.removeAttribute('name');
        }
    }
</script>
