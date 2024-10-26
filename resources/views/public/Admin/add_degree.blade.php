@include('public.Admin.header')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3>Add Degree</h3>
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
                    <form id="degree-form" action="{{ route('degrees.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="degree-name">Degree Name</label>
                            <input type="text" id="degree-name" name="degree_name" class="form-control" required>
                        </div>
                        <button type="button" class="btn btn-success" onclick="confirmAddDegree()">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('public.Admin.footer')

<script>
    function confirmAddDegree() {
        let degreeName = document.getElementById('degree-name').value;
        if (degreeName === '') {
            alert('Degree name cannot be empty.');
            return;
        }

        let confirmFirst = confirm('Are you sure you want to add this degree?');
        if (confirmFirst) {
            let confirmSecond = confirm('Please confirm again to add this degree.');
            if (confirmSecond) {
                document.getElementById('degree-form').submit();
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
