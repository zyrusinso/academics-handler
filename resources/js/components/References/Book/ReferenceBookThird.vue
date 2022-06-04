<template>
     <div v-if="selectedResult.length !== 0 " class="complete-citation">
                <form @submit.prevent="completeCitation">
                    <h3>What I'm citing:</h3>
                    <div class="form-group row my-4">
                        <div class="col-12 col-xl-3">
                             <h3>Author:</h3>
                        </div>

                        <div class="col-12 col-xl-9">
                            <div class="row">
                                <div class="col-6 col-md-6">
                                    <label for="">First Name</label>
                                    <input type="text" name="" placeholder="" :value="authorFirstName" ref="bookAuthorFirstName">
                                </div>
                                <div class="col-6 col-md-6">
                                    <label for="">Last Name</label>
                                     <input type="text" name="" placeholder="" :value="authorLastName" ref="bookAuthorLastName">
                                </div>
                            </div>

                        </div>
                    </div>

                    <h3>Book:</h3>
                    <div class="form-group row">
                        <div class="col-12 col-md-3 mb-1">
                            <span>
                                Year Published:
                            </span>
                           </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="" placeholder="" :value="selectedResult[0].bookPublished" ref="bookPublished">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12 col-md-3 mb-1">
                            <span>
                                Title:
                            </span>
                           </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="" placeholder="" :value="selectedResult[0].bookTitle" ref="bookTitle">
                        </div>
                    </div>

                      <div class="form-group row">
                        <div class="col-12 col-md-3 mb-1">
                            <span>
                                Edition:
                            </span>
                           </div>
                        <div class="col-12 col-md-9">
                            <select name="" id="" v-html="editions" ref="bookEdition">
                            </select>
                        </div>
                    </div>

                     <div class="form-group row">
                        <div class="col-12 col-md-3 mb-1">
                            <span>
                                Publisher:
                            </span>
                           </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="" placeholder="" :value="selectedResult[0].bookPublisher" ref="bookPublisher">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12 col-md-3 mb-1">
                            <span>
                                Pages used:
                            </span>
                           </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="" placeholder="A single page, or range of pages that the information can be found on." value="" ref="bookPages">
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
            authorFirstName: '',
            authorLastName: '',
            editions: ''
        }
    },
    methods: {
        completeCitation() {
            const citation = {
              bookId: this.selectedResult[0].bookId,
              bookAuthorFirstName: this.$refs.bookAuthorFirstName.value,
              bookAuthorLastName: this.$refs.bookAuthorLastName.value,
              bookPublished: this.$refs.bookPublished.value,
              bookTitle: this.$refs.bookTitle.value,
              bookEdition: this.$refs.bookEdition.value,
              bookPublisher: this.$refs.bookPublisher.value,
              bookPages: this.$refs.bookPages.value,
              bookInfoLink: this.selectedResult[0].bookInfoLink
            }

            // SAVE TO LOCAL STORAGE
            let bookCitation;

            if(localStorage.getItem('bookCitation') === null) {
               bookCitation = [];
            } else {
               bookCitation = JSON.parse(localStorage.getItem('bookCitation'));
            }

            bookCitation.push(citation);

            localStorage.setItem('bookCitation', JSON.stringify(bookCitation));

            this.completeCitationList.push(citation);

            this.$emit('current-active-step');

        },
        splitFullName() {
            let bookAuthorArr = this.selectedResult[0].bookAuthor.split(' ');
            this.authorFirstName = bookAuthorArr[0];
            this.authorLastName = bookAuthorArr[bookAuthorArr.length - 1];
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
        this.splitFullName();
        this.editionOptions();
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
