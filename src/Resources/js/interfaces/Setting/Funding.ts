export interface ViewFunding{
    id ?: number | null;
    name : string;
    created_at ?: string;
    updated_at ?: string;
}

export interface ShowFunding extends ViewFunding{
}

export interface Funding{
    id ?: number | null;
    name : string;
}