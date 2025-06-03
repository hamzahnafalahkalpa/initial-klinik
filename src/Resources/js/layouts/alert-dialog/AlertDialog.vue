<script setup lang="ts">
import {
  AlertDialog,
  AlertDialogContent,
} from '@klinik/components/ui/alert-dialog'
import { InfoDialog, ConfirmDialog } from '.'
import { useAlertDialog } from '@klinik/composables/useAlertDialog'
const dialog = useAlertDialog()
</script>

<template>
  <AlertDialog
    v-model:open="dialog.open.value"
  >
    <AlertDialogContent>
        <InfoDialog v-if="dialog.mode.value === 'info'" />
        <ConfirmDialog v-if="dialog.mode.value === 'confirm'" />
    </AlertDialogContent>
</AlertDialog>
</template>