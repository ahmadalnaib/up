<script setup>
import SiteSelector from '@/Components/SiteSelector.vue';
import AppLayout from '@/Layouts/AppLayout.vue';



defineProps({
    site: Object,
    sites: Object
})
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
           <div class="flex items-center justify-between">
               <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                   Dashboard
               </h2>
               <div>
                <SiteSelector :sites="sites.data" />
               </div>

           </div>

        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    {{ site }}
                    
                </div>
            </div>
        </div>
    </AppLayout>
</template>
