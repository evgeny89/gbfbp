import axios from "axios";

axios.interceptors.request.use(function (config) {
    if (!config.headers.ContentType) {
        config.headers.ContentType = `application/json; charset=UTF-8`;
    }
    config.headers.Accept = `application/json`;

    return config;
});
