import useSWRV from 'swrv'
import clientApi from "@/lib/axios";
const token = localStorage.getItem('AUTH_TOKEN');

export default {
    register(data) {
        return clientApi.post('/api/register', data);
    },
    login(data) {
        return clientApi.post('/api/login', data);
    },
    update(data) {
        return clientApi.put('/api/update', data, {
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
    }
}