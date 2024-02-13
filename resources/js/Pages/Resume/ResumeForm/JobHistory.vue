<script setup>
    const props = defineProps(['formData']);
</script>
<template>
    <section class="text-gray-600 body-font">
        <div class="mb-2">
            <table class="w-full text-left table-auto min-w-max">
                <tbody>
                    <tr>
                        <td class="p-4 border-b border-gray-200 bg-blue-gray-100">
                            <span class="font-bold text-lg">職歴</span>
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
                                職歴１
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300">
                            <input type="number" id="job_history1_year" v-model="props.formData.job_history1.year" autocomplete="off" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="job_history1_year" class="text-sm text-gray-600 ml-1 mr-2">年</label>
                            <input type="number" id="job_history1_month" v-model="props.formData.job_history1.month" autocomplete="off" class="w-12 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="job_history1_month" class="text-sm text-gray-600 ml-1 mr-10">月</label>
                            <input type="text" id="job_history1" v-model="props.formData.job_history1.history" autocomplete="off" class="w-[600px] bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                職歴２
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300">
                            <input type="number" id="job_history2_year" v-model="props.formData.job_history2.year" autocomplete="off" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="job_history2_year" class="text-sm text-gray-600 ml-1 mr-2">年</label>
                            <input type="number" id="job_history2_month" v-model="props.formData.job_history2.month" autocomplete="off" class="w-12 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="job_history2_month" class="text-sm text-gray-600 ml-1 mr-10">月</label>
                            <input type="text" id="job_history2" v-model="props.formData.job_history2.history" autocomplete="off" class="w-[600px] bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                職歴３
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300">
                            <input type="number" id="job_history3_year" v-model="props.formData.job_history3.year" autocomplete="off" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="job_history3_year" class="text-sm text-gray-600 ml-1 mr-2">年</label>
                            <input type="number" id="job_history3_month" v-model="props.formData.job_history3.month" autocomplete="off" class="w-12 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="job_history3_month" class="text-sm text-gray-600 ml-1 mr-10">月</label>
                            <input type="text" id="job_history3" v-model="props.formData.job_history3.history" autocomplete="off" class="w-[600px] bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                職歴４
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300">
                            <input type="number" id="job_history4_year"  v-model="props.formData.job_history4.year" autocomplete="off" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="job_history4_year" class="text-sm text-gray-600 ml-1 mr-2">年</label>
                            <input type="number" id="job_history4_month" v-model="props.formData.job_history4.month" autocomplete="off" class="w-12 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="job_history4_month" class="text-sm text-gray-600 ml-1 mr-10">月</label>
                            <input type="text" id="job_history4" v-model="props.formData.job_history4.history" autocomplete="off" class="w-[600px] bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                職歴５
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300">
                            <input type="number" id="job_history5_year"  v-model="props.formData.job_history5.year" autocomplete="off" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="job_history5_year" class="text-sm text-gray-600 ml-1 mr-2">年</label>
                            <input type="number" id="job_history5_month" v-model="props.formData.job_history5.month" autocomplete="off" class="w-12 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="job_history5_month" class="text-sm text-gray-600 ml-1 mr-10">月</label>
                            <input type="text" id="job_history5" v-model="props.formData.job_history5.history" autocomplete="off" class="w-[600px] bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                職歴６
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300">
                            <input type="number" id="job_history6_year" v-model="props.formData.job_history6.year" autocomplete="off" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="job_history6_year" class="text-sm text-gray-600 ml-1 mr-2">年</label>
                            <input type="number" id="job_history6_month" v-model="props.formData.job_history6.month" autocomplete="off" class="w-12 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="job_history6_month" class="text-sm text-gray-600 ml-1 mr-10">月</label>
                            <input type="text" id="job_history6" v-model="props.formData.job_history6.history" autocomplete="off" class="w-[600px] bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                職歴7
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300">
                            <input type="number" id="job_history7_year" v-model="props.formData.job_history7.year" autocomplete="off" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="job_history7_year" class="text-sm text-gray-600 ml-1 mr-2">年</label>
                            <input type="number" id="job_history7_month" v-model="props.formData.job_history7.month" autocomplete="off" class="w-12 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="job_history7_month" class="text-sm text-gray-600 ml-1 mr-10">月</label>
                            <input type="text" id="job_history7" v-model="props.formData.job_history7.history" autocomplete="off" class="w-[600px] bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                職歴８
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300">
                            <input type="number" id="job_history8_year" v-model="props.formData.job_history8.year" autocomplete="off" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="job_history8_year" class="text-sm text-gray-600 ml-1 mr-2">年</label>
                            <input type="number" id="job_history8_month" v-model="props.formData.job_history8.month" autocomplete="off" class="w-12 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="job_history8_month" class="text-sm text-gray-600 ml-1 mr-10">月</label>
                            <input type="text" id="job_history8" v-model="props.formData.job_history8.history" autocomplete="off" class="w-[600px] bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                職歴９
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300">
                            <input type="number" id="job_history9_year" v-model="props.formData.job_history9.year" autocomplete="off" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="job_history9_year" class="text-sm text-gray-600 ml-1 mr-2">年</label>
                            <input type="number" id="job_history9_month" v-model="props.formData.job_history9.month" autocomplete="off" class="w-12 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="job_history9_month" class="text-sm text-gray-600 ml-1 mr-10">月</label>
                            <input type="text" id="job_history9"  v-model="props.formData.job_history9.history" autocomplete="off" class="w-[600px] bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                職歴１０
                            </p>
                        </th>
                        <td class="p-4">
                            <input type="number" id="job_history10_year" v-model="props.formData.job_history10.year" autocomplete="off" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="job_history10_year" class="text-sm text-gray-600 ml-1 mr-2">年</label>
                            <input type="number" id="job_history10_month" v-model="props.formData.job_history10.month" autocomplete="off" class="w-12 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="job_history10_month" class="text-sm text-gray-600 ml-1 mr-10">月</label>
                            <input type="text" id="job_history10" v-model="props.formData.job_history10.history" autocomplete="off" class="w-[600px] bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</template>