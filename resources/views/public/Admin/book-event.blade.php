@include('public.Admin.header')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h3>Manage Book Event</h3>
                    {{-- <a href="{{ route('generate.pdf') }}" class="btn btn-primary">Generate PDF</a> --}}
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
                                    <a data-toggle="tooltip" title="Edit" class="btn btn-primary btn-sm"
                                        id="edit-book" value="{{ $data->id }}"><i class="fa fa-edit"
                                            aria-hidden="true"></i></a>
                                    <a data-toggle="tooltip" title="Delete" class="btn btn-danger btn-sm"
                                        id="delete-book" value="{{ $data->id }}"><i class="fa fa-trash"
                                            aria-hidden="true"></i></a>
                                    <form action="{{ route('delete-book', $data->id) }}" method="post"
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
                <h4 class="modal-title">Edit Booked Information</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="container-fluid needs-validation px-3" id="form-sched-edit" novalidate>
                    <!-- First Row -->
                    <div class="row container-fluid d-flex align-items-center justify-content-center">
                        <div class="col-md-12 form-group mb-3">
                            <label>Name (Surname, First Name MI.)</label>
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                            <input type="hidden" name="user_id" id="edit_id">
                            <input type="text" name="fullname" id="edit_fullname"
                                class="form-control  @error('fullname') is-invalid @enderror"
                                placeholder="Enter Full Name" value="{{ old('fullname') }}" required>
                            @error('fullname')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label>Email Address</label>
                            <input type="text" name="email" id="edit_email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Enter Email Address" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label>Contact Number</label>
                            <input type="text" name="contact_number" id="edit_contact_number"
                                class="form-control @error('contact_number') is-invalid @enderror"
                                placeholder="Enter Contact Number" value="{{ old('contact_number') }}" required>
                            @error('contact_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label>Graduation Batch</label>
                            <input type="text" name="graduation_batch" id="edit_graduation_batch"
                                class="form-control @error('graduation_batch') is-invalid @enderror"
                                placeholder="Enter Graduation Batch" value="{{ old('graduation_batch') }}" required>
                            @error('graduation_batch')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label>College/Institute/Faculty/Company</label>
                            <input type="text" name="company" id="edit_company"
                                class="form-control @error('company') is-invalid @enderror"
                                placeholder="Enter College/Institute/Faculty/Company" value="{{ old('company') }}"
                                required>
                            @error('company')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label>Type of Event</label>
                            <select name="event" id="edit_event"
                                class="form-select form-control @error('event') is-invalid @enderror" required>
                                <option value="">Select a type of event</option>
                                <option value="Virtual/Online Event"
                                    @if (old('event') == 'Virtual/Online Event') {{ 'selected' }} @endif>
                                    Virtual/Online Event</option>
                                <option value="Grand Alumni Homecoming"
                                    @if (old('event') == 'Grand Alumni Homecoming') {{ 'selected' }} @endif>Grand Alumni
                                    Homecoming</option>
                                <option value="Alumni Batch Homecoming"
                                    @if (old('event') == 'Alumni Batch Homecoming') {{ 'selected' }} @endif>Alumni Batch
                                    Homecoming</option>
                                <option value="Awarding Ceremony / Testimonal Dinner"
                                    @if (old('event') == 'Awarding Ceremony / Testimonal Dinner') {{ 'selected' }} @endif>Awarding Ceremony /
                                    Testimonal Dinner</option>
                                <option value="Board Meeting"
                                    @if (old('event') == 'Board Meeting') {{ 'selected' }} @endif>Board Meeting
                                </option>
                                <option value="Trade Fair / Product Launch"
                                    @if (old('event') == 'Trade Fair / Product Launch') {{ 'selected' }} @endif>Trade Fair / Product
                                    Launch</option>
                                <option value="Training Seminar / Conference"
                                    @if (old('event') == 'Training Seminar / Conference') {{ 'selected' }} @endif>Training Seminar /
                                    Conference</option>
                                <option value="Other" @if (old('event') == 'Other') {{ 'selected' }} @endif>
                                    Other (please specify in message)</option>
                            </select>

                            @error('event')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label>Target Venue</label>
                            <select name="venue" id="edit_venue"
                                class="form-select form-control @error('venue') is-invalid @enderror" required>
                                <option value="">Select a target venue</option>
                                <option value="Zoom" @if (old('venue') == 'Zoom') {{ 'selected' }} @endif>
                                    Zoom(For
                                    Virtual Events)</option>
                                <option value="MM Hall" @if (old('venue') == 'MM Hall') {{ 'selected' }} @endif>
                                    MM Hall
                                </option>
                                <option value="Global Center"
                                    @if (old('venue') == 'Global Center') {{ 'selected' }} @endif>Global
                                    Center</option>
                                <option value="Student Center"
                                    @if (old('venue') == 'Student Center') {{ 'selected' }} @endif>
                                    Student Center</option>
                                <option value="BEU Gym"
                                    @if (old('venue') == 'BEU Gym') {{ 'selected' }} @endif>BEU Gym
                                </option>
                            </select>
                            @error('venue')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label>From: (Target Date)</label>
                            <input type="date" name="from_date" id="edit_from_date"
                                class="form-control @error('from_date') is-invalid @enderror"
                                value="{{ old('from_date') }}" required>
                            @error('from_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label>To: (Target Date)</label>
                            <input type="date" name="to_date" id="edit_to_date"
                                class="form-control @error('to_date') is-invalid @enderror"
                                value="{{ old('to_date') }}" required>
                            @error('to_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group mb-3">
                            <label>Message</label>
                            <textarea name="message" id="edit_message" cols="10" rows="5"
                                class="form-control @error('message') is-invalid @enderror" placeholder="Enter Message Here..."
                                value="{{ old('message') }}" required></textarea>
                            @error('message')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="update-book">Update Record</button>
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
                } else {
                    errorToast(data.message);
                }
            }
        });

    });

    $(document).on("click", "#update-book", function(e) {
        e.preventDefault();
        let edit_id = $("#edit_id").val();
        let formData = new FormData();
        formData.append('_token', $('#token').val());
        formData.append('id', edit_id);
        formData.append('fullname', $("#edit_fullname").val());
        formData.append('email', $("#edit_email").val());
        formData.append('contact_number', $("#edit_contact_number").val());
        formData.append('graduation_batch', $("#edit_graduation_batch").val());
        formData.append('company', $("#edit_company").val());
        formData.append('event', $("#edit_event").val());
        formData.append('venue', $("#edit_venue").val());
        formData.append('from_date', $("#edit_from_date").val());
        formData.append('to_date', $("#edit_to_date").val());
        formData.append('message', $("#edit_message").val());
        $.ajax({
            url: "{{ route('update-book') }}",
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

    $(document).on("click", "#delete-book", function(e) {
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
