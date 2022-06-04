<template>
    <div class="citation-list">
       <div class="tabs">
            <div class="tab-item" :class="{active: activeTab === 'website-citation'}" @click="selectedTab('website-citation')">
                <h5>Website</h5>
            </div>

            <div class="tab-item" :class="{active: activeTab === 'book-citation'}" @click="selectedTab('book-citation')">
                <h5>Book</h5>
            </div>

             <div class="tab-item" :class="{active: activeTab === 'ebook-citation'}" @click="selectedTab('ebook-citation')">
                <h5>E-book</h5>
            </div>

             <div class="tab-item" :class="{active: activeTab === 'journal-citation'}" @click="selectedTab('journal-citation')">
                <h5>Journal</h5>
            </div>

             <div class="tab-item" :class="{active: activeTab === 'report-citation'}" @click="selectedTab('report-citation')">
                <h5>Report</h5>
            </div>

        </div>

        <div class="tab-details">
             <h3 class="citation-list-head">
                 <span v-if="activeTab === 'website-citation'">
                     Website
                 </span>
                  <span v-if="activeTab === 'book-citation'">
                     Book
                 </span>
                  <span v-if="activeTab === 'ebook-citation'">
                     E-book
                 </span>
                 <span v-if="activeTab === 'journal-citation'">
                     Journal
                 </span>
                  <span v-if="activeTab === 'report-citation'">
                     Report
                 </span>
                 Citation List :-
                 </h3>
                <div v-if="activeTab === 'website-citation'">
                    <website-citation-list @rerender-citation-list="rerenderCitationList" :key="updated"></website-citation-list>
                </div>
                 <div v-if="activeTab === 'book-citation'">
                    <book-citation-list @rerender-citation-list="rerenderBookCitationList" :key="bookUpdated"></book-citation-list>
                </div>

                <div v-if="activeTab === 'ebook-citation'">
                    <ebook-citation-list @rerender-citation-list="rerenderEbookCitationList" :key="ebookUpdated"></ebook-citation-list>
                </div>

                <div v-if="activeTab === 'journal-citation'">
                    <journal-citation-list @rerender-citation-list="rerenderJournalCitationList" :key="journalUpdated"></journal-citation-list>
                </div>

                 <div v-if="activeTab === 'report-citation'">
                    <report-citation-list @rerender-citation-list="rerenderReportCitationList" :key="reportUpdated"></report-citation-list>
                </div>

        </div>

    </div>

</template>

<script>

import WebsiteCitationList from './WebsiteCitation/WebsiteCitationList.vue';
import BookCitationList from './BookCitation/BookCitationList.vue';
import EbookCitationList from './EBookCitation/EbookCitationList.vue';
import JournalCitationList from './JournalCitation/JournalCitationList.vue';
import ReportCitationList from './ReportCitation/ReportCitationList.vue';

export default {
    props: ['activeTabProp'],
    components: {
        WebsiteCitationList,
        BookCitationList,
        EbookCitationList,
        JournalCitationList,
        ReportCitationList
    },
    data() {
        return {
          activeTab: this.activeTabProp,
          updated: 1,
          bookUpdated: 1,
          ebookUpdated: 1,
          journalUpdated: 1,
          reportUpdated: 1,
        }
    },
    methods: {
        selectedTab(val) {
            this.activeTab = val;
        },
        citationTab(val) {
            this.activeTab = val;
        },
        rerenderCitationList() {
           this.updated += 1;
        },
        rerenderBookCitationList() {
            this.activeTab = "book-citation";
            this.bookUpdated += 1;
        },
        rerenderEbookCitationList() {
            this.activeTab = "ebook-citation";
            this.ebookUpdated += 1;
        },
        rerenderJournalCitationList() {
            this.activeTab = "journal-citation";
            this.journalUpdated += 1;
        },
        rerenderReportCitationList() {
            this.activeTab = "report-citation";
            this.reportUpdated += 1;
        }

    },
};
</script>

<style scoped>
    .tabs {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 3rem;
    }

    .tabs .tab-item {
        padding: 0.5rem 2rem;
        color: #747373;
        background-color: #f9f9f9;
        cursor: pointer;
        margin-bottom: 0.3rem;
    }

    .tabs .tab-item.active {
        background-color: #ffd987;
    }

    .citation-list-head {
        font-size: 1rem;
        color: #7b7b7b;
        margin-bottom: 1.4rem;
    }

    @media(max-width: 400px) {
        .tabs {
            display: block;
        }
    }
</style>
