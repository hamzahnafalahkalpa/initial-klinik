<script setup lang="ts">
import {
  AlertDialogAction,
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
    <AlertDialogAction @click="dialog.open.value = false">
      {{ dialog.confirmText || 'OK' }}
    </AlertDialogAction>
  </AlertDialogFooter>
</template>
