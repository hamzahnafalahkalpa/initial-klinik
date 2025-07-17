<script setup lang="ts">
import { type SharedData } from '@klinik/types';
import { usePage } from '@inertiajs/vue3';
import { MenuItem } from '../interfaces';
import RecursiveMenu from './RecursiveMenu.vue';
import { 
    SidebarGroup, SidebarGroupLabel
} from '@klinik/components/ui/sidebar';
import { Icon } from '@iconify/vue';

const props = defineProps<{
    items: MenuItem[];
}>();
const page = usePage<SharedData>();
</script>

<template>
    <SidebarGroup v-for="item in items" class="px-2 py-0">
        <!-- <SidebarGroupLabel>
            <Icon :icon="item.icon as string" :ssr="true" />
            <span>{{ item.name }}</span>
        </SidebarGroupLabel> -->
        <RecursiveMenu :key="item.id" :item="item" />    
    </SidebarGroup>
</template>
