import { ViewComponentDetail } from "./ComponentDetail";

export interface ViewTariffComponent{
    id?: string | null;
    name: string;
    component_details: ViewComponentDetail[];
    created_at?: string;
    updated_at?: string;
}

export interface ShowTariffComponent extends ViewTariffComponent{
}

export interface TariffComponentList {
    id ?: string | null;
    name : string;
}

export interface TariffComponent {
    id ?: string | null;
    name : string;
}