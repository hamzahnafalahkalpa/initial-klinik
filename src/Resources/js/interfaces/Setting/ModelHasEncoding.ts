export interface Structure{
    type : string;
    value ?: string;
    length ?: number;
    format ?: string;
    resetable ?: boolean;
}

export interface Separator{
    distance : number;
    separator : string | null;
}

export interface ViewModelHasEncoding{
    id ?: number | null;
    value : string | null;
    structure : Structure[];
    separator ?: Separator;
    created_at ?: string;
    updated_at ?: string;
}

export interface ShowModelHasEncoding extends ViewModelHasEncoding{
}

export interface ModelHasEncoding extends ShowModelHasEncoding{
}
