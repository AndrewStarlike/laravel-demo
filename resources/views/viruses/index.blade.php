@extends('layouts.main')

@section('title')
- Dashboard
@endsection

@section('header')
Dashboard <small>viruses</small>
@endsection

@section('content')
            <div class="row">
                @if(Auth::check())
                <div class="col-lg-12">
                    <a href="{{ route('create') }}" class="btn btn-default" role="button">Add Virus</a>
                </div>
                @endif
                <div class="col-lg-12">
                    @if (count($viruses) > 0)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Discovery date</th>
                                <th>Rating</th>
                                <th>Status</th>
                                @if(Auth::check())
                                <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($viruses as $virus)
                            <tr>
                                <td><a href="{{ route('description', ['id' => $virus->id]) }}">{{ $virus->name }}</a></td>
                                <td>{{ $virus->discovered_at }}</td>
                                <td>@if ($virus->average)
                                    {{ $virus->average }}
                                    @else
                                    not rated yet
                                    @endif
                                </td>
                                <td>
                                    @if ($virus->active == 1)
                                    active
                                    @else
                                    inactive
                                    @endif
                                </td>
                                @if(Auth::check())
                                <td><a href="{{ route('edit', ['id' => $virus->id]) }}" class="btn btn-default" role="button">Modify</a></td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        No viruses yet.
                    @endif
                </div>

            </div>
@endsection