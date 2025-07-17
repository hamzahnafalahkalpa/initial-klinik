import { ModelHasEncoding } from "./ModelHasEncoding";

export interface ViewEncoding{
    id ?: number | null ;
    name : string;
    flag : string;
    model_has_encoding ?: ModelHasEncoding;
    created_at ?: string;
    updated_at ?: string;
}

export interface ShowEncoding extends ViewEncoding{
}

export interface Encoding extends ShowEncoding{}
