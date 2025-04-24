<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computers;
class ComputersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $computerss = Computers::all();
        $computerss = Computers::paginate(15);


        return view('index', compact('computerss'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'processor' => 'required|string',
            'ram' => 'required|integer',
            'graphics_card' => 'required|string',
            'storage' => 'required|string',
            'operating_system' => 'required|string',
            'screen_size' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        $computer = Computers::create($validatedData);

        return redirect('/computerss')->with('success', 'The computer is successfully saved');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $computers = Computers::findOrFail($id);
        
        return view('edit', compact('computers'));
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $validatedData = $request->validate([
        'brand' => 'required|string',
        'model' => 'required|string',
        'processor' => 'required|string',
        'ram' => 'required|integer',
        'graphics_card' => 'required|string',
        'storage' => 'required|string',
        'operating_system' => 'required|string',
        'screen_size' => 'required|numeric',
        'price' => 'required|numeric',
    ]);

    Computers::whereId($id)->update($validatedData);

    return redirect('/computerss')->with('success', 'Computer data is successfully updated');
}

    



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    { 
        $computers = Computers::findOrFail($id);
        $computers->delete();
        return redirect('/computerss')->with('success', 'Computer data is successfully deleted');
        
    }
}
