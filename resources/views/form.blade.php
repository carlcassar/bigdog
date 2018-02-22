<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BigDog Test</title>

    {{-- Styles--}}
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">

    <div class="jumbotron">
        <h1>Data Capture Form</h1>
    </div>

    <form action="" method="post" enctype="multipart/form-data">

        {{ csrf_field() }}

        {{-- First Name --}}
        <div class="form-group required">
            <label class="control-label" for="first_name">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="e.g. John" required>
        </div>

        {{-- Last Name --}}
        <div class="form-group required">
            <label class="control-label" for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="e.g. Smith" required>
        </div>

        {{-- Email Address --}}
        <div class="form-group required">
            <label class="control-label" for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="e.g. johnsmith@example.com" required>
        </div>

        {{-- Telephone Number --}}
        <div class="form-group">
            <label class="control-label" for="telephone_number">Telephone Number</label>
            <input type="text" class="form-control" id="telephone_number" name="telephone_number" placeholder="+44">
        </div>

        {{-- Address --}}
        <div class="form-group required">
            <label class="control-label" for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="e.g. 4 Privet Drive" required>
        </div>

        {{-- Town/City --}}
        <div class="form-group">
            <label class="control-label" for="town_city">Town / City </label>
            <input type="text" class="form-control" id="town_city" name="town_city" placeholder="Little Whinging">
        </div>

        {{-- County --}}
        <div class="form-group required">
            <label class="control-label" for="county">County</label>
            <input type="text" class="form-control" id="county" name="county" placeholder="Surrey" required>
        </div>

        {{-- Postcode --}}
        <div class="form-group">
            <label class="control-label" for="postcode">Postcode</label>
            <input type="text" class="form-control" id="postcode" name="postcode" placeholder="WD25 7LR">
        </div>

        {{-- Upload Button --}}
        <div class="form-group required">
            <label class="control-label" for="selfie">Upload a selfie</label>
            <input type="file" class="form-control" id="selfie" name="selfie" required>
        </div>

        {{-- Show / Hide Checkboxes --}}
        <p>
            Would you like to receive updates from us?
            <a href="#">Yes</a> | <a href="#">No</a>
        </p>

        {{-- First Checkbox --}}
        <div class="form-group required">
            <div class="checkbox">
                <label class="control-label">
                    Yes, I'd like to receive updates and offers from Disney On Ice <input type="checkbox" name="disney_on_ice" required>
                </label>
            </div>
        </div>

        {{-- Second Checkbox --}}
        <div class="form-group required">
            <div class="checkbox">
                <label class="control-label">
                    Yes, I'd like to receive updates and offers from Marvel Universe LIVE! <input type="checkbox" name="marvel_universe_live" required>
                </label>
            </div>
        </div>

        {{-- Last Checkbox --}}
        <div class="form-group required">
            <div class="checkbox">
                <label class="control-label">
                    Yes, I'd like to receive updates and offers from Monster Jam <input type="checkbox" name="monster_jam" required>
                </label>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Submit</button>

    </form>
</div>
</body>
</html>
