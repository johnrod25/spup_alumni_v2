@include('public.Home.header')

<div class="container my-5">
    <h1 class="mb-4">Tracer Study Questionnaire</h1>
    {{-- <div class="container my-2">
        <div class="mt-4">
            <a href="{{ asset('tracer-study-questionnaire.pdf') }}" class="btn btn-primary" download>Download PDF Here</a>
        </div>
    </div> --}}
    <form action="{{ route('tracer.study.store') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ $userDetails->id }}">

        <!-- Section A: General Information -->
        <div class="row container-fluid d-flex align-items-center justify-content-center">
            <h5 class="text-bold">A. General Information</h5>
            <div class="col-md-4 form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                       placeholder="Enter Your Name" value="{{ old('name', $userDetails->firstname . ' ' . $userDetails->middlename . ' ' . $userDetails->lastname) }}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4 form-group">
                <label for="position">Current Position:</label>
                <input type="text" class="form-control @error('position') is-invalid @enderror" id="position" name="position" placeholder="Enter Current Position" value="{{ old('position') }}">
                @error('position')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4 form-group">
                <label for="telephone">Telephone No.:</label>
                <input type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone" placeholder="Enter Telephone Number" value="{{ old('telephone') }}">
                @error('telephone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4 form-group">
                <label for="mobile">Mobile Number:</label>
                <input type="text" class="form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile"
                placeholder="Enter Mobile Number" value="{{ old('mobile') }}">
                @error('mobile')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4 form-group">
                <label for="email">Email Address:</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                placeholder="Enter Email Address" value="{{ old('email', $userDetails->email) }}">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4 form-group">
                <label for="civil_status">Civil Status:</label>
                <select class="form-select @error('civil_status') is-invalid @enderror" id="civil_status" name="civil_status">
                    <option value="single" @if (old('civil_status', $userDetails->civil_status) == 'single') selected @endif>Single</option>
                    <option value="separated" @if (old('civil_status', $userDetails->civil_status) == 'separated') selected @endif>Separated</option>
                    <option value="widow_widower" @if (old('civil_status', $userDetails->civil_status) == 'widow_widower') selected @endif>Widow/Widower</option>
                    <option value="married" @if (old('civil_status', $userDetails->civil_status) == 'married') selected @endif>Married</option>
                    <option value="single_parent" @if (old('civil_status', $userDetails->civil_status) == 'single_parent') selected @endif>Single Parent</option>
                </select>
                @error('civil_status')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 form-group">
                <label for="sex">Sex:</label>
                <select class="form-select @error('sex') is-invalid @enderror" id="sex" name="sex">
                    <option value="male" @if (old('sex', $userDetails->gender) == 'male') selected @endif>Male</option>
                    <option value="female" @if (old('sex', $userDetails->gender) == 'female') selected @endif>Female</option>
                </select>
                @error('sex')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 form-group">
                <label for="age">Age:</label>
                <select class="form-select @error('age') is-invalid @enderror" id="age" name="age">
                    <option value="21-25" @if (old('age') == '21-25') selected @endif>21–25 yrs</option>
                    <option value="26-30" @if (old('age') == '26-30') selected @endif>26–30 yrs</option>
                    <option value="31-35" @if (old('age') == '31-35') selected @endif>31–35 yrs</option>
                    <option value="36-40" @if (old('age') == '36-40') selected @endif>36–40 yrs</option>
                    <option value="41-45" @if (old('age') == '41-45') selected @endif>41–45 yrs</option>
                    <option value="46+" @if (old('age') == '46+') selected @endif>46 yrs and above</option>
                </select>
                @error('age')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Section B: Educational Background -->
        <div class="row container-fluid d-flex align-items-center justify-content-center mt-3">
        <h5 class="text-bold">B. Educational Background</h5>
        <div class="form-group">
            <label for="degree_1">Degree(s) & Specialization(s):</label>
            <input type="text" class="form-control mb-2 @error('degree_1') is-invalid @enderror" id="degree_1" name="degree_1"
                value="{{ old('degree_1') }}">
                @error('degree_1')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            <label for="college_1">College or University:</label>
            <input type="text" class="form-control mb-2 @error('college_1') is-invalid @enderror" id="college_1" name="college_1"
                value="{{ old('college_1') }}">
                @error('college_1')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            <label for="year_graduated_1">Year Graduated:</label>
            <input type="text" class="form-control mb-2 @error('year_graduated_1') is-invalid @enderror" id="year_graduated_1" name="year_graduated_1"
                value="{{ old('year_graduated_1') }}">
                @error('year_graduated_1')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            <label for="honor_1">Honor(s) or Award(s) Received:</label>
            <input type="text" class="form-control mb-2 @error('honor_1') is-invalid @enderror" id="honor_1" name="honor_1"
                value="{{ old('honor_1') }}">
                @error('honor_1')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
        </div>
        </div>

        <!-- Section C: Trainings/Advance Studies -->
        <div class="row container-fluid d-flex align-items-center justify-content-center mt-3">
        <h5 class="text-bold">C. Trainings/Advance Studies</h5>
        <div class="form-group">
            <label for="training_1">Title of Training or Advance Study:</label>
            <input type="text" class="form-control mb-2 @error('training_1') is-invalid @enderror" id="training_1" name="training_1"
                value="{{ old('training_1') }}">
                @error('training_1')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            <label for="duration_1">Duration & Credits Earned:</label>
            <input type="text" class="form-control mb-2 @error('duration_1') is-invalid @enderror" id="duration_1" name="duration_1"
                value="{{ old('duration_1') }}">
                @error('duration_1')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            <label for="institution_1">Name of Training Institution/College/University:</label>
            <input type="text" class="form-control mb-2 @error('institution_1') is-invalid @enderror" id="institution_1" name="institution_1"
                value="{{ old('institution_1') }}">
                @error('institution_1')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
        </div>
        </div>

        <!-- Section D: Employment Data -->
        <div class="row container-fluid d-flex align-items-center justify-content-center mt-3">
        <h5 class="text-bold">D. Employment Data</h5>
        <div class="form-group">
            <label for="employed">Are you presently employed?</label>
            <select class="form-select @error('employed') is-invalid @enderror" id="employed" name="employed">
                <option value="yes" @if (old('employed') == 'yes') selected @endif>Yes</option>
                <option value="no" @if (old('employed') == 'no') selected @endif>No</option>
                <option value="never_employed" @if (old('employed') == 'never_employed') selected @endif>Never Employed</option>
            </select>
            @error('employed')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Conditional fields for employed -->
        <div id="employment-details" class="d-none">
            <div class="form-group">
                <label for="organization">Name of Organization:</label>
                <input type="text" class="form-control mb-2 @error('organization') is-invalid @enderror" id="organization" name="organization">
                @error('organization')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="organization_address">Address:</label>
                <input type="text" class="form-control mb-2 @error('organization_address') is-invalid @enderror" id="organization_address" name="organization_address"
                    placeholder="Enter Organization Address" value="{{ old('organization_address') }}">
                @error('organization_address')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="place_of_work">Place of Work:</label>
                <select class="form-select @error('place_of_work') is-invalid @enderror" id="place_of_work" name="place_of_work">
                    <option value="local" @if (old('place_of_work') == 'local') selected @endif>Local</option>
                    <option value="abroad" @if (old('place_of_work') == 'abroad') selected @endif>Abroad</option>
                </select>
                @error('place_of_work')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="organization_type">Type of Organization:</label>
                <select class="form-select @error('organization_type') is-invalid @enderror" id="organization_type" name="organization_type">
                    <option value="government" @if (old('organization_type') == 'government') selected @endif>Government</option>
                    <option value="public_enterprise" @if (old('organization_type') == 'public_enterprise') selected @endif>Public Enterprise</option>
                    <option value="educational_institution" @if (old('organization_type') == 'educational_institution') selected @endif>Educational Institution</option>
                    <option value="private_enterprise" @if (old('organization_type') == 'private_enterprise') selected @endif>Private Enterprise</option>
                    <option value="non_profit" @if (old('organization_type') == 'non_profit') selected @endif>Non-Profit Organization/NGO</option>
                    <option value="international" @if (old('organization_type') == 'international') selected @endif>International Organization</option>
                    <option value="self_employed" @if (old('organization_type') == 'self_employed') selected @endif>Self-employed</option>
                    <option value="others" @if (old('organization_type') == 'others') selected @endif>Others</option>
                </select>
                @error('organization_type')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="occupation">Present Occupation:</label>
                <input type="text" class="form-control mb-2 @error('occupation') is-invalid @enderror" id="occupation" name="occupation"
                    value="{{ old('occupation') }}">
                @error('occupation')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="employment_status">Present Employment Status:</label>
                <select class="form-select @error('employment_status') is-invalid @enderror" id="employment_status" name="employment_status">
                    <option value="regular" @if (old('employment_status') == 'regular') selected @endif>Regular or Permanent</option>
                    <option value="contractual" @if (old('employment_status') == 'contractual') selected @endif>Contractual</option>
                    <option value="temporary" @if (old('employment_status') == 'temporary') selected @endif>Temporary</option>
                    <option value="self_employed" @if (old('employment_status') == 'self_employed') selected @endif>Self-employed</option>
                    <option value="casual" @if (old('employment_status') == 'casual') selected @endif>Casual</option>
                </select>
                @error('employment_status')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Conditional fields for unemployed -->
        <div id="unemployment-details" class="d-none">
            <div class="form-group">
                <label for="unemployment_reason">Reason(s) for Not Being Employed:</label>
                <select class="form-select @error('unemployment_reason') is-invalid @enderror" id="unemployment_reason" name="unemployment_reason[]" multiple>
                    <option value="further_study" @if (old('unemployment_reason') == 'further_study') selected @endif>Advance or further study needed</option>
                    <option value="no_opportunity" @if (old('unemployment_reason') == 'no_opportunity') selected @endif>No job opportunity</option>
                    <option value="family_concern" @if (old('unemployment_reason') == 'family_concern') selected @endif>Family concern and decided not to find a job</option>
                    <option value="no_job_search" @if (old('unemployment_reason') == 'no_job_search') selected @endif>Did not look for a job</option>
                    <option value="health" @if (old('unemployment_reason') == 'health') selected @endif>Health-related reason(s)</option>
                    <option value="lack_experience" @if (old('unemployment_reason') == 'lack_experience') selected @endif>Lack of work experience</option>
                    <option value="other" @if (old('unemployment_reason') == 'other') selected @endif>Other reason(s)</option>
                </select>
                @error('unemployment_reason')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        </div>

        <!-- Section E: Education and Training -->
        <div class="row container-fluid d-flex align-items-center justify-content-center mt-3">
        <h5 class="text-bold">E. Relevance of Education and Training</h5>
        <div class="form-group">
            <label for="job_relation">How would you describe the relevance of your education and training to your first job?</label>
            <select class="form-select @error('job_relation') is-invalid @enderror" id="job_relation" name="job_relation">
                <option value="highly_related" @if (old('job_relation') == 'highly_related') selected @endif>Highly Related</option>
                <option value="related" @if (old('job_relation') == 'related') selected @endif>Related</option>
                <option value="slightly_related" @if (old('job_relation') == 'slightly_related') selected @endif>Slightly Related</option>
                <option value="not_related" @if (old('job_relation') == 'not_related') selected @endif>Not Related</option>
            </select>
            @error('job_relation')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="job_skills">What skills/knowledge/attitudes did you acquire from your program that are useful in your first job?</label>
            <textarea class="form-control @error('job_skills') is-invalid @enderror" id="job_skills" name="job_skills" rows="3">{{ old('job_skills') }}</textarea>
            @error('job_skills')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>

        <!-- Section F: Present Work -->
        <div class="row container-fluid d-flex align-items-center justify-content-center mt-3">
        <h5 class="text-bold">F. Present Work</h5>
        <div class="form-group">
            <label for="work_satisfaction">How satisfied are you with your current job?</label>
            <select class="form-select @error('work_satisfaction') is-invalid @enderror" id="work_satisfaction" name="work_satisfaction">
                <option value="very_satisfied" @if (old('work_satisfaction') == 'very_satisfied') selected @endif>Very Satisfied</option>
                <option value="satisfied" @if (old('work_satisfaction') == 'satisfied') selected @endif>Satisfied</option>
                <option value="neutral" @if (old('work_satisfaction') == 'neutral') selected @endif>Neutral</option>
                <option value="dissatisfied" @if (old('work_satisfaction') == 'dissatisfied') selected @endif>Dissatisfied</option>
                <option value="very_dissatisfied" @if (old('work_satisfaction') == 'very_dissatisfied') selected @endif>Very Dissatisfied</option>
            </select>
            @error('work_satisfaction')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="job_alignment">Is your current job aligned with your course?</label>
            <select class="form-select @error('job_alignment') is-invalid @enderror" id="job_alignment" name="job_alignment">
                <option value="yes" @if (old('job_alignment') == 'yes') selected @endif>Yes</option>
                <option value="no" @if (old('job_alignment') == 'no') selected @endif>No</option>
            </select>
            @error('job_alignment')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>

        <!-- Section G: Other Information -->
        <div class="row container-fluid d-flex align-items-center justify-content-center mt-3">
        <h5 class="text-bold">G. Other Information</h5>
        <div class="form-group">
            <label for="challenges">What challenges did you face in finding a job?</label>
            <textarea class="form-control @error('challenges') is-invalid @enderror" id="challenges" name="challenges" rows="3">{{ old('challenges') }}</textarea>
            @error('challenges')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="recommendations">What recommendations can you give to improve the course you graduated from?</label>
            <textarea class="form-control @error('recommendations') is-invalid @enderror" id="recommendations" name="recommendations" rows="3">{{ old('recommendations') }}</textarea>
            @error('recommendations')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="feedback">Any additional feedback or comments:</label>
            <textarea class="form-control @error('feedback') is-invalid @enderror" id="feedback" name="feedback" rows="3">{{ old('feedback') }}</textarea>
            @error('feedback')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row container-fluid float-right mt-3">
        <button class="btn btn-success float-right">Submit</button>
    </div>
</form>
</div>

@include('public.Home.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const employmentStatus = document.getElementById('employed');
        const employmentDetails = document.getElementById('employment-details');
        const unemploymentDetails = document.getElementById('unemployment-details');

        employmentStatus.addEventListener('change', function() {
            if (this.value === 'yes') {
                employmentDetails.classList.remove('d-none');
                unemploymentDetails.classList.add('d-none');
            } else if (this.value === 'no') {
                employmentDetails.classList.add('d-none');
                unemploymentDetails.classList.remove('d-none');
            } else {
                employmentDetails.classList.add('d-none');
                unemploymentDetails.classList.add('d-none');
            }
        });

        if (employmentStatus.value === 'yes') {
            employmentDetails.classList.remove('d-none');
            unemploymentDetails.classList.add('d-none');
        } else if (employmentStatus.value === 'no') {
            employmentDetails.classList.add('d-none');
            unemploymentDetails.classList.remove('d-none');
        } else {
            employmentDetails.classList.add('d-none');
            unemploymentDetails.classList.add('d-none');
        }
    });
</script>
