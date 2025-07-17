import { ViewUserReference } from "./UserReference";

export interface ViewUser{
    id: string | null;
    username: string;
    email: string | null;
    email_verified_at: string | null;
    user_reference : ViewUserReference
}

export interface ShowUser extends ViewUser{
}

export interface User{
    id?: string | null;
    username: string;
    password?: string | null;
    password_confirmation ?: string | null;
    email: string;
}