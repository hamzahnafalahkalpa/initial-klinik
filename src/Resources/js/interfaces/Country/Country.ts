export interface ViewCountry{
    id ?: string;
    country_code ?: string;
    name : string,
}

export interface ShowCountry extends ViewCountry{}

export interface Country extends ShowCountry{}