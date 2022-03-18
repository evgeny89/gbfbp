import axios from "axios";

axios.interceptors.request.use(function (config) {
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    if (token) {
        config.headers.common['X-CSRF-TOKEN'] = token;
    }
    if (!config.headers.ContentType) {
        config.headers.ContentType = `application/json; charset=UTF-8`;
    }
    config.headers.Accept = `application/json`;

    return config;
});
