@extends('layouts.main')

@section('title')
- Add virus
@endsection

@section('css')
        <link href="{{ URL::asset('css/datetimepicker.css') }}" rel="stylesheet">
@endsection

@section('header')
Add virus
@endsection

@section('content')
    @include('viruses.create-update-form', ['route' => 'store'])
@endsection

@section('javascripts')
        <script src="{{ URL::asset('js/moment.js') }}"></script>
        
        <script src="{{ URL::asset('js/datetimepicker.js') }}"></script>

        <script type="text/javascript">
            $(function () {
                $('input#discovered_at').datetimepicker();
            });
        </script>
@endsection