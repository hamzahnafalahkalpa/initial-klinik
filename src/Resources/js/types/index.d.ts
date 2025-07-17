import type { PageProps } from '@inertiajs/core';
import type { LucideIcon } from 'lucide-vue-next';
import type { Config } from 'ziggy-js';
import { Tenant } from '../interfaces';

export interface Auth {
    user: User;
}

export interface BreadcrumbItem {
    title: string;
    href: string;
}

export interface NavItem {
    id : number;
    title: string;
    href: string;
    icon?: LucideIcon;
    isActive?: boolean;
    childs : NavItem[]
}

export interface SharedData extends PageProps {
    name: string;
    csrf_token ?: string;
    tenant ?: Tenant;
    quote: { message: string; author: string };
    auth: Auth;
    ziggy: Config & { location: string };
    sidebarOpen: boolean;
}

export interface User {
    id: number;
    name: string;
    email: string;
    avatar?: string;
    email_verified_at: string | null;
    created_at: string;
    updated_at: string;
}

export type BreadcrumbItemType = BreadcrumbItem;
