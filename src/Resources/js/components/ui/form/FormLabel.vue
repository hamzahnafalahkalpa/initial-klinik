<script lang="ts" setup>
import type { LabelProps } from 'reka-ui'
import type { HTMLAttributes } from 'vue'
import { cn } from '@klinik/lib/utils'
import { Label } from '@klinik/components/ui/label'
import { useFormField } from './useFormField'

const props = defineProps<LabelProps & { 
  class?: HTMLAttributes['class'],
  required?: boolean
}>()

const { error, formItemId } = useFormField()
</script>

<template>
  <Label
    data-slot="form-label"
    :data-error="!!error"
    :class="cn(
      'data-[error=true]:text-destructive',
      props.class,
    )"
    :for="formItemId"
    :required="props.required"
  >
    <slot />
  </Label>
</template>
