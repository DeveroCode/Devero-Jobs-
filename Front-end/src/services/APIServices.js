import clientApi from "@/lib/axios";

export default {
    register(data) {
        return clientApi.post('/api/register', data);
    },
    login(data) {
        return clientApi.post('/api/login', data);
    }
}