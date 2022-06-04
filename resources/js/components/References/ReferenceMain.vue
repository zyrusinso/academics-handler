<template>
    <div class="content-box">
    <div class="row">
        <div class="col-12 col-lg-3 mb-3">
        <div class="row">
        <div class="tabs">
            <div class="tab-item" :class="{active: activeTab === 'reference-website'}" @click="selectedTab('reference-website')">
                <h5>Website</h5>
            </div>

            <div class="tab-item" :class="{active: activeTab === 'book'}" @click="selectedTab('book')">
                <h5>Book</h5>
            </div>

             <div class="tab-item" :class="{active: activeTab === 'e-book'}" @click="selectedTab('e-book')">
                <h5>E-Book</h5>
            </div>

            <div class="tab-item" :class="{active: activeTab === 'journal'}" @click="selectedTab('journal')">
                <h5>Journal</h5>
            </div>

            <div class="tab-item" :class="{active: activeTab === 'report'}" @click="selectedTab('report')">
                <h5>Report</h5>
            </div>

            <div class="tab-item" :class="{active: activeTab === 'citation-list'}" @click="selectedTab('citation-list')">
                <h5>My Citation</h5>
            </div>
        </div>
        </div>
        </div>

        <div class="col-12 col-lg-9">

            <div class="tab-details">
                <div v-if="activeTab === 'reference-website'">
                    <reference-website @active-tab="citationTab" @active-citation-list-tab="citationListTabProp"></reference-website>
                </div>
                <div v-if="activeTab === 'book'">
                    <reference-book @active-tab="citationTab" @active-citation-list-tab="citationListTabProp"></reference-book>
                </div>
                <div v-if="activeTab === 'journal'">
                    <reference-journal @active-tab="citationTab" @active-citation-list-tab="citationListTabProp"></reference-journal>
                </div>
                 <div v-if="activeTab === 'report'">
                     <reference-report-form @active-tab="citationTab" @active-citation-list-tab="citationListTabProp"></reference-report-form>
                </div>
                 <div v-if="activeTab === 'e-book'">
                     <reference-ebook-form @active-tab="citationTab" @active-citation-list-tab="citationListTabProp"></reference-ebook-form>
                </div>
                <div v-if="activeTab === 'citation-list'">
                    <citation-list :activeTabProp="citationListTab"></citation-list>
                </div>
            </div>

        </div>
    </div>

    </div>
</template>

<script>

import ReferenceWebsite from './ReferenceWebsite.vue';
import ReferenceBook from './Book/ReferenceBook.vue';
import ReferenceEbookForm from './EBook/ReferenceEBookForm.vue';
import ReferenceJournal from './Journal/ReferenceJournal.vue';
import ReferenceReportForm from './Report/ReportForm.vue';
import CitationList from './CitationList/CitationList.vue';

export default {
    components: {
        ReferenceWebsite,
        ReferenceBook,
        ReferenceEbookForm,
        ReferenceJournal,
        ReferenceReportForm,
        CitationList
    },
    data() {
        return {
            selectedData: 'reference-website',
            activeTab: 'reference-website',
            citationListTab: 'website-citation',
        }
    },
    methods: {
        selectedOption(event) {
           this.selectedData = event.target.value;
        },
        selectedTab(val) {
            this.activeTab = val;
        },
        citationTab(val) {
            this.activeTab = val;
        },
        citationListTabProp(val) {
            this.citationListTab = val;
        }
    }
}
</script>

<style scoped>

.content-box {
    box-shadow: 0px 0px 13px 1px rgb(0 0 0 / 10%);
    padding: 2rem;
}

.tabs {
    margin-right: 1rem;
    border-right: 1px solid rgba(131, 131, 131, 0.1);
    width: 100%;
}

@media (max-width: 992px) {
    .tabs {
        margin-right: 0;
    }
}

.tabs .tab-item {
    margin-bottom: 1rem;
    background-color: #fff;
    padding: 0.3rem 1rem;
    border-radius: 2px;
    cursor: pointer;
}

.tabs .tab-item h5 {
    font-size: 1rem;
    line-height: 1.3;
}

.tabs .tab-item.active {
    background: linear-gradient(to left, #fff , #ffd987);;
    color: #747373;
}

</style>
