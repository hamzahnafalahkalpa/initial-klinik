<script setup lang="ts">
import { ref } from 'vue';
import { 
    SidebarGroup, SidebarGroupLabel, SidebarMenu, SidebarMenuButton, SidebarMenuItem
} from '@klinik/components/ui/sidebar';
import { type NavItem, type SharedData } from '@klinik/types';
import { Link, usePage } from '@inertiajs/vue3';
import { MenuItem } from '../interfaces';

defineProps<{
    items: MenuItem[];
}>();

const page = usePage<SharedData>();

</script>

<template>
    <SidebarGroup class="px-2 py-0">
        <SidebarGroupLabel>Platform</SidebarGroupLabel>
        <SidebarMenu>
            <SidebarMenuItem v-for="item in items" :key="item.title">
                <SidebarMenuButton as-child :is-active="item.href === page.url" :tooltip="item.title">
                    <Link :href="item.href">
                        <component :is="item.icon" />
                        <span>{{ item.title }}</span>
                    </Link>
                </SidebarMenuButton>
            </SidebarMenuItem>
        </SidebarMenu>
    </SidebarGroup>
</template>
