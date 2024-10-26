@include('public.Admin.header')
<!-- Info boxes -->
<div class="row">
    <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Alumni</span>
                <span class="info-box-number">{{ $alumnis }}</span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4">
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

    <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-newspaper"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">News</span>
                <span class="info-box-number">{{ $news }}</span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-images"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Gallery</span>
                <span class="info-box-number">{{ $galleries }}</span>
            </div>
        </div>
    </div>

    <!-- New Alumni Registration Request Info Box -->
    <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-user-plus"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Registration Requests</span>
                <span class="info-box-number">{{ $registration_requests }}</span>
            </div>
        </div>
    </div>
</div>

<hr>
<div class="row d-flex justify-content-center">
    <div class="col-12 col-sm-6 col-md-5 m-3 info-box ">
        <canvas id="degree"  class="container"></canvas>
    </div>
    <div class="col-12 col-sm-6 col-md-5 m-3 info-box">
        <canvas id="gender"  class="container"></canvas>
    </div>
    <div class="col-12 col-sm-6 col-md-5 m-3 info-box">
        <canvas id="place_of_work"  class="container"></canvas>
    </div>
    <div class="col-12 col-sm-6 col-md-5 m-3 info-box">
        <canvas id="type_of_organization"  class="container"></canvas>
    </div>
    {{-- <div class="col-md-6">
        <div class="progress-group">
            Alumni request
            <span class="float-right"><b>160</b>/200</span>
            <div class="progress progress-sm">
                <div class="progress-bar bg-primary" style="width: 80%"></div>
            </div>
        </div>
        <div class="progress-group">
            Alumni
            <span class="float-right"><b>160</b>/200</span>
            <div class="progress progress-sm">
                <div class="progress-bar bg-primary" style="width: 80%"></div>
            </div>
        </div>
        <div class="progress-group">
            Male
            <span class="float-right"><b>160</b>/200</span>
            <div class="progress progress-sm">
                <div class="progress-bar bg-primary" style="width: 80%"></div>
            </div>
        </div>
        <div class="progress-group">
            Female
            <span class="float-right"><b>160</b>/200</span>
            <div class="progress progress-sm">
                <div class="progress-bar bg-primary" style="width: 80%"></div>
            </div>
        </div>
        <div class="progress-group">
            Male
            <span class="float-right"><b>160</b>/200</span>
            <div class="progress progress-sm">
                <div class="progress-bar bg-primary" style="width: 80%"></div>
            </div>
        </div>
        <div class="progress-group">
            Male
            <span class="float-right"><b>160</b>/200</span>
            <div class="progress progress-sm">
                <div class="progress-bar bg-primary" style="width: 80%"></div>
            </div>
        </div>
        
    </div> --}}

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script>
new Chart("degree", {
    type: "pie",
    data: {
      labels: <?php echo $degree; ?>,
      datasets: [{
        backgroundColor: ["#2b5797","#e8c3b9","#1e7145","#b91d47","#00aba9"],
        data: <?php echo $degree_count; ?>
      }]
    },
    options: {
      title: {
        display: true,
        text: "Degree"
      }
    }
  });

new Chart("gender", {
    type: "pie",
    data: {
      labels: <?php echo $gender; ?>,
      datasets: [{
        backgroundColor: ["#1e7145","#b91d47","#00aba9","#2b5797","#e8c3b9"],
        data: <?php echo $gender_count; ?>
      }]
    },
    options: {
      title: {
        display: true,
        text: "Gender"
      }
    }
  });

  new Chart("place_of_work", {
    type: "pie",
    data: {
      labels: <?php echo $work_place; ?>,
      datasets: [{
        backgroundColor: ["#2b5797","#b91d47","#00aba9","#1e7145","#e8c3b9"],
        data: <?php echo $work_place_count; ?>
      }]
    },
    options: {
      title: {
        display: true,
        text: "Place of Work"
      }
    }
  });

  new Chart("type_of_organization", {
    type: "pie",
    data: {
      labels: <?php echo $organization_type; ?>,
      datasets: [{
        backgroundColor: ["#b91d47","#00aba9","#1e7145","#2b5797","#e8c3b9"],
        data: <?php echo $organization_type_count; ?>
      }]
    },
    options: {
      title: {
        display: true,
        text: "Type of Organization"
      }
    }
  });
  </script>
  
@include('public.Admin.footer')
