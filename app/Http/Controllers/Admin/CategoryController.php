<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Catch_;

class CategoryController extends Controller
{


    public function toggleStatus($id)
    {
        $categories = Category::findOrFail($id);
        $categories->category_status = $categories->category_status == '0' ? '1' : '0';
        $categories->save();

        return response()->json(['status' => $categories->category_status, 'success' => 'category status updated successfully.']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $categories = DB::table('categories as child')
    ->leftJoin('categories as parent', 'child.parent_category_id', '=', 'parent.id')
    ->select('child.*', 'parent.category_name as parent_category_name')
    ->paginate(6);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.categories.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'category_name' => ['required', 'string', 'max:255', 'unique:categories,category_name'],
            'category_description' => ['required', 'string'],
            'category_image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'category_icon' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:1024'],

        ]);

        if ($request->hasFile('category_image')) {
            $imagePath = $request->file('category_image')->store('Category_Images', 'public');
        }

        if ($request->hasFile('category_icon')) {
            $iconPath = $request->file('category_icon')->store('Category_Icons', 'public');
        }


        $category = Category::create([
            'category_name' => $request->input('category_name'),
            'category_description' => $request->input('category_description'),
            'category_image' => $imagePath,
            'category_icon' => $iconPath,
            'category_status' => '1', // Assuming this means 'active'
            'parent_category_id' => $request->input('parent_category'),
        ]);

        return redirect()->route('category.show', ['id' => $category->id])
            ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::with('subCategories')->findOrFail($id);
        if ($category == NULL) {
            return redirect()->back()->with("error", "Category Not Found");
        } else {
            return view('admin.categories.show', compact('category'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $category = Category::findOrFail($id);
        if(!$category){
            return redirect()->back('with',"category not found");
        }
        else{
            if ($category->parent_category_id === null) {
                // Editing a parent category: No categories should be displayed
                $allCategory = collect([]);
            } elseif($category->parent_category_id == null && $category->id!=$category->parent_category_id){
                $allCategory = Category::whereNull('parent_category_id')->get();
            }
            else {
                // Editing a child category: Display only parent categories with parent_category_id null
                $allCategory = Category::whereNull('parent_category_id')->get();
            }
            return view('admin.categories.edit', compact('category','allCategory'));
        }


    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $category = Category::find($id);

        $validation = $request->validate([
            'category_name' => ['required', 'string', 'max:255'],
            'category_description' => ['required', 'string'],
            'category_image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'category_icon' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:1024'],
        ]);



        if ($request->hasFile('category_image')) {
            $imagePath = $request->file('category_image')->store('Category_Images', 'public');
        }

        if ($request->hasFile('category_icon')) {
            $iconPath = $request->file('category_icon')->store('Category_Icons', 'public');
        }
        if ($category == NULL) {

        }
         else {
            $category->update([
                'category_name' => $request->input('category_name'),
                'category_description' => $request->input('category_description'),
                'category_image' => $imagePath,
                'category_icon' => $iconPath,
                'category_status' => '1', // Assuming this means 'active'
                'parent_category_id' => $request->input('parent_category'),
                'updated_by'=>Auth::id(),
            ]);
        }


    // Update related courses with the new parent category ID
    $subcategories = $category->subcategories;
    $subcategories->load('courses'); // Load courses relation

    foreach ($subcategories as $subcategory) {
        foreach ($subcategory->courses as $course) {
            $course->category_id = $request->input('parent_category');
            $course->save();
        }
    }



        return redirect()->route('category.show', ['id' => $category->id])
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash()
    {
        $categories = Category::onlyTrashed()->get();

            return view('admin.categories.trash', compact('categories'));
    }


    public function moveToTrash(string $id){
        $category = Category::findOrFail($id);
        if($category==NULL){
            return redirect()->back()->with('success', 'Category Not Found');
        }
        else
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category moved to trashed');

    }

    public function restore(string $id)
    {


    }

    public function forceDelete(string $id)
    {

    }




}
