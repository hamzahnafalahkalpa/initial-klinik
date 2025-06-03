<script setup lang="ts">
import { ViewRoom } from '@klinik/interfaces/Setting/Room';
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
const rooms = ref<ViewRoom[]>([]);
const isDialogOpen = ref(false);

// Ambil data rooms saat mount
onMounted(async () => {
    const response = await apiClient.room.index();
    if (response.data) {
        rooms.value = response.data;
        rooms.value = rooms.value.map(room => {
            return {
                ...room,
                actions: [
                    {
                        href: `/setting/room/${room.id}/edit`,
                        button: {
                            buttonType: 'edit'
                        }
                    },
                    {
                        href: `/setting/room/${room.id}`,
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
    { title: 'Nama', field: 'name', sorter: 'string', headerFilter: 'input', headerFilterPlaceholder: 'Cari nama ruangan' },
    { title: 'Gedung', field: 'building.name', sorter: 'string', headerFilter: 'input', headerFilterPlaceholder: 'Cari nama gedung' },
];
</script>

<template>
    <Card :class="cn('w-full', $attrs.class ?? '')">
        <CardHeader>
            <CardTitle>Master Ruangan</CardTitle>
            <CardDescription>
                Master data ruangan digunakan untuk penempatan pegawai dan stok. Dengan demikian, Anda dapat dengan mudah mengatur ruangan dan mengelola stok Anda dengan lebih baik.
            </CardDescription>
        </CardHeader>
        <CardContent class="grid gap-4">
            <TabulatorTable 
                :usingFilter="false" 
                :data="rooms" 
                :columns="columns" 
                id="setting-room" 
                tabulator-class="!h-[400px]"
                :options="{
                }"
            />
        </CardContent>
    </Card>
</template>
