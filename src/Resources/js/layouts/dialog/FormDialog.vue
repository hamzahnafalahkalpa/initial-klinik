<script setup lang="ts">
import {
  Dialog, DialogContent, DialogTitle, DialogDescription, DialogFooter,
} from '@klinik/components/ui'
import { Form } from '@klinik/components/ui/form'
import type { FormContext } from 'vee-validate';
import Button from '@klinik/components/ui/button/Button.vue'
import { ref } from 'vue'

interface FormDialogProps {
  modelValue: boolean;
  dialogTitle?: string;
  dialogDescription?: string;
  routeName: string;
  formSchema?: object;
}

const props = defineProps<FormDialogProps>()

const emit = defineEmits(['update:modelValue', 'submit'])

// simpan refs untuk setValues dan resetForm
const setValuesFn = ref<FormContext<any>['setValues'] | null>(null);
const resetFormFn = ref<FormContext<any>['resetForm'] | null>(null);

function closeDialog() {
  emit('update:modelValue', false)
}

function onSubmit(data: any) {
  emit('submit', data)
  // kalau mau auto close
  closeDialog()
}
</script>

<template>
  <Form
    as=""
    v-slot="{ handleSubmit, setValues, resetForm }"
    :validation-schema="props.formSchema"
    :keep-values="false"
    class="flex flex-col gap-2"
  >
    <!-- simpan setValues dan resetForm ke ref sekali saja -->
    <template v-if="!setValuesFn && !resetFormFn">
      <div v-if="(setValuesFn = setValues) && (resetFormFn = resetForm)"></div>
    </template>

    <Dialog v-model:open="props.modelValue">
      <DialogContent class="2xl:max-w-[800px] max-h-[90dvh]">
        <template #dialog-title>
          <DialogTitle>{{ props.dialogTitle }}</DialogTitle>
          <DialogDescription class="overflow-auto">
            <p class="text-sm font-light text-gray-500">{{ props.dialogDescription }}</p>
          </DialogDescription>
        </template>

        <form :id="props.routeName + 'dataForm'" @submit.prevent="handleSubmit(onSubmit)">
            <slot :setValues="setValuesFn" :resetForm="resetFormFn" />
        </form>

        <DialogFooter>
          <Button type="submit" :form="props.routeName + 'dataForm'" buttonType="save">
            Simpan
          </Button>
        </DialogFooter>
      </DialogContent>
    </Dialog>
  </Form>
</template>
