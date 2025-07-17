<script setup lang="ts">
import { ViewRole } from '@klinik/interfaces/Setting/Role';
import { onMounted, ref } from 'vue';
import { cn } from '@klinik/lib/utils'
import { apiClient } from '@klinik/composables/useApi/client';
import { toast } from 'vue-sonner';
import { 
    Input, 
    Card, CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
    Dialog, DialogContent, 
    DialogTitle, 
    DialogDescription, DialogFooter
} from '@klinik/components/ui';
import TabulatorTable from '@klinik/components/TabulatorTable.vue';  
import { toTypedSchema } from '@vee-validate/zod';
import { RoleSchema } from '../../../dtos/Setting/RoleSchema';
import { 
    Form,
    FormField,
    FormItem,
    FormLabel,
    FormControl,
    FormMessage
} from '@klinik/components/ui/form';
import Button from '@klinik/components/ui/button/Button.vue';

const role = ref<{
  data: ViewRole[];
  loading: boolean;
}>({
  data: [],
  loading: true,
});

const isDialogOpen = ref(false);

onMounted(async () => {
    role.value.loading = true;
    const response = await apiClient.role.index();
    if (response.data) {
        role.value.data = response.data.map((role: ViewRole) => ({
            ...role,
            actions: [
                {
                    href: `/setting/role/${role.id}/edit`,
                    button: { buttonType: 'edit' }
                },
                {
                    href: `/setting/role/${role.id}`,
                    button: { buttonType: 'delete' }
                }
            ]
        }));
    }
    role.value.loading = false;
});

const columns = [
    { field: 'actions', headerSort: false },
    { 
        title: 'Nama', 
        field: 'name', 
        sorter: 'string', 
        headerFilter: 'input', 
        headerFilterPlaceholder: 'Cari berdasarkan nama' 
    },
];

const formSchema = toTypedSchema(RoleSchema);

async function onSubmit(values: any){
    toast.loading('Role dalam penyimpanan...');
    try {
        const response = await apiClient.role.store(values);
        if (response.data) {
            toast.success('Role berhasil disimpan');
            role.value.data.unshift({
                ...response.data,
                actions: [
                    {
                        href: `/setting/role/${response.data.id}`,
                        button: { buttonType: 'edit' }
                    },
                    {
                        href: `/setting/role/${response.data.id}`,
                        button: { buttonType: 'delete' }
                    }
                ]
            });
            isDialogOpen.value = false;
        }
    } catch (error) {
        toast.error('Gagal menyimpan role');
        console.error(error);
    }
    setTimeout(() => {
        toast.dismiss();
    }, 3000);
}
</script>

<template>
    <Form v-slot="{ handleSubmit }" as="" :validation-schema="formSchema"
        class="flex flex-col gap-2"
    >
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
                <form id="roleForm" @submit="handleSubmit($event, onSubmit)">
                    <FormField v-slot="{ componentField }" name="name">
                        <FormItem>
                            <FormLabel :required="true">Nama Role</FormLabel>
                            <FormControl>
                                <Input 
                                    type="text" 
                                    v-bind="componentField" 
                                    class="border px-3 py-2 rounded-md"
                                    placeholder="Masukkan Nama Role"
                                    autocomplete="off"
                                    required
                                />
                            </FormControl>
                            <FormMessage />
                        </FormItem>
                    </FormField>
                </form>

                <DialogFooter>
                    <Button
                        type="submit"
                        buttonType="save" 
                        form="roleForm"
                    >
                        Simpan
                    </Button>
                </DialogFooter>
            </DialogContent>
        </Dialog>
    </Form>

    <Card :class="cn('w-full', $attrs.class ?? '')">
        <CardHeader>
            <CardTitle>Role Pengguna</CardTitle>
            <CardDescription>
                <div class="w-full flex gap-1">
                    <span>Digunakan untuk mengatur hak akses pengguna terhadap fitur-fitur aplikasi.</span>
                    <Button
                        type="button"
                        buttonType="add" 
                        href="/setting/role/create" 
                        @click="() => { 
                            isDialogOpen = true; 
                        }"
                    />
                </div>
            </CardDescription>
        </CardHeader>
        <CardContent class="grid gap-4">
            <TabulatorTable 
                :usingFilter="false" 
                :loading="role.loading"
                :data="role.data" 
                :columns="columns" 
                id="setting-role" 
                tabulator-class="!h-[400px]"
                :options="{}"
            />
        </CardContent>
    </Card>
</template>
