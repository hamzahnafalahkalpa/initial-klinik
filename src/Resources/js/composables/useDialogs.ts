import { ref } from 'vue'

export function useDialog() {
  const isOpen = ref(false)
  const onConfirm = ref<(() => void) | null>(null)
  const onCancel = ref<(() => void) | null>(null)

  function openDialog({ confirm, cancel }: { confirm?: () => void; cancel?: () => void } = {}) {
    isOpen.value = true
    onConfirm.value = confirm || null
    onCancel.value = cancel || null
  }

  function closeDialog() {
    isOpen.value = false
    onConfirm.value = null
    onCancel.value = null
  }

  function confirm() {
    if (onConfirm.value) onConfirm.value()
    closeDialog()
  }

  function cancel() {
    if (onCancel.value) onCancel.value()
    closeDialog()
  }

  return {
    isOpen,
    openDialog,
    closeDialog,
    confirm,
    cancel,
    onConfirm,
    onCancel,
  }
}
