export interface ViewSupplier{
    id : number;
    name : string;
    phone: string;
    address: string;
    created_at ?: string;
    updated_at ?: string;
}

export interface ShowSupplier extends ViewSupplier{
}

export interface SupplierList {
    id ?: number | null;
    name : string;
}

export interface Supplier extends SupplierList {
    phone?: string | null;
    address?: string | null;
}