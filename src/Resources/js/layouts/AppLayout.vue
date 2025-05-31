<script setup lang="ts">
import { Action } from '../interfaces/UI/Action';
import AppLayout from './app/AppSidebarLayout.vue';
import type { BreadcrumbItemType } from '@klinik/types';


interface Props {
    breadcrumbs?: BreadcrumbItemType[];
    title ?: string;
    subtitle ?: string;
    icon ?: string;
    actions ?: Action[];
}

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs" :title="title" :subtitle="subtitle" :icon="icon" :actions="actions">
        <template #add-container>
            <slot name="add-container"/>
        </template>
        <slot/>
    </AppLayout>
</template>
