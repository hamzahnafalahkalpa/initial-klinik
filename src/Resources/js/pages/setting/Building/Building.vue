<script setup lang="ts">
import { BuildingSchema } from '@klinik/dtos/Setting/BuildingSchema';

import { 
  Input, FormField, FormItem, FormLabel, FormControl, FormMessage
} from '@klinik/components/ui';

import ContentLayout from '@klinik/layouts/setting/ContentLayout.vue';
</script>

<template>
  <ContentLayout
    dialogTitle="Formulir Gedung"
    dialogDescription="Silahkan isi formulir di bawah ini"
    routeName="building"
    :columns="[
      { field: 'actions', headerSort: false, width: 70 },
      { 
        title: 'Nama', field: 'name', sorter: 'string', 
        headerFilter: 'input', headerFilterPlaceholder: 'Cari berdasarkan nama' 
      },
    ]"
    :schema="BuildingSchema"
    mainContent="Gedung"
    :actions="[
        {
          type: 'edit',
          button: { buttonType: 'edit' }
        },
        {
          type: 'delete',
          button: { buttonType: 'delete' }
        }
    ]"
  >
    <FormField name="id" v-slot="{ componentField }">
      <FormItem class="hidden">
        <FormControl>
          <Input type="text" v-bind="componentField" autocomplete="off" />
        </FormControl>
        <FormMessage />
      </FormItem>
    </FormField>

    <FormField name="name" v-slot="{ componentField }">
      <FormItem>
        <FormLabel :required="true">Nama Gedung</FormLabel>
        <FormControl>
          <Input
            type="text"
            placeholder="Masukkan Nama Gedung"
            autocomplete="off"
            v-bind="componentField"
            required
          />
        </FormControl>
        <FormMessage />
      </FormItem>
    </FormField>
  </ContentLayout>
</template>
