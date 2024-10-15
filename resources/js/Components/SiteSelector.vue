<script setup>
import { Link } from '@inertiajs/vue3'
import { VueFinalModal } from 'vue-final-modal'
import { ref } from 'vue'
import TextInput from '@/Components/TextInput.vue';
import InputLabel from  '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm } from '@inertiajs/vue3'
import InputError from '@/Components/InputError.vue';

defineProps({
    sites: Array
})

const showNewSiteModal = ref(false)

const siteForm = useForm({
    domain: ''
})


const createSite = () => {
    siteForm.post('/sites',{
      preserveScroll: true,
      onSuccess: () => {
        siteForm.reset()
        showNewSiteModal.value = false
      }
    })

 
}




</script>

<template>
    <VDropdown :distance="10">
        <button class="flex items-center space-x-2 text-sm">
            <span class="text-gray-500 hover-gray-700"> Select a site</span>
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="size-5 text-green-500"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="m9 12.75 3 3m0 0 3-3m-3 3v-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                />
            </svg>
        </button>

        <template #popper="{hide}"> 
          <ul class="space-y-1">
            <li v-for="site in sites" :key="site.id">
              <Link :href="`/dashboard/${site.id}`" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                {{ site.domain }}
              </Link>
            </li>
           

            <li>
              <button @click="showNewSiteModal=true; hide()" class="block w-full text-left px-4 py-2 hover:bg-gray-100 text-indigo-500 font-bold text-sm">Add a site </button>
            </li>


          </ul>
        </template>
    </VDropdown>
    <VueFinalModal
        v-model="showNewSiteModal"
        class="flex justify-center items-center"
        content-class="flex flex-col w-full max-w-2xl mx-4 p-4 bg-white dark:bg-gray-900 border dark:border-gray-700 rounded-lg space-y-2"
        overlay-class="bg-gradient-to-b from-gray-800 to-gray-500 opacity-50"
        :esc-to-close="true"
    >
        <h2 class="font-semibold text-lg text-gray-800 leading-tight">
            New Site
        </h2>

        <form @submit.prevent="createSite" class="overflow-hidden space-y-4">
          <InputLabel for="domain" value="domain" class="sr-only" />
          <TextInput class="block w-full h-9 text-sm" id="domain" placeholder="example.com"  v-model="siteForm.domain" :class="{'border-red-500':siteForm.errors.domain}"/>
          <InputError :message="siteForm.errors.domain" />

          <PrimaryButton >Add Site</PrimaryButton>
        </form>

        

    </VueFinalModal>

</template>
