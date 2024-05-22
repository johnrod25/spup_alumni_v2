@include('public.Admin.header')
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Alumni</span>
                            <span class="info-box-number">{{ $alumnis }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-bullhorn"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Announcements</span>
                            <span class="info-box-number">{{ $announcements }}</span>
                        </div>
                    </div>
                </div>

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-newspaper"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">News</span>
                            <span class="info-box-number">{{ $news }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-images"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Gallery</span>
                            <span class="info-box-number">{{ $galleries }}</span>
                        </div>
                    </div>
                </div>
            </div>


@include('public.Admin.footer')
