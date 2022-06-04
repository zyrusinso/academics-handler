<template>
    <div>
        <form @submit.prevent="getSelectedResults(false)">
                <div class="row">
                 <div class="form-group col-12 col-sm-9 col-lg-10 px-0 mb-2">
                  <input type="text" name="search-query" placeholder="Enter a keyword" class="form-control" v-model="searchQuery">
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
               <reference-result-item v-for="result in results" :key="result.cacheId" :result="result" @result-cache-id="citeReference"></reference-result-item>
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

import ReferenceResultItem from './ReferenceResultItem.vue';

export default {
    components: {
        ReferenceResultItem
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
        getSelectedResults(load) {

            if(!load) {
                this.results = [];
            }

            this.isError = [];
            if(this.searchQuery.trim() !== ''){

            let url;

            if(this.startIndex > 1) {
                 this.isLoadMore = true;
                 url = `https://www.googleapis.com/customsearch/v1?key=AIzaSyAeP4aVd6OHLbEncYaicwTa6qz4i2md-8o&cx=af38d47a29b3a4495&q=${this.searchQuery}&start=${this.startIndex}&filter=1`;


            } else {
                 this.isLoading = true;
                 this.results = [];
                 url = `https://www.googleapis.com/customsearch/v1?key=AIzaSyAeP4aVd6OHLbEncYaicwTa6qz4i2md-8o&cx=af38d47a29b3a4495&q=${this.searchQuery}&filter=1`;

            }

            axios.get(url).then((response) => {
                this.isLoading = false;
                this.isLoadMore = false;
                // console.log(response);
                let items = response.data.items;
                if(items.length === 0) {
                    this.isError.push('Sorry no result found.');
                } else {
                this.isError = [];
                items.forEach(item => {
                    const items = {
                        cacheId: item.cacheId,
                        itemTitle: item.title,
                        itemSnippet: item.snippet,
                        itemLink: item.link,
                        itemDomain: item.displayLink,
                        itemSiteName: item.pagemap.metatags[0]["og:site_name"],
                    }
                    this.results.push(items);
                });
                }
            }).catch(e => {
                this.isLoading = false;
                this.isLoadMore = false;
                this.isError = [];


                if(e.message.length !== 0 && e.message.includes('429')) {
                    console.clear();
                    this.isError.push('Daily Quota Limit Exceeded.');
                } else {
                    this.isError.push('Sorry no result found.');
                }

            });
        }},
        loadMore() {
            this.startIndex += 10;
            this.getSelectedResults(true);
        },
        citeReference(resultCacheId) {
            let selectedResult = this.results.filter((res) => {
               return res.cacheId === resultCacheId
           });
            this.$emit('selected-result', selectedResult);
        }
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
