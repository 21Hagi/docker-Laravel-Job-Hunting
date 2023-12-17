<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, Link } from '@inertiajs/vue3';
    import { Inertia } from '@inertiajs/inertia';

    defineProps({
        company: Object
    })

    const deleteCompany = id => {
        Inertia.delete(route('company.destroy', { company: id }), {
            onBefore: () => confirm('本当に削除しますか？')
        })
    }

</script>

<template>
    <Head title="企業詳細" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">企業詳細</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="mt-2 mb-8 w-full text-center">
                            <h4 class="px-2 text-xl font-bold text-navy-700 text-3xl">
                                {{ company.name }}
                            </h4>
                            <a :href="company.url" class="hover:underline" target="_blank" rel="noopener noreferrer">{{ company.url }}</a>
                        </div>
                        <div class="grid grid-cols-4 gap-4 px-2 w-full text-center">
                            <div class="flex flex-col justify-center rounded-2xl bg-gray-100 bg-clip-border px-3 py-4 shadow-3xl shadow-shadow-500">
                                <p class="text-sl text-gray-600">採用人数</p>
                                <p class="text-lg font-medium text-navy-700">
                                    {{ company.num_of_hires ? company.num_of_hires + '名' : 'ー' }}
                                </p>
                            </div>

                            <div class="flex flex-col justify-center rounded-2xl bg-gray-100 bg-clip-border px-3 py-4 shadow-3xl shadow-shadow-500">
                                <p class="text-sl text-gray-600">離職率</p>
                                <p class="text-lg font-medium text-navy-700">
                                    {{ company.turnover_rate ? company.turnover_rate + '%' : 'ー' }}
                                </p> 
                            </div>

                            <div class="flex flex-col justify-center rounded-2xl bg-gray-100 bg-clip-border px-3 py-4 shadow-3xl shadow-shadow-500">
                                <p class="text-sl text-gray-600">有給取得率</p>
                                <p class="text-lg font-medium text-navy-700">
                                    {{ company.paid_holidays ? company.paid_holidays + '%' : 'ー'}}
                                </p>
                            </div>

                            <div class="flex flex-col justify-center rounded-2xl bg-gray-100 bg-clip-border px-3 py-4 shadow-3xl shadow-shadow-500">
                                <p class="text-sl text-gray-600">平均年収</p>
                                <p class="text-lg font-medium text-navy-700">
                                    {{ company.annual_income ? company.annual_income + '万円' : 'ー'}}
                                </p>
                            </div>

                            <div class="flex flex-col justify-center rounded-2xl bg-gray-100 bg-clip-border px-3 py-4 shadow-3xl shadow-shadow-500">
                                <p class="text-sl text-gray-600">残業時間（月）</p>
                                <p class="text-lg font-medium text-navy-700">
                                    {{ company.work_overtime ? company.work_overtime + '時間' : 'ー'}}
                                </p>
                            </div>

                            <div class="flex flex-col justify-center rounded-2xl bg-gray-100 bg-clip-border px-3 py-4 shadow-3xl shadow-shadow-500">
                                <p class="text-sl text-gray-600">初任給</p>
                                <p class="text-lg font-medium text-navy-700">
                                    {{ company.starting_salary ? company.starting_salary + '万円' : 'ー'}}
                                </p>
                            </div>

                            <div class="flex flex-col justify-center rounded-2xl bg-gray-100 bg-clip-border px-3 py-4 shadow-3xl shadow-shadow-500">
                                <p class="text-sl text-gray-600">週休</p>
                                <p class="text-lg font-medium text-navy-700">
                                    {{ company.week_off ? company.week_off : 'ー'}}
                                </p>
                            </div>
                        </div>
                        <div class="grid gap-4 px-2 py-5 w-full text-left">
                            <div class="flex flex-col justify-center rounded-2xl bg-gray-100 bg-clip-border px-3 py-4 shadow-3xl shadow-shadow-500">
                                <p class="text-sl text-gray-600 px-5">メモ</p>
                                <div class="text-lg text-navy-700 px-5">
                                    <span v-if="company.memo" v-html="company.memo.replace(/\n/g,'<br/>')"></span>
                                    <span v-else>ー</span>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 w-full mt-7 flex justify-center">
                            <Link :href="route('company.index')" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-xm mr-5"><i class="fa-solid fa-arrow-rotate-left mr-1"></i>戻る</Link>
                            <Link :href="route('company.edit', { id: company.id })" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-xm mr-5"><i class="fa-solid fa-pen-to-square mr-1"></i>編集</Link>
                            <button @click="deleteCompany(company.id)" class="text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-xm delete-confirm mr-5"><i class="fa-solid fa-trash mr-1"></i>削除</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>