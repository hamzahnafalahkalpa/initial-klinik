import { computed, ref, Ref } from 'vue';
import { apiClient } from '@klinik/composables/useApi/client';
import { generateId } from '@klinik/lib/utils';
import { useAlertDialog } from '@klinik/composables/useAlertDialog';
import { toast } from 'vue-sonner';
import { Action } from '@klinik/interfaces/UI/Action';
import { FormContext } from 'vee-validate';

const dialog = useAlertDialog();
const data = ref<{ data: any[]; loading: boolean }>({ data: [], loading: false });

export function useFormActionsPopup<T extends object>({
  routeName,
  mainContent,
  actions,
  // data,
  editData,
  isDialogOpen,
  resetFormFn,
  setValuesFn
}: {
  routeName: string;
  mainContent: string;
  actions: Action[];
  // data: Ref<{ data: (T & { itemid: string; actions: Action[] })[]; loading: boolean }>;
  editData: Ref<(T & { itemid?: string }) | null>;
  isDialogOpen: Ref<boolean>;
  setValuesFn: Ref<FormContext<any>['setValues'] | null>;
  resetFormFn: Ref<FormContext<any>['resetForm'] | null>;
}) {
  const loadData = async () => {
    data.value.loading = true;
    try {
      const response = await apiClient[routeName].index();
      const items = response.data ?? [];
      if (items.length > 0) {
        data.value.data = items.map((item: T) => {
          const itemid = generateId();
          return mapActionsForItem({
            ...item,
            itemid,
            actions: JSON.parse(JSON.stringify(actions)),
          });
        });
      }
    } catch (error) {
      console.error(error);
      toast.error('Gagal memuat data');
    } finally {
      data.value.loading = false;
    }
  };

  const onSubmit = async (
    values: T,
    opts?: {
      onSuccess?: (savedItem: T) => void;
      onError?: (err: any) => void;
    }
  ) => {
    data.value.loading = true
    toast.loading(`${mainContent} dalam penyimpanan...`);
    try {
      const response = await apiClient[routeName].store(values);
      const savedItem = response.data;

      if (savedItem) {
        toast.success(`${mainContent} berhasil disimpan`);

        const itemid = editData.value?.itemid || generateId();
        const mappedItem = mapActionsForItem({
          ...savedItem,
          itemid,
          actions: JSON.parse(JSON.stringify(actions)),
        });

        const index = data.value.data.findIndex((i) => i.itemid === itemid);
        if (index !== -1) {
          data.value.data.splice(index, 1, mappedItem);
        } else {
          data.value.data = [...data.value.data, mappedItem];
        }

        isDialogOpen.value = false;
        editData.value = null;
        opts?.onSuccess?.(savedItem);
      }
      data.value.loading = false
    } catch (error) {
      console.error(error);
      toast.error('Gagal menyimpan data');
      opts?.onError?.(error);
    } finally {
      setTimeout(() => toast.dismiss(), 3000);
    }
  };

  const onDelete = async (
    values: T & { itemid?: string; id?: string | number },
    opts?: {
      onSuccess?: () => void;
      onError?: (err: any) => void;
    }
  ) => {
    data.value.loading = true;
    toast.loading(`${mainContent} dalam penghapusan...`);
    try {
      const response = await apiClient[routeName].delete(values.id as string);
      if (response.data) {
        toast.success(`${mainContent} berhasil dihapus`);
        data.value.data = data.value.data.filter((i) => i.itemid !== values.itemid);
        opts?.onSuccess?.();
        data.value.loading = false;

      } else {
        throw new Error('Gagal menghapus data');
      }
    } catch (error) {
      console.error(error);
      toast.error('Gagal menghapus data');
      opts?.onError?.(error);
    } finally {
      setTimeout(() => toast.dismiss(), 3000);
    }
  };

  const editFn = (
    item: T & { itemid?: string },
    opts?: {
      onEdit?: (item: T) => void;
      onError?: (error: any) => void;
    }
  ) => {
    try {
      editData.value = item;
      isDialogOpen.value = true;
      resetFormFn.value?.();
      setValuesFn.value?.(item);
      opts?.onEdit?.(item);
    } catch (error) {
      console.error('Edit error:', error);
      opts?.onError?.(error);
    }
  };

  const deleteFn = (
    item: T & { itemid?: string; id?: string | number },
    opts?: {
      onSuccess?: () => void;
      onError?: (err: any) => void;
      confirmOptions?: {
        title?: string;
        description?: string;
        confirmText?: string;
        cancelText?: string;
      };
    }
  ) => {
    const {
      title = 'Hapus Data?',
      description = 'Data yang dihapus tidak bisa dikembalikan.',
      confirmText = 'Ya, Hapus',
      cancelText = 'Batal',
    } = opts?.confirmOptions || {};

    dialog.confirm({
      title,
      description,
      confirmText,
      cancelText,
      onConfirm: () =>
        onDelete(item, {
          onSuccess: opts?.onSuccess,
          onError: opts?.onError,
        }),
    });
  };

  const loading = computed(() => data.value.loading);

  function mapActionsForItem(item: T & { itemid: string; actions: Action[] }) {
    item.actions = (item.actions || []).map((action: Action) => {
      if (action.button) {
        action.button.attributes = { itemid: item.itemid };
        if (action.type === 'edit') {
          action.button.onClick = () => editFn(item);
        } else if (action.type === 'delete') {
          action.button.onClick = () => deleteFn(item);
        }
      }
      return action;
    });
    return item;
  }

  return {
    loadData,
    onSubmit,
    onDelete,
    editFn,
    deleteFn,
    data
  };
}
