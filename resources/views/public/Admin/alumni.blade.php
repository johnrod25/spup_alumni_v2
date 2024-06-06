@include('public.Admin.header')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h3>Manage Alumni</h3>
                </div>
                <hr class="hr">
                <table id="example" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Home Address</th>
                            <th>Degree</th>
                            <th>Batch</th>
                            <th>Year Graduated</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($datas as $data)
                            <tr class="text-capitalize">
                                <td>{{ $i++ }}</td>

                                <td>{{ $data->name }}</td>
                                <td>{{ $data->username }}</td>
                                <td>{{ $data->user->phone_number }}</td>
                                <td>{{ $data->user->home_address }}</td>
                                <td>{{ $data->user->degree }}</td>
                                <td>{{ $data->user->batch }}</td>
                                <td>{{ $data->user->year_graduated }}</td>
                                <td>{{ $data->created_at }}</td>
                                <td class="text-center">
                                    <a data-toggle="tooltip" title="Edit" class="btn btn-primary btn-sm"
                                        id="edit-alumni" value="{{ $data->user_id }}"><i class="fa fa-edit"
                                            aria-hidden="true"></i></a>
                                    <a data-toggle="tooltip" title="Delete" class="btn btn-danger btn-sm"
                                        id="delete-alumni" value="{{ $data->id }}"><i class="fa fa-trash"
                                            aria-hidden="true"></i></a>
                                    <form action="{{ route('delete-alumni', $data->id) }}" method="post"
                                        class="form-hidden" id="delete-form">
                                        {{-- <button class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button> --}}
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
                <h4 class="modal-title">Edit Alumni Information</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="container-fluid needs-validation px-3" id="form-sched-edit" novalidate>
                    <!-- First Row -->
                    <div class="row container-fluid d-flex align-items-center justify-content-center">
                        <h5 class="text-bold col-md-12">PERSONAL INFORMATION</h5>
                        <div class="col-md-4 form-group">
                            <label>Last Name</label>
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                            <input type="hidden" name="user_id" id="edit_id">
                            <input type="text" class="form-control" name="lastname" id="edit_lastname"
                                placeholder="Enter Last Name" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="firstname" id="edit_firstname"
                                placeholder="Enter First Name" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Middle Name</label>
                            <input type="text" class="form-control" name="middlename" id="edit_middlename"
                                placeholder="Enter Middle Name" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Student Number(Optional)</label>
                            <input type="text" class="form-control" name="student_number" id="edit_student_number"
                                placeholder="Enter Student Number" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" id="edit_email"
                                placeholder="Enter Email Address" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" name="phone_number" id="edit_phone_number"
                                placeholder="Enter Phone Number" required>
                        </div>
                        <div class="col-md-8 form-group">
                            <label>Home Address</label>
                            <input type="text" class="form-control" name="home_address" id="edit_home_address"
                                placeholder="Enter Home Address" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Birth Date</label>
                            <input type="date" class="form-control" name="birthdate" id="edit_birthdate"
                                placeholder="Enter Birth Date" required>
                        </div>
                    </div>
                    <div class="row container-fluid d-flex align-items-center justify-content-center mt-3">
                        <h5 class="text-bold col-12">ACADEMIC PROGRAM/ DEGREE IN ST.PAUL UNIVERSITY PHILIPPINES</h5>
                        <div class="col-md-6 form-group">
                            <label>Program(s)/Degree(s) Completed in St. Paul University</label>
                            <select name="degree" id="edit_degree" placeholder="Enter Program/ Degree"
                                class="form-select form-control" required>
                                <option value=""></option>
                                <option value="Bachelor of Arts in English Language Studies">Bachelor of Arts in
                                    English Language Studies</option>
                                <option value="Bachelor of Science in Psychology">Bachelor of Science in Psychology
                                </option>
                                <option value="Bachelor of Science in Biology">Bachelor of Science in Biology</option>
                                <option value="Bachelor of Science in Social Work">Bachelor of Science in Social Work
                                </option>
                                <option value="Bachelor of Science in Public Administration">Bachelor of Science in
                                    Public Administration</option>
                                <option value="Bachelor of Science in Biology Major in MicroBiology">Bachelor of
                                    Science in Biology Major in MicroBiology</option>
                                <option value="Bachelor of Secondary Education">Bachelor of Secondary Education
                                </option>
                                <option value="Bachelor of Elementary Education">Bachelor of Elementary Education
                                </option>
                                <option value="Bachelor of Physical Education">Bachelor of Physical Education</option>
                                <option value="Bachelor of Science in Accountancy">Bachelor of Science in Accountancy
                                </option>
                                <option value="Bachelor of Science in Entrepreneurship">Bachelor of Science in
                                    Entrepreneurship</option>
                                <option
                                    value="Bachelor of Science in Business Administration major in: Marketing Management, Financial Management and Operations Management">
                                    Bachelor of Science in Business Administration major in: Marketing Management,
                                    Financial Management and Operations Management</option>
                                <option value="Bachelor of Science in Management Accounting">Bachelor of Science in
                                    Management Accounting</option>
                                <option value="Bachelor of Science in Hospitality Management">Bachelor of Science in
                                    Hospitality Management</option>
                                <option value="Bachelor of Science in Tourism Management">Bachelor of Science in
                                    Tourism Management</option>
                                <option value="Bachelor of Science in Product Design and Marketing Innovation">Bachelor
                                    of Science in Product Design and Marketing Innovation</option>
                                <option value="Bachelor of Science in Information Technology">Bachelor of Science in
                                    Information Technology</option>
                                <option value="Bachelor of Library and Information Science">Bachelor of Library and
                                    Information Science</option>
                                <option value="Bachelor of Science in Civil Engineering">Bachelor of Science in Civil
                                    Engineering</option>
                                <option value="Bachelor of Science in Environmental and Sanitary Engineering">Bachelor
                                    of Science in Environmental and Sanitary Engineering</option>
                                <option value="Bachelor of Science in Computer Engineering">Bachelor of Science in
                                    Computer Engineering</option>
                                <option value="Bachelor of Science in Nursing">Bachelor of Science in Nursing</option>
                                <option value="Bachelor of Science in Pharmacy">Bachelor of Science in Pharmacy
                                </option>
                                <option value="Bachelor of Science in Medical Technology">Bachelor of Science in
                                    Medical Technology</option>
                                <option value="Bachelor of Science in Physical Therapy">Bachelor of Science in Physical
                                    Therapy</option>
                                <option value="Bachelor of Science in Radiologic Technology">Bachelor of Science in
                                    Radiologic Technology</option>
                                <option value="Bachelor of Science in Midwifery">Bachelor of Science in Midwifery
                                </option>
                                <option value="Doctor of Medicine">Doctor of Medicine</option>
                            </select>
                            {{-- <input type="text" class="form-control" name="degree" placeholder="Enter Program/ Degree" required> --}}
                        </div>
                        <div class="col-md-6 form-group">
                            <label>What Batch(es) do you belong?</label>
                            {{-- <select name="batch" id="edit_batch" placeholder="Select batch" class="form-select form-control" required>
                                <option value=""></option>
                                <option value="HS BATCH78">HS BATCH78</option>
                                <option value="BSN BATCH90">BSN BATCH90</option>
                                <option value="MBA BATCH2009">MBA BATCH2009</option>
                            </select> --}}
                            <input type="text" id="edit_batch" class="form-control" name="batch"
                                placeholder="EG. HS BATCH78; BSN BATCH90; MBA BATCH2009,ETC." required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Please indicate how you would want to br involved in your Alma Mater</label>
                            <select name="involve_purpose" id="edit_involve_purpose"
                                placeholder="Please indicate how you would want to br involved in your Alma Mater"
                                class="form-select form-control" required>
                                <option value=""></option>
                                <option value="Consultant">Consultant</option>
                                <option value="Resource Speaker">Resource Speaker</option>
                                <option value="Standing Committee Member">Standing Committee Member</option>
                                <option value="Advisory Committee Member">Advisory Committee Member</option>
                                <option value="Part-time Faculty">Part-time Faculty</option>
                                <option value="Panel member in Theses/Dissertation Validation">Panel member in
                                    Theses/Dissertation
                                    Validation</option>
                                <option value="Marketing Campaign">Marketing Campaign</option>
                                <option value="Mentoring Current Students">Mentoring Current Students</option>
                                <option value="Supporting recent graduates as they start their career.">Supporting
                                    recent graduates as
                                    they start their career.</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Year Graduated/ Last Year Attended</label>
                            <input type="date" id="edit_year_graduated" class="form-control"
                                name="year_graduated" placeholder="Enter Year Graduated/ Last Year Attended" required>
                        </div>
                        <div class="row container-fluid d-flex align-items-center justify-content-center mt-3">
                            <h5 class="text-bold col-12">ABOUT YOUR WORK</h5>
                            <div class="col-md-4 form-group">
                                <label>Company Name/ Employer</label>
                                <input type="text" class="form-control" name="company_name"
                                    id="edit_company_name" placeholder="Enter Company Name/ Employer" required>
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Specialization/ Expertise/ Industry</label>
                                <input type="text" class="form-control" name="specialization"
                                    id="edit_specialization" placeholder="Enter Speacialization.." required>
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Designation/ Occupation</label>
                                <input type="text" class="form-control" name="occupation" id="edit_occupation"
                                    placeholder="Enter ..." required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Work Engagement Status</label>
                                <select name="work_status" id="edit_work_status" class="form-select form-control"
                                    required>
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
                                <select name="before_employed" id="edit_before_employed"
                                    class="form-select form-control" required>
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
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="update-alumni">Update new</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@include('public.Admin.footer')

<script>
    $(document).on("click", "#add-new", function(e) {
        e.preventDefault();
        let image = document.getElementById('image');
        let title = $("#title").val();
        let content = $("#content").val();
        if (image.files.length == 0) {
            errorToast("Image field is required");
        } else {
            let formData = new FormData();
            formData.append('_token', $('#token').val());
            formData.append('image', image.files[0]);
            formData.append('title', title);
            formData.append('content', content);
            $.ajax({
                url: '{{ route('add-news') }}',
                type: "post",
                dataType: "json",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    // let data = JSON.stringify(response);
                    if (data.response == "success") {
                        $('#modal-news').modal('hide')
                        $("#form-sched")[0].reset();
                        // successToast(data.message);
                        localStorage.setItem("Notif", JSON.stringify(data));
                        window.location.reload();
                    } else {
                        errorToast(data.message);
                    }
                },
                error: function(response) {
                    // console.log(response)
                    errorToast(response.responseJSON.message);
                }
            });
        }
    });

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
                    $("#edit_id").val(data.user[0].user_id);
                    $("#edit_lastname").val(data.user[0].user.lastname);
                    $("#edit_firstname").val(data.user[0].user.firstname);
                    $("#edit_middlename").val(data.user[0].user.middlename);
                    $("#edit_student_number").val(data.user[0].user.student_number);
                    $("#edit_email").val(data.user[0].user.email);
                    $("#edit_phone_number").val(data.user[0].user.phone_number);
                    $("#edit_home_address").val(data.user[0].user.home_address);
                    $("#edit_birthdate").val(data.user[0].user.birthdate);
                    $("#edit_degree").val(data.user[0].user.degree);
                    $("#edit_batch").val(data.user[0].user.batch);
                    $("#edit_involve_purpose").val(data.user[0].user.involve_purpose);
                    $("#edit_year_graduated").val(data.user[0].user.year_graduated);
                    $("#edit_company_name").val(data.user[0].user.company_name);
                    $("#edit_specialization").val(data.user[0].user.specialization);
                    $("#edit_occupation").val(data.user[0].user.occupation);
                    $("#edit_work_status").val(data.user[0].user.work_status);
                    $("#edit_before_employed").val(data.user[0].user.before_employed);
                } else {
                    errorToast(data.message);
                }
            }
        });

    });

    $(document).on("click", "#update-alumni", function(e) {
        e.preventDefault();
        let edit_id = $("#edit_id").val();
        let formData = new FormData();
        formData.append('_token', $('#token').val());
        formData.append('id', edit_id);
        formData.append('lastname', $("#edit_lastname").val());
        formData.append('firstname', $("#edit_firstname").val());
        formData.append('middlename', $("#edit_middlename").val());
        formData.append('student_number', $("#edit_student_number").val());
        formData.append('email', $("#edit_email").val());
        formData.append('phone_number', $("#edit_phone_number").val());
        formData.append('home_address', $("#edit_home_address").val());
        formData.append('birthdate', $("#edit_birthdate").val());
        formData.append('degree', $("#edit_degree").val());
        formData.append('batch', $("#edit_batch").val());
        formData.append('involve_purpose', $("#edit_involve_purpose").val());
        formData.append('year_graduated', $("#edit_year_graduated").val());
        formData.append('company_name', $("#edit_company_name").val());
        formData.append('specialization', $("#edit_specialization").val());
        formData.append('occupation', $("#edit_occupation").val());
        formData.append('work_status', $("#edit_work_status").val());
        formData.append('before_employed', $("#edit_before_employed").val());

        $.ajax({
            url: "{{ route('update-alumni') }}",
            type: "post",
            dataType: "json",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.response === 'success') {
                    $('#modal-edit').modal('hide');
                    localStorage.setItem("Notif", JSON.stringify(data));
                    window.location.reload();
                } else {
                    errorToast(data.message);
                }
            }
        });
    });

    $(document).on("click", "#delete-alumni", function(e) {
        e.preventDefault();
        var save = window.confirm('Are you sure you want to delete this?')
        if (save == true) {
            $('#delete-form').submit();
            successToast('Deleted successfully.');
        } else {
            return false;
        }
    });
</script>
