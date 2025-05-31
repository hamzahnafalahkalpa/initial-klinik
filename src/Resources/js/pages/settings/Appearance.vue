<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import AppearanceTabs from '@klinik/components/AppearanceTabs.vue';
import HeadingSmall from '@klinik/components/HeadingSmall.vue';
import { type BreadcrumbItem } from '@klinik/types';

import AppLayout from '@klinik/layouts/AppLayout.vue';
import SettingsLayout from '@klinik/layouts/settings/Layout.vue';

const breadcrumbItems: BreadcrumbItem[] = [
    {
        title: 'Appearance settings',
        href: '/settings/appearance',
    },
];
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbItems">
        <Head title="Appearance settings" />

        <SettingsLayout>
            <div class="space-y-6">
                <HeadingSmall title="Appearance settings" description="Update your account's appearance settings" />
                <AppearanceTabs />
            </div>
        </SettingsLayout>
    </AppLayout>
</template>
