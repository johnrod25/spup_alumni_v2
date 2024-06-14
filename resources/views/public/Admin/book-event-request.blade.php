@include('public.Admin.header')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h3>Manage Book Request</h3>
                </div>
                <hr class="hr">
                <table id="example" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Contact #</th>
                            {{-- <th>Batch</th>
                            <th>Company</th> --}}
                            <th>Event</th>
                            <th>Venue</th>
                            <th>From Date</th>
                            <th>To Date</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($datas as $data)
                            <tr class="text-capitalize">
                                <td>{{ $i++ }}</td>

                                <td>{{ $data->fullname }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->contact_number }}</td>
                                {{-- <td>{{ $data->graduation_batch }}</td>
                                <td>{{ $data->company }}</td> --}}
                                <td>{{ $data->event }}</td>
                                <td>{{ $data->venue }}</td>
                                <td>{{ $data->from_date }}</td>
                                <td>{{ $data->to_date }}</td>
                                <td>{{ $data->message }}</td>
                                <td class="text-center">
                                    <a data-toggle="tooltip" title="View" class="btn btn-success btn-sm"
                                        id="edit-book" value="{{ $data->id }}"><i class="fa fa-eye"
                                            aria-hidden="true"></i></a>
                                    <a data-toggle="tooltip" title="Approve" class="btn btn-primary btn-sm"
                                        id="approve-book" value="{{ $data->id }}"><i class="fa fa-thumbs-up"
                                            aria-hidden="true"></i></a>
                                    <form action="{{ route('admin-book-approved', $data->id) }}" method="post"
                                        class="form-hidden" id="approve-form">
                                        @csrf
                                    </form>
                                    <a data-toggle="tooltip" title="Reject" class="btn btn-danger btn-sm"
                                        id="reject-book" value="{{ $data->id }}"><i class="fa fa-thumbs-down"
                                            aria-hidden="true"></i></a>
                                    <form action="{{ route('admin-book-reject', $data->id) }}" method="post"
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
                <h4 class="modal-title">View Booked Information</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="container-fluid needs-validation px-3" id="form-sched-edit" novalidate>
                    <!-- First Row -->
                    <div class="row container-fluid d-flex align-items-center justify-content-center">
                        <div class="col-md-12 form-group">
                            <label>Full Name</label>
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" id="edit_id">
                            <input type="text" class="form-control" name="fullname" id="edit_fullname"
                                placeholder="Enter Full Name" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" id="edit_email"
                                placeholder="Enter Email" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Contact Number</label>
                            <input type="text" class="form-control" name="contact_number" id="edit_contact_number"
                                placeholder="Enter Contact Number" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Graduation Batch</label>
                            <input type="text" class="form-control" name="graduation_batch"
                                id="edit_graduation_batch" placeholder="Enter Graduation Batch" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>College/Institute/Faculty/Company</label>
                            <input type="text" class="form-control" name="company" id="edit_company"
                                placeholder="Enter Company" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Type of Event</label>
                            <input type="text" class="form-control" name="event" id="edit_event"
                                placeholder="Enter Home Address" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Target Venue</label>
                            <input type="text" class="form-control" name="venue" id="edit_venue"
                                placeholder="Enter Venue" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>From: (Target Date)</label>
                            <input type="date" class="form-control" name="from_date" id="edit_from_date"
                                placeholder="Enter Target Date" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>To: (Target Date)</label>
                            <input type="date" class="form-control" name="to_date" id="edit_to_date"
                                placeholder="Enter Target Date" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Message</label>
                            <textarea name="message" id="edit_message" cols="10" rows="5"
                                class="form-control" placeholder="Enter Message Here..."></textarea>
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
    $(document).on("click", "#edit-book", function(e) {
        e.preventDefault();
        var id = $(this).attr("value");
        $.ajax({
            url: "{{ route('edit-book') }}",
            type: "post",
            dataType: "json",
            data: {
                "_token": $('#token').val(),
                id: id
            },
            success: function(data) {
                if (data.response === 'success') {
                    $('#modal-edit').modal('show');
                    $("#edit_id").val(data.book[0].id);
                    $("#edit_fullname").val(data.book[0].fullname);
                    $("#edit_email").val(data.book[0].email);
                    $("#edit_contact_number").val(data.book[0].contact_number);
                    $("#edit_graduation_batch").val(data.book[0].graduation_batch);
                    $("#edit_company").val(data.book[0].company);
                    $("#edit_event").val(data.book[0].event);
                    $("#edit_venue").val(data.book[0].venue);
                    $("#edit_from_date").val(data.book[0].from_date);
                    $("#edit_to_date").val(data.book[0].to_date);
                    $("#edit_message").val(data.book[0].message);      
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


    $(document).on("click", "#approve-book", function(e) {
        e.preventDefault();
        var save = window.confirm('Are you sure you want to approve this?')
        if (save == true) {
            $('#approve-form').submit();
            successToast('Approved successfully.');
        } else {
            return false;
        }
    });
    $(document).on("click", "#reject-book", function(e) {
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
