@include('public.Admin.header')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3>Edit Degree</h3>
                <div class="degree-form-container">
                    @if(session('success'))
                        <div class="alert alert-success" id="success-alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger" id="error-alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form id="degree-edit-form" action="{{ route('degrees.update', $degree->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="degree-name">Degree Name</label>
                            <input type="text" id="degree-name" name="degree_name" class="form-control" value="{{ $degree->name }}" required>
                        </div>
                        <button type="button" class="btn btn-success" onclick="confirmEditDegree()">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('public.Admin.footer')

<script>
    function confirmEditDegree() {
        let degreeName = document.getElementById('degree-name').value;
        if (degreeName === '') {
            alert('Degree name cannot be empty.');
            return;
        }

        let confirmFirst = confirm('Are you sure you want to update this degree?');
        if (confirmFirst) {
            let confirmSecond = confirm('Please confirm again to update this degree.');
            if (confirmSecond) {
                document.getElementById('degree-edit-form').submit();
            }
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        let successAlert = document.getElementById('success-alert');
        let errorAlert = document.getElementById('error-alert');

        if (successAlert) {
            setTimeout(() => {
                successAlert.style.display = 'none';
            }, 3000); // 3000ms = 3 seconds
        }

        if (errorAlert) {
            setTimeout(() => {
                errorAlert.style.display = 'none';
            }, 3000); // 3000ms = 3 seconds
        }
    });
</script>
