<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Validator;
use Session;

class CategoryController extends Controller
{
    public function index(){
        return view('category.index'); 
    }

    public function create(){
        return view('category.create');
    }

   public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50|min:3',
            
        ]);

        if ($validator->fails()) {
            session::flash('coc','Category Creation Failed....!');
            return redirect('category/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Store the blog post...
        $category = new Category;
         $category->name = $request->name;
          $category->save();
          session::flash('cc', nl2br('Category Is Created Successfully....!!       Click Show All Category Button to see Created Category'));
          return redirect('category/create');
          // '<pre>'
           // print_r($category);
          // '</pre>'
    }


    public function show()
    {
        $categories = Category::all();
        // $categories = 5;
        return view('category.show',compact('categories'));
    }

    public function edit($id){
        $category = Category::find($id);
        return view('category.edit',compact('category'));
    }

    public function update(Request $request, $id){

             $validator = Validator::make($request->all(), [
            'name' => 'required|max:50|min:3',
            
        ]);

        if ($validator->fails()) {
            session::flash('cuf','Category Update Failed....!');
            return redirect('category/show')
                        ->withErrors($validator)
                        ->withInput();
        }

        //update Category code
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect('category/show')->with('cu','Category has been Updated');
    }

    public function destroy($id){

        $category = Category::find($id);
        $category->delete();
        return redirect('category/show')->with('dc','Category Has Been DELETED...!');

    }
}
