import { Organization, ViewOrganization } from "./Organization";

export interface ViewCompany extends ViewOrganization{
}

export interface ShowCompany extends ViewCompany{
    phone_owner   : string | null,
    address       : string | null,
    name_owner    : string | null,
}

export interface Company extends Organization{
}