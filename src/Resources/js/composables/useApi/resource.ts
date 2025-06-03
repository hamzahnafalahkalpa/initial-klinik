import { useApi } from './useApi';

export function apiResource(baseUrl: string) {
  return {
    index<T = any>() {
      return useApi<T>({ url: baseUrl });
    },
    show<T = any>(id: number | string) {
      return useApi<T>({ url: `${baseUrl}/${id}` });
    },
    store<T = any>(data: Record<string, any>) {
      return useApi<T>({ url: baseUrl, method: 'POST', data });
    },
    update<T = any>(id: number | string, data: Record<string, any>) {
      return useApi<T>({ url: `${baseUrl}/${id}`, method: 'PUT', data });
    },
    delete<T = any>(id: number | string) {
      return useApi<T>({ url: `${baseUrl}/${id}`, method: 'DELETE' });
    },
  };
}