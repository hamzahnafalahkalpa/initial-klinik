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
const mode = ref<'info' | 'confirm'>('info') // <-- New state

/* --- Helpers --- */

function resetDefaults() {
  title.value = ''
  description.value = ''
  confirmText.value = 'OK'
  cancelText.value = 'Batal'
  showCancel.value = false
  onConfirm.value = () => {}
  mode.value = 'info' // Reset to default mode
}

function showDialog(dialogMode: 'info' | 'confirm', options: InfoDialogOptions | ConfirmDialogOptions) {
  resetDefaults()
  mode.value = dialogMode
  title.value = options.title
  description.value = options.description
  confirmText.value = options.confirmText || (dialogMode === 'confirm' ? 'Lanjutkan' : 'OK')

  if (dialogMode === 'confirm') {
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
    mode, 
    info,
    confirm,
  }
}
