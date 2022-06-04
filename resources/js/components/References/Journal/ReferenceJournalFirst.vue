<template>
    <div>
      <form @submit.prevent="getJournals(false)">
                <div class="row">
                 <div class="form-group col-12 col-sm-9 col-lg-10 px-0 mb-2">
                  <input type="text" name="search-query" placeholder="Enter Article Title or Enter a DOI" class="form-control" v-model="searchQuery">
                </div>
                <div class="form-group col-12 col-sm-3 col-lg-2 px-0 pl-sm-2 pr-lg-0 mb-2">
                    <input type="submit" name="submit" value="Submit" class="form-control form-submit-btn">
                 </div>
              </div>
        </form>

        <div class="errors" v-if="isError.length !== 0 ">
                <h3 v-for="error in isError" :key="error">{{ error }}</h3>
            </div>
         <div class="results" v-if="results.length !== 0 && isLoading === false">
            <h3>Results: </h3>

            <div>
                   <reference-journal-item v-for="result in results" :key="result.journalId" :result="result" @result-journal-id="journalReference"></reference-journal-item>
            </div>
            <div class="load-more-btn" v-if="results.length >= 10">
                <button class="btn" @click="loadMore" :disabled="isLoadMore">
                    <div class="spinner-grow spinner-color" v-if="isLoadMore"></div>
                    <div v-else><span>Load More</span></div>
                </button>
            </div>
        </div>
        <div v-else-if="isLoading">
            <div>
                <div class="spinner-grow spinner-color"></div>
            </div>
        </div>

    </div>
</template>

<script>

import ReferenceJournalItem from "./ReferenceJournalItem.vue";

export default {
    components: {
        ReferenceJournalItem
    },
    data() {
        return {
            searchQuery: '',
            results: [],
            startIndex: 1,
            isLoading: false,
            isLoadMore: false,
            isError: [],
        }
    },
    methods: {
        getJournals(load) {

            if(!load) {
                this.results = [];
            }

            this.isError = [];
            if(this.searchQuery.trim() !== ''){

            let url;

            if(this.startIndex > 1) {
                 this.isLoadMore = true;
                 url = `https://api.springernature.com/meta/v2/json?q=${this.searchQuery} type:Journal&s=${this.startIndex}&p=10&api_key=586c15c20c27d4a84306c380b491a4c3`;

            } else {
                 this.isLoading = true;
                 this.results = [];
                 url = `https://api.springernature.com/meta/v2/json?q=${this.searchQuery}  type:Journal&p=10&api_key=586c15c20c27d4a84306c380b491a4c3`;

            }

            axios.get(url).then((response) => {
                this.isLoading = false;
                this.isLoadMore = false;
                // console.log(response);
                let items = response.data.records;
                if(items.length === 0) {
                this.isError.push('Sorry no result found.');
                } else {
                this.isError = [];
                items.forEach(item => {
                    const items = {
                        journalId: item.journalId + item.doi,
                        journalCreators: item.creators,
                        journalPublishedDate: item.publicationDate,
                        journalTitle: item.title,
                        journalName: item.publicationName,
                        journalVolume: item.volume,
                        journalNumber: item.number,
                        journalDoi: item.doi,
                    }
                    this.results.push(items);
                });
              }
            }).catch(e => {
                this.isLoading = false;
                this.isLoadMore = false;
                this.isError = [];
            });
        }},
        loadMore() {
            this.startIndex += 10;
            this.getJournals(true);
        },
        journalReference(resultJournalId) {
            let selectedResult = this.results.filter((res) => {
               return res.journalId === resultJournalId
           });
          this.$emit('selected-result', selectedResult);
        }

    },
    mounted(){
       // this.getJournals(false);
    }
}
</script>

<style scoped>
    .form-submit-btn {
        line-height: 1;
        height: 100%;
    }

    .form-submit-btn:hover {
        background: #f5b427;
    }
    .form-submit-btn:focus {
        color: #fff;
        background-color: #f5b427;
        border-color: #f5b427;
        box-shadow: none;
    }

    .results h3 {
        margin: 2rem 0;
        color: #333;
        font-weight: 500;
    }
    .spinner-color {
        color: #ffb922;
    }

    .load-more-btn {
        text-align: center;
    }

    .load-more-btn button{
        text-transform: capitalize;
        background-color: #fff;
        border-color: #f5b427;
        color: #f5b427;
    }

    .load-more-btn button:hover {
        background-color: #f5b427;
        color: #fff;
    }
</style>

