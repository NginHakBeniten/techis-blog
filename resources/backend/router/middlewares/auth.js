import Vue from 'vue';
import Constants from '@constants';

export default function auth({ next, router }) {
    //check if token exists
    if(!Vue.$cookies.get(Constants.ACCESS_TOKEN)) {
        router.push({ name: 'login' });
    }

    return next();
}