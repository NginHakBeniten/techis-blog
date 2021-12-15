// axios
import axios from 'axios';
import BaseResponse from '../responses/base_response';
import Vue from 'vue';
import Constants from '../constants';
import { VUE_APP_ADMIN_API_URL_DEV } from '../services/config';
import Cookies from 'js-cookie';

const baseURL = VUE_APP_ADMIN_API_URL_DEV;

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
        configuration.headers.common["Authorization"] = `Bearer ${ Cookies.get(Constants.ACCESS_TOKEN) }`;
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
