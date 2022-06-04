<template>
    <div>
         <!-- STEP 1 -->
        <div class="step-1" v-if="currentActiveStep === 1">
            <reference-book-first @selected-result="filteredResult"></reference-book-first>
        </div>

        <!-- STEP 2 -->
        <div class="step-2" v-if="currentActiveStep === 2">
              <reference-book-second :selectedResult="selectedResult"></reference-book-second>
        </div>

        <!-- STEP 3 -->
        <div class="step-3" v-if="currentActiveStep === 3">
              <reference-book-third :selectedResult="selectedResult" @current-active-step="changeCurrentActiveTab"></reference-book-third>
        </div>

           <div class="prev-next-btns d-flex justify-content-between mt-4">
             <button v-if="currentActiveStep !== 1 && currentActiveStep !== 4" @click="currentActiveStep--"><i class="fa fa-arrow-left mr-1"></i> Prev</button>

             <button v-if="currentActiveStep === 2" @click="currentActiveStep++">Next <i class="fa fa-arrow-right ml-1"></i></button>

        </div>

    </div>
</template>

<script>
import ReferenceBookFirst from './ReferenceBookFirst.vue';
import ReferenceBookSecond from './ReferenceBookSecond.vue';
import ReferenceBookThird from './ReferenceBookThird.vue';

export default {
    components: {
        ReferenceBookFirst,
        ReferenceBookSecond,
        ReferenceBookThird
    },
    data() {
        return {
            selectedResult: '',
            currentActiveStep: 1,
        }
    },
    methods: {
        filteredResult(result) {
           this.selectedResult = result;
           this.currentActiveStep++;
        },
        changeCurrentActiveTab() {
            this.currentActiveStep++;
            this.$emit('active-tab', 'citation-list');
            this.$emit('active-citation-list-tab', 'book-citation');
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

