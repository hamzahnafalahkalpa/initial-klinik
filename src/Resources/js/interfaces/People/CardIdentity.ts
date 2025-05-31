export interface ViewCardIdentity{
    nik ?: string;
    kk ?: string;
    passport ?: string;
    sim ?: string;
    npwp ?: string;
    visa ?: string;
    ihs ?: string;
    bpjs ?: string;
}

export interface ShowCardIdentity extends ViewCardIdentity{
}

export interface CardIdentity extends ShowCardIdentity{}
