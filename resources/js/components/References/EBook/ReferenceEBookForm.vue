<template>
    <div class="ebook-citation">
        <form @submit.prevent="completeCitation">
              <h3>E-book Citation:</h3>
                <div>
                     <h3>Authors</h3>
                </div>
                <div class="form-group row my-4">
                        <div class="col-12">

                            <div class="row" v-for="(author,index) in authors" :key="index">
                            <div class="col-5 col-md-5">
                                    <label for="">First Name</label>
                                    <input type="text" name="" placeholder="" value="" :ref="'ebookAuthorFirstName' + index">
                                </div>
                             <div class="col-5 col-md-5">
                                    <label for="">Last Name</label>
                                    <input type="text" name="" placeholder="" value="" :ref="'ebookAuthorLastName' + index">

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

            <div>
                <h3>E-book</h3>
            </div>
             <div class="form-group row">
                <div class="col-12 col-sm-3">
                     <label for="">Year published:</label>
                </div>
                <div class="col-12 col-sm-9">
                     <input type="text" name="" placeholder="2021" value="" ref="ebookPublishedYear">
                </div>
            </div>
             <div class="form-group row">
                <div class="col-12 col-sm-3">
                     <label for="">Title:</label>
                </div>
                <div class="col-12 col-sm-9">
                     <input type="text" name="" placeholder="The title of the e-book" value="" ref="ebookTitle">
                </div>
            </div>

            <div class="form-group row">
                        <div class="col-12 col-md-3 mb-1">
                            <span>
                                Edition:
                            </span>
                           </div>
                        <div class="col-12 col-md-9">
                            <select name="" id="" v-html="editions" ref="ebookEdition">
                            </select>
                        </div>
            </div>



             <div class="form-group row">
                <div class="col-12 col-sm-3">
                     <label for="">City published:</label>
                </div>
                <div class="col-12 col-sm-9">
                     <input type="text" name="" placeholder="The city that the e-book was published in" value="" ref="ebookPublishedCity">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-12 col-sm-3">
                     <label for="">Publisher:</label>
                </div>
                <div class="col-12 col-sm-9">
                     <input type="text" name="" placeholder="The publisher of the e-book" value="" ref="ebookPublisher">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-12 col-sm-3">
                     <label for="">Pages used:</label>
                </div>
                <div class="col-12 col-sm-9">
                     <input type="text" name="" placeholder="A single page, or range of pages that the information can be found on." value="" ref="ebookPages">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-12 col-sm-3">
                     <label for="">Available via:</label>
                </div>
                <div class="col-12 col-sm-9">
                     <input type="text" name="" placeholder="The name of the website that the e-book is accessible from. Eg: Google Scholar" value="" ref="ebookAvalaible">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-12 col-sm-3">
                     <label for="">URL:</label>
                </div>
                <div class="col-12 col-sm-9">
                     <input type="text" name="" placeholder="http://" value="" ref="ebookUrl">
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
                             <input type="number" name="" placeholder="05" value="" ref="ebookAccessDay">
                        </div>
                        <div class="col-4">
                             <label for="">Month</label>
                             <input type="number" name="" placeholder="10" value="" ref="ebookAccessMonth">
                        </div>
                        <div class="col-4">
                             <label for="">Year</label>
                             <input type="number" name="" placeholder="2021" value="" ref="ebookAccessYear">
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
            authors: [],
            editions: ''
        }
    },
    methods: {
        completeCitation() {

            let ebookAuthors = [];

            if(this.authors.length === 0) {
                let author = {
                    'firstName' : '',
                    'lastName' : '',
                };
                ebookAuthors.push(author);

            }else {
            this.authors.forEach((item, index) => {
                let author = {
                    'firstName' : this.$refs[`ebookAuthorFirstName${index}`][0].value,
                    'lastName' : this.$refs[`ebookAuthorLastName${index}`][0].value,
                };
                ebookAuthors.push(author);
            });
            }

            const citation = {
              ebookId: uuidv4(),
              ebookAuthors: ebookAuthors,
              ebookPublishedYear: this.$refs.ebookPublishedYear.value,
              ebookTitle: this.$refs.ebookTitle.value,
              ebookEdition: this.$refs.ebookEdition.value,
              ebookPublishedCity: this.$refs.ebookPublishedCity.value,
              ebookPublisher: this.$refs.ebookPublisher.value,
              ebookPages: this.$refs.ebookPages.value,
              ebookAvalaible: this.$refs.ebookAvalaible.value,
              ebookUrl: this.$refs.ebookUrl.value,
              ebookAccessDay: this.$refs.ebookAccessDay.value,
              ebookAccessMonth: this.$refs.ebookAccessMonth.value,
              ebookAccessYear: this.$refs.ebookAccessYear.value,
            }

            // SAVE TO LOCAL STORAGE
            let ebookCitation;

            if(localStorage.getItem('ebookCitation') === null) {
               ebookCitation = [];
            } else {
               ebookCitation = JSON.parse(localStorage.getItem('ebookCitation'));
            }

            ebookCitation.push(citation);

            localStorage.setItem('ebookCitation', JSON.stringify(ebookCitation));

            this.completeCitationList.push(citation);

            this.$emit('active-tab', 'citation-list');
            this.$emit('active-citation-list-tab', 'ebook-citation');

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
        editionOptions() {

            let options = '';
            for(let i = 0; i <= 100; i++) {
                if(i == 0 ) {
                  options +=  `<option value=""></option>`;
                } else {
                    options +=  `<option value="${i}">${i}</option>`;
                }
            }
            this.editions = options;
        }
    },
    mounted() {
        this.addAuthor();
        this.editionOptions();
    }
}
</script>


<style scoped>
    .ebook-citation h3{
        margin-bottom: 2rem;
        color: #333;
        font-size: 1.1rem;
    }
    .ebook-citation label {
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

    .access-date-note {
      font-size: 0.9rem;
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
