<script setup lang="ts">
import { ref, onMounted, watch } from 'vue';
import { toTypedSchema } from '@vee-validate/zod';

import {
  Button,
  Card, CardContent, CardDescription, CardHeader, CardTitle,
  Dialog, DialogContent, DialogTitle, DialogDescription, DialogFooter,
  Form
} from '@klinik/components/ui';

import type { FormContext } from 'vee-validate';

import TabulatorTable from '@klinik/components/TabulatorTable.vue';
import { cn, generateId } from '@klinik/lib/utils';
import type { Action } from '@klinik/interfaces/UI/Action';
import { useFormActionsPopup } from '@klinik/composables/useFormActionsPopup';

interface Props {
  dialogTitle: string;
  dialogDescription: string;
  routeName: string;
  columns: any[];
  viewResponse?: any;
  schema: any;
  mainContent: string;
  actions: Action[];
}

const props = withDefaults(defineProps<Props>(), {
  mainContent: 'Master data',
});

// const data = ref<{ data: any[]; loading: boolean }>({ data: [], loading: false });
const editData = ref<any | null>(null);
const isDialogOpen = ref(false);
const formSchema = toTypedSchema(props.schema);
const tabulator = ref<any | null>(null);

const setValuesFn = ref<FormContext<any>['setValues'] | null>(null);
const resetFormFn = ref<FormContext<any>['resetForm'] | null>(null);

const { loadData, onSubmit, data, editFn, deleteFn } = useFormActionsPopup({
  routeName: props.routeName,
  mainContent: props.mainContent,
  actions: props.actions,
  // data: data,
  editData: editData,
  isDialogOpen: isDialogOpen,
  resetFormFn: resetFormFn,
  setValuesFn: setValuesFn,
});

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

onMounted(() => {
  loadData();
});

function onSubmitForm(values: any) {
  onSubmit(values,{
      onSuccess: (savedItem: any) => {
          setTimeout(() => scrollToRowById(savedItem.id), 100);
      }
  });
}
const formRef = ref<FormContext<any> | null>(null);

watch(isDialogOpen, (isOpen) => {
  if (!isOpen) {
    editData.value = null;
    resetFormFn.value?.();
  }
});

watch(
  () => data.value.loading,
  (isLoading) => {
    console.log('Loading changed:', isLoading);
  },
);


function addFn() {
  editData.value = null;
  isDialogOpen.value = true;
  formRef.value?.resetForm();
}

</script>

<template>
<Form
    ref="formRef"
    as=""
    v-slot="{ handleSubmit, setValues, resetForm, errorBag }"
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

        <form :id="props.routeName + 'dataForm'" class="grid gap-2" @submit.prevent="handleSubmit(onSubmitForm)">
            <slot :editData="editData" :setValues="setValuesFn" :resetForm="resetFormFn"/>
        </form>

        <DialogFooter>
          <Button
            type="submit"
            :form="props.routeName + 'dataForm'"
            buttonType="save"
            :disabled="data.loading"
          >
            {{data.loading ? 'Mohon tunggu...' : 'Simpan'}}
          </Button>
        </DialogFooter>
      </DialogContent>
    </Dialog>
  </Form>

  <Card :class="cn('w-full', $attrs.class ?? '')">
    <CardHeader>
      <CardTitle>{{ props.dialogTitle }}</CardTitle>
      <CardDescription>
        <div class="w-full flex gap-1">
          <span>{{ props.dialogDescription }}</span>
          <Button type="button" class="ml-auto" buttonType="add" @click="addFn" />
        </div>
      </CardDescription>
    </CardHeader>

    <CardContent class="grid gap-4">
      <TabulatorTable hydrate-on-visible
        :usingFilter="false"
        :loading="data.loading"
        :data="data.data"
        :columns="props.columns"
        :id="'setting-' + props.routeName"
        tabulator-class="!h-[400px]"
        :options="{
            rowHeader:false
        }"
      />
    </CardContent>
  </Card>
</template>
