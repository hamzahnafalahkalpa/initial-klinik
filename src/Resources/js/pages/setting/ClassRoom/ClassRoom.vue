<script setup lang="ts">
import { ClassRoomSchema } from '@klinik/dtos/Setting/ClassRoomSchema';
import ContentLayout from '@klinik/layouts/setting/ContentLayout.vue';

import { 
  Input, FormField, FormItem, FormLabel, FormControl, FormMessage
} from '@klinik/components/ui';
</script>
<template>
  <ContentLayout
    dialogTitle="Formulir Kelas Ruangan"
    dialogDescription="Silahkan isi formulir di bawah ini"
    routeName="classRoom"
    :columns="[
      { field: 'actions', headerSort: false, width: 70 },
      { 
        title: 'Nama Kelas', field: 'name', sorter: 'string', width: 200,
        headerFilter: 'input', headerFilterPlaceholder: 'Cari Nama Kelas'
      },
      { 
        title: 'Tgl. Buat', field: 'created_at', sorter: 'string'
      }
    ]"
    :schema="ClassRoomSchema"
    mainContent="Kelas Ruangan"
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
        <FormLabel :required="true">Nama Kelas</FormLabel>
        <FormControl>
          <Input
            type="text"
            placeholder="Masukkan Nama Kelas"
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
