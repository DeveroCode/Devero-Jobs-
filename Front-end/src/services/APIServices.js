import clientApi from "@/lib/axios";
import { data } from "autoprefixer";
const token = localStorage.getItem('AUTH_TOKEN');

export default {
    // => Start routes for the user
    register(data) {
        return clientApi.post('/api/register', data);
    },
    login(data) {
        return clientApi.post('/api/login', data);
    },
    update(data) {
        return clientApi.post('/api/update', data, {
            headers: {
                Authorization: `Bearer ${token}`
            }
        });
    },
    type_user() {
        return clientApi.get('/api/type_user');
    },
    getUser() {
        return clientApi.get('/api/user', {
            headers: {
                Authorization: `Bearer ${token}`
            }
        })
            .catch(error => {
                console.log(error);
            });
    },
    // => End router for the user

    // => Start Job Posting
    getTime() {
        return clientApi.get('/api/time');
    },

    registerProject(data) {
        return clientApi.post('/api/project-register', data, {
            headers: {
                Authorization: `Bearer ${token}`
            }
        });
    },
    getProjects() {
        return clientApi.get('/api/project');
    },
    getProject(id) {
        return clientApi.get(`/api/project-edit/${id}`, {
            headers: {
                Authorization: `Bearer ${token}`
            }
        });
    },
    updateProject(data) {
        return clientApi.post('/api/updateProject', data, {
            headers: {
                Authorization: `Bearer ${token}`
            }
        });
    },
    // => End router for jobs

    // => Start router for candidates
    candidate(data) {
        return clientApi.post('/api/candidates', data, {
            headers: {
                Authorization: `Bearer ${token}`
            }
        });
    }
}