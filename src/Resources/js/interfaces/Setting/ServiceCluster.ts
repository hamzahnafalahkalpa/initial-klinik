export interface ViewServiceCluster{
    id : string;
    parent_id : string | null;
    name : string;
    flag: string;
    label: string;
    created_at ?: string;
    updated_at ?: string;
}

export interface ShowServiceCluster extends ViewServiceCluster{
}

export interface ServiceClusterList {
    id ?: string | null;
    name : string;
    label : string;
}

export interface ServiceCluster {
    id ?: string | null;
    parent_id ?: string | null;
    name : string;
    label : string;
}