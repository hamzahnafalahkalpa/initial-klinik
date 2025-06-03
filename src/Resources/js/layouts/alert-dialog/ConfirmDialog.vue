<script setup lang="ts">
import {
  AlertDialog,
  AlertDialogAction,
  AlertDialogCancel,
  AlertDialogContent,
  AlertDialogDescription,
  AlertDialogFooter,
  AlertDialogHeader,
  AlertDialogTitle,
} from '@klinik/components/ui/alert-dialog'

import { useAlertDialog } from '@klinik/composables/useAlertDialog'
const dialog = useAlertDialog()
</script>

<template>
  <AlertDialog
    v-model:open="dialog.open.value"
  >
    <AlertDialogContent>
      <AlertDialogHeader>
        <AlertDialogTitle>{{ dialog.title }}</AlertDialogTitle>
        <AlertDialogDescription>{{ dialog.description }}</AlertDialogDescription>
      </AlertDialogHeader>
      <AlertDialogFooter>
        <AlertDialogCancel v-if="dialog.showCancel">
          {{ dialog.cancelText }}
        </AlertDialogCancel>
        <AlertDialogAction @click="dialog.onConfirm.value()">
          {{ dialog.confirmText }}
        </AlertDialogAction>
      </AlertDialogFooter>
    </AlertDialogContent>
  </AlertDialog>
</template>
