@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if(is_null(\Illuminate\Support\Facades\Auth::user()->twilio_phone))
                        <form action="{{route('assign')}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-block">Get A Number</button>
                        </form>
                    @else
                        <h4>Here Is Your Twilio Phone Number: {{\Illuminate\Support\Facades\Auth::user()->twilio_phone}}</h4>
                        <small> Call it with a different phone.</small>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
