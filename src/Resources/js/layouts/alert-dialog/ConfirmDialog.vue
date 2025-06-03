<script setup lang="ts">
import {
  AlertDialogAction,
  AlertDialogCancel,
  AlertDialogDescription,
  AlertDialogFooter,
  AlertDialogHeader,
  AlertDialogTitle,
} from '@klinik/components/ui/alert-dialog'

import { useAlertDialog } from '@klinik/composables/useAlertDialog'
const dialog = useAlertDialog()
</script>

<template>
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
</template>
