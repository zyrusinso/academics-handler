<template>
     <div v-if="selectedResult.length !== 0 " class="complete-citation">
                <form @submit.prevent="completeCitation">
                    <h3>What I'm citing:</h3>
                    <div class="form-group row">
                        <div class="col-12 col-md-3 mb-1">
                            <span>
                                Article Title
                            </span>
                            </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="" placeholder="Enter Title" :value="selectedResult[0].itemTitle" ref="citationTitle">
                        </div>
                    </div>
                    <div class="form-group row my-4">
                        <div class="col-12 col-xl-3">
                             <h3>Contributor:</h3>
                        </div>

                        <div class="col-12 col-xl-9">
                            <div class="row">
                                <div class="col-6 col-md-3">
                                    <label for="">First Name</label>
                                    <input type="text" name="" placeholder="" value="" ref="citationFirstName">
                                </div>
                                <div class="col-6 col-md-3">
                                    <label for="">Middle Name</label>
                                     <input type="text" name="" placeholder="" value="" ref="citationMiddleName">
                                </div>
                                <div class="col-6 col-md-3">
                                    <label for="">Last Name</label>
                                     <input type="text" name="" placeholder="" value="" ref="citationLastName">
                                </div>
                                <div class="col-6 col-md-3">
                                    <label for="">Suffix</label>
                                    <input type="text" name="" placeholder="" value="" ref="citationSuffix">
                                </div>
                            </div>

                        </div>
                    </div>

                    <h3>Online Publication Info:</h3>
                    <div class="form-group row">
                        <div class="col-12 col-md-3 mb-1">
                            <span>
                                 Website Title
                            </span>
                           </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="" placeholder="" :value="selectedResult[0].itemSiteName" ref="citationWebsiteTitle">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12 col-md-3 mb-1">
                            <span>
                                Publisher / sponser
                            </span>
                            </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="" placeholder="" :value="selectedResult[0].itemSiteName" ref="citationPublisher">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12 col-md-3 mb-1">
                            <span>
                                URL
                            </span>
                            </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="" placeholder="" :value="selectedResult[0].itemLink" ref="citationUrl">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12 col-md-3 mb-2">
                            <span>
                                Electronically Published
                            </span>
                            </div>
                        <div class="col-12 col-md-9">
                            <div class="row">
                                <div class="form-group col-6 col-md-3">
                                     <label for="">Day</label>
                                     <input type="number" name="" placeholder="05" value="" ref="citationPublishedDay">
                                </div>

                                 <div class="form-group col-6 col-md-3">
                                     <label for="">Month</label>
                                     <input type="number" name="" placeholder="10" value="" ref="citationPublishedMonth">
                                </div>

                                 <div class="form-group col-6 col-md-3">
                                     <label for="">Year</label>
                                     <input type="number" name="" placeholder="2020" value="" ref="citationPublishedYear">
                                </div>

                                 <div class="form-group col-6 col-md-3">
                                     <label for="">Time</label>
                                     <input type="text" name="" placeholder="12:00pm" value="" ref="citationPublishedTime">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn form-submit-btn">Compelete Citation</button>
                </form>
        </div>
</template>

<script>
import uuidv4 from "uuid/v4";

export default {
    props: ['selectedResult'],
    data() {
        return {
            completeCitationList: []
        }
    },
    methods: {
        completeCitation() {
            const citation = {
              citationId: uuidv4(),
              citationTitle : this.$refs.citationTitle.value,
              citationFirstName : this.$refs.citationFirstName.value,
              citationMiddleName : this.$refs.citationMiddleName.value,
              citationLastName : this.$refs.citationLastName.value,
              citationSuffix : this.$refs.citationSuffix.value,
              citationWebsiteTitle : this.$refs.citationWebsiteTitle.value,
              citationPublisher : this.$refs.citationPublisher.value,
              citationUrl : this.$refs.citationUrl.value,
              citationPublishedDay : this.$refs.citationPublishedDay.value,
              citationPublishedMonth : this.$refs.citationPublishedMonth.value,
              citationPublishedYear : this.$refs.citationPublishedYear.value,
              citationTime : this.$refs.citationPublishedTime.value,
            }

            // SAVE TO LOCAL STORAGE
            let storageCitation;

            if(localStorage.getItem('storageCitation') === null) {
                storageCitation = [];
            } else {
                storageCitation = JSON.parse(localStorage.getItem('storageCitation'));
            }

            storageCitation.push(citation);

            localStorage.setItem('storageCitation', JSON.stringify(storageCitation));

            this.completeCitationList.push(citation);

            this.$emit('current-active-step');

        }
    }
}
</script>

<style scoped>
    .complete-citation h3{
        margin-bottom: 2rem;
        color: #333;
        font-size: 1.1rem;
    }
   .form-submit-btn {
        margin-bottom: 2rem;
        color: #fff;
        background-color: #ffb922;
        border-color: #ffb922;
        box-shadow: none;
        text-transform: capitalize;
    }
    .form-submit-btn:hover {
        background: #f5b427;
    }

</style>
