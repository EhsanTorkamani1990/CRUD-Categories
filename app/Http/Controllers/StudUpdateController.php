<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Category;

class StudUpdateController extends Controller {
   public function index() {
      $users = DB::select('select * from categories');
      return view('stud_edit_view',['users'=>$users]);
   }
   public function show($id) {
      $users = DB::select('select * from categories where id = ?',[$id]);
      return view('stud_update',['users'=>$users]);
   }
   public function edit(Request $request,$id) {
      $name = $request->input('title');
      DB::update('update categories set title = ? where id = ?',[$name,$id]);
      echo "Record updated successfully.<br/>";
      echo '<a href = "/category-tree-view">Click Here</a> to go back.';
   }

   public function destroy($id) {
      DB::delete('delete from categories where id = ?',[$id]);
      echo "Record deleted successfully.<br/>";
      echo '<a href = "/category-tree-view">Click Here</a> to go back.';
   }
}
