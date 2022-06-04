<template>
     <div class="selected-cite" v-if="selectedResult.length !== 0 ">
                <div class="what-we-found">
                <h3>We Found:</h3>
                 <div class="what-we-found-inner row">
                        <div class="col-12 col-md-4 pl-0">
                            <span class="title">Author{{ selectedResult[0].journalCreators.length > 0  ? 's' : ''}}:
                               </span>
                        </div>
                        <div class="col-12 col-md-8 pl-0">
                            <div v-for="(person, index) in creators" :key="index">
                                <div class="row">
                                    <div class="col-6">
                                        <span class="person-name">First Name:</span>
                                        <span>{{ person.creator[0] }}</span>
                                    </div>

                                    <div class="col-6">
                                        <span class="person-name">Last Name:</span>
                                        <span>{{ person.creator[1] }}</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                </div>

                <div class="what-we-found-inner row">
                        <div class="col-12 col-md-4 pl-0">
                            <span class="title">Year published:</span>
                        </div>
                        <div class="col-12 col-md-8 pl-0">
                            <span>{{ selectedResult[0].journalPublishedDate}}</span>
                        </div>
                </div>

                <div class="what-we-found-inner row">
                        <div class="col-12 col-md-4 pl-0">
                            <span class="title">Article Title:</span>
                        </div>
                        <div class="col-12 col-md-8 pl-0">
                            <span>{{ selectedResult[0].journalTitle}}</span>
                        </div>
                </div>

                <div class="what-we-found-inner row">
                        <div class="col-12 col-md-4 pl-0">
                            <span class="title">Journal Title:</span>
                        </div>
                        <div class="col-12 col-md-8 pl-0">
                            <span>{{ selectedResult[0].journalName}}</span>
                        </div>
                </div>

                 <div class="what-we-found-inner row">
                        <div class="col-12 col-md-4 pl-0">
                            <span class="title">Volume No:</span>
                        </div>
                        <div class="col-12 col-md-8 pl-0">
                            <span>{{ selectedResult[0].journalVolume}}</span>
                        </div>
                </div>

                <div class="what-we-found-inner row">
                        <div class="col-12 col-md-4 pl-0">
                            <span class="title">Issue No:</span>
                        </div>
                        <div class="col-12 col-md-8 pl-0">
                            <span>{{ selectedResult[0].journalNumber}}</span>
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
            creators: []
        }
    },
    methods: {
        journalCreator() {
            this.selectedResult[0].journalCreators.forEach(item => {

                let items = {
                   creator: item.creator.split(','),
                }
                this.creators.push(items);
            });
        },

    },
    mounted() {
        this.journalCreator();
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

    .person-name {
        color: #333;
    }


</style>
