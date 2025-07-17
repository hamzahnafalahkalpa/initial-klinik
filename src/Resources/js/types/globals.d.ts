import type { route as routeFn } from 'ziggy-js';
import { Tenant } from '@klinik/interfaces/index';

declare global {
    const route: typeof routeFn;
}

declare namespace App{
    const tenant: Tenant
}