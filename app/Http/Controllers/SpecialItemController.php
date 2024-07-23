<?php

namespace App\Http\Controllers;
use App\Traits\UploadFile;
use App\Models\SpecialItem;
use App\Models\Beverage;
use Illuminate\Http\Request;

class SpecialItemController extends Controller
{

    use UploadFile;
    /**
     * Display a listing of the special items.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $specialItems = SpecialItem::all();
        $title = "special-Item";
        return view('specialItem', compact('specialItems','title'));
    }


    public function showSpecialItems()
    {
        $specialItems = Beverage::where('special', true)->get();
        return view('specialItem', compact('specialItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $fileName = $this->upload($request->image, 'assets/img');
        $data['image'] = $fileName;

        SpecialItem::create([
            'name' => $request->name,
            'content' => $request->description,
            'image' => $fileName,

        ]);

        return redirect()->route('home')
                        ->with('success','Special-Item created successfully.');
    }
}