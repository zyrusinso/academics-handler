<template>
     <div class="citation-item">

         <div class="text-copied" v-if="textCopied">
             <p><i class="fa fa-check mr-2"></i>Text copied to clipboard</p>
         </div>

            <div class="row align-items-center">
            <div class="col-10 col-md-8">
                <h6 class="mb-2 change-style">Change Style</h6>
                <select name="" id="" @change="changeCitationStyle">
                    <option value="mla8">MLA8</option>
                    <option value="mla7">MLA7</option>
                    <option value="apa7">APA7</option>
                    <option value="apa6">APA6</option>
                    <option value="harvard">Harvard</option>
                    <option value="vancouver">Vancouver</option>
                    <option value="oscola">Oscola</option>
                </select>
            </div>

         </div>

        <div class="my-4">
            <div class="d-flex">
                <div>
                    <h3 class="bib-head" v-if="format === 'oscola'">Footnote:</h3>
                    <h3 class="bib-head" v-else>In-text:</h3>
                </div>

                <button type="button"
                v-clipboard:copy="inTextContent"
                v-clipboard:success="onCopyInText"
                v-clipboard:error="onErrorInText"
                @click="inTextClicked"
                class="copy-text-btn"
                title="Copy In-text Citation"
                >Copy</button>
            </div>

            <div v-html="formatInText" class="intext-content" id="intext-content">
             </div>
        </div>

         <div>
            <h3 class="bib-head">Your Bibliography:
                <button type="button"
                v-clipboard:copy="bibContent"
                v-clipboard:success="onCopy"
                v-clipboard:error="onError"
                @click="bibClicked"
                class="copy-text-btn"
                title="Copy Bibliography"
                >Copy</button>
                </h3>
        </div>

         <div v-html="formatItem" class="bib-content" id="bib-content">
         </div>
         <div class="mt-4 update-delete-btns">
             <button class="btn update-btn" @click="updateCite(citeList.journalId)">Update</button>
             <button class="btn delete-btn" @click="deleteCite(citeList.journalId)">Delete</button>
         </div>
    </div>
</template>

<script>

export default {
    props: ['citeList'],
    data() {
        return {
            formatItem: '',
            format: 'mla8',
            formatInText: '',
            bibContent: '',
            inTextContent: '',
            textCopied: false,
        }
    },
    methods: {
        deleteCite(journalCitationId) {

            if(confirm('Are You Sure?')){

                // DELETE FROM LOCAL STORAGE
                let storageCitation;

                if(localStorage.getItem('journalCitation') === null) {
                    storageCitation = [];
                } else {
                    storageCitation = JSON.parse(localStorage.getItem('journalCitation'));
                }

                let filteredList = storageCitation.filter((item) => {
                    return item.journalId !== journalCitationId;
                });

                localStorage.setItem('journalCitation', JSON.stringify(filteredList));

                this.$emit('filteredList');
                this.$emit('record-deleted');

            }
        },
        updateCite(updateCitationId) {
            this.$emit('update-cite', updateCitationId);
        },
        bibClicked() {
            this.bibContent = this.formatItem.replace(/<[^>]*>?/gm, '');
            this.onCopy();
        },
        inTextClicked() {
            this.inTextContent = this.formatInText.replace(/<[^>]*>?/gm, '');
            this.onCopyInText();
        },
        onCopy(e) {
            if(this.bibContent.length !== 0) {
                this.textCopied = true;
                setTimeout(() => {
                    this.textCopied = false
                }, 2000);
            }
        },
        onCopyInText() {
             if(this.inTextContent.length !== 0) {
                this.textCopied = true;
                setTimeout(() => {
                    this.textCopied = false
                }, 2000);
            }
        },
        onError(e) {
            alert('Failed to copy text.');
        },
        onErrorInText(e) {
            alert('Failed to copy text.');
        },
        changeCitationStyle(event) {

             if(event === null) {
                   this.format = 'mla8';
              } else {
                   this.format = event.target.value;
              }

            // demo.js
            // for citeproc-js CSL citation formatter

            var chosenStyleID = this.format;
            var xhr = new XMLHttpRequest();
            let date = new Date();

            let authors = [];

            this.citeList.journalCreators.forEach(item => {
                let items = {"family": item.firstName,"given": item.lastName };
                authors.push(items);
            });

              var items = [
               {"type":"article-journal","multi":{"main":{},"_keys":{}},
               "title":this.citeList.journalName,
               "container-title":this.citeList.journalTitle,
               "number-of-pages":this.citeList.journalPages,
               "volume": this.citeList.journalVolume,
               "issue": this.citeList.journalNumber,
               "DOI":this.citeList.journalDoi,
               "URL": this.citeList.journalUrl,
               "author":authors,
               "issued":{"date-parts":[[this.citeList.journalPublishedDate]]},
               "accessed":{"date-parts":[[this.citeList.journalAccessYear,this.citeList.journalAccessMonth,this.citeList.journalAccessDay]]},
               "id":this.citeList.journalId}
            ];


            var citations = {};
            var itemIDs = [];

            var citationData = {items: items};
          //  console.log(citationData);
           // console.log(citationData.items.length);
            var citations = {};
            var itemIDs = [];
            for (var i=0,ilen=citationData.items.length;i<ilen;i++) {
            var item = citationData.items[i];
            // if (!item.issued) continue;
            // if (item.URL) delete item.URL;
            var id = item.id;
            citations[id] = item;
            itemIDs.push(id);
            }

        //    console.log(citations);
        //    console.log(itemIDs);

            xhr.open('GET', 'js/package/citeproc-js/demo/styles/' + chosenStyleID + '.csl', false);
            xhr.send(null);
            var style = xhr.responseText;

            // Initialize a system object, which contains two methods needed by the
            // engine.
            let citeprocSys = {
                // Given a language tag in RFC-4646 form, this method retrieves the
                // locale definition file.  This method must return a valid *serialized*
                // CSL locale. (In other words, an blob of XML as an unparsed string.  The
                // processor will fail on a native XML object or buffer).
                retrieveLocale: function (lang){
                    xhr.open('GET', 'js/package/citeproc-js/demo/locale/locales-' + lang + '.xml', false);
                    xhr.send(null);
                    return xhr.responseText;
                },

                // Given an identifier, this retrieves one citation item.  This method
                // must return a valid CSL-JSON object.
                retrieveItem: function(id){
                    return citations[id];
                }
            };

            // Given the identifier of a CSL style, this function instantiates a CSL.Engine
            // object that can render citations in that style.
            function getProcessor() {
                // Instantiate and return the engine
                var citeproc = new CSL.Engine(citeprocSys, style);
                return citeproc;
            };


            var citeproc = getProcessor();

            let inTextCitation = '';
            function processorOutput() {
                let ret = '';
                var citeproc = getProcessor(chosenStyleID);
                citeproc.updateItems(itemIDs);
                var result = citeproc.makeBibliography();
                inTextCitation = citeproc.makeCitationCluster(items);
                return result[1].join('\n');
            }

            let final = processorOutput();
            this.formatInText = inTextCitation;
            this.formatItem = final;

        },
    },
    mounted(){
        this.changeCitationStyle(null);
    }
}
</script>

<style scoped>

    .text-copied {
        padding: 1rem 0;
        margin-bottom: 1rem;
        color: #46d846;
    }

    .citation-item {
        margin-bottom: 1rem;
        box-shadow: 0px 0px 13px 1px rgb(0 0 0 / 10%);
        padding: 1.5rem 1rem;
    }

    .citation-item .bib-head {
        color: #585858;
        margin-bottom: 0.4rem
    }

    .citation-item .bib-content,
    .citation-item .intext-content {
        font-size: 0.85rem;
    }

    .citation-item .change-style {
        color: #585858;
        font-size: 0.85rem;
    }

    .update-delete-btns button{
        text-transform: capitalize;
        font-size: 0.85rem;
        margin-right: 0.5rem;
        border-radius: 30px;
    }

    .update-delete-btns .update-btn {
        background-color: #ffb022;
        color: #fff;
    }

    .update-delete-btns .update-btn:hover {
        background-color: #f5b427;
    }

    .update-delete-btns .delete-btn {
        background-color: #fff;
        border: 2px solid rgb(211, 54, 54);
        color: rgb(211, 54, 54);
    }

    .copy-text-btn {
        margin: -0.1rem 0 0.3rem 1rem;
        background-color: #fff;
        border: none;
        border-bottom: 2px solid #f5b427;
        color: #f5b427;
        padding: 0 0.5rem;
        text-transform: capitalize;
    }
</style>

