import { Button } from "./Button";

export interface Action {
    label: string;
    icon?: string | null;
    href?: string | null;
    onClick?: Function;
    disabled?: boolean;
    button ?: Button    
}

