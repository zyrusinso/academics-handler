<template>
     <div v-if="selectedResult.length !== 0 " class="complete-citation">
                <form @submit.prevent="completeCitation">
                    <h3>What I'm citing:</h3>
                    <div class="form-group row my-4">
                        <div class="col-12 col-xl-3">
                             <h3>Authors:</h3>
                        </div>

                        <div class="col-12 col-xl-9">
                            <div class="row mb-2" v-for="(person, index) in creators" :key="index">
                                <div class="col-6 col-md-6">
                                    <label for="">First Name</label>
                                    <input type="text" name="" placeholder="" :value="person.creator[0]"  :ref="'journalCreatorFirstName' + index">
                                </div>
                                <div class="col-6 col-md-6">
                                    <label for="">Last Name</label>
                                     <input type="text" name="" placeholder="" :value="person.creator[1]" :ref="'journalCreatorLastName' + index">
                                </div>
                            </div>

                        </div>

                    </div>
                    <h3>Journal:</h3>
                    <div class="form-group row">
                        <div class="col-12 col-md-3 mb-1">
                            <span>
                                Year Published:
                            </span>
                           </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="" placeholder="" :value="selectedResult[0].journalPublishedDate" ref="journalPublishedDate">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12 col-md-3 mb-1">
                            <span>
                               Article Title:
                            </span>
                           </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="" placeholder="" :value="selectedResult[0].journalTitle" ref="journalTitle">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12 col-md-3 mb-1">
                            <span>
                               Journal:
                            </span>
                           </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="" placeholder="" :value="selectedResult[0].journalName" ref="journalName">
                        </div>
                    </div>



                     <div class="form-group row">
                        <div class="col-12 col-md-3 mb-1">
                            <span>
                                Volume no:
                            </span>
                           </div>
                        <div class="col-12 col-md-9">
                            <input type="number" name="" placeholder="" :value="selectedResult[0].journalVolume" ref="journalVolume">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12 col-md-3 mb-1">
                            <span>
                                Issue no:
                            </span>
                           </div>
                        <div class="col-12 col-md-9">
                            <input type="number" name="" placeholder="" :value="selectedResult[0].journalNumber" ref="journalNumber">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12 col-md-3 mb-1">
                            <span>
                                Pages used:
                            </span>
                           </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="" placeholder="A single page, or range of pages that the information can be found on." value="" ref="journalPages">
                        </div>
                    </div>

                    <h3>Online:</h3>
                    <p class="online-txt">Optional. Only complete this section if the journal is available online</p>
                    <div class="form-group row">
                        <div class="col-12 col-md-3 mb-1">
                            <span>
                                DOI:
                            </span>
                           </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="" placeholder="" :value="selectedResult[0].journalDoi" ref="journalDoi">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12 col-md-3 mb-1">
                            <span>
                               Database:
                            </span>
                           </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="" placeholder="Database" value="" ref="journalDatabase">

                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12 col-md-3 mb-1">
                            <span>
                               URL:
                            </span>
                           </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="" placeholder="http://" value="" ref="journalUrl">
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
                                    <input type="number" name="" placeholder="05" value="" ref="journalAccessDay">
                                </div>
                                <div class="col-4">
                                     <label for="">Month</label>
                                     <input type="number" name="" placeholder="10" value="" ref="journalAccessMonth">
                                </div>
                                <div class="col-4">
                                     <label for="">Year</label>
                                     <input type="number" name="" placeholder="2020" value="" ref="journalAccessYear">
                                </div>
                            </div>
                            <p class="access-date-note">Note: Access date is only required if the source may change over time.</p>
                        </div>
                    </div>


                    <button type="submit" class="btn form-submit-btn">Compelete Citation</button>

                </form>
        </div>
</template>

<script>

export default {
    props: ['selectedResult'],
    data() {
        return {
            completeCitationList: [],
            creators: []
        }
    },
    methods: {
        completeCitation() {
            let refCreators = [];
            this.creators.forEach((item, index) => {
                let creator = {
                    'firstName' : this.$refs[`journalCreatorFirstName${index}`][0].value,
                    'lastName' : this.$refs[`journalCreatorLastName${index}`][0].value,
                };
                refCreators.push(creator);
            });

            const citation = {
              journalId: this.selectedResult[0].journalId,
              journalCreators: refCreators,
              journalPublishedDate: this.$refs.journalPublishedDate.value,
              journalTitle: this.$refs.journalTitle.value,
              journalName: this.$refs.journalName.value,
              journalVolume: this.$refs.journalVolume.value,
              journalNumber: this.$refs.journalNumber.value,
              journalPages: this.$refs.journalPages.value,
              journalDoi: this.$refs.journalDoi.value,
              journalDatabase: this.$refs.journalDatabase.value,
              journalUrl: this.$refs.journalUrl.value,
              journalAccessDay: this.$refs.journalAccessDay.value,
              journalAccessMonth: this.$refs.journalAccessMonth.value,
              journalAccessYear: this.$refs.journalAccessYear.value,
            }

            // SAVE TO LOCAL STORAGE
            let journalCitation;

            if(localStorage.getItem('journalCitation') === null) {
               journalCitation = [];
            } else {
               journalCitation = JSON.parse(localStorage.getItem('journalCitation'));
            }

            journalCitation.push(citation);

            localStorage.setItem('journalCitation', JSON.stringify(journalCitation));

            this.completeCitationList.push(citation);

            this.$emit('current-active-step');

        },
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

    .online-txt,
    .access-date-note {
      font-size: 0.9rem;
    }

    .online-txt {
        margin-bottom: 1rem;
    }

    .access-date-note {
        margin: 1rem 0;
    }

</style>
