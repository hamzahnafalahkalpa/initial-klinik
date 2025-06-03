<script setup lang="ts">
import { Label } from '@klinik/components/ui/label'
import { cn } from '@klinik/lib/utils'

interface Props {
    label ?: string;    
    id ?: string;
    type ?: string;
    class ?: string
}

const props = withDefaults(defineProps<Props>(), {
    label : 'Label',
    type : 'text'
})
</script>

<template>
    <div :class="cn('w-full gap-1 xl:flex grid font-bold', props.class)">
        <Label class="my-auto" :for="id">{{label}}:</Label>
        <slot/>
    </div>
</template>