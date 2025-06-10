<script setup lang="ts">

import { 
  Input, FormField, FormItem, FormLabel, FormControl, FormMessage
} from '@klinik/components/ui';

import ContentLayout from '@klinik/layouts/setting/ContentLayout.vue';

interface Props{
  dialogTitle: string;
  dialogDescription: string;
  routeName: string;
  schema: any;
  columns?: any[];
  mainContent: string;
}

const props = defineProps<Props>()
</script>

<template>
  <ContentLayout
    :dialogTitle="props.dialogTitle"
    :dialogDescription="props.dialogDescription"
    :routeName="props.routeName"
    :columns="props.columns ?? [
        { field: 'name', title: 'name', sorter: 'string', width: 250 },
        { field: 'phone_company', title: 'Kontak', sorter: 'string', width: 150 },
        { field: 'email_company', title: 'Email', sorter: 'string', width: 250 },

    ]"
    :schema="props.schema"
    :mainContent="props.mainContent"
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
        <FormLabel :required="true">Nama Instansi</FormLabel>
        <FormControl>
          <Input
            type="text"
            placeholder="Masukkan Nama Instansi"
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
            placeholder="Masukkan Kontak"
            autocomplete="off"
            v-bind="componentField"
            inputmode="numeric"
            pattern="[0-9]*"
          />
        </FormControl>
        <FormMessage />
      </FormItem>
    </FormField>

    <FormField name="email" v-slot="{ componentField }">
      <FormItem>
        <FormLabel>Email</FormLabel>
        <FormControl>
          <Input
            type="email"
            placeholder="Isi dengan email"
            autocomplete="off"
            v-bind="componentField"
          />
        </FormControl>
        <FormMessage />
      </FormItem>
    </FormField>

    <FormField name="phone_owner" v-slot="{ componentField }">
      <FormItem>
        <FormLabel>Kontak Pemilik</FormLabel>
        <FormControl>
          <Input
            type="text"
            placeholder="Masukkan Kontak Pemilik"
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
            placeholder="Masukkan Alamat"
            autocomplete="off"
            v-bind="componentField"
          />
        </FormControl>
        <FormMessage />
      </FormItem>
    </FormField>

    <FormField name="name_owner" v-slot="{ componentField }">
      <FormItem>
        <FormLabel>Nama Pemilik</FormLabel>
        <FormControl>
          <Input
            type="text"
            placeholder="Masukkan Nama Pemilik"
            autocomplete="off"
            v-bind="componentField"
          />
        </FormControl>
        <FormMessage />
      </FormItem>
    </FormField>
  </ContentLayout>
</template>
