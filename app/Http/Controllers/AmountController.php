<?php

namespace App\Http\Controllers;

use App\Models\Amount;
use Illuminate\Http\Request;

class AmountController extends Controller
{
    public function store(Request $request)
    {
        Amount::create([
            'amount' => $request->input('amount'),
            'user_id' => $request->input('user_id'),
        ]);
        toastify()->success('Amount added successfully!');
        return redirect()->back();
    }
}
