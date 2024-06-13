@include('public.Home.header')
@include('public.Home.navbar')
<div class="container-fluid bg-green mt-5">
<div class="container">
    <h1 class="p-4">Event Booking</h1>
</div>
</div>
<div class="container p-5 text-center text-black">
    <h3 class="text-warning">Event Pencil Book Form</h3>
    <p>Want a convenient and top-notch venue for all your future events? Book your gatherings, homecomings with us below!</p>
    <div class="row text-start">
        <div class="col-md-12 form-group mb-3">
            <label>Name (Surname, First Name MI.)</label>
            <input type="text" name="fullname" class="form-control" placeholder="Enter Full Name">
        </div>
        <div class="col-md-6 form-group mb-3">
            <label>Email Address</label>
            <input type="text" name="email" class="form-control" placeholder="Enter Email Address">
        </div>
        <div class="col-md-6 form-group mb-3">
            <label>Contact Number</label>
            <input type="text" name="contact_number" class="form-control" placeholder="Enter Contact Number">
        </div>
        <div class="col-md-6 form-group mb-3">
            <label>Graduation Batch</label>
            <input type="text" name="graduation_batch" class="form-control" placeholder="Enter Graduation Batch">
        </div>
        <div class="col-md-6 form-group mb-3">
            <label>College/Institute/Faculty/Company</label>
            <input type="text" name="company" class="form-control" placeholder="Enter College/Institute/Faculty/Company">
        </div>
        <div class="col-md-6 form-group mb-3">
            <label>Type of Event</label>
            <select name="event" id="event" class="form-select">
                <option value="">Select a type of event</option>
                <option value="Virtual/Online Event">Virtual/Online Event</option>
                <option value="Grand Alumni Homecoming">Grand Alumni Homecoming</option>
            </select>
        </div>
        <div class="col-md-6 form-group mb-3">
            <label>Target Venue</label>
            <select name="venue" id="venue" class="form-select">
                <option value="">Select a target venue</option>
                <option value="Zoom">Zoom(For Virtual Events)</option>
                <option value="MM Hall">MM Hall</option>
                <option value="Global Center">Global Center</option>
                <option value="Student Center">Student Center</option>
                <option value="BEU Gym">BEU Gym</option>
            </select>
        </div>
        <div class="col-md-6 form-group mb-3">
            <label>From: (Target Date)</label>
            <input type="date" name="from_date" class="form-control">
        </div>
        <div class="col-md-6 form-group mb-3">
            <label>To: (Target Date)</label>
            <input type="date" name="to_date" class="form-control">
        </div>
        <div class="col-md-12 form-group mb-3">
            <label>Message</label>
            <textarea name="message" id="message" cols="10" rows="5" class="form-control">Enter Message Here...</textarea>
        </div>
        <div class="col-md-12 form-group mb-3 text-center">
            <button class="btn btn-warning px-5">Submit</button>
        </div>
    </div>
</div>
@include('public.Home.footer')
