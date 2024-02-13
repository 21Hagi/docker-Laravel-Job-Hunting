<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, Link } from '@inertiajs/vue3';
    import { ref } from 'vue';
    import { Inertia } from '@inertiajs/inertia';
    import Pagination from '@/Components/Pagination.vue';
    import FlashMessage from '@/Components/FlashMessage.vue';

    defineProps({
        companies: Object
    })

    const keyword = ref('')

    const searchCompanies = () => {
        Inertia.get(route('company.index'), { keyword: keyword.value }, { preserveState: true })
    }

    const deleteCompany = id => {
        Inertia.delete(route('company.destroy', { company: id }), {
            onBefore: () => confirm('本当に削除しますか？')
        })
    }
</script>

<template>
    <Head title="企業情報" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">企業情報</h2>
                </div>
                <div class="flex space-x-2 items-center">
                    <div class="relative w-full">
                        <div class="absolute inset-y-4 left-0 flex items-center pl-3 pointer-events-none">
                            <span class="text-gray-500"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </div>
                        <input type="text" name="search" v-model="keyword" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2" placeholder="検索" @keyup.enter="searchCompanies">
                    </div>
                    <div>
                        <button class="ml-auto text-white bg-indigo-500 border-0 px-3 py-1.5 focus:outline-none hover:bg-indigo-600 rounded" @click="searchCompanies">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <section class="text-gray-600 body-font">
                            <FlashMessage />
                            <div class="flex justify-end px-7">
                                <div class="px-6">
                                    <Link :href="route('company.create')" class="text-white bg-indigo-500 border-0 px-4 py-2.5 focus:outline-none hover:bg-indigo-600 rounded text-xm right-0"><i class="fa-solid fa-plus pr-1"></i>新規登録</Link>
                                </div>
                            </div>
                            <div v-if="companies.data.length === 0" class="text-center space">
                                <p class="mb-1">企業情報を取得することができませんでした。</p>
                                <p>新規登録または検索条件を変更してください。</p>
                            </div>
                            <div v-else class="container md:md:px-5 mx-auto">
                                <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-5 mx-auto">
                                    <table class="min-w-full divide-y divide-gray-200 mb-4">
                                        <thead class="bg-gray-100">
                                            <tr>
                                                <th scope="col" class="pl-8 lg:pl-3 xl:pl-7 pr-6 py-3 text-left min-w-[200px]">
                                                    <div class="flex items-center gap-x-2">
                                                        <span class="text-xm font-semibold tracking-wide text-gray-800">
                                                            企業名
                                                        </span>
                                                    </div>
                                                </th>

                                                <th scope="col" class="px-6 py-3 text-left">
                                                    <div class="flex items-center gap-x-2">
                                                        <span class="text-xm font-semibold tracking-wide text-gray-800">
                                                            採用人数
                                                        </span>
                                                    </div>
                                                </th>

                                                <th scope="col" class="px-6 py-3 text-left">
                                                    <div class="flex items-center gap-x-2">
                                                        <span class="text-xm font-semibold tracking-wide text-gray-800">
                                                            初任給
                                                        </span>
                                                    </div>
                                                </th>

                                                <th scope="col" class="px-6 py-3 text-left">
                                                    <div class="flex items-center gap-x-2">
                                                        <span class="text-xm font-semibold tracking-wide text-gray-800">
                                                            離職率
                                                        </span>
                                                    </div>
                                                </th>

                                                <th scope="col" class="px-6 py-3 text-left">
                                                    <div class="flex items-center gap-x-2">
                                                        <span class="text-xm font-semibold tracking-wide text-gray-800">
                                                            残業時間（月）
                                                        </span>
                                                    </div>
                                                </th>

                                                <th scope="col" class="px-6 py-3 text-right"></th>
                                            </tr>
                                        </thead>
                                                
                                        <tbody class="divide-y divide-gray-200">
                                            <tr v-for="company in companies.data" :key="company.id" class="h-[4rem] even:bg-gray-100 odd:bg-white">
                                                <td class="whitespace-nowrap">
                                                    <div class="pl-8 lg:pl-3 xl:pl-7 pr-6 py-3">
                                                        <div class="flex items-center gap-x-3">
                                                            <div class="grow">
                                                                <Link :href="route('company.show', { id: company.id })" class="block text-xm font-bold text-gray-800 hover:underline">{{ company.name }}</Link>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="whitespace-nowrap">
                                                    <div class="px-6 py-3">
                                                        <span class="block text-xm text-gray-800">
                                                            {{ company.num_of_hires ? company.num_of_hires + '名' : '' }}
                                                        </span>
                                                    </div>
                                                </td>

                                                <td class="whitespace-nowrap">
                                                    <div class="px-6 py-3">
                                                        <span class="text-xm text-gray-800">
                                                            {{ company.starting_salary ? company.starting_salary + '万円' : ''}}
                                                        </span>
                                                    </div>
                                                </td>

                                                <td class="whitespace-nowrap">
                                                    <div class="px-6 py-3">
                                                        <span class="text-xm text-gray-800">
                                                            {{ company.turnover_rate ? company.turnover_rate + '%' : ''}}
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="whitespace-nowrap">
                                                    <div class="px-6 py-3">
                                                        <div class="flex items-center gap-x-3">
                                                            <span class="text-xm text-gray-800">
                                                                {{ company.work_overtime ? company.work_overtime + '時間' : ''}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="whitespace-nowrap">
                                                    <div class="px-4 py-1.5 inline-flex">
                                                        <Link :href="route('company.edit', { id: company.id })" class="gap-x-1.5 text-xm text-blue-600 decoration-2 hover:underline font-medium pr-9">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </Link>
                                                        <button @click="deleteCompany(company.id)" class="gap-x-1.5 text-xm text-rec-600 decoration-2 hover:underline font-medium"><i class="fa-solid fa-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>       
                                    <Pagination class="mt-6" :links="companies.links"></Pagination>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
