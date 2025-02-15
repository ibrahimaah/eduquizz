<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        $userCount = User::count();  // Get the number of users
        $subjectCount = Subject::count();  // Get the number of items (replace 'Item' with your actual model)
        return view('admin.statistics.index',['userCount'=>$userCount,'subjectCount'=>$subjectCount]);
    }
}
