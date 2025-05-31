import { ViewPermission } from "./Permission";

export interface ViewRole{
    id ?: string;
    name : string,
    childs : ViewRole[],
    current ?: boolean
}

export interface ShowRole extends ViewRole{
    permissions ?: ViewPermission
}

export interface Role extends ShowRole{}