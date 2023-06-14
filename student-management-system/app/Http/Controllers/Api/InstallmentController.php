<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Installment;
use Illuminate\Http\Request;

class InstallmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $installments = Installment::all();
        return response()->json($installments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $installments = new Installment();
        $installments->admission_id = $request->admission_id;
        $installments->installment_no = $request->installment_no;
        $installments->due_date = $request->due_date;
        $installments->amount = $request->amount;
        $installments->status = $request->status;

        $installments->save();

        return response()->json([
            'success' => true,
            'status' => 201,
            'message' => 'Installment placed successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $installments = Installment::find($id);
        return response()->json([
            'success' => true,
            'installments' => $installments
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $installments = Installment::find($id);
        $installments->admission_id = $request->admission_id;
        $installments->installment_no = $request->installment_no;
        $installments->due_date = $request->due_date;
        $installments->amount = $request->amount;
        $installments->status = $request->status;

        $installments->update();

        return response()->json([
            'success' => true,
            'status' => 201,
            'message' => 'Installment updated successfully'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $installments = Installment::find($id);
        $installments->delete();
        return response()->json([
            'success' => true,
            'installments' => 'Installment deleted successfully'
        ]);
    }
}
