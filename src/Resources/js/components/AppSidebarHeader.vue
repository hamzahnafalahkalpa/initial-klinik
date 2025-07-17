<script setup lang="ts">
import Breadcrumbs from '@klinik/components/Breadcrumbs.vue';
import { SidebarTrigger } from '@klinik/components/ui/sidebar';
import type { BreadcrumbItemType } from '@klinik/types';

withDefaults(defineProps<{
    breadcrumbs?: BreadcrumbItemType[];
}>(),{
    breadcrumbs:()=>[]
});
</script>

<template>
        <!-- class="flex h-16 shrink-0 items-center gap-2 border-b border-sidebar-border/20 px-6 transition-[width,height] ease-linear group-has-data-[collapsible=icon]/sidebar-wrapper:h-12 md:px-4" -->
    <header
        class="flex h-16 shrink-0 items-center gap-2 px-6 transition-[width,height] ease-linear group-has-data-[collapsible=icon]/sidebar-wrapper:h-12 md:px-4"
    >
        <div class="template-header flex items-center gap-2">
            <SidebarTrigger class="-ml-1" />
            <template v-if="breadcrumbs && breadcrumbs.length > 0">
                <Breadcrumbs :breadcrumbs="breadcrumbs" />
            </template>
        </div>
    </header>
</template>
