<script setup lang="ts">
import AppLayout from '@klinik/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@klinik/types';
import { Head } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import {
    Role, Supplier, Encoding, Bank, Funding,
    Building, ClassRoom, Room, Agent, Company,
    PatientType, PatientTypeService, ServiceCluster,
    MedicService, 
} from '@klinik/pages/setting';
import { Accordion } from '@klinik/components/ui/accordion';
import SettingItem from './SettingItem.vue';
import Workspace from './Workspace/Workspace.vue';

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
            <SettingItem value="pengaturan-umum" title="Pengaturan Umum" subtitle="Informasi faskes, pengodean aplikasi">
                <div class="w-full grid gap-2 2xl:grid-cols-3 md:grid-cols-2 grid-cols-1">
                    <Workspace class="xl:col-span-3 col-span-1"/>
                    <Encoding class="xl:col-span-2 col-span-1"/>
                </div>
            </SettingItem>
            <SettingItem value="access-control-list" title="Access Control List" subtitle="Pengolahan role pengguna dan hak aksesnya">
                <div class="w-full grid gap-2 2xl:grid-cols-3 md:grid-cols-2 grid-cols-1">
                    <Role/>
                </div>
            </SettingItem>
            <SettingItem value="service" title="Layanan Faskes" subtitle="Layanan poliklinik, clustering, dan layanan lainnya">
                <div class="w-full grid gap-2 2xl:grid-cols-2 md:grid-cols-2 grid-cols-1">
                    <PatientType/>
                    <PatientTypeService/>
                    <MedicService/>
                    <ServiceCluster/>
                </div>
            </SettingItem>
            <SettingItem value="kepegawaian" title="Kepegawaian" subtitle="Master komponen kepegawaian">
                <div class="w-full grid gap-2 2xl:grid-cols-2 md:grid-cols-2 grid-cols-1">
                </div>
            </SettingItem>
            <SettingItem value="pos" title="Point of sales" subtitle="Komponen point of sales">
                <div class="w-full grid gap-2 2xl:grid-cols-2 md:grid-cols-2 grid-cols-1">
                </div>
            </SettingItem>
            <SettingItem value="infrastructure" title="Infrastruktur dan Jejaring Faskes" subtitle="Pengelolaan master gedung, kelas, dan ruang, dan jejaring faskes">
                <div class="w-full grid gap-2 2xl:grid-cols-6 md:grid-cols-2 grid-cols-1">
                    <Building class="xl:col-span-2 md:col-span-2 col-span-1"/>
                    <ClassRoom class="xl:col-span-4 md:col-span-2 col-span-1"/>
                    <Room class="2xl:col-span-6 xl:col-span-3 md:col-span-2 col-span-1"/>
                    <Agent class="2xl:col-span-3 xl:col-span-3 md:col-span-2 col-span-1"/>
                    <Company class="2xl:col-span-3 xl:col-span-3 md:col-span-2 col-span-1"/>
                </div>
            </SettingItem>
            <SettingItem value="finance" title="Finance" subtitle="Pengelolaan rekening bank, master pendanaan, master komponen tarif">
                <div class="w-full grid gap-2 2xl:grid-cols-3 md:grid-cols-2 grid-cols-1">
                    <Bank class="xl:col-span-2 col-span-1"/>
                    <Funding/>
                </div>
            </SettingItem>
            <SettingItem value="procurement-asset" title="Procurement Asset" subtitle="Pengelolaan rekening bank, master pendanaan, master komponen tarif">
                <div class="w-full grid gap-2 2xl:grid-cols-4 md:grid-cols-2 grid-cols-1">
                    <Supplier class="xl:col-span-2 col-span-1"/>
                </div>
            </SettingItem>
        </Accordion>
    </AppLayout>
</template>
