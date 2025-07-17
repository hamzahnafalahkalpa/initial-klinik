export interface ViewMenu{
    id : number;
    name : string;
    alias ?: string | null;
    directory ?: string | null;
    method ?: string | null;
    slug ?: string | null;
    access ?: boolean | null;
    icon ?: string | null;
    childs : ViewMenu[];
}

export interface ViewPermission{
    id ?: number;
    parent_id ?: number | null;
    name : string;
    alias ?: string | null;
    access ?: boolean | null;
    directory ?: string | null;
    method ?: string | null;
    slug ?: string | null;
    permissions ?: ViewPermission[];
}

export interface ShowPermission extends ViewPermission{
    permissions ?: ShowPermission[]; 
}

export interface Permission extends ShowPermission{}