<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CustomerController;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
  public function index()
  {
    $customer = Customer::orderBy('id', 'desc')->get();

    return view('customer.index', ['customer' => $customer]);
  }
  public function show($id)
  {
    $customer = Customer::find($id);

    return view('customer.show', ['customer' => $customer]);
  }
  public function edit($id)
  {
    $customer = Customer::find($id);

    return view('customer.edit', ['customer' => $customer]);
  }
  public function update(Request $request, $id)
  {
    $customer = Customer::find($id);
    $customer->segmen = $request->segmen;
    $customer->save();

    return redirect()->route('customer');
  }
  public function delete(Request $request)
  {
    $customer = Customer::find($request->id);
    $customer->delete();

    return redirect()->route('customer');
  }
}
