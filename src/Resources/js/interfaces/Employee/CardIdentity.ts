export interface ViewCardIdentity{
    nip ?: string;
    sip ?: string;
    sik ?: string;
    str ?: string;
    bpjs_ketenagakerjaan ?: string;
}

export interface ShowCardIdentity extends ViewCardIdentity{
}

export interface CardIdentity extends ShowCardIdentity{}
