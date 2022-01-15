@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Report: {{ $expense_report->title }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="{{route('expense_reports.index')}}">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="{{route('expense_reports.confirmSendEmail', $expense_report->id)}}">Send Email</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h3>Details</h3>
            <table class="table">
                @foreach ($expense_report->expenses as $expense)
                    <tr>
                        <td>{{$expense->description}}</td>
                        <td>{{$expense->created_at}}</td>
                        <td>{{$expense->amount}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="{{route('expense.create', $expense_report->id)}}">+ New Expense</a>
        </div>
    </div>
@endsection
