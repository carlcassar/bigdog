@extends('layouts.app')

@section('content')

    <div class="container" id="app">

        <div class="jumbotron">
            <h1>Data Capture Form</h1>
        </div>

        <a href="{{ route('form.index') }}" class="btn btn-block btn-success text-white mb-4">
            View previously captured data
        </a>

        @include('_messages')

        <form action="{{ route('form.store') }}"
              id="data-capture-form"
              method="post"
              enctype="multipart/form-data">

            {{ csrf_field() }}

            {{-- First Name --}}
            <div class="form-group required">
                <label class="control-label" for="first_name">First Name</label>
                <input type="text"
                       class="form-control"
                       id="first_name"
                       name="first_name"
                       placeholder="e.g. John"
                       value="{{ old('first_name') }}"
                       required>
            </div>

            {{-- Last Name --}}
            <div class="form-group required">
                <label class="control-label" for="last_name">Last Name</label>
                <input type="text"
                       class="form-control"
                       id="last_name"
                       name="last_name"
                       placeholder="e.g. Smith"
                       value="{{ old('last_name') }}"
                       required>
            </div>

            {{-- Email Address --}}
            <div class="form-group required">
                <label class="control-label" for="email">Email address</label>
                <input type="email"
                       class="form-control"
                       id="email"
                       name="email"
                       placeholder="e.g. johnsmith@example.com"
                       value="{{ old('email') }}"
                       required>
            </div>

            {{-- Telephone Number --}}
            <div class="form-group">
                <label class="control-label" for="telephone_number">Telephone Number</label>
                <input type="tel"
                       class="form-control"
                       id="telephone_number"
                       name="telephone_number"
                       value="{{ old('telephone_number') }}"
                       placeholder="+44">
            </div>

            {{-- Address --}}
            <div class="form-group required">
                <label class="control-label" for="address">Address</label>
                <input type="text"
                       class="form-control"
                       id="address"
                       name="address"
                       placeholder="e.g. 4 Privet Drive"
                       value="{{ old('address') }}"
                       required>
            </div>

            {{-- Town/City --}}
            <div class="form-group">
                <label class="control-label" for="town_city">Town / City </label>
                <input type="text"
                       class="form-control"
                       id="town_city"
                       name="town_city"
                       value="{{ old('town_city') }}"
                       placeholder="Little Whinging">
            </div>

            {{-- County --}}
            <div class="form-group required">
                <label class="control-label" for="county">County</label>
                <input type="text"
                       class="form-control"
                       id="county"
                       name="county"
                       placeholder="Surrey"
                       value="{{ old('county') }}"
                       required>
            </div>

            {{-- Postcode --}}
            <div class="form-group">
                <label class="control-label" for="postcode">Postcode</label>
                <input type="text"
                       class="form-control"
                       id="postcode"
                       name="postcode"
                       placeholder="WD25 7LR"
                       value="{{ old('postcode') }}">
            </div>

            {{-- Upload Button --}}
            <div class="form-group required">
                <label class="control-label" for="selfie">Upload a selfie</label>
                <input type="file" class="form-control" id="selfie" name="selfie" value="{{ old('selfie') }}" required>
            </div>

            {{-- Show / Hide Checkboxes --}}
            <p>
                Would you like to receive updates from us?
                <label class="receive-updates radio-inline">
                    <input type="radio" value="yes" name="receive_updates" required> Yes
                </label>
                <label class="receive-updates radio-inline">
                    <input type="radio" value="no" name="receive_updates" required> No
                </label>
            </p>

            {{-- First Checkbox --}}
            <div class="form-group required update-type">
                <div class="checkbox">
                    <label class="control-label">
                        Yes, I'd like to receive updates and offers from Disney On Ice
                        <input type="checkbox" name="disney_on_ice">
                    </label>
                </div>
            </div>

            {{-- Second Checkbox --}}
            <div class="form-group required update-type">
                <div class="checkbox">
                    <label class="control-label">
                        Yes, I'd like to receive updates and offers from Marvel Universe LIVE!
                        <input type="checkbox" name="marvel_universe_live">
                    </label>
                </div>
            </div>

            {{-- Last Checkbox --}}
            <div class="form-group required update-type">
                <div class="checkbox">
                    <label class="control-label">
                        Yes, I'd like to receive updates and offers from Monster Jam
                        <input type="checkbox" name="monster_jam">
                    </label>
                </div>
            </div>

            <button type="submit" id="submit-button" class="btn btn-success">Submit</button>

        </form>
    </div>
@stop
