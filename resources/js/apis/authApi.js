import baseApi from './baseApi'

export default {
    login(formData) {
        return baseApi.post("/v1/authentication/login", formData);
    },

    logout(accessToken) {
        console.log(accessToken);
        return baseApi.post('/v1/authentication/logout', {accessToken: accessToken}, {
            headers: {
                'Authorization': "Bearer " + accessToken,
            }
        });
    },

    verifyUser(oldToken) {
        return baseApi.get('/v1/verify-user', {
            headers: {
                'Authorization': "Bearer " + oldToken,
            }
        });
    }
}
