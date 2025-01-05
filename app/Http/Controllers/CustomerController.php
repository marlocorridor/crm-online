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

    public function create()
    {
        return Inertia::render('Customer/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'min:2'],
            'last_name' => ['required', 'string', 'min:2'],
            'email_address' => ['required', 'email:dns', 'min:5', 'unique:customers,email_address'],
            'contact_number' => ['required', 'string', 'min:5'],
        ]);

        Customer::create($request->all());

        return to_route('customer.index');
    }

    public function edit(Customer $customer)
    {
        return Inertia::render('Customer/Edit', [
            'customer' => $customer,
            'update_url' => route('customer.update', $customer),
        ]);
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'min:2'],
            'last_name' => ['required', 'string', 'min:2'],
            'email_address' => ['required', 'email:dns', 'min:5', 'unique:customers,email_address,' . $customer->id],
            'contact_number' => ['required', 'string', 'min:5'],
        ]);

        $customer->update($request->all());

        return to_route('customer.index');
    }
}
