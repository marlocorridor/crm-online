<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  customer: Object,
  update_url: String,
})

const form = useForm({
  first_name: props.customer.first_name,
  last_name: props.customer.last_name,
  email_address: props.customer.email_address,
  contact_number: props.customer.contact_number,
})
</script>

<template>
  <AppLayout title="Customer Index">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Update Customer form
      </h2>
    </template>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
      <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
              <form @submit.prevent="form.put(update_url)">
                <div class="border-b border-gray-900/10 pb-12">
                  <h2 class="text-base/7 font-semibold text-gray-900">Personal Information</h2>
                  <p class="mt-1 text-sm/6 text-gray-600">Only infomation gathered with consent.</p>

                  <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                      <label for="first_name" class="block text-sm/6 font-medium text-gray-900">First name</label>
                      <div class="mt-2">
                        <input type="text" id="first_name" required autocomplete="given-name" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                          v-model="form.first_name"
                        />
                      </div>
                      <div class="text-red-500 text-sm/6 italic">
                        {{ form.errors.first_name }}
                      </div>
                    </div>

                    <div class="sm:col-span-3">
                      <label for="last_name" class="block text-sm/6 font-medium text-gray-900">Last name</label>
                      <div class="mt-2">
                        <input type="text" id="last_name" required autocomplete="family-name" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                          v-model="form.last_name"
                        />
                      </div>
                      <div class="text-red-500 text-sm/6 italic">
                        {{ form.errors.last_name }}
                      </div>
                    </div>

                    <div class="sm:col-span-4">
                      <label for="email_address" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                      <div class="mt-2">
                        <input id="email_address" type="email" required autocomplete="email" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                          v-model="form.email_address"
                        />
                      </div>
                      <div class="text-red-500 text-sm/6 italic">
                        {{ form.errors.email_address }}
                      </div>
                    </div>

                    <div class="sm:col-span-4">
                      <label for="contact_number" class="block text-sm/6 font-medium text-gray-900">Contact number</label>
                      <div class="mt-2">
                        <input id="contact_number" type="text" required autocomplete="contact_number" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                          v-model="form.contact_number"
                        />
                      </div>
                      <div class="text-red-500 text-sm/6 italic">
                        {{ form.errors.contact_number	 }}
                      </div>
                    </div>
                  </div>
                </div>
                <button type="submit" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                  :disabled="form.processing"
                >
                  Submit
                </button>
              </form>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
