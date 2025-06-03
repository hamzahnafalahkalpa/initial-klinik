export interface ViewCardIdentity{
    nik ?: string | null;
    npwp ?: string | null;
    kk ?: string | null;
    passport ?: string | null;
    sim ?: string | null;
    visa ?: string | null;
    ihs ?: string | null;
    bpjs ?: string | null;
}

export interface ShowCardIdentity extends ViewCardIdentity{
}

export interface CardIdentity extends ShowCardIdentity{}
