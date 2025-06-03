export interface ViewSupplier{
    id ?: number;
    name : string;
    created_at ?: string;
    updated_at ?: string;
}

export interface ShowSupplier extends ViewSupplier{
}

export interface Supplier extends ShowSupplier{}