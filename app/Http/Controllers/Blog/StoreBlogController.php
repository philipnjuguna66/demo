<?php

namespace App\Http\Controllers\Blog;

use App\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StoreBlogController extends Controller
{
    public function index(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'subject' => 'required|string',
            'message' => 'required|string',

        ], [
            'subject.required' => 'Please enter the subject of the article'
        ]);


        if ($validator->fails())
        {
            return back()->withErrors($validator);
        }
        try{
            DB::beginTransaction();


            Blog::create([
                'subject' => $request['subject'],
                'message'  => $request['message'],
                'user_id' => auth()->id()
            ]);




            DB::commit();


            return back()->with('success','created an article');
        }
        catch (\Exception $exception) {
            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }
    }

    public function list()
    {
        $blogs = Blog::where([])->get();

        return view('blog')->with([
            'blogs' => $blogs
        ]);
    }
}
