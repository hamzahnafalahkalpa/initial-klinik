<script setup lang="ts">
import { ViewBuilding } from '@klinik/interfaces/Setting/Building';
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
import { ClassRoomSchema } from '../../../dtos/Setting/ClassRoomSchema';
import { 
    Form,
    FormField,
    FormItem,
    FormLabel,
    FormControl,
    FormMessage
} from '@klinik/components/ui/form';
import Button from '@klinik/components/ui/button/Button.vue';

const classRoom = ref<{
  data: ViewBuilding[];
  loading: boolean;
}>({
  data: [],
  loading: true,
});

const isDialogOpen = ref(false);

onMounted(async () => {
    classRoom.value.loading = true;
    const response = await apiClient.classRoom.index();
    if (response.data) {
        classRoom.value.data = response.data.map((classRoom: ViewBuilding) => ({
            ...classRoom,
            actions: [
                {
                    href: `/setting/class-room/${classRoom.id}/edit`,
                    button: { buttonType: 'edit' }
                },
                {
                    href: `/setting/class-room/${classRoom.id}`,
                    button: { buttonType: 'delete' }
                }
            ]
        }));
    }
    classRoom.value.loading = false;
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
    {title : 'Layanan',field: 'service.name',sorter: 'string',headerFilter: 'input',headerFilterPlaceholder: 'Cari berdasarkan layanan'},
    {title : 'Kapasitas Kasur', field: 'capacity', sorter: 'number'},
    {title : 'Dibuat pada', field: 'created_at', sorter: 'string'}
];

const formSchema = toTypedSchema(ClassRoomSchema);

async function onSubmit(values: any) {
    toast.loading('Master kelas ruangan dalam penyimpanan...');
    try {
        const response = await apiClient.classRoom.store(values);
        if (response.data) {
            toast.success('Master kelas ruangan berhasil disimpan');
            classRoom.value.data.unshift({
                ...response.data,
                actions: [
                    {
                        href: `/setting/class-room/${response.data.id}`,
                        button: { buttonType: 'edit' }
                    },
                    {
                        href: `/setting/class-room/${response.data.id}`,
                        button: { buttonType: 'delete' }
                    }
                ]
            });
            isDialogOpen.value = false;
        }
    } catch (error) {
        toast.error('Gagal menyimpan data kelas ruangan');
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
                    <DialogTitle>Formulir Master Kelas Ruangan</DialogTitle>
                    <DialogDescription class="overflow-auto">
                        <p class="text-sm font-light text-gray-500">
                            Data kelas ruangan menjadi sifat bagi data ruangan terutama digunakan pada rawat inap dan VK.
                        </p>
                    </DialogDescription>
                </template>

                <form id="classRoomForm" @submit="handleSubmit($event, onSubmit)">
                    <FormField v-slot="{ componentField }" name="name">
                        <FormItem>
                            <FormLabel :required="true">Nama Kelas</FormLabel>
                            <FormControl>
                                <Input 
                                    type="text" 
                                    v-bind="componentField" 
                                    class="border px-3 py-2 rounded-md"
                                    placeholder="Masukkan Nama Kelas"
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
                        form="classRoomForm"
                    >
                        Simpan
                    </Button>
                </DialogFooter>
            </DialogContent>
        </Dialog>
    </Form> 

    <Card :class="cn('w-full', $attrs.class ?? '')">
        <CardHeader>
            <CardTitle>Master Kelas Ruangan</CardTitle>
            <CardDescription>
                <div class="w-full flex gap-1">
                    <span>Digunakan di rawat inap dan VK, dan memiliki kapasitas tempat tidur dan harga sewa per malam</span>
                    <Button
                        type="button"
                        buttonType="add" 
                        href="/setting/class-room/create" 
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
                :loading="classRoom.loading"
                :data="classRoom.data" 
                :columns="columns" 
                id="setting-class-room" 
                tabulator-class="!h-[400px]"
                :options="{}"
            />
        </CardContent>
    </Card>
</template>
