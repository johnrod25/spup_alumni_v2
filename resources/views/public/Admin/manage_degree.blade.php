@include('public.Admin.header')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3>Manage Degrees</h3>
                @if(session('success'))
                    <div class="alert alert-success" id="success-alert">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Degree Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($degrees as $degree)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $degree->name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin-edit-degree', $degree->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('degrees.destroy', $degree->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDeleteDegree()">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('public.Admin.footer')

<script>
    function confirmDeleteDegree() {
        let confirmFirst = confirm('Are you sure you want to delete this degree?');
        if (confirmFirst) {
            let confirmSecond = confirm('Please confirm again to delete this degree.');
            return confirmSecond;
        }
        return false;
    }

    document.addEventListener("DOMContentLoaded", function() {
        let successAlert = document.getElementById('success-alert');
        if (successAlert) {
            setTimeout(() => {
                successAlert.style.display = 'none';
            }, 3000); // 3000ms = 3 seconds
        }
    });
</script>
