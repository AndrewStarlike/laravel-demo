@extends('layouts.main')

@section('title')
- Description of {{ $virus->name }}
@endsection

@section('header')
{{ $virus->name }} description
@endsection

@section('content')
            <div class="row">
                <div class="col-lg-12">
                    <p>{{ $virus->description }} </p>
                </div>
            </div>

            <div class="row" id="rating_row">
                @if ($showRating == true)
                <div class="col-lg-2">
                    {{ Form::open(['route' => ['rating', $virus->id], 'method' => 'post', 'role' => 'form']) }}
                        <div class="form-group">
                            <label for="rating">Rate description:</label>
                            {{ Form::select('rating', array(1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5), 1, ['class' => 'form-control', 'id' => 'rating']) }}
                        </div>
                        <button type="submit" class="btn btn-default" id="rating_submit">Submit</button>
                    </form>
                </div>
                @else
                <div class="col-lg-12">
                    <p>You already rated {{ $virus->name }}</p>
                </div>
                @endif
            </div>
@endsection

@section('javascripts')
        <meta name="_token" content="{{ csrf_token() }}" />
        
        <script type="text/javascript">
            $(document).ready(function(){
              $("#rating_submit").click(function(e){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                })
                e.preventDefault();
                $.ajax({type: "POST",
                        url: '{{ route('rating', ['id' => $virus->id]) }}',
                        data: { rating: $('#rating option:selected').val() },
                        success:function(xhr){
                            var message = '<div class="col-lg-12"><div class="alert alert-success">';
                            message = message + xhr.rating + '</div></div>';
                            $("#rating_row").html(message);
                        },
                        error: function(xhr) {
                            var response = xhr.responseJSON;
                            var errors = '<div class="col-lg-12"><div class="alert alert-warning">';
                            errors = errors + response.rating + '</div></div>';
                            $("#rating_row").prepend(errors);
                        }
                });
              });
            });
        </script>
@endsection