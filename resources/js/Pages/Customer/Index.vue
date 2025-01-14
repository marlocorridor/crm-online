<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
  customers: [],
  create_url: String,
  is_trashed: Boolean,
})
</script>

<template>
  <AppLayout title="Customer Index">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Customer List page
      </h2>
    </template>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
      <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
          <h1 class="text-base font-semibold text-gray-900">Customers</h1>
          <p class="mt-2 text-sm text-gray-700">A list of all the customers in your account.</p>
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
          <a :href="create_url" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            New Customer Data
          </a>
        </div>
      </div>
      <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow ring-1 ring-black/5 sm:rounded-lg">
              <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Last Name</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">First Name</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Contact Number</th>
                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                      <span class="sr-only">Edit</span>
                    </th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                  <tr v-for="person in customers" :key="person.email">
                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ person.last_name }}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ person.first_name }}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ person.email_address }}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ person.contact_number }}</td>
                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                      <template v-if="!is_trashed">
                        <Link :href="person.show_url" class="text-indigo-600 hover:text-indigo-900 ml-2">
                          View<span class="sr-only">, {{ person.name }}</span>
                        </Link>
                        <Link :href="person.edit_url" class="text-indigo-600 hover:text-indigo-900 ml-2">
                          Edit<span class="sr-only">, {{ person.name }}</span>
                        </Link>
                      </template>
                      <template v-else>
                        <Link :href="person.restore_url" class="text-indigo-600 hover:text-indigo-900 ml-2">
                          Restore<span class="sr-only">, {{ person.name }}</span>
                        </Link>
                      </template>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="mt-2 flex flex-row-reverse">
              <Link :href="is_trashed ? '?trashed=false' : '?trashed=true'" class="block rounded-md bg-gray-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
              >
                Show {{ is_trashed ? 'Active' : 'Trashed' }} Customers
              </Link>
            </div>
          </div>
        </div>
      </div>
    </div>

  
  </AppLayout>
</template>
