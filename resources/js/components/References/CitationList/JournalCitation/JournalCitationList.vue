<template>
    <div class="citation-list">
        <citation-dialog v-if="updateRecord" @close="updateRecord = false">
            <journal-citation-update-form :updateCitationRecord="updateCitationRecord" @record-updated="recordUpdated"></journal-citation-update-form>
        </citation-dialog>
            <div v-if="journalCitationList.length !== 0">
                 <journal-citation-item v-for="citeList in journalCitationList"
                        :key="citeList.journalId"
                        :citeList="citeList"
                        @filteredList="getCitationFromStorage"
                        @update-cite="updateCite"
                        @record-deleted="recordDeleted"
                        ></journal-citation-item>
            </div>
            <div v-else>
                <h6>No Citations Found.</h6>
            </div>
    </div>

</template>

<script>
import CitationDialog from '../CitationDialog.vue';
import JournalCitationItem from './JournalCitationItem.vue';
import JournalCitationUpdateForm from './JournalCitationUpdateForm.vue';

export default {
    components: {
        JournalCitationItem,
        CitationDialog,
        JournalCitationUpdateForm
    },
    data() {
        return {
            journalCitationList: [],
            updateRecord: false,
            updateCitationId: '',
            updateCitationRecord: '',
        }
    },
    methods: {
        getCitationFromStorage() {

             let citationList;

             if(localStorage.getItem('journalCitation') === null) {
               citationList = [];
            } else {
               citationList = JSON.parse(localStorage.getItem('journalCitation'));
            }

            this.journalCitationList = citationList;
        },
        updateCite(updateCitationId) {
            this.updateCitationId = updateCitationId;

            const citationList = JSON.parse(localStorage.getItem('journalCitation'));

            let filterUpdateRecord = citationList.filter((cite) => {
                return cite.journalId === updateCitationId;
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
