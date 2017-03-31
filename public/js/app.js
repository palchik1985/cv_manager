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
        <tr v-for="cvrow in cvlist">
            <td v-text="cvrow.name"></td>
            <td v-text="cvrow.created_at"></td>
            <td v-text="cvrow.updated_at"></td>
            <td>
                 <a href="#" class="" v-on:click="showCv(cvrow)"><i class="small material-icons">visibility</i></a>
                 <a href="#" class="" v-on:click="getPdf(cvrow)"><i class="small material-icons">play_for_work</i></a>
                 <a href="#" class="" v-on:click="addFromCopy(cvrow)"><i class="small material-icons">playlist_add</i></a>
                 <a href="#" class="" v-on:click="editCv(cvrow)"><i class="small material-icons">mode_edit</i></a>
                 <a href="#" class="" v-on:click="deleteCv(cvrow)"><i class="small material-icons">delete</i></a>
            </td>
        </tr>


    </tbody>
</table>
    `,
    data() {

        return { cvlist: [] }
    },
    mounted(){
        axios.get('/api/getlist').then(response => this.cvlist = response.data);
    },
    methods: {
        showCv: function(cv) {
            axios({
                method: 'post',
                url: '/',
                data: {
                    json: cv.json
                }
            });
            alert('show')
        },
        getPdf: function(cv) {
            alert('pdf');
        },
        addFromCopy: function(cv) {
            alert('addFromCopy');
        },
        editCv: function(cv) {
            alert('edit');
        },
        deleteCv: function(cv) {
            alert('delete');
        }
    }

});

const Add = {
    template: `
<div class="row">
    <form method="POST" action="/api/add" class="col s12" @submit.prevent="onSubmit" @keydown="errors.clear($event.target.name)">
        <input type="hidden" id="json" name="json" v-model="json">
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
        <div class="row">
            <div class="col s6" id="summary_details">
                <h5>Summary details</h5>
                <div class="row">
                    <div class="col s12">
                        <input class="col s10" type="text"
                            v-model="newSummaryDetail"
                            placeholder="Add Summary"
                        ><button v-on:click="addSummaryDetail"><i class="material-icons">add</i></button>
                        <ul>
                        <summary-item is="summary-item"
                            v-for="(detail, index) in summary.summary_details"
                            v-bind:key="detail"
                            v-bind:title="detail"
                            v-on:remove="summary.summary_details.splice(index, 1)"
                            class="col s9"
                        >
                        </summary-item>
                            
                        </ul> 
                    </div>
                </div>
            </div>
            <div class="col s6" id="summary_technologies">
                <h5>Summary technologies</h5>
                <div class="row">
                    <div class="col s12">
                        <input class="col s10" type="text"
                            v-model="newSummaryTechnology"
                            placeholder="Add Technology"
                        ><button v-on:click="addSummaryTechnology"><i class="material-icons">add</i></button>
                        <ul>
                        <summary-item is="summary-item"
                            v-for="(technology, index) in summary.technologies"
                            v-bind:key="technology"
                            v-bind:title="technology"
                            v-on:remove="summary.technologies.splice(index, 1)"
                            class="col s9"
                        ></summary-item>
                            
                        </ul> 
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <h5>Work expirience</h5>
            <div class="row">
                <div class="input-field col s6">
                    <input type="text" class="validate" v-model="newExpirienceItem.date_start" placeholder="Add start date">
                </div>
                <div class="input-field col s6">
                    <input type="text" class="validate" v-model="newExpirienceItem.date_end" placeholder="Add end date">
                </div>
                
            </div>
            <button v-on:click="addExpirienceItem"><i class="material-icons">add</i></button>
            <work-expirience class="col s10"
                is="expirience-item"
                v-for="(expirience, index) in work_expirience"
                v-bind:key="expirience"
                v-bind:expirience="expirience"
                v-on:remove="work_expirience.splice(index, 1)"
            
            >
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" class="validate" v-model="newExpirienceItemField.name" placeholder="Add header">
                    </div>
                    <div class="input-field col s6">
                        <input type="text" class="validate" v-model="newExpirienceItemField.value" placeholder="Add text">
                    </div>
                </div>
                <button v-on:click="addExpirienceItem"><i class="material-icons">add</i></button>
                <expirienceItemfield class="col s10"
                    
                    <!-- toDo: скопировать принцип из формы уровнем выше (work-expirience)-->
                    
                    
                ></expirienceItemfield>
            
            </work-expirience>
            
            
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
                fields: []
            },

            errors: new Errors(),
            json: {},
            name: '',
            header_text: '',
            footer_text: '',
            position: '',
            summary:
                {
                    summary_details: [
                        'detail1',
                        'detail2',
                        'detail3'
                    ],
                    technologies: [
                        'techo1',
                        'tech3'
                    ]
                },
            work_expirience: [
                {
                    date_start: 'June 2017',
                    date_end: 'now',
                    fields: [
                        {
                            name: 'Name',
                            value: 'Value'
                        }
                    ]
                }
            ],
            languages_tools_technologies: []
        };

    },
    methods: {
        onSubmit() {
             axios.post('/api/add', {
                 name: this.name,
                 json: {
                     header_text: this.header_text,
                     footer_text: this.footer_text,
                     name: this.name,
                     position: this.position,
                     summary: {

                     }
                 }
             })
                 .then(response => alert('Saved'))
                 .catch(error => this.errors.record(error.response.data));
        },
        addSummaryDetail(){
            this.summary.summary_details.push(this.newSummaryDetail);
            this.newSummaryDetail = '';
        },
        addSummaryTechnology(){
            this.summary.technologies.push(this.newSummaryTechnology);
            this.newSummaryTechnology = '';
        },
        addExpirienceItem(){
            this.work_expirience.push(this.newExpirienceItem);
            this.newExpirienceItem = {};
            console.log(this.work_expirience);
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
        <p>
            {{ expirience.date_start }} - {{ expirience.date_end }}
        </p>
        <slot></slot>
        </div>
    `,
    props: ['expirience']
});


const routes = [
    { path: '/list', component: List },
    { path: '/add', component: Add }
];
const router = new VueRouter({
    routes
});

new Vue({
    el: '#root',
    router,

});