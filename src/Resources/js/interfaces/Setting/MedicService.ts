export interface ViewMedicService{
    id : string;
    parent_id : string | null;
    name : string;
    flag: string;
    label: string;
    created_at ?: string;
    updated_at ?: string;
}

export interface ShowMedicService extends ViewMedicService{
}

export interface MedicServiceList {
    id ?: string | null;
    name : string;
    label : string;
}

export interface MedicService {
    id ?: string | null;
    parent_id ?: string | null;
    name : string;
    label : string;
}