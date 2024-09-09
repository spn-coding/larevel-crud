<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Drugstore extends Model
{
    use HasFactory;

    /**
     * Get all drugstore
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllDrugstores()
    {
        return DB::table('drugstores')
        ->where('del_flag', 0)
        ->orderBy('id', 'desc')
        ->paginate(9);
    }

    /**
     * Get a drugstore by id
     * 
     * @param string $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getDrugstoreById(string $id)
    {
        return DB::table('drugstores')
        ->where('id', $id)
        ->first();
    }

    /**
     * Create a new drugstore
     * 
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function createDrugstore(Request $request)
    {
        DB::table('drugstores')->insert([
            'drug_name' => $request->drug_name,
            'unit' => $request->unit,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'del_flag' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Update a drugstore
     * 
     * @param \Illuminate\Http\Request $request
     * @param string $id
     * @return void
     */
    public function updateDrugstore(Request $request, string $id)
    {
        DB::table('drugstores')->where('id', $id)->update([
            'drug_name' => $request->drug_name,
            'unit' => $request->unit,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'updated_at' => now(),
        ]);
    }

    /**
     * Delete a drugstore
     * 
     * @param string $id
     * @return void
     */
    public function deleteDrugstore(string $id)
    {
        DB::table('drugstores')->where('id', $id)->update(['del_flag' => 1]);
    }

}
