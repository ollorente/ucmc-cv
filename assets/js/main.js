const URL = "./api/v1"

const aspireMenu = document.querySelector('#aspireMenu');
const courseList = document.querySelector('#courseList');
const graduateList = document.querySelector('#graduateList');
const infoRequest = document.querySelector('#infoRequest');
const programList = document.querySelector('#programList');
const resourcesList = document.querySelector('#resourcesList');
const roleList = document.querySelector('.roleList');
const studentMenu = document.querySelector('#studentMenu');
const studentToolList = document.querySelector('#studentToolList');
const studentTutorialList = document.querySelector('#studentTutorialList');
const teacherMenu = document.querySelector('#teacherMenu');
const teacherToolList = document.querySelector('#teacherToolList');
const teacherTutorialList = document.querySelector('#teacherTutorialList');
const webInspector = document.querySelector('.__web-inspector-hide-shortcut__');

webInspector.style.display = 'none';

/* ---------- VUE ---------- */
var app = new Vue({
	el: '#main',
	data() {
		return {
			aspireMenus: [],
			courses: [],
			graduates: [],
			form: {
				name: null,
				email: null,
				subject: null,
				information: null
			},
			programs: [],
			requests: [],
			resources: [],
			roles: [],
			studentMenus: [],
			studentTools: [],
			studentTutorials: [],
			teacherMenus: [],
			teacherTools: [],
			teacherTutorials: [],
			limit: 12,
			page: this.id
		}
	},
	created() {
		/* this.getRequests(); */
		if (aspireMenu) {
			this.getAspireMenu()
		}
		if (courseList) {
			this.getCourses()
		}
		if (graduateList) {
			this.getGraduates()
		}
		if (programList) {
			this.getPrograms()
		}
		if (infoRequest) {
			this.infoRequest()
		}
		if (resourcesList) {
			this.getResources()
		}
		if (roleList) {
			this.getRoles()
		}
		if (studentMenu) {
			this.getStudentMenu()
		}
		if (studentToolList) {
			this.getStudentTools()
		}
		if (studentTutorialList) {
			this.getStudentTutorials()
		}
		if (teacherMenu) {
			this.getTeacherMenu()
		}
		if (teacherToolList) {
			this.getTeacherTools()
		}
		if (teacherTutorialList) {
			this.getTeacherTutorials()
		}
	},
	methods: {
		async getResources() {
			await fetch(`${URL}/resources?limit=${this.limit}&page=${this.page}`)
				.then(res => res.json())
				.then(async res => {
					this.resources = await res.data
				})
		},
		async getRoles() {
			await fetch(`${URL}/roles`)
				.then(res => res.json())
				.then(async res => {
					this.roles = await res.data
				})
		},
		async getAspireMenu() {
			await fetch(`${URL}/roles/aspirante/menu`)
				.then(res => res.json())
				.then(res => {
					this.aspireMenus = res.data;
				})
		},
		async getStudentMenu() {
			await fetch(`${URL}/roles/estudiante/menu`)
				.then(res => res.json())
				.then(res => {
					this.studentMenus = res.data;
				})
		},
		async getTeacherMenu() {
			await fetch(`${URL}/roles/docente/menu`)
				.then(res => res.json())
				.then(res => {
					this.teacherMenus = res.data;
				})
		},
		async getCourses() {
			await fetch(`${URL}/courses`)
				.then(res => res.json())
				.then(async res => {
					this.courses = await res.data
				})
		},
		async getGraduates() {
			await fetch(`${URL}/graduates`)
				.then(res => res.json())
				.then(async res => {
					this.graduates = await res.data
				})
		},
		async getPrograms() {
			await fetch(`${URL}/programs`)
				.then(res => res.json())
				.then(async res => {
					this.programs = await res.data

				})
		},
		async getStudentTools() {
			await fetch(`${URL}/roles/estudiante/herramientas`)
				.then(res => res.json())
				.then(async res => {
					this.studentTools = await res.data
				})
		},
		async getTeacherTools() {
			await fetch(`${URL}/roles/docente/herramientas`)
				.then(res => res.json())
				.then(async res => {
					this.teacherTools = await res.data
				})
		},
		async getStudentTutorials() {
			await fetch(`${URL}/roles/estudiante/tutoriales`)
				.then(res => res.json())
				.then(async res => {
					this.studentTutorials = await res.data
				})
		},
		async getTeacherTutorials() {
			await fetch(`${URL}/roles/docente/tutoriales`)
				.then(res => res.json())
				.then(async res => {
					this.teacherTutorials = await res.data
				})
		},
		infoRequest() {
			if (this.form.name != null || this.form.email != null || this.form.subject != null || this.form.information != null) {
				const data = {
					name: this.form.name,
					email: this.form.email,
					subject: this.form.subject,
					information: this.form.information
				}

				fetch(`${URL}/requests`, {
						method: 'POST',
						headers: {
							'Content-Type': 'application/json'
						},
						body: JSON.stringify(data)
					})
					.then(res => res.json())
					.catch(error => console.error('Error:', error))
					.then(response => {
						console.log('Success:', response)
					});
			}
		},
		async getRequests() {
			await fetch(`${URL}/requests`)
				.then(res => res.json())
				.then(async res => {
					this.requests = await res.data
				})
		}
	}
})
/* -----X----- VUE -----X----- */

// Loads the IFrame Player API code asynchronously.
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/player_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player;

function onYouTubePlayerAPIReady() {
	player = new YT.Player('video', {
		events: {
			'onReady': onPlayerReady
		}
	});
}

function onPlayerReady(event) {

	var stopButton = document.getElementById("stop");
	stopButton.addEventListener("click", function () {
		player.stopVideo();
	});

}
