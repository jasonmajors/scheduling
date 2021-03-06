@extends('spark::layouts.app')
@section('title')
Jason
@endsection
<link rel="stylesheet" href="{{ URL::asset('css/calendar.css') }}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

@section('content')
<div class="container">
    <div>
        <h1>{{ $month }}, {{ $year }}</h1>
        <?php echo $calendarMarkup; ?>
         <a href="{{ action('CalendarController@renderCalendar', ['month' => $prevPagesMonth, 'year' => $prevPagesYear]) }}">Last Month</a>
         <a href="{{ action('CalendarController@renderCalendar', ['month' => $nextMonth, 'year' => $nextPagesYear]) }}">Next Month</a>
    </div>

    @foreach (array_keys($appointments) as $day)
    <!-- This will be the availability for the day -->
    <div class="schedule-panel {{ $day }}">
        {{ $day }}
    </div>
    @endforeach

    <div>
        <form method="post" action="{{ url('appointment') }}">
        {{ csrf_field() }}
            <input type="datetime-local" name="start_time">
            <input type="datetime-local" name="end_time">
            <input type="submit" value="Submit">
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ URL::asset('js/calendar.js') }}"></script>
@endsection
