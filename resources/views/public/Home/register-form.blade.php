@include('public.Home.header')

<head>
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
</head>

<form class="container-fluid w-75 p-5" action="{{ route('register-form-submit') }}" method="post">
    @csrf
    @if (Session::has('success_message'))
        <div class="alert alert-success" id="success-alert">
            {{ Session::get('success_message') }}
        </div>
    @endif

    <div class="row container-fluid d-flex align-items-center justify-content-center">
        <h5 class="text-bold">PERSONAL INFORMATION</h5>
        <div class="col-md-8 form-group">
            <label>Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                placeholder="Enter Full Name" value="{{ old('name') }}">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4 form-group">
            <label>Current Position</label>
            <input type="text" class="form-control @error('current_position') is-invalid @enderror"
                name="current_position" placeholder="Enter Current Position" value="{{ old('current_position') }}">
            @error('current_position')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4 form-group">
            <label>Telephone Number</label>
            <input type="text" class="form-control @error('telephone_number') is-invalid @enderror"
                name="telephone_number" placeholder="Enter Telephone Number" value="{{ old('telephone_number') }}">
            @error('telephone_number')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4 form-group">
            <label>Mobile Number</label>
            <input type="text" class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number"
                placeholder="Enter Mobile Number" value="{{ old('mobile_number') }}">
            @error('mobile_number')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4 form-group">
            <label>Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                placeholder="Enter Email Address" value="{{ old('email') }}">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4 form-group">
            <label>Sex</label>
            <select name="gender" class="form-select @error('gender') is-invalid @enderror">
                <option value=""></option>
                <option value="Male" @if (old('gender') == 'Male') selected @endif>Male</option>
                <option value="Female" @if (old('gender') == 'Female') selected @endif>Female</option>
            </select>
            @error('gender')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4 form-group">
            <label>Age</label>
            <select name="age" class="form-select @error('age') is-invalid @enderror">
                <option value=""></option>
                <option value="21-25" @if (old('age') == '21-25') selected @endif>21-25 yrs</option>
                <option value="26-30" @if (old('age') == '26-30') selected @endif>26-30 yrs</option>
                <option value="31-35" @if (old('age') == '31-35') selected @endif>31-35 yrs</option>
                <option value="36-40" @if (old('age') == '36-40') selected @endif>36-40 yrs</option>
                <option value="41-45" @if (old('age') == '41-45') selected @endif>41-45 yrs</option>
                <option value="46+" @if (old('age') == '46+') selected @endif>46 yrs and above</option>
            </select>
            @error('age')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4 form-group">
            <label>Civil Status</label>
            <select name="civil_status" class="form-select @error('civil_status') is-invalid @enderror">
                <option value=""></option>
                <option value="Single" @if (old('civil_status') == 'Single') selected @endif>Single</option>
                <option value="Married" @if (old('civil_status') == 'Married') selected @endif>Married</option>
                <option value="Separated" @if (old('civil_status') == 'Separated') selected @endif>Separated</option>
                <option value="Widow/Widower" @if (old('civil_status') == 'Widow/Widower') selected @endif>Widow/Widower
                </option>
                <option value="Single Parent" @if (old('civil_status') == 'Single Parent') selected @endif>Single Parent
                </option>
            </select>
            @error('civil_status')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row container-fluid d-flex align-items-center justify-content-center mt-3">
        <h5 class="text-bold">EDUCATIONAL BACKGROUND</h5>
        <div class="col-md-6 form-group">
            <label>Program(s)/Degree(s) Completed in St. Paul University</label>
            <select name="degree" class="form-select @error('degree') is-invalid @enderror">
                <option value=""></option>
                @foreach($degrees as $degree)
                    <option value="{{ $degree->name }}" @if (old('degree') == $degree->name) selected @endif>
                        {{ $degree->name }}
                    </option>
                @endforeach
            </select>
            @error('degree')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6 form-group">
            <label>College or University</label>
            <input type="text" class="form-control @error('college') is-invalid @enderror" name="college"
                placeholder="Enter College or University" value="{{ old('college') }}">
            @error('college')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4 form-group">
            <label>Year Graduated</label>
            <input type="text" class="form-control @error('year_graduated') is-invalid @enderror" name="year_graduated"
                placeholder="Enter Year Graduated" value="{{ old('year_graduated') }}">
            @error('year_graduated')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4 form-group">
            <label>Honor(s) or Award(s) Received</label>
            <input type="text" class="form-control @error('awards') is-invalid @enderror" name="awards"
                placeholder="Enter Honor(s) or Award(s) Received" value="{{ old('awards') }}">
            @error('awards')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- Professional Examinations Passed -->
        <h5 class="text-bold">Professional Examinations Passed</h5>
        <div id="exams-wrapper" class="container-fluid">
            <div class="row exam-row">
                <div class="col-md-4 form-group">
                    <label>Name of Examination</label>
                    <input type="text" class="form-control" name="exam_name[]" placeholder="Enter Examination Name">
                </div>
                <div class="col-md-4 form-group">
                    <label>Date Taken</label>
                    <input type="date" class="form-control" name="exam_date[]">
                </div>
                <div class="col-md-4 form-group">
                    <label>Rating</label>
                    <input type="text" class="form-control" name="exam_rating[]" placeholder="Enter Rating">
                </div>
            </div>
        </div>
        <div class="row container-fluid mt-2">
            <div class="col-md-12">
                <button type="button" class="btn btn-success" id="add-exam-btn">Add Another Exam</button>
            </div>
        </div>

        <script>
            document.getElementById('add-exam-btn').addEventListener('click', function () {
                let examsWrapper = document.getElementById('exams-wrapper');
                let examRow = document.createElement('div');
                examRow.classList.add('row', 'exam-row');
                examRow.innerHTML = `
            <div class="col-md-4 form-group">
                <label>Name of Examination</label>
                <input type="text" class="form-control" name="exam_name[]" placeholder="Enter Examination Name">
            </div>
            <div class="col-md-4 form-group">
                <label>Date Taken</label>
                <input type="date" class="form-control" name="exam_date[]">
            </div>
            <div class="col-md-4 form-group">
                <label>Rating</label>
                <input type="text" class="form-control" name="exam_rating[]" placeholder="Enter Rating">
            </div>
        `;
                examsWrapper.appendChild(examRow);
            });
        </script>


        <div class="row container-fluid d-flex align-items-center justify-content-center mt-3">
            <h5 class="text-bold">TRAINING(S) AND ADVANCED STUDIES</h5>
            <div class="col-md-12 form-group">
                <label>Title of Training or Advanced Study</label>
                <textarea class="form-control @error('training') is-invalid @enderror" name="training"
                    placeholder="Enter Title of Training or Advanced Study">{{ old('training') }}</textarea>
                @error('training')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-12 form-group">
            <label>Are you presently employed?</label>
            <select name="employed" class="form-select @error('employed') is-invalid @enderror"
                onchange="toggleEmploymentDetails(this.value)">
                <option value=""></option>
                <option value="Yes" @if (old('employed') == 'Yes') selected @endif>Yes</option>
                <option value="No" @if (old('employed') == 'No') selected @endif>No</option>
                <option value="Never Employed" @if (old('employed') == 'Never Employed') selected @endif>Never
                    Employed</option>
            </select>
            @error('employed')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div id="employmentDetails" class="row container-fluid mt-3" style="display: none;">
            <h5 class="text-bold">EMPLOYMENT DATA</h5>
            <div class="col-md-6 form-group">
                <label>Name of Organization</label>
                <input type="text" class="form-control @error('organization') is-invalid @enderror"
                    name="organization" placeholder="Enter Name of Organization" value="{{ old('organization') }}">
                @error('organization')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 form-group">
                <label>Address</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                    placeholder="Enter Address" value="{{ old('address') }}">
                @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4 form-group">
                <label>Place of Work</label>
                <select name="place_of_work" class="form-select @error('place_of_work') is-invalid @enderror">
                    <option value=""></option>
                    <option value="Local" @if (old('place_of_work') == 'Local') selected @endif>Local</option>
                    <option value="Abroad" @if (old('place_of_work') == 'Abroad') selected @endif>Abroad</option>
                </select>
                @error('place_of_work')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4 form-group">
                <label>Type of Organization</label>
                <select name="organization_type"
                    class="form-select @error('organization_type') is-invalid @enderror">
                    <option value=""></option>
                    <option value="Government" @if (old('organization_type') == 'Government') selected @endif>
                        Government</option>
                    <option value="Public Enterprise" @if (old('organization_type') == 'Public Enterprise') selected
                    @endif>Public Enterprise</option>
                    <option value="Educational Institution" @if (old('organization_type') == 'Educational Institution') selected @endif>Educational Institution</option>
                    <option value="Private Enterprise" @if (old('organization_type') == 'Private Enterprise') selected
                    @endif>Private Enterprise</option>
                    <option value="Non-Profit Organization/NGO" @if (old('organization_type') == 'Non-Profit Organization/NGO') selected @endif>Non-Profit Organization/NGO</option>
                    <option value="International Organization" @if (old('organization_type') == 'International Organization') selected @endif>International Organization</option>
                    <option value="Self-employed" @if (old('organization_type') == 'Self-employed') selected @endif>
                        Self-employed</option>
                    {{-- <option value="Others" @if (old('organization_type')=='Others' ) selected @endif>Others
                        (please specify)</option> --}}
                </select>
                @error('organization_type')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4 form-group">
                <label>Monthly Gross Income</label>
                <select name="monthly_income" class="form-select @error('monthly_income') is-invalid @enderror">
                    <option value=""></option>
                    <option value="Below 5000" @if (old('monthly_income') == 'Below 5000') selected @endif>Below
                        P5000.00</option>
                    <option value="5000-10000" @if (old('monthly_income') == '5000-10000') selected @endif>P5000.00 to
                        less than P10000.00</option>
                    <option value="10000-15000" @if (old('monthly_income') == '10000-15000') selected @endif>P10000.00
                        to less than P15000.00</option>
                    <option value="15000-20000" @if (old('monthly_income') == '15000-20000') selected @endif>P15000.00
                        to less than P20000.00</option>
                    <option value="20000-25000" @if (old('monthly_income') == '20000-25000') selected @endif>P20000.00
                        to less than P25000.00</option>
                    <option value="25000+" @if (old('monthly_income') == '25000+') selected @endif>P25000.00 and above
                    </option>
                </select>
                @error('monthly_income')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <h5 class="text-bold">Present Employment Status</h5>
            <div class="row container-fluid">
                <div class="col-md-12 form-group">
                    <label>Employment Status</label>
                    <div>
                        <label><input type="radio" name="employment_status" value="Regular"
                                onclick="toggleSelfEmployedFields(false)"> Regular or Permanent</label>
                        <label><input type="radio" name="employment_status" value="Contractual"
                                onclick="toggleSelfEmployedFields(false)"> Contractual</label>
                        <label><input type="radio" name="employment_status" value="Temporary"
                                onclick="toggleSelfEmployedFields(false)"> Temporary</label>
                        <label><input type="radio" name="employment_status" value="Self-employed"
                                onclick="toggleSelfEmployedFields(true)"> Self-employed</label>
                        <label><input type="radio" name="employment_status" value="Casual"
                                onclick="toggleSelfEmployedFields(false)"> Casual</label>
                    </div>
                </div>
            </div>

            <div id="occupation-fields" style="display: none;">
                <div class="row container-fluid">
                    <div class="col-md-6 form-group">
                        <label>Present Occupation</label>
                        <input type="text" class="form-control" name="occupation"
                            placeholder="Enter Occupation">
                    </div>
                </div>
            </div>

            <div id="self-employed-fields" style="display: none;">

                <h5 class="text-bold">If Self-employed</h5>
                <div class="row container-fluid">
                    <div class="col-md-12 form-group">
                        <label>What skills acquired in college were you able to apply in your work?</label>
                        <input type="text" class="form-control" name="self_employed_skills"
                            placeholder="Skills acquired in college">
                    </div>
                </div>


                <div class="row container-fluid">
                    <div class="col-md-12 form-group">
                        <label>What type of business are you engaged in?</label>
                        <div class="form-check">
                            <label><input type="checkbox" name="business_type[]" value="Grains business"> Grains
                                business</label><br>
                            <label><input type="checkbox" name="business_type[]" value="Real Estate business"> Real
                                Estate business</label><br>
                            <label><input type="checkbox" name="business_type[]" value="Farming">
                                Farming</label><br>
                            <label><input type="checkbox" name="business_type[]" value="Grocery/ Sari-sari store">
                                Grocery/ Sari-sari store</label><br>
                            <label><input type="checkbox" name="business_type[]" value="Food business"> Food
                                business (eatery, restaurant, etc.)</label><br>
                            <label><input type="checkbox" name="business_type[]" value="Animal raising"> Animal
                                raising (poultry, piggery, etc.)</label><br>
                            <label><input type="checkbox" name="business_type[]" value="Trade business"> Trade
                                business (buy and sell)</label><br>
                            <label><input type="checkbox" name="business_type[]"
                                    value="Construction, design, programming"> Construction, design,
                                programming</label><br>
                            <label><input type="checkbox" name="business_type[]" value="Others"> Others (Please
                                specify)</label>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                // Toggle the display of self-employed-specific fields
                function toggleSelfEmployedFields(show) {
                    var selfEmployedFields = document.getElementById('self-employed-fields');
                    var occupationFields = document.getElementById('occupation-fields');
                    if (show) {
                        selfEmployedFields.style.display = 'block';
                        occupationFields.style.display = 'none';
                    } else {
                        occupationFields.style.display = 'block';
                        selfEmployedFields.style.display = 'none';
                    }
                }
            </script>

            <!-- First Job After College -->
            <h5 class="text-bold">First Job After College</h5>
            <div class="row container-fluid">
                <div class="col-md-12 form-group">
                    <label>Is this your first job after college?</label>
                    <div>
                        <label><input type="radio" name="first_job" value="Yes" onclick="toggleJobFields(false)">
                            Yes</label>
                        <label><input type="radio" name="first_job" value="No" onclick="toggleJobFields(true)">
                            No</label>
                    </div>
                </div>
            </div>


            <div id="previous-job-fields" style="display: none;">

                <div class="row container-fluid">
                    <div class="col-md-6 form-group">
                        <label>How many jobs have you had before your present job?</label>
                        <input type="number" class="form-control" name="previous_jobs_count"
                            placeholder="Number of previous jobs">
                    </div>
                </div>
            </div>


            <h5 class="text-bold">Job Level Position</h5>
            <div class="row container-fluid">
                <div class="col-md-6 form-group">
                    <label>First Job</label>
                    <div>
                        <label><input type="radio" name="first_job_level" value="Rank or Clerical"> Rank or
                            Clerical</label><br>
                        <label><input type="radio" name="first_job_level"
                                value="Professional, Technical, Supervisory"> Professional, Technical,
                            Supervisory</label><br>
                        <label><input type="radio" name="first_job_level" value="Managerial or Executive">
                            Managerial or Executive</label><br>
                        <label><input type="radio" name="first_job_level" value="Self-employed">
                            Self-employed</label>
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    <label>Current or Present Job</label>
                    <div>
                        <label><input type="radio" name="current_job_level" value="Rank or Clerical"> Rank or
                            Clerical</label><br>
                        <label><input type="radio" name="current_job_level"
                                value="Professional, Technical, Supervisory"> Professional, Technical,
                            Supervisory</label><br>
                        <label><input type="radio" name="current_job_level" value="Managerial or Executive">
                            Managerial or Executive</label><br>
                        <label><input type="radio" name="current_job_level" value="Self-employed">
                            Self-employed</label>
                    </div>
                </div>
            </div>


            <h5 class="text-bold">Reasons for Accepting the Job</h5>
            <div class="row container-fluid">
                <div class="col-md-12 form-group">
                    <div class="form-check">
                        <label><input type="checkbox" name="job_acceptance_reasons[]" value="salaries and benefits">
                            Salaries and benefits</label><br>
                        <label><input type="checkbox" name="job_acceptance_reasons[]" value="career challenge">
                            Career challenge</label><br>
                        <label><input type="checkbox" name="job_acceptance_reasons[]"
                                value="related to special skills"> Related to special skills</label><br>
                        <label><input type="checkbox" name="job_acceptance_reasons[]"
                                value="proximity to residence"> Proximity to residence</label><br>
                        <label><input type="checkbox" name="job_acceptance_reasons[]"
                                value="desire to acquire job experience"> Desire to acquire job
                            experience</label><br>
                        <label><input type="checkbox" name="job_acceptance_reasons[]"
                                value="my education/training is not adequate"> My education/training is not
                            adequate</label><br>
                        <label><input type="checkbox" name="job_acceptance_reasons[]"
                                value="it was the first job offered to me"> It was the first job offered to
                            me</label><br>
                        <label><input type="checkbox" name="job_acceptance_reasons[]"
                                value="I have not passed the board/professional exam required for the job"> I have
                            not passed the board/professional exam required for the job</label><br>
                        <label><input type="checkbox" name="job_acceptance_reasons[]"
                                value="no available job opening in line with my course"> No available job opening in
                            line with my course</label><br>
                        <label>Other reasons (Please specify)</label><br>
                            <input type="text" class="form-control" name="job_acceptance_reasons_other"
                            placeholder="Specify if Other">
                    </div>
                </div>
            </div>


            <script>
                function toggleJobFields(show) {
                    var previousJobFields = document.getElementById('previous-job-fields');
                    if (show) {
                        previousJobFields.style.display = 'block';
                    } else {
                        previousJobFields.style.display = 'none';
                    }
                }
            </script>
            <!-- Duration in First Job -->
            <h5 class="text-bold">How long did you stay in your first job?</h5>
            <div class="row container-fluid">
                <div class="col-md-12 form-group">
                    <div>
                        <label><input type="radio" name="first_job_duration" value="Less than a month"> Less than a
                            month</label><br>
                        <label><input type="radio" name="first_job_duration" value="1 to 6 months"> 1 to 6
                            months</label><br>
                        <label><input type="radio" name="first_job_duration" value="7 to 11 months"> 7 to 11
                            months</label><br>
                        <label><input type="radio" name="first_job_duration" value="1 year to less than 2 years"> 1
                            year to less than 2 years</label><br>
                        <label><input type="radio" name="first_job_duration" value="2 years to less than 3 years"> 2
                            years to less than 3 years</label><br>
                        <label><input type="radio" name="first_job_duration" value="3 years to less than 4 years"> 3
                            years to less than 4 years</label><br>
                        <label><input type="radio" name="first_job_duration" value=""> Other, please
                            specify</label>
                        <input type="text" class="form-control" name="first_job_duration_other"
                            placeholder="Specify if Other">
                    </div>
                </div>
            </div>

            <!-- How did you find your first job -->
            <h5 class="text-bold">How did you find your first job?</h5>
            <div class="row container-fluid">
                <div class="col-md-12 form-group">
                    <div class="form-check">
                        <label><input type="checkbox" name="job_finding_method[]"
                                value="Response to an advertisement"> Response to an advertisement</label><br>
                        <label><input type="checkbox" name="job_finding_method[]" value="As walk-in applicant"> As
                            walk-in applicant</label><br>
                        <label><input type="checkbox" name="job_finding_method[]" value="Recommended by someone">
                            Recommended by someone</label><br>
                        <label><input type="checkbox" name="job_finding_method[]" value="Information from friends">
                            Information from friends</label><br>
                        <label><input type="checkbox" name="job_finding_method[]"
                                value="Arranged by school’s job placement officer"> Arranged by school’s job
                            placement officer</label><br>
                        <label><input type="checkbox" name="job_finding_method[]" value="Family business"> Family
                            business</label><br>
                        <label><input type="checkbox" name="job_finding_method[]" value="Job Fair or PESO"> Job Fair
                            or Public Employment Service Office (PESO)</label><br>
                        <label>Others, please specify</label>
                        <input type="text" class="form-control" name="job_finding_method_other"
                            placeholder="Specify if Other">
                    </div>
                </div>
            </div>

            <!-- Time to land first job -->
            <h5 class="text-bold">How long did it take you to land your first job?</h5>
            <div class="row container-fluid">
                <div class="col-md-12 form-group">
                    <div>
                        <label><input type="radio" name="time_to_first_job" value="Less than a month"> Less than a
                            month</label><br>
                        <label><input type="radio" name="time_to_first_job" value="1 to 6 months"> 1 to 6
                            months</label><br>
                        <label><input type="radio" name="time_to_first_job" value="7 to 11 months"> 7 to 11
                            months</label><br>
                        <label><input type="radio" name="time_to_first_job" value="1 year to less than 2 years"> 1
                            year to less than 2 years</label><br>
                        <label><input type="radio" name="time_to_first_job" value="2 years to less than 3 years"> 2
                            years to less than 3 years</label><br>
                        <label><input type="radio" name="time_to_first_job" value=""> Other, please
                            specify</label>
                        <input type="text" class="form-control" name="time_to_first_job_other"
                            placeholder="Specify if Other">
                    </div>
                </div>
            </div>

            <!-- Curriculum Relevance -->
            <h5 class="text-bold">Was the curriculum you had in college relevant to your first job?</h5>
            <div class="row container-fluid">
                <div class="col-md-12 form-group">
                    <label><input type="radio" name="curriculum_relevance" value="Yes"> Yes</label>
                    <label><input type="radio" name="curriculum_relevance" value="No"> No</label>
                </div>
            </div>

            <!-- Competencies Learned in College -->
            <h5 class="text-bold">What competencies learned in college did you find very useful in your first job?
            </h5>
            <div class="row container-fluid">
                <div class="col-md-12 form-group">
                    <div class="form-check">
                        <label><input type="checkbox" name="useful_competencies[]" value="Communication skills">
                            Communication skills</label><br>
                        <label><input type="checkbox" name="useful_competencies[]" value="Human Relations skills">
                            Human Relations skills</label><br>
                        <label><input type="checkbox" name="useful_competencies[]" value="Entrepreneurial skills">
                            Entrepreneurial skills</label><br>
                        <label><input type="checkbox" name="useful_competencies[]"
                                value="Information Technology skills"> Information Technology skills</label><br>
                        <label><input type="checkbox" name="useful_competencies[]" value="Problem-solving skills">
                            Problem-solving skills</label><br>
                        <label><input type="checkbox" name="useful_competencies[]" value="Critical Thinking skills">
                            Critical Thinking skills</label><br>
                        <label>Other skills, please specify</label>
                        <input type="text" class="form-control" name="useful_competencies_other"
                            placeholder="Specify if Other">
                    </div>
                </div>
            </div>

            <!-- Difficulties in Getting First Job -->
            <h5 class="text-bold">What difficulties/problems did you encounter in getting your first job?</h5>
            <div class="row container-fluid">
                <div class="col-md-12 form-group">
                    <div class="form-check">
                        <label><input type="checkbox" name="job_difficulties[]"
                                value="Inability to communicate in the English language"> Inability to communicate
                            in the English language</label><br>
                        <label><input type="checkbox" name="job_difficulties[]"
                                value="Lack of preparation for the interview and competitive exams"> Lack of
                            preparation for the interview and competitive exams</label><br>
                        <label><input type="checkbox" name="job_difficulties[]"
                                value="Keen competition among the applicants"> Keen competition among the
                            applicants</label><br>
                        <label><input type="checkbox" name="job_difficulties[]"
                                value="Failure to find influential persons with proper connections"> Failure to find
                            influential persons with proper connections</label><br>
                        <label><input type="checkbox" name="job_difficulties[]"
                                value="Employer’s preference for single applicants"> Employer’s preference for
                            single applicants</label><br>
                        <label><input type="checkbox" name="job_difficulties[]" value="Lack of experience"> Lack of
                            experience</label><br>
                        <label>Other (please specify)</label>
                        <input type="text" class="form-control" name="job_difficulties_other"
                            placeholder="Specify if Other">
                    </div>
                </div>
            </div>

            <!-- Time to Find Job After Graduation -->
            <h5 class="text-bold">How long did it take you to find a job after graduation?</h5>
            <div class="row container-fluid">
                <div class="col-md-12 form-group">
                    <div>
                        <label><input type="radio" name="time_to_find_job" value="Less than 2 months"> Less than 2
                            months</label><br>
                        <label><input type="radio" name="time_to_find_job" value="After 2-4 months"> After 2-4
                            months</label><br>
                        <label><input type="radio" name="time_to_find_job" value="After 5-10 months"> After 5-10
                            months</label><br>
                        <label><input type="radio" name="time_to_find_job" value="One year after graduation"> One
                            year after graduation</label><br>
                        <label><input type="radio" name="time_to_find_job"
                                value="More than one year but not beyond two years"> More than one year but not
                            beyond two years</label><br>
                        <label><input type="radio" name="time_to_find_job" value=""> Other, please
                            specify</label>
                        <input type="text" class="form-control" name="time_to_find_job_other"
                            placeholder="Specify if Other">
                    </div>
                </div>
            </div>

            <!-- Reasons for Waiting Time -->
            <h5 class="text-bold">What are the reasons for the waiting time?</h5>
            <div class="row container-fluid">
                <div class="col-md-12 form-group">
                    <div class="form-check">
                        <label><input type="checkbox" name="waiting_time_reasons[]"
                                value="Processing of credentials"> Processing of credentials</label><br>
                        <label><input type="checkbox" name="waiting_time_reasons[]" value="Processing of license">
                            Processing of license</label><br>
                    </div>
                </div>
            </div>

            <!-- Assessment of Relevance of Paulinian Education -->
            <h5 class="text-bold">How do you assess the relevance of your Paulinian education in the present times?
            </h5>
            <div class="row container-fluid">
                <div class="col-md-12 form-group">
                    <label><input type="radio" name="paulinian_relevance" value="Very relevant"> Very
                        relevant</label><br>
                    <label><input type="radio" name="paulinian_relevance" value="Somewhat relevant"> Somewhat
                        relevant</label><br>
                    <label><input type="radio" name="paulinian_relevance" value="Relevant"> Relevant</label><br>
                    <label><input type="radio" name="paulinian_relevance" value="Not relevant"> Not relevant</label>
                </div>
            </div>

            <!-- Recommendation of SPUP -->
            <h5 class="text-bold">Would you recommend St. Paul University Philippines to potential students?</h5>
            <div class="row container-fluid">
                <div class="col-md-12 form-group">
                    <label><input type="radio" name="recommend_spup" value="Definitely"> Definitely</label><br>
                    <label><input type="radio" name="recommend_spup" value="Probably"> Probably</label><br>
                    <label><input type="radio" name="recommend_spup" value="Not sure"> Not sure</label><br>
                    <label><input type="radio" name="recommend_spup" value="Definitely not"> Definitely
                        not</label><br>
                    <textarea class="form-control" name="recommend_spup_reason"
                        placeholder="Why or why not?"></textarea>
                </div>
            </div>

            <!-- Contribution of Paulinian Education to Well-being -->
            <h5 class="text-bold">To what extent has your Paulinian education contributed to the development of your
                well-being?</h5>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Items</th>
                            <th>Great Extent</th>
                            <th>Average Extent</th>
                            <th>Least Extent</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(['Advance my career', 'Enhanced technical and managerial knowledge', 'Provided professional competence and values', 'Contributed to professional prestige', 'Broadened my understanding of life', 'Molded me as a person', 'Enhanced relationship and understanding of God', 'Imbibed love and service for God and fellowmen'] as $index => $item)
                            <tr>
                                <td>{{ $item }}</td>
                                <td><input type="radio" name="well_being[{{ $index }}]" value="Great Extent"></td>
                                <td><input type="radio" name="well_being[{{ $index }}]" value="Average Extent"></td>
                                <td><input type="radio" name="well_being[{{ $index }}]" value="Least Extent"></td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>Other (Please describe)</td>
                            <td colspan="3"><input type="text" class="form-control" name="well_being_other"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Involvement in SPUP Affairs -->
            <h5 class="text-bold">How do you think you can get yourself involved in SPUP affairs?</h5>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Items</th>
                            <th>High Priority</th>
                            <th>Average Priority</th>
                            <th>Low Priority</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(['Providing financial support to SPUP’s programs and projects', 'Extending technical expertise as a resource person for training', 'Promoting SPUP in my community', 'Participating in the activities of the SPUP Alumni Association and my Alumni chapter', 'Encouraging friends and acquaintances to send their children to SPUP for schooling'] as $index => $item)
                            <tr>
                                <td>{{ $item }}</td>
                                <td><input type="radio" name="spup_involvement[{{ $index }}]" value="High Priority">
                                </td>
                                <td><input type="radio" name="spup_involvement[{{ $index }}]" value="Average Priority">
                                </td>
                                <td><input type="radio" name="spup_involvement[{{ $index }}]" value="Low Priority"></td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>Other (Please describe)</td>
                            <td colspan="3">
                                <input type="text" class="form-control" name="spup_involvement_other"
                                    placeholder="Specify if Other">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Steps to Encourage Networking with Alumni -->
            <h5 class="text-bold">What must SPUP do to encourage and sustain its active networking with its alumni?
            </h5>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Items</th>
                            <th>Most Important Step</th>
                            <th>Important Step</th>
                            <th>Least Important Step</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(['Cultivate harmonious relations between SPUP and all its students', 'Create opportunities for interactions among alumni, students, faculty, and administration through the SPUP Alumni Association (SPUPAA)', 'Introduce a program for professional upgrading of alumni', 'Invite outstanding alumni as visiting lecturers or speakers', 'Ensure regular communication between SPUP management and the alumni through the SPUP Website', 'Recognize the accomplishments and contributions of alumni in various disciplines through an Alumni Newsletter', 'Design a variety of activities to encourage maximum participation from alumni', 'Provide incentives and benefits for alumni using SPUP services (e.g., discounts on tuition, canteen, and other services)', 'Frequently update the Alumni directory (yearly or every 2 years)'] as $index => $item)
                            <tr>
                                <td>{{ $item }}</td>
                                <td><input type="radio" name="networking_steps[{{ $index }}]"
                                        value="Most Important Step"></td>
                                <td><input type="radio" name="networking_steps[{{ $index }}]" value="Important Step">
                                </td>
                                <td><input type="radio" name="networking_steps[{{ $index }}]"
                                        value="Least Important Step"></td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>Other (Please describe)</td>
                            <td colspan="3">
                                <input type="text" class="form-control" name="networking_steps_other"
                                    placeholder="Specify if Other">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Assisting in SPUP's Marketing Program -->
            <h5 class="text-bold">How can you assist in SPUP’s extensive marketing program?</h5>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Items</th>
                            <th>Most Interested</th>
                            <th>Interested</th>
                            <th>Least Interested</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(['Encouraging potential students to explore admission into SPUP and introducing them to SPUP’s programs and services', 'Actively supporting the activities of the SPUPAA and my Alumni Chapter', 'Participating in the university’s promotional activities', 'Sending my siblings/children to SPUP', 'Defending and standing for SPUP when circumstances demand it', 'Being a role model in my professional and personal life', 'Being proud of and faithful to being a Paulinian', 'Taking the role of a leader in the community', 'Consistently practicing the Paulinian ideals and virtues'] as $index => $item)
                            <tr>
                                <td>{{ $item }}</td>
                                <td><input type="radio" name="marketing_assist[{{ $index }}]" value="Most Interested">
                                </td>
                                <td><input type="radio" name="marketing_assist[{{ $index }}]" value="Interested"></td>
                                <td><input type="radio" name="marketing_assist[{{ $index }}]" value="Least Interested">
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>Other (Please describe)</td>
                            <td colspan="3">
                                <input type="text" class="form-control" name="marketing_assist_other"
                                    placeholder="Specify if Other">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Suggestions for Improving SPUP Education and Services -->
            <h5 class="text-bold">What are your suggestions to improve the quality of education and services at St.
                Paul University Philippines?</h5>
            <div class="row container-fluid">
                <div class="col-md-12 form-group">
                    <textarea class="form-control" name="education_service_suggestions" rows="5"
                        placeholder="Write your suggestions here..."></textarea>
                </div>
            </div>
        </div>
        <div class="row container-fluid float-right my-3">
            <button class="btn btn-success float-right">Submit</button>
        </div>
</form>
<br></br>

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

    function toggleEmploymentDetails(value) {
        var employmentDetails = document.getElementById('employmentDetails');
        var occupationDetails = document.getElementById('occupationDetails');
        if (value === 'Yes') {
            employmentDetails.style.display = 'block';
            employmentDetails.classList.add('d-flex','align-items-center','justify-content-center');
            occupationDetails.style.display = 'none';
            occupationDetails.classList.remove('d-flex','align-items-center','justify-content-center');
        } else {
            occupationDetails.style.display = 'block';
            occupationDetails.classList.add('d-flex','align-items-center','justify-content-center');
            employmentDetails.style.display = 'none';
            employmentDetails.classList.remove('d-flex','align-items-center','justify-content-center');
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        let successAlert = document.getElementById('success-alert');
        let errorAlerts = document.querySelectorAll('.alert-danger');

        if (successAlert) {
            setTimeout(() => {
                successAlert.style.display = 'none';
            }, 5000); // 5000ms = 5 seconds
        }

        errorAlerts.forEach((errorAlert) => {
            setTimeout(() => {
                errorAlert.style.display = 'none';
            }, 3000); // 3000ms = 3 seconds
        });
    });
</script>