<template>
    <div class="update-citation form-wrap">
         <form @submit.prevent="updateCitation">
                   <div class="form-group row my-4">
                        <div class="col-12 col-xl-3">
                             <h3>Author:</h3>
                        </div>

                        <div class="col-12 col-xl-9">
                            <div class="row mb-2" v-for="(person, index) in updateCitationRecord[0].journalCreators" :key="index">
                                <div class="col-6 col-md-6">
                                    <label for="">First Name</label>
                                    <input type="text" name="" placeholder="" :value="person.firstName"  :ref="'journalCreatorFirstName' + index">
                                </div>
                                <div class="col-6 col-md-6">
                                    <label for="">Last Name</label>
                                     <input type="text" name="" placeholder="" :value="person.lastName" :ref="'journalCreatorLastName' + index">
                                </div>
                            </div>

                        </div>

                    </div>

                    <h3>Journal:</h3>

                    <div class="row">
                        <div class="col-12 col-sm-3 form-group">
                        <div>
                            <span>
                                Year Published:
                            </span>
                        </div>
                        <div>
                            <input type="text" name="" placeholder="" :value="updateCitationRecord[0].journalPublishedDate" ref="journalPublishedDate">
                        </div>
                        </div>
                        <div class="col-12 col-sm-9 form-group">
                            <div>
                            <span>
                               Article Title:
                            </span>
                           </div>
                        <div>
                            <input type="text" name="" placeholder="" :value="updateCitationRecord[0].journalTitle" ref="journalTitle">
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-6 form-group">
                         <div>
                            <span>
                               Journal:
                            </span>
                        </div>
                        <div>
                            <input type="text" name="" placeholder="" :value="updateCitationRecord[0].journalName" ref="journalName">
                        </div>
                        </div>
                        <div class="col-6 col-sm-3 form-group">
                            <div>
                                <span>
                                    Volume no:
                                </span>
                            </div>
                            <div>
                                <input type="number" name="" placeholder="" :value="updateCitationRecord[0].journalVolume" ref="journalVolume">
                            </div>

                        </div>
                        <div class="col-6 col-sm-3 form-group">
                             <div>
                            <span>
                                Issue no:
                            </span>
                           </div>
                        <div>
                            <input type="number" name="" placeholder="" :value="updateCitationRecord[0].journalNumber" ref="journalNumber">
                        </div>
                        </div>
                        <div class="col-12 form-group">
                             <div>
                            <span>
                                Pages used:
                            </span>
                           </div>
                        <div>
                            <input type="text" name="" placeholder="A single page, or range of pages that the information can be found on." :value="updateCitationRecord[0].journalPages" ref="journalPages">
                        </div>
                        </div>
                    </div>

                    <h3>Online:</h3>
                    <div class="form-group row">
                        <div class="col-12 col-md-3 mb-1">
                            <span>
                                DOI:
                            </span>
                           </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="" placeholder="" :value="updateCitationRecord[0].journalDoi" ref="journalDoi">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12 col-md-3 mb-1">
                            <span>
                               Database:
                            </span>
                           </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="" placeholder="Database" :value="updateCitationRecord[0].journalDatabase" ref="journalDatabase">

                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12 col-md-3 mb-1">
                            <span>
                               URL:
                            </span>
                           </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="" placeholder="http://" :value="updateCitationRecord[0].journalUrl" ref="journalUrl">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12 col-md-3 mb-1">
                            <span>
                               Access date:
                            </span>
                           </div>
                        <div class="col-12 col-md-9">
                            <div class="row">
                                <div class="col-4">
                                    <label for="">Day</label>
                                    <input type="number" name="" placeholder="05" :value="updateCitationRecord[0].journalAccessDay" ref="journalAccessDay">
                                </div>
                                <div class="col-4">
                                     <label for="">Month</label>
                                     <input type="number" name="" placeholder="10" :value="updateCitationRecord[0].journalAccessMonth" ref="journalAccessMonth">
                                </div>
                                <div class="col-4">
                                     <label for="">Year</label>
                                     <input type="number" name="" placeholder="2020" :value="updateCitationRecord[0].journalAccessYear" ref="journalAccessYear">
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
            creators: []
        }
    },
    methods: {
        updateCitation() {

            let refCreators = [];
            this.updateCitationRecord[0].journalCreators.forEach((item, index) => {
                let creator = {
                    'firstName' : this.$refs[`journalCreatorFirstName${index}`][0].value,
                    'lastName' : this.$refs[`journalCreatorLastName${index}`][0].value,
                };
                refCreators.push(creator);
            });

            let citationList = JSON.parse(localStorage.getItem('journalCitation'));
               let modifiedCitation = citationList.map((cite) => {
                   if(cite.journalId == this.updateCitationRecord[0].journalId) {
                        cite.journalCreators= refCreators;
                        cite.journalPublishedDate= this.$refs.journalPublishedDate.value;
                        cite.journalTitle= this.$refs.journalTitle.value;
                        cite.journalName= this.$refs.journalName.value;
                        cite.journalVolume= this.$refs.journalVolume.value;
                        cite.journalNumber= this.$refs.journalNumber.value;
                        cite.journalPages= this.$refs.journalPages.value;
                        cite.journalDoi= this.$refs.journalDoi.value;
                        cite.journalDatabase= this.$refs.journalDatabase.value;
                        cite.journalUrl= this.$refs.journalUrl.value;
                        cite.journalAccessDay= this.$refs.journalAccessDay.value;
                        cite.journalAccessMonth= this.$refs.journalAccessMonth.value;
                        cite.journalAccessYear= this.$refs.journalAccessYear.value;

                   }
                   return cite;
               });

               localStorage.setItem('journalCitation', JSON.stringify(modifiedCitation));
               this.$emit('record-updated');
        },
    },
    mounted() {

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
    font-size: 1rem;
}

.update-citation label,
.update-citation input,
.update-citation .form-group span{
    font-size: 0.8rem;
}

.update-citation .update-btn {
    background-color: #ff9222;
    color: #fff;
    text-transform: capitalize;
}


</style>
