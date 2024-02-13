<script setup>
    import { ref, onMounted } from 'vue';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, Link } from '@inertiajs/vue3';
    import draggable from 'vuedraggable';
    import axios from 'axios';
    import FlashMessage from '@/Components/FlashMessage.vue';

    const props = defineProps({
        questions: Object,
        interviewsSetup: Object
    })

    const voiceNum = ref(props.interviewsSetup ? props.interviewsSetup.voice_num ?? 0 : 0);
    const randomListNum = ref(props.interviewsSetup ? props.interviewsSetup.num_of_random_list ?? 0 : 0);

    const sortList = ref([...props.questions.sortList]);
    const randomList = ref([...props.questions.randomList]);
    const invisibleList = ref([...props.questions.invisibleList]);

    // リストを変更
    const updateListOrder = async (listName, newList) => {
        try {
            const newOrder = newList.map(item => item.id);
            const data = {listName, newOrder};
            const response = await axios.post('/interview/orderListUpdate', data);

            if (response.status !== 200) {
                console.log('更新に失敗しました。', response.data);
            }
        } catch (error) {
            console.error('更新中にエラーが発生しました。', error);
        }
    };

    const handleListAddition = (listName, newList, event) => {
        updateListOrder(listName, [newList[event.newIndex]]);
    };

    // 面接設定を更新
    const saveListSetup = async () => {
        try {
            const setupData = {
                voice_num: voiceNum.value,
                num_of_random_list: randomListNum.value,
            }
            const setupResponse = await axios.post('/interview/setupUpdateOrCreate', setupData);

            if (setupResponse.status !== 200) {
                console.log('更新に失敗しました。', setupResponse.data);
            }
        } catch (error) {
            console.error('更新中にエラーが発生しました。', error);
        }
    }

    const voices = ref([]);
    const japaneseVoices = ref([]);

    const fetchVoices = () => {
        voices.value = speechSynthesis.getVoices();
        japaneseVoices.value = voices.value.filter(voice => voice.lang.startsWith('ja'));
    };

    onMounted(() => {
        fetchVoices();
        if (speechSynthesis.onvoiceschanged !== undefined) {
            speechSynthesis.onvoiceschanged = fetchVoices;
        }
    });
</script>
<template>
    <Head title="面接設定" />

    <AuthenticatedLayout>
        <template #header>
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">面接設定</h2>
                <div class="lg:flex lg:justify-around">
                    <div class="flex gap-x-10">
                        <div class="mr-3">
                            <label class="text-sm font-medium text-gray-900 dark:text-white text-sm">ランダムリスト 質問数</label>
                            <input id="randomListNum" type="number" v-model="randomListNum" @input="saveListSetup" min="0" class="text-center mr-4 bg-gray-50 border border-gray-300 text-gray-900 text-sl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full h-10">
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-900 dark:text-white text-sm">話者</label>
                            <select v-model="voiceNum" @change="saveListSetup" class="text-center mr-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full h-10">
                                <option v-for="(voice, index) in japaneseVoices" :key="voice.name" :value="index">{{ voice.name }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <FlashMessage />
                        <div class="flex justify-around">                 
                            <div class="w-[400px]">
                                <div>
                                    <span>質問リスト</span>       
                                    <draggable v-model="sortList" item-key="id" @sort="updateListOrder('sortList', sortList)" tag="ul" group="lists" :sort="true" class="border border-2 rounded-lg min-h-[35px]">
                                        <template #item="{ element, index }">
                                            <li class="w-full px-4 py-1 hover:bg-gray-200 rounded-lg">
                                                <span class="mr-2">{{ index + 1 }}.</span>
                                                <Link class="hover:underline" :href="route('interview.edit', { id: element.id })">{{ element.title }}</Link>
                                            </li>
                                        </template>
                                    </draggable>
                                </div>
                                <div class="mt-5">
                                    <div>
                                        <span class="mr-1">ランダム質問リスト</span>
                                        <Link :href="`/interview/create/randomList`" class="text-xm text-indigo-500 randomCreateButton"><i class="fa-solid fa-circle-plus"></i></Link>     
                                    </div>
                                    <div>
                                        <draggable v-model="randomList" item-key="id" @add="handleListAddition('randomList', randomList, $event)" tag="ul" group="lists" class="columns-2 border border-2 rounded-lg min-h-[35px]">
                                            <template #item="{ element }">
                                                <li class="w-full px-4 py-1 hover:bg-gray-200 rounded-lg">
                                                    <Link class="hover:underline" :href="route('interview.edit', { id: element.id })">{{ element.title }}</Link>
                                                </li>
                                            </template>
                                        </draggable>
                                    </div>
                                </div>
                            </div>
                            <div class="w-[400px]">
                                <div>
                                    <span class="mr-1">非表示にする質問リスト</span>  
                                    <Link :href="`/interview/create/invisibleList`" class="text-xm text-indigo-500 invisibleCreateButton"><i class="fa-solid fa-circle-plus"></i></Link>
                                </div>
                                <div>
                                    <draggable v-model="invisibleList" item-key="id" @add="handleListAddition('invisibleList', invisibleList, $event)" tag="ul" group="lists" class="columns-2 border border-2 rounded-lg min-h-[35px]">
                                        <template #item="{ element }">
                                            <li class="w-full px-4 py-1 hover:bg-gray-200 rounded-lg">
                                                <Link class="hover:underline" :href="route('interview.edit', { id: element.id })">{{ element.title }}</Link>
                                            </li>
                                        </template>
                                    </draggable>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-8">
                            <Link :href="route('interview.index')" class="bg-gray-200 border-0 py-2 px-6 focus:outline-none hover:bg-gray-400 rounded text-base text-gray-600"><i class="fa-solid fa-arrow-rotate-left mr-2"></i>戻る</Link>
                        </div>       
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
