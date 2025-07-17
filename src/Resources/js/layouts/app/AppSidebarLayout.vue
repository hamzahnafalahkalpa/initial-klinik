<script setup lang="ts">
import AppContent from '@klinik/components/AppContent.vue';
import AppShell from '@klinik/components/AppShell.vue';
import AppSidebar from '@klinik/components/AppSidebar.vue';
import AppSidebarHeader from '@klinik/components/AppSidebarHeader.vue';
import type { BreadcrumbItemType } from '@klinik/types';
import { Icon } from '@iconify/vue';
import { cn } from '@klinik/lib/utils';
import { ref } from 'vue';
import { Button } from '@klinik/components/ui/button';
import { Action } from '../../interfaces/UI/Action';

interface Props {
    breadcrumbs?: BreadcrumbItemType[];
    title?: string;
    subtitle?: string;
    icon?: string;
    actions?: Action[];
}

const props = withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
    icon: "oi:list-rich",
    actions: () => [],
});

const defaultActions = ref<Action[]>([]);

defaultActions.value = (props.actions || []).map((action) => ({
    ...action,
    button: { 
        ...action.button, 
        variant: action.button?.variant || 'default' 
    },
}));

</script>

<template>
    <AppShell variant="sidebar">
        <AppSidebar />
        <AppContent variant="sidebar">
            <AppSidebarHeader :breadcrumbs="breadcrumbs" />
                <div :class="cn(
                    'app-content-container h-full'
                )">
                    <div class="w-full flex gap-2 mb-2">
                        <div v-if="title" class="font-bold text-xl flex gap-2">
                            <Icon class="mb-auto mt-auto" :icon="icon" :ssr="true" />
                            <span class="mb-auto mt-auto">{{ title }}</span>
                        </div>                        
                        <template v-if="actions.length > 0">
                            <div class="mr-auto flex gap-2">
                                <Button v-for="(action, index) in defaultActions" 
                                    :key="index" 
                                    :variant="action?.button?.variant" 
                                    :type="action?.button?.type" 
                                    :rawIcon="action?.button?.rawIcon" 
                                    :disabled="action.disabled" 
                                    :href="action.href" 
                                    @click="action.onClick ? action.onClick() : null"
                                >
                                    <span v-if="action.label !== ''" class="mb-auto mt-auto">{{ action.label }}</span>
                                </Button>
                            </div>
                        </template>
                        <template v-else-if="$slots['add-container'] !== undefined">
                            <slot name="add-container"/>
                        </template>
                    </div>
                    <slot />
                </div>
        </AppContent>
    </AppShell>
</template>
