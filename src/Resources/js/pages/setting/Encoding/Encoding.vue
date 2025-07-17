<script setup lang="ts">
import { Form } from '@klinik/components/ui/form';
import { ViewEncoding } from '@klinik/interfaces/Setting/Encoding';
import { onMounted, ref } from 'vue';
import { toTypedSchema } from '@vee-validate/zod';
import { EncodingSchema } from '@klinik/dtos/Setting/EncodingSchema';
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
const encoding = ref<{
  data: ViewEncoding[];
  loading: boolean;
}>({
  data: [],
  loading: true,
});
const isDialogOpen = ref(false);

// Ambil data encodings saat mount
onMounted(async () => {
    encoding.value.loading = true;
    const response = await apiClient.encoding.index();
    if (response.data) {
        encoding.value.data = response.data;
        encoding.value.data = encoding.value.data.map(encoding => {
            return {
                ...encoding,
                actions: [
                    {
                        label: 'Set Code',
                        href: `/setting/encoding/${encoding.id}/edit`,
                        button: {
                            buttonType: 'edit'
                        }
                    }
                ]
            }
        });
        encoding.value.loading = false;
    }
});

// Table columns
const columns = [
    { title: '', field: 'actions', headerSort:false },
    { title: 'Nama', field: 'name', sorter: 'string', headerFilter: 'input', headerFilterPlaceholder: 'Cari berdasarkan nama' },
    { title: 'Kode', field: 'value', sorter: 'string', headerFilter: 'input', headerFilterPlaceholder: 'Cari berdasarkan kode' },
];
</script>

<template>
    <Card :class="cn('w-full', $attrs.class ?? '')">
        <CardHeader>
            <CardTitle>Pengodean Aplikasi</CardTitle>
            <CardDescription>
                Digunakan untuk mendefinisikan struktur pengkodean. Struktur pengkodean 
                Struktur pengkodean dapat digunakan untuk menghasilkan kode yang unik dan sesuai 
                dengan kebutuhan.
            </CardDescription>
        </CardHeader>
        <CardContent class="grid gap-4">
            <TabulatorTable 
                :loading="encoding.loading" 
                :usingFilter="false" 
                :data="encoding.data" 
                :columns="columns" 
                id="setting-encoding" 
                tabulator-class="!h-[400px]"
                :options="{
                }"
            />
        </CardContent>
    </Card>
</template>
