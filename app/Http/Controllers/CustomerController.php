<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $is_trashed = $request->has('trashed') && $request->trashed !== 'false';
        $customers = Customer::query()
            // allow list of trashed customers
            ->when($is_trashed, fn ($query) => $query->onlyTrashed())
            // sorting
            ->orderBy('last_name')
            // get query result
            ->get();

        return Inertia::render('Customer/Index', [
            'customers' => $customers->map(function ($customer) {
                return [
                    'first_name' => $customer->first_name,
                    'last_name' => $customer->last_name,
                    'email_address' => $customer->email_address,
                    'contact_number' => $customer->contact_number,
                    'is_trashed' => $customer->trashed(),
                    'show_url' => route('customer.show', $customer),
                    'edit_url' => route('customer.edit', $customer),
                    'restore_url' => route('customer.restore', $customer),
                ];
            }),
            'create_url' => route('customer.create'),
            'is_trashed' => $is_trashed,
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

        // create new customer record
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

        // update customer record
        $customer->update($request->all());

        return to_route('customer.index');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return to_route('customer.index');
    }

    public function restore(string $customer)
    {
        $customer = Customer::withTrashed()->findOrFail($customer);

        // restore soft-deleted customer record
        $customer->restore();

        return to_route('customer.index');
    }
}
