<script setup lang="ts">
import AppContent from '@klinik/components/AppContent.vue';
import AppHeader from '@klinik/components/AppHeader.vue';
import AppShell from '@klinik/components/AppShell.vue';
import type { BreadcrumbItemType } from '@klinik/types';

interface Props {
    breadcrumbs?: BreadcrumbItemType[];
}

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});
</script>

<template>
    <AppShell class="flex-col">
        <AppHeader :breadcrumbs="breadcrumbs" />
        <AppContent>
            <slot />
        </AppContent>
    </AppShell>
</template>
