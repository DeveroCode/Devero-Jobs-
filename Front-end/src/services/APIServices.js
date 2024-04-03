import clientApi from "@/lib/axios";

export default {
    register(data) {
        return clientApi.post('/api/register', data);
    },
    login(data) {
        return clientApi.post('/api/login', data);
    },
    type_user() {
        return clientApi.get('/api/type_user');
    }
}