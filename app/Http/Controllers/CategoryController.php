<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Category;
use DB;


class CategoryController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function manageCategory()
    {
        $categories = Category::where('parent_id', '=', 0)->get();
        $allCategories = Category::pluck('title','id')->all();
        return view('categoryTreeview',compact('categories','allCategories'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function addCategory(Request $request)
    {
        $this->validate($request, [
        		'title' => 'required',
        ]);
        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];
        
        Category::create($input);
       // echo "ehsan";
        return back()->with('success', 'New Category added successfully.');
    }

    public function postEdit(Request $request,$title) {
        
		DB::table('categories')
            ->where('id', $id)
            ->update(['title' => $input]);
        return redirect('categoryTreeview');
	}

    /*public function store(Request $request)
    {
        $post = new Category;
        $post->title = $request->title;
        //$post->description = $request->description;
        $post->save();
        return redirect('categoryTreeview')->with('status', 'Blog Post Form Data Has Been inserted');
    }*/
}
