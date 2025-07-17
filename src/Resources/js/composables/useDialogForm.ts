import { ref, computed } from 'vue'
import { useForm } from 'vee-validate'

type DialogMode = 'create' | 'edit'

export function useDialogForm<T extends object>(initialValues: T) {
  const isDialogOpen = ref(false)
  const formData = ref<T>({ ...initialValues })

  const mode = ref<DialogMode>('create')

  const { handleSubmit, resetForm, setValues } = useForm<T>({
    initialValues: formData.value,
  })

  function openDialog(data?: Partial<T>) {
    isDialogOpen.value = true
    if (data && 'id' in data && data.id) {
      mode.value = 'edit'
      formData.value = { ...initialValues, ...data }
      setValues(formData.value)
    } else {
      mode.value = 'create'
      formData.value = { ...initialValues }
      resetForm({ values: formData.value })
    }
  }

  function closeDialog() {
    isDialogOpen.value = false
  }

  function setMode(customMode: DialogMode) {
    mode.value = customMode
  }

  const isEditMode = computed(() => mode.value === 'edit')
  const isCreateMode = computed(() => mode.value === 'create')

  return {
    isDialogOpen,
    openDialog,
    closeDialog,
    handleSubmit,
    formData,
    mode,
    isEditMode,
    isCreateMode,
    setMode,
  }
}
