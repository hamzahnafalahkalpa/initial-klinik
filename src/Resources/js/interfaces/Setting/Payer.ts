import { Organization, ViewOrganization } from "./Organization";

export interface ViewPayer extends ViewOrganization{
}

export interface ShowPayer extends ViewPayer{
    phone_owner   : string | null,
    address       : string | null,
    name_owner    : string | null,
}

export interface Payer extends Organization{
}