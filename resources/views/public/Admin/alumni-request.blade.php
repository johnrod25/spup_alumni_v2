@include('public.Admin.header')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h3>Manage Alumni Request</h3>
                </div>
                <hr class="hr">
                <table id="example" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Full Name</th>
                            <th>Mobile Number</th>
                            <th>Age</th>
                            <th>Degree</th>
                            <th>Year Graduated</th>
                            <th>Employed</th>
                            <th>Place of Work</th>
                            <th>Organization Type</th>
                            <th>Occupation</th>
                            <th>Employment Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($datas as $data)
                            <tr class="text-capitalize">
                                <td>{{ $i++ }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->userDetails->mobile_number ?? 'N/A' }}</td>
                                <td>{{ $data->userDetails->age ?? 'N/A' }}</td>
                                <td>{{ $data->userDetails->degree ?? 'N/A' }}</td>
                                <td>{{ $data->userDetails->year_graduated ?? 'N/A' }}</td>
                                <td>{{ $data->userDetails->employed ?? 'N/A' }}</td>
                                <td>{{ $data->userDetails->place_of_work ?? 'N/A' }}</td>
                                <td>{{ $data->userDetails->organization_type ?? 'N/A' }}</td>
                                <td>{{ $data->userDetails->occupation ?? 'N/A' }}</td>
                                <td>{{ $data->userDetails->employment_status ?? 'N/A' }}</td>
                                <td class="text-center">
                                    <a data-toggle="tooltip" title="View" class="btn btn-success btn-sm"
                                        id="edit-alumni" value="{{ $data->id }}"><i class="fa fa-eye"
                                            aria-hidden="true"></i></a>
                                    <a data-toggle="tooltip" title="Approve" class="btn btn-primary btn-sm"
                                        id="approve-alumni" value="{{ $data->id }}"><i class="fa fa-thumbs-up"
                                            aria-hidden="true"></i></a>
                                    <form action="{{ route('admin-alumni-approved', $data->id) }}" method="post"
                                        class="form-hidden" id="approve-form">
                                        @csrf
                                    </form>
                                    <a data-toggle="tooltip" title="Reject" class="btn btn-danger btn-sm"
                                        id="reject-alumni" value="{{ $data->id }}"><i class="fa fa-thumbs-down"
                                            aria-hidden="true"></i></a>
                                    <form action="{{ route('admin-alumni-reject', $data->id) }}" method="post"
                                        class="form-hidden" id="reject-form">
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

<div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View Alumni Information</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="overflow-y: scroll; max-height:750px;">
                <form class="container-fluid needs-validation px-3" id="form-sched-edit" novalidate>
                    <!-- First Row -->
                    <div class="row container-fluid d-flex align-items-center justify-content-center">
                        <h5 class="text-bold col-md-12">PERSONAL INFORMATION</h5>
                        <div class="col-md-8 form-group">
                            <label>Name</label>
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                            <input type="hidden" name="user_id" id="edit_id">
                            <input type="text" class="form-control" name="name" id="edit_name" placeholder="Enter Full Name" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Current Position</label>
                            <input type="text" class="form-control" name="current_position" id="edit_current_position" placeholder="Enter Current Position" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Telephone Number</label>
                            <input type="text" class="form-control" name="telephone_number" id="edit_telephone_number" placeholder="Enter Telephone Number">
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Mobile Number</label>
                            <input type="text" class="form-control" name="mobile_number" id="edit_mobile_number" placeholder="Enter Mobile Number" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" id="edit_email" placeholder="Enter Email Address" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Sex</label>
                            <input type="text" class="form-control" name="gender" id="edit_gender" placeholder="Enter Gender/Sex" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Age</label>
                            <input type="text" class="form-control" name="age" id="edit_age" placeholder="Enter Age" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Civil Status</label>
                            <input type="text" class="form-control" name="civil_status" id="edit_civil_status" placeholder="Enter Civil Status" required>
                        </div>
                    </div>

                    <div class="row container-fluid d-flex align-items-center justify-content-center mt-3">
                        <h5 class="text-bold col-12">EDUCATIONAL BACKGROUND</h5>
                        <div class="col-md-6 form-group">
                            <label>Program(s)/Degree(s) Completed in St. Paul University</label>
                            <input type="text" class="form-control" name="degree" id="edit_degree" placeholder="Enter Program/ Degree" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>College or University</label>
                            <input type="text" class="form-control" name="college" id="edit_college" placeholder="Enter College or University">
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Year Graduated</label>
                            <input type="text" class="form-control" name="year_graduated" id="edit_year_graduated" placeholder="Enter Year Graduated" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Honor(s) or Award(s) Received</label>
                            <input type="text" class="form-control" name="awards" id="edit_awards" placeholder="Enter Honor(s) or Award(s) Received">
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Professional Examination(s) Passed</label>
                            <input type="text" class="form-control" name="exams" id="edit_exams" placeholder="Enter Professional Examination(s) Passed">
                        </div>
                    </div>

                    <div class="row container-fluid d-flex align-items-center justify-content-center mt-3">
                        <h5 class="text-bold col-12">TRAINING(S) AND ADVANCED STUDIES</h5>
                        <div class="col-md-12 form-group">
                            <label>Title of Training or Advanced Study</label>
                            <textarea class="form-control" name="training" id="edit_training" placeholder="Enter Title of Training or Advanced Study"></textarea>
                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <label>Are you presently employed?</label>
                        <input type="text" class="form-control" name="employed" id="edit_employed" placeholder="Enter Employment Status" required>
                    </div>

                    <div id="employmentDetails"  class="row container-fluid mt-3" style="display: none;">
                        <h5 class="text-bold col-12">EMPLOYMENT DATA</h5>
                        <div class="col-md-6 form-group">
                            <label>Name of Organization</label>
                            <input type="text" class="form-control" name="organization" id="edit_organization">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address" id="edit_address">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Place of Work</label>
                            <input type="text" class="form-control" name="place_of_work" id="edit_place_of_work">
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Type of Organization</label>
                            <input type="text" class="form-control" name="organization_type" id="edit_organization_type">
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Present Occupation</label>
                            <input type="text" class="form-control" name="occupation" id="edit_occupation">
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Present Employment Status</label>
                            <input type="text" class="form-control" name="employment_status" id="edit_employment_status">
                        </div>
                        <div class="col-md-6 form-group" id="form_self_employed_skills">
                            <label>Self Employed Skill</label>
                            <input type="text" class="form-control" name="self_employed_skills" id="edit_self_employed_skills">
                        </div>
                        <div class="col-md-6 form-group" id="form_business_type">
                            <label>Business Type</label>
                            <input type="text" class="form-control" name="business_type" id="edit_business_type">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Monthly Gross Income</label>
                            <input type="text" class="form-control" name="monthly_income" id="edit_monthly_income">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>First Job After College</label>
                            <input type="text" class="form-control" name="first_job" id="edit_first_job">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>First Job Level Position</label>
                            <input type="text" class="form-control" name="first_job_level" id="edit_first_job_level">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Current/Present Job Level Position</label>
                            <input type="text" class="form-control" name="current_job_level" id="edit_current_job_level">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Reason for Accepting the Job</label>
                            <input type="text" class="form-control" name="job_acceptance_reasons" id="edit_job_acceptance_reasons">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>How did you find your first job?</label>
                            <input type="text" class="form-control" name="job_finding_method" id="edit_job_finding_method">
                        </div>  
                        <div class="col-md-4 form-group">
                            <label>How long did you stay in your first job?</label>
                            <input type="text" class="form-control" name="first_job_duration" id="edit_first_job_duration">
                        </div>  
                        <div class="col-md-4 form-group">
                            <label>How long did it take you to land your first job?</label>
                            <input type="text" class="form-control" name="time_to_first_job" id="edit_time_to_first_job">
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Was the curriculum relevant to first job?</label>
                            <input type="text" class="form-control" name="curriculum_relevance" id="edit_curriculum_relevance">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>What competencies learned in college did you find very useful in your first job?</label>
                            <input type="text" class="form-control" name="useful_competencies" id="edit_useful_competencies">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>What difficulties/problems did you encounter in getting your first job?</label>
                            <input type="text" class="form-control" name="job_difficulties" id="edit_job_difficulties">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>What are the reasons for the waiting time?</label>
                            <input type="text" class="form-control" name="waiting_time_reasons" id="edit_waiting_time_reasons">
                        </div>
                        <div class="col-md-4 form-group">
                            <label>How long did it take you to find a job after graduation?</label>
                            <input type="text" class="form-control" name="time_to_find_job" id="edit_time_to_find_job">
                        </div>
                        <div class="col-md-4 form-group">
                            <label>How do you assess the relevance of your Paulinian education in the present times?</label>
                            <input type="text" class="form-control" name="paulinian_relevance" id="edit_paulinian_relevance">
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Would you recommend St. Paul University Philippines to potential students?</label>
                            <input type="text" class="form-control" name="recommend_spup" id="edit_recommend_spup">
                        </div>

                        <!-- Contribution of Paulinian Education to Well-being -->
                        <h5 class="text-bold">To what extent has your Paulinian education contributed to the development of your well-being?</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Items</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(['Advance my career', 'Enhanced technical and managerial knowledge', 'Provided professional competence and values', 'Contributed to professional prestige', 'Broadened my understanding of life', 'Molded me as a person', 'Enhanced relationship and understanding of God', 'Imbibed love and service for God and fellowmen','Other (Please describe)'] as $index => $item)
                                        <tr>
                                            <td>{{ $item }}</td>
                                            <td id="well_being_remarks{{$index}}"></td>
                                        </tr>
                                    @endforeach
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
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(['Providing financial support to SPUP’s programs and projects', 'Extending technical expertise as a resource person for training', 'Promoting SPUP in my community', 'Participating in the activities of the SPUP Alumni Association and my Alumni chapter', 'Encouraging friends and acquaintances to send their children to SPUP for schooling','Other (Please describe)'] as $index => $item)
                                        <tr>
                                            <td>{{ $item }}</td>
                                            <td id="spup_involvement_remarks{{$index}}"></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Steps to Encourage Networking with Alumni -->
                        <h5 class="text-bold">What must SPUP do to encourage and sustain its active networking with its alumni?</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Items</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(['Cultivate harmonious relations between SPUP and all its students', 'Create opportunities for interactions among alumni, students, faculty, and administration through the SPUP Alumni Association (SPUPAA)', 'Introduce a program for professional upgrading of alumni', 'Invite outstanding alumni as visiting lecturers or speakers', 'Ensure regular communication between SPUP management and the alumni through the SPUP Website', 'Recognize the accomplishments and contributions of alumni in various disciplines through an Alumni Newsletter', 'Design a variety of activities to encourage maximum participation from alumni', 'Provide incentives and benefits for alumni using SPUP services (e.g., discounts on tuition, canteen, and other services)', 'Frequently update the Alumni directory (yearly or every 2 years)','Other (Please describe)'] as $index => $item)
                                        <tr>
                                            <td>{{ $item }}</td>
                                            <td id="networking_steps_remarks{{$index}}"></td>
                                        </tr>
                                    @endforeach
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
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(['Encouraging potential students to explore admission into SPUP and introducing them to SPUP’s programs and services', 'Actively supporting the activities of the SPUPAA and my Alumni Chapter', 'Participating in the university’s promotional activities', 'Sending my siblings/children to SPUP', 'Defending and standing for SPUP when circumstances demand it', 'Being a role model in my professional and personal life', 'Being proud of and faithful to being a Paulinian', 'Taking the role of a leader in the community', 'Consistently practicing the Paulinian ideals and virtues','Other (Please describe)'] as $index => $item)
                                        <tr>
                                            <td>{{ $item }}</td>
                                            <td id="marketing_assist_remarks{{$index}}"></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Suggestions for Improving SPUP Education and Services -->
                        <h5 class="text-bold">What are your suggestions to improve the quality of education and services at St.Paul University Philippines?</h5>
                        <div class="row container-fluid">
                            <div class="col-md-12 form-group">
                                <textarea class="form-control" name="education_service_suggestions" rows="5"
                                    id="edit_education_service_suggestions"></textarea>
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@include('public.Admin.footer')

<script>
    $(document).on("click", "#edit-alumni", function(e) {
        e.preventDefault();
        var id = $(this).attr("value");
        $.ajax({
            url: "{{ route('edit-alumni') }}",
            type: "post",
            dataType: "json",
            data: {
                "_token": $('#token').val(),
                id: id
            },
            success: function(data) {
                if (data.response === 'success') {
                    $('#modal-edit').modal('show');
                    let userDetails = data.user;

                    $("#edit_id").val(userDetails.user_id);
                    $("#edit_name").val(userDetails.name);
                    $("#edit_current_position").val(userDetails.current_position);
                    $("#edit_telephone_number").val(userDetails.telephone_number);
                    $("#edit_mobile_number").val(userDetails.mobile_number);
                    $("#edit_email").val(userDetails.email);
                    $("#edit_gender").val(userDetails.gender);
                    $("#edit_age").val(userDetails.age);
                    $("#edit_civil_status").val(userDetails.civil_status);
                    $("#edit_degree").val(userDetails.degree);
                    $("#edit_college").val(userDetails.college);
                    $("#edit_year_graduated").val(userDetails.year_graduated);
                    $("#edit_awards").val(userDetails.awards);
                    $("#edit_exams").val(userDetails.exams);
                    $("#edit_training").val(userDetails.training);
                    $("#edit_employed").val(userDetails.employed);
                    $("#edit_organization").val(userDetails.organization);
                    $("#edit_address").val(userDetails.address);
                    $("#edit_place_of_work").val(userDetails.place_of_work);
                    $("#edit_organization_type").val(userDetails.organization_type);
                    $("#edit_occupation").val(userDetails.occupation);
                    $("#edit_employment_status").val(userDetails.employment_status);
                    $("#edit_self_employed_skills").val(userDetails.self_employed_skills);
                    $("#edit_business_type").val(userDetails.business_type);
                    if(userDetails.employment_status == 'Self-employed'){
                        $("#form_self_employed_skills").css('display','block');
                        $("#form_business_type").css('display','block');
                    } else {
                        $("#form_self_employed_skills").css('display','none');
                        $("#form_business_type").css('display','none');
                    }
                    $("#edit_monthly_income").val(userDetails.monthly_income);
                    if(userDetails.first_job == 'No'){
                        $("#edit_first_job").val(userDetails.first_job+', already have '+userDetails.previous_jobs_count+' jobs.');
                    } else {
                        $("#edit_first_job").val(userDetails.first_job);

                    }
                    $("#edit_first_job_level").val(userDetails.first_job_level);
                    $("#edit_current_job_level").val(userDetails.current_job_level);
                    $("#edit_job_acceptance_reasons").val(userDetails.job_acceptance_reasons);
                    $("#edit_first_job_duration").val(userDetails.first_job_duration);
                    $("#edit_job_finding_method").val(userDetails.job_finding_method);
                    $("#edit_time_to_first_job").val(userDetails.time_to_first_job);
                    $("#edit_curriculum_relevance").val(userDetails.curriculum_relevance);
                    $("#edit_useful_competencies").val(userDetails.useful_competencies);
                    $("#edit_job_difficulties").val(userDetails.job_difficulties);
                    $("#edit_time_to_find_job").val(userDetails.time_to_find_job);
                    $("#edit_waiting_time_reasons").val(userDetails.waiting_time_reasons);
                    $("#edit_paulinian_relevance").val(userDetails.paulinian_relevance);
                    $("#edit_recommend_spup").val(userDetails.recommend_spup);
                    $("#edit_recommend_spup_reason").val(userDetails.recommend_spup_reason);
                    $("#edit_well_being").val(userDetails.well_being);
                    $("#edit_education_service_suggestions").val(userDetails.education_service_suggestions);
                    let well_beings = JSON.parse(userDetails.well_being);
                    console.log(well_beings);
                    well_beings.forEach((element, index) => {
                        $("#well_being_remarks"+index).html(element);
                    });

                    let spup_involvements = JSON.parse(userDetails.spup_involvement);
                    console.log(spup_involvements);
                    spup_involvements.forEach((element, index) => {
                        $("#spup_involvement_remarks"+index).html(element);
                    });

                    let networking_steps = JSON.parse(userDetails.networking_steps);
                    console.log(networking_steps);
                    networking_steps.forEach((element, index) => {
                        $("#networking_steps_remarks"+index).html(element);
                    });

                    let marketing_assists = JSON.parse(userDetails.marketing_assist);
                    console.log(marketing_assists);
                    marketing_assists.forEach((element, index) => {
                        $("#marketing_assist_remarks"+index).html(element);
                    });





                    let form_control = document.querySelectorAll('.form-control');
                    form_control.forEach(element => {
                        element.readOnly = true;
                    });

                    toggleEmploymentDetails(userDetails.employed);
                } else {
                    errorToast(data.message);
                }
            }
        });
    });

    function toggleEmploymentDetails(value) {
        var employmentDetails = document.getElementById('employmentDetails');
        if (value === 'Yes') {
            employmentDetails.style.display = 'block';
            employmentDetails.classList.add('d-flex','align-items-center','justify-content-center');
        } else {
            employmentDetails.style.display = 'none';
            employmentDetails.classList.remove('d-flex','align-items-center','justify-content-center');

        }
    }

    $(document).on("click", "#approve-alumni", function(e) {
        e.preventDefault();
        var save = window.confirm('Are you sure you want to approve this?')
        if (save == true) {
            $('#approve-form').submit();
            successToast('Approved successfully.');
        } else {
            return false;
        }
    });
    $(document).on("click", "#reject-alumni", function(e) {
        e.preventDefault();
        var save = window.confirm('Are you sure you want to reject this?')
        if (save == true) {
            $('#reject-form').submit();
            successToast('Rejected successfully.');
        } else {
            return false;
        }
    });
</script>
