class Errors {
    constructor() {
        this.errors = {};
    }
    get(field) {
        if (this.errors[field]){
            return this.errors[field][0];
        }
    }
    record(errors){
        this.errors = errors;
    }
    clear(field) {
        if(field) {
            delete this.errors[field];
            return;
        }
        this.errors = {};

    }

    any() {
        return Object.keys(this.errors).length > 0;
    }
}

const List = Vue.component('cv-list', {
    template: `
        <div>
            <div class="col s12 input-field">
            
                <i class="material-icons prefix">search</i>
                <input type="search" class="validate" id="searchText" name="searchText" v-model="searchText" >
                <label for="searchText">Search</label>
            </div>
            <table class="highlight">
                <thead>
                <tr>
                    <th v-for="column in columns">
                     <a href="#" v-on:click="sortBy(column, reverse)" :class="">{{ column | capitalize }}</a>
                    </th>
                </tr>
                </thead>
                
                <tbody>
                    <tr v-for="(cvrow, index) in cvlist" v-show="searchedText(cvrow, searchText)">
                        <td>
                             <router-link :to="'/edit/'+ cvrow.id" tag="span" style="cursor:pointer" v-text="cvrow.name"></router-link>
                        </td>
                        <td>
                            <router-link :to="'/edit/'+ cvrow.id" tag="span" style="cursor:pointer" v-text="cvrow.created_at"></router-link>
                        </td>
                        <td>
                            <router-link :to="'/edit/'+ cvrow.id" tag="span" style="cursor:pointer" v-text="cvrow.updated_at"></router-link>
                        </td>
                        <td>
                             <a :href="'showCv/'+cvrow.id" title="show in browser"><i class="small material-icons">visibility</i></a>
                             <a :href="'getPdf/'+cvrow.id" title="download pdf"><i class="small material-icons">play_for_work</i></a>
                             <router-link :to="'/edit/'+ cvrow.id + '/1'" title="add from copy"><i class="small material-icons">playlist_add</i></router-link>
                             <router-link :to="'/edit/'+ cvrow.id" title="edit"><i class="small material-icons">mode_edit</i></router-link>
                             <a href="javascript:void(0)" v-on:click="deleteCv(cvrow, index)" title="delete"><i class="small material-icons">delete</i></a>
                        </td>
                    </tr>


                </tbody>
               
                
            </table>
        </div>

    `,
    data() {

        return {
            cvlist: [],
            sortKey: 'name',
            reverse: false,
            columns: ['name', 'created_at', 'updated_at', 'action'],
            searchText: ''

        }
    },
    created(){
        this.getData();
    },
    filters: {
        capitalize: function (str) {
            return str.toUpperCase().replace('_', ' ');
        }
    },
    methods: {
        searchedText(object, searchText) {
            return (object.name+object.created_at+object.updated_at).toLowerCase().indexOf(searchText) > -1;
        },
        sortBy(sortKey, reverse) {
            this.cvlist.sort(function (a, b) {
                if (a[sortKey] > b[sortKey]) {
                    return (reverse) ? -1 : 1
                }
                if (a[sortKey] < b[sortKey]) {
                    return (reverse) ? 1 : -1;
                }
                return 0;
            });
            this.reverse = !this.reverse;
        },

        getData() {
            axios.get('/api/getlist').then(response => this.cvlist = response.data)
        },
        deleteCv: function(cv, index) {
            axios.get('/api/delete/'+cv.id);
            this.cvlist.splice(index, 1);
            this.getData();
        }
    }
});

const Edit = Vue.component('cv-edit', {
    template: `
<div>
    <form method="POST" action="/api/add" class="col s12" @submit.prevent="onSubmit" @keydown="errors.clear($event.target.name)">
        <input type="hidden" id="json" name="json" v-model="json">
        
        <h5>Basic information</h5>
        <div class="row">
            <div class="input-field col s6">
                <input type="text" class="validate" id="header_text" name="header_text" v-model="cvdata.header_text">
                <label for="header_text">Header text</label>
            </div>
            <div class="input-field col s6">
                <input type="text" class="validate" id="footer_text" name="footer_text" v-model="cvdata.footer_text">
                <label for="footer_text">Footer text</label>
            </div>
        </div>
        
        <div class="row">
            <div class="input-field col s6">
                <input type="text" class="validate" v-bind:class="{ invalid: errors.get('name')}" id="name" name="name" v-model="cvdata.name">
                <label for="name" v-bind:data-error="errors.get('name')">Name</label>
            </div>
            <div class="input-field col s6">
                <input type="text" class="validate" id="position"  name="position" v-model="cvdata.position">
                <label for="position" >Position</label>
            </div>
        </div>
        
        <!-- SUMMARY DETAILS & TECHNOLOGIES -->
        <div class="row">
            <div class="col s6" id="summary_details">
                <div class="card col s12">
                    <span class="card-title">Summary details</span>
                    <ul class="row">
                        <summary-item is="summary-item"
                            v-for="(detail, index) in cvdata.summary.summary_details"
                            v-bind:key="index"
                            v-bind:title="detail"
                            v-on:edit="editDetail(index)"
                            v-on:moveUp="moveElementUp(cvdata.summary.summary_details, index)"
                            v-on:moveDown="moveElementDown(cvdata.summary.summary_details, index)"
                            v-on:remove="removeDetail(index)"
                            class="col s12"
                        >
                        </summary-item>
                    </ul> 
                    <div class="row">
                        <div class="input-field col s12">
                            <a class="col s1" href="#" v-on:click.prevent="addSummaryDetailFirst" title="add to first"><i style="margin-top:10px" class="material-icons">add</i></a>
                            <input type="text"
                            class="col s9"
                            v-model="newSummaryDetail"
                            name="summarydetails"
                            >
                            <label for="summarydetails">Add new summary detail</label>
                            <a class="col s1" href="#" v-on:click.prevent="addSummaryDetail" title="add to last"><i style="margin-top:10px" class="material-icons">add</i></a>
                            
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
            <div class="col s6" id="summary_technologies">
                <div class="card col s12">
                    <span class="card-title">Summary technologies</span>
                    <ul class="row">
                        <summary-item is="summary-item"
                            v-for="(technology, index) in cvdata.summary.technologies"
                            v-bind:key="index"
                            v-bind:title="technology"
                            v-on:edit="editTechnology(index)"
                            v-on:moveUp="moveElementUp(cvdata.summary.technologies, index)"
                            v-on:moveDown="moveElementDown(cvdata.summary.technologies, index)"
                            v-on:remove="removeTechnology(index)"
                            class="col s12"
                        ></summary-item>
                            
                    </ul> 
                    <!--<div class="input-field">-->
                        <!--<input class="col s11" type="text"-->
                        <!--name="summarytechnologies"-->
                        <!--v-model="newSummaryTechnology"-->
                        <!--&gt;-->
                        <!--<label for="summarytechnologies">Add new summary technology</label>-->
                        <!--<a href="javascript:void(0)" v-on:click="addSummaryTechnology"><i style="margin-top:10px" class="material-icons">add</i></a>-->
                    <!--</div>-->
                    <div class="row">
                        <div class="input-field col s12">
                            <a class="col s1" href="#" v-on:click.prevent="addSummaryTechnologyFirst" title="add to first"><i style="margin-top:10px" class="material-icons">add</i></a>
                            <input type="text"
                            class="col s9"
                            v-model="newSummaryTechnology"
                            name="summarytechnologies"
                            >
                            <label for="summarytechnologies">Add new summary detail</label>
                            <a class="col s1" href="#" v-on:click.prevent="addSummaryTechnology" title="add to last"><i style="margin-top:10px" class="material-icons">add</i></a>
                            
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
        </div>
        
        <!-- WORK EXPIRIENCE -->
        <div class="row">
            <div class="col s12">
                <h5>Work expirience</h5>
                <work-expirience class="col s12 card"
                    is="expirience-item"
                    v-for="(expirience, index) in cvdata.work_expirience"
                    v-bind:key="expirience"
                    v-bind:expirience="expirience"
                    v-on:moveUp="moveElementUp(cvdata.work_expirience, index)"
                    v-on:moveDown="moveElementDown(cvdata.work_expirience, index)"
                    v-on:remove="cvdata.work_expirience.splice(index, 1)"
                >
                    <expirienceItemfield class="col s12"
                        is="expirience-item-field"
                        v-for="(expirienceitem, expirienceindex) in expirience.fields"
                        v-bind:key="expirienceitem"
                        v-bind:expirienceitem="expirienceitem"
                        v-on:remove="cvdata.work_expirience[index].fields.splice(expirienceindex, 1)"
                        
                    ></expirienceItemfield>
                    <div class="col s12 card-action">
                        <a href="javascript:void(0)" v-on:click="addExpirienceItemField(index)">Add new row</a>
                    </div>
                </work-expirience>
                <a href="javascript:void(0)" v-on:click="addExpirienceItem">Add new work expirience</a>
            </div>
        </div>
        
        <!-- LANGS TOOLS TECHNOLOGIES-->
        <div class="row">
            <div class="col s12">
                <h5>Advanced information </h5>
                <tooltechItem class="col s12 card"
                    is="tooltechItem"
                    v-for="(tooltech, index) in cvdata.languages_tools_technologies"
                    v-bind:key="tooltech"
                    v-bind:tooltech="tooltech"
                    v-on:moveUp="moveElementUp(cvdata.languages_tools_technologies, index)"
                    v-on:moveDown="moveElementDown(cvdata.languages_tools_technologies, index)"
                    v-on:remove="cvdata.languages_tools_technologies.splice(index, 1)"
                >
                    <tooltechItemField class="col s12"
                        is="tooltechItemField"
                        v-for="(tooltechField, toolfieldindex) in tooltech.fields"
                        v-bind:key="tooltechField"
                        v-bind:tooltechField="tooltechField"
                        v-on:remove="cvdata.languages_tools_technologies[index].fields.splice(toolfieldindex, 1)">
                    
                    </tooltechItemField>
                    <div class="col s12 card-action">
                        <a href="#" v-on:click.prevent="addTooltechItemField(index)">Add new row</a>
                    </div> 
                </tooltechItem>
                <a href="#" v-on:click.prevent="addTooltechItem">Add new Tool/Lang/Technology</a>
            </div>
        </div>
        
        
        <div class="row">
            <button class="btn" type="submit" :disabled="errors.any()">Save</button>
        </div> 
        
    </form>
</div>

    `,
    data() {
        return {
            newSummaryDetail: '',
            newSummaryTechnology: '',
            newExpirienceItem: {
                date_start: '',
                date_end: '',
                fields: [
                    {
                        name: 'Project Name',
                        value: ''
                    },
                    {
                        name: 'Description',
                        value: ''
                    },
                    {
                        name: 'Company',
                        value: 'ITREX Group'
                    },
                    {
                        name: 'Number of People',
                        value: ''
                    },
                    {
                        name: 'Roles',
                        value: ''
                    },
                    {
                        name: 'Technologies',
                        value: ''
                    },
                    {
                        name: 'Tools',
                        value: ''
                    },
                ]
            },
            newExpirienceItemField: {
                name: '',
                value: '',
            },
            newTooltechItem: {
                name: '',
                fields: [
                    {
                        name: '',
                        level: '',
                        expirience: '',
                        last_used: ''
                    }
                ]
            },
            newTooltechItemField: {
                name: '',
                level: '',
                expirience: '',
                last_used: ''
            },

            errors: new Errors(),
            json: {},
            cvdata: {
                name: '',
                header_text: '',
                footer_text: 'ITREX Group',
                position: '',
                summary:
                    {
                        summary_details: [],
                        technologies: []
                    },
                work_expirience: [],
                languages_tools_technologies: [
                    {
                        name: 'Programming Languages',
                        fields: [
                            {
                                name: '',
                                level: '',
                                expirience: '',
                                last_used: ''
                            }
                        ]
                    },
                    {
                        name: 'Programming Technologies',
                        fields: [
                            {
                                name: '',
                                level: '',
                                expirience: '',
                                last_used: ''
                            }
                        ]
                    }
                ]
            }

        };

    },
    created(){
        this.updateData();
    },

    methods: {
        updateData(){
            if(this.$route.params.id){
                axios.get('/api/getcv/'+this.$route.params.id).then(response => {
                    let json = JSON.parse(response.data.json);
                    this.cvdata = {
                        name: (typeof json.name !== "undefined" && typeof this.$route.params.addfrom === "undefined") ? json.name : '',
                        header_text: (typeof json.header_text !== "undefined") ? json.header_text : '',
                        footer_text: (typeof json.footer_text !== "undefined") ? json.footer_text : 'ITREX Group',
                        position: (typeof json.position !== "undefined") ? json.position : '',
                        summary:
                            {
                                summary_details: (typeof json.summary !== "undefined" && json.summary.summary_details) ? json.summary.summary_details : [],
                                technologies: (typeof json.summary !== "undefined" && json.summary.technologies) ? json.summary.technologies : []
                            },
                        work_expirience: (typeof json.work_expirience !== "undefined") ? json.work_expirience : [],
                        languages_tools_technologies: (typeof json.languages_tools_technologies !== "undefined") ? json.languages_tools_technologies : [
                            {
                                name: 'Programming Languages',
                                fields: [
                                    {
                                        name: '',
                                        level: '',
                                        expirience: '',
                                        last_used: ''
                                    }
                                ]
                            },
                            {
                                name: 'Programming Technologies',
                                fields: [
                                    {
                                        name: '',
                                        level: '',
                                        expirience: '',
                                        last_used: ''
                                    }
                                ]
                            }
                        ]
                    }
                });
            }
        },
        onSubmit() {
            let json = {
                header_text: this.cvdata.header_text,
                footer_text: this.cvdata.footer_text,
                name: this.cvdata.name,
                position: this.cvdata.position,
                summary: this.cvdata.summary,
                work_expirience: this.cvdata.work_expirience,
                languages_tools_technologies: this.cvdata.languages_tools_technologies
            };
            id = (this.$route.params.id && typeof this.$route.params.addfrom === "undefined") ? this.$route.params.id : '';

             axios.post('/api/add', {
                 id: id,
                 name: this.cvdata.name,
                 json: json
             })
                 .then(router.push('/'))
                 .catch(error => this.errors.record(error.response.data));

        },
        moveElementUp(array, index){
            console.log(index);
            if(array[index]){
                if(array[index-1] && typeof array[index-1] !== "undefined"){
                    let temp = array[index];
                    let temp_1 = array[index-1];
                    array.splice(index-1, 1, temp);
                    array.splice(index, 1, temp_1);
                }
            }
        },
        moveElementDown(array, index) {
            console.log(index);
            if(array[index]){
                if(array[index+1] && typeof array[index+1] !== "undefined"){
                    let temp = array[index];
                    let temp_1 = array[index+1];
                    array.splice(index+1, 1, temp);
                    array.splice(index, 1, temp_1);
                }
            }
        },

        // summary
        addSummaryDetail(){
            this.cvdata.summary.summary_details.push(this.newSummaryDetail);
            this.newSummaryDetail = '';
        },
        addSummaryDetailFirst(){
            this.cvdata.summary.summary_details.unshift(this.newSummaryDetail);
            this.newSummaryDetail = '';
        },
        editDetail(index) {

            console.log(index);
            if(this.cvdata.summary.summary_details[index]){
                this.newSummaryDetail = this.cvdata.summary.summary_details[index];
                this.cvdata.summary.summary_details.splice(index, 1);
            }
        },
        removeDetail(index){
            console.log(index);
            if(this.cvdata.summary.summary_details[index]){
                this.cvdata.summary.summary_details.splice(index, 1);
            }
        },
        addSummaryTechnology(){
            this.cvdata.summary.technologies.push(this.newSummaryTechnology);
            this.newSummaryTechnology = '';
        },
        addSummaryTechnologyFirst(){
            this.cvdata.summary.technologies.unshift(this.newSummaryTechnology);
            this.newSummaryTechnology = '';
        },
        editTechnology(index){
            if(this.cvdata.summary.technologies[index]){
                this.newSummaryTechnology = this.cvdata.summary.technologies[index];
                this.cvdata.summary.technologies.splice(index, 1);
            }
        },
        removeTechnology(index){
            if(this.cvdata.summary.technologies[index]){
                this.cvdata.summary.technologies.splice(index, 1);
            }
        },

        // work_expirience:
        addExpirienceItem(){
            this.cvdata.work_expirience.push(this.newExpirienceItem);
            this.newExpirienceItem = {
                date_start: '',
                date_end: '',
                fields: [
                    {
                        name: 'Project Name',
                        value: ''
                    },
                    {
                        name: 'Description',
                        value: ''
                    },
                    {
                        name: 'Company',
                        value: 'ITREX Group'
                    },
                    {
                        name: 'Number of People',
                        value: ''
                    },
                    {
                        name: 'Roles',
                        value: ''
                    },
                    {
                        name: 'Technologies',
                        value: ''
                    },
                    {
                        name: 'Tools',
                        value: ''
                    },
                ]
            };
        },
        addExpirienceItemField(index){
            this.cvdata.work_expirience[index].fields.push(this.newExpirienceItemField);
            this.newExpirienceItemField = {
                name: '',
                value: ''
            };
        },
        removeExpirienceItemField(mainindex, itemindex){
            this.cvdata.work_expirience[mainindex].fields.splice(itemindex, 1);
        },

        // languages_tools_technologies:
        addTooltechItem(){
            this.cvdata.languages_tools_technologies.push(this.newTooltechItem);
            this.newTooltechItem = {
                name: '',
                fields: [
                    {
                        name: '',
                        level: '',
                        expirience: '',
                        last_used: ''
                    }
                ]
            }
        },
        addTooltechItemField(index){
            this.cvdata.languages_tools_technologies[index].fields.push(this.newTooltechItemField);
            this.newTooltechItemField = {
                name: '',
                level: '',
                expirience: '',
                last_used: ''
            }
        }
    }
});

Vue.component('summary-item', {
    template: `
        <li>
            <div class="chip" style="height:auto">{{ title }}&nbsp;&nbsp;&nbsp;&nbsp;
                <i class="tiny material-icons" style="transform: rotate(270deg);position:relative;top:4px;cursor:pointer;" v-on:click.prevent="$emit('moveUp')">play_arrow</i>
                <i class="tiny material-icons" style="transform: rotate(90deg);position:relative;top:2px;cursor:pointer;" v-on:click.prevent="$emit('moveDown')">play_arrow</i>
                <i class="tiny material-icons" style="top:3px;position:relative;left:3px;cursor:pointer" v-on:click="$emit('edit')">mode_edit</i>
                <i class="tiny material-icons" style="position: relative;top:3px;left:3px;cursor:pointer" v-on:click="$emit('remove')">close</i>
            </div> 
        </li>
    `,
    props: ['title']
});

Vue.component('expirience-item', {
    template: `
        <div>
            <div class="col s11">
                <span class="card-title left">
                    <strong>{{ expirience.date_start }} {{ expirience.date_end }}</strong>
                    
                </span>
                <input class="col s3 right" type="text" v-model="expirience.date_end" placeholder="End date">
                <input class="col s3 right" type="text" v-model="expirience.date_start" placeholder="Start date">
                
            </div>
            <div class="col s1">
                <a href="javascript:void(0)" class="right"><i style="margin-top: 10px" class="close material-icons" v-on:click="$emit('remove')">close</i></a>
                <a href="javascript:void(0)" class="right"><i class="material-icons" style="transform: rotate(270deg);position:relative;top:12px;left:3px;" v-on:click.prevent="$emit('moveUp')">play_arrow</i></a>
                <a href="javascript:void(0)" class="right"><i class="material-icons" style="transform: rotate(90deg);position:relative;top:9px;left:3px;" v-on:click.prevent="$emit('moveDown')">play_arrow</i></a>
            </div>
            <slot></slot>
        </div>
    `,
    props: ['expirience'],

});

Vue.component('expirience-item-field', {
    template: `
        <div>
            <div class="input-field col s3">
                <input type="text" class="validate" v-model="expirienceitem.name" placeholder="Add Header">
            </div>
            <div class="input-field col s8">
                <input type="text" class="validate" v-model="expirienceitem.value" placeholder="Add value">
            </div>
            <div class="col s1">
                <a href="javascript:void(0)"><i class="close material-icons mt-15" v-on:click="$emit('remove')">close</i></a>
            </div>
            <slot></slot>
        </div>
    `,
    props: ['expirienceitem']
});

Vue.component('tooltechItem', {
    template: `
        <div>
            <div class="col s11">
                <span class="card-title left">
                    <strong>{{ tooltech.name }}</strong>
                    
                </span>
                <input class="col s3 right" type="text" v-model="tooltech.name" placeholder="Name">
                
            </div>
            <div class="col s1">
                <a href="javascript:void(0)" class="right"><i style="margin-top: 10px" class="close material-icons" v-on:click="$emit('remove')">close</i></a>
                <a href="javascript:void(0)" class="right"><i class="material-icons" style="transform: rotate(270deg);position:relative;top:12px;left:3px;" v-on:click.prevent="$emit('moveUp')">play_arrow</i></a>
                <a href="javascript:void(0)" class="right"><i class="material-icons" style="transform: rotate(90deg);position:relative;top:9px;left:3px;" v-on:click.prevent="$emit('moveDown')">play_arrow</i></a>
            </div>
            <slot></slot>
        </div>
    `,
    props: ['tooltech'],
});

Vue.component('tooltechItemField', {
    template: `
        <div>
            <div class="input-field col s2">
                <input type="text" class="validate" v-model="tooltechField.name" placeholder="Name">
            </div>
            <div class="input-field col s3">
                <input type="text" class="validate" v-model="tooltechField.level" placeholder="Level">
            </div>
            <div class="input-field col s3">
                <input type="text" class="validate" v-model="tooltechField.expirience" placeholder="Expirience">
            </div>
            <div class="input-field col s3">
                <input type="text" class="validate" v-model="tooltechField.last_used" placeholder="Last used">
            </div>
            <div class="col s1">
                <a href="javascript:void(0)"><i class="close material-icons mt-15" v-on:click="$emit('remove')">close</i></a>
            </div>
            <slot></slot>
        </div>
    `,
    props: ['tooltechField']
});

const routes = [
    { path: '/', redirect: '/list'},
    { path: '/list', component: List },
    { path: '/edit/:id?/:addfrom?', component: Edit },
    // { path: '/edit', component: Edit },
];
const router = new VueRouter({
    routes
});

var app = new Vue({
    el: '#root',
    router,

});