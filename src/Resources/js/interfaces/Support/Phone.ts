export interface ViewPhone{
    id ?: string;
    phone : string;
    created_at ?: string;
    updated_at ?: string;
}

export interface ShowPhone extends ViewPhone{}

export interface Phone extends ShowPhone{}