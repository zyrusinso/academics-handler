<template>
     <div class="selected-cite" v-if="selectedResult.length !== 0 ">
                <div class="what-we-found">
                <h3>Here What We Have Found:</h3>
                <div class="what-we-found-inner row">
                        <div class="col-12 col-md-4 pl-0">
                            <span class="title">Article Title:</span>
                        </div>
                        <div class="col-12 col-md-8 pl-0">
                            <span>{{ selectedResult[0].itemTitle}}</span>
                        </div>
                </div>
                <div class="what-we-found-inner row">

                    <div class="col-12 col-md-4 pl-0">
                         <span class="title">
                           Url:
                         </span>
                        </div>
                    <div class="col-12 col-md-8 pl-0">
                        <span class="url-link">
                            {{ selectedResult[0].itemLink}}
                        </span>
                        </div>
                </div>
                <div class="what-we-found-inner row">

                    <div class="col-12 col-md-4 pl-0">
                        <span class="title">
                             Website Title:
                        </span>

                        </div>
                      <div class="col-12 col-md-8 pl-0">
                          <span>
                           {{ selectedResult[0].itemSiteName}}
                          </span>
                    </div>
                </div>
                <div class="what-we-found-inner row">

                    <div class="col-12 col-md-4 pl-0">
                        <span class="title">
                         Date:
                        </span>
                    </div>

                    <div class="col-12 col-md-8 pl-0">
                        <span>
                         {{currentDate()}}
                        </span>
                    </div>
                </div>
                 </div>

                <div class="what-we-need">
                    <h3>What We Need Your Help With:</h3>
                    <div class="what-we-need-inner row">
                        <div class="col-12 col-md-4 pl-0">
                            <span class="title">
                                Publisher / Sponsor:
                            </span>

                        </div>
                        <div class="col-12 col-md-8 pl-0">
                            <span>
                                 Edit On Next Step
                            </span>

                        </div>

                    </div>
                    <div class="what-we-need-inner row">
                         <div class="col-12 col-md-4 pl-0">
                             <span class="title">
                                 Date published:
                             </span>

                        </div>
                        <div class="col-12 col-md-8 pl-0">
                            <span>
                                  Edit On Next Step
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
         currentDate() {
            const dateObj = new Date();
            const monthNames = [ "January", "February", "March", "April", "May", "June",
                       "July", "August", "September", "October", "November", "December" ];

            const date = monthNames[dateObj.getMonth()] + ' ' + dateObj.getDate() + ', ' + dateObj.getFullYear();
            return date;
        },
    }
}
</script>

<style scoped>

    .what-we-found,
    .what-we-need {
        margin-bottom: 2rem;
        border-bottom: 1px solid rgba(0,0,0,0.1);
    }

    .what-we-found .title,
    .what-we-need .title {
        color: #333;
    }

    .what-we-found h3,
    .what-we-need h3 {
        margin-bottom: 2rem;
        color: #6d6d6d;
        font-weight: 600;
    }

    .what-we-found .what-we-found-inner,
    .what-we-need .what-we-need-inner {
        margin: 1rem 0;
    }

    .url-link {
        word-wrap: break-word;
    }

</style>
