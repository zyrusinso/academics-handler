<template>
    <div class="citation-list">
        <citation-dialog v-if="updateRecord" @close="updateRecord = false">
            <book-citation-update-form :updateCitationRecord="updateCitationRecord" @record-updated="recordUpdated"></book-citation-update-form>
        </citation-dialog>
            <div v-if="bookCitationList.length !== 0">
                 <book-citation-item v-for="citeList in bookCitationList"
                        :key="citeList.id"
                        :citeList="citeList"
                        @filteredList="getCitationFromStorage"
                        @update-cite="updateCite"
                        @record-deleted="recordDeleted"
                        ></book-citation-item>
            </div>
            <div v-else>
                <h6>No Citations Found.</h6>
            </div>
    </div>

</template>

<script>
import CitationDialog from '../CitationDialog.vue';
import BookCitationItem from './BookCitationItem.vue';
import BookCitationUpdateForm from './BookCitationUpdateForm.vue';

export default {
    components: {
        BookCitationItem,
        CitationDialog,
        BookCitationUpdateForm
    },
    data() {
        return {
            bookCitationList: [],
            updateRecord: false,
            updateCitationId: '',
            updateCitationRecord: '',
        }
    },
    methods: {
        getCitationFromStorage() {

            let citationList;

            if(localStorage.getItem('bookCitation') === null) {
               citationList = [];
            } else {
               citationList = JSON.parse(localStorage.getItem('bookCitation'));
            }

            this.bookCitationList = citationList;

        },
        updateCite(updateCitationId) {
            this.updateCitationId = updateCitationId;

            const citationList = JSON.parse(localStorage.getItem('bookCitation'));

            let filterUpdateRecord = citationList.filter((cite) => {
                return cite.bookId === updateCitationId;
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
