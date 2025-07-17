<script setup lang="ts">
import type { HTMLAttributes } from 'vue'
import { reactiveOmit } from '@vueuse/core'
import { AccordionItem, type AccordionItemProps, useForwardProps } from 'reka-ui'
import { cn } from '@/lib/utils'

const props = defineProps<AccordionItemProps & { class?: HTMLAttributes['class'] }>()

const delegatedProps = reactiveOmit(props, 'class')

const forwardedProps = useForwardProps(delegatedProps)
</script>

<template>
  <AccordionItem
    data-slot="accordion-item"
    v-bind="forwardedProps"
    :class="cn(
      'text-xl border-y-none shadow border-l-5 px-2 py-0 data-[state=open]:border-primary/80 data-[state=closed]:border-primary/30', 
      props.class
    )"
  >
    <slot />
  </AccordionItem>
</template>
