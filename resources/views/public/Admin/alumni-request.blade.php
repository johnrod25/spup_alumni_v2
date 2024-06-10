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
                                    <a data-toggle="tooltip" title="View" class="btn btn-success btn-sm"
                                        id="edit-alumni" value="{{ $data->user_id }}"><i class="fa fa-eye"
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
                            <input type="text" name="degree" id="edit_degree"
                                placeholder="Enter Program/ Degree" class="form-select form-control" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>What Batch(es) do you belong?</label>
                            <input type="text" id="edit_batch" class="form-control" name="batch"
                                placeholder="EG. HS BATCH78; BSN BATCH90; MBA BATCH2009,ETC." required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Please indicate how you would want to br involved in your Alma Mater</label>
                            <input type="text" name="involve_purpose" id="edit_involve_purpose"
                                placeholder="Please indicate how you would want to br involved in your Alma Mater"
                                class="form-select form-control" required>
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
                                <input type="text" name="work_status" id="edit_work_status"
                                    class="form-select form-control" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>How long did it take before you were employed after graduation?</label>
                                <input type="text" name="before_employed" id="edit_before_employed"
                                    class="form-select form-control" required>
                                </select>
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
                    let form_control = document.querySelectorAll('.form-control');
                    form_control.forEach(element => {
                        element.readOnly = true;
                    });
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
            successToast('Reject successfully.');
        } else {
            return false;
        }
    });
</script>
