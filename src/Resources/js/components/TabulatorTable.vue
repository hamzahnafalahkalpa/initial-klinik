<script setup lang="ts">
import { createApp, App, ref, onMounted, onBeforeUnmount, watch, nextTick } from 'vue';
import TabulatorFilter from './TabulatorFilter.vue';
import { TabulatorFull as Tabulator, RowComponent } from 'tabulator-tables';
import { Select } from '@klinik/components/ui/select';
import { Input } from '@klinik/components/ui/input';
import { MultiButton } from '@klinik/components/ui/button';
import { cn } from '@klinik/lib/utils';
import { Icon } from '@iconify/vue';
import { Action } from '../interfaces/UI/Action';

interface Props {
  id?: string | null;
  data: any[];
  columns: any[];
  actions?: Action[] | null;
  usingFilter: boolean;
  options?: Record<string, any> | null;
  tabulatorClass?: string | null;
  loading?: boolean | null;
}

const props = withDefaults(defineProps<Props>(), {
  usingFilter: false,
  options: null,
  tabulatorClass: null,
  loading: false
});

const table = ref<HTMLElement | null>(null);
let tabulator: typeof Tabulator | null = null;

let rowNumberCounter = 0;

function refreshTable() {
  if (tabulator.value) {
    tabulator.value.setData(props.data);
  }
}

function initTabulator() {
  if (!table.value) return;

  const options = {
    renderVerticalBuffer: 300,
    layout: 'fitDataStretch',
    autoColumns: false, 
    resizableRows: false,
    resizableRowGuide: true,
    resizableColumnGuide: true,
    rowHeader: props.options?.rowHeader ?? {
      formatter: (cell: any) => {
        rowNumberCounter++;
        return rowNumberCounter.toString();
      },
      headerSort: false,
      hozAlign: 'right',
      resizable: false,
      frozen: true
    },
    columnDefaults: {
      resizable: true
    },
    reactiveData: true,
    selectable: true,
    pagination: false,
    width: '100%',
    data: props.data,
    columns: props.columns,
    rowFormatter: (row: typeof RowComponent) => {
      const cell = row.getCell('actions');
      if (!cell) return;

      const el = cell.getElement();
      el.classList.add('tabulator-actions');
      const data = cell.getData();
      if (!el._vueApp) {
        const app = createApp(MultiButton, {
          actions: data['actions'].map((action: Action) => ({
            ...action,
            onClick: action?.button?.onClick ?? (() => {})
          }))
        });
        app.mount(el);
        el._vueApp = app;
      }
    },
    ...props.options,
  };

  tabulator = new Tabulator(table.value, options);
}

// Inisialisasi saat mounted jika langsung tersedia
// onMounted(() => {
//   if (!props.loading) {
//     nextTick(() => {
//       if (!table.value || props.loading) return;
//       initTabulator();
//       // refreshTable();
//     });
//   }
// });

// Destroy Tabulator saat unmount
onBeforeUnmount(() => {
  if (tabulator) {
    tabulator.destroy();
    tabulator = null;
  }
});

// Re-init ketika loading berubah ke false
watch(() => props.loading, (loading) => {
  if (!loading && !tabulator) {
    nextTick(() => {
      if (!props.loading) {
        initTabulator()
      }
    });
  }
});

// Replace data jika tabulator sudah aktif dan data berubah
watch(() => props.data, async (newData) => {
  if (tabulator) {
    rowNumberCounter = 0;
    // tabulator.setData([]);    
    // await nextTick();
    tabulator.setData(newData);
    // tabulator.redraw(true); 
  }
}, { deep: true });
</script>


<template>
  <div class="w-full gap-2 grid">
    <!-- Toolbar Slot Container -->
    <div v-if="$slots.toolbar" class="w-full p-3 rounded-sm bg-primary/40">
      <slot name="toolbar" />
    </div>

    <!-- Toolbar Slot Default Container -->
    <div v-else-if="usingFilter || $slots.defaultToolbar">
      <div class="w-full text-sm p-3 flex gap-2 rounded-sm bg-primary/40">
        <div class="tabulator-filter grid grid-cols-3 gap-2">
          <TabulatorFilter label="Field">
            <Select class="my-auto" id="filter-field">
              <option></option>
              <template v-for="column in columns" :key="column.field || column.title">
                <optgroup
                  v-if="'columns' in column"
                  :label="column.title"
                  :key="`group-${column.title}`"
                >
                  <option
                    v-for="sub_column in column.columns"
                    :key="sub_column.field"
                    :value="sub_column.field"
                  >
                    {{ sub_column.title }}
                  </option>
                </optgroup>
                <option
                  v-else
                  :value="column.field"
                >
                  {{ column.title }}
                </option>
              </template>
            </Select>
          </TabulatorFilter>
          <TabulatorFilter label="Operator">
            <Select class="my-auto" id="filter-operator">
              <option value="=">=</option>
              <option value="<"><</option>
              <option value="<="><=</option>
              <option value=">">></option>
              <option value=">=">>=</option>
              <option value="!=">!=</option>
              <option value="like">like</option>
            </Select>
          </TabulatorFilter>
          <TabulatorFilter label="Value">
            <Input
              class="my-auto"
              type="text"
              placeholder="value of filter"
              id="filter-value"
            />
          </TabulatorFilter>
          <slot name="defaultToolbar" />
        </div>
      </div>
    </div>

    <!-- Table -->
    <div v-if="props.loading" class="flex bg-primary/10 justify-center items-center py-10 h-full">
      <Icon icon="eos-icons:hourglass" class="h-10 w-10" :ssr="true"/>
      <span class="ml-2 text-gray-600">Memuat data...</span>
    </div>

    <div      
      v-else
      ref="table"
      :id="id || ''"
      :class="cn(
        'tabulator-container w-full !mt-[2px] 2xl:h-[calc(100vh-160px)] xl:h-[calc(100vh-140px)] h-[calc(100vh-120px)]',
        tabulatorClass
      )"
    ></div>

    <!-- Table -->
    <!-- <div      
      ref="table"
      :id="id || ''"
      :class="cn(
        'tabulator-container w-full !mt-[2px] 2xl:h-[calc(100vh-160px)] xl:h-[calc(100vh-140px)] h-[calc(100vh-120px)]',
        tabulatorClass
      )"
    >
    </div> -->
  </div>
</template>
