<script setup lang="ts">
import { Action } from '../interfaces/UI/Action';
import AppLayout from './app/AppSidebarLayout.vue';
import type { BreadcrumbItemType } from '@klinik/types';
import { Toaster } from '@klinik/components/ui/sonner';
import 'vue-sonner/style.css';
import { AlertDialog } from './alert-dialog';

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
    <Toaster class="pointer-events-auto" />
    <AppLayout :breadcrumbs="breadcrumbs" :title="title" :subtitle="subtitle" :icon="icon" :actions="actions">
        <template #add-container>
            <slot name="add-container"/>
        </template>
        <AlertDialog/>
        <slot/>
    </AppLayout>
</template>
