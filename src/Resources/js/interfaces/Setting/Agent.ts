import { Organization, ViewOrganization } from "./Organization";

export interface ViewAgent extends ViewOrganization{
}

export interface ShowAgent extends ViewAgent{
    phone_owner   : string | null,
    address       : string | null,
    name_owner    : string | null,
}

export interface Agent extends Organization{
}