<script setup>
    import { ref, onMounted, watch } from 'vue';
  
    const props = defineProps(['interviews', 'interviewsSetup']);

    const currentIndex = ref(0);
    const voiceIndex = ref(178); 

    const currentQuestion = ref(null);

    const duringInterview = ref(false);
    const showStartButton = ref(true);
    const showStopButton = ref(false);
    const showMicrophoneIcon = ref(false);

    const synthesis = window.speechSynthesis;
    let voices = ref([]);
    const recognition = new webkitSpeechRecognition();
    recognition.continuous = true;
    recognition.interimResults = true;
    recognition.lang = 'ja-JP';

    onMounted(() => {
        synthesis.onvoiceschanged = () => {
            voices = synthesis.getVoices();
        };
    });

    // 面接開始
    function startInterview() {
        currentIndex.value = 0;
        showStartButton.value = false;
        showStopButton.value = true;
        duringInterview.value = true;
        createQuestion();
        speakQuestions();
    }

    // 面接停止
    function stopInterview() {
        synthesis.cancel();
        recognition.stop();
        resetInterviewState();
    }

    // 面接条件をリセット
    function resetInterviewState() {
        showStartButton.value = true;
        showStopButton.value = false;
        showMicrophoneIcon.value = false;
        currentIndex.value = 0;
        currentQuestion.value = '';
        duringInterview.value = false;
    }

    // 面接文を生成
    function createQuestion() {
        if (currentIndex.value < props.interviews.length) {
            currentQuestion.value = props.interviews[currentIndex.value].question;
        } else {
            finishInterview();
        }
    }

    // 音声読み上げを開始
    function speakQuestions() {
        if (currentQuestion.value) {
            const utterance = new SpeechSynthesisUtterance(currentQuestion.value);
            const japaneseVoices = voices.filter(voice => voice.lang.startsWith('ja'));
            utterance.voice = japaneseVoices[props.interviewsSetup.voice_num];
            synthesis.speak(utterance);
            utterance.onend = () => {
                startRecognition();
            };
        }
    }

    // 音声認識を開始
    function startRecognition() {
        if (!duringInterview.value) return;

        const timeoutThreshold = 2000;
        let lastResultTime = Date.now();
        let timeoutID;
        let manualOnEndCalled = false;
        showMicrophoneIcon.value = true;

        recognition.onresult = () => {
            lastResultTime = Date.now();
        };  
        
        recognition.onend = () => {
            if (manualOnEndCalled) {
                clearTimeout(timeoutID);
                nextQuestion();
                showMicrophoneIcon.value = false;
                manualOnEndCalled = false;
            }
        };

        // タイムアウト監視
        const checkTimeout = () => {
            if (Date.now() - lastResultTime > timeoutThreshold) {
                if (!manualOnEndCalled) {
                    manualOnEndCalled = true;
                    recognition.stop();
                };
            } else {
                timeoutID = setTimeout(checkTimeout, 1000);
            }
        };

        recognition.start();
        timeoutID = setTimeout(checkTimeout, 1000);
    }

    // 次の質問を出す
    function nextQuestion() {
        currentIndex.value++;
        createQuestion();
        if (currentQuestion.value) {
            speakQuestions();
        } 
    }

    // 面接終了
    function finishInterview() {
        currentQuestion.value = "本日は以上となります。ありがとうございました。";
        const utterance = new SpeechSynthesisUtterance(currentQuestion.value);
        const japaneseVoices = voices.filter(voice => voice.lang.startsWith('ja'));
        utterance.voice = japaneseVoices[props.interviewsSetup.voice_num];
        synthesis.speak(utterance);
        resetInterviewState();
    }

    watch(currentIndex, (newIndex) => {
        if (newIndex >= props.interviews.length) {
            finishInterview();
        }
    });
</script>

<template>
    <div class="flex flex-col flex-grow w-full max-w-xl bg-white shadow-xl rounded-lg overflow-hidden h-full">
        <div class="w-full h-[420px] max-w-xl bg-black overflow-hidden">
            <div class="text-9xl text-white text-center pt-[140px]">
                <i class="fa-solid fa-user"></i>
            </div>
        </div>
        <div class="px-5 py-4">
            <span id="textToRead" class="hidden"></span>
        </div>
        <div class="mx-auto pb-6">
            <button v-show="showStartButton" @click="startInterview" class="text-red-600 text-4xl">
                <i class="fa-solid fa-circle-play"></i>
            </button>
            <button v-show="showStopButton" @click="stopInterview" class="text-red-600 text-4xl">
                <i class="fa-solid fa-circle-stop"></i>
            </button>
        </div>
        <div>
            <button v-show="showMicrophoneIcon" class="float-right pr-5 text-2xl text-red-600">
                <i class="fa-solid fa-microphone"></i>
            </button>
        </div>
    </div>
</template>
