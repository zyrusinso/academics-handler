<template>
    <div class="report-citation form-wrap">
        <form @submit.prevent="completeCitation">
                <div>
                     <h3>Authors</h3>
                </div>
                <div class="form-group row my-4">
                        <div class="col-12">

                            <div class="row" v-for="(author,index) in authors" :key="index">
                            <div class="col-5 col-md-5">
                                    <label for="">First Name</label>
                                    <input type="text" name="" placeholder="" :value="author.firstName" :ref="'reportAuthorFirstName' + index">
                                </div>
                             <div class="col-5 col-md-5">
                                    <label for="">Last Name</label>
                                    <input type="text" name="" placeholder="" :value="author.lastName" :ref="'reportAuthorLastName' + index">

                             </div>
                             <div class="col-2 col-md-2 d-flex align-items-center justify-content-center">
                                  <div class="remove-author-icon" @click="removeAuthor(index)">
                                        <span>
                                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                                        </span>
                                </div>
                             </div>
                            </div>


                            <div class="add-author-btn mt-2" @click="addAuthor">
                                <div class="icon-text-wrap text-right mr-5">
                                    <span class="author-icon"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                                    <span>Add another author</span>
                                </div>
                            </div>
                        </div>
                </div>

            <p class="text-center mb-2"><span>or</span></p>
            <div class="form-group row">
                <div class="col-12 col-sm-3">
                     <label for="">Corp.author:</label>
                </div>
                <div class="col-12 col-sm-9">
                     <input type="text" name="" placeholder="If the patent was published by a company or corporate entity" :value="updateCitationRecord[0].reportCorpAuthor" ref="reportCorpAuthor">
                </div>
            </div>

            <div>
                <h3>Report</h3>
            </div>
             <div class="form-group row">
                <div class="col-12 col-sm-3">
                     <label for="">Year published:</label>
                </div>
                <div class="col-12 col-sm-9">
                     <input type="text" name="" placeholder="2021" :value="updateCitationRecord[0].reportPublishedYear" ref="reportPublishedYear">
                </div>
            </div>
             <div class="form-group row">
                <div class="col-12 col-sm-3">
                     <label for="">Title:</label>
                </div>
                <div class="col-12 col-sm-9">
                     <input type="text" name="" placeholder="The title of the report" :value="updateCitationRecord[0].reportTitle" ref="reportTitle">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-12 col-sm-3">
                     <label for="">Series title:</label>
                </div>
                <div class="col-12 col-sm-9">
                     <input type="text" name="" placeholder="The series title, if the report is part of a series" :value="updateCitationRecord[0].reportSeriesTitle" ref="reportSeriesTitle">
                </div>
            </div>

             <div class="form-group row">
                <div class="col-12 col-sm-3">
                     <label for="">City published:</label>
                </div>
                <div class="col-12 col-sm-9">
                     <input type="text" name="" placeholder="The city that the report was published in (if any)" :value="updateCitationRecord[0].reportPublishedCity" ref="reportPublishedCity">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-12 col-sm-3">
                     <label for="">Publisher:</label>
                </div>
                <div class="col-12 col-sm-9">
                     <input type="text" name="" placeholder="The publisher of the report" :value="updateCitationRecord[0].reportPublisher" ref="reportPublisher">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-12 col-sm-3">
                     <label for="">Pages used:</label>
                </div>
                <div class="col-12 col-sm-9">
                     <input type="text" name="" placeholder="A single page, or range of pages that the information can be found on." :value="updateCitationRecord[0].reportPages" ref="reportPages">
                </div>
            </div>

            <div>
                <h3>Online report</h3>
            </div>
            <div class="form-group row">
                <div class="col-12 col-sm-3">
                     <label for="">URL:</label>
                </div>
                <div class="col-12 col-sm-9">
                     <input type="text" name="" placeholder="http://" :value="updateCitationRecord[0].reportUrl" ref="reportUrl">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-12 col-sm-3">
                    <label for="">Access date:</label>
                </div>
                <div class="col-12 col-sm-9">
                    <div class="row">
                        <div class="col-4">
                            <label for="">Day</label>
                             <input type="number" name="" placeholder="05" :value="updateCitationRecord[0].reportAccessDay" ref="reportAccessDay">
                        </div>
                        <div class="col-4">
                             <label for="">Month</label>
                             <input type="number" name="" placeholder="10" :value="updateCitationRecord[0].reportAccessMonth" ref="reportAccessMonth">
                        </div>
                        <div class="col-4">
                             <label for="">Year</label>
                             <input type="number" name="" placeholder="2021" :value="updateCitationRecord[0].reportAccessYear" ref="reportAccessYear">
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn form-submit-btn">Compelete Citation</button>
        </form>
    </div>

</template>

<script>

export default {
    props: ['updateCitationRecord'],
    data() {
        return {
            authors: []
        }
    },
    methods: {
        completeCitation() {

            let reportAuthors = [];

            if(this.authors.length === 0) {
                let author = {
                    'firstName' : '',
                    'lastName' : '',
                };
                reportAuthors.push(author);

            }else {
            this.authors.forEach((item, index) => {
                let author = {
                    'firstName' : this.$refs[`reportAuthorFirstName${index}`][0].value,
                    'lastName' : this.$refs[`reportAuthorLastName${index}`][0].value,
                };
                reportAuthors.push(author);
            });
            }

            let citationList = JSON.parse(localStorage.getItem('reportCitation'));
               let modifiedCitation = citationList.map((cite) => {
                   if(cite.reportId == this.updateCitationRecord[0].reportId) {
                        cite.reportAuthors = reportAuthors;
                        cite.reportCorpAuthor = this.$refs.reportCorpAuthor.value;
                        cite.reportPublishedYear= this.$refs.reportPublishedYear.value;
                        cite.reportTitle= this.$refs.reportTitle.value;
                        cite.reportSeriesTitle= this.$refs.reportSeriesTitle.value;
                        cite.reportPublishedCity= this.$refs.reportPublishedCity.value;
                        cite.reportPublisher= this.$refs.reportPublisher.value;
                        cite.reportPages= this.$refs.reportPages.value;
                        cite.reportUrl= this.$refs.reportUrl.value;
                        cite.reportAccessDay= this.$refs.reportAccessDay.value;
                        cite.reportAccessMonth= this.$refs.reportAccessMonth.value;
                        cite.reportAccessYear= this.$refs.reportAccessYear.value;
                   }
                   return cite;
               });

               localStorage.setItem('reportCitation', JSON.stringify(modifiedCitation));
               this.$emit('record-updated');
        },
        addAuthor() {
            let author = {
                firstName: '',
                lastName: '',
            }
            this.authors.push(author);
        },
        removeAuthor(authorId) {
            let filteredAuthors = this.authors.filter((item, index) => {
                return index !== authorId;
            });
            this.authors = filteredAuthors;
        },
        addCurrentUpdateAuthors() {
           this.updateCitationRecord[0].reportAuthors.forEach(item => {
               this.authors.push(item);
           });
        }
    },
    mounted() {
        this.addCurrentUpdateAuthors();
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

    .report-citation h3{
        margin-bottom: 2rem;
        color: #333;
        font-size: 1.1rem;
    }
    .report-citation label {
        font-size: 0.9rem;
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

    .add-author-btn,
    .remove-author-icon {
        cursor: pointer;
    }

    .remove-author-icon {
        margin-top: 1.5rem;
    }
</style>
