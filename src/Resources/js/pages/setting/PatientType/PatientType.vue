<script setup lang="ts">
import { PatientTypeSchema } from '@klinik/dtos/Setting/PatientTypeSchema';
import ContentLayout from '@klinik/layouts/setting/ContentLayout.vue';

import { 
  Input, FormField, FormItem, FormLabel, FormControl, FormMessage,
  Select
} from '@klinik/components/ui';

</script>
<template>
  <ContentLayout
    dialogTitle="Formulir Jenis Pasien"
    dialogDescription="Silahkan isi formulir di bawah ini"
    routeName="patientType"
    :columns="[
      {field: 'actions', headerSort: false, width: 70},
      { 
        title: 'Jenis Pasien', field: 'name', sorter: 'string', width: 200,
        headerFilter: 'input', headerFilterPlaceholder: 'Cari Jenis Layanan',
      },
      {title: 'Label Jenis', field: 'label', sorter: 'string', width: 200},
      {title: 'Tgl. Buat', field: 'created_at', sorter: 'string'}
    ]"
    :schema="PatientTypeSchema"
    mainContent="Jenis Pasien"
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
        <FormLabel :required="true">Jenis Pasien</FormLabel>
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
            <option value="UMUM">Umum</option>
            <option value="KARYAWAN">Karyawan</option>
            <option value="MEMBER">Member</option>
            <option value="CREW">Crew</option>
            <option value="PARTNER">Partner</option>
          </Select>
        </FormControl>
        <FormMessage />
      </FormItem>
    </FormField>
  </ContentLayout>
</template>
