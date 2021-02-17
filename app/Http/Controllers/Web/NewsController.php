<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
    	return view('dcatcms.news-index', ['name'=>'dcat']);
    }

    public function list(Request $request)
    {
        return 'list';
    }

    public function detail(Request $request)
    {
        return 'detail';
    }
}
