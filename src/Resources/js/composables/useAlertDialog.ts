import { ref } from 'vue'

/* --- Interface Definitions --- */

interface BaseDialogOptions {
  title: string
  description: string
  confirmText?: string
}

interface InfoDialogOptions extends BaseDialogOptions {}

interface ConfirmDialogOptions extends BaseDialogOptions {
  cancelText?: string
  onConfirm?: () => void
}

/* --- Reactive States --- */

const open = ref(false)
const title = ref('')
const description = ref('')
const confirmText = ref('OK')
const cancelText = ref('Batal')
const showCancel = ref(false)
const onConfirm = ref<() => void>(() => {})

/* --- Helpers --- */

function resetDefaults() {
  title.value = ''
  description.value = ''
  confirmText.value = 'OK'
  cancelText.value = 'Batal'
  showCancel.value = false
  onConfirm.value = () => {}
}

function showDialog(mode: 'info' | 'confirm', options: InfoDialogOptions | ConfirmDialogOptions) {
  resetDefaults()
  title.value = options.title
  description.value = options.description
  confirmText.value = options.confirmText || (mode === 'confirm' ? 'Lanjutkan' : 'OK')

  if (mode === 'confirm') {
    const confirmOpts = options as ConfirmDialogOptions
    cancelText.value = confirmOpts.cancelText || 'Batal'
    showCancel.value = true
    onConfirm.value = confirmOpts.onConfirm || (() => {})
  } else {
    showCancel.value = false
  }

  open.value = true
}

/* --- Public API --- */

function info(options: InfoDialogOptions) {
  showDialog('info', options)
}

function confirm(options: ConfirmDialogOptions) {
  showDialog('confirm', options)
}

export function useAlertDialog() {
  return {
    open,
    title,
    description,
    confirmText,
    cancelText,
    showCancel,
    onConfirm,
    info,
    confirm,
  }
}
