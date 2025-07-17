import { Address } from "../Regional/Address";
import { WorkspaceSetting } from "./WorkspaceSetting";

export interface ViewWorkspace {
    id: string;
    uuid: string;
    name: string;
    phone ?: string;
}

export interface ShowWorkspace{
    address ?: Address;
    setting : WorkspaceSetting
}

export interface Workspace extends ShowWorkspace{

}