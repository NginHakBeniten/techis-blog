// axios
import axios from 'axios';
// import store from '@store';
import BaseResponse from '../responses/base_response';
import Vue from 'vue';
import Constants from '../constants';

const baseURL = process.env.VUE_APP_API_BASE_URL;

const http = axios.create({
    baseURL,
    // define default headers here
    headers: {
        'Accept': 'application/json',
    }
});

// request interceptor
http.interceptors.request.use(
    configuration => {
        configuration.headers.common["Authorization"] = `Bearer ${ Vue.$cookies.get(Constants.ACCESS_TOKEN) }`;
        return configuration;
    },
    e => {
        return Promise.reject(e);
    }
);

// response interceptor
http.interceptors.response.use(
    httpResponse => {
        const lateTime = performance.now() - httpResponse.config.startTime;

        let response = new BaseResponse(httpResponse.data, null);
        if (response.statusUnprocessableEntity()) {
            // do something
            return Promise.reject(response.getData());
        } else if (response.statusUnauthorize()) {
            // do something
            return Promise.reject(response.getData());
        } else if (response.statusForbidden()) {
            // do something
            return Promise.reject(response.getData());
        } else if (response.statusNotFound()) {
            // do something
            return Promise.reject(response.getData());
        }

        return Promise.resolve({
            data: response.getData(),
            startTime: httpResponse.config.startTime,
            lateTime
        });
    },
    ({response}) => {
        return Promise.reject(response);
    }
);

export default http;
