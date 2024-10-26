@include('public.Admin.header')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h3>Rejected Alumni Requests</h3>
                </div>
                <hr class="hr">
                <table id="example" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Full Name</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Birthplace</th>
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
                        @foreach ($rejectedRequests as $request)
                            <tr class="text-capitalize">
                                <td>{{ $i++ }}</td>
                                <td>{{ $request->name }}</td>
                                <td>{{ $request->user->gender }}</td>
                                <td>{{ $request->email }}</td>
                                <td>{{ $request->user->phone_number }}</td>
                                <td>{{ $request->user->birthplace }}</td>
                                <td>{{ $request->user->home_address }}</td>
                                <td>{{ $request->user->degree }}</td>
                                <td>{{ $request->user->batch }}</td>
                                <td>{{ $request->user->year_graduated }}</td>
                                <td>{{ $request->created_at }}</td>
                                <td class="text-center">
                                    <a data-toggle="tooltip" title="View" class="btn btn-success btn-sm"
                                        id="edit-alumni" value="{{ $request->user_id }}"><i class="fa fa-eye"
                                            aria-hidden="true"></i></a>
                                    <a data-toggle="tooltip" title="Approve" class="btn btn-primary btn-sm"
                                        id="approve-alumni" value="{{ $request->id }}"><i class="fa fa-thumbs-up"
                                            aria-hidden="true"></i></a>
                                    <form action="{{ route('admin-alumni-approved', $request->id) }}" method="post"
                                        class="form-hidden" id="approve-form">
                                        @csrf
                                    </form>
                                    <a data-toggle="tooltip" title="Reject" class="btn btn-danger btn-sm"
                                        id="reject-alumni" value="{{ $request->id }}"><i class="fa fa-thumbs-down"
                                            aria-hidden="true"></i></a>
                                    <form action="{{ route('admin-alumni-reject', $request->id) }}" method="post"
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
                            <label>Gender/Sex</label>
                            <input type="text" name="gender" id="edit_gender"
                                placeholder="Enter Gender/Sex" class="form-select form-control" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Birthplace</label>
                            <input type="text" class="form-control" name="birthplace" id="edit_birthplace"
                                placeholder="Enter Birthplace" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Civil Status</label>
                            <input type="text" name="civil_status" id="edit_civil_status"
                                placeholder="Enter Civil Status" class="form-select form-control" required>
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
                            <label>Year Graduated</label>
                            <input type="text" id="edit_year_graduated" class="form-control"
                                name="year_graduated" placeholder="Enter Month/Year Graduated" required>
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
                                    id="edit_specialization" placeholder="Enter Specialization" required>
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Current Job Title/ Position</label>
                                <input type="text" class="form-control" name="job_title" id="edit_job_title"
                                    placeholder="Enter Current Job Title/ Position" required>
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Company Address</label>
                                <input type="text" class="form-control" name="company_address"
                                    id="edit_company_address" placeholder="Enter Company Address" required>
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Work Phone</label>
                                <input type="text" class="form-control" name="work_phone" id="edit_work_phone"
                                    placeholder="Enter Work Phone" required>
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Work Email</label>
                                <input type="text" class="form-control" name="work_email" id="edit_work_email"
                                    placeholder="Enter Work Email" required>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary" id="alumni_edit_save">Save</button>
                        </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();

        // Approve Alumni Request
        $(document).on('click', '#approve-alumni', function() {
            var id = $(this).attr('value');
            $('#approve-form').attr('action', '/admin/alumni/approved/' + id);
            $('#approve-form').submit();
        });

        // Reject Alumni Request
        $(document).on('click', '#reject-alumni', function() {
            var id = $(this).attr('value');
            $('#reject-form').attr('action', '/admin/alumni/reject/' + id);
            $('#reject-form').submit();
        });

        // View Alumni Request
        $(document).on('click', '#edit-alumni', function(e) {
            e.preventDefault();
            var id = $(this).attr('value');
            $('#modal-edit').modal('show');
            $.ajax({
                type: 'GET',
                url: '/admin/alumni/view-alumni/' + id,
                success: function(response) {
                    console.log(response);
                    $('#edit_id').val(response.alumni.user_id);
                    $('#edit_lastname').val(response.alumni.lastname);
                    $('#edit_firstname').val(response.alumni.firstname);
                    $('#edit_middlename').val(response.alumni.middlename);
                    $('#edit_gender').val(response.alumni.gender);
                    $('#edit_birthplace').val(response.alumni.birthplace);
                    $('#edit_civil_status').val(response.alumni.civil_status);
                    $('#edit_student_number').val(response.alumni.student_number);
                    $('#edit_email').val(response.alumni.email);
                    $('#edit_phone_number').val(response.alumni.phone_number);
                    $('#edit_home_address').val(response.alumni.home_address);
                    $('#edit_birthdate').val(response.alumni.birthdate);
                    $('#edit_degree').val(response.alumni.degree);
                    $('#edit_batch').val(response.alumni.batch);
                    $('#edit_involve_purpose').val(response.alumni.involve_purpose);
                    $('#edit_year_graduated').val(response.alumni.year_graduated);
                    $('#edit_company_name').val(response.alumni.company_name);
                    $('#edit_specialization').val(response.alumni.specialization);
                    $('#edit_job_title').val(response.alumni.job_title);
                    $('#edit_company_address').val(response.alumni.company_address);
                    $('#edit_work_phone').val(response.alumni.work_phone);
                    $('#edit_work_email').val(response.alumni.work_email);
                }
            });
        });

        // Update Alumni Information
        $(document).on('click', '#alumni_edit_save', function(e) {
            e.preventDefault();
            var id = $('#edit_id').val();
            var data = {
                'lastname': $('#edit_lastname').val(),
                'firstname': $('#edit_firstname').val(),
                'middlename': $('#edit_middlename').val(),
                'gender': $('#edit_gender').val(),
                'birthplace': $('#edit_birthplace').val(),
                'civil_status': $('#edit_civil_status').val(),
                'student_number': $('#edit_student_number').val(),
                'email': $('#edit_email').val(),
                'phone_number': $('#edit_phone_number').val(),
                'home_address': $('#edit_home_address').val(),
                'birthdate': $('#edit_birthdate').val(),
                'degree': $('#edit_degree').val(),
                'batch': $('#edit_batch').val(),
                'involve_purpose': $('#edit_involve_purpose').val(),
                'year_graduated': $('#edit_year_graduated').val(),
                'company_name': $('#edit_company_name').val(),
                'specialization': $('#edit_specialization').val(),
                'job_title': $('#edit_job_title').val(),
                'company_address': $('#edit_company_address').val(),
                'work_phone': $('#edit_work_phone').val(),
                'work_email': $('#edit_work_email').val(),
            }
            $.ajax({
                type: 'PUT',
                url: '/admin/alumni/update/' + id,
                data: data,
                dataType: "json",
                success: function(response) {
                    $('#modal-edit').modal('hide');
                    location.reload();
                }
            });
        });
    });
</script>
@include('public.Admin.footer')
