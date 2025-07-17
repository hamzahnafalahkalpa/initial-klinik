export interface ViewPriceComponent{
    id: number | null;
    price: number | null;
    tariff_component: any; 
    created_at: string;
    updated_at: string;
}

export interface ShowPriceComponent extends ViewPriceComponent{
}

export interface PriceComponentList {
    id?: number | null;
    name: string;
}

export interface PriceComponent {
    id ?: number | null;
    name : string;
}