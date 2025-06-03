<script setup lang="ts">
import { ViewFunding } from '@klinik/interfaces/Setting/Funding';
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
const fundings = ref<ViewFunding[]>([]);
const isDialogOpen = ref(false);

// Ambil data fundings saat mount
onMounted(async () => {
    const response = await apiClient.funding.index();
    if (response.data) {
        fundings.value = response.data;
        fundings.value = fundings.value.map(funding => {
            return {
                ...funding,
                actions: [
                    {
                        href: `/setting/funding/${funding.id}/edit`,
                        button: {
                            buttonType: 'edit'
                        }
                    },
                    {
                        href: `/setting/funding/${funding.id}`,
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
            <CardTitle>Pendanaan</CardTitle>
            <CardDescription>
                Digunakan untuk procurement. Pastikan data pendanaan telah diisi sebelum melakukan proses procurement.
            </CardDescription>
        </CardHeader>
        <CardContent class="grid gap-4">
            <TabulatorTable 
                :usingFilter="false" 
                :data="fundings" 
                :columns="columns" 
                id="setting-funding" 
                tabulator-class="!h-[400px]"
                :options="{
                }"
            />
        </CardContent>
    </Card>
</template>
