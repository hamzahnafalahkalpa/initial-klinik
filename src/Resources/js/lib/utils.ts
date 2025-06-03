import { clsx, type ClassValue } from 'clsx';
import { twMerge } from 'tailwind-merge';

export function cn(...inputs: ClassValue[]) {
    return twMerge(clsx(inputs));
}

export function generateId() {
    return Array(12)
        .fill('')
        .map(() => String.fromCharCode(97 + Math.floor(Math.random() * 26)))
        .join('');
}