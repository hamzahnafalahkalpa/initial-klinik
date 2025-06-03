<script setup lang="ts">
import AppLayout from '@klinik/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@klinik/types';
import { Head } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import {
    Role, Supplier, Encoding, Bank, Funding
} from '@klinik/pages/setting';
import { Accordion, AccordionContent, AccordionItem, AccordionTrigger } from '@klinik/components/ui/accordion';
import Building from './Building/Building.vue';
import ClassRoom from './ClassRoom/ClassRoom.vue';
import Room from './Room/Room.vue';

// Breadcrumbs
const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Dashboard', href: '/dashboard' },
    { title: 'Pengaturan', href: '/setting' },
];

onMounted(async () => {

});
</script>

<template>
    <Head title="Pengaturan" />

    <AppLayout 
        :breadcrumbs="breadcrumbs"
        title="PENGATURAN"
        subtitle="Pengaturan umum aplikasi" 
        icon="oi:list-rich"
    >
        <Accordion type="single" collapsible>
            <AccordionItem value="Pengaturan Umum">
                <AccordionTrigger>
                    <div class="grid gap-2">
                        <h1 class="font-bold text-[15px]">Pengaturan Umum</h1>
                        <h2 class="text-primary/80">Informasi faskes, pengodean aplikasi</h2>
                    </div>
                </AccordionTrigger>
                <AccordionContent>
                    <div class="w-full grid gap-2 2xl:grid-cols-3 md:grid-cols-2 grid-cols-1">
                        <Encoding class="xl:col-span-2 col-span-1"/>
                    </div>
                </AccordionContent>
            </AccordionItem>
            <AccordionItem value="Access Control List">
                <AccordionTrigger>
                    <div class="grid gap-2">
                        <h1 class="font-bold text-[15px]">Access Control List</h1>
                        <h2 class="text-primary/80">Pengolahan role pengguna dan hak aksesnya</h2>
                    </div>
                </AccordionTrigger>
                <AccordionContent>
                    <div class="w-full grid gap-2 2xl:grid-cols-3 md:grid-cols-2 grid-cols-1">
                        <Role/>
                    </div>
                </AccordionContent>
            </AccordionItem>
            <AccordionItem value="Infrastruktur">
                <AccordionTrigger>
                    <div class="grid gap-2">
                        <h1 class="font-bold text-[15px]">Infrastruktur dan Jejaring Faskes</h1>
                        <h2 class="text-primary/80">Pengelolaan master gedung, kelas, dan ruang, dan jejaring faskes</h2>
                    </div>
                </AccordionTrigger>
                <AccordionContent>
                    <div class="w-full grid gap-2 2xl:grid-cols-5 md:grid-cols-2 grid-cols-1">
                        <Building class="xl:col-span-2 md:col-span-2 col-span-1"/>
                        <ClassRoom class="xl:col-span-3 md:col-span-2 col-span-1"/>
                        <Room class="2xl:col-span-5 xl:col-span-3 md:col-span-2 col-span-1"/>
                    </div>
                </AccordionContent>
            </AccordionItem>
            <AccordionItem value="Finance">
                <AccordionTrigger>
                    <div class="grid gap-2">
                        <h1 class="font-bold text-[15px]">Finance</h1>
                        <h2 class="text-primary/80">Pengelolaan rekening bank, master pendanaan, master komponen tarif</h2>
                    </div>
                </AccordionTrigger>
                <AccordionContent>
                    <div class="w-full grid gap-2 2xl:grid-cols-3 md:grid-cols-2 grid-cols-1">
                        <Bank class="xl:col-span-2 col-span-1"/>
                        <Funding/>
                    </div>
                </AccordionContent>
            </AccordionItem>
            <AccordionItem value="Procurement Asset">
                <AccordionTrigger>Procurement Asset</AccordionTrigger>
                <AccordionContent>
                    <div class="w-full grid gap-2 2xl:grid-cols-3 md:grid-cols-2 grid-cols-1">
                        <Supplier/>
                    </div>
                </AccordionContent>
            </AccordionItem>
        </Accordion>
    </AppLayout>
</template>
