<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drugstore;
use Illuminate\Support\Facades\Mail;
use App\Mail\CreateDrugMessageEmail;

class DrugstoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drugstoreModel = new Drugstore();
        $drugstore = $drugstoreModel->getAllDrugstores();
        // dd($drugstore);
        return view('Drugstore.drugstore', ['drugstores' => $drugstore]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // echo "create";
        return view('Drugstore.add_drug'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'drug_name' => 'required|string|max:255',
            'unit' => 'required|string|max:10',
            'quantity' => 'required|integer|max:100000',
            'price' => 'required|integer|max:10000000',
        ]);

        $message = [
            'name' => 'Kyaw Kyaw',
            'message' => 'Drug created successfully',
            'company' => 'Asia Taw Win'
        ];

        $drugstoreModel = new Drugstore();
        $drugstoreModel->createDrugstore($request);
        Mail::to('sawphyonaing.dev@gmail.com')->send(new CreateDrugMessageEmail($message));
        return redirect("/drugstore");
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
        $drugstoreModel = new Drugstore();
        $drugstore = $drugstoreModel->getDrugstoreById($id);
        return view('Drugstore.edit_drug', ['drugstore' => $drugstore]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'drug_name' => 'required|string|max:255',
            'unit' => 'required|string|max:10',
            'quantity' => 'required|integer|max:100000',
            'price' => 'required|integer|max:10000000',
        ]);

        $drugstoreModel = new Drugstore();
        $drugstoreModel->updateDrugstore($request, $id);
        return redirect("/drugstore");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $drugstoreModel = new Drugstore();
        $drugstoreModel->deleteDrugstore($id);
        return redirect("/drugstore");
    }
}
