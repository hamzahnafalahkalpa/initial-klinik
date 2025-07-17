<script setup lang="ts">
import { Action } from '../../../interfaces/UI/Action';
import Button from './Button.vue';

// Props
const props = defineProps<{
  actions: Action[];
}>();

</script>

<template>
  <div class="flex gap-2">
    <Button 
      v-for="(action, index) in actions"
      :key="index" 
      :variant="action?.button?.variant" 
      :buttonType="action?.button?.buttonType" 
      :rawIcon="action?.button?.rawIcon" 
      :disabled="action.disabled" 
      :href="action.href" 
      @click="action?.button?.onClick?.()"
      v-bind="action?.button?.attributes"
    >
        <span v-if="action.label != null" class="mb-auto mt-auto">{{ action.label }}</span>
    </Button>
  </div>
</template>