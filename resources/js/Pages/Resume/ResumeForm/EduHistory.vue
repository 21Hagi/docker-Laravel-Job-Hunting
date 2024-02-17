<script setup>
    const props = defineProps(['formData']);
    
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
                            <span class="font-bold text-lg">学歴</span>
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
                                学歴１
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300">
                            <input type="number" id="edu_history1_year" name="edu_history1_year" v-model="props.formData.edu_history1.year" autocomplete="off" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="edu_history1_year" class="text-sm text-gray-600 ml-1 mr-2">年</label>
                            <input type="number" id="edu_history1_month" name="edu_history1_month" v-model="props.formData.edu_history1.month" autocomplete="off" class="w-12 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="edu_history1_month" class="text-sm text-gray-600 ml-1 mr-10">月</label>
                            <input type="text" id="edu_history1" name="edu_history1" v-model="props.formData.edu_history1.history" autocomplete="off" class="w-[600px] bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                学歴２
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300">
                            <input type="number" id="edu_history2_year" name="edu_history2_year" v-model="props.formData.edu_history2.year" autocomplete="off" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="edu_history2_year" class="text-sm text-gray-600 ml-1 mr-2">年</label>
                            <input type="number" id="edu_history2_month" name="edu_history2_month" v-model="props.formData.edu_history2.month" autocomplete="off" class="w-12 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="edu_history2_month" class="text-sm text-gray-600 ml-1 mr-10">月</label>
                            <input type="text" id="edu_history2" name="edu_history2" v-model="props.formData.edu_history2.history" autocomplete="off" class="w-[600px] bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                学歴３
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300">
                            <input type="number" id="edu_history3_year" name="edu_history3_year" v-model="props.formData.edu_history3.year" autocomplete="off" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="edu_history3_year" class="text-sm text-gray-600 ml-1 mr-2">年</label>
                            <input type="number" id="edu_history3_month" name="edu_history3_month" v-model="props.formData.edu_history3.month" autocomplete="off" class="w-12 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="edu_history3_month" class="text-sm text-gray-600 ml-1 mr-10">月</label>
                            <input type="text" id="edu_history3" name="edu_history3" v-model="props.formData.edu_history3.history" autocomplete="off" class="w-[600px] bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                学歴４
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300">
                            <input type="number" id="edu_history4_year" name="edu_history4_year" v-model="props.formData.edu_history4.year" autocomplete="off" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="edu_history4_year" class="text-sm text-gray-600 ml-1 mr-2">年</label>
                            <input type="number" id="edu_history4_month" name="edu_history4_month" v-model="props.formData.edu_history4.month" autocomplete="off" class="w-12 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="edu_history4_month" class="text-sm text-gray-600 ml-1 mr-10">月</label>
                            <input type="text" id="edu_history4" name="edu_history4" v-model="props.formData.edu_history4.history" autocomplete="off" class="w-[600px] bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                学歴５
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300">
                            <input type="number" id="edu_history5_year" name="edu_history5_year" v-model="props.formData.edu_history5.year" autocomplete="off" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="edu_history5_year" class="text-sm text-gray-600 ml-1 mr-2">年</label>
                            <input type="number" id="edu_history5_month" name="edu_history5_month" v-model="props.formData.edu_history5.month" autocomplete="off" class="w-12 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="edu_history5_month" class="text-sm text-gray-600 ml-1 mr-10">月</label>
                            <input type="text" id="edu_history5" name="edu_history5" v-model="props.formData.edu_history5.history" autocomplete="off" class="w-[600px] bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                学歴６
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300">
                            <input type="number" id="edu_history6_year" name="edu_history6_year" v-model="props.formData.edu_history6.year" autocomplete="off" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="edu_history6_year" class="text-sm text-gray-600 ml-1 mr-2">年</label>
                            <input type="number" id="edu_history6_month" name="edu_history6_month" v-model="props.formData.edu_history6.month" autocomplete="off" class="w-12 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="edu_history6_month" class="text-sm text-gray-600 ml-1 mr-10">月</label>
                            <input type="text" id="edu_history6" name="edu_history6" v-model="props.formData.edu_history6.history" autocomplete="off" class="w-[600px] bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                学歴7
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300">
                            <input type="number" id="edu_history7_year" name="edu_history7_year" v-model="props.formData.edu_history7.year" autocomplete="off" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="edu_history7_year" class="text-sm text-gray-600 ml-1 mr-2">年</label>
                            <input type="number" id="edu_history7_month" name="edu_history7_month" v-model="props.formData.edu_history7.month" autocomplete="off" class="w-12 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="edu_history7_month" class="text-sm text-gray-600 ml-1 mr-10">月</label>
                            <input type="text" id="edu_history7" name="edu_history7" v-model="props.formData.edu_history7.history" autocomplete="off" class="w-[600px] bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                学歴８
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300">
                            <input type="number" id="edu_history8_year" name="edu_history8_year" v-model="props.formData.edu_history8.year" autocomplete="off" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="edu_history8_year" class="text-sm text-gray-600 ml-1 mr-2">年</label>
                            <input type="number" id="edu_history8_month" name="edu_history8_month" v-model="props.formData.edu_history8.month" autocomplete="off" class="w-12 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="edu_history8_month" class="text-sm text-gray-600 ml-1 mr-10">月</label>
                            <input type="text" id="edu_history8" name="edu_history8" v-model="props.formData.edu_history8.history" autocomplete="off" class="w-[600px] bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                学歴９
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300">
                            <input type="number" id="edu_history9_year" name="edu_history9_year" v-model="props.formData.edu_history9.year" autocomplete="off" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="edu_history9_year" class="text-sm text-gray-600 ml-1 mr-2">年</label>
                            <input type="number" id="edu_history9_month" name="edu_history9_month" v-model="props.formData.edu_history9.month" autocomplete="off" class="w-12 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="edu_history9_month" class="text-sm text-gray-600 ml-1 mr-10">月</label>
                            <input type="text" id="edu_history9" name="edu_history9" v-model="props.formData.edu_history9.history" autocomplete="off" class="w-[600px] bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                学歴１０
                            </p>
                        </th>
                        <td class="p-4">
                            <input type="number" id="edu_history10_year" name="edu_history10_year" v-model="props.formData.edu_history10.year" autocomplete="off" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="edu_history10_year" class="text-sm text-gray-600 ml-1 mr-2">年</label>
                            <input type="number" id="edu_history10_month" name="edu_history10_month" v-model="props.formData.edu_history10.month" autocomplete="off" class="w-12 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="edu_history10_month" class="text-sm text-gray-600 ml-1 mr-10">月</label>
                            <input type="text" id="edu_history10" name="edu_history10" v-model="props.formData.edu_history10.history" autocomplete="off" class="w-[600px] bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</template>