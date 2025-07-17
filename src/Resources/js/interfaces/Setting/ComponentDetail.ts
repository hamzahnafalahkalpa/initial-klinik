export interface ViewComponentDetail{
    id?: string | null;
    name: string;
}

export interface ShowComponentDetail extends ViewComponentDetail{
}

export interface ComponentDetailList extends ShowComponentDetail{
}

export interface ComponentDetail extends ComponentDetailList {
}