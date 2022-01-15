@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Delete Report {{ $report->id }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="{{route('expense_reports.index')}}">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="{{ route('expense_reports.SendEmail', $report->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Type an email" value="{{old('email')}}">
                </div>
                <button class="btn btn-primary" type="submit" >Send</button>
            </form>
        </div>
    </div>
@endsection
