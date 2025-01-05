<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import ConfirmationModal from '@/Components/ConfirmationModal.vue';
import DangerButton from '@/Components/DangerButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import { Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue'

const props = defineProps({
  customer: Object,
  edit_url: String,
})

const confirmingUserDeletion = ref(false)

function toggleDeleteModal() {
  confirmingUserDeletion.value=!confirmingUserDeletion.value
}

const form = useForm({})

function deleteUser() {
  form.delete(
    route('customer.destroy', props.customer.id)
  )
}
</script>

<template>
  <AppLayout title="Customer Index">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Customer Details page
      </h2>
    </template>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
      <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
          <h1 class="text-base font-semibold text-gray-900">{{customer.last_name}}, {{ customer.first_name }}</h1>
          <p class="mt-2 text-sm text-gray-700">{{ customer.email_address }}</p>
          <p class="mt-2 text-sm text-gray-700">{{ customer.contact_number }}</p>
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
          <Link :href="edit_url" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Edit
          </Link>
        </div>
      </div>

      <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow ring-1 ring-black/5 sm:rounded-lg">
              <!-- Details to follow -->
            </div>
          </div>
        </div>
      </div>

      <div class="mt-2 flex flex-row-reverse">
        <button type="button" @click="toggleDeleteModal" class="block rounded-md bg-red-500 px-2 py-2 text-center text-sm uppercase font-semibold text-white shadow-sm hover:bg-red-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
          Delete
        </button>
      </div>
    </div>

    <ConfirmationModal :show="confirmingUserDeletion" @close="confirmingUserDeletion = false">
      <template #title>
        Delete Customer Record
      </template>

      <template #content>
        Are you sure you want to delete this customer?
      </template>

      <template #footer>
        <SecondaryButton @click.native="confirmingUserDeletion = false">
          Nevermind
        </SecondaryButton>

        <DangerButton class="ml-2" @click.native="deleteUser" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
          Delete Account
        </DangerButton>
      </template>
    </ConfirmationModal>
  </AppLayout>
</template>
