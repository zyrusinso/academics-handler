<template>
    <div class="report-citation">
        <form @submit.prevent="completeCitation">
              <h3>Report Citation:</h3>
                <div>
                     <h3>Authors</h3>
                </div>
                <div class="form-group row my-4">
                        <div class="col-12">

                            <div class="row" v-for="(author,index) in authors" :key="index">
                            <div class="col-5 col-md-5">
                                    <label for="">First Name</label>
                                    <input type="text" name="" placeholder="" value="" :ref="'reportAuthorFirstName' + index">
                                </div>
                             <div class="col-5 col-md-5">
                                    <label for="">Last Name</label>
                                    <input type="text" name="" placeholder="" value="" :ref="'reportAuthorLastName' + index">

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
                     <input type="text" name="" placeholder="If the patent was published by a company or corporate entity" value="" ref="reportCorpAuthor">
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
                     <input type="text" name="" placeholder="2021" value="" ref="reportPublishedYear">
                </div>
            </div>
             <div class="form-group row">
                <div class="col-12 col-sm-3">
                     <label for="">Title:</label>
                </div>
                <div class="col-12 col-sm-9">
                     <input type="text" name="" placeholder="The title of the report" value="" ref="reportTitle">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-12 col-sm-3">
                     <label for="">Series title:</label>
                </div>
                <div class="col-12 col-sm-9">
                     <input type="text" name="" placeholder="The series title, if the report is part of a series" value="" ref="reportSeriesTitle">
                </div>
            </div>

             <div class="form-group row">
                <div class="col-12 col-sm-3">
                     <label for="">City published:</label>
                </div>
                <div class="col-12 col-sm-9">
                     <input type="text" name="" placeholder="The city that the report was published in (if any)" value="" ref="reportPublishedCity">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-12 col-sm-3">
                     <label for="">Publisher:</label>
                </div>
                <div class="col-12 col-sm-9">
                     <input type="text" name="" placeholder="The publisher of the report" value="" ref="reportPublisher">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-12 col-sm-3">
                     <label for="">Pages used:</label>
                </div>
                <div class="col-12 col-sm-9">
                     <input type="text" name="" placeholder="A single page, or range of pages that the information can be found on." value="" ref="reportPages">
                </div>
            </div>

            <div>
                <h3>Online report</h3>
            </div>
            <p class="online-txt">Optional. Only complete this section if the report is available online</p>
            <div class="form-group row">
                <div class="col-12 col-sm-3">
                     <label for="">URL:</label>
                </div>
                <div class="col-12 col-sm-9">
                     <input type="text" name="" placeholder="http://" value="" ref="reportUrl">
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
                             <input type="number" name="" placeholder="05" value="" ref="reportAccessDay">
                        </div>
                        <div class="col-4">
                             <label for="">Month</label>
                             <input type="number" name="" placeholder="10" value="" ref="reportAccessMonth">
                        </div>
                        <div class="col-4">
                             <label for="">Year</label>
                             <input type="number" name="" placeholder="2021" value="" ref="reportAccessYear">
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

import { v4 as uuidv4 } from 'uuid';

export default {
    data() {
        return {
            completeCitationList: [],
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

            const citation = {
              reportId: uuidv4(),
              reportAuthors: reportAuthors,
              reportCorpAuthor: this.$refs.reportCorpAuthor.value,
              reportPublishedYear: this.$refs.reportPublishedYear.value,
              reportTitle: this.$refs.reportTitle.value,
              reportSeriesTitle: this.$refs.reportSeriesTitle.value,
              reportPublishedCity: this.$refs.reportPublishedCity.value,
              reportPublisher: this.$refs.reportPublisher.value,
              reportPages: this.$refs.reportPages.value,
              reportUrl: this.$refs.reportUrl.value,
              reportAccessDay: this.$refs.reportAccessDay.value,
              reportAccessMonth: this.$refs.reportAccessMonth.value,
              reportAccessYear: this.$refs.reportAccessYear.value,
            }

            // SAVE TO LOCAL STORAGE
            let reportCitation;

            if(localStorage.getItem('reportCitation') === null) {
               reportCitation = [];
            } else {
               reportCitation = JSON.parse(localStorage.getItem('reportCitation'));
            }

            reportCitation.push(citation);

            localStorage.setItem('reportCitation', JSON.stringify(reportCitation));

            this.completeCitationList.push(citation);

            this.$emit('active-tab', 'citation-list');
            this.$emit('active-citation-list-tab', 'report-citation');

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
        }
    },
    mounted() {
        this.addAuthor();
    }
}
</script>


<style scoped>
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
