<script setup lang="ts">
import { ref, onMounted } from 'vue';
import NavFooter from '@klinik/components/NavFooter.vue';
import NavMain from '@klinik/components/NavMain.vue';
import NavUser from '@klinik/components/NavUser.vue';
import { Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@klinik/components/ui/sidebar';
import { type NavItem } from '@klinik/types';
import { Link } from '@inertiajs/vue3';
import AppLogo from './AppLogo.vue';
import { useMenuStore } from '@klinik/stores/useMenu';

// const mainNavItems = ref<NavItem[]>([]); // awalnya kosong
const menuStore = useMenuStore();
const footerNavItems: NavItem[] = [
];

onMounted(async () => {
    menuStore.refresh()
    menuStore.load()
});
</script>

<template>
    <!-- <Sidebar collapsible="icon" variant="floating"> -->
    <Sidebar collapsible="offcanvas" variant="floating">
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton size="lg" as-child>
                        <Link :href="route('dashboard')">
                            <AppLogo />
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent>
            <NavMain :items="menuStore.items" />
        </SidebarContent>

        <SidebarFooter>
            <NavFooter :items="footerNavItems" />
            <NavUser />
        </SidebarFooter>
    </Sidebar>
    <slot />
</template>
