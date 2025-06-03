<script setup lang="ts">
import { ViewBank } from '@klinik/interfaces/Setting/Bank';
import { onMounted, ref } from 'vue';
import { cn } from '@klinik/lib/utils'
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
import {
  Tooltip,
  TooltipContent,
  TooltipProvider,
  TooltipTrigger
} from '@/components/ui/tooltip'
import TabulatorTable from '@klinik/components/TabulatorTable.vue';  

// Table data
const bank = ref<{
  data: ViewBank[];
  loading: boolean;
}>({
  data: [],
  loading: true,
});
const isDialogOpen = ref(false);

// Ambil data bank saat mount
onMounted(async () => {
    bank.value.loading = true;
    const response = await apiClient.bank.index();
    if (response.data) {
        bank.value.data = response.data;
        bank.value.data = bank.value.data.map(bank => {
            return {
                ...bank,
                actions: [
                    {
                        href: `/setting/bank/${bank.id}/edit`,
                        button: {
                            buttonType: 'edit'
                        }
                    },
                    {
                        href: `/setting/bank/${bank.id}`,
                        button: {
                            buttonType: 'delete'
                        }
                    }
                ]
            }
        });
        bank.value.loading = false;
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
            <CardTitle>Master Rekening Bank</CardTitle>
            <CardDescription>
                Digunakan untuk mengatur rekening bank yang digunakan untuk transaksi.
            </CardDescription>
        </CardHeader>
        <CardContent class="grid gap-4">
            <TabulatorTable 
                :loading="bank.loading"
                :usingFilter="false" 
                :data="bank.data" 
                :columns="columns" 
                id="setting-bank" 
                tabulator-class="!h-[400px]"
                :options="{
                }"
            />
        </CardContent>
    </Card>
</template>
