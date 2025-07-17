import { ViewPermission } from "./Permission";

export interface ViewRole{
    id ?: number | null;
    name : string;
    childs : ViewRole[];
    current ?: boolean;
    created_at ?: string;
    updated_at ?: string;
}

export interface ShowRole extends ViewRole{
    permissions ?: ViewPermission
}

export interface Role {
    id ?: number | null;
    name : string;
    childs ?: Role[];
}