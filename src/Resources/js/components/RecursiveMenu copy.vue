<script setup lang="ts">
import { 
    SidebarMenu, SidebarMenuButton, SidebarMenuItem
} from '@klinik/components/ui/sidebar';
import { type SharedData } from '@klinik/types';
import { Link, usePage } from '@inertiajs/vue3';
import { MenuItem } from '../interfaces';

const props = defineProps<{
    item: MenuItem;
}>();

const page = usePage<SharedData>();

function isActive(item: MenuItem): boolean {
    const currentUrl = page.url;
    const targetUrl = item.slug?.replace('api/', '/') ?? '/#';
    return currentUrl === targetUrl;
}
</script>

<template>
    <SidebarMenu>
        <SidebarMenuItem
            v-if="item.childs.length > 0"
            v-for="child in item.childs"
            :key="child.id"
        >
            <RecursiveMenu :item="child" />
        </SidebarMenuItem>
        <SidebarMenuButton
            v-else
            as-child
            :is-active="isActive(item)"
            :tooltip="item.name"
        >
            <Link :href="item.slug?.replace('api/', '/') ?? '/#'">
                <span>{{ item.name }}</span>
            </Link>
        </SidebarMenuButton>
    </SidebarMenu>
</template>
