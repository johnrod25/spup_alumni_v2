<!-- resources/views/tracer-study-confirmation.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Thank you for completing the questionnaire!</h1>
    <a href="{{ route('tracer.study.download-pdf') }}" class="btn btn-primary">Download PDF</a>
</div>
@endsection
