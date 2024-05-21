@include('public.Admin.header')
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-building"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Announcements</span>
                            <span class="info-box-number">2</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Alumni</span>
                            <span class="info-box-number">5</span>
                        </div>
                    </div>
                </div>
                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-calendar-alt"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">News</span>
                            <span class="info-box-number">7</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-clock"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Gallery</span>
                            <span class="info-box-number">10</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <h3 class="text-warning text-bold">ATTENDANCE FOR TODAY</h3>
                                <hr class="hr">
                            </div>
                            <table id="example" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>RFID Number</th>
                                        <th>Fullname</th>
                                        <th>Morning In</th>
                                        <th>Morning Out</th>
                                        <th>Afternoon In</th>
                                        <th>Afternoon Out</th>
                                        <th>Log Date</th>
                                    </tr>
                                </thead>
                                <tbody>

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

@include('public.Admin.footer')
