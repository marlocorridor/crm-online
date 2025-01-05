<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CustomerController extends Controller
{
    public function index()
    {
        return Inertia::render('Customer/Index', [
            'customers' => Customer::orderBy('last_name')->get()->map(function ($customer) {
                return [
                    'first_name' => $customer->first_name,
                    'last_name' => $customer->last_name,
                    'email_address' => $customer->email_address,
                    'contact_number' => $customer->contact_number,
                    'show_url' => route('customer.show', $customer),
                    'edit_url' => route('customer.edit', $customer),
                ];
            }),
            'create_url' => route('customer.create'),
        ]);
    }

    public function show(Customer $customer)
    {
        return Inertia::render('Customer/Show', [
            'customer' => $customer,
            'edit_url' => route('customer.edit', $customer),
        ]);
    }
}
