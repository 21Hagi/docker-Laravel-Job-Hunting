<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, Link } from '@inertiajs/vue3';
    import { reactive } from 'vue';
    import { Inertia } from '@inertiajs/inertia';
    import InputError from '@/Components/InputError.vue';

    const props = defineProps({
        interview: Object,
        errors: Object
    })

    const form = reactive({
        id: props.interview.id,
        title: props.interview.title,
        question: props.interview.question
    })

    const updateQuestion = () => {
        Inertia.put(route('interview.update', { interview: form.id }), form);
    }

    const deleteQuestion = () => {
        Inertia.delete(route('interview.destroy', { interview: form.id }), {
            onBefore: () => confirm('本当に削除しますか？')
        })
    }
</script>

<template>
    <Head title="質問編集" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">質問編集</h2>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray overflow-hidden shadow-sm sm:rounded-lg mx-auto w-2/3">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div>
                            <div class="p-2 w-2/3 mx-auto">
                                <div class="relative">
                                    <label for="title" class="leading-7 text-sm text-gray-600">タイトル<span class="bg-red-700 text-white rounded-lg px-1 m-2 tracking-widest">必須</span></label>
                                    <input type="text" id="title" name="title" v-model="form.title" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <InputError :message="props.errors.title"></InputError>
                                </div>
                                <div class="relative">
                                    <label for="question" class="leading-7 text-sm text-gray-600">質問内容<span class="bg-red-700 text-white rounded-lg px-1 m-2 tracking-widest">必須</span></label>
                                    <textarea type="text" id="question" name="question" v-model="form.question" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out min-h-[120px]"></textarea>
                                    <InputError :message="props.errors.question"></InputError>
                                </div>
                                <div class="p-2 w-full mt-4 flex justify-around">
                                    <Link :href="route('interview.setting')" class="bg-gray-200 border-0 py-2 px-6 focus:outline-none hover:bg-gray-400 rounded text-base"><i class="fa-solid fa-arrow-rotate-left mr-2"></i>戻る</Link>
                                    <button id="interviewUpdate" @click="updateQuestion" type="button" class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-base"><i class="fa-solid fa-pen-to-square mr-2"></i>更新</button>
                                    <button id="interviewDelete" @click="deleteQuestion" type="button" class="text-white bg-red-600 border-0 py-2 px-6 focus:outline-none hover:bg-red-700 rounded text-base"><i class="fa-solid fa-trash mr-2"></i>削除</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
