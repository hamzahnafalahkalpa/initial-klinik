export interface ViewPatientType{
    id : string;
    parent_id : string | null;
    name : string;
    flag: string;
    label: string;
    created_at ?: string;
    updated_at ?: string;
}

export interface ShowPatientType extends ViewPatientType{
}

export interface PatientTypeList {
    id ?: string | null;
    name : string;
    label : string;
}

export interface PatientType {
    id ?: string | null;
    parent_id ?: string | null;
    name : string;
    label : string;
}