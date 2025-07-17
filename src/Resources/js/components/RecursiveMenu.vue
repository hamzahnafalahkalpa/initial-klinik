<script setup lang="ts">
import {
  SidebarMenuButton,
  SidebarMenuItem,
  SidebarMenuSub,
  SidebarMenuSubItem,
} from '@klinik/components/ui/sidebar';
import {
  Collapsible,
  CollapsibleTrigger,
  CollapsibleContent,
} from '@klinik/components/ui/collapsible';
import { type SharedData } from '@klinik/types';
import { Link, usePage } from '@inertiajs/vue3';
import { MenuItem } from '../interfaces';
import { Icon } from '@iconify/vue';

// Props
const props = defineProps<{
  item: MenuItem;
}>();

const page = usePage<SharedData>();

function isActive(item: MenuItem): boolean {
  const currentUrl = page.url;
  const targetUrl = item.slug?.replace('api/', '/') ?? '/#';
  return currentUrl === targetUrl;
}

function hasActiveChild(item: MenuItem): boolean {
  if (!item.childs || item.childs.length === 0) return false;

  for (const child of item.childs) {
    const childUrl = child.slug?.replace('api/', '/') ?? '/#';
    if (page.url === childUrl || hasActiveChild(child)) {
      return true;
    }
  }

  return false;
}

</script>

<template>
  <Collapsible v-if="item.childs.length > 0" :defaultOpen="hasActiveChild(item)" class="group/collapsible">
    <SidebarMenuItem>
      <CollapsibleTrigger asChild>
        <SidebarMenuButton class="cursor-pointer" :tooltip="item.name">
            <Icon :icon="item.icon as string" :ssr="true" />
            <span>{{ item.name }}</span>
            <Icon icon="heroicons-solid:chevron-right" class="ml-auto transition-transform group-data-[state=open]/collapsible:rotate-90" :ssr="true" />
        </SidebarMenuButton>
      </CollapsibleTrigger>

      <CollapsibleContent>
        <SidebarMenuSub>
          <SidebarMenuSubItem
            v-for="child in item.childs"
            :key="child.id"
          >
            <!-- Recursive call -->
            <RecursiveMenu :item="child" />
          </SidebarMenuSubItem>
        </SidebarMenuSub>
      </CollapsibleContent>
    </SidebarMenuItem>
  </Collapsible>

  <SidebarMenuButton
    v-else
    as-child
    :is-active="isActive(item)"
    :tooltip="item.name"
  >
    <Link :href="item.slug?.replace('api/', '/') ?? '/#'">
        <Icon :icon="item.icon as string" :ssr="true" />
        <span>{{ item.name }}</span>
    </Link>
  </SidebarMenuButton>
</template>
