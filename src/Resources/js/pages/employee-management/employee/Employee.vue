<script setup lang="ts">
import AppLayout from '@klinik/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@klinik/types';
import { Head } from '@inertiajs/vue3';
import { Form } from '@klinik/components/ui/form';
import TabulatorTable from '@klinik/components/TabulatorTable.vue';  
import type { CellComponent } from 'tabulator-tables';
import { onMounted, ref } from 'vue';
import { toTypedSchema } from '@vee-validate/zod';
import { useForm } from 'vee-validate';
import { 
    Dialog, DialogContent, 
    DialogHeader, DialogTitle, 
    DialogDescription, DialogFooter
} from '@klinik/components/ui/dialog';
import { Label } from '@klinik/components/ui/label';
import { Input } from '@klinik/components/ui/input';
import { apiClient } from '@klinik/composables/useApi/client';
import { ViewEmployee } from '@klinik/interfaces/EmployeeManagement/Employee';
import { EmployeeSchema } from '@klinik/dtos/EmployeeManagement/EmployeeSchema';
import TabulatorFilter from '@klinik/components/TabulatorFilter.vue';

// Breadcrumbs
const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Dashboard', href: '/dashboard' },
    { title: 'Manajemen Employee', href: '/acl/employee' },
];

// Table data
const employee = ref<{
  data: ViewEmployee[];
  loading: boolean;
}>({
  data: [],
  loading: true,
});
const isDialogOpen = ref(false);

// Ambil data employee saat mount
onMounted(async () => {
    employee.value.loading = true;
    const response = await apiClient.employee.index();
    if (response.data.data) {
        employee.value.data = response.data.data;
        employee.value.data = employee.value.data.map(employee => {
            return {
                ...employee,
                actions: [
                    {
                        label: 'Ubah',
                        href: `/acl/employee/${employee.id}/edit`,
                        button: {
                            buttonType: 'edit'
                        }
                    },
                    {
                        label: 'Hapus',
                        href: `/acl/employee/${employee.id}`,
                        button: {
                            buttonType: 'delete'
                        }
                    }
                ]
            }
        });
        employee.value.loading = false;
    }
});

// Form schema & setup
const formSchema = toTypedSchema(EmployeeSchema);

// Form handler
const { handleSubmit, values, resetForm } = useForm({
    validationSchema: formSchema,
    // initialValues: {
    //     id: undefined,
    //     name: '',
    //     childs: [],
    // }
});

// Form submit logic
// const onSubmit = handleSubmit(values => {
//     console.log('Submitted values:', values);
//     // Kirim ke server via Inertia or API
//     isDialogOpen.value = false;
//     resetForm(); // Reset setelah submit
// });

// Table columns
const columns = [
    { title: 'Nama Pegawai', field: 'people.name', sorter: 'string' },
    {
        title: 'TTD',
        field: 'people.dob', // bisa field apapun untuk sorting, tapi wajib string
        sorter: 'string',
        formatter: (cell: typeof CellComponent) => {
            const row: ViewEmployee = cell.getData();
            return `${row.people.pob}, ${row.people.dob}`;
        },
    },
    { title: 'Tgl Kerja', field: 'hired_at', sorter: 'string' },
    { title: 'Tipe Pegawai', field: 'employee_type.name', sorter: 'string' },
    { title: 'Profesi', field: 'profession.name', sorter: 'string' },
    { title: 'Pekerjaan', field: 'occupation.name', sorter: 'string' },
    { title: '', field: 'actions' },
];
</script>

<template>
    <Head title="Employee" />

    <!-- Dialog Form -->
    <!-- <Form @submit="" as="div" keep-values :validation-schema="formSchema">
        <Dialog v-model:open="isDialogOpen">
            <DialogContent class="2xl:max-w-[800px] max-h-[90dvh]">
                <template #dialog-title>
                    <DialogTitle>Formulir Employee</DialogTitle>
                    <DialogDescription class="overflow-auto">
                        <p class="text-sm font-light text-gray-500">
                            Perubahan pada hak akses employee akan mempengaruhi seluruh pengguna yang menggunakan employee tersebut.
                        </p>
                    </DialogDescription>
                </template>
                <div class="flex flex-col gap-2">
                    <Label for="name" :required="true">Nama Employee</Label>
                    <Input 
                        id="name"
                        v-model="values.name"
                        name="name"
                        type="text"
                        class="border px-3 py-2 rounded-md"
                        placeholder="Masukkan Nama Employee"
                    />
                    Optional: error 
                    <small class="text-red-500" v-if="formSchema?.shape?.name?._def?.message">
                        {{ formSchema.shape.name._def.message }}
                    </small>
                </div>
                <template #dialog-footer>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Simpan Perubahan
                    </button>
                </template>
            </DialogContent>
        </Dialog>
    </Form> -->

    <!-- Layout & Table -->
    <AppLayout 
        :breadcrumbs="breadcrumbs"
        title="DATA PEGAWAI" 
        icon="oi:list-rich"
        :actions="[
            {
                label: '',
                href: '/employee-management/employee/create',
                onClick: () => {
                    isDialogOpen = true;
                    resetForm(); // Kosongkan form saat buka
                },
                button : {
                    buttonType: 'add',
                }
            },
        ]"
    >
        <TabulatorTable 
            :loading="employee.loading"
            :usingFilter="true" 
            :data="employee.data" 
            :columns="columns" 
            id="main" 
            :options="[]"
        >
            <template #toolbar>
                <TabulatorFilter class="w-max" label="Pencarian">
                    <Input
                        class="my-auto xl:grid-cols-2"
                        type="text"
                        placeholder="Cari menggunakan nama, profesi, atau pekerjaan"
                        id="filter-value"
                    />
                </TabulatorFilter>
            </template>
        </TabulatorTable>
    </AppLayout>
</template>
