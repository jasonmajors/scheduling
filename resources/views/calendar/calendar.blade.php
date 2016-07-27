@extends('spark::layouts.app')
<link rel="stylesheet" href="{{ URL::asset('css/calendar.css') }}">
@section('content')
<h1>{{ $month }}, {{ $year }}</h1>
<?php echo $calendarMarkup; ?>
<a href="{{ action('AppointmentController@renderCalendar', ['month' => $nextMonth, 'year' => $nextYear]) }}">Next Month</a>
@endsection