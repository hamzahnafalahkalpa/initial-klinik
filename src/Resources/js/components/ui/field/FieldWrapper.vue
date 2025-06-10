<script setup lang="ts">
import { 
  Input, FormField, FormItem, FormLabel, FormControl, FormMessage
} from '@klinik/components/ui';

interface Props{
    name: string;
    title?: string;
    formItemClass?: string | null;
}

const props = defineProps<Props>();
</script>

<template>
    <FormField :name="props.name" v-slot="{ componentField }">
      <FormItem :class="props?.formItemClass">
        <FormLabel v-if="props.title" :required="true">{{ props.title }}</FormLabel>
        <FormControl>
            <slot :componentField="componentField"/>
        </FormControl>
        <FormMessage />
      </FormItem>
    </FormField>
</template>
