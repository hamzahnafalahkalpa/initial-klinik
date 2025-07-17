<script setup lang="ts">
import { PatientTypeServiceSchema } from '@klinik/dtos/Setting/PatientTypeServiceSchema';
import ContentLayout from '@klinik/layouts/setting/ContentLayout.vue';

import { 
  Input, FormField, FormItem, FormLabel, FormControl, FormMessage,
  Select
} from '@klinik/components/ui';

</script>
<template>
  <ContentLayout
    dialogTitle="Formulir Jenis Layanan Pasien"
    dialogDescription="Silahkan isi formulir di bawah ini"
    routeName="patientTypeService"
    :columns="[
      {field: 'actions', headerSort: false, width: 70},
      { 
        title: 'Jenis Layanan', field: 'name', sorter: 'string', width: 200,
        headerFilter: 'input', headerFilterPlaceholder: 'Cari Jenis Layanan',
      },
      {title: 'Label Layanan', field: 'label', sorter: 'string', width: 200},
      {title: 'Tgl. Buat', field: 'created_at', sorter: 'string'}
    ]"
    :schema="PatientTypeServiceSchema"
    mainContent="Jenis Layanan Pasien"
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
        <FormLabel :required="true">Jenis Layanan</FormLabel>
        <FormControl>
          <Input
            type="text"
            placeholder="Isi Jenis Layanan"
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
        <FormLabel :required="true">Label Layanan</FormLabel>
        <FormControl>
          <Select 
            :required="true"
            v-bind="componentField"
            autocomplete="off"
          >
            <option></option>
            <option value="UMUM">Umum</option>
            <option value="BPJS">BPJS</option>
            <option value="ASURANSI">Asuransi</option>
          </Select>
        </FormControl>
        <FormMessage />
      </FormItem>
    </FormField>
  </ContentLayout>
</template>
