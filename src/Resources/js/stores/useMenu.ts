// stores/useMenuStore.ts
import { defineStore } from 'pinia';
import { menu } from '@klinik/services/menu';
// import { resolveIcon } from '@/utils/icon'; // pastikan path sesuai
import { MenuItem } from '../interfaces';
import { MenuItemSchema } from '@klinik/dtos/MenuItem/MenuItemSchema';
import { z } from 'zod';

const STORAGE_KEY = 'mainNavItems';
const CACHE_TTL = 3600 * 1000; // 1 jam

export const useMenuStore = defineStore('menu', {
  state: () => ({
    items: [] as MenuItem[],
    loading: false,
    error: null as string | null,
  }),
  actions: {
    async load() {
      this.loading = true;
      this.error = null;

      const cached = localStorage.getItem(STORAGE_KEY);

      if (cached) {
        try {
          const parsed = JSON.parse(cached);
          const validated = z.array(MenuItemSchema).parse(parsed.data);
          this.items = validated;
          
          const isExpired = Date.now() - parsed.cachedAt > CACHE_TTL;

          if (!isExpired && Array.isArray(parsed.data)) {
            this.items = parsed.data;
            this.loading = false;
            return;
          }
        } catch (err) {
          console.warn('Invalid menu cache:', err);
        }
      }

      await this.refresh();
    },

    async refresh() {
      try {
        const response = await menu();
        const validated = z.array(MenuItemSchema).parse(response);

        this.items = validated;

        localStorage.setItem(
          STORAGE_KEY,
          JSON.stringify({
            data: response,
            cachedAt: Date.now(),
          })
        );
      } catch (err: any) {
        console.error('Failed to fetch menu:', err);
        this.error = err.message || 'Failed to load menu';
        this.items = [];
      } finally {
        this.loading = false;
      }
    },

    clearCache() {
      localStorage.removeItem(STORAGE_KEY);
    },
  },
});
