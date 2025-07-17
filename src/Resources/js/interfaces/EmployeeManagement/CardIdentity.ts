export interface ViewCardIdentity{
    nip ?: string | null;
    sip ?: string | null;
    sik ?: string | null;
    str ?: string | null;
    bpjs_ketenagakerjaan ?: string | null;
}

export interface ShowCardIdentity extends ViewCardIdentity{
}

export interface CardIdentity extends ShowCardIdentity{}
