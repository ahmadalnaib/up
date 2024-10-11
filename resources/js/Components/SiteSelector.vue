<script setup>
import { Link } from '@inertiajs/vue3'


defineProps({
    sites: Array
})
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

        <template #popper> 
          <ul class="space-y-1">
            <li v-for="site in sites" :key="site.id">
              <Link :href="`/dashboard/${site.id}`" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                {{ site.domain }}
              </Link>
            </li>
           

            <li>
              <button class="block w-full text-left px-4 py-2 hover:bg-gray-100 text-indigo-500 font-bold text-sm">Add a site </button>
            </li>


          </ul>
        </template>
    </VDropdown>
</template>
