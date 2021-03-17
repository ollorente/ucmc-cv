const URL = "../api/v1"

const courseList = document.querySelector('#courseList');
const getObject = document.querySelector('#getObject');
const graduateList = document.querySelector('#graduateList');
const objectList = document.querySelector('#objectList');
const programList = document.querySelector('#programList');
const requestList = document.querySelector('#requestList');
const resourceList = document.querySelector('#resourceList');
const toolList = document.querySelector('#toolList');
const tutorialList = document.querySelector('#tutorialList');

/* ---------- VUE ---------- */

var app = new Vue({
    el: '#main',
    data() {
        return {
            courses: [],
            graduates: [],
            object: "",
            objects: [],
            programs: [],
            requests: [],
            resources: [],
            tools: [],
            tutorials: [],
            page: 1
        }
    },
    created() {
        if (courseList) { this.getCourses() }
        if (graduateList) { this.getGraduates() }
        if (getObject) { this.getObject() }
        if (objectList) { this.getObjects() }
        if (programList) { this.getPrograms() }
        if (requestList) { this.getRequests() }
        if (resourceList) { this.getResources() }
        if (toolList) { this.getTools() }
        if (tutorialList) { this.getTutorials() }
    },
    methods: {
        async getCourses() {
            await fetch(`${URL}/courses?limit=20&page=${this.page}`)
                .then(res => res.json())
                .then(async res => {
                    this.courses = await res.data
                })
        },
        async getGraduates() {
            await fetch(`${URL}/graduates?limit=20&page=${this.page}`)
                .then(res => res.json())
                .then(async res => {
                    this.graduates = await res.data
                })
        },
        async getObject(id) {
            await fetch(`${URL}/objects/${id}`)
                .then(res => res.json())
                .then(async res => {
                    this.object = await res.data
                })
        },
        async getObjects() {
            await fetch(`${URL}/objects?limit=20&page=${this.page}`)
                .then(res => res.json())
                .then(async res => {
                    this.objects = await res.data
                })
        },
        async getPrograms() {
            await fetch(`${URL}/programs?limit=20&page=${this.page}`)
                .then(res => res.json())
                .then(async res => {
                    this.programs = await res.data
                })
        },
        async getRequests() {
            await fetch(`${URL}/requests?limit=20&page=${this.page}`)
                .then(res => res.json())
                .then(async res => {
                    this.requests = await res.data
                })
        },
        async getResources() {
            await fetch(`${URL}/resources?limit=20&page=${this.page}`)
                .then(res => res.json())
                .then(async res => {
                    this.resources = await res.data
                })
        },
        async getTools() {
            await fetch(`${URL}/tools?limit=20&page=${this.page}`)
                .then(res => res.json())
                .then(async res => {
                    this.tools = await res.data
                })
        },
        async getTutorials() {
            await fetch(`${URL}/tutorials?limit=20&page=${this.page}`)
                .then(res => res.json())
                .then(async res => {
                    this.tutorials = await res.data
                })
        }
    }
});

/* -----X----- VUE -----X----- */