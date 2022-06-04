<template>
     <div class="selected-cite" v-if="selectedResult.length !== 0 ">
                <div class="what-we-found">
                <h3>We Found:</h3>
                 <div class="what-we-found-inner row">
                        <div class="col-12 col-md-4 pl-0">
                            <span class="title">Author:</span>
                        </div>
                        <div class="col-12 col-md-8 pl-0">
                            <span>{{ selectedResult[0].bookAuthor}}</span>
                        </div>
                </div>

                <div class="what-we-found-inner row">
                        <div class="col-12 col-md-4 pl-0">
                            <span class="title">Year published:</span>
                        </div>
                        <div class="col-12 col-md-8 pl-0">
                            <span>{{ selectedResult[0].bookPublished}}</span>
                        </div>
                </div>

                <div class="what-we-found-inner row">
                        <div class="col-12 col-md-4 pl-0">
                            <span class="title">Book Title:</span>
                        </div>
                        <div class="col-12 col-md-8 pl-0">
                            <span>{{ selectedResult[0].bookTitle}}</span>
                        </div>
                </div>

                <div class="what-we-found-inner row">

                    <div class="col-12 col-md-4 pl-0">
                         <span class="title">
                           Publisher:
                         </span>
                        </div>
                    <div class="col-12 col-md-8 pl-0">
                        <span class="url-link">
                            {{ selectedResult[0].bookPublisher}}
                        </span>
                        </div>
                </div>

                 </div>
        </div>
</template>

<script>
export default {
    props: ['selectedResult'],
    data(){
        return {

        }
    },
    methods: {

    }
}
</script>

<style scoped>

    .what-we-found {
        margin-bottom: 2rem;
        border-bottom: 1px solid rgba(0,0,0,0.1);
    }

    .what-we-found .title{
        color: #333;
    }

    .what-we-found h3{
        margin-bottom: 2rem;
        color: #6d6d6d;
        font-weight: 600;
    }

    .what-we-found .what-we-found-inner{
        margin: 1rem 0;
    }

    .url-link {
        word-wrap: break-word;
    }

</style>
