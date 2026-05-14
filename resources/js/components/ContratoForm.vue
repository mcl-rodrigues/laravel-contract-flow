<script setup>
import { ref, reactive, computed } from 'vue'

const props = defineProps({
    clientes: Array,
    action: String,
})

const csrf = computed(() =>
    document.querySelector('meta[name="csrf-token"]').getAttribute('content')
)

const isSaving = ref(false)
const errors = ref({})

const form = reactive({
    cliente: '',
    data_inicio: '',
    data_fim: '',
    status: 1
})

const handleSubmit = async () => {
    isSaving.value = true
    errors.value = {}

    const response = await fetch(props.action, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrf.value
        },
        body: JSON.stringify(form)
    })

    if (response.ok) {
        window.location.href = '/contratos'
        return
    } else {
        const data = await response.json().catch(() => null)
        isSaving.value = false

        if (response.status === 422 && data?.errors) {
            errors.value = data.errors
        }
    }
}
</script>

<template>
    <form @submit.prevent="handleSubmit" class="space-y-6">
        <input type="hidden" name="_token" :value="csrf" />
        <div>
            <label class="mb-1 block text-sm font-medium text-gray-700">
                Cliente
            </label>
            <select
                name="cliente"
                v-model="form.cliente"
                required
                class="w-full rounded border border-gray-300 px-4 py-2 focus:border-blue-500 focus:outline-none"
                :class="{'border-red-500 focus:border-red-500': errors.cliente}"
            >
                <option value="">Selecione um cliente</option>
                <option
                    v-for="cliente in clientes"
                    :key="cliente.id"
                    :value="cliente.id"
                >
                    {{ cliente.nome }}
                </option>
            </select>
            <div
                v-if="errors.cliente"
                class="mt-1 text-sm text-red-600"
            >
                O cliente é obrigatório.
            </div>
        </div>
        <div>
            <label class="mb-1 block text-sm font-medium text-gray-700">
                Data de Início
            </label>
            <input
                type="date"
                name="data_inicio"
                v-model="form.data_inicio"
                required
                class="w-full rounded border border-gray-300 px-4 py-2 focus:border-blue-500 focus:outline-none"
                :class="{'border-red-500 focus:border-red-500': errors.data_inicio}"
            />
            <div
                v-if="errors.data_inicio"
                class="mt-1 text-sm text-red-600"
            >
                O cliente é obrigatório.
            </div>
        </div>
        <div>
            <label class="mb-1 block text-sm font-medium text-gray-700">
                Data de Fim
            </label>
            <input
                type="date"
                name="data_fim"
                v-model="form.data_fim"
                class="w-full rounded border border-gray-300 px-4 py-2 focus:border-blue-500 focus:outline-none"
            />
        </div>
        <div>
            <label class="mb-1 block text-sm font-medium text-gray-700">
                Status
            </label>
            <select
                name="status"
                v-model="form.status"
                class="w-full rounded border border-gray-300 px-4 py-2 focus:border-blue-500 focus:outline-none"
                :class="{'border-red-500 focus:border-red-500': errors.status}"
            >
                <option value="1">Ativo</option>
                <option value="0">Inativo</option>
            </select>
            <div
                v-if="errors.status"
                class="mt-1 text-sm text-red-600"
            >
                O cliente é obrigatório.
            </div>
        </div>
        <div class="flex justify-end gap-2">
            <a
                href="/contratos"
                class="rounded bg-gray-300 px-4 py-2 text-gray-800"
            >
                Cancelar
            </a>
            <button
                :disabled="isSaving"
                type="submit"
                class="rounded bg-blue-600 px-4 py-2 text-white flex items-center gap-2"
                :class="{ 'opacity-50 cursor-not-allowed': isSaving }"
            >
                <template v-if="isSaving">
                    <svg
                        class="animate-spin h-4 w-4"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" class="opacity-25" />
                        <path fill="currentColor" class="opacity-75" d="M4 12a8 8 0 018-8v8H4z" />
                    </svg>
                    Salvando...
                </template>
                <template v-else>
                    Salvar
                </template>
            </button>
        </div>
    </form>
</template>
