<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beverage;
use App\Models\Category;
use App\Traits\UploadFile;

class BeverageController extends Controller
{
    use UploadFile;
    /**
     * Display a listing of the resource.
     */
     public function index()
     {
        $title = 'Beverages';

        $beverages = Beverage::all();
        return view('admin.beverages', compact('title', 'beverages'));
     }

    public function drinks()
    {
        $title = 'Drinks';
        $beverages = Beverage::all();
        $coldBeverages = Beverage::where('category_id', 1)->get();
        $hotBeverages = Beverage::where('category_id', 2)->get();
        $juiceBeverages = Beverage::where('category_id', 3)->get();
        $categories = Category::with('beverages')->get();
        // dd($beverages, $coldBeverages, $hotBeverages, $juiceBeverages, $categories);
        return view('main', compact('title','beverages', 'coldBeverages', 'hotBeverages', 'juiceBeverages', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Add Beverage';
        return view('admin.addBeverage',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|integer|exists:categories,id',
        ]);
        $data['published'] = $request->has('published');
        $data['special'] = $request->has('special');
         // Handle image upload
         if ($request->hasFile('image')) {
            $fileName = $this->upload($request->image, 'assets2/images');
            $data['image'] = $fileName;
        } else {
            $data['image'] = null;
        }
        $beverage = Beverage::create($data);
        return redirect()->route('beverages.index')->with('success', 'The drink has been added successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $drink = Beverage::findOrFail($id);
            return view('admin.showBeverage', compact('drink'));
        } catch (\Exception $e) {
            return redirect()->route('beverages.index')->with('error', 'Beverage not found.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = 'Edit Beverage';
        try {
            $beverage = Beverage::findOrFail($id);
            return view('admin.editBeverage', compact('beverage','title'));
        } catch (\Exception $e) {
            return redirect()->route('beverages.index')->with('error', 'Beverage not found.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request data for update
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|integer|exists:categories,id',
            'published' => 'boolean',
            'special' => 'boolean',
        ]);


        $beverage = Beverage::findOrFail($id);
        if ($request->hasFile('image')) {
            // Remove old image if exists
            if ($beverage->image) {
                $oldImagePath = public_path($beverage->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Upload new image
            $fileName = $this->upload($request->file('image'), 'assets2/images');
            $beverage->image = $fileName;
        }

        // Update other fields
        $beverage->title = $request->input('title');
        $beverage->content = $request->input('content');
        $beverage->price = $request->input('price');
        $beverage->category_id = $request->input('category_id');
        $beverage->published = $request->input('published', false);
        $beverage->special = $request->has('special');

        // Save the updated beverage
        try {
            $beverage->save();
            return redirect()->route('beverages.index')->with('success', 'Beverage updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update beverage: ' . $e->getMessage())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $beverage = Beverage::findOrFail($id);
            $beverage->delete();
            return redirect()->route('beverages.index')->with('success', 'Beverage deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('beverages.index')->with('error', 'Failed to delete beverage: ' . $e->getMessage());
        }
    }
}