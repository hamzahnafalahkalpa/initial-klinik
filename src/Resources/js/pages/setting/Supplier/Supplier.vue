<script setup lang="ts">
import { Form } from '@klinik/components/ui/form';
import { ViewSupplier } from '@klinik/interfaces/Setting/Supplier';
import { onMounted, ref } from 'vue';
import { toTypedSchema } from '@vee-validate/zod';
import { SupplierSchema } from '@klinik/dtos/Setting/SupplierSchema';
import { useForm } from 'vee-validate';
import { cn } from '@klinik/lib/utils'
import { Switch } from '@/components/ui/switch'
import { apiClient } from '@klinik/composables/useApi/client';
import { 
    Label, Input, 
    Card, CardContent,
    CardDescription,
    CardFooter,
    CardHeader,
    CardTitle,
    Dialog, DialogContent, 
    DialogHeader, DialogTitle, 
    DialogDescription, DialogFooter
} from '@klinik/components/ui';
import TabulatorTable from '@klinik/components/TabulatorTable.vue';  

// Table data
const suppliers = ref<ViewSupplier[]>([]);
const isDialogOpen = ref(false);

// Ambil data suppliers saat mount
onMounted(async () => {
    const response = await apiClient.supplier.index();
    if (response.data) {
        suppliers.value = response.data;
        suppliers.value = suppliers.value.map(supplier => {
            return {
                ...supplier,
                actions: [
                    {
                        href: `/setting/supplier/${supplier.id}/edit`,
                        button: {
                            buttonType: 'edit'
                        }
                    },
                    {
                        href: `/setting/supplier/${supplier.id}`,
                        button: {
                            buttonType: 'delete'
                        }
                    }
                ]
            }
        });
    }
});

// Table columns
const columns = [
    { title: '', field: 'actions', headerSort:false },
    { title: 'Nama', field: 'name', sorter: 'string', headerFilter: 'input', headerFilterPlaceholder: 'Cari berdasarkan nama' },
];
</script>

<template>
    <Card :class="cn('w-full', $attrs.class ?? '')">
        <CardHeader>
            <CardTitle>Supplier</CardTitle>
            <CardDescription>
                Digunakan dalam proses procurement. Pastikan data supplier telah diisi sebelum melakukan proses procurement.
            </CardDescription>
        </CardHeader>
        <CardContent class="grid gap-4">
            <TabulatorTable 
                :usingFilter="false" 
                :data="suppliers" 
                :columns="columns" 
                id="setting-supplier" 
                tabulator-class="!h-[400px]"
                :options="{
                }"
            />
        </CardContent>
    </Card>
</template>
