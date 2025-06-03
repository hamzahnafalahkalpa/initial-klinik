<script setup lang="ts">
import { BuildingSchema } from '../../../dtos/Setting/BuildingSchema';

import { Input } from '@klinik/components/ui';

import { 
  FormField, FormItem, FormLabel, FormControl, FormMessage
} from '@klinik/components/ui/form';

import ContentLayout from '../../../layouts/setting/ContentLayout.vue';
</script>

<template>
  <ContentLayout
    dialogTitle="Formulir Gedung"
    dialogDescription="Perubahan pada hak akses building akan mempengaruhi seluruh pengguna yang menggunakan building tersebut."
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
          // href: `/setting/building/${b.id}/edit`,
          button: { buttonType: 'edit' }
        },
        {
          type: 'delete',
          // href: `/setting/building/${b.id}`,
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
