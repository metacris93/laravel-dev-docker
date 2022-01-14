<?php

namespace App\Http\Controllers;

use App\ExpenseReport;
use App\Http\Requests\StoreExpenseReportsRequest;
use Illuminate\Http\Request;

class ExpenseReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenseReports = ExpenseReport::all();
        return view('expense_report.index', compact('expenseReports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expense_report.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreExpenseReports  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExpenseReportsRequest $request)
    {
        // ExpenseReport::create([
        //     'title' => $request->title
        // ]);
        $validated = $request->validated();
        $report = new ExpenseReport();
        $report->title = $validated['title'];
        $report->save();
        return redirect()->route('expense_reports.index')->with('success', 'data created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseReport $expense_report)
    {
        return view('expense_report.show', compact('expense_report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report = ExpenseReport::find($id);
        return view('expense_report.edit', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $report = ExpenseReport::find($id);
        $report->title = $request->get('title');
        $report->save();
        return redirect()->route('expense_reports.index')->with('success', 'data updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = ExpenseReport::find($id);
        $report->delete();
        return redirect()->route('expense_reports.index')->with('success', 'data removed');
    }
    public function confirmDelete($id)
    {
        $report = ExpenseReport::find($id);
        return view('expense_report.confirmDelete', compact('report'));
    }
}
