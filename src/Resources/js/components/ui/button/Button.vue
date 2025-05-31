<script setup lang="ts">
import { cn } from '@klinik/lib/utils'
import { Primitive } from 'reka-ui'
import { buttonVariants, getButtonProps } from '.'
import type { Button as ButtonInterface } from '@klinik/interfaces/UI/Button'
import { Icon } from '@iconify/vue'

// Pakai default jika tidak diisi
const props = withDefaults(defineProps<ButtonInterface>(), {
  as: 'button'
})

const merged = getButtonProps({
  type: props.type,
  variant: props.variant,
  icon: props.icon,
  rawIcon: props.rawIcon,
})
</script>

<template>
  <Primitive
    data-slot="button"
    :as="props.as"
    :as-child="props.asChild"
    :class="cn(buttonVariants({ variant: merged.variant, size: props.size }), props.class)"
  >
    <Icon v-if="merged.icon" :icon="merged.icon" />
    <slot/>
  </Primitive>
</template>
