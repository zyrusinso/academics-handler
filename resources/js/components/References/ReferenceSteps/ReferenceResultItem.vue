<template>
 <div class="cite-search-item row">
     <div class="col-12 col-sm-9 col-lg-10 mb-2">
         <h1>{{ result.itemTitle }}</h1>
                        <p>{{ result.itemSnippet }}</p>
                        <div>
                             <a :href="result.itemLink"> {{ result.itemLink }}</a>
                        </div>

     </div>

     <div class="col-12 col-sm-3 col-lg-2">

                        <div class="cite">
                            <button class="btn" @click="citeReference(result.cacheId)">Cite</button>
                        </div>
     </div>

    </div>

</template>

<script>
export default {
    props: ['result'],
    methods: {
        citeReference(resultCacheId) {
            this.$emit('result-cache-id', resultCacheId);
        }
    }
}
</script>

<style scoped>
    .cite-search-item {
        margin-bottom: 1rem;
        box-shadow: 0px 0px 13px 1px rgb(0 0 0 / 10%);
        padding: 1.5rem 0.5rem;
    }
    .cite-search-item h1 {
        color: #444;
        font-weight: 600;
        margin-bottom: 1rem;
    }
    .cite-search-item p {
        font-size: 0.9rem;
        font-weight: 400;
        line-height: 1.5;
        margin-bottom: 1rem;
    }

    .cite-search-item a {
        word-wrap: break-word;
        text-decoration: underline;
    }

    .cite-search-item a:hover {
        text-decoration: underline;
    }

    .cite button {
        background: #ffb922;
        color: #fff;
        text-transform: capitalize;
    }

    .cite button:hover {
        background: #f5b427;
    }
</style>
