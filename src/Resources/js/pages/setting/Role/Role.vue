<script setup lang="ts">
import { RoleSchema } from '@klinik/dtos/Setting/RoleSchema';

import { 
  Input, FormField, FormItem, FormLabel, FormControl, FormMessage
} from '@klinik/components/ui';

import ContentLayout from '@klinik/layouts/setting/ContentLayout.vue';
</script>

<template>
  <ContentLayout
    dialogTitle="Formulir Role"
    dialogDescription="Perubahan pada hak akses role akan mempengaruhi seluruh pengguna yang menggunakan role tersebut.."
    routeName="role"
    :columns="[
      { field: 'actions', headerSort: false, width: 70 },
      { 
        title: 'Nama', field: 'name', sorter: 'string', 
        headerFilter: 'input', headerFilterPlaceholder: 'Cari berdasarkan nama' 
      },
    ]"
    :schema="RoleSchema"
    mainContent="Role"
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
        <FormLabel :required="true">Nama Role</FormLabel>
        <FormControl>
          <Input
            type="text"
            placeholder="Masukkan Nama Role"
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
