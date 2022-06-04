<template>
    <div class="citation-list">
    <citation-dialog v-if="updateRecord" @close="updateRecord = false">
        <citation-update-form :updateCitationRecord="updateCitationRecord" @record-updated="recordUpdated"></citation-update-form>
    </citation-dialog>
            <div v-if="storageCitationList.length !== 0">
                 <citation-item v-for="citeList in storageCitationList"
                        :key="citeList.id"
                        :citeList="citeList"
                        @filteredList="getCitationFromStorage"
                        @update-cite="updateCite"
                        @record-deleted="recordDeleted"
                        ></citation-item>
            </div>
            <div v-else>
                <h6>No Citations Found.</h6>
            </div>
    </div>

</template>

<script>
import CitationDialog from '../CitationDialog.vue';
import CitationItem from '../CitationItem.vue';
import CitationUpdateForm from '../CitationUpdateForm.vue';

export default {
    components: {
        CitationItem,
        CitationDialog,
        CitationUpdateForm
    },
    data() {
        return {
            storageCitationList: [],
            updateRecord: false,
            updateCitationId: '',
            updateCitationRecord: '',
        }
    },
    methods: {
        getCitationFromStorage() {
            let citationList;

            if(localStorage.getItem('storageCitation') === null) {
               citationList = [];
            } else {
               citationList = JSON.parse(localStorage.getItem('storageCitation'));
            }

            this.storageCitationList = citationList;


        },
        updateCite(updateCitationId) {
            this.updateCitationId = updateCitationId;

            const citationList = JSON.parse(localStorage.getItem('storageCitation'));

            let filterUpdateRecord = citationList.filter((cite) => {
                return cite.citationId === updateCitationId;
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
