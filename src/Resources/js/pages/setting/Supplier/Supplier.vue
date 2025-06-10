<script setup lang="ts">
import { SupplierSchema } from '@klinik/dtos/Setting/SupplierSchema';

import { 
  Input, FormField, FormItem, FormLabel, FormControl, FormMessage
} from '@klinik/components/ui';

import ContentLayout from '@klinik/layouts/setting/ContentLayout.vue';
</script>

<template>
  <ContentLayout
    dialogTitle="Formulir Supplier"
    dialogDescription="Silahkan isi formulir di bawah ini"
    routeName="supplier"
    :columns="[
      { field: 'actions', headerSort: false, width: 70 },
      { 
        title: 'Nama', field: 'name', sorter: 'string', width: 250,
        headerFilter: 'input', headerFilterPlaceholder: 'Cari berdasarkan nama' 
      },
      { 
        title: 'Kontak', field: 'phone', sorter: 'string', width: 150, 
        headerFilter: 'input', headerFilterPlaceholder: 'Cari Kontak' 
      },
      { 
        title: 'Alamat', field: 'address', sorter: false 
      }
    ]"
    :schema="SupplierSchema"
    mainContent="Supplier"
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
        <FormLabel :required="true">Nama Supplier</FormLabel>
        <FormControl>
          <Input
            type="text"
            placeholder="Masukkan Nama Supplier"
            autocomplete="off"
            v-bind="componentField"
            required
          />
        </FormControl>
        <FormMessage />
      </FormItem>
    </FormField>
    
    <FormField name="phone" v-slot="{ componentField }">
      <FormItem>
        <FormLabel>Kontak</FormLabel>
        <FormControl>
          <Input
            type="text"
            placeholder="Masukkan Kontak Supplier"
            autocomplete="off"
            v-bind="componentField"
            inputmode="numeric"
            pattern="[0-9]*"
          />
        </FormControl>
        <FormMessage />
      </FormItem>
    </FormField>

    <FormField name="address" v-slot="{ componentField }">
      <FormItem>
        <FormLabel>Alamat</FormLabel>
        <FormControl>
          <Input
            type="textarea"
            placeholder="Masukkan Alamat Supplier"
            autocomplete="off"
            v-bind="componentField"
          />
        </FormControl>
        <FormMessage />
      </FormItem>
    </FormField>
  </ContentLayout>
</template>
