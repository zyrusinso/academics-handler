<template>
    <div class="citation-list">
        <citation-dialog v-if="updateRecord" @close="updateRecord = false">
            <report-citation-update-form :updateCitationRecord="updateCitationRecord" @record-updated="recordUpdated"></report-citation-update-form>
        </citation-dialog>
            <div v-if="reportCitationList.length !== 0">
                 <report-citation-item v-for="citeList in reportCitationList"
                        :key="citeList.reportId"
                        :citeList="citeList"
                        @filteredList="getCitationFromStorage"
                        @update-cite="updateCite"
                        @record-deleted="recordDeleted"
                        ></report-citation-item>
            </div>
            <div v-else>
                <h6>No Citations Found.</h6>
            </div>
    </div>

</template>

<script>
import CitationDialog from '../CitationDialog.vue';
import ReportCitationItem from './ReportCitationItem.vue';
import ReportCitationUpdateForm from './ReportCitationUpdateForm.vue';

export default {
    components: {
        ReportCitationItem,
        CitationDialog,
        ReportCitationUpdateForm
    },
    data() {
        return {
            reportCitationList: [],
            updateRecord: false,
            updateCitationId: '',
            updateCitationRecord: '',
        }
    },
    methods: {
        getCitationFromStorage() {

            let citationList;

             if(localStorage.getItem('reportCitation') === null) {
               citationList = [];
            } else {
               citationList = JSON.parse(localStorage.getItem('reportCitation'));
            }

            this.reportCitationList = citationList;
        },
        updateCite(updateCitationId) {
            this.updateCitationId = updateCitationId;

            const citationList = JSON.parse(localStorage.getItem('reportCitation'));

            let filterUpdateRecord = citationList.filter((cite) => {
                return cite.reportId === updateCitationId;
            });

            this.updateCitationRecord = filterUpdateRecord;
            this.updateRecord = true;
        },
        recordUpdated() {
            this.updateRecord = false;
            this.getCitationFromStorage();
            this.$emit('rerender-citation-list');
        },
        recordDeleted() {
            this.$emit('rerender-citation-list');
        }
    },
    mounted(){
       this.getCitationFromStorage();
    }
};
</script>

<style scoped>
    .citation-list h6 {
        font-size: 0.85rem;
    }
    .citation-list-head {
        font-size: 1.1rem;
        color: #7b7b7b;
        margin-bottom: 1.4rem;
    }
</style>
