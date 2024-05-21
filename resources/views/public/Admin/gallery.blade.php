@include('public.Admin.header')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h3>Manage Galleries</h3>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal-gallery"><i class="fa fa-plus"
                            aria-hidden="true"></i> Add Gallery</button>
                </div>
                <hr class="hr">
                <table id="example" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Image</th>
                            <th>Image Name</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{$i = 1;}}
                        @foreach ($datas as $data)
                            <tr class="text-capitalize">
                                <td>{{ $i++; }}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ asset('images/galleries/' . $data->image_path) }}"
                                        class="gallery-lightbox" data-gall="gallery-carousel">
                                        <img src="{{ asset('images/galleries/' . $data->image_path) }}" alt=""
                                            style="height: 70px;width:100px">
                                    </a>
                                </td>
                                <td>{{$data->image_path}}</td>
                                <td>{{ $data->created_at }}</td>
                                <td class="text-center">
                                    <a data-toggle="tooltip" title="Delete" class="btn btn-danger"
                                        id="delete-gallery" value="{{ $data->id }}"><i class="fa fa-trash"
                                            aria-hidden="true"></i> Delete</a>
                                    <form action="{{ route('delete-gallery', $data->id) }}" method="post"
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

<div class="modal fade" id="modal-gallery">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add gallery</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation px-3" id="form-sched" runat="server" novalidate>
                    <!-- First Row -->
                    <div class="col-md-12">
                        <img src="#" alt="..." id="preview" class="card img-preview" />
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Image</label>
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                            <input type="file" accept="image/*" name="image" id="image" class="form-control"
                                onchange="img_preview(event,'preview')">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="add-gallery">Add gallery</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@include('public.Admin.footer')

<script>
    var img_preview = function(event, myId) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById(myId);
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
    $(document).on("click", "#add-gallery", function(e) {
        e.preventDefault();
        let image = document.getElementById('image');
        if (image.files.length == 0) {
            errorToast("Image field is required");
        } else {
            let formData = new FormData();
            formData.append('_token', $('#token').val());
            formData.append('image', image.files[0]);
            $.ajax({
                url: '{{ route('add-gallery') }}',
                type: "post",
                dataType: "json",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    // let data = JSON.stringify(response);
                    if (data.response == "success") {
                        $('#modal-gallery').modal('hide')
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

    $(document).on("click", "#delete-gallery", function(e) {
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
