export interface ViewBuilding{
    id?: number | null;
    name: string;
    created_at?: string;
    updated_at?: string;
}

export interface ShowBuilding extends ViewBuilding{
}

export interface BuildingList {
    id?: number | null;
    name: string;
}

export interface Building {
    id   ?: number | null;
    name : string;
}