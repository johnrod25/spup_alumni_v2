<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPUP Alumni Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .content {
            margin-bottom: 20px;
        }

        .content label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>SPUP Alumni Information</h2>
    </div>

    <div class="section-title">Personal Information</div>
    <div class="content">
        <p><label>Name: </label> {{ $alumni->name }}</p>
        <p><label>Current Position: </label> {{ $alumni->userDetails->current_position ?? 'N/A' }}</p>
        <p><label>Mobile Number: </label> {{ $alumni->userDetails->mobile_number ?? 'N/A' }}</p>
        <p><label>Email: </label> {{ $alumni->userDetails->email ?? 'N/A' }}</p>
        <p><label>Gender: </label> {{ $alumni->userDetails->gender ?? 'N/A' }}</p>
        <p><label>Age: </label> {{ $alumni->userDetails->age ?? 'N/A' }}</p>
        <p><label>Civil Status: </label> {{ $alumni->userDetails->civil_status ?? 'N/A' }}</p>
    </div>

    <div class="section-title">Educational Background</div>
    <div class="content">
        <p><label>Degree: </label> {{ $alumni->userDetails->degree ?? 'N/A' }}</p>
        <p><label>College: </label> {{ $alumni->userDetails->college ?? 'N/A' }}</p>
        <p><label>Year Graduated: </label> {{ $alumni->userDetails->year_graduated ?? 'N/A' }}</p>
        <p><label>Awards: </label> {{ $alumni->userDetails->awards ?? 'N/A' }}</p>
        <p><label>Exams Passed: </label> {{ $alumni->userDetails->exams ?? 'N/A' }}</p>
    </div>

    <div class="section-title">Professional Examinations Passed</div>
    <div class="content">
        @if($alumni->userDetails->professionalExams)
            @foreach($alumni->userDetails->professionalExams as $exam)
                <p><label>Exam Name: </label> {{ $exam->exam_name }}</p>
                <p><label>Date Taken: </label> {{ $exam->exam_date ?? 'N/A' }}</p>
                <p><label>Rating: </label> {{ $exam->exam_rating ?? 'N/A' }}</p>
                <hr>
            @endforeach
        @else
            <p>No professional examinations passed.</p>
        @endif
    </div>

    <div class="section-title">Employment Data</div>
    <div class="content">
        <p><label>Employed: </label> {{ $alumni->userDetails->employed ?? 'N/A' }}</p>
        <p><label>Organization: </label> {{ $alumni->userDetails->organization ?? 'N/A' }}</p>
        <p><label>Place of Work: </label> {{ $alumni->userDetails->place_of_work ?? 'N/A' }}</p>
        <p><label>Organization Type: </label> {{ $alumni->userDetails->organization_type ?? 'N/A' }}</p>
        <p><label>Occupation: </label> {{ $alumni->userDetails->occupation ?? 'N/A' }}</p>
        <p><label>Employment Status: </label> {{ $alumni->userDetails->employment_status ?? 'N/A' }}</p>
        <p><label>Monthly Income: </label> {{ $alumni->userDetails->monthly_income ?? 'N/A' }}</p>


        @if($alumni->userDetails->employment_status == 'Self-employed')
            <h5>Self-employed Details</h5>
            <p><label>Skills Applied: </label> {{ $alumni->userDetails->self_employed_skills ?? 'N/A' }}</p>
            <p><label>Business Type: </label>
                @if($alumni->userDetails->business_type)
                    {{ implode(', ', json_decode($alumni->userDetails->business_type, true)) }}
                @else
                    N/A
                @endif
            </p>
        @endif
    </div>

    <div class="section-title">Job Information</div>
    <div class="content">
        <p><label>First Job After College: </label> {{ $alumni->userDetails->first_job ?? 'N/A' }}</p>
        @if($alumni->userDetails->first_job == 'No')
            <p><label>Number of Previous Jobs: </label> {{ $alumni->userDetails->previous_jobs_count ?? 'N/A' }}</p>
        @endif
        <p><label>First Job Level: </label> {{ $alumni->userDetails->first_job_level ?? 'N/A' }}</p>
        <p><label>Current Job Level: </label> {{ $alumni->userDetails->current_job_level ?? 'N/A' }}</p>
        <p><label>Reasons for Accepting Job: </label>
            @if($alumni->userDetails->job_acceptance_reasons)
                {{ implode(', ', json_decode($alumni->userDetails->job_acceptance_reasons, true)) }}
            @else
                N/A
            @endif
        </p>
    </div>

    <div class="section-title">First Job Information</div>
    <div class="content">
        <p><label>How long did you stay in your first job: </label>
            {{ $alumni->userDetails->first_job_duration ?? 'N/A' }}
            @if($alumni->userDetails->first_job_duration == 'Other')
                ({{ $alumni->userDetails->first_job_duration_other ?? 'N/A' }})
            @endif
        </p>

        <p><label>How did you find your first job: </label>
            @if($alumni->userDetails->job_finding_method)
                {{ implode(', ', json_decode($alumni->userDetails->job_finding_method, true)) }}
            @endif
            @if($alumni->userDetails->job_finding_method_other)
                (Other: {{ $alumni->userDetails->job_finding_method_other }})
            @endif
        </p>

        <p><label>How long did it take to land your first job: </label>
            {{ $alumni->userDetails->time_to_first_job ?? 'N/A' }}
            @if($alumni->userDetails->time_to_first_job == 'Other')
                ({{ $alumni->userDetails->time_to_first_job_other ?? 'N/A' }})
            @endif
        </p>

        <p><label>Was the curriculum relevant to your first job: </label>
            {{ $alumni->userDetails->curriculum_relevance ?? 'N/A' }}</p>
    </div>

    <div class="section-title">Competencies Learned in College</div>
    <div class="content">
        <p><label>Competencies found useful in your first job: </label>
            @if($alumni->userDetails->useful_competencies)
                {{ implode(', ', json_decode($alumni->userDetails->useful_competencies, true)) }}
            @endif
            @if($alumni->userDetails->useful_competencies_other)
                (Other: {{ $alumni->userDetails->useful_competencies_other }})
            @endif
        </p>
    </div>


    <div class="section-title">Difficulties in Getting First Job</div>
    <div class="content">
        <p><label>Difficulties encountered in getting first job: </label>
            @if($alumni->userDetails->job_difficulties)
                {{ implode(', ', json_decode($alumni->userDetails->job_difficulties, true)) }}
            @endif
            @if($alumni->userDetails->job_difficulties_other)
                (Other: {{ $alumni->userDetails->job_difficulties_other }})
            @endif
        </p>
    </div>


    <div class="section-title">Time to Find Job After Graduation</div>
    <div class="content">
        <p><label>Time it took to find a job after graduation: </label>
            {{ $alumni->userDetails->time_to_find_job ?? 'N/A' }}
            @if($alumni->userDetails->time_to_find_job == 'Other')
                ({{ $alumni->userDetails->time_to_find_job_other ?? 'N/A' }})
            @endif
        </p>
    </div>


    <div class="section-title">Reasons for Waiting Time</div>
    <div class="content">
        <p><label>Reasons for the waiting time: </label>
            @if($alumni->userDetails->waiting_time_reasons)
                {{ implode(', ', json_decode($alumni->userDetails->waiting_time_reasons, true)) }}
            @else
                N/A
            @endif
        </p>
    </div>

    <!-- Assessment of Paulinian Education -->
    <div class="section-title">Assessment of Paulinian Education</div>
    <div class="content">
        <p><label>Relevance of Paulinian education: </label> {{ $alumni->userDetails->paulinian_relevance ?? 'N/A' }}
        </p>
    </div>

    <!-- Recommendation of SPUP -->
    <div class="section-title">Recommendation of SPUP</div>
    <div class="content">
        <p><label>Recommendation: </label> {{ $alumni->userDetails->recommend_spup ?? 'N/A' }}</p>
        <p><label>Reason: </label> {{ $alumni->userDetails->recommend_spup_reason ?? 'N/A' }}</p>
    </div>

    <!-- Contribution to Well-being -->
    <div class="section-title">Contribution to Well-being</div>
    <div class="content">
        <p><label>Extent of contribution to well-being:</label></p>
        <ul>
            @foreach(json_decode($alumni->userDetails->well_being, true) as $index => $extent)
                <li>{{ $index }}: {{ $extent }}</li>
            @endforeach
        </ul>
        <p><label>Other contributions: </label> {{ $alumni->userDetails->well_being_other ?? 'N/A' }}</p>
    </div>
    <!-- Involvement in SPUP Affairs -->
    <div class="section-title">Involvement in SPUP Affairs</div>
    <div class="content">
        <p><label>Ways of involvement:</label></p>
        <ul>
            @foreach(json_decode($alumni->userDetails->spup_involvement, true) as $index => $priority)
                <li>{{ $index }}: {{ $priority }}</li>
            @endforeach
        </ul>
        <p><label>Other involvement: </label> {{ $alumni->userDetails->spup_involvement_other ?? 'N/A' }}</p>
    </div>
    <!-- Steps to Encourage Networking with Alumni -->
    <div class="section-title">Steps to Encourage Networking with Alumni</div>
    <div class="content">
        <p><label>Steps to encourage networking:</label></p>
        <ul>
            @foreach(json_decode($alumni->userDetails->networking_steps, true) as $index => $priority)
                <li>{{ $index }}: {{ $priority }}</li>
            @endforeach
        </ul>
        <p><label>Other suggestions: </label> {{ $alumni->userDetails->networking_steps_other ?? 'N/A' }}</p>
    </div>
    <!-- Assisting in SPUP's Marketing Program -->
    <div class="section-title">Assisting in SPUP's Marketing Program</div>
    <div class="content">
        <p><label>Ways to assist in marketing:</label></p>
        <ul>
            @foreach(json_decode($alumni->userDetails->marketing_assist, true) as $index => $interest)
                <li>{{ $index }}: {{ $interest }}</li>
            @endforeach
        </ul>
        <p><label>Other suggestions: </label> {{ $alumni->userDetails->marketing_assist_other ?? 'N/A' }}</p>
    </div>
    <!-- Suggestions for Improving Education and Services -->
    <div class="section-title">Suggestions for Improving Education and Services</div>
    <div class="content">
        <p>{{ $alumni->userDetails->education_service_suggestions ?? 'No suggestions provided' }}</p>
    </div>



</body>

</html>