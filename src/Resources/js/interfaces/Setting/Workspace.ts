import { Address, ViewAddress } from "../Regional/Address";

export interface ViewWorkspace{
    id?: number | null;
    uuid: string;
    name: string;
    phone: string | null;
    created_at?: string;
    updated_at?: string;
}

export interface ShowWorkspace extends ViewWorkspace{
    setting?: WorkspaceSetting | null
}

interface WorkspaceSetting {
    email?: string | null;
    owner_id?: string | null;
    owner?: {
        id?: string | null;
        name?: string | null;
    } | null;
    phone?: string | null;
    timezone?: string | null;
    address?: Address | null;
    logo?: string | null;
}

export interface WorkspaceAddress{
    name: string | null;
    province_id?: number | null;
    district_id?: number | null;
    subdistrict_id?: number | null;
    village_id?: number | null;
}

export interface Workspace {
    uuid: string;
    name: string;
    setting?: WorkspaceSetting | null
}