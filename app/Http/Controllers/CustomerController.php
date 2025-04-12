<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    //function to handle request from api routes
    public function index()
    {
        $customer = Customers::all(); //get all customers
        return response()->json($customer, 200); //return as json all customers data
    }

    public function store(Request $request)
    {
        //validate received data
        $validated_data = $request->validate([
            'customer_name' => 'required | string | max:255',
            'customer_email' => 'required | email',
            'customer_password' => 'required | string',
        ]);
        // Hash the password
        $validated_data['customer_password'] = Hash::make($validated_data['customer_password']);

        //create/store customer
        $customer = Customers::create($validated_data);
        if ($customer) {
            return response()->json(['msg' => 'Sign Up Successful', 'customer_data' => $customer], 200);
        } else {
            return response()->json(['msg' => 'Sign Up Failed', 'response' => $customer], 401);
        }
    }


    public function login(Request $request)
    {
        // Validate received data
        $validated_data = $request->validate([
            'customer_email' => 'required|email',
            'customer_password' => 'required|string',
        ]);

        // Search for customer by received email
        $customer = Customers::where('customer_email', $validated_data['customer_email'])->first();

        if ($customer) {
            // Customer exists, check password
            if (Hash::check($validated_data['customer_password'], $customer->customer_password)) {
                // Password is correct
                return response()->json(['msg' => 'Login Successful', 'customer_data' => $customer], 200);
            } else {
                // Password is incorrect
                return response()->json(['msg' => 'Incorrect Password'], 401);
            }
        } else {
            // Customer not found
            return response()->json(['msg' => 'Customer Not Found'], 404);
        }
    }

}
