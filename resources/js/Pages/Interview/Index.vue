<script setup>
    import { ref } from 'vue';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, Link } from '@inertiajs/vue3';
    import Detail from './Detail.vue';

    let mediaStream = ref(null);
    let mediaRecorder = ref(null);
    let recordedChunks = ref([]);

    const recordingButtonVisible = ref(true);
    const recordingStopButtonVisible = ref(false);

    const props = defineProps({
        interviews: { type:Object, default:null },
        interviewsSetup: { type:Object, default:null },
    });

    const startRecording = () => {
        navigator.mediaDevices.getUserMedia({video: { width: 320, height: 180 }, audio: true})
        .then((stream) => {
            mediaStream.value = stream;
            const video = document.querySelector('video');
            video.srcObject = stream;
            video.play();

            const options = { mimeType: 'video/webm' };
            mediaRecorder.value = new MediaRecorder(stream, options);
            mediaRecorder.value.ondataavailable = handleDataAvailable;
            mediaRecorder.value.start();

            recordingButtonVisible.value = false;
            recordingStopButtonVisible.value = true;
        })
        .catch((error) => {
            console.error('ウェブカメラの取得に失敗しました: ', error);
        });
    };

    const handleDataAvailable = (event) => {
        if (event.data.size > 0) {
            recordedChunks.value.push(event.data);
        }
    };

    const stopRecording = () => {
        if (mediaRecorder.value && mediaStream.value) {
            mediaRecorder.value.stop();
            const videoTracks = mediaStream.value.getVideoTracks();
            const audioTracks = mediaStream.value.getAudioTracks();

            if (videoTracks.length > 0) {
                videoTracks[0].stop();
            }

            if (audioTracks.length > 0) {
                audioTracks[0].stop();
            }

            mediaRecorder.value.onstop = () => {
                const blob = new Blob(recordedChunks.value, { type: 'video/webm' });
                const url = URL.createObjectURL(blob);

                window.open(url, '_blank');

                recordedChunks.value = [];
                mediaStream.value = null;
                mediaRecorder.value = null;
            };
        }
        recordingButtonVisible.value = true;
        recordingStopButtonVisible.value = false;
    };
</script>

<template>
    <Head title="面接" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">面接</h2>
                </div>
                <div>
                    <Link id="settingButton" :href="route('interview.setting')" class="cursor-pointer text-gray-600 bg-gray-200 border-0 py-2 px-4 focus:outline-none hover:bg-gray-300 rounded text-base"><i class="fa-solid fa-gear mr-1"></i>設定</Link>
                </div>
            </div>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-between">
                <div>
                    <div class="border-2 border-black bg-black">
                        <video id="video" class="-scale-x-100 w-[320px] h-[180px]"></video>
                    </div>
                    <div class="mt-4 text-left">
                        <a v-if="recordingButtonVisible" @click="startRecording" id="recordingButton" class="cursor-pointer text-red-600"><i class="fa-regular fa-circle-dot fa-2xl"></i><span class="pl-1">REC</span></a>
                        <a v-if="recordingStopButtonVisible" @click="stopRecording" id="recordingStopButton" class="cursor-pointer text-red-600"><i class="fa-regular fa-circle-stop fa-2xl"></i></a>
                    </div>
                </div>
                <Detail :interviews="props.interviews" :interviewsSetup="props.interviewsSetup" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>