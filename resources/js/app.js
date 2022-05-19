import axios from "axios";
const preloader = document.querySelector('.preloader')

axios.interceptors.request.use(function (config) {
    preloader.classList.add('active');
    if (!config.headers.ContentType) {
        config.headers.ContentType = `application/json; charset=UTF-8`;
    }
    config.headers.Accept = `application/json`;

    return config;
}, function (error) {
    preloader.classList.remove('active');
    return Promise.reject(error);
});

axios.interceptors.response.use(function (response) {
    preloader.classList.remove('active');
    return response;
}, function (error) {
    preloader.classList.remove('active');
    return Promise.reject(error);
});
