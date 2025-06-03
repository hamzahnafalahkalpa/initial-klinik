<script setup lang="ts">
import AppLayout from '@klinik/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@klinik/types';
import { Head } from '@inertiajs/vue3';
import { Form } from '@klinik/components/ui/form';
import TabulatorTable from '@klinik/components/TabulatorTable.vue';  
import { ViewRole } from '@projects/klinik/src/Resources/js/interfaces/Setting/Role';
import { onMounted, ref } from 'vue';
import { toTypedSchema } from '@vee-validate/zod';
import { RoleSchema } from '@projects/klinik/src/Resources/js/dtos/Setting/RoleSchema';
import { useForm } from 'vee-validate';
import { 
    Dialog, DialogContent, 
    DialogHeader, DialogTitle, 
    DialogDescription, DialogFooter
} from '@klinik/components/ui/dialog';
import { Label } from '@klinik/components/ui/label';
import { Input } from '@klinik/components/ui/input';

// Breadcrumbs
const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Dashboard', href: '/dashboard' },
    { title: 'Manajemen Role', href: '/acl/role' },
];

// Table data
const roles = ref<ViewRole[]>([]);
const isDialogOpen = ref(false);

// Ambil data roles saat mount
onMounted(async () => {
    const response = await role();
    if (response.data) {
        roles.value = response.data;
        roles.value = roles.value.map(role => {
            return {
                ...role,
                actions: [
                    {
                        label: 'Ubah',
                        href: `/acl/role/${role.id}/edit`,
                        button: {
                            buttonType: 'edit'
                        }
                    },
                    {
                        label: 'Hapus',
                        href: `/acl/role/${role.id}`,
                        button: {
                            buttonType: 'delete'
                        }
                    }
                ]
            }
        });
    }
});

// Form schema & setup
const formSchema = toTypedSchema(RoleSchema);

// Form handler
const { handleSubmit, values, resetForm } = useForm({
    validationSchema: formSchema,
    initialValues: {
        id: undefined,
        name: '',
        childs: [],
    }
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
    { title: 'Nama', field: 'name', sorter: 'string' },
    { title: 'Created At', field: 'created_at', sorter: 'string' },
    { title: 'actions', field: 'actions' },
];
</script>

<template>
    <Head title="Role" />

    <!-- Dialog Form -->
    <Form @submit="" as="div" keep-values :validation-schema="formSchema">
        <Dialog v-model:open="isDialogOpen">
            <DialogContent class="2xl:max-w-[800px] max-h-[90dvh]">
                <template #dialog-title>
                    <DialogTitle>Formulir Role</DialogTitle>
                    <DialogDescription class="overflow-auto">
                        <p class="text-sm font-light text-gray-500">
                            Perubahan pada hak akses role akan mempengaruhi seluruh pengguna yang menggunakan role tersebut.
                        </p>
                    </DialogDescription>
                </template>
                <div class="flex flex-col gap-2">
                    <Label for="name" :required="true">Nama Role</Label>
                    <Input 
                        id="name"
                        v-model="values.name"
                        name="name"
                        type="text"
                        class="border px-3 py-2 rounded-md"
                        placeholder="Masukkan Nama Role"
                    />
                    <!-- Optional: error -->
                    <!-- <small class="text-red-500" v-if="formSchema?.shape?.name?._def?.message">
                        {{ formSchema.shape.name._def.message }}
                    </small> -->
                </div>
                <template #dialog-footer>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Simpan Perubahan
                    </button>
                </template>
            </DialogContent>
        </Dialog>
    </Form>

    <!-- Layout & Table -->
    <AppLayout 
        :breadcrumbs="breadcrumbs"
        title="MANAJEMEN ROLE" 
        icon="oi:list-rich"
        :actions="[
            {
                label: '',
                href: '/acl/role/create',
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
            :usingFilter="true" 
            :isCentered="true" 
            :data="roles" 
            :columns="columns" 
            id="main" 
            :options="[]"
        />
    </AppLayout>
</template>
