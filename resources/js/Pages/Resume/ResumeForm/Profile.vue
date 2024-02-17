<script setup>
    import { defineProps, onMounted } from 'vue';
    import { calculateAge } from '@/common';
    import * as AutoKana from 'vanilla-autokana';

    const props = defineProps(['formData']);

    const updateAge = () => {
        props.formData.age = calculateAge(props.formData.birth_year, props.formData.birth_month, props.formData.birth_day)
    };
    
    let autokanaLastName;
    let autokanaFirstName;
    onMounted(() => {
        autokanaLastName = AutoKana.bind("#kanji_last_name", "#furigana_last_name");
        autokanaFirstName = AutoKana.bind("#kanji_first_name", "#furigana_first_name");
    });

    const handleLastNameInput = () => {
        props.formData.furigana_last_name = autokanaLastName.getFurigana();
    };

    const handleFirstNameInput =  () => {
        props.formData.furigana_first_name = autokanaFirstName.getFurigana();
    };

    const clearFormData = () => {
        Object.keys(props.formData).forEach(key => {
            props.formData[key] = '';
        });
    };
</script>

<template>
    <section class="text-gray-600 body-font">
        <div class="mb-2">
            <table class="w-full text-left table-auto min-w-max">
                <tbody>
                    <tr>
                        <td class="p-4 border-b border-gray-200 bg-blue-gray-100 flex justify-between">
                            <span class="font-bold text-lg">基本情報</span>
                            <button class="text-sm hover:underline" @click="clearFormData"><i class="fa-solid fa-xmark mr-1"></i>リセットする</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="relative flex flex-col w-full h-full text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
            <table class="w-full text-left min-w-max">
                <tbody>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-100 rounded-tl-xl w-52">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                氏名
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300 flex">
                            <div class="flex flex-col mr-4 w-56">
                                <label for="kanji_last_name" class="text-sm text-gray-600">姓</label>
                                <input type="text" id="kanji_last_name" name="kanji_last_name" v-model="props.formData.kanji_last_name" @input="handleLastNameInput" autocomplete="off" class="bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            <div class="flex flex-col w-56">
                                <label for="kanji_first_name" class="text-sm text-gray-600">名</label>
                                <input type="text" id="kanji_first_name" name="kanji_first_name" v-model="props.formData.kanji_first_name" @input="handleFirstNameInput" autocomplete="off" class="bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                ふりがな
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300 flex">
                            <div class="flex flex-col mr-4 w-56">
                                <label for="furigana_last_name" class="text-sm text-gray-600">せい</label>
                                <input type="text" id="furigana_last_name" name="furigana_last_name" v-model="props.formData.furigana_last_name" autocomplete="off" class="bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            <div class="flex flex-col w-56">
                                <label for="furigana_first_name" class="text-sm text-gray-600">めい</label>
                                <input type="text" id="furigana_first_name" name="furigana_first_name" v-model="props.formData.furigana_first_name"  autocomplete="off" class="bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                生年月日
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300">
                            <input type="number" id="birth_year" name="birth_year" v-model="props.formData.birth_year" @input="updateAge" autocomplete="off" class="w-24 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="birth_year" class="text-sm text-gray-600 ml-1 mr-2">年</label>
                            <input type="number" id="birth_month" name="birth_month" v-model="props.formData.birth_month" @input="updateAge" autocomplete="off" class="w-16 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="birth_month" class="text-sm text-gray-600 ml-1 mr-2">月</label>
                            <input type="number" id="birth_day" name="birth_day" v-model="props.formData.birth_day" @input="updateAge" autocomplete="off" class="w-16 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="bi_day" class="text-sm text-gray-600 ml-1 mr-2">日</label>
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                年齢
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300">
                            <input type="number" id="age" name="age" v-model="props.formData.age" maxlength="3" autocomplete="off" class="w-16 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="age" class="text-sm text-gray-600 ml-1 mr-2">歳</label>
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                性別
                            </p>
                        </th>
                        <td class="p-4">
                            <input type="radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2" value="1" name="gender" v-model="props.formData.gender">
                            <span class="ml-1 mr-3">男性</span>
                            <input type="radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2" value="2" name="gender" v-model="props.formData.gender">
                            <span class="ml-1 mr-3">女性</span>
                            <input type="radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2" value="3" name="gender" v-model="props.formData.gender">
                            <span class="ml-1">指定しない</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</template>

