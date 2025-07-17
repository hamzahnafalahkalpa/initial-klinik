export interface ViewBank{
    id?: number | null;
    name: string;
    account_number?: string | null;
    account_name?: string | null;
    status?: string;
    created_at?: string;
    updated_at?: string;
}
export interface ShowBank extends ViewBank{
}

export interface Bank extends ShowBank{}