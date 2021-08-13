<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function todayOrder(){
        $today = date('d-m-y');
        $order = DB::table('orders')->where('status',0)->where('date',$today)->get();
        return view('admin.report.today-order',compact('today','order'));
    }
    public function todayDelivery(){
        $today = date('d-m-y');
        $order = DB::table('orders')->where('status',3)->where('date',$today)->get();
        return view('admin.report.today-delivery',compact('today','order'));
    }
    public function thisMonthDelivery(){
        $month = date('F');
        $order = DB::table('orders')->where('status',3)->where('month',$month)->get();
        return view('admin.report.this_month_delivery',compact('month','order'));
    }
    public function searchReport(){
        return view('admin.report.search');
    }
    public function searchByYear(Request $request){
        $year = $request->year;
        $order = DB::table('orders')->where('status',3)->where('year',$year)->get();
        $total = DB::table('orders')->where('status',3)->where('year',$year)->sum('total');
        return view('admin.report.search_by_year',['order'=>$order,'total'=>$total]);
    }
    public function searchByMonth(Request $request){
        $month = $request->month;
        $order = DB::table('orders')->where('status',3)->where('month',$month)->get();
        $total = DB::table('orders')->where('status',3)->where('month',$month)->sum('total');

        return view('admin.report.search_by_month',['order'=>$order,'total'=>$total]);
    }
    public function searchByDate(Request $request){
        $date = $request->date;
        $newDate = date('d-m-y',strtotime($date));
        $order = DB::table('orders')->where('status',3)->where('date',$newDate)->get();

        $total = DB::table('orders')->where('status',3)->where('date',$newDate)->sum('total');

        return view('admin.report.search_by_date',['order'=>$order,'total'=>$total]);
    }

}
