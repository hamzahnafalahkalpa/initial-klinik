<script setup lang="ts">
import { ServiceClusterSchema } from '@klinik/dtos/Setting/ServiceClusterSchema';
import ContentLayout from '@klinik/layouts/setting/ContentLayout.vue';

import { 
  Input, FormField, FormItem, FormLabel, FormControl, FormMessage,
  Select
} from '@klinik/components/ui';

</script>
<template>
  <ContentLayout
    dialogTitle="Formulir Kluster"
    dialogDescription="Silahkan isi formulir di bawah ini"
    routeName="serviceCluster"
    :columns="[
      {field: 'actions', headerSort: false, width: 70},
      { 
        title: 'Jenis Kluster', field: 'name', sorter: 'string', width: 200,
        headerFilter: 'input', headerFilterPlaceholder: 'Cari Jenis Layanan',
      },
      {title: 'Label Jenis', field: 'label', sorter: 'string', width: 200},
      {title: 'Tgl. Buat', field: 'created_at', sorter: 'string'}
    ]"
    :schema="ServiceClusterSchema"
    mainContent="Jenis Kluster"
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
        <FormLabel :required="true">Jenis Kluster</FormLabel>
        <FormControl>
          <Input
            type="text"
            placeholder="Isi Jenis"
            autocomplete="off"
            v-bind="componentField"
            required
          />
        </FormControl>
        <FormMessage />
      </FormItem>
    </FormField>

    <FormField name="label" v-slot="{ componentField }">
      <FormItem>
        <FormLabel :required="true">Label Jenis</FormLabel>
        <FormControl>
          <Select 
            :required="true"
            v-bind="componentField"
            autocomplete="off"
          >
            <option></option>
            <option v-for="(option, index) in [
              'KLUSTER 1',
              'KLUSTER 2',
              'KLUSTER 3',
              'KLUSTER 4',
              'IBU HAMIL BERSALIN NIFAS',
              'BALITA ANAK PRA SEKOLAH',
              'ANAK USIA SEKOLAH DAN REMAJA',
              'KESEHATAN USIA DEWASA',
              'KESEHATAN LANSIA',
              'PELAYANAN LUAR GEDUNG'
            ]" :key="index" :value="option">
              {{ option }}
            </option>
          </Select>
        </FormControl>
        <FormMessage />
      </FormItem>
    </FormField>
  </ContentLayout>
</template>
