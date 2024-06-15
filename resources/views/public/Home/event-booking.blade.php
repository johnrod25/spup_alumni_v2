@include('public.Home.header')
@include('public.Home.navbar')
<div class="container-fluid bg-green mt-5">
    <div class="container">
        <h1 class="p-4">Event Booking</h1>
    </div>
</div>
<div class="container p-5 text-center text-black">
    <h3 class="text-warning">Event Pencil Book Form</h3>
    <p>Want a convenient and top-notch venue for all your future events? Book your gatherings, homecomings with us
        below!</p>
    <div class="row text-start">
        <form class="col-md-12 row form" method="POST" action="{{ route('book-event-submit') }}">
            @csrf
            @if (Session::has('success_message'))
                <div class="alert alert-success">
                    {{ Session::get('success_message') }}
                </div>
            @endif
            <div class="col-md-12 form-group mb-3">
                <label>Name (Surname, First Name MI.)</label>
                <input type="text" name="fullname" class="form-control  @error('fullname') is-invalid @enderror"
                    placeholder="Enter Full Name" value="{{ old('fullname') }}">
                @error('fullname')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 form-group mb-3">
                <label>Email Address</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Enter Email Address" value="{{ old('email') }}">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 form-group mb-3">
                <label>Contact Number</label>
                <input type="text" name="contact_number"
                    class="form-control @error('contact_number') is-invalid @enderror"
                    placeholder="Enter Contact Number" value="{{ old('contact_number') }}">
                @error('contact_number')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 form-group mb-3">
                <label>Graduation Batch</label>
                <input type="text" name="graduation_batch"
                    class="form-control @error('graduation_batch') is-invalid @enderror"
                    placeholder="Enter Graduation Batch" value="{{ old('graduation_batch') }}">
                @error('graduation_batch')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 form-group mb-3">
                <label>College/Institute/Faculty/Company</label>
                <input type="text" name="company" class="form-control @error('company') is-invalid @enderror"
                    placeholder="Enter College/Institute/Faculty/Company" value="{{ old('company') }}">
                @error('company')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 form-group mb-3">
                <label>Type of Event</label>
                <select name="event" id="event" class="form-select @error('event') is-invalid @enderror">
                    <option value="">Select a type of event</option>
                    <option value="Virtual/Online Event" @if (old('event') == 'Virtual/Online Event') {{ 'selected' }} @endif>
                        Virtual/Online Event</option>
                    <option value="Grand Alumni Homecoming"
                        @if (old('event') == 'Grand Alumni Homecoming') {{ 'selected' }} @endif>Grand Alumni Homecoming</option>
                    <option value="Alumni Batch Homecoming" @if (old('event') == 'Alumni Batch Homecoming') {{ 'selected' }} @endif>Alumni Batch Homecoming</option>
                    <option value="Awarding Ceremony / Testimonal Dinner" @if (old('event') == 'Awarding Ceremony / Testimonal Dinner') {{ 'selected' }} @endif>Awarding Ceremony / Testimonal Dinner</option>
                    <option value="Board Meeting" @if (old('event') == 'Board Meeting') {{ 'selected' }} @endif>Board Meeting</option>
                    <option value="Trade Fair / Product Launch" @if (old('event') == 'Trade Fair / Product Launch') {{ 'selected' }} @endif>Trade Fair / Product Launch</option>
                    <option value="Training Seminar / Conference" @if (old('event') == 'Training Seminar / Conference') {{ 'selected' }} @endif>Training Seminar / Conference</option>
                    <option value="Other" @if (old('event') == 'Other') {{ 'selected' }} @endif>Other (please specify in message)</option>
                </select>

                @error('event')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 form-group mb-3">
                <label>Target Venue</label>
                <select name="venue" id="venue" class="form-select @error('venue') is-invalid @enderror">
                    <option value="">Select a target venue</option>
                    <option value="Zoom" @if (old('venue') == 'Zoom') {{ 'selected' }} @endif>Zoom(For
                        Virtual Events)</option>
                    <option value="MM Hall" @if (old('venue') == 'MM Hall') {{ 'selected' }} @endif>MM Hall
                    </option>
                    <option value="Global Center" @if (old('venue') == 'Global Center') {{ 'selected' }} @endif>Global
                        Center</option>
                    <option value="Student Center" @if (old('venue') == 'Student Center') {{ 'selected' }} @endif>
                        Student Center</option>
                    <option value="BEU Gym" @if (old('venue') == 'BEU Gym') {{ 'selected' }} @endif>BEU Gym
                    </option>
                </select>
                @error('venue')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 form-group mb-3">
                <label>From: (Target Date)</label>
                <input type="date" name="from_date" class="form-control @error('from_date') is-invalid @enderror"
                    value="{{ old('from_date') }}">
                @error('from_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 form-group mb-3">
                <label>To: (Target Date)</label>
                <input type="date" name="to_date" class="form-control @error('to_date') is-invalid @enderror"
                    value="{{ old('to_date') }}">
                @error('to_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12 form-group mb-3">
                <label>Message</label>
                <textarea name="message" id="message" cols="10" rows="5"
                    class="form-control @error('message') is-invalid @enderror" placeholder="Enter Message Here..."
                    value="{{ old('message') }}"></textarea>
                @error('message')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12 form-group mb-3 text-center">
                <button class="btn btn-warning px-5">Submit</button>
            </div>
        </form>
    </div>
</div>
@include('public.Home.footer')
