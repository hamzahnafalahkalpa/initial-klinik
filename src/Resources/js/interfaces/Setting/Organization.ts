export interface ViewOrganization{
    id ?: number | null;
    name : string;
    flag : string | null;
    phone_company : string | null;
    email_company : string | null;
    created_at : string;
    updated_at : string;
}

export interface ShowOrganization extends ViewOrganization{
    phone_owner   : string | null,
    address       : string | null,
    name_owner    : string | null,
}

export interface Organization{
    id ?: number | null;
    name : string;
    email_company ?: string | null;
    phone_company ?: string | null;
    phone_owner   ?: string | null;
    address       ?: string | null;
    name_owner    ?: string | null;
}