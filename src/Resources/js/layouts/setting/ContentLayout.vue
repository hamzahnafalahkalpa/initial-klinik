<script setup lang="ts">
import { ref, onMounted, watch } from 'vue';
import { apiClient } from '@klinik/composables/useApi/client';
import { toast } from 'vue-sonner';
import { toTypedSchema } from '@vee-validate/zod';
import { useAlertDialog } from '@klinik/composables/useAlertDialog'

import {
  Input,
  Card, CardContent, CardDescription, CardHeader, CardTitle,
  Dialog, DialogContent, DialogTitle, DialogDescription, DialogFooter
} from '@klinik/components/ui';

import {
  Form, FormField, FormItem, FormLabel, FormControl, FormMessage
} from '@klinik/components/ui/form';

import type { FormContext } from 'vee-validate';

import Button from '@klinik/components/ui/button/Button.vue';
import TabulatorTable from '@klinik/components/TabulatorTable.vue';
import { cn, generateId } from '@klinik/lib/utils';
import type { Action } from '@klinik/interfaces/UI/Action';

interface Props {
  dialogTitle: string;
  dialogDescription: string;
  routeName: string;
  columns: any[];
  viewResponse?: any;
  schema: any;
  mainContent?: string | null;
  actions: Action[];
}

const props = withDefaults(defineProps<Props>(), {
  mainContent: 'Master data',
});

const data = ref({ data: [] as any[], loading: true });
const isDialogOpen = ref(false);
const editData = ref<any | null>(null);
const formSchema = toTypedSchema(props.schema);
const dialog = useAlertDialog()

const setValuesFn = ref<FormContext<any>['setValues'] | null>(null);
const resetFormFn = ref<FormContext<any>['resetForm'] | null>(null);

const tabulator = ref<any | null>(null);

onMounted(loadData);

async function loadData() {
  data.value.loading = true;
  try {
    const response = await apiClient[props.routeName].index();
    const items = response.data ?? [];
    data.value.data = items.map((item: any) => {
      const itemid = generateId();
      return mapActionsForItem({ ...item, itemid, actions: JSON.parse(JSON.stringify(props.actions)) });
    });
  } catch (error) {
    console.error(error);
    toast.error('Gagal memuat data');
  } finally {
    data.value.loading = false;
  }
}

function onTableReady(instance: any) {
  tabulator.value = instance;
}

function scrollToRowById(id: number | string) {
  const row = tabulator.value?.getRow(id);
  if (row) {
    row.scrollTo('center', false);
    row.select?.();
  }
}

function mapActionsForItem(item: any) {
  item.actions = (item.actions || []).map((action: Action) => {
    if (action.button) {
      action.button.attributes = { itemid: item.itemid };
      if (action.type === 'edit') {
        action.button.onClick = () => {editFn(item)};
      } else if (action.type === 'delete') {
        action.button.onClick = () => {deleteFn(item)};
      }
    }
    return action;
  });
  return item;
}

function editFn(item: any) {
  editData.value = item;
  isDialogOpen.value = true;
  resetFormFn.value?.();
  const parsed = props.schema.safeParse(item);
  if (parsed.success) {
    setValuesFn.value?.(parsed.data);
  } else {
    console.error('Data tidak valid menurut schema:', parsed.error);
  }
}

function deleteFn(item: any) {
  dialog.confirm({
    title: 'Hapus Data?',
    description: 'Data yang dihapus tidak bisa dikembalikan.',
    confirmText: 'Ya, Hapus',
    cancelText: 'Batal',
    onConfirm: () => {
        onDelete(item)
    }
  });
}

async function onDelete(values: any) {
  toast.loading(`${props.mainContent} dalam penghapusan...`);
  try {
    const response = await apiClient[props.routeName].delete(values.id);
    if (response.data) {
        toast.success(`${props.mainContent} berhasil dihapus`);
        data.value.data = data.value.data.filter(i => i.itemid !== values.itemid);
    }else{
        toast.error(`${props.mainContent} gagal dihapus`);
    }
  } catch (error) {
    console.error(error);
    toast.error('Gagal menghapus data');
  } finally {
    setTimeout(() => toast.dismiss(), 3000);
  }
}

async function onSubmit(values: any) {
  toast.loading(`${props.mainContent} dalam penyimpanan...`);
  try {
    const response = await apiClient[props.routeName].store(values);
    let savedItem = response.data;
    if (savedItem) {
      toast.success(`${props.mainContent} berhasil disimpan`);

      let itemid = editData.value?.itemid || generateId();
      savedItem = mapActionsForItem({
        ...savedItem,
        itemid,
        actions: JSON.parse(JSON.stringify(props.actions))
      });

      const idx = data.value.data.findIndex(i => i.itemid === itemid);

      if (idx !== -1) {
        data.value.data.splice(idx, 1, savedItem);
      } else {
        data.value.data = [...data.value.data, savedItem];
      }

      isDialogOpen.value = false;
      editData.value = null;
      setTimeout(() => scrollToRowById(savedItem.id), 100);
    }
  } catch (error) {
    console.error(error);
    toast.error('Gagal menyimpan data');
  } finally {
    setTimeout(() => toast.dismiss(), 3000);
  }
}

function addFn() {
  editData.value = null;
  isDialogOpen.value = true;
}

watch(isDialogOpen, (isOpen) => {
  if (!isOpen) {
    editData.value = null;
    resetFormFn.value?.();
  }
});
</script>

<template>
  <Form
    as=""
    v-slot="{ handleSubmit, setValues, resetForm }"
    :validation-schema="formSchema"
    :keep-values="false"
    class="flex flex-col gap-2"
  >
    <!-- Simpan setValues dan resetForm ke ref sekali saja -->
    <template v-if="!setValuesFn && !resetFormFn">
      <div v-if="(setValuesFn = setValues) && (resetFormFn = resetForm)"></div>
    </template>

    <Dialog v-model:open="isDialogOpen">
      <DialogContent class="2xl:max-w-[800px] max-h-[90dvh]">
        <template #dialog-title>
          <DialogTitle>{{ props.dialogTitle }}</DialogTitle>
          <DialogDescription class="overflow-auto">
            <p class="text-sm font-light text-gray-500">{{ props.dialogDescription }}</p>
          </DialogDescription>
        </template>

        <form :id="props.routeName + 'dataForm'" @submit.prevent="handleSubmit(onSubmit)">
          <FormField name="id" v-slot="{ componentField }">
            <FormItem class="hidden">
              <FormControl>
                <Input type="text" v-bind="componentField" autocomplete="off" />
              </FormControl>
              <FormMessage />
            </FormItem>
          </FormField>

          <FormField name="name" v-slot="{ componentField }">
            <FormItem>
              <FormLabel :required="true">Nama Gedung</FormLabel>
              <FormControl>
                <Input
                  type="text"
                  placeholder="Masukkan Nama Gedung"
                  autocomplete="off"
                  v-bind="componentField"
                  required
                />
              </FormControl>
              <FormMessage />
            </FormItem>
          </FormField>
        </form>

        <DialogFooter>
          <Button type="submit" :form="props.routeName + 'dataForm'" buttonType="save">
            Simpan
          </Button>
        </DialogFooter>
      </DialogContent>
    </Dialog>
  </Form>

  <Card :class="cn('w-full', $attrs.class ?? '')">
    <CardHeader>
      <CardTitle>Master Gedung</CardTitle>
      <CardDescription>
        <div class="w-full flex gap-1">
          <span>Pelangkap informasi ketersediaan gedung di faskes</span>
          <Button type="button" class="ml-auto" buttonType="add" @click="addFn" />
        </div>
      </CardDescription>
    </CardHeader>

    <CardContent class="grid gap-4">
      <TabulatorTable
        :usingFilter="false"
        :loading="data.loading"
        :data="data.data"
        :columns="props.columns"
        :id="'setting-' + props.routeName"
        tabulator-class="!h-[400px]"
        :options="{}"
        @table-ready="onTableReady"
      />
    </CardContent>
  </Card>
</template>
