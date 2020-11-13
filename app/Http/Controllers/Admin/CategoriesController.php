<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function Validate_Req(){
        return request()->validate([
               'name' => 'required',
                'ske'=> 'required',
                'price' => 'required',
                'amount' => 'required',
                'description' => 'required',
                'image' => 'sometimes|file|image|max:5000',
            ]);
    }
    private function storeImage($customer){
        // php artisan storage:link
        if(request()->has('image')){
            $customer->update([
                'image'=>request()->image->store('uploads', 'public'),
            ]);
        }
        else return;
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $categories = Categorie::all();
        return view('admin.Categories.index',compact('categories'));
    }

    public function create()
    {
        $brands= Brand::all();
        $category = new Categorie();
        return view('admin.Categories.create', compact('category','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Categorie::create($this->Validate_Req());
        $this->storeImage($category);
        return redirect('admin/category');     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $category = Categorie::where('id', $id)->firstorfail();
         return view('admin.Categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Categorie::where('id', $id)->firstorfail();
        return view('admin.Categories.edit', compact('category'));
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
        $category = Categorie::where('id', $id)->firstorfail();
        $category->update($this->Validate_Req());
        $this->storeImage($category);
       return redirect('admin/category/'.$category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categorie::where('id', $id)->firstorfail();
        $category->delete();
        return redirect('admin/category');
    }

}
