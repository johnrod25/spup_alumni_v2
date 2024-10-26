@include('public.Admin.header')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h3>Manage Alumni</h3>
                    <div>
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sort By Degree
                        </button>
                        <div class="dropdown-menu" id="degree-sort-options">
                            <!-- Degrees will be dynamically loaded here -->
                        </div>
                        <a href="{{ route('generate.pdf') }}" class="btn btn-primary">Generate PDF</a>
                    </div>
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
                            {{-- <th>Occupation</th> --}}
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
                                {{-- <td>{{ $data->userDetails->occupation ?? 'N/A' }}</td> --}}
                                <td>{{ $data->userDetails->employment_status ?? 'N/A' }}</td>
                                <td class="text-center">
                                    <a data-toggle="tooltip" title="Edit" class="btn btn-primary btn-sm edit-alumni" value="{{ $data->id }}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <form action="{{ route('delete-alumni', $data->id) }}" method="post" class="d-inline delete-form">
                                        @csrf
                                        <button type="submit" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-sm delete-alumni" value="{{ $data->id }}"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
                <h4 class="modal-title">SPUP Alumni Information</h4>
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

                    <div class="row container-fluid d-flex align-items-center justify-content-center mt-3">
                        <h5 class="text-bold col-12">EMPLOYMENT DATA</h5>
                        <div class="col-md-4 form-group">
                            <label>Are you presently employed?</label>
                            <input type="text" class="form-control" name="employed" id="edit_employed" placeholder="Enter Employment Status" required>
                        </div>
                        <div id="employmentDetails" class="w-100" style="display: none;">
                            <div class="col-md-6 form-group">
                                <label>Name of Organization</label>
                                <input type="text" class="form-control" name="organization" id="edit_organization" placeholder="Enter Name of Organization">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" id="edit_address" placeholder="Enter Address">
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Place of Work</label>
                                <input type="text" class="form-control" name="place_of_work" id="edit_place_of_work" placeholder="Enter Place of Work">
                            </div>
                            <div class="col-md4 form-group">
                                <label>Type of Organization</label>
                                <input type="text" class="form-control" name="organization_type" id="edit_organization_type" placeholder="Enter Type of Organization">
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Present Occupation</label>
                                <input type="text" class="form-control" name="occupation" id="edit_occupation" placeholder="Enter Occupation">
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Present Employment Status</label>
                                <input type="text" class="form-control" name="employment_status" id="edit_employment_status" placeholder="Enter Employment Status">
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Monthly Gross Income</label>
                                <input type="text" class="form-control" name="monthly_income" id="edit_monthly_income" placeholder="Enter Monthly Gross Income">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#" id="generate-pdf" class="btn btn-primary">Generate PDF</a>
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
    $(document).on("click", ".edit-alumni", function(e) {
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
                    $("#edit_monthly_income").val(userDetails.monthly_income);

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


    $(document).on("click", ".edit-alumni", function(e) {
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

                    // Set the href for the Generate PDF button
                    $('#generate-pdf').attr('href', '/alumni/' + userDetails.user_id + '/pdf');

                    // Populate the form with the rest of the alumni data...
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
        } else {
            employmentDetails.style.display = 'none';
        }
    }

    $(document).on("click", "#update-alumni", function(e) {
        e.preventDefault();
        let edit_id = $("#edit_id").val();
        let formData = new FormData();
        formData.append('_token', $('#token').val());
        formData.append('id', edit_id);
        formData.append('name', $("#edit_name").val());
        formData.append('current_position', $("#edit_current_position").val());
        formData.append('telephone_number', $("#edit_telephone_number").val());
        formData.append('mobile_number', $("#edit_mobile_number").val());
        formData.append('email', $("#edit_email").val());
        formData.append('gender', $("#edit_gender").val());
        formData.append('age', $("#edit_age").val());
        formData.append('civil_status', $("#edit_civil_status").val());
        formData.append('degree', $("#edit_degree").val());
        formData.append('college', $("#edit_college").val());
        formData.append('year_graduated', $("#edit_year_graduated").val());
        formData.append('awards', $("#edit_awards").val());
        formData.append('exams', $("#edit_exams").val());
        formData.append('training', $("#edit_training").val());
        formData.append('employed', $("#edit_employed").val());
        formData.append('organization', $("#edit_organization").val());
        formData.append('address', $("#edit_address").val());
        formData.append('place_of_work', $("#edit_place_of_work").val());
        formData.append('organization_type', $("#edit_organization_type").val());
        formData.append('occupation', $("#edit_occupation").val());
        formData.append('employment_status', $("#edit_employment_status").val());
        formData.append('monthly_income', $("#edit_monthly_income").val());

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

    $(document).on("click", ".delete-alumni", function(e) {
        e.preventDefault();
        var form = $(this).closest('form');
        var save = window.confirm('Are you sure you want to delete this?');
        if (save == true) {
            form.submit();
        } else {
            return false;
        }
    });

    function fetchDegrees() {
        $.ajax({
            url: '{{ route('fetch-degrees') }}',
            type: 'GET',
            success: function(data) {
                if (data.response == 'success') {
                    let degrees = data.degrees;
                    let degreeDropdown = $('#degree-dropdown');
                    degreeDropdown.empty();
                    degrees.forEach(function(degree) {
                        degreeDropdown.append('<a class="dropdown-item" href="#" onclick="selectDegree(\'' + degree.name + '\')">' + degree.name + '</a>');
                    });
                } else {
                    alert(data.message);
                }
            },
            error: function(response) {
                alert('An error occurred while fetching degrees.');
            }
        });
    }

    function selectDegree(degreeName) {
        $('#degree-name').val(degreeName);
    }

    $(document).ready(function() {
        fetchDegrees();
        $('#example').DataTable();
        fetchSortDegrees();
    });

    function fetchSortDegrees() {
        $.ajax({
            url: '{{ route('fetch-degrees') }}',
            type: 'GET',
            success: function(data) {
                if (data.response == 'success') {
                    let degrees = data.degrees;
                    let degreeSortOptions = $('#degree-sort-options');
                    degreeSortOptions.empty();
                    degrees.forEach(function(degree) {
                        degreeSortOptions.append('<a class="dropdown-item" href="#" onclick="sortTableByDegree(\'' + degree.name + '\')">' + degree.name + '</a>');
                    });
                } else {
                    alert(data.message);
                }
            },
            error: function(response) {
                alert('An error occurred while fetching degrees.');
            }
        });
    }

    function sortTableByDegree(degree) {
        let table = $('#example').DataTable();
        table.column(7).search(degree).draw();
    }

    function sortTable(column) {
        let table = $('#example').DataTable();
        switch (column) {
            case 'degree':
                table.order([7, 'asc']).draw();
                break;
            case 'batch':
                table.order([8, 'asc']).draw();
                break;
        }
    }



    $(document).ready(function() {
        fetchSortDegrees();

        // Initialize DataTable
        $('#example').DataTable();
    });

    function fetchSortDegrees() {
        $.ajax({
            url: '{{ route('fetch-degrees') }}',
            type: 'GET',
            success: function(data) {
                if (data.response == 'success') {
                    let degrees = data.degrees;
                    let degreeSortOptions = $('#degree-sort-options');
                    degreeSortOptions.empty(); // Clear existing options

                    degrees.forEach(function(degree) {
                        degreeSortOptions.append('<a class="dropdown-item" href="#" onclick="sortTableByDegree(\'' + degree.name + '\')">' + degree.name + '</a>');
                    });
                } else {
                    alert(data.message);
                }
            },
            error: function(response) {
                alert('An error occurred while fetching degrees.');
            }
        });
    }

    function sortTableByDegree(degree) {
        let table = $('#example').DataTable();
        table.column(4).search(degree).draw();  // Assuming Degree is the 5th column (index 4)
    }

</script>
