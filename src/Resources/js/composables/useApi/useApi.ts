import { useCsrf } from '../useCsrf';
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';
import type { ApiRequestOptions, ApiResponse } from './types';

export async function useApi<T = any>(options: ApiRequestOptions): Promise<ApiResponse<T>> {
  const { url, method = 'GET', data, customHeaders = {} } = options;

  const loading   = ref(false);
  const csrfToken = useCsrf();
  const page      = usePage();

  const token: string | null = page?.props?.auth?.session?.token || localStorage.getItem('auth_token');
  
  const headers: HeadersInit = {
    Accept: 'application/json',
    'Content-Type': 'application/json',
    'X-CSRF-TOKEN': csrfToken.value,
    appcode: '2',
    ...customHeaders,
    ...(token ? { Authorization: `Bearer ${token}` } : {}),
  };
  
  const response = await fetch(url, {
    method,
    headers,
    body: method !== 'GET' ? JSON.stringify(data) : undefined,
  });

  const result = await response.json();
  const { acl = {}, meta, data: responseData } = result;

  if (!meta.success) {
    if (meta.code === 201) {
      window.location.href = '/login';
      return Promise.reject({
        code: 201,
        messages: ['Session expired. Redirecting to login...'],
      });
    }

    console.error('API Error:', meta.messages);
    throw {
      code: meta.code,
      messages: meta.messages,
    };
  }

  return {
    acl : acl,
    meta : meta,
    data : responseData
  };
}
