<template>
    <div class="citation-list">
        <citation-dialog v-if="updateRecord" @close="updateRecord = false">
            <ebook-citation-update-form :updateCitationRecord="updateCitationRecord" @record-updated="recordUpdated"></ebook-citation-update-form>
        </citation-dialog>
            <div v-if="ebookCitationList.length !== 0">
                 <ebook-citation-item v-for="citeList in ebookCitationList"
                        :key="citeList.ebookId"
                        :citeList="citeList"
                        @filteredList="getCitationFromStorage"
                        @update-cite="updateCite"
                        @record-deleted="recordDeleted"
                        ></ebook-citation-item>
            </div>
            <div v-else>
                <h6>No Citations Found.</h6>
            </div>
    </div>

</template>

<script>
import CitationDialog from '../CitationDialog.vue';
import EbookCitationItem from './EbookCitationItem.vue';
import EbookCitationUpdateForm from './EbookCitationUpdateForm.vue';

export default {
    components: {
        EbookCitationItem,
        CitationDialog,
        EbookCitationUpdateForm
    },
    data() {
        return {
            ebookCitationList: [],
            updateRecord: false,
            updateCitationId: '',
            updateCitationRecord: '',
        }
    },
    methods: {
        getCitationFromStorage() {

            let citationList;

            if(localStorage.getItem('ebookCitation') === null) {
               citationList = [];
            } else {
               citationList = JSON.parse(localStorage.getItem('ebookCitation'));
            }

            this.ebookCitationList = citationList;
        },
        updateCite(updateCitationId) {
            this.updateCitationId = updateCitationId;

            const citationList = JSON.parse(localStorage.getItem('ebookCitation'));

            let filterUpdateRecord = citationList.filter((cite) => {
                return cite.ebookId === updateCitationId;
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
