<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
  public function categories(){
    return view('categories.categories');
  }

  public function addCategory(Request $request){
    $this-> validate($request, [
      'category'=>'required'
    ]);
    $category = new Category;
    $category->category = $request->input('category');
    $category->save();
    return redirect('/category')->with('response','Category Added Successfully');
  }
}
