<template>
    <div class="update-citation">
         <form @submit.prevent="updateCitation">
                   <div class="form-group row my-4">
                        <div class="col-12 col-xl-3">
                             <h3>Author:</h3>
                        </div>

                        <div class="col-12 col-xl-9">
                            <div class="row">
                                <div class="col-6 col-md-6">
                                    <label for="">First Name</label>
                                    <input type="text" name="" placeholder="" :value="updateCitationRecord[0].bookAuthorFirstName" ref="bookAuthorFirstName">
                                </div>
                                <div class="col-6 col-md-6">
                                    <label for="">Last Name</label>
                                     <input type="text" name="" placeholder="" :value="updateCitationRecord[0].bookAuthorLastName" ref="bookAuthorLastName">
                                </div>
                            </div>

                        </div>
                    </div>

                    <h3>Book:</h3>
                    <div class="form-group row">
                        <div class="col-3 col-md-3 mb-1">
                            <span>
                                Year Published:
                            </span>
                           </div>
                        <div class="col-9 col-md-9">
                            <input type="text" name="" placeholder="" :value="updateCitationRecord[0].bookPublished" ref="bookPublished">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-3 col-md-3 mb-1">
                            <span>
                                Title:
                            </span>
                           </div>
                        <div class="col-9 col-md-9">
                            <input type="text" name="" placeholder="" :value="updateCitationRecord[0].bookTitle" ref="bookTitle">
                        </div>
                    </div>

                      <div class="form-group row">
                        <div class="col-3 col-md-3 mb-1">
                            <span>
                                Edition:
                            </span>
                           </div>
                        <div class="col-9 col-md-9">
                            <select name="" id="" v-html="editions" ref="bookEdition">
                            </select>
                        </div>
                    </div>

                     <div class="form-group row">
                        <div class="col-3 col-md-3 mb-1">
                            <span>
                                Publisher:
                            </span>
                           </div>
                        <div class="col-9 col-md-9">
                            <input type="text" name="" placeholder="" :value="updateCitationRecord[0].bookPublisher" ref="bookPublisher">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-3 col-md-3 mb-1">
                            <span>
                                Pages used:
                            </span>
                           </div>
                        <div class="col-9 col-md-9">
                            <input type="text" name="" placeholder="A single page, or range of pages that the information can be found on." :value="updateCitationRecord[0].bookPages" ref="bookPages">
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
            editions: ''
        }
    },
    methods: {
        updateCitation() {
            let citationList = JSON.parse(localStorage.getItem('bookCitation'));
               let modifiedCitation = citationList.map((cite) => {
                   if(cite.bookId == this.updateCitationRecord[0].bookId) {
                        cite.bookAuthorFirstName = this.$refs.bookAuthorFirstName.value;
                        cite.bookAuthorLastName = this.$refs.bookAuthorLastName.value;
                        cite.bookEdition = this.$refs.bookEdition.value;
                        cite.bookPages = this.$refs.bookPages.value;
                        cite.bookPublished = this.$refs.bookPublished.value;
                        cite.bookPublisher = this.$refs.bookPublisher.value;
                        cite.bookTitle = this.$refs.bookTitle.value;
                   }
                   return cite;
               });

               localStorage.setItem('bookCitation', JSON.stringify(modifiedCitation));
               this.$emit('record-updated');
        },
        editionOptions(bookEdition) {

            let options = '';
            for(let i = 0; i <= 100; i++) {
                if(i == 0 ) {
                  options +=  `<option value=""></option>`;
                }else {
                    options +=  `<option value="${i}" ${(i == bookEdition) ? 'selected' : ''}>${i}</option>`;
                }
            }
            this.editions = options;
        }
    },
    mounted() {
        this.editionOptions(this.updateCitationRecord[0].bookEdition);
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
