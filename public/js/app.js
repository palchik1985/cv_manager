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

class Form {
    constructor(data) {
        this.data = data;

        for(let field in data) {
            this[field] = data[field];
        }

        this.errors = new Errors();
    }

    reset() {

    }

    submit() {
        //axios
    }



}


const List = Vue.component('cv-list', {
    template: `
<table class="highlight">
    <thead>
    <tr>
        <th>Name</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Action</th>
    </tr>
    </thead>

    <tbody>
        <tr v-for="(cvrow, index) in cvlist">
            <td v-text="cvrow.name"></td>
            <td v-text="cvrow.created_at"></td>
            <td v-text="cvrow.updated_at"></td>
            <td>
                 <a :href="'showCv/'+cvrow.id"><i class="small material-icons">visibility</i></a>
                 <a :href="'getPdf/'+cvrow.id"><i class="small material-icons">play_for_work</i></a>
                 <a href="#" class="" v-on:click="addFromCopy(cvrow)"><i class="small material-icons">playlist_add</i></a>
                 <a href="#" class="" v-on:click="editCv(cvrow)"><i class="small material-icons">mode_edit</i></a>
                 <a href="javascript:void(0)" v-on:click="deleteCv(cvrow, index)"><i class="small material-icons">delete</i></a>
            </td>
        </tr>


    </tbody>
</table>
    `,
    data() {

        return { cvlist: [] }
    },
    created(){
        axios.get('/api/getlist').then(response => this.cvlist = response.data);
    },
    methods: {

        addFromCopy: function(cv) {
            alert('addFromCopy');
        },
        editCv: function(cv) {
            alert('edit');
        },
        deleteCv: function(cv, index) {
            axios.get('/api/delete/'+cv.id);
            this.cvlist.splice(index, 1);
            axios.get('/api/getlist').then(response => this.cvlist = response.data);
        }
    }

});

const Add = {
    template: `
<div class="row">
    <form method="POST" action="/api/add" class="col s12" @submit.prevent="onSubmit" @keydown="errors.clear($event.target.name)">
        <input type="hidden" id="json" name="json" v-model="json">
        
        <h5>Basic information</h5>
        <div class="row">
            <div class="input-field col s6">
                <input type="text" class="validate" id="header_text" name="header_text" v-model="header_text">
                <label for="header_text">Header text</label>
            </div>
            <div class="input-field col s6">
                <input type="text" class="validate" id="footer_text" name="footer_text" v-model="footer_text">
                <label for="footer_text">Footer text</label>
            </div>
        </div>
        
        <div class="row">
            <div class="input-field col s6">
                <input type="text" class="validate" v-bind:class="{ invalid: errors.get('name')}" id="name" name="name" v-model="name">
                <label for="name" v-bind:data-error="errors.get('name')">Name</label>
            </div>
            <div class="input-field col s6">
                <input type="text" class="validate" id="position"  name="position" v-model="position">
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
                            v-for="(detail, index) in summary.summary_details"
                            v-bind:key="detail"
                            v-bind:title="detail"
                            v-on:remove="summary.summary_details.splice(index, 1)"
                            class="col s9"
                        >
                        </summary-item>
                    </ul> 
                    
                    <div class="input-field">
                        <input class="col s11" type="text"
                        v-model="newSummaryDetail"
                        name="summarydetails"
                        >
                        <label for="summarydetails">Add new summary detail</label>
                        <a href="javascript:void(0)" v-on:click="addSummaryDetail"><i style="margin-top:10px" class="material-icons">add</i></a>
                    </div>
                </div>
                
            </div>
            <div class="col s6" id="summary_technologies">
                <div class="card col s12">
                    <span class="card-title">Summary technologies</span>
                    <ul class="row">
                        <summary-item is="summary-item"
                            v-for="(technology, index) in summary.technologies"
                            v-bind:key="technology"
                            v-bind:title="technology"
                            v-on:remove="summary.technologies.splice(index, 1)"
                            class="col s9"
                        ></summary-item>
                            
                    </ul> 
                    <div class="input-field">
                        <input class="col s11" type="text"
                        name="summarytechnologies"
                        v-model="newSummaryTechnology"
                        >
                        <label for="summarytechnologies">Add new summary technology</label>
                        <a href="javascript:void(0)" v-on:click="addSummaryTechnology"><i style="margin-top:10px" class="material-icons">add</i></a>
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
                    v-for="(expirience, index) in work_expirience"
                    v-bind:key="expirience"
                    v-bind:expirience="expirience"
                    v-on:remove="work_expirience.splice(index, 1)"
                >
                    <expirienceItemfield class="col s12"
                        is="expirience-item-field"
                        v-for="(expirienceitem, expirienceindex) in expirience.fields"
                        v-bind:key="expirienceitem"
                        v-bind:expirienceitem="expirienceitem"
                        v-on:remove="removeExpirienceItemField(index, expirienceindex)"
                        
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
                    v-for="(tooltech, index) in languages_tools_technologies"
                    v-bind:key="tooltech"
                    v-bind:tooltech="tooltech"
                    v-on:remove="languages_tools_technologies.splice(index, 1)"
                >
                    <tooltechItemField class="col s12"
                        is="tooltechItemField"
                        v-for="(tooltechField, toolfieldindex) in tooltech.fields"
                        v-bind:key="tooltechField"
                        v-bind:tooltechField="tooltechField"
                        v-on:remove="removeTooltechItemField(index, toolfieldindex)">
                    
                    </tooltechItemField>
                    <div class="col s12 card-action">
                        <a href="javascript:void(0)" v-on:click="addTooltechItemField(index)">Add new row</a>
                    </div> 
                </tooltechItem>
                <a href="javascript:void(0)" v-on:click="addTooltechItem">Add new Tool/Lang/Technology</a>
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
        };

    },
    methods: {
        onSubmit() {
            let json = {
                header_text: this.header_text,
                footer_text: this.footer_text,
                name: this.name,
                position: this.position,
                summary: this.summary,
                work_expirience: this.work_expirience,
                languages_tools_technologies: this.languages_tools_technologies
            };

             axios.post('/api/add', {
                 name: this.name,
                 json: json
             })
                 .then(response => alert('Saved'))
                 .catch(error => this.errors.record(error.response.data));
             console.log(json);
        },
        addSummaryDetail(){
            this.summary.summary_details.push(this.newSummaryDetail);
            this.newSummaryDetail = '';
        },
        addSummaryTechnology(){
            this.summary.technologies.push(this.newSummaryTechnology);
            this.newSummaryTechnology = '';
        },

        // work_expirience:
        addExpirienceItem(){
            this.work_expirience.push(this.newExpirienceItem);
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
            this.work_expirience[index].fields.push(this.newExpirienceItemField);
            this.newExpirienceItemField = {
                name: '',
                value: ''
            };
        },
        removeExpirienceItemField(mainindex, itemindex){
            this.work_expirience[mainindex].fields.splice(itemindex, 1);
        },

        // languages_tools_technologies:
        addTooltechItem(){
            this.languages_tools_technologies.push(this.newTooltechItem);
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
            this.languages_tools_technologies[index].fields.push(this.newTooltechItemField);
            this.newTooltechItemField = {
                name: '',
                level: '',
                expirience: '',
                last_used: ''
            }
        }
    }
};

Vue.component('summary-item', {
    template: `
        <li>
            <div class="chip">{{ title }} 
                <i class="close material-icons" v-on:click="$emit('remove')">close</i>
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
                    <strong>{{ expirience.date_start }} - {{ expirience.date_end }}</strong>
                    
                </span>
                <input class="col s3 right" type="text" v-model="expirience.date_end" placeholder="End date">
                <input class="col s3 right" type="text" v-model="expirience.date_start" placeholder="Start date">
                
            </div>
            <div class="col s1">
                <a href="javascript:void(0)" class="right"><i style="margin-top: 10px" class="close material-icons" v-on:click="$emit('remove')">close</i></a>
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
    { path: '/list', component: List },
    { path: '/add', component: Add },
    // { path: '/edit', component: Edit },
];
const router = new VueRouter({
    routes
});

new Vue({
    el: '#root',
    router,

});