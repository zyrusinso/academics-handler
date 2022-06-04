<template>
    <div class="update-citation">
         <form @submit.prevent="updateCitation">
                    <div class="form-wrap">
                    <div class="form-group row">
                        <div class="col-3">
                            <label for="">
                                Article Title
                            </label>

                            </div>
                        <div class="col-9">
                            <input type="text" name="" placeholder="Enter Title" :value="updateCitationRecord[0].citationTitle" ref="citationTitle">
                        </div>
                    </div>

                    <h3>Contributor:</h3>

                    <div class="form-group row">
                        <div class="col-6 col-md-3">
                            <label for="">First Name</label>
                             <input type="text" name="" placeholder="" :value="updateCitationRecord[0].citationFirstName" ref="citationFirstName">
                        </div>
                        <div class="col-6 col-md-3">
                             <label for="">Middle Name</label>
                               <input type="text" name="" placeholder="" :value="updateCitationRecord[0].citationMiddleName" ref="citationMiddleName">
                        </div>
                        <div class="col-6 col-md-3">
                             <label for="">Last Name</label>
                               <input type="text" name="" placeholder="" :value="updateCitationRecord[0].citationLastName" ref="citationLastName">
                        </div>
                        <div class="col-6 col-md-3">
                            <label for="">Suffix</label>
                              <input type="text" name="" placeholder="" :value="updateCitationRecord[0].citationSuffix" ref="citationSuffix">
                        </div>
                    </div>

                    <h3>Online Publication Info:</h3>
                    <div class="form-group row">

                        <div class="col-6">
                           <label for="">Website Title</label>
                            <input type="text" name="" placeholder="" :value="updateCitationRecord[0].citationWebsiteTitle" ref="citationWebsiteTitle">
                        </div>

                        <div class="col-6">
                            <label for="">Publisher / sponser</label>
                              <input type="text" name="" placeholder="" :value="updateCitationRecord[0].citationPublisher" ref="citationPublisher">
                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-2 col-sm-3">
                            <label for="">URL</label>
                            </div>
                        <div class="col-10 col-sm-9">
                            <input type="text" name="" placeholder="" :value="updateCitationRecord[0].citationUrl" ref="citationUrl">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12 col-sm-3">
                            <label for="">
                            Electronically Published
                            </label>
                            </div>
                        <div class="col-12 col-sm-9">
                            <div class="row">
                                <div class="form-group col-3">
                                     <label for="">Day</label>
                                     <input type="number" name="" placeholder="05" :value="updateCitationRecord[0].citationPublishedDay" ref="citationPublishedDay">
                                </div>

                                 <div class="form-group col-3">
                                     <label for="">Month</label>
                                     <input type="number" name="" placeholder="10" :value="updateCitationRecord[0].citationPublishedMonth" ref="citationPublishedMonth">
                                </div>

                                 <div class="form-group col-3">
                                     <label for="">Year</label>
                                     <input type="number" name="" placeholder="2020" :value="updateCitationRecord[0].citationPublishedYear" ref="citationPublishedYear">
                                </div>

                                 <div class="form-group col-3">
                                     <label for="">Time</label>
                                     <input type="text" name="" placeholder="12:00pm" :value="updateCitationRecord[0].citationPublishedTime" ref="citationPublishedTime">
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <button type="submit" class="btn update-btn">Update Citation</button>
                </form>
    </div>
</template>

<script>
export default {
    props: ['updateCitationRecord'],
    data() {
        return {

        }
    },
    methods: {
        updateCitation() {
            let citationList = JSON.parse(localStorage.getItem('storageCitation'));
               let modifiedCitation = citationList.map((cite) => {
                   if(cite.citationId == this.updateCitationRecord[0].citationId) {
                        cite.citationTitle = this.$refs.citationTitle.value;
                        cite.citationFirstName = this.$refs.citationFirstName.value;
                        cite.citationMiddleName = this.$refs.citationMiddleName.value;
                        cite.citationLastName = this.$refs.citationLastName.value;
                        cite.citationSuffix = this.$refs.citationSuffix.value;
                        cite.citationWebsiteTitle = this.$refs.citationWebsiteTitle.value;
                        cite.citationPublisher = this.$refs.citationPublisher.value;
                        cite.citationUrl = this.$refs.citationUrl.value;
                        cite.citationPublishedDay = this.$refs.citationPublishedDay.value;
                        cite.citationPublishedMonth = this.$refs.citationPublishedMonth.value;
                        cite.citationPublishedYear = this.$refs.citationPublishedYear.value;
                        cite.citationTime = this.$refs.citationPublishedTime.value;
                   }
                   return cite;
               });

               localStorage.setItem('storageCitation', JSON.stringify(modifiedCitation));
               this.$emit('record-updated');
        }
    }
}
</script>

<style scoped>

.form-wrap {
    margin-bottom: 0.6rem;
    max-height: 450px;
    overflow-y: auto;
    overflow-x: hidden;
}

.update-citation h3 {
    margin-bottom: 0.5rem;
    font-size: 0.85rem;
}

.update-citation label,
.update-citation input{
    font-size: 0.8rem;
}

.update-citation .update-btn {
    background-color: #ff9222;
    color: #fff;
    text-transform: capitalize;
}

</style>
