import { Button } from "./Button";

export interface Action {
    label?: string | null;
    icon?: string | null;
    href?: string | null;
    type?: string|null;
    disabled?: boolean;
    button ?: Button;
}

