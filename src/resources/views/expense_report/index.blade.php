@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col">
        <h1>Reports</h1>
        <div class="row">
            <div class="col">
                <a class="btn btn-primary" href="{{route('expense_reports.create')}}">+ New Report</a>
            </div>
        </div>
        <table class="table">
            @foreach ($expenseReports as $expense)
                <tr>
                    <td>{{$expense->title}}</td>
                    <td>
                        <a href="{{route('expense_reports.show', $expense->id)}}">Show</a>
                    </td>
                    <td>
                        <a href="{{route('expense_reports.edit', $expense->id)}}">Edit</a>
                    </td>
                    <td>
                        <a href="{{route('expense_reports.confirmDelete', $expense->id)}}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
