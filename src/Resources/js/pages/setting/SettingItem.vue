<script setup lang="ts">
import { AccordionContent, AccordionItem, AccordionTrigger } from '@klinik/components/ui/accordion';

const props = defineProps<{
    title   : string;
    subtitle: string;
    value: string;
}>();

</script>

<template>
    <AccordionItem :value="props.value">
        <AccordionTrigger>
            <div class="grid gap-2">
                <h1 class="font-bold text-[15px]">{{ props.title }}</h1>
                <h2 class="text-primary/80">{{props.subtitle}}</h2>
            </div>
        </AccordionTrigger>
        <AccordionContent>
            <slot/>
        </AccordionContent>
    </AccordionItem>
</template>
