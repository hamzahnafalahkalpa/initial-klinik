import { Workspace } from "../Workspace/Workspace";

export interface ViewTenant{
    id: number;
    parent_id ?: number;
    name: string;
    uuid: string;
    reference_id ?: string|number;
    reference_type ?: string;
    flag: string;
    domain_id ?: number;
    created_at: string;
    updated_at: string;
}

export interface ShowTenant extends ViewTenant{
    reference ?: Workspace
}

export interface Tenant extends ShowTenant{

}