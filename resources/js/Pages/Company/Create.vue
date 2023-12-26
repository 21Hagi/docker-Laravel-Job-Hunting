<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, Link } from '@inertiajs/vue3';
    import { reactive } from 'vue';
    import { Inertia } from '@inertiajs/inertia';
    import InputError from '@/Components/InputError.vue';

    defineProps({
        errors: Object
    })

    const form = reactive({
        name: null, email: null, num_of_hires: null, turnover_rate: null, paid_holidays_rate: null,
        annual_income: null, work_overtime: null, starting_salary: null, week_off: null, url: null, memo: null
    })

    const storeCompany = () => {
        Inertia.post('/company', form)
    }
</script>

<template>
    <Head title="企業新規登録" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">企業新規登録</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray overflow-hidden shadow-sm sm:rounded-lg mx-auto w-2/3">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="storeCompany">
                            <div class="-m-2">
                                <div class="p-2 w-2/3 mx-auto">
                                    <div class="relative">
                                        <label for="name" class="leading-7 text-sm text-gray-600">企業名<span class="bg-red-700 text-white rounded-lg px-1 m-2 tracking-widest">必須</span></label>
                                        <input type="text" id="name" name="name" v-model="form.name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        <InputError :message="errors.name"></InputError>
                                    </div>
                                    <div class="relative">
                                        <label for="email" class="leading-7 text-sm text-gray-600">メールアドレス</label>
                                        <input type="email" id="email" name="email" v-model="form.email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        <InputError :message="errors.email"></InputError>
                                    </div>
                                    <div class="relative">
                                        <label for="num_of_hires" class="leading-7 text-sm text-gray-600">採用人数（人）</label>
                                        <input type="number" min="0" id="num_of_hires" name="num_of_hires" v-model="form.num_of_hires" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        <InputError :message="errors.num_of_hires"></InputError>
                                    </div>
                                    <div class="relative">
                                        <label for="turnover_rate" class="leading-7 text-sm text-gray-600">離職率（%）</label>
                                        <input type="number" min="0" max="100" step="0.1" id="turnover_rate" name="turnover_rate" v-model="form.turnover_rate" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        <InputError :message="errors.turnover_rate"></InputError>
                                    </div>
                                    <div class="relative">
                                        <label for="paid_holidays" class="leading-7 text-sm text-gray-600">有給取得率（%）</label>
                                        <input type="number" min="0" max="100" step="0.01" id="paid_holidays_rate" name="paid_holidays_rate" v-model="form.paid_holidays_rate" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        <InputError :message="errors.paid_holidays_rate"></InputError>
                                    </div>
                                    <div class="relative">
                                        <label for="annual_income" class="leading-7 text-sm text-gray-600">平均年収（万円）</label>
                                        <input type="number" id="annual_income" name="annual_income" v-model="form.annual_income" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        <InputError :message="errors.annual_income"></InputError>
                                    </div>
                                    <div class="relative">
                                        <label for="work_overtime" class="leading-7 text-sm text-gray-600">残業[月]（時間）</label>
                                        <input type="number" min="0" step="0.1" id="work_overtime" name="work_overtime" v-model="form.work_overtime" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        <InputError :message="errors.work_overtime"></InputError>
                                    </div>
                                    <div class="relative">
                                        <label for="starting_salary" class="leading-7 text-sm text-gray-600">初任給（万円）</label>
                                        <input type="number" min="15" id="starting_salary" name="starting_salary" v-model="form.starting_salary" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        <InputError :message="errors.starting_salary"></InputError>
                                    </div>
                                    <div class="relative">
                                        <label for="week_off" class="leading-7 text-sm text-gray-600">週休</label>
                                        <input type="text" id="week_off" name="week_off" v-model="form.week_off" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        <InputError :message="errors.week_off"></InputError>
                                    </div>
                                    <div class="relative">
                                        <label for="url" class="leading-7 text-sm text-gray-600">URL</label>
                                        <input type="url" id="url" name="url" v-model="form.url" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        <InputError :message="errors.url"></InputError>
                                    </div>
                                    <div class="relative">
                                        <label for="memo" class="leading-7 text-sm text-gray-600">メモ</label>
                                        <textarea type="text" id="memo" name="memo" v-model="form.memo" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out min-h-[120px]"></textarea>
                                        <InputError :message="errors.memo"></InputError>
                                    </div>
                                    <div class="p-2 w-full mt-4 flex justify-around">
                                        <Link :href="route('company.index')" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-xm"><i class="fa-solid fa-arrow-rotate-left pr-1"></i>戻る</Link>
                                        <button class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-xm"><i class="fa-solid fa-plus pr-1"></i>登録</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
