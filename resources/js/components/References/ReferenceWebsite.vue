<template>
    <div>
        <!-- STEP 1 -->
        <div class="step-1" v-if="currentActiveStep === 1">
            <reference-first-step @selected-result="filteredResult"></reference-first-step>
        </div>

        <!-- STEP 2 -->
        <div class="step-2" v-if="currentActiveStep === 2">
           <reference-second-step :selectedResult="selectedResult"></reference-second-step>
        </div>

        <!-- STEP 3 -->
        <div class="step-3" v-if="currentActiveStep === 3">
            <reference-third-step :selectedResult="selectedResult" @current-active-step="changeCurrentActiveTab"></reference-third-step>
        </div>

        <!-- STEP 4 -->
        <div class="step-4" v-if="currentActiveStep === 4">
            <citation-list></citation-list>
        </div>

        <div class="prev-next-btns d-flex justify-content-between mt-4">
             <button v-if="currentActiveStep !== 1 && currentActiveStep !== 4" @click="currentActiveStep--"><i class="fa fa-arrow-left mr-1"></i> Prev</button>

             <button v-if="currentActiveStep === 2" @click="currentActiveStep++">Next <i class="fa fa-arrow-right ml-1"></i></button>

        </div>

    </div>
</template>

<script>

import ReferenceFirstStep from "./ReferenceSteps/ReferenceFirstStep.vue";
import ReferenceSecondStep from "./ReferenceSteps/ReferenceSecondStep.vue";
import ReferenceThirdStep from "./ReferenceSteps/ReferenceThirdStep.vue";
import CitationList from './CitationList/CitationList.vue';


export default {
    components: {
        ReferenceFirstStep,
        ReferenceSecondStep,
        ReferenceThirdStep,
        CitationList
    },
    data() {
        return {
            currentActiveStep: 1,
            selectedResult: '',
            completeCitationList: [],
        }
    },
    methods: {
        changeStep(activeStep) {
            this.currentActiveStep = activeStep;
        },
        filteredResult(result) {
           this.selectedResult = result;
           this.currentActiveStep++;
        },
        changeCurrentActiveTab() {
            this.currentActiveStep++;
            this.$emit('active-tab', 'citation-list');
            this.$emit('active-citation-list-tab', 'website-citation');
        }
    }
}
</script>

<style scoped>
    .prev-next-btns button{
        color: #f5b427;
        background: none;
        border: none;
        cursor: pointer;
        padding: 0px;
    }

</style>
