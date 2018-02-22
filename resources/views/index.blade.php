@extends('layouts.app')

@section('content')

    <div class="container" id="app">
        <div class="jumbotron">
            <h1>Data Captured</h1>
        </div>

        <a href="{{ route('form.create') }}" class="btn btn-block btn-success text-white mb-4">
            Capture a new user's data
        </a>

        <div class="list-group">
            @forelse($users as $user)
                <div class="list-group-item">
                    <div class="row">

                        {{-- Show selfie image --}}
                        <div class="col-md-3 text-center">
                            <div class="selfie">
                                <img class="rounded-circle"
                                     src="{{ asset('/img/selfies/' . $user->id . '_original.jpeg') }}"
                                     alt="{{ $user->first_name }} {{ $user->last_name }}">
                            </div>
                        </div>

                        {{-- List user details --}}
                        <div class="col-md-6 pt-3">

                            <div>
                                {{ $user->first_name }} {{ $user->last_name }}
                                <span class="text-muted">{{ $user->email }}</span>
                            </div>

                            <div>
                                {{ $user->address }}, {{ $user->town_city }}, {{ $user->country }}
                                , {{ $user->postcode }}
                            </div>

                            <div>
                                {{ $user->telephone_number }}
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="list-group-item">
                    No data has been captured so far..
                </div>
            @endforelse
        </div>
    </div>
@stop
