<?php

namespace Bulkly\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Bulkly\BufferPosting;
use DB;

class HistoryController extends Controller
{
    public function __construct()
    {
        if (!Auth::guard('web')->check()) {
            return redirect('/login');
        }
    }
    public function index()
    {
        $date = '2019-01-01'; //default date
        $page = 1;
        $data =  BufferPosting::with(['groupInfo', 'accountInfo'])
            ->whereDate('sent_at', '=', $date)
            ->paginate(20, ['*'], 'page', $page);
            // return response()->json($data['group_info']);
        return view('pages.history')->with('data', $data);
    }

    public function show(Request $request)
    {
        $serch_terms = $request['search'];
        $date = $request['date'];
        if (!isset($date)) {
            $date = date('Y-m-d');
        }
        $group_type = $request['group_type'];
        $page = $request['page'];
        if (!isset($page)) {
            $page = 1;
        }

        if (isset($serch_terms)  && isset($group_type)) {
            $data =  BufferPosting::with(['groupInfo' => function ($query) use ($group_type) {
                $query->where('type', 'like', $group_type);
            }, 'accountInfo'])
                ->whereDate('sent_at', '=', $date)
                ->where('post_text', 'like', '%' . $serch_terms . '%')
                ->paginate(20, ['*'], 'page', $page);
        } elseif (!isset($serch_terms) && isset($group_type)) {
            $data =  BufferPosting::with(['groupInfo' => function ($query) use ($group_type) {
                $query->where('type', 'like', $group_type);
            }, 'accountInfo'])
                ->whereDate('sent_at', '=', $date)
                ->paginate(20, ['*'], 'page', $page);
        } elseif (isset($serch_terms) && !isset($group_type)) {
            $data =  BufferPosting::with(['groupInfo', 'accountInfo'])
                ->whereDate('sent_at', '=', $date)
                ->where('post_text', 'like', '%' . $serch_terms . '%')
                ->paginate(20, ['*'], 'page', $page);
        } else {
            $data =  BufferPosting::with(['groupInfo', 'accountInfo'])
                ->whereDate('sent_at', '=', $date)
                ->paginate(20, ['*'], 'page', $page);
        }
        return response()->json($data);
    }
}
